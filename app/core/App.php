<?php
//namespace  MyFrmwk;

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
    protected $controller = 'home';
    
    protected $method = 'index';
    
    protected $params = [];

    protected $namespace = 'MyFrmwk';

    /**
     */
    public function __construct()
    {
       
        try {
            $url = $this->parseUrl();
            if (file_exists('../app/controllers/'.ucfirst($url[0]).'_controller.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
            require_once '../app/controllers/'.ucfirst($this->controller).'_controller.php';

            $controllerName = ucfirst($this->controller).'_controller';
            $this->controller = new $controllerName;

            if (isset($url[1])){
                if (method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

        }
        catch (Exception $e){
            $e->getMessage();
        }
        finally{
            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

    }
    
    /**
     * Explode and trim the url to obtain the controller, method and parameters
     * @return string
     */    
    public function parseUrl()
    {
        if (isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'] , '/'), FILTER_SANITIZE_URL));
        }
    }

    /**
     */
    function __destruct()
    {}
}

