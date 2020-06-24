<?php
include 'includes/session.php';
date_default_timezone_set('Africa/Accra');
// $clientId = '5e1fa06e6fb3b';
// $applicationSecret = '02f9316aa17e460debec1e48d1f84edf';

// BORROWED API DETAILS
$clientId = '5e0630884a789';
$applicationSecret = '2cd38c6f9218486d45d9ec83d494a839';

// Prepare data for POST request
$url = 'https://helliomessaging.com/api/v2/sms';
$currentTime = date('YmdH');
$hashedAuthKey = sha1($clientId . $applicationSecret . $currentTime);

if (isset($_POST['send'])) {
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$indexnumber = $_POST['indexnumber'];


	$pattern = '/^0/';
	$replacement = '233';
	$phone = preg_replace($pattern, $replacement, $phone);
	$senderId = 'AitesPoll'; //Change this to your sender ID e.g. HellioSMS
	$msisdn = $phone; //Change this to the recipient you wish to send the message to
	$message = " Matric Number: $indexnumber Password: $password"; //The message to be send here

      $params = [
      'clientId' => $clientId,
      'authKey' => $hashedAuthKey,
      'senderId' => $senderId,
      'msisdn' => $msisdn,
      'message' => $message
      ];

    //Check through DB for already sent SMS.
	$checkMsg =mysqli_query($conn,"SELECT msgStatus FROM voters WHERE indexnumber ='$indexnumber'");
	$row = $checkMsg->fetch_assoc();
	$SMSstatus = $row['msgStatus'];
	if ($SMSstatus == "0") {
		// // Send the POST request with cURL
		// $ch = curl_init($url);
		// $payload = json_encode($params);
		//       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		//       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// 'Content-Type: application/json',
		// 'Content-Length: ' . strlen($payload)
		// ));

		// // Process your response here
		// $result = curl_exec($ch);
		// echo var_export($result, true);
		// curl_close($ch);

		$time = date( 'd-m (h:i:s A)', time () );
		$msgUpdate = mysqli_query($conn,"UPDATE voters SET msgStatus = '1', smsDtime = '$time' WHERE indexnumber = '".$indexnumber."'") or die(mysqli_error($conn));

		header("Location: voters.php");
		//echo "SMS sent successfully!";
		$_SESSION['success']='SMS sent successfully!';
	}
	elseif ($SMSstatus == "1") {

		header("Location: voters.php");
		//echo " SMS Already Sent!";
		$_SESSION['error']="SMS Already Sent To '".$phone."'";
	}
	else {
		echo "Unknown Error";
	}
}
//Set Time Zone as this is very important to ensure your messages are delievered on time