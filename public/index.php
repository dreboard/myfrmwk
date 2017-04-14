<?php
switch ($_SERVER['SERVER_NAME']){
	case 'localhost':
		define('ENVIRONMENT', 'development');
		error_reporting(E_ALL);
		break;
	case 'myframework':
		define('ENVIRONMENT', 'production');
		error_reporting(0);
		break;
	default:
		define('ENVIRONMENT', 'development');
		error_reporting(E_ALL);
}
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/core/app.php';
$app = new App();
