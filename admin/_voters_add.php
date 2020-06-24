<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$mNum = mysqli_real_escape_string($conn, $_POST['indexnumber']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
		 
		$length = strlen($mNum);
		$phnLength = strlen($phone);
		
		$date=date('y')-1;
		$a = $date;
		$b = $date-1;
		$c = $date-2;
		$firstYear = "08".$a;
		$secondYear = "08".$b;
		$thirdYear = "08".$c;

		$first = substr($mNum,0,4);
		$last = substr($mNum,4,8);

		//generate voters id
		$set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$password = substr(str_shuffle($set), 0, 8);

		$sql = "INSERT INTO voters (password, firstname, lastname, indexnumber, email, phoneNumber, status) VALUES ('$password', '$firstname', '$lastname', '$mNum', '$email', '$phone', 'Unvoted')";

		//Index Checking Query
		$checkindex =mysqli_query($conn,"SELECT indexnumber FROM  voters WHERE  indexnumber='$mNum'");
		$indexcount=mysqli_num_rows($checkindex);

		//Email Checking Query
		$checkemail =mysqli_query($conn,"SELECT email FROM  voters WHERE  email ='$email'");
		$emailcount=mysqli_num_rows($checkemail);

		//Phone Number Checking Query
		$checkphone =mysqli_query($conn,"SELECT phoneNumber FROM  voters WHERE  phoneNumber ='$phoneNumber'");
		$phonecount=mysqli_num_rows($checkphone);
			
		if(($first===$firstYear)OR($first===$secondYear)OR($first===$thirdYear)){

			if ($last==='0000') {
				$_SESSION['error'] = 'Check the last 4 digits of your Matric Number!';
			}
			elseif ($length < 8) {
				$_SESSION['error'] = 'Matric Number less than 8 characters!';
			}
			elseif($indexcount>0){
				$_SESSION['error'] = 'Matric Number already exist!';
			}
			elseif($emailcount>0){
				$_SESSION['error'] = 'Email already exist!';
			}
			elseif($phnLength < 10){
				$_SESSION['error'] = 'Phone Number is less than 10 characters!';
			}
			elseif($phonecount>0){
				$_SESSION['error'] = 'Phone number already exist!';
			}
			elseif($conn->query($sql)){
				$_SESSION['success'] = 'Voter added successfully!';
			}
			else {
				$_SESSION['error'] = $conn->error;
			}
		}
		else {
			$_SESSION['error'] = 'Invalid Matric Number!';
		}
	}
	
	header('Location: voters.php');
?>