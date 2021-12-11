<?php
include 'connection.php';
include 'functions.php';
define("RECENT_PRODUCT_COUNT", 5);
define("PRODUCT_KEY", "productsVisitedtanya");
function addLastVisited($id)
{

    $item = (object)[
        // 'product_name' => $productName,
        'product_id' =>  $id
    ];
     
   // var_dump($item);
    $productArray = array($item);
    foreach (getLastVisitedAll() as $index => $value) {
        //  echo $id;
    //    echo $index;
 // echo ($value->{'product_id'});
        if ($value->{'product_id'} !== $id) {

            array_push($productArray, $value);

            if (count($productArray) >= RECENT_PRODUCT_COUNT) {
                break;
            }

        }
    }

    setcookie(PRODUCT_KEY, json_encode($productArray), time() + 360000, '/');
}


function getLastVisitedAll()
{
    if (isset($_COOKIE[PRODUCT_KEY])) {
        return json_decode($_COOKIE[PRODUCT_KEY]);
    } else {
        return array();
    }

}

?>