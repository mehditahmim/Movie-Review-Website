<!DOCTYPE html>
<html lang="en">
 <head>
<<?php 
session_start();
if(isset($_SESSION['id'])){
  header('location: list.html');
}

 ?>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">

	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signin</title>
     </head>

<nav class="navbar" id="insidenav">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
     <a  href="signup.php">
    <span class="glyphicon glyphicon-user"></span> Sign Up <span  href = "signup.php"></span></a>
        
      </li>
      </ul>
  </div>
</nav>
  <body>
    <?php  
    if(isset($_GET['msg']) && ($_GET['msg']=="failed")) {
        echo " 
        <div class = 'alert alert-danger'>
        <strong>Danger!  </strong> Wrong Email or password <a href = 'signup.php' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>

        ";
        
       // header("location:signup.php");
    }
    ?>
    
  <div class="row">
   <div class="col-sm-4"></div>
    <div class="col-sm-3">
        <form class="form-signin" action="process_signin.php" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
			 <div class="page-header" style="background:   #b94646"></div>
             <label for="inputEmail" class="sr-only">Email address</label>
             <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
             <label for="inputPassword" class="sr-only">Password</label>
             <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
             <div class="checkbox">
             <label><input type="checkbox" value="remember-me"> Remember me </label>
             <a href="forget.php">/Forgot Password</a>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			
        </form>
    </div>
  </div>
  </body>

<!--<link href="css/signin.css" rel="stylesheet">-->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">

</html>