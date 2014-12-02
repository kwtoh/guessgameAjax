<?php
	require 'config.inc';
	session_save_path("sess");
	session_start(); 
	header('Content-Type: application/json');
	$_SESSION['Login'] = false;
	
	//jsonreply
	$reply = array();
	$reply["login"] = $_SESSION['Login'];
	
	//Get the username and pass
	$user = $_GET["user"];
	$pass = $_GET["pass"];
	
	//if username and password not empty
	if(isset($user)&&isset($pass))
	{
		//username validity
		$reply["status"] = "passed";
		
		//connect to database
		$dbconn = pg_connect("host=127.0.0.1 port=5432 dbname=$db_user user=$db_user password=$db_password");
		
		//if not connected
		if(!$dbconn){
			$reply["dbconn"] = "can't connected to database";
			exit;
		}
	}
	else
	{
		//username password not set
		$reply["status"] = "failed";
	}
			
	print json_encode($reply);
?>
