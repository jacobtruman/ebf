<?php

class DBConn extends MySqli
{
	public function __construct($dbname = "ebf")
	{
		parent::__construct('localhost', 'web_user', 'w3bu53r', $dbname);
	}
	
	public function query($query)
	{
		$result = parent::query($query);
		
		if(strlen($this->error))
			throw new CustomException($this->error);
		
		return $result;
	}
}

?>