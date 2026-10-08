<?php
declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path === '/api/documents/doc/download') {
    header('Content-Type: application/pdf');
    echo "%PDF\0test file";
    return;
}
if ($path === '/api/redirect') {
    header('Location: /api/redirect-target', true, 302);
    return;
}
if ($path === '/api/error') {
    http_response_code(422);
    header('Content-Type: application/json');
    echo '{"success":false,"error":{"code":"VAL_INVALID","message":"Invalid input"},"meta":{"requestId":"local_error"}}';
    return;
}
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'data' => [
        'method' => $_SERVER['REQUEST_METHOD'], 'path' => $path,
        'query' => $_SERVER['QUERY_STRING'] ?? '',
        'headers' => array_change_key_case(getallheaders(), CASE_LOWER),
        'body' => file_get_contents('php://input'),
        'files' => array_map(fn (array $file) => [
            'name' => $file['name'], 'contents' => file_get_contents($file['tmp_name']),
        ], $_FILES),
    ],
    'meta' => ['requestId' => 'local_http'],
], JSON_THROW_ON_ERROR);
