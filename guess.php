<?php
	session_save_path("sess");
	session_start(); 
	header('Content-Type: application/json');

	# YOUR CODE GOES HERE
	# Look at the results of executing ...
	# http://cp3101b-1.comp.nus.edu.sg/~arnold/guessGameAjax/guess.php?guess=sdufhdsuf
	# http://cp3101b-1.comp.nus.edu.sg/~arnold/guessGameAjax/guess.php?guess=26
	# http://cp3101b-1.comp.nus.edu.sg/~arnold/guessGameAjax/guess.php?guess=3
	$reply = array();
	$guess = $_GET["guess"];
	$answer = array();
	
	if(!isset($guess))
	{
		$reply["status"] = "error: guess parameter not supplied";
	}
	else
	{
		$reply["status"] = "ok";
		if($guess == $_SESSION['answer'])
		{
			$answer["guess"] = $guess;
			$answer["comparison"] = "="; 
			$_SESSION['history'][] = $answer;
		}
		elseif($guess < $_SESSION['answer'])
		{
			$answer["guess"] = $guess;
			$answer["comparison"] = "<"; 
			$_SESSION['history'][] = $answer;
		}
		elseif($guess > $_SESSION['answer'])
		{
			$answer["guess"] = $guess;
			$answer["comparison"] = ">"; 
			$_SESSION['history'][] = $answer;
		}
		else
		{}
		
	}
	print json_encode($reply);
?>
