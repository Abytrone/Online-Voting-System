<?php
	include 'includes/session.php';

	$sql = "DELETE FROM votes";
	if($conn->query($sql)){
		$sql2="UPDATE voters SET status='Unvoted'";
			$v=$conn->query($sql2);
		$_SESSION['success'] = "Votes reset successfully";
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: home.php');

?>