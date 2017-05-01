<?php
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

class Model
{
	/** @var string Database */
	protected $db;

    /**
     */
    public function __construct(){
        try {
            $this->db = new PDO(DBDSN, DBUSER, DBPASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    /**
     */
    function __destruct()
    {
        $this->db = null;
    }
}

