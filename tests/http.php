<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Jurono\Sdk\Client;
use Jurono\Sdk\Exception\ApiException;

function verify(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$socket = stream_socket_server('tcp://127.0.0.1:0', $errno, $error);
if ($socket === false) {
    throw new RuntimeException($error);
}
$address = stream_socket_get_name($socket, false);
fclose($socket);
$log = tempnam(sys_get_temp_dir(), 'jurono-http-');
$process = proc_open([PHP_BINARY, '-S', $address, __DIR__ . '/http-router.php'], [
    0 => ['pipe', 'r'], 1 => ['file', $log, 'a'], 2 => ['file', $log, 'a'],
], $pipes);
if (!is_resource($process)) {
    throw new RuntimeException('Could not start local HTTP fixture');
}
try {
    $ready = false;
    for ($attempt = 0; $attempt < 50; $attempt++) {
        $connection = @stream_socket_client('tcp://' . $address, $errno, $error, 0.1);
        if ($connection !== false) {
            fclose($connection);
            $ready = true;
            break;
        }
        usleep(20000);
    }
    verify($ready, 'Local HTTP fixture did not become ready');
    $client = new Client(accessToken: 'local-token', apiKey: 'local-key', baseUrl: 'http://' . $address);
    $request = $client->clients()->list(query: ['isActive' => false, 'q' => 'Müller'])->data();
    verify($request['path'] === '/api/clients', 'Incorrect live request path');
    verify($request['query'] === 'isActive=false&q=M%C3%BCller', 'Incorrect live query encoding');
    verify($request['headers']['authorization'] === 'Bearer local-token', 'Missing live bearer header');
    verify($request['headers']['x-jurono-api-key'] === 'local-key', 'Missing live API key header');
    $login = $client->auth()->login(['email' => 'test@example.com', 'password' => 'test'])->data();
    verify($login['method'] === 'POST', 'Incorrect live JSON method');
    verify(json_decode($login['body'], true)['email'] === 'test@example.com', 'Incorrect live JSON body');
    $upload = $client->mandates()->processDocument([
        ['name' => 'file', 'contents' => 'pdf bytes', 'filename' => 'example.pdf'],
    ])->data();
    verify($upload['files']['file'] === ['name' => 'example.pdf', 'contents' => 'pdf bytes'], 'Incorrect live multipart upload');
    $sink = tempnam(sys_get_temp_dir(), 'jurono-download-');
    try {
        $client->documents()->download('doc', options: ['sink' => $sink]);
        verify(file_get_contents($sink) === "%PDF\0test file", 'Incorrect live download bytes');
    } finally {
        unlink($sink);
    }
    verify($client->request('GET', '/api/redirect')->status() === 302, 'Unexpected redirect follow');
    try {
        $client->request('GET', '/api/error');
        throw new RuntimeException('Expected HTTP error');
    } catch (ApiException $error) {
        verify($error->response->status() === 422 && $error->errorCode() === 'VAL_INVALID', 'Incorrect live error');
    }
    echo "PASS real HTTP: auth headers, queries, JSON, multipart, binary sink, redirects and errors\n";
} finally {
    fclose($pipes[0]);
    proc_terminate($process);
    proc_close($process);
    unlink($log);
}
