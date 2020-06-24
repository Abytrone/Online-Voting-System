<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$matricNumber = mysqli_real_escape_string($conn, $_POST['indexnumber']);
		$phone = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
		 
		$phnLength = strlen($phone);
		
		// $date=date('y')-1;
		// $a = $date;
		// $b = $date-1;
		// $c = $date-2;
		// $firstYear = "08".$a;
		// $secondYear = "08".$b;
		// $thirdYear = "08".$c;
		// $start = '0000';
		// $year1Total = 0;
		// $year2Total = 0;
		// $year3Total = 0;
		// $first = substr($mNum,0,4);
		// $last = substr($mNum,4,8);

		//generate voters password
		$set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$password = substr(str_shuffle($set), 0, 8);

		//Query to insert voter into DB
		$sql = "INSERT INTO voters (password, firstname, lastname, indexnumber, phoneNumber, status) VALUES ('$password', '$firstname', '$lastname', '$matricNumber', '$phone', 'Unvoted')";

		//Check through matricNumber table for existance
    	$checkMatric =mysqli_query($conn,"SELECT * FROM matric_numbers WHERE matricNumber ='$matricNumber'");
        $matricCount=mysqli_num_rows($checkMatric);

		//Matric Number Checking Query
		$checkM =mysqli_query($conn,"SELECT indexnumber FROM voters WHERE indexnumber ='$matricNumber'");
		$mCount=mysqli_num_rows($checkM);

		//Phone Number Checking Query
		$checkphone =mysqli_query($conn,"SELECT phoneNumber FROM voters WHERE phoneNumber ='$phone'");
		$phonecount=mysqli_num_rows($checkphone);
			
		if($matricCount > 0){
			if($phnLength < 10){
				$_SESSION['error'] = 'Phone Number is less than 10 characters!';
			}
			elseif($phonecount>0){
				$_SESSION['error'] = 'Phone Number Already Exist!';
			}
			elseif($mCount>0){
				$_SESSION['error'] = 'Matric Mumber Already Exist!';
			}
			elseif($conn->query($sql)){
				$_SESSION['success'] = 'Voter added successfully!';
			}
			else {
				$_SESSION['error'] = $conn->error;
			}
		}
		else {
			$_SESSION['error'] = 'Matric Number Does Not Exist!';
		}
	}
	header('Location: voters.php');
?>