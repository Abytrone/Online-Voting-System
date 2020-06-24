<?php
	session_start();
	include 'includes/conn.php';
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$status = 'Enabled';
		//$password = md5($password);

		$sql = "SELECT * FROM staff WHERE username = '$username'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		elseif ($status != $row['status']) {
			$_SESSION['error'] = 'Accounts Has Been Disabled, Contact Admin.';
		}
		else {
			
			if( ($password === $row['password']) && ($status === $row['status']) ){
				$_SESSION['staff'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Input user credentials first';
	}
	header('Location: index.php');
?>