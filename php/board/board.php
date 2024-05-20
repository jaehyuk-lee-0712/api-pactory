<?php

// 데이터베이스 연결
include "../connection/connection.php";

// 현재 페이지와 페이지당 게시물 수 설정
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$viewNum = 10; // 페이지당 게시물 수

// 게시물 가져오기 쿼리
$offset = ($page - 1) * $viewNum;
$boardQuery = "SELECT * FROM board WHERE boardDelete = 1 ORDER BY boardID DESC LIMIT $offset, $viewNum";
$boardResult = $connection->query($boardQuery);

// 총 게시물 수 쿼리
$totalPostsQuery = "SELECT COUNT(*) as total FROM board WHERE boardDelete = 1";
$totalPostsResult = $connection->query($totalPostsQuery);
$totalPosts = $totalPostsResult->fetch_assoc()['total'];

// 총 페이지 수 계산
$boardTotalCnt = ceil($totalPosts / $viewNum);
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
                <h2 class="intro__title">공지사항</h2>
            </div>
            <!-- //intro__wrap -->

            <section class="board__wrap">
                <h2 class="blind">공지사항</h2>
                <div class="board__inner">
                    <div class="board__search">
                        <div class="left">
                            * 총 <?php echo $totalPosts; ?>건의 게시물이 등록되어 있습니다.
                        </div>
                        <div class="right">
                            <form action="#" name="#" method="get">
                                <fieldset>
                                    <legend class="blind">게시판 검색 영역</legend>
                                    <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요!" required>
                                    <button type="submit" class="btn__style">검색</button>
                                    <button type="button" class="write__btn">글쓰기</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- //board__search -->

                    <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 63%;">
                                <col style="width: 10%;">
                                <col style="width: 15%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>작성자</th>
                                    <th>작성일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($boardResult->num_rows > 0): ?>
                                    <?php while ($row = $boardResult->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $row['boardID']; ?></td>
                                            <td><a href="boardView.php?boardID=<?php echo $row['boardID']; ?>"><?php echo htmlspecialchars($row['boardTitle']); ?></a></td>
                                            <td><?php echo htmlspecialchars($row['userID']); ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($row['regTime'])); ?></td>
                                            <td><?php echo $row['boardView']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="5">게시물이 없습니다.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- //board__table -->

                    <div class="board__pages">
                        <ul>
                            <?php
                            $pageView = 4;
                            $startPage = $page - $pageView;
                            $endPage = $page + $pageView;
                            $nextPage = $page + 1;
                            $beforePage = $page - 1;

                            if ($startPage < 1) $startPage = 1;
                            if ($endPage > $boardTotalCnt) $endPage = $boardTotalCnt;

                            // 처음으로/ 이전
                            if ($page > 1) {
                                echo "<li class='first'><a href='board.php?page=1'>처음으로</a></li>";
                                echo "<li class='first'><a href='board.php?page={$beforePage}'>이전</a></li>";
                            }

                            // 페이지 번호
                            for ($i = $startPage; $i <= $endPage; $i++) {
                                $active = ($i == $page) ? "active" : "";
                                echo "<li><a class='{$active}' href='board.php?page={$i}'>{$i}</a></li>";
                            }

                            // 다음/ 마지막으로
                            if ($page < $boardTotalCnt) {
                                echo "<li class='first'><a href='board.php?page={$nextPage}'>다음</a></li>";
                                echo "<li class='end'><a href='board.php?page={$boardTotalCnt}'>마지막으로</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- //board__pages -->
                </div>
            </section>
            <!-- //board__wrap -->
        </div>
    </main>
    <!-- //main -->
    <?php include "../component/footer.php"; ?>
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
