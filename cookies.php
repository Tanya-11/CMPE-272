<?php
include 'connection.php';
include 'functions.php';
define("RECENT_PRODUCT_COUNT", 5);
define("PRODUCT_KEY", "productsVisited");
function addLastVisited($productName, $productLink)
{

    $item = (object)[
        'product_name' => $productName,
        'product_link' =>  $productLink
    ];
     
   // var_dump($item);
    $productArray = array($item);
    foreach (getLastVisitedAll() as $index => $value) {
    //     echo 'Testing';
    //    echo $index;
    //   echo ($value->{'product_name'});
        if ($value->{'product_link'} !== $productLink) {

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