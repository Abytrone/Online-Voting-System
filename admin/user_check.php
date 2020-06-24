<?php
    include 'includes/session.php'; 

        //$date = date('y')-1;
		// $a = $date;
		// $b = $date-1;
		// $c = $date-2;
		// $firstYear = "08".$a;
		// $secondYear = "08".$b;
		// $thirdYear = "08".$c;

    //Index Number verification
    if(isset($_POST['indexnumber'])){
    $matricNumber = $_POST['indexnumber'];

    //Check through matricNumber table for existance
    $checkMatric =mysqli_query($conn,"SELECT * FROM matric_numbers WHERE matricNumber ='$matricNumber'");
            $matricCount=mysqli_num_rows($checkMatric);
    
        if ($matricCount > 0) {
            echo "<span style='color:green'>Matric Number Valid!</span>";
        } else {
			echo "<span style='color:red'>Matric Number Invalid!</span>";
        }
    }

    //Phone Number verification
    if(isset($_POST['phoneNumber'])){
        $phoneNumber = $_POST['phoneNumber'];
        $phnLength = strlen($phoneNumber);

            $checkphone =mysqli_query($conn,"SELECT phoneNumber FROM voters WHERE phoneNumber ='$phoneNumber'");
            $phonecount=mysqli_num_rows($checkphone);

            if ($phnLength < 10) {
                echo "<span style='color:red'>Phone Number Less Than 10 Digits!</span>";
            } 
            else {
                echo "<span style='color:green'>Phone Number Okay!</span>";
            }
        }