<?php
include "../connection/connection.php";

$boardID = mysqli_real_escape_string($connection, $_POST['boardID']);
$boardTitle = mysqli_real_escape_string($connection, $_POST['boardTitle']);
$boardContents = mysqli_real_escape_string($connection, $_POST['boardContents']);

// 게시글 수정
$sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = {$boardID}";
$connection->query($sql);

if ($connection->affected_rows > 0) {
    echo "<script>alert('게시글 수정 완료.')</script>";
    echo "<script>window.location.href='board.php'</script>";
} else {
    echo "<script>alert('게시글 수정에 실패했습니다.')</script>";
    echo "<script>window.history.back()</script>";
}
?>
