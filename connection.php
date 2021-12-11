<?php

$dbhost = "cmpe-272.ci6br9aurtlu.us-east-2.rds.amazonaws.com";
$dbuser = "admin";
$dbpass = "cmpe272sjsu";
$dbname = "marketplace";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}