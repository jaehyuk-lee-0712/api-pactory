<?php

$host = "localhost";
$user = "meowon1019";
$pw = "eodnjdl1019!";
$db = "meowon1019";

$connection = new mysqli($host , $user , $pw , $db);
$connection -> set_charset("utf8");

session_start();

if($connection -> connect_error) {
    echo "Connect Failed" . $connection -> connect_error;
}

?>

