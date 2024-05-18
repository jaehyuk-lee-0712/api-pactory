<?php

$host = "localhost";
$user = "dlwogur1215";
$pw = "vmfleja1215#";
$db = "dlwogur1215";

$connection = new mysqli($host , $user , $pw , $db);
$connection -> set_charset("utf8");

session_start();

if($connection -> connect_error) {
    echo "Connect Failed" . $connection -> connect_error;
}

?>

