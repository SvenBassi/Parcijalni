<?php

spl_autoload_register(function ($className) {
    $classFile = __DIR__ . '/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

$configFilePath = __DIR__ . '/config.php';

$configManager = new Config($configFilePath);
$dbConnection = DbConnection::getInstance();

$connection = $dbConnection->getConnection();

if ($pdo) {
    echo 'Spojeni ste';
} else {
    echo 'Error';
}


