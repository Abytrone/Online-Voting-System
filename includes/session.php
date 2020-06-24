<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$sql = "SELECT * FROM voters WHERE id = '".$_SESSION['voter']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();

		$time = $_SERVER['REQUEST_TIME'];

		/**
		* for a 3 minute timeout, specified in seconds
		*/
		$timeout_duration = 180;

		/**
		* Here we look for the user's LAST_ACTIVITY timestamp. If
		* it's set and indicates our $timeout_duration has passed,
		* blow away any previous $_SESSION data and start a new one.
		*/
		if (isset($_SESSION['LAST_ACTIVITY']) && 
		   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
		    session_unset();
		    session_destroy();
		    session_start();
		}

		/**
		* Finally, update LAST_ACTIVITY so that our timeout
		* is based on it and not the user's login time.
		*/
		$_SESSION['LAST_ACTIVITY'] = $time;
	}
	else{
		header('Location: index.php');
		exit();
	}

?>