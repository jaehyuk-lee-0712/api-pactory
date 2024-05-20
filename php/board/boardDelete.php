<?php

    include "../connection/connection.php";

    $boardID = $_GET['boardID'];
    $userID = $_SESSION['userID'];

    // 게시글 소유자 확인

    $sql = "SELECT userID FROM board WHERE boardID = {$boardID} and boardDelete = 1";
    $result = $connection -> query($sql);

    if($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        $boardOwnerID = $info['userID'];

        if($boardOwnerID == $userID) {
            // $sql = "DELETE FROM board where boardID = {$boardID}";

            $sql  = "UPDATE board SET boardDelete = 0 where boardID = {$boardID}";

            $connection -> query($sql);

            echo "<script>alert('게시글이 삭제되었습니다.')</script>";
            

        }else {
            echo "<script>alert('게시글의 소유자만 삭제할 수 있습니다.')</script>";
        }
    }else {
        echo "<script>alert('관리자에게 문의하시길 바랍니다.')</script>";
    }


?>



<!DOCTYPE html>
<html lang="ko">

    <script>
        location.href = "boardList.php";
    </script>
</body>

</html>