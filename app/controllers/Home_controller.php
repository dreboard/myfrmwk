<?php
//namespace App\Core;
/**
 * The default controller
 * @author andreboard
 *
 */
class Home_controller extends Controller
{
    protected $user_model;

    /**
     */
    public function __construct()
    {
        $this->user_model = $this->getModel('User');
    }

    public function index($params = "")
    {

        $data['title'] = 'Home Page';
        $data['text'] = "Im Home";
        Views::getView('home', $data);


    }

    /**
     *
     */
    public function about()
    {
        $data['title'] = 'About Page';
        $data['text'] = "Im about";
        Views::getView('home', $data);
    }

    /**
     */
    function __destruct()
    {}
}

