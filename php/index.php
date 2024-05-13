<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apiPactory</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
</head>

<?php
    include "php/connection/connection.php";
?>

<body>
    <header id="header">
        <div id="logos">
            <div id="logo"></div>
            <div id="title">
                <h2><a href="#">apiPactory</a></h2>
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


            <!-- <div id="profile">
            </div> -->
        </div>
    </header>
    <!-- <?php

        include "php/component/header.php";

    ?> -->
    <main id="main">
        <div class="main-container">
            <div class="content1">
                <div class="h3">
                    <ul>
                        <li><a href="#">apiPactory에 오신걸 환영합니다.</a></li>
                    </ul>
                </div>
                <div class="p">
                    <ul>
                        <li><a href="#">api를 활용하여 편리하게 작업하세요!</a></li>
                    </ul>
                </div>
                <div class="main-icon">
                    <img src="assets/img/banner1.jpg" alt="이미지">
                    <img src="assets/img/banner2.jpg" alt="이미지">
                    <img src="assets/img/banner3.jpg" alt="이미지">
                    <img src="assets/img/banner4.jpg" alt="이미지">
                    <img src="assets/img/banner5.jpg" alt="이미지">
                </div>
                <div class="main-btn"><a href="#">컬렉션보기</a></div>
            </div>
            <div class="content2">
                <div class="category-title">
                    <li>상위 카테고리</li>
                </div>
                <div class="catefory-bar">
                    <ul>
                        <li>
                            <a href="#"><span>쇼핑</span></a>
                            <a href="#"><span>뉴스</span></a>
                            <a href="#"><span>지도</span></a>
                            <a href="#"><span>은행</span></a>
                            <a href="#"><span>날씨</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content3">
                <div class="recommend-title">
                    <li>추천API</li>
                    <a href="#">더보기</a>
                </div>
                <div class="apibanner">
                    <ul>
                        <li>
                            <a href="#"><img src="assets/img/notice1.jpg" alt="이미지"><span>구글지도 api</span></a>
                            <a href="#"><img src="assets/img/notice2.jpg" alt="이미지"><span>뉴스 api</span></a>
                            <a href="#"><img src="assets/img/notice3.jpg" alt="이미지"><span>은행 api</span></a>
                            <a href="#"><img src="assets/img/notice4.jpg" alt="이미지"><span>기상청 api</span></a>
                            <a href="#"><img src="assets/img/notice5.jpg" alt="이미지"><span>쇼핑 api</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="footer__container">
            <div id="f_logos">
                <div id="flogo"></div>
                <div id="ftitle">
                    <h2><a href="#">apiPactory</a></h2>
                </div>
            </div>
            <div id="contact">
                <ul class="about">
                    <li><a href="#">About</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
                <ul class="community">
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Log in</a></li>
                    <li><a href="#">Sign up</a></li>
                </ul>
                <ul class="businesses">
                    <li><a href="#">Businesses</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
                <ul class="follow">
                    <li><a href="#">Follow us on</a></li>
                    <li class="icon"><a href="#"></a></li>
                    <li class="icon"><a href="#"></a></li>
                    <li class="icon"><a href="#"></a></li>
                </ul>
            </div>
            <div id="rights">
                <h2>© 2024 apiPactory, inc. All rights resrved</h2>
            </div>
        </div>
    </footer>
</body>

</html>