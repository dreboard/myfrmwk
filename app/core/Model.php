<?php
/**
 *
 * @author andreboard
 *        
 */

class Model
{
    protected $db;

    /**
     */
    public function __construct(){
        try {
            $this->db = new PDO(DBDSN, DBUSER, DBPASS);
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

