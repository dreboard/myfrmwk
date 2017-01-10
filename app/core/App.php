<?php
namespace  MyFrmwk\Controllers;

//use MyFrmwk\Controllers;
/**
 * My MVC Framework
 *
 * @package	MyFrmwk\App
 * @author	andreboard
 * @copyright	Copyright (c) 2016
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link
 * @since	Version 1.0.0
 * @filesource
 */

class App
{
    protected $controller = '../app/controllers/home';
    
    protected $method = 'index';
    
    protected $params = [];

    protected $namespace = 'MyFrmwk\Controllers';

    /**
     */
    public function __construct()
    {
       
        $url = $this->parseUrl();
        
        if (file_exists('../app/controllers/'.$url[0].'.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        $this->controller = new $this->controller;
        
        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    /**
     * Explode and trim the url to obtain the controller, method and parameters
     * @return string
     */    
    public function parseUrl()
    {
        if (isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'] , '/'), FILTER_SANITIZE_STRING));
        }
    }

    /**
     */
    function __destruct()
    {}
}

