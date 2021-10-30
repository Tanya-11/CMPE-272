<?php 
include 'components/head.inc.php';
include 'components/navbar.php';
include 'cookies.php';

$json =  getLastVisitedAll();

foreach (getLastVisitedAll() as $index => $value) {
   echo $index +1;
?>
    <a style="text-decoration: none;"
        href="
        <?php  echo ($value->{'product_link'}); ?>">
        <?php  echo ($value->{'product_name'})?>
    </a></br>
    <?php
}
?>