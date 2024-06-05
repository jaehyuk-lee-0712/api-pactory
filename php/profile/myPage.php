<?php
    include "../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<?php
    include "../component/headInfo.php";
?>

</head>
<body>
    
<?php
    include "../component/header.php";
?>

    <div id="wrap">
       <div class="changePass" id="changePass">
       <div class="product__container">
            <div class="left">
                <div class="menu">마이페이지</div>
                <div class="Mypage-submenu">
                    <li><a href="#" onclick="showChangePass()" id="changePassLink" value="member">비밀번호변경</a></li>
                    <!-- <li><a href="#" onclick="showLikePage()" id="likePageLink" value="delivery">좋아요 목록</a></li> -->
                </div>
            </div> 
            <div class="right">
                <div class="right__title">
                    <a href="#" class="mypage-title">비밀번호변경</a>
                </div>
                <div class="right__main column4">
                    <div class="myPage__cont">
                        <div class="myPage-container">
                         <form action="change_password.php" method="post">
                                <div class="Mypassbox">
                                    <label for="userPass" class="required">비밀번호</label>
                                    <input type="password" name="userPass" id="userPass" placeholder="현재 비밀번호" autocomplete="off" class="input-style" required>
                                </div>
                                <div class="Mypassbox">
                                    <label for="newPass" class="required">새 비밀번호</label>
                                    <input type="password" name="newPass" id="newPass" placeholder="변경할 비밀번호" autocomplete="off" class="input-style" required>
                                </div>
                                <div class="Mypassbox">
                                    <label for="confirmPass" class="required">새 비밀번호 확인</label>
                                    <input type="password" name="confirmPass" id="confirmPass" placeholder="비밀번호 확인" autocomplete="off" class="input-style" required>
                                </div>
                                <div class="password-change-btn"><button type="submit">비밀번호 변경</button></div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
       </div>

       <!-- <div class="LikePage" id="LikePage" style="display:none;">
        <div class="product__container">
            <div class="left">
                <div class="menu">마이페이지</div>
                <div class="Mypage-submenu">
                    <li><a href="#" onclick="showChangePass()" id="changePassLink2" value="member">비밀번호변경</a></li>
                    <li><a href="#" onclick="showLikePage()" id="likePageLink2" value="delivery">좋아요 목록</a></li>
                </div>
            </div> 
            <div class="right">
                <div class="right__title">
                    <a href="#" class="mypage-title">좋아요 목록</a>
                </div>
                <div class="right__main column4">
                    <div class="myPage__cont">
                        <div class="like-container">
                         <div class="like-list">
                         <img src="../../assets/img/banner1.jpg" alt="좋아요 이미지">
                         <div class="likeList-text">
                         <h2>날씨 api
                         <p>날씨 api는 기상의 흐름을 볼 수 있음날씨 api는 기상의 흐름을 볼 수 있음날씨 api는 기상의 흐름을 볼 수 있음날씨 api는 기상의 흐름을 볼 수 있음날씨 api는 기상의 흐름을 볼 수 있음</p>
                         </h2>
                       
                         </div>

                         </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        </div>
    </div> -->
<?php
    include "../component/footer.php";
?>

<script>
    function showChangePass() {
        document.getElementById('changePass').style.display = 'block';
        document.getElementById('LikePage').style.display = 'none';
        setActiveLink('changePassLink', 'changePassLink2');
    }

    function showLikePage() {
        document.getElementById('changePass').style.display = 'none';
        document.getElementById('LikePage').style.display = 'block';
        setActiveLink('likePageLink', 'likePageLink2');
    }

    function setActiveLink(activeLinkId1, activeLinkId2) {
        var links = document.querySelectorAll('.Mypage-submenu li a');
        links.forEach(function(link) {
            link.classList.remove('active');
        });
        document.getElementById(activeLinkId1).classList.add('active');
        document.getElementById(activeLinkId2).classList.add('active');
    }
</script>

</body>
</html>
