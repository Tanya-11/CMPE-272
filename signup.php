<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$first_name = $_POST['first_name'];
	$password = $_POST['password'];

	if (!empty($first_name) && !empty($password) && !is_numeric($first_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into user (user_id,first_name,password) values ('$user_id','$first_name','$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>
<?php include('components/head.inc.php') ?>
<form method="post">
		<div class="card mx-auto" style="width: 22rem;">
		<div class="card-body">
		<div class="form-group row">
		<label for="first_name" class="col-sm-4">User Name</label>
		<div class="col-sm-6">
			<input id="text" type="text" name="first_name">
		</div>
		</div><br><br>
		<div class="form-group row">
		<label for="password" class="col-sm-4">Password</label>
		<div  class="col-sm-6">
			<input id="text" type="password" name="password"><br><br>
		</div>
		</div>
		<div class="row d-flex justify-content-center">
			<button type="submit" class="btn btn-primary">SignUp</button><br><br>
		</div>
		</div>
		</div>
	</form>
</body>

</html>