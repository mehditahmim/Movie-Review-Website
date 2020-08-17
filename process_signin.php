<?php 
include_once('config.php');

$email = $_POST['email'];
$pass  = $_POST['password'];
$hash_pass = md5($pass);
$get_user = "SELECT * FROM users WHERE email = '$email'";
$result_set = mysqli_query($db1,$get_user);
$result=mysqli_fetch_array($result_set,MYSQLI_ASSOC);

if(($result>0) && ($hash_pass == $result['password'] )){
  session_start();
  $_SESSION['id'] = $result['id'];
  $_SESSION['name'] = $result['name'];
  header("Location:list.html");
  
}
  else{
    header('location:signin.php?msg=failed');
  }
  




 ?>

 
