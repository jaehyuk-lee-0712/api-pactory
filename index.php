<?php
    include "php/connection/connection.php";
?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apiPactory</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
</head>

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
                    <li><a href="php/board/board.php">공지사항</a></li>
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
         <div class="login-button">
            <a href="php/login/login.php?action=login">로그인</a>
        </div>
        <div class="signup-button">
            <a href="php/login/login.php?action=signup">회원가입</a>
        </div>
<?php
    }
?>

        </div>
    </header>
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
                <div class="category-bar">
                    <ul>
                        <li>
                            <a href="#"><img src="assets/img/category-icon1.png" alt="이미지"><span>쇼핑</span></a>
                            <a href="#"><img src="assets/img/category-icon2.png" alt="이미지"><span>뉴스</span></a>
                            <a href="#"><img src="assets/img/category-icon3.png" alt="이미지"><span>지도</span></a>
                            <a href="#"><img src="assets/img/category-icon4.png" alt="이미지"><span>은행</span></a>
                            <a href="#"><img src="assets/img/category-icon5.png" alt="이미지"><span>날씨</span></a>
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
                            <a href="#"><img src="assets/img/notice1.jpg" alt="이미지"><span>Maps API</span></a>
                            <a href="#"><img src="assets/img/notice2.jpg" alt="이미지"><span>News API</span></a>
                            <a href="#"><img src="assets/img/notice3.jpg" alt="이미지"><span>Bank API</span></a>
                            <a href="#"><img src="assets/img/notice4.jpg" alt="이미지"><span>Weather API</span></a>
                            <a href="#"><img src="assets/img/notice5.jpg" alt="이미지"><span>Shppping APi</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="footer__container">
            <div id="f_logos">
                <div id="ftitle">2024<em> apiPactory</em></div>
                <div id="flogo"></div>
                <ul class="follow">
                    <!-- <li><a href="#">Follow us on</a></li> -->
                    <li class="icon"><a href="#"><img src="assets/img/snsLogo1.png" alt="로고"></a></li>
                    <li class="icon"><a href="#"><img src="assets/img/snsLogo2.png" alt="로고"></a></li>
                    <li class="icon"><a href="#"><img src="assets/img/snsLogo3.png" alt="로고"></a></li>
                    <li class="icon"><a href="#"><img src="assets/img/snsLogo4.png" alt="로고"></a></li>
                </ul>
            </div>
        </div>
    </footer>
    </footer>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
               
            });

            function goSignUp() {
                document.getElementById('loginForm').style.display = 'none';
            }
    </script>
     <script>
             document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.getElementById('loginBtn');
            const signupBtn = document.getElementById('signupBtn');
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');

            loginBtn.addEventListener('click', function(e) {
                e.preventDefault();
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            });

            signupBtn.addEventListener('click', function(e) {
                e.preventDefault();
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            });
        });
    </script>
</body>

</html>