<?php
/**
 *
 * @author andreboard
 *        
 */
class Views
{

    /**
     */
    public function __construct()
    {}

    /**
     * @param $view
     * @param $data
     */
    public static function getView($view, $data = array())
    {
        require_once '../app/views/'.$view.'.php';
    }

    /**
     */
    function __destruct()
    {}
}

