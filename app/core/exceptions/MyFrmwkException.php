<?php
namespace  MyFrmwk\App\Core\Helpers;
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
class MyFrmwkException extends \Exception {

	/**
	 * MyFrmwkException constructor.
	 *
	 * @param string $message
	 * @param int $code
	 */
	public function __construct($message, $code = 0)
	{
		parent::__construct($message, $code);
	}


	/**
	 * custom string representation of object
	 * @return string
	 */
	public function __toString()
	{
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}

	public function MyFrmwkExceptionFunction()
	{
		echo "A custom function for this type of exception\n";
	}
}