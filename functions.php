<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from user where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


// function setReview($con,$rating, $review, $productId){

// 	  $reviewer = $_SESSION['user_name'];
// 	 if (!empty($rating) && !empty($review) && is_numeric($rating)) {
	
// 	  $query = "Update products SET  rating='$rating',review='$review', reviewer='$reviewer' where product_Id='$productId'";
// 	  mysqli_query($con, $query);
// 		  echo 'Record Added Successfully!';   
// 		  header("Location: product".$productId.".php");
// 	  die;	
// 		} 
// 		else {
// 			echo "wrong username or password!";
// 		}
// 	}