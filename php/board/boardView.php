<?php
    include "../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>apiPactory</title>
    <link rel="stylesheet" href="../../assets/css/style.css">

    <?php include "../component/head.php" ?> 
    <!-- 작동안하는듯 이거? -->
</head>

<body>
   <?php include "../component/header.php" ?>
    <!-- // header -->

    <main id="main" role="main">
        <div class="board-container">
            <div class="intro__inner">
                <div class="intro__img2"></div>
                <h2 class="intro__title">apiPactory <em>공지사항</em></h2>
             
            </div>
            <!-- // intro end -->
            <div class="board__inner">
                <div class="board__view">
                    <table>
                        <colgroup>
                            <col style="width: 20%;" />
                            <col style="width: 80%;" />
                        </colgroup>
                        <tbody>
<?php
    $boardID = $_GET['boardID'];

    // 보드뷰 +1 
    $sql = "UPDATE board set boardView = boardView +1 where boardID = {$boardID}";
    $connection -> query($sql);
    
    $sql = "SELECT b.boardTitle, u.userName, b.regTime, b.boardView, b.boardContents FROM board b JOIN member u ON (b.userID = u.userID) WHERE b.boardID = {$boardID}";

    $result = $connection -> query($sql);

    if($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['userName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date("Y-m-d" , $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td>".$info['boardContents']."</td></tr>";
    }
?>
                        </tbody>
                    </table>
                    <div class="view-btn">
                        <a href="boardModify.php?boardID=<?= $_GET['boardID'] ?>" class="write-btn-style">수정하기</a>
                        <a href="boardDelete.php?boardID=<?= $_GET['boardID'] ?>" onclick="return confirm('정말 삭제하시겠습니까?')" class="write-btn-style">삭제하기</a>
                        <a href="board.php" class="write-btn-style">목록보기</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- // main -->
    <?php include "../component/footer.php" ?>
    <!-- // footer -->
</body>

</html>