<?php
  include "config.php";
  

  if (isset($_POST['create'])) {
    

  	$first_name = $_POST["fisrt_name"];
  	$last_name =  $_POST["last_name"];
  	$email =  $_POST["Email"];
  	$password1 = $_POST["pass1"];
  	$password2 = $_POST["pass2"];
  	if($password1 != $password2){
  		/*echo " 
        <div class = 'alert alert-danger'>
        <strong>Danger!  </strong> Passwords don't match <a href = '' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>

        ";*/
        header("Location: signup.php?msg=passnotmatched");

  		
         
  		}
  		else{
        
        $password = md5($password1);
      $add_user = "INSERT INTO users(name,last_name,email, password) VALUES ('$first_name','$last_name','$email','$password') ";
      $result = mysqli_query($db1,$add_user);
      if($result == 0)
        header("Location: signup.php?msg=email_error");
      
        
        }

  			
  }

  

?>

