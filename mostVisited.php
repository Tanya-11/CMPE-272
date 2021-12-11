<?php 
      include 'components/head.inc.php';
      include 'components/navbar.php';
      include 'cookies.php';
      include "./read.php";

        $json =  getLastVisitedAll();
        foreach (getLastVisitedAll() as $index => $value) {
           
            $result = fetchProductById($value->{'product_id'});
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["id"];
                $field2name = $row["name"];
?>
<div>
    <a style="text-decoration: none;" href="
            <?php if(isset( $field1name))
            echo   "https://php-tutorial-app.herokuapp.com/product.php?id=". $field1name;
            ?>"> <?php   echo ( $field2name );?> </a>
</div>

<?php
            }


         }

        ?>