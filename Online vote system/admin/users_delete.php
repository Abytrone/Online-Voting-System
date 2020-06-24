<?php
	include 'includes/session.php';
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM staff WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Staff Deleted Successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Entry To Delete';
	}
	header('Location: staff.php');
?>