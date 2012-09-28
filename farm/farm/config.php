<?php

	function dbConnect()
	{
			
		$DB_SERVER = "localhost";
		$DB_USER = "technone_farm";
		$DB_PASSWORD = "speed123";
		$DB_NAME = "technone_farm";
		
		$db = mysql_connect($DB_SERVER,$DB_USER,$DB_PASSWORD) or die("Oops some thing went wrong!!!");
		if($db)
		  mysql_select_db($DB_NAME,$db) or die("Oops some thing went wrong!!!");
		  
		return $db;
	}

?>