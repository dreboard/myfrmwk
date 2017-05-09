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
	    if(strstr($view, PHP_EOL)) {
		    header("Location: BASE_URL");
		    exit();
	    }
    	$view = strip_tags($view);
    	if(file_exists('../app/views/'.$view.'.php')){
		    require_once '../app/views/'.$view.'.php';
	    } else {
    		header("Location: BASE_URL");
    		exit();
	    }


    }

    /**
     */
    function __destruct()
    {}
}

