<?php
    include "../connection/connection.php";

    $type = $_POST['type'];
    $jsonResult = "bad";

    if( $type == "isEmailCheck" ) {
        $userEmail = $connection -> real_escape_string(trim($_POST['userEmail']));
        $sql = "SELECT userEmail FROM member WHERE userEmail = '{$userEmail}'";
    }

    $result = $connection -> query($sql);
    
    if($result -> num_rows == 0){
        $jsonResult = "good";
    }

    echo json_encode(array("result" => $jsonResult));
?> 