<?php
  include 'includes/session.php';
  if(isset($_POST['add'])){
    //$password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = 'Aites';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $filename = $_FILES['photo']['name'];
    if(!empty($filename)){
      move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
    }
    $sql = "INSERT INTO staff (password, username, photo) VALUES ('$password', '$username', '$filename')";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Staff Added Successfully!';
    }
    else{
      $_SESSION['error'] = $conn->error;
    }
  }
  else{
    $_SESSION['error'] = 'Fill up add form first';
  }
  header('Location: staff.php');
?>