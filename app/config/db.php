<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 1/10/2017
 * Time: 7:10 PM
 */
switch ($_SERVER['SERVER_NAME']){
	case 'localhost':
		define("DBUSER", "root");
		define("DBPASS", "");
		define("DBHOST", "localhost");
		define("DBNAME", "myfmwrk");
		define("DBDSN", "mysql:dbname=".DBNAME.";host=".DBHOST."");
		break;
	default:
		define("DBUSER", "tru33338_myfmwrk");
		define("DBPASS", "ab198900");
		define("DBHOST", "localhost");
		define("DBNAME", "tru33338_myfmwrk");
		define("DBDSN", "mysql:dbname=".DBNAME.";host=".DBHOST."");
		break;

}




