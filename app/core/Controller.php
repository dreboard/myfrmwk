<?php
//namespace MyFrmwk\Core;
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
class Controller
{

    public $model;
    protected $purifier;
    
    /**
     */
    public function __construct()
    {
	    $config = HTMLPurifier_Config::createDefault();
	    $config->set('HTML.AllowedElements', 'b,i,p,br,ul,ol,li');
	    $config->set('Attr.AllowedClasses', '');
	    $config->set('HTML.AllowedAttributes', '');
	    $config->set('AutoFormat.RemoveEmpty', true);
	    $this->purifier = new HTMLPurifier($config);
    }


    /**
     * @param $model
     */
    public function getModel($model)
    {
        
        if (file_exists('../app/models/'.$model.'.php')){
            $this->model = $model;

        }
        
        $this->model = new $this->model;
        return $model;
    }

    /**
     */
    function __destruct()
    {}
}

