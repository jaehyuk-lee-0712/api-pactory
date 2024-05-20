<?php
// 데이터베이스 연결
include "../connection/connection.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "../component/head.php"; ?>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <?php include "../component/header.php"; ?>
    <main id="main" role="main">
        <div class="board-container">
            <div class="intro__inner">
                <div class="intro__img2"></div>
                <h2 class="intro__title">apiPactory <em>공지사항</em> 작성</h2>
            </div>
            <!-- // intro end -->
            <div class="board__inner">
                <div class="board__write">
                    <form action="boardWriteSave.php" name="boardWriteSave" method="post">
                        <fieldset>
                            <legend class="blind">
                                게시글 작성하기
                            </legend>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" id="boardTitle" name="boardTitle" class="input-style">
                            </div>
                            <div>
                                <label for="boardContents">내용</label>
                                <textarea name="boardContents" id="boardContents" rows="40"
                                    class="input-style"></textarea>
                            </div>
                            <div class="write-btn">
                                <button type="submit" class="write-btn-style">저장하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- // main -->
    <script>
        window.onload = function () {
            document.querySelectorAll(".board__pages>ul>li>a").forEach(function (item) {
                item.addEventListener("mouseover", function () {
                    item.classList.add("active");
                });
                item.addEventListener("mouseout", function () {
                    item.classList.remove("active");
                });
            });
        }
    </script>
</body>
</html>