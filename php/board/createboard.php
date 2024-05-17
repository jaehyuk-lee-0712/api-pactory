<?php
    include "../connection/connection.php";

    $sql = "CREATE TABLE board (
        boardID int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
        userID int(10) NOT NULL ,
        boardTitle varchar(100) NOT NULL ,
        boardContents longtext NOT NULL ,
        boardDelete int(10) DEFAULT 1 ,
        boardView int(10) DEFAULT 1 ,
        regTime int(40) NOT NULl ,
        PRIMARY KEY(boardID)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $result = $connection -> query($sql);
    if(!$result) {
        die("쿼리 실행에 실패했습니다. : ". $connection->error);
    }
?>
