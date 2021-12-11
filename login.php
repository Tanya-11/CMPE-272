<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$first_name = $_POST['first_name'];
	$password = $_POST['password'];
	if(!empty($first_name) && !empty($password) && !is_numeric($first_name) && $first_name==='admin'){
		header("Location: admin.php");
	}
	else if (!empty($first_name) && !empty($password) && !is_numeric($first_name)) {

		//read from database
		$query = "select * from user where firstName = '$first_name' limit 1";
		$result = mysqli_query($con, $query);

		if ($result) {
			//var_dump($result);
			if ($result && mysqli_num_rows($result) > 0) {
				
				$user_data = mysqli_fetch_assoc($result);
				if ($user_data['password'] === $password) {
					echo "sdfsone";
					$_SESSION['user_id'] = $user_data['id'];
					$_SESSION['user_name'] = $user_data['firstName'];
					header("Location: index.php");
					die;
				}
			}
		}

		echo "wrong username or password!";
	} 
	else {
		echo "wrong username or password!";
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
                <div class="col-sm-6">
                    <input id="text" type="password" name="password"><br><br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Login</button><br><br>
            </div>
            <div class="row d-flex justify-content-center">
                <a href="signup.php">Click to Signup</a>
            </div>
        </div>
    </div>
</form>

</body>

</html>