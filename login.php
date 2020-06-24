<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$indexnumber = mysqli_real_escape_string($conn, $_POST['indexnumber']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM voters WHERE indexnumber = '$indexnumber'AND password = '$password'";
		$query = $conn->query($sql);
		
		if($query->num_rows > 0) {
			$extra="home.php";
			$_SESSION['index']=$indexnumber;
			$row = $query->fetch_assoc();/*
			if($password === $row['password']){
				$_SESSION['voter'] = $row['id'];
			} 
			else{
				$_SESSION['error'] = 'Incorrect password';
			}*/
			date_default_timezone_set('Africa/Accra');
			$lindate = date( 'd-m-Y h:i:s A', time () );
			$_SESSION['voter']=$row['id'];
			//$_SESSION['username']=$query['lastname'];
			$uip=$_SERVER['REMOTE_ADDR'];
			$status=1;
			$log=mysqli_query($conn,"INSERT INTO userlog(indexnumber, userip, loginTime , status) VALUES('".$_SESSION['index']."','$uip','$lindate','$status')");
			$host=$_SERVER['HTTP_HOST'];
			$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("Location:http://$host$uri/$extra");
			exit();
		}
		else {

			$extra="home.php";
			$indexnumber=$indexnumber;
			$uip=$_SERVER['REMOTE_ADDR'];
			$status=0;
			$log=mysqli_query($conn,"INSERT INTO userlog(indexnumber, userip, status) VALUES('$indexnumber','$uip','$status')");
			$host  = $_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("Location:http://$host$uri/$extra");
			$_SESSION['error']="Invalid credentials";
			exit();
		}
	/*
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter!';
		}
		else{
			$row = $query->fetch_assoc();
			if($password === $row['password']){
				$_SESSION['voter'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
*/	}

	header('Location: index.php');
	
?>