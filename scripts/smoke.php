<?php
declare(strict_types=1);

require dirname(__DIR__) . '/autoload.php';

use Jurono\Sdk\Client;

$client = new Client(baseUrl: getenv('JURONO_API_URL') ?: 'https://api.jurono.eu');
$response = $client->health()->check();
if ($response->status() !== 200 || !is_array($response->data())) {
    throw new RuntimeException('Unexpected health response');
}
echo "Jurono API health: HTTP " . $response->status() . "\n";
echo json_encode($response->data(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES) . "\n";
