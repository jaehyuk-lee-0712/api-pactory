<?php
    include "../connection/connection.php";

    $type = $_POST['type'];
    $userPass = $_POST['userPass'];
    $userID = $_POST['userID'];

    $jsonResult = "bad";

    if(isset($userPass)) {
        $hashePass = password_hash($userPass , PASSWORD_DEFAULT) ;

        $sql ="UPDATE member set userPass = '$hashePass' where userID = $userID";

        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            // prepare가 실패한 경우
            echo "데이터베이스 쿼리 준비에 실패했습니다." . $connection->error;
            echo $sql;
            exit;
        }

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $jsonResult = "success";
            } else {
                $jsonResult = "변경된 행이 없습니다.";
            }
        } else {
            $jsonResult = "쿼리 실행에 실패했습니다: " . $stmt->error;
        }
    
        $stmt->close();
    }


    echo json_encode(array("result" => $jsonResult));  
?>