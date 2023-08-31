<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/user_page/db.php');
	$_SESSION = array();
	session_destroy();
	header("Location:/login_page/dist/login.php");
	exit(0);
?>