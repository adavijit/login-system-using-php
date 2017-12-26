<?php
include 'server.php';
if(isset($_POST['submit']))
{
  $first=mysqli_real_escape_string($conn,$_POST['firstName']);
    $last=mysqli_real_escape_string($conn,$_POST['lastName']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

  /*if(empty($first)||empty($last)||empty($email)||empty($password))
  {
    header("location: signup.php?signup=empty");
    exit();
  }
    else{
      $sql="SELECT * FROM login_system WHERE email='$email';";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      if($resultCheck>0)
      {
        header("location: signup.php?signup=empty");
        exit();
      }
  else {*/
    $hashed=password_hash($password,PASSWORD_DEFAULT);
    $sqli="INSERT INTO login_system(firstName,lastName,email,pass) VALUES ('$first','$last','$email','$password');";
    mysqli_query($conn,$sqli);
    header("location: signup.php?signup=success");
    exit();
 }
 /*
}
}*/
else{
  header("location: signup.php");
  exit();
}
?>
