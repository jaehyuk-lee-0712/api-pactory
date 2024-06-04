<?php

$host = "localhost";
$user = "nys060121";
$pw = "dbstj011225!";
$db = "nys060121";

$connection = new mysqli($host , $user , $pw , $db);
$connection -> set_charset("utf8");

session_start();

if($connection -> connect_error) {
    echo "Connect Failed" . $connection -> connect_error;
}

?>

