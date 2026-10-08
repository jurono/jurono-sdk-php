<?php
declare(strict_types=1);

$root = dirname(__DIR__);
$count = 0;
foreach (['src', 'tests', 'scripts'] as $directory) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/' . $directory));
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            passthru(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($file->getPathname()) . ' 2>&1', $status);
            if ($status !== 0) {
                exit($status);
            }
            $count++;
        }
    }
}
echo "Linted $count PHP files.\n";
