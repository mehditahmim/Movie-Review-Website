<?php
include_once('config.php');
//session_start();
function setComments($mov_name, $db1){

    static $foo_called = false;
    if (!$foo_called) {
        $foo_called = true;

        if(isset($_POST['commentSubmit']))
	{
		
		$msg = $_POST['message'];
		$user_id = $_SESSION['id'];
		$rev_id = $_POST['reviewId'];
		$date_time = $_POST['date_time'];
        
		$insert_comment = "INSERT INTO comments(id,movie_name,review_id, comment,date) VALUES($user_id, '$mov_name', $rev_id,'$msg','$date_time') ";
		$res = mysqli_query($db1, $insert_comment  );

	}
        
    }


	
}
function  getComments($m_name,$r_id,$db1){
	
  $fetch_comment_attributes = "SELECT * FROM comments WHERE review_id = $r_id AND movie_name = '$m_name' ";
  $comment_attributes = mysqli_query($db1, $fetch_comment_attributes);
  while($attributes = mysqli_fetch_array($comment_attributes)){

  	$person_id = $attributes['id'];
  	$get_name = "SELECT name from users WHERE id = $person_id";
  	$user_details = mysqli_query($db1, $get_name);
  	$array_res = mysqli_fetch_array($user_details);
?> 
    <div class= "bubble-list">
      <div class="bubble clearfix">  
      <div class="bubble-content">
        <div class="point"></div>	
  	<b style="font-size:14px;"><?=$array_res['name'];?> </b> </h4>
  	<br>
  	<p><?=$attributes['date']; ?></p>
	<p><?=$attributes['comment']; ?></p>

</div>
</div>
  	 

<?php      
  }
  
  


}
?>

<!DOCTYPE html>
<html>
<head>
	<title> comments</title>
	<style type="text/css">
		

.bubble-content {
position:relative;
float:left;
margin-left:12px;
width:400px;
padding:0px 20px;
border-radius:10px;
background-color:#FFFFFF;
box-shadow:1px 1px 5px rgba(0,0,0,.2);
}
.bubble {
    margin-top:20px;
    }
.point {
  border-top:10px solid transparent;
  border-bottom:10px solid transparent;
  border-right: 12px solid #FFF;
  position:absolute;
  left:-10px;
  top:12px;
  } 


.clearfix:after {
    visibility:hidden;
    display:block;
    font-size:0;
    content: “.”;
    clear:both;
    height:0;
    line-height:
    }
.clearfix {
     display: inline-block;
     }
* html .clearfix {
       height: 1%;
       }
	</style>
</head>
<body>

</body>
</html> 






 