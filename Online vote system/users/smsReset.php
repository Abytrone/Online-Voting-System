<?php
include 'includes/session.php';

if(isset($_POST['reset'])){
	$id = $_POST['id'];

	$sql = mysqli_query($conn, "SELECT msgStatus FROM voters WHERE id = '$id'") or die(mysqli_error($conn));
	$row = mysqli_fetch_array($sql);

	if ($row['msgStatus']=='1') {
		
		$msgUpdate = "UPDATE voters SET msgStatus = '0', smsDtime = '-' WHERE id = '$id'";
		mysqli_query($conn, $msgUpdate) or die(mysqli_error($conn));

		$_SESSION['success']='SMS Delivery Reset Successfull!';
	}
	else{
		$_SESSION['error'] = 'SMS Delivery Aready Reset!';	
	}
}
elseif (isset($_POST['allReset'])) {

	$msgUpdate = "UPDATE voters SET msgStatus = '0', smsDtime = '-'";
	mysqli_query($conn, $msgUpdate) or die(mysqli_error($conn));


	$_SESSION['success']='All SMS Delivery Reset Successfull!';
}
else {
	$_SESSION['error'] = 'SMS Delivery Hasn\'t Been Reset!';
}
header('Location: voters.php');