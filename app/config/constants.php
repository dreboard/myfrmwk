<?php

define("SITE_NAME", "My Framework");

define("CONTROLLER_PATH", str_replace('\\', '/', dirname(dirname(__FILE__))) . '/');
define("PROJECT_DOCROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
//define("PROJECT_HTTP_PATH", "http://" . $_SERVER['HTTP_HOST'] . JPL_DOCROOT_PATH);

