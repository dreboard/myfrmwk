<?php
namespace  MyFrmwk\app\core;

use MyFrmwk\app\core\system\InterfaceController;

/**
 *
 * @author andreboard
 *        
 */
abstract class Controller implements InterfaceController
{

    public $model;
    /**
     */
    public function __construct()
    {}
    
    abstract protected function index();
    
    public function getModel($model){
        
        if (file_exists('../app/models/'.$model.'.php')){
            $this->model = "MyFrmwk\\app\\models\\{$model}";

        }
        
        $this->model = new $this->model;
    }

    /**
     */
    function __destruct()
    {}
}

