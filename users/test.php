<?php
if(isset($_POST['submit'])){
$phone=$_POST['phone'];
$message=$_POST['message'];

foreach($phone as $selected=>$phn){
echo $phn;
var_dump($message[$selected]);
}
}