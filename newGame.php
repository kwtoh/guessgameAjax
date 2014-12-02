<?php
	session_save_path("sess");
	session_start(); 
	header('Content-Type: application/json');
	
	
	
	# YOUR CODE GOES HERE
	# Look at the results of executing...
	# http://cp3101b-1.comp.nus.edu.sg/~arnold/guessGameAjax/newGame.php
	$reply = array();
	$reply["status"] = "ok";
	
	$_SESSION['answer'] = rand(1,10);
	$_SESSION['history'] = array();
	
	print json_encode($reply);
?>
