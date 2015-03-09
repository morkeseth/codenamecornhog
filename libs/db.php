<?php

class DB {
	
	$db = null;
	$username = "root";
	$password = "";
	$host = "localhost";
	$database = "eksamen";

	function __construct {
		$this->db = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->username, $this->password)
	}

}

?>