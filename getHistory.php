<?php
	session_save_path("sess");
	session_start(); 
	header('Content-Type: application/json');

	# Look at the result of executing...
	# http://cp3101b-1.comp.nus.edu.sg/~arnold/guessGameAjax/getHistory.php
	# YOUR CODE GOES HERE
	$reply = array();

	if(count($_SESSION['history']) == 0)
	{
		$reply["status"] = "error: no history. Execute newGame.php first.";
	}
	else
	{
		$reply["status"] = "ok";
		$reply["history"] = $_SESSION['history'];
	}
	
	print json_encode($reply);
?>
