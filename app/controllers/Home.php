<?php
namespace  MyFrmwk\app\controllers;

use  MyFrmwk\app\core\Controller;

/**
 * The default controller
 * @author andreboard
 *        
 */
class Home extends Controller
{

    /**
     */
    public function __construct()
    {}
    
    public function index($params = "")
    {
        echo "Im Home";
        $this->getModel('User');
    }
    
    public function test()
    {
        echo "Tested";
    }

    /**
     */
    function __destruct()
    {}
}
