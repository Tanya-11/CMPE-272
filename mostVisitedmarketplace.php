<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "./connection.php";
include "./cookies.php";

$results = json_decode(json_encode(getLastVisitedAll()), true);
foreach($results as $result) {
   echo $result ["product_id"];
   echo "\n";
}