<?php
namespace Models;

class Model 
{
	
	public function __construct() 
	{
		require('cfg/database.php');
		$this->dbh = new \PDO($host, $username, $password);
	}

}