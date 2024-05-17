<header id="header">
    <div id="logos">
        <div id="logo"></div>
        <div id="title">
            <h2><a href="/">apiPactory</a></h2>
        </div>
        <div id="menu">
            <ul>
                <li><a href="#">api 상품</a></li>
                <li><a href="#">카테고리</a></li>
                <li><a href="#">공지사항</a></li>
            </ul>
        </div>
    </div>
    <div id="controller">
        <div id="searchBar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="검색어를 입력하세요" class="search-input">
        </div>
<?php
    if(isset($_SESSION['userID'])) {
?>            
        <a href="php/login/logOutAction.php">로그아웃</a>
<?php
    }else {
?>
        <a href="php/login/login.php">로그인</a>
        <a href="#">회원가입</a>
<?php
    }
?>

    </div>
</header>