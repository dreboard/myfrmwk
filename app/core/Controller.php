<?php
/**
 * Master controller
 * @author andreboard
 *        
 */
class Controller
{

    public $model;
    /**
     */
    public function __construct()
    {}


    /**
     * @param $model
     */
    public function getModel($model){
        
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

