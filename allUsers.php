<?php
include('components/head.inc.php');
include ('components/navbar.php');
include ('./read.php')
 ?>

<html>

<body>
    <div style="display: grid;
    width: max-content;
    justify-items: self-end;">
    <table border='2'>
        <thead><b>Company: Cloth Shop</b></thead>
        <tr>
            <!-- <th>id</th> -->
            <th>First Name</th>
            <th>Last Name</th>

        </tr>
        <?php
        session_start();
        include("connection.php");
        include("functions.php");


        $query = "SELECT  * FROM user";


        if ($result = $con->query($query)) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                // $field1name = $row["id"];
                $field2name = $row["first_name"];
                $field3name = $row["last_name"];
                echo "<tr>";
                // echo "<td>" . $field1name . "</td>";
                echo "<td>" .  $field2name . "</td>";
                echo "<td>" . $field3name . "</td>";
                echo "</tr>";
            }

            /* free result set */
            $result->free();
            fetchOthersUsers('http://krishnagupta.live/cmpe272/homework6/userApi.php', 'Krishna');
            fetchOthersUsers('http://manasabobba.live/site/site_final/manasaUsers.php', 'Manasa');
            fetchOthersUsers('http://www.siddharthsircar.live/cmpe272submissions/assignments/homework2/flywithus/company-users.php', 'Siddharth');

        }
        ?>
</div>

</body>

</html>