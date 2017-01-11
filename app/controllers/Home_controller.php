<?php
//namespace MyFrmwk\Controllers;
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
    {$this->getModel('User');}
    
    public function index($params = "")
    {

        $data['title'] = 'Home Page';
        $data['text'] = "Im Home";
        Views::getView('home', $data);


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

