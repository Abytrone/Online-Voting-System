<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'home.php';
	}
	if(isset($_POST['save'])){
		$curr_password = mysqli_real_escape_string($conn, $_POST['curr_password']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$photo = $_FILES['photo']['name'];
		if($curr_password === $staff['password']){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $staff['photo'];
			}

			if($password == $staff['password']){
				$password = $staff['password'];
			}
			else{
				$password = $password;
			}

			$sql = "UPDATE staff SET username = '$username', password = '$password', photo = '$filename' WHERE id = '".$staff['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Profile Updated Successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('Location:'.$return);

?>