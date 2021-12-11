<?php 
include 'components/head.inc.php';
include 'components/navbar.php';
include 'cookies.php';

$json =  getLastVisitedAll();

foreach (getLastVisitedAll() as $index => $value) {
   
?>
<div> <?php  echo ($value->{'product_id'}); ?>
</div>
<?php
}
?>