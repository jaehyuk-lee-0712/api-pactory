<?php
    include "../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>
<body>
    
<?php
    include "../component/header.php";
?>

    <div id="wrap">
        <div class="product__container">
            <div class="left">
                <div class="menu">카테고리</div>
                <div class="submenu">
                    <li><a href="#">지도</a></li>
                    <li><a href="#">날씨</a></li>
                </div>
            </div> 
            <div class="right">
                <div class="right__title">
                    <a href="#">쇼핑</a>
                <select name="#" id="right__select">
                    <option>전체</option>
                    <option value="1">높은 관련성순</option>
                    <option value="2">추천순</option>
                </select>
                </div>
               
                <div class="right__main column4">
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice1.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">구글지도 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice2.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">뉴스 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice3.jpg" alt="뉴스api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">은행 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice4.jpg" alt="은행api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">날씨 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice1.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">구글지도 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice2.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">뉴스 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice3.jpg" alt="뉴스api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">은행 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice4.jpg" alt="은행api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">날씨 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice1.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">구글지도 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice2.jpg" alt="구글api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">뉴스 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice3.jpg" alt="뉴스api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">은행 API</a>
                        </div>
                    </div>
                    <div class="right__cont">
                        <figcaption class="right__img">
                            <img src="../../assets/img/notice4.jpg" alt="은행api">
                        </figcaption>
                        <div class="right__info">
                            <a href="#">날씨 API</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include "../component/footer.php";
?>
</body>

</html>