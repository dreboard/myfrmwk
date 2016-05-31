<?php
namespace  MyFrmwk\app\controllers;

use core\Controller;

/**
 * The default controller
 * @author andreboard
 *        
 */
class Login extends Controller
{

    /**
     */
    public function __construct()
    {}
    
    public function index()
    {
        echo "Im login";
    }

    /**
     */
    function __destruct()
    {}
}

