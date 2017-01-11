<?php
namespace  MyFrmwk\App\Core\Helpers;

/**
 * My MVC Framework
 *
 * @package	MyFrmwk
 * @author	andreboard
 * @copyright	Copyright (c) 2016
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
class Filters
{

    /**
     */
    public function __construct()
    {}

    /*
     * Input post filter
     * @param mixed $value
     * @returns mixed $value
     */
    public static function input_post($value)
    {
        $value = filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS);
        return trim($value);
    }

    /**
     */

    function __destruct()
    {}
}

