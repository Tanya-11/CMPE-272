<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "./connection.php";
include "./read.php";

$result = fetchMyUsers($con);

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["users"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
     extract($item); 
    $itemDetails=array(
            "name" => $first_name,
        ); 
       array_push($itemRecords["users"], $itemDetails);
        }    
        http_response_code(200);     
        echo json_encode($itemRecords);
    }else{     
        http_response_code(404);     
        echo json_encode(
        array("message" => "No item found.")
    );
}
