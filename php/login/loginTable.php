<?php
    include "../connection/connection.php";

    $sql = "CREATE TABLE member (
        userID int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
        userEmail varchar(100) NOT NULL,
        userName varchar(40) NOT NULL,
        userPass varchar(255) NOT NULL,
        userPhone varchar(255) NOT NULL,
        userDelete int(10) DEFAULT '1',
        userModTime int(40) DEFAULT '0',
        regTime int(11) NOT NULL,
        PRIMARY KEY(userID)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $result = $connection -> query($sql);
    if(!$result) {
        die("쿼리 실행에 실패했습니다. : ". $connection->error);
    }
?>