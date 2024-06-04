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
        <div class="product__container">
            <div class="left">
                <div class="menu">마이페이지</div>
                <div class="submenu">
                    <li><a href="#" value="delivery">좋아요 목록</a></li>
                    <li><a href="#" value="member">비밀번호변경</a></li>
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
                                    <label for="userPass" class="required">새 비밀번호</label>
                                    <input type="password" name="newPass" id="newPass" placeholder="변경할 비밀번호" autocomplete="off" class="input-style" required>
                                </div>
                                <div class="Mypassbox">
                                    <label for="userPass" class="required">새 비밀번호 확인</label>
                                    <input type="password" name="confirmPass" id="confirmPass" placeholder="비밀번호 확인" autocomplete="off" class="input-style" required>
                                </div>
                                <div class="password-change-btn"><button >비밀번호 변경</button></div>
                            </form>
                        </div>
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
