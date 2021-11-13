<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<?php include('components/head.inc.php')?>
	<?php include 'components/navbar.php' ?>
	<h1><?php  echo "Hi". " ". $user_data['first_name']; ?></h1>
	<p>Welcome to the online Apparel Store!</p>

</body>

</html>