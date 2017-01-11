<?php
//use MyFrmwk\Controllers;

if ($_SERVER['SERVER_ADDR'] === '192.168.33.19'){
    define('ENVIRONMENT', 'development');
    error_reporting(E_ALL);
} else {
    define('ENVIRONMENT', 'production');
    error_reporting(0);
}

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/core/app.php';
$app = new App();