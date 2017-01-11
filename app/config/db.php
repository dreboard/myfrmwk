<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 1/10/2017
 * Time: 7:10 PM


ActiveRecord\Config::initialize(function($config){
    $config->set_model_directory('../app/models');
    $config->set_connections([
        'development' => 'mysql://root:1234@127.0.0.1/myfmwrk'
    ]);
});

*/