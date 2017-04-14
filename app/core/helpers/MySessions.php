<?php
namespace  MyFrmwk\App\Core\Helpers;
/**
 * My MVC Framework
 * Session helper
 *
 * @package	MyFrmwk
 * @author	andre board
 * @copyright	Copyright (c) 2016
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link
 * @since	Version 1.0.0
 * @filesource
 */
class MySessions implements \SessionHandlerInterface
{
	private $link;

	/**
	 * @param string $savePath
	 * @param string $sessionName
	 *
	 * @return bool
	 */
	public function open($savePath, $sessionName)
	{
		$link = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
		if($link){
			$this->link = $link;
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @return bool
	 */
	public function close()
	{
		mysqli_close($this->link);
		return true;
	}

	/**
	 * @param string $id
	 *
	 * @return string
	 */
	public function read($id)
	{
		$result = mysqli_query($this->link,"SELECT Session_Data FROM Session WHERE Session_Id = '".$id."' AND Session_Expires > '".date('Y-m-d H:i:s')."'");
		if($row = mysqli_fetch_assoc($result)){
			return $row['Session_Data'];
		}else{
			return "";
		}
	}

	/**
	 * @param string $id
	 * @param string $data
	 *
	 * @return bool
	 */
	public function write($id, $data)
	{
		$DateTime = date('Y-m-d H:i:s');
		$NewDateTime = date('Y-m-d H:i:s',strtotime($DateTime.' + 1 hour'));
		$result = mysqli_query($this->link,"REPLACE INTO Session SET Session_Id = '".$id."', Session_Expires = '".$NewDateTime."', Session_Data = '".$data."'");
		if($result){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @param string $id
	 *
	 * @return bool
	 */
	public function destroy($id)
	{
		$result = mysqli_query($this->link,"DELETE FROM Session WHERE Session_Id ='".$id."'");
		if($result){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @param int $maxlifetime
	 *
	 * @return bool
	 */
	public function gc($maxlifetime)
	{
		$result = mysqli_query($this->link,"DELETE FROM Session WHERE ((UNIX_TIMESTAMP(Session_Expires) + ".$maxlifetime.") < ".$maxlifetime.")");
		if($result){
			return true;
		}else{
			return false;
		}
	}
}