<?php
use MyFrmwk\Controllers;

if ($_SERVER['SERVER_ADDR'] === '192.168.33.19'){
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/core/app.php';
$app = new App();