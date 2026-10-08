#!/usr/bin/env python3
"""Generate the complete PHP service surface from the checked-in OpenAPI contract.

No remote access or third-party Python dependencies. --check detects drift.
"""
import argparse
import collections
import hashlib
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
SPEC = ROOT / "openapi/openapi.json"
METHODS = {"get", "post", "put", "patch", "delete", "head", "options", "trace"}


def php(value):
    if value is None:
        return "null"
    if isinstance(value, bool):
        return "true" if value else "false"
    if isinstance(value, str):
        return "'" + value.replace("\\", "\\\\").replace("'", "\\'") + "'"
    if isinstance(value, dict):
        return "[" + ", ".join(php(k) + " => " + php(v) for k, v in value.items()) + "]"
    if isinstance(value, list):
        return "[" + ", ".join(map(php, value)) + "]"
    return str(value)


def pascal(value):
    return "".join(word[:1].upper() + word[1:].lower() for word in re.findall(r"[A-Za-z0-9]+", value))


def identifier(value):
    result = re.sub(r"[^A-Za-z0-9_]", "_", value)
    return "p_" + result if result[:1].isdigit() else result


def render():
    spec = json.loads(SPEC.read_text())
    groups = collections.defaultdict(list)
    registry = {}
    for path, item in spec["paths"].items():
        for method, operation in item.items():
            if method not in METHODS:
                continue
            opid = operation["operationId"]
            if opid in registry:
                raise ValueError("Duplicate operationId: " + opid)
            parameters = item.get("parameters", []) + operation.get("parameters", [])
            if any("$ref" in p for p in parameters):
                raise ValueError("Referenced parameters require generator support: " + opid)
            declared_path = {p["name"] for p in parameters if p["in"] == "path"}
            # A few upstream operations omit decorators for variables in their routes.
            # Keep the source snapshot intact and expose every route placeholder.
            for variable in re.findall(r"\{([^}]+)\}", path):
                if variable not in declared_path:
                    parameters.append({"name": variable, "in": "path", "required": True, "schema": {"type": "string"}})
            body = operation.get("requestBody", {})
            media = list(body.get("content", {}))
            if any(m not in ["application/json", "multipart/form-data"] for m in media):
                raise ValueError("Unsupported body content type: " + opid)
            for p in parameters:
                if p["in"] not in ["path", "query", "header"]:
                    raise ValueError("Unsupported parameter location: " + opid)
                if p.get("style") or p.get("explode") is not None:
                    raise ValueError("Explicit parameter serialization requires support: " + opid)
            registry[opid] = {
                "method": method.upper(), "path": path,
                "parameters": [{"name": p["name"], "in": p["in"], "required": p.get("required", False)} for p in parameters],
                "bodyRequired": body.get("required", False),
                "mediaType": media[0] if media else None,
            }
            groups[operation.get("tags", ["Default"])[0]].append((opid, operation, parameters))

    output = {}
    classnames = set()
    service_methods = []
    index = ["# API reference", "", "Generated from `openapi/openapi.json`. All responses are `Jurono\\Sdk\\Response`.",
             "", "JSON bodies are PHP arrays or objects using the wire field names. Multipart bodies are Guzzle part arrays.",
             "Query and header arrays use their OpenAPI names. HTTP options support timeout, sink, and undocumented bodies.",
             "", "| Service | Operations |", "| --- | ---: |"]
    for tag in sorted(groups):
        classname = pascal(tag) + "Api"
        if classname in classnames:
            raise ValueError("Tag class collision: " + tag)
        classnames.add(classname)
        service = classname[:-3]
        service = service[:1].lower() + service[1:]
        # Names are listed in the generated reference, so acronyms remain predictable.
        service_methods.append(f"    public function {service}(): \\Jurono\\Sdk\\Api\\{classname}\n"
                               "    {\n"
                               f"        return $this->services[{php(service)}] ??= new \\Jurono\\Sdk\\Api\\{classname}($this);\n"
                               "    }\n")
        index.append(f"| [`{service}()`](../src/Api/{classname}.php) | {len(groups[tag])} |")
        names = collections.Counter(opid.split("_", 1)[-1] for opid, _, _ in groups[tag])
        methods = []
        doc = [f"# {tag}", "", f"Access with `$client->{service}()`.", "",
               "| Method | HTTP route | Operation ID |", "| --- | --- | --- |"]
        details = []
        used_methods = set()
        for opid, operation, parameters in groups[tag]:
            name = opid.split("_", 1)[-1]
            primary = opid.split("_", 1)[0].removesuffix("Controller").lower() == classname[:-3].lower()
            if names[name] > 1 and not primary:
                prefix = opid.split("_", 1)[0].removesuffix("Controller")
                name = prefix[:1].lower() + prefix[1:] + name[:1].upper() + name[1:]
            name = identifier(name)
            if name.lower() in used_methods:
                raise ValueError("Method collision: " + opid)
            used_methods.add(name.lower())
            args = []
            path_args = {}
            used_args = {"body", "query", "headers", "options"}
            for p in parameters:
                if p["in"] == "path":
                    param = identifier(p["name"])
                    if param in used_args:
                        param = "path_" + param
                    used_args.add(param)
                    args.append("string $" + param)
                    path_args[p["name"]] = "$" + param
            args.append("mixed $body" + ("" if registry[opid]["bodyRequired"] else " = null"))
            args += ["array $query = []", "array $headers = []", "array $options = []"]
            path_php = "[" + ", ".join(php(k) + " => " + v for k, v in path_args.items()) + "]"
            summary = operation.get("summary", opid).replace("*/", "* /").replace("\n", " ")
            methods.append(f"    /** {summary}\n     * @see docs/api/{classname}.md\n     */\n"
                           f"    public function {name}({', '.join(args)}): Response\n"
                           "    {\n"
                           f"        return $this->client->call({php(opid)}, {path_php}, $query, $body, $headers, $options);\n"
                           "    }\n")
            doc.append(f"| `{name}()` | `{registry[opid]['method']} {registry[opid]['path']}` | `{opid}` |")
            details += [f"\n## `{name}()`", "", f"{summary}", "", f"```php\n$client->{service}()->{name}({', '.join(args)});\n```", ""]
            for p in parameters:
                if p["in"] != "header" or p["name"] != "X-API-Version":
                    details.append(f"- `{p['in']}.{p['name']}` ({'required' if p.get('required') else 'optional'}): "
                               + json.dumps(p.get("schema", {}), ensure_ascii=False))
            if operation.get("requestBody"):
                details += ["", "Request body schema:", "", "```json", json.dumps(operation["requestBody"], indent=2, ensure_ascii=False), "```", ""]
        output[ROOT / f"src/Api/{classname}.php"] = (
            "<?php\ndeclare(strict_types=1);\n\n// Generated by scripts/generate.py. Do not edit.\n"
            "namespace Jurono\\Sdk\\Api;\n\nuse Jurono\\Sdk\\Client;\nuse Jurono\\Sdk\\Response;\n\n"
            f"final class {classname}\n{{\n    public function __construct(private readonly Client $client)\n    {{\n    }}\n\n"
            + "\n".join(methods) + "}\n")
        output[ROOT / f"docs/api/{classname}.md"] = "\n".join(doc + details) + "\n"
    output[ROOT / "docs/api.md"] = "\n".join(index) + "\n"
    output[ROOT / "src/Generated/Services.php"] = (
        "<?php\ndeclare(strict_types=1);\n\n// Generated by scripts/generate.py. Do not edit.\n"
        "namespace Jurono\\Sdk\\Generated;\n\ntrait Services\n{\n" + "\n".join(service_methods) + "}\n")
    output[ROOT / "src/Generated/Operations.php"] = (
        "<?php\ndeclare(strict_types=1);\n\n// Generated by scripts/generate.py. Do not edit.\n"
        "namespace Jurono\\Sdk\\Generated;\n\nfinal class Operations\n{\n    public const ALL = [\n"
        + "".join("        " + php(k) + " => " + php(v) + ",\n" for k, v in sorted(registry.items()))
        + "    ];\n}\n")
    output[ROOT / "openapi/manifest.json"] = json.dumps({
        "sha256": hashlib.sha256(SPEC.read_bytes()).hexdigest(),
        "apiVersion": spec["info"]["version"], "operations": len(registry), "services": len(groups)
    }, indent=2) + "\n"
    return output


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--check", action="store_true")
    args = parser.parse_args()
    output = render()
    managed = [ROOT / "src/Api", ROOT / "src/Generated", ROOT / "docs/api"]
    existing = {p for directory in managed for p in directory.glob("*") if p.is_file()}
    stale = existing - output.keys()
    changed = [p for p, content in output.items() if not p.exists() or p.read_text() != content]
    if args.check:
        if stale or changed:
            raise SystemExit("Generated files differ: " + ", ".join(str(p.relative_to(ROOT)) for p in sorted(stale | set(changed))))
        print(f"Generated contract is current ({len(output)} files).")
        return
    for p in stale:
        p.unlink()
    for p, content in output.items():
        p.parent.mkdir(parents=True, exist_ok=True)
        p.write_text(content)
    print(f"Generated {len(output)} files.")


if __name__ == "__main__":
    main()
