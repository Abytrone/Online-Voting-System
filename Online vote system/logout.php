<?php
	session_start();
	
include 'includes/conn.php';
//$_SESSION['voter']=="";
date_default_timezone_set('Africa/Accra');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($conn,"UPDATE userlog  SET logout = '$ldate' WHERE indexnumber = '".$_SESSION['index']."'ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['error']="You have successfully logout!";


//session_destroy();

	header('location: index.php');
?>