<?php
include "../connection/connection.php";

$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : 1;
$boardTitle = mysqli_real_escape_string($connection, $_POST['boardTitle']);    
$boardContents = mysqli_real_escape_string($connection, $_POST['boardContents']);
$regTime = time();

if (empty($boardTitle) || empty($boardContents)) {
    echo "<script>alert('제목 또는 내용을 작성해주시기 바랍니다.')</script>";
    echo "<script>window.history.back()</script>";
} else {
    $sql = "INSERT INTO board (userID, boardTitle, boardContents, regTime) VALUES (?, ?, ?, ?)";
    
    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("isss", $userID, $boardTitle, $boardContents, $regTime);
        $result = $stmt->execute();
        
        if (!$result) {
            die("쿼리 실행에 실패했습니다. : " . $stmt->error);
        } else {
            echo "<script>alert('게시글이 성공적으로 작성되었습니다.')</script>";
            echo "<script>window.location.href = 'board.php'</script>";
        }
        $stmt->close();
    } else {
        die("쿼리 준비에 실패했습니다. : " . $connection->error);
    }
}

$connection->close();
?>