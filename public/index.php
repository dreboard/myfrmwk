<?php

define("CONTROLLER_PATH", str_replace('\\', '/', dirname(dirname(__FILE__))) . '/');
define("LIBRARY_PATH", str_replace('\\', '/', dirname(dirname(__FILE__))) . '/libraries/');
define("PROJECT_DOCROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
//define("PROJECT_HTTP_PATH", "http://" . $_SERVER['HTTP_HOST'] . JPL_DOCROOT_PATH);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

define('BASE_URL', 'http://localhost/myfrmwk/public/');

define('CSS_ROOT', 'http://'.$_SERVER['SERVER_NAME'] .DS.'myfrmwk'. DS . 'public' . DS . 'css'. DS );
define('JS_ROOT', 'http://'.$_SERVER['SERVER_NAME'] .DS.'myfrmwk'. DS . 'public' . DS . 'css'. DS );

switch ($_SERVER['SERVER_NAME']){
	case 'localhost':
		define('ENVIRONMENT', 'development');
		error_reporting(E_ALL);
		ini_set('display_errors', true);
		break;
	case 'myfrmwk.tru33.com':
		define('ENVIRONMENT', 'production');
		error_reporting(0);
		ini_set('display_errors', false);
		break;
	default:
		define('ENVIRONMENT', 'development');
		error_reporting(E_ALL);
		ini_set('display_errors', true);
}
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/core/app.php';

$app = new App();
