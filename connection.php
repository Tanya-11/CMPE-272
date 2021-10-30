<?php

$dbhost = "us-cdbr-east-04.cleardb.com";
$dbuser = "b22944c3c9b6a3";
$dbpass = "91409d10";
$dbname = "heroku_bc909ed51dc1c26";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$con)
{

	die("failed to connect!");
}

