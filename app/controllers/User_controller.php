<?php
//namespace App\Core;
/**
 * The default controller
 * @author andreboard
 *        
 */
class User_controller extends Controller
{

    /**
     */
    public function __construct()
    {
        $this->getModel('User');
    }

    public function index($params = "")
    {

        $data['title'] = 'User Home Page';
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

