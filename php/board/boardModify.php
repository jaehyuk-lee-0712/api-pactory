<?php
    include "../connection/connection.php";

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>공지사항 수정</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <?php include "../component/head.php" ?>
</head>

<body>
    <!-- // skip -->
   <?php include "../component/header.php" ?>
    <!-- // header -->

    <main id="main" role="main">
        <div class="container">
            <div class="intro__inner">
                <div class="intro__img2"></div>
                <h2 class="intro__title">공지사항 수정</h2>
            </div>
            <!-- // intro end -->
            <div class="board__inner">
                <div class="board__write">
                    <form action="boardModifySave.php" name="boardWriteSave" method="post">
                        <fieldset>
                        <legend class="blind">
                                게시글 작성하기
                        </legend>
<?php

    $boardID = $_GET['boardID'];

    $sql  = "SELECT * from board where boardID = {$boardID}";
    $result = $connection -> query($sql);

    if($result) {
        $info = $result ->fetch_array(MYSQLI_ASSOC);

        echo "<div style='display:none'><label for='boardID'>번호</label><input type = 'text' id='boardID' class='input-style' name = 'boardID' value=".$boardID."></div>";
        echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='input-style' value=".$info['boardTitle']."></div>";
        echo "<div><label for='boardContents'>내용</label><textarea type='text' id='boardContents' rows='20' name='boardContents' class='input-style' >".$info['boardContents']."</textarea></div>";
    }

?>
                            
                            
                            <div class="view-btn">
                                <button type="submit" class="write-btn-style">수정하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
   
    <!-- // main -->
    <?php include "../component/footer.php" ?>
    <!-- // footer -->
</body>

</html>