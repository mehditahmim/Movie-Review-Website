<?php 
session_start();
include_once('config.php');
include_once('comments.php');
$user_id = $_SESSION['id'];

date_default_timezone_set("Asia/Dhaka");

$id = $_GET['id']; //gets the movie name
$query = "SELECT * FROM movies WHERE movie_name = '$id' "; //this query retrieves all info regarding this particular 

$result_set = mysqli_query($db1,$query);

$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
$image  =  $result['poster'];                           //getting image directory from the database
$desc = $result['description'];                        //getting description of the movie from the database
$movie_name = $result['movie_name'];
$genre = $result['genre'];

if(isset($_POST['pressed']) && !empty($_POST['review'])){

    $review = $_POST['review'];
    
    
    $check_user = "SELECT id FROM reviews WHERE id = '$user_id' AND movie_name = '$id'";

    $result_set = mysqli_query($db1,$check_user );
    //$result=mysqli_fetch_array($result_set,MYSQLI_ASSOC);

    if(mysqli_num_rows($result_set) == 0){
    	$date = $_POST['date'];
      
    	insertReviews($user_id,$id,$review,$date,$db1);

		
 }
    
    else{

    	echo '<script language="javascript">';
        echo 'alert("You have posted a review already.")';
        echo '</script>';

    }   
	
}

$get_details = "SELECT * FROM reviews JOIN users on reviews .id = users. id WHERE movie_name = '$id' ";

$details =  mysqli_query($db1,$get_details);





function insertReviews($user_id, $movie_name, $review,$date, $db1) {

	$inserting_review = "INSERT INTO reviews(id,movie_name,date,review)VALUES($user_id,'$movie_name','$date','$review')";
	$upload_review = mysqli_query($db1,$inserting_review);
	
	
	
	if($upload_review){
		echo '<script language="javascript">';
        echo 'alert("Posted")';
        echo '</script>';      
 } 
}


	//$search_user_in_ratingTable = "SELECT user_id FROM ratings WHERE movie = '$movie_name' ";
	//$search_result = mysqli_query($db1,$search_user_in_ratingTable);
	


if(isset($_POST['save'])){

	$rated_index = $_POST['ratedIndex'];
	$mname = $_POST['mname'];
	$uid = $_POST['uid'];
	$rated_index++;
	$search_user_in_ratingTable = "SELECT user_id FROM ratings WHERE movie = '$mname'  AND user_id = $uid ";
	$search_result = mysqli_query($db1,$search_user_in_ratingTable);
	if(mysqli_num_rows($search_result) == 0){
    $insert_rating = "INSERT INTO ratings(user_id,movie,rating)VALUES($user_id,'$mname',$rated_index)";
    $upload_rating = mysqli_query($db1,$insert_rating);
   
	}
 	
 	
	
}
$get_avg_rating = "SELECT count(user_id) as total,  AVG(rating) as averageRating FROM ratings WHERE movie = '$id' ";
$res = mysqli_query($db1, $get_avg_rating);
$fetchAverage = mysqli_fetch_array($res);
$averageRating = $fetchAverage['averageRating'];
$total = $fetchAverage['total'];

 




?>  
<!DOCTYPE html>
<html>
<head>

	<title> review </title>
	
<link rel="stylesheet" type="text/css" href="review.css">	
<style type="text/css">
	.clip-star {
  background: gold;
  clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
  display: inline-block;
  height: 18px;
  width: 18px;
}
.heading {
  font-size: 25px;
  margin-right: 25px;
}
img{
    border-radius:25px;
  }
  .center{
  	text-align: center;
  }
  article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
}
section:after {
  content: "";
  display: table;
  clear: both;
}

</style>

</head>
<body>
	

	<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['name'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"> Profile </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                   </ul>
                </li>
                
            </ul>
<section>
	
  <img src= <?php echo $image; ?> width = "300" height = "300" style ="float: left; margin-right:30px; margin-bottom: 5px; margin-top: 5px; border:solid black 1px; padding: 1px  ">
	
<article>
     <h1> <?php echo $id;  ?> </h1>
     	<br>
	<p><?php echo $desc; ?></p>
	<b>Genre: <?php echo $genre;  ?>

<hr/>
</article>
</section>

	

<div class="col-md-4" >

<span class="fa fa-star fa-2x" data-index = "0"></span>
<span class="fa fa-star fa-2x" data-index = "1"></span>
<span class="fa fa-star fa-2x" data-index = "2"></span>
<span class="fa fa-star fa-2x" data-index = "3"></span>
<span class="fa fa-star fa-2x" data-index = "4"></span>
<BR>

</div>
</div>

<script
  src="http://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

<script type="text/javascript">
/* This javascript code generates the rating stars and stores the rating*/
	var ratedIndex = -1;
	var mname = '<?php echo $id; ?>';
	var uid = '<?php echo $user_id; ?>';
$(document).ready(function(){

	resetStarColor(); 
	/*if(localStorage.getItem('ratedIndex') != null)
		setStars(parseInt(localStorage.getItem('ratedIndex'))); */

	$('.fa-star').on('click',function(){
        ratedIndex  = parseInt( $(this).data('index'));
        //localStorage.setItem('ratedIndex',ratedIndex);
        saveToDb();
	});


	$('.fa-star').mouseover(function(){
		resetStarColor();
       var currentIndex = parseInt($(this).data('index'));
       setStars(currentIndex);

	});

	$('.fa-star').mouseleave(function(){
		resetStarColor();
          if (ratedIndex != -1) {
       	  setStars(ratedIndex);
       }

	});


});
function saveToDb(){
	
	$.ajax({
		url:'review.php',
		method:'post',
		datatype:'json',
		data:{
			save:1,
			ratedIndex : ratedIndex,
			mname:mname,
			uid : uid

			
		}, success: function(data){
			
		}
	});
}
function resetStarColor(){
	$('.fa-star').css('color','grey');
}

function setStars(max){
	   for (var i = 0; i <= max; i++) {
       	     $('.fa-star:eq('+i+')').css('color','gold');	
       }

}
	
</script> 



    <?php $url = "review.php?id=" ; //concetea
          $url .= $id;
           
    ?>
 <div class="col-md-8 ">
	<form method="post" action= "<?php echo $url; ?>">
  	<textarea class="text-center"  name="review" placeholder="Write a Review.." ></textarea>

  	<input type="hidden" name="date" value="<?php echo date("Y-m-d h:i:sa"); ?>">

</div>
    <div class="col-md-12 text-center"> 
    <button class="btn btn-success" type="submit" name = 'pressed'  id="reg" value="submit">post</button>
    </div>

    </form>
  
	
<div class="col-md-4 ">
	<div class="row">
		<div class="col-md-12">	
			<span class="heading">User Rating</span>
		  <b><?php echo round($averageRating,2); ?> <?php echo" average based on ".$total." ratings"; ?></b>

		  <hr style="border:3px solid #f1f1f1">

	  <h3><b>Reviews</b></h3> 

		<?php
		 
			while($rows= mysqli_fetch_array($details)){
				
		?>      
				<strong> <?=$rows['name']; ?> </strong> 
			
				<?php 
				$get_ratings = "SELECT rating from ratings, users WHERE ratings. user_id = ".$rows['id']." AND ratings. movie = '$id'";
				$ratings  = mysqli_query($db1, $get_ratings);

				$r = mysqli_fetch_array($ratings);
				echo $r['rating'] ;?>

				<?php 
				if(mysqli_num_rows($ratings)!=0)

					 echo "<span class='clip-star'></span>";
				  ?>
					 
				<br>
				<p><?=$rows['review']; ?></p>
				<?=$rows['DATE'];?>				

			    <?php 

			    echo 
			    "<form method = 'POST' action = '".setComments($id, $db1)."'>
			    <input type = 'hidden' name = 'reviewId' value = '".$rows['review_id']."'>
			     			   
			     <textarea class='form-control' name='message' id='exampleFormControlTextarea1'  rows='2'></textarea> 
			     <div class='fb-comments' data-href='http://example.com/comments' data-width='100%' data-numposts='5' data-colorscheme='light'></div>
			     <input type='hidden' name='date_time' value='". date("Y-m-d h:i:sa")."'>		    
			     <button type='submit' name = 'commentSubmit' > Comment </button>
				
			     </form>
			          "; 
               
			     getComments($id, $rows['review_id'], $db1); 
			     ?>
			
				<hr>
        <?php } ?>
           </div>
		
	</div>
</div>

	

	


</body>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</html>




