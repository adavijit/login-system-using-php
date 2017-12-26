<?php
  include 'server.php';
if(isset($_POST['sub']))
{

  $uid=mysqli_real_escape_string($conn,$_POST['id']);
  $pwd=mysqli_real_escape_string($conn,$_POST['password']);
  $sql="SELECT * FROM login_system WHERE email='$uid';";
  $result=mysqli_query($conn,$sql);
  $resultCheck=mysqli_num_rows($result);
  if($resultCheck<1)
  {
      header("location: index.php?login1=error");
      exit();session_start();
  }
  else {
      if($row=mysqli_fetch_assoc($result))
      {
      //  $hashed_check=password_verify($pwd,row['pass']);
        if($pwd!=$row['pass']){
          header("location: index.php?login2=error");
          exit();
        }
          else
          {
            /*$_SESSION['mail']=row['email'];?login3=error
              $_SESSION['pw']=row['pass'];
                $_SESSION['mail']=row['firstName'];
                  $_SESSION['mail']=row['lastName'];
                  header("location pp.html");
                  exit();*/
                  header("location: pp.php?login=success");
                  exit();
          }
      }
  }
}
else {
  header("location: index.php?login3=error");
  exit();
}
?>
