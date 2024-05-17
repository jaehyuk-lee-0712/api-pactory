<?php

// 데이터베이스 연결
include "../connection/connection.php";

// 게시물 가져오기 쿼리
$boardQuery = "SELECT * FROM board WHERE boardDelete = 1 ORDER BY boardID DESC";
$boardResult = $connection->query($boardQuery);

// 총 게시물 수 쿼리
$totalPostsQuery = "SELECT COUNT(*) as total FROM board WHERE boardDelete = 1";
$totalPostsResult = $connection->query($totalPostsQuery);
$totalPosts = $totalPostsResult->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="ko">
<link rel="stylesheet" href="../../assets/css/style.css">

<head>
<?php include "../component/head.php"; ?>
</head>



<body>
    <?php include "../component/header.php" ?>

    <main id="main" role="main">
    <div class="board-container">
        <div class="intro__inner">
            <h2 class="intro__title">공지사항</h2>
        </div>
        <!-- //intro__wrap -->

        <section class="board__wrap">
            <h2 class="blind">공지사항</h2>
            <button type="submit" class="write__btn">글쓰기</button>
            <div class="board__inner">
                <div class="board__search">
                <div class="left">
                            * 총 <?php echo $totalPosts; ?>건의 게시물이 등록되어 있습니다.
                        </div>
                    <div class="right">
                        <form action="#" name="#" method="get">
                            <fieldset>
                                <legend class="blind">게시판 검색 영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword"
                                    placeholder="검색어를 입력하세요!" required>
                                <select name="searchOption" id="searchOption">
                                    <option value="10">10개</option>
                                    <option value="25">25개</option>
                                    <option value="50">50개</option>
                                </select>
                                <button type="submit" class="btn__style">검색</button>
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
                                            <td><?php echo date('Y-m-d', $row['regTime']); ?></td>
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
                        <li class="first"><a href="#">처음으로</a></li>
                        <li class="prev"><a href="#">이전</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li class="next"><a href="#">다음</a></li>
                        <li class="last"><a href="#">마지막으로</a></li>
                    </ul>
                </div>
                <!-- //board__pages -->
            </div>
        </section>
        <!-- //board__wrap -->
    </div>
</main>
    <!-- //main -->
 <?php include "../component/footer.php" ?>
</body>

</html>