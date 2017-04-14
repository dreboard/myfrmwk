<?php

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

$config = HTMLPurifier_Config::createDefault();
$config->set('HTML.AllowedElements', 'b,i,p,br,ul,ol,li');
$config->set('Attr.AllowedClasses', '');
$config->set('HTML.AllowedAttributes', '');
$config->set('AutoFormat.RemoveEmpty', true);
$purify = new HTMLPurifier($config);

$handler = new MyFrmwk\App\Core\Helpers\MySessions();
session_set_save_handler($handler, true);

session_start();
$_SESSION['var1'] = "My MVC Framework";