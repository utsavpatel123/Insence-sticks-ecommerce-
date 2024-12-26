<?php

$server = "localhost";
$userName = "root";
$password = "";
$dbName = "isdb";

$con = mysqli_connect($server,$userName,$password,$dbName);

if (!$con) {
    die("Connection is Failed!");
}

?>