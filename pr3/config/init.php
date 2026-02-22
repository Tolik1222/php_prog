<?php
define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../classes/' . $class . '.php',
        __DIR__ . '/../controllers/' . $class . '.php',
        __DIR__ . '/../classes/' . strtolower($class) . '.php',
        __DIR__ . '/../controllers/' . strtolower($class) . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $_SESSION['last_post'] = $_POST;
}