<?php
include 'includes/session.php';
//CSV Import
if (isset($_POST["upload"])) {
    $fileName = $_FILES["filename"]["tmp_name"];
    if ($_FILES["filename"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        	//generate voters id 
		$set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$password = substr(str_shuffle($set), 0, 8);
            $sqlInsert = "INSERT INTO voters (indexnumber,firstname,lastname,phoneNumber,password,status)
                   VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','$password','Unvoted')";
            $result = mysqli_query($conn, $sqlInsert) or die(mysqli_error($conn));
            if (! empty($result)) {
                echo "<script type='text/javascript'>alert('Data upload successfully!');</script>";
				echo "<script>document.location='voters.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Data upload failed!');</script>";
            }
        }
    }
}
//CSV Import
if (isset($_POST["up"])) {
    $fileName = $_FILES["filename"]["tmp_name"];
    if ($_FILES["filename"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 100000000, ",")) !== FALSE) {
            
            $sqlInsert = "INSERT INTO matric_numbers (classID, matricNumber) 
            VALUES ('".$column[0]."', '".$column[1]."')";
            $result = mysqli_query($conn, $sqlInsert) or die(mysqli_error($conn));
            if (! empty($result)) {
                echo "<script type='text/javascript'>alert('Data upload successfully!');</script>";
                echo "<script>document.location='voters.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Data upload failed!');</script>";
            }
        }
    }
}