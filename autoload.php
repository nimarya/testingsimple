<?php

spl_autoload_register(function (string $class) {
    if (file_exists(__DIR__ . '/' . $class . '.php')) {
        include __DIR__ . '/' . $class . '.php';
    }
});

include __DIR__ . '/vendor/autoload.php';
