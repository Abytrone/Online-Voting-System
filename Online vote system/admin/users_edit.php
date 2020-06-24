<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = mysqli_real_escape_string($conn, $_POST['status']);

		//$password = mysqli_real_escape_string($conn, $_POST['password']);
		//$password = md5($password);

		$sql = "SELECT * FROM staff WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($id == $row['id']){

			$sql = "UPDATE staff SET status = '$status' WHERE id = '$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Staff Updated Successfully!';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
		else{
			$_SESSION['error'] = 'Fill up edit form first';
		}
	}
	header('Location: staff.php');

?>