<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	
	$dbhost = "localhost";
	$dbname = "lab_management";
	$dbuser = "root";
	$dbpass = "";
	
	try
	{
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
	}
	catch(PDOException $error)
	{
		echo "Connection failed: ".$error->getMessage();
		die();
	}


?>