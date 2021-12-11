<?php

session_start();

include("connection.php");
        if($con){
            $query = "select * from user";
            $res = mysqli_query($con, $query);
    
            if ($res) {
                if ($res && mysqli_num_rows($res) > 0) {
    
                    $user_data = mysqli_fetch_assoc($res);
                    // var_dump($user_data);
                    // var_dump($res);
                    // echo  mysqli_num_rows($res);
                    echo "<li>". $user_data['first_name'] ."</li>";
                    die;
                }
            }
        }
	else {
		echo "wrong username or password!";
	}

?>