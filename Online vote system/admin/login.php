<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password = md5($password);

		//echo $username, $password;

		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = '<div style="color:red;">Cannot find account with the username or password!</div>';
		}
		else{
			$row = $query->fetch_assoc();
				$_SESSION['admin'] = $row['id'];
		}
		
	}
	else{
		$_SESSION['error'] = '<div style="color:red;">Input admin credentials first</div>';
	}

	header('Location: index.php');

?>