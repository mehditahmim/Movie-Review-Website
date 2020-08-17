<!DOCTYPE html>
<html>
<head>
    <title>Sign up </title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
<style >
    
form {
    width: 300px;
    margin: 0 auto;
}


</style>
</head>

<body>
    <?php 
    session_start();
    if(isset($_SESSION['id'])){
    header('location: list.html');
    }

    if(isset($_GET['msg']) && ($_GET['msg']=="passnotmatched")) {
        echo " 
        <div class = 'alert alert-danger'>
        <strong>Danger!  </strong> Passwords don't match <a href = 'signup.php' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>

        ";
        
       // header("location:signup.php");
    }
    if(isset($_GET['msg']) && ($_GET['msg']=="email_error")) {
        echo " 
        <div class = 'alert alert-danger'>
        <strong>Danger!  </strong> An account already exists with this email! <a href = 'signup.php' class = 'close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>

        ";
        
       // header("location:signup.php");
    }

     ?>

    <div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form METHOD="post" ACTION="process_signup.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-12">
                       <h1 align="center">Sign up </h1>
                       <hr>
                  </div> 
                    <div class="col-sm-12">
                        <label for = "inputFirstname">First name</label>
                        <input type = "text" name="fisrt_name" class="form-control" id="inputFirstname" placeholder="First name" required>
                    </div>
                   
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputlastname">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="inputlastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputEmail">Email</label>
                        <input type="text" name="Email"  class="form-control" id="input_Email" placeholder="Email" required>
                    </div>
                   
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="inputPassword1">Password</label>
                        <input type="Password" name="pass1" class="form-control" id="inputPassword1" placeholder="Password">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                    <label for="inputpassword2">Re-enter Password</label>
                    <input type="password" class="form-control" name="pass2" id="inputpassword2" placeholder="Re-enter password"required>
                     <BR>
                    <a href="signin.php">Already have an account? sign in</a> 
                    </div>
                      
                </div>
                
                
                
                <button class="btn btn-success" type="submit" name = 'create'  id="reg" value="submit">Register</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
