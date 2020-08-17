<?php 

include_once('config.php');
session_start();
$id = $_SESSION['id'];


if(isset($_SESSION['id']) ) {

	$get_userinfo = "select * from users where id = $id";

	$result = mysqli_query($db1,$get_userinfo);
	$row = mysqli_fetch_array($result);

}
else{
	header("location: login.php?msg=please_login");
}





 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 	<title>Profile- <?php echo $row['name']; ?></title>
 </head>
 <body>
 <div id="nav">
    <nav class="navbar">
        
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="list.html">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>

<div class="container-fluid" id="content">

<aside class="col-sm-3" role="complementary">
    <div class="region region-sidebar-first well" id="sidebar">
     <h3 style="color: green" class="text-center" > Welcome <?php echo $row['name']; ?> </h3>
     </div>

  <!-- profile pic -->
    <div class="thumbnail text-center">
        <div class="img thumbnail">
        	<?php         
             	echo" <img src='movie posters/defaultpic.png'>";

              
         		    
           ?>
           
        </div>
         <strong><?php echo $row['name']; ?> </strong>
          <!-- Button trigger modal -->
         
<!--------------------------- profile pic --------------------------------------- -->

</aside>
<!-- profile pic -->

<section class="col-sm-7">
<div id="searchcontent">



<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details">Your Profile</a></li>
   

    
</ul>

<!------------------------------------------------------------------------------- -->

    <div class="tab-content">

<!------------------------------------------------------------------------------- -->

        <div id="details" class="tab-pane fade in active" style="margin-top: 50px;">
        <h3> Your Profile</h3>
        <table class="table" >
        <tr>
            <td class="tbold">Full Name:</td>
            <td><?php echo $row['name']; ?></td>

        </tr>
        <tr>
            <td class="tbold">Email:</td>
            <td><?php echo $row['last_name']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Phone:</td>
            <td><?php echo $row['email']; ?></td>
       </tr>
    </table>
</div> <!-- profile -->
   


 



 </body>
 <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
 <script src="search.js"></script>
 <script src="js/jquery-1.12.0.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 </html>