<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$mode = is_array($_POST['mode']);
		$setting = is_array($_POST['setting']);

		$sql = "INSERT INTO settings (mode, setting) VALUES ('$mode', '$setting')";
		if($conn->query($sql)){
			$_SESSION['Success'] = 'Setting updated successfully!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: privilages.php');
?>