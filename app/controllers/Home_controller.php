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
    	parent::__construct();
        $this->user_model = $this->getModel('User');
    }

	/**
	 * @param string $params
	 */
	public function index($params = "")
    {

        $data['title'] = $this->purifier->purify('Home Page');
        $data['text'] = "Im Home";
        Views::getView('home', $data);


    }
	public function test()
	{
		$data['title'] = 'Test Page';
		$data['text'] = "Im testing";
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

    public function __toString() {
	    return 'home';
    }

	/**
     */
    function __destruct()
    {}
}

