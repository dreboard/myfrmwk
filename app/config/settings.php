<?php

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

$handler = new MyFrmwk\App\Core\Helpers\MySessions();
session_set_save_handler($handler, true);

session_start();
$_SESSION['var1'] = "My MVC Framework";