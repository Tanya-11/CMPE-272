<?php include('components/head.inc.php') ?>
<?php include 'components/navbar.php' ?>



<html>

<body>
    <div>
        <a href="mostVisited.php">Most Visited Items</a>
    </div>
    <table border='2'>
        <thead>Product Catalogue</thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
        </tr>
        <?php
        session_start();
        include("connection.php");
        include("functions.php");


        $query = "SELECT  * FROM products";


        if ($result = $con->query($query)) {

            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["product_Id"];
                $field2name = $row["product_name"];
                $field3name = $row["product_price"];
                echo "<tr>";
                echo "<td><a href='product" . $field1name . ".php' >" . $field1name . "</a></td>";
                echo "<td>" .  $field2name . "</td>";
                echo "<td>" . $field3name . "</td>";
                echo "</tr>";
            }

            /* free result set */
            $result->free();
        }
        ?>

</body>

</html>