#!/usr/bin/env python3
"""Build deterministic, self-contained release archives from locked dependencies."""
import argparse
import gzip
import hashlib
import io
import json
import re
import tarfile
import zipfile
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--version", required=True)
    args = parser.parse_args()
    version = args.version.removeprefix("v")
    if not re.fullmatch(r"\d+\.\d+\.\d+", version):
        raise SystemExit("Version must have the form X.Y.Z")
    client = (ROOT / "src/Client.php").read_text()
    if f"public const VERSION = '{version}';" not in client:
        raise SystemExit("Version does not match Client::VERSION")
    if not (ROOT / "vendor/autoload.php").exists():
        raise SystemExit("Run composer install --no-dev --optimize-autoloader first")
    lock = json.loads((ROOT / "composer.lock").read_text())
    installed = json.loads((ROOT / "vendor/composer/installed.json").read_text())
    wanted = sorted((p["name"], p["version"]) for p in lock["packages"])
    actual = sorted((p["name"], p["version"]) for p in installed["packages"])
    if actual != wanted or installed.get("dev"):
        raise SystemExit("Runtime dependencies differ from the lockfile or include development dependencies")
    content = {}
    for name in ["src", "vendor", "openapi", "docs", "scripts", "tests"]:
        for path in sorted((ROOT / name).rglob("*")):
            if path.is_file() and not path.is_symlink() and "__pycache__" not in path.parts:
                content[path.relative_to(ROOT).as_posix()] = path.read_bytes()
    for name in ["README.md", "LICENSE", "CHANGELOG.md", "composer.json", "composer.lock", "autoload.php", "phpstan.neon"]:
        content[name] = (ROOT / name).read_bytes()
    content["RELEASE.json"] = (json.dumps({
        "version": version,
        "openapi": json.loads((ROOT / "openapi/manifest.json").read_text()),
        "dependencies": dict(wanted),
    }, indent=2) + "\n").encode()
    dist = ROOT / "dist"
    dist.mkdir(exist_ok=True)
    stem = "jurono-sdk-php-" + version
    zip_path = dist / (stem + ".zip")
    with zipfile.ZipFile(zip_path, "w", compression=zipfile.ZIP_DEFLATED, compresslevel=9) as archive:
        for name, data in sorted(content.items()):
            entry = zipfile.ZipInfo(stem + "/" + name, date_time=(1980, 1, 1, 0, 0, 0))
            entry.compress_type = zipfile.ZIP_DEFLATED
            entry.external_attr = 0o100644 << 16
            archive.writestr(entry, data)
    tar_path = dist / (stem + ".tar.gz")
    with tar_path.open("wb") as output:
        with gzip.GzipFile(filename="", mode="wb", fileobj=output, mtime=0, compresslevel=9) as compressed:
            with tarfile.open(fileobj=compressed, mode="w") as archive:
                for name, data in sorted(content.items()):
                    entry = tarfile.TarInfo(stem + "/" + name)
                    entry.size = len(data)
                    entry.mode = 0o644
                    archive.addfile(entry, io.BytesIO(data))
    checksums = "".join(hashlib.sha256(p.read_bytes()).hexdigest() + "  " + p.name + "\n" for p in [zip_path, tar_path])
    (dist / "SHA256SUMS.txt").write_text(checksums)
    print(checksums, end="")


if __name__ == "__main__":
    main()
