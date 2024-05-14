<?php
    include "../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/logintemp.css">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="wrap">
<?php

    include "../component/header.php";

?>
        <div>
            <!-- login form -->
            <!-- <form action="" id="loginForm">
                <article id="main">
                    <div class="container">
                        <div class="login">
                            <div class="nav">
                                <ul>
                                    <li><a href="/">LOGIN</a></li>
                                </ul>   
                            </div>
                            <div class="idbox">
                                <div>
                                    <input type="email" name="userID" id="userID" placeholder="UserEmail" autocomplete="off"
                                        class="input-style" required>
                                </div>
                            </div>
                            <div class="passbox">
                                <div>
                                    <input type="password" name="userPass" id="userPass" placeholder="UserPassword"
                                        autocomplete="off" class="input-style" required>
                                </div>
                            </div>
                            <div class="forget">
                                <ul>
                                    <li>
                                        <a href="../member/choiceTarget.php">Forget?</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="signup">
                                <ul>
                                    <li><a href="#" onclick="goSignUp()">Signup</a></li>
                                </ul>
                            </div>
                            <div class="confirm">
                                <ul>
                                    <li><a href="#">LOGIN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </form> -->
            <!-- // login form end -->
            
            <!-- // signup form start -->
            <form id="signInForm" action="signUpForm.php" name="signUpForm" method="post">
                <div class="login">
                    <div class="nav">
                        <ul>
                            <li><a href="#">SIGNUP</a></li>
                        </ul>
                    </div>
                    <div class="Userbox">
                        <label for="userEmail" class="required">이메일</label>
                        <div class="check">
                            <input type="email" name="userEmail" id="userEmail" placeholder="이메일을 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                        <p class="msg"></p>
                    </div>
                    <div class="Userbox">
                        <label for="userName" class="required">이름</label>
                        <div class="check">
                            <input type="text" name="userName" id="userName" placeholder="이름을 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                    </div>
                    <div class="Userbox">
                        <label for="userPass" class="required">비밀번호</label>
                        <div class="check">
                            <input type="password" name="userPass" id="userPass" placeholder="비밀번호를 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                    </div>
                    <div class="Userbox">
                        <label for="userBirth" class="required">생년월일</label>
                        <div class="check">
                            <input type="text" name="userBirth" id="userBirth" placeholder="공백없이 8자리를 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                    </div>
                    <input type="submit" class="signup-btn" value="회원가입">
                </div>
            </form>

            <!-- // signup form end -->
        </div>
        </div>
    </div>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
               
            });

            function goSignUp() {
                document.getElementById('loginForm').style.display = 'none';
            }
    </script>
</body>

</html>