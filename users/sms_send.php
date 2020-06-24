<?php
include 'includes/session.php';
date_default_timezone_set('Africa/Accra');
// $clientId = '5e1fa06e6fb3b';
// $applicationSecret = '02f9316aa17e460debec1e48d1f84edf';

// BORROWED API DETAILS
$clientId = '5e0630884a789';
$applicationSecret = '2cd38c6f9218486d45d9ec83d494a839';

$url = 'https://app.helliomessaging.com/api/v2/sms';
$currentTime = date('YmdH');
$current = date('d-m-Y');
$hashedAuthKey = sha1($clientId.$applicationSecret.$currentTime);

if(isset($_POST['submit'])){
	$phone=$_POST['phone'];

	if ($phone) {
		foreach($phone as $selected=>$phn){
			$pattern = '/^0/';
			$replacement = '233';
			$cusphn= preg_replace($pattern, $replacement, $phn);
			$senderId = 'AitesPoll';
			$msisdn = $cusphn;
			$phone_number = substr($msisdn,0,12);
			$matric_number = substr($msisdn,12,8);
			$password = substr($msisdn,20);
			$credentials = "Matric number:$matric_number Password: $password";

			$params = [
			    'clientId' => $clientId,
			    'authKey' => $hashedAuthKey,
			    'senderId' => $senderId,
			    'msisdn' => $phone_number,
			    'message' => $credentials
			];
			//Check through DB for already sent SMS.
			$checkMsg =mysqli_query($conn,"SELECT msgStatus FROM voters WHERE indexnumber ='$matric_number'");
			$row = $checkMsg->fetch_assoc();
			$SMSstatus = $row['msgStatus'];
			if ($SMSstatus == "0") {
				// $ch = curl_init($url);
				// $payload = json_encode($params);
				// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				//         'Content-Type: application/json',
				//         'Content-Length: ' . strlen($payload))
				// );
				// $result = curl_exec ($ch);
				// echo var_export($result, true);
				// curl_close ($ch);

				$time = date( 'd-m (h:i:s A)', time () );
				foreach ($phone as $key => $fone) {
					$msgUpdate = mysqli_query($conn,"UPDATE voters SET msgStatus = '1', smsDtime = '$time' WHERE indexnumber = '".$matric_number."'") or die(mysqli_error($conn));
					}

				header("Location: voters.php");
				//echo "SMS sent successfully!";
				$_SESSION['success']='SMS sent successfully!';
			}
			elseif ($SMSstatus == "1") {
				header("Location: voters.php");
				//echo " SMS Already Sent!";
				$_SESSION['error']="SMS Already Sent To '".$phone_number."'";
			}
			else {
				echo "Unknown Error";
			}
		}
	}
	else {
		header("Location: voters.php");
		$_SESSION['error']='Please Select At Least One Entry To Send SMS!';
	}
}
//Set Time Zone as this is very important to ensure your messages are delievered on time