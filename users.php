<!-- <div>-->
<?php include('components/head.inc.php')?>
<?php include 'components/navbar.php' ?>

<?php
session_start();

include("connection.php");
include("functions.php");

if(isset($_POST['submitSearch'])
    //$_SERVER['REQUEST_METHOD']=="POST" && $_POST['search']
    ){
    $search = $_POST['search'];
    //echo 'In post';
    //echo $search;
    if(!empty($search)){
        if(!is_numeric($search)){
         //   echo 'In post1 ';
            $query = "select * from user where first_name = '$search'
            OR email = '$search'";
        }
        else{
          //  echo 'In post2';
            $query = "select * from user where  home_phone = '$search'";
        }
     
        $result = mysqli_query($con, $query);
        if($result){
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
              //      var_dump($user_data);
                foreach (  $user_data  as $key => $value)
                echo $key.'='.$value.'<br />';

            }
            else{
                echo "No Results found!";
            }


        }
      // header("Location: users.php");
	//	die;
	} else {
		echo "No Results found!";
	}


}

if ($_SERVER['REQUEST_METHOD'] == "POST" &&  isset($_POST['submit'])) {
	//something was posted
	$first_name = $_POST['first_name'];
	$password = $_POST['password'];
    $last_name = $_POST['last_name'];
    $address= $_POST['address'];
    $email= $_POST['email'];
    $home_phone = $_POST['home_phone'];
    $cell_phone= $_POST['cell_phone'];

	if (!empty($first_name) && !empty($password) && !is_numeric($first_name) && !empty($last_name)
    && !empty($address) && !empty($email) && !empty($home_phone) && !empty($cell_phone)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into user (user_id,first_name,password,last_name,address,email,home_phone,cell_phone) values 
        ('$user_id','$first_name','$password',' $last_name','$address','$email','$home_phone','$cell_phone')";

		mysqli_query($con, $query);
        echo 'Record Added Successfully!';
		//header("Location: users.php");
     
		die;
	} else {
		echo "Please enter some valid information!";
	}
}

?>
<?php include('components/head.inc.php') ?>

<form action="users.php" method="POST">
<label for="search"></label>
		<div class="col-sm-6" style="display:inline;">
        <input id="search" type="text" name="search" placeholder="Type here Name, Email or Home Phone">
		</div>
        <div style="display:inline;">
<input id="submit" type="submit" value="Search" name="submitSearch">
</div>
</form>


<form method="post">
		<div class="card mx-auto" style="width: 40rem;">
		<div class="card-body">
		<div class="form-group row">
		<label for="first_name" class="col-sm-4">First Name</label>
		<div class="col-sm-6">
			<input id="text" type="text" name="first_name">
		</div>
		</div><br><br>
        <div class="form-group row">
		<label for="last_name" class="col-sm-4">Last Name</label>
		<div  class="col-sm-6">
			<input id="text" type="text" name="last_name"><br><br>
		</div>
		</div>
        <br/><br/>
        <div class="form-group row">
		<label for="password" class="col-sm-4">Password</label>
		<div  class="col-sm-6">
			<input id="text" type="password" name="password"><br><br>
		</div>
		</div>
        <div class="form-group row">
		<label for="email" class="col-sm-4">Email</label>
		<div  class="col-sm-6">
			<input id="text" type="text" name="email"><br><br>
		</div>
		</div>
        <br/><br/>
        <div class="form-group row">
		<label for="address" class="col-sm-4">Home Address</label>
		<div  class="col-sm-6">
			<input id="text" type="text" name="address"><br><br>
		</div>
		</div>
        <br/><br/>
        <div class="form-group row">
		<label for="home_phone" class="col-sm-4">Home Phone</label>
		<div  class="col-sm-6">
			<input id="text" type="text" name="home_phone"><br><br>
		</div>
		</div>
        <br/><br/>
        <div class="form-group row">
		<label for="cell_phone" class="col-sm-4">Cell Phone</label>
		<div  class="col-sm-6">
			<input id="text" type="text" name="cell_phone"><br><br>
		</div>
		</div>
        <br/><br/>
		<div class="row d-flex justify-content-center">
			<button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
		</div>
		</div>
		</div>
	</form>
</body>


<!-- </html> -->




















<!-- </div> -->