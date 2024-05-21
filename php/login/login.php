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
            <!-- <form action="loginAction.php" id="loginForm" method ="post">
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
                                    <input type="email" name="userEmail" id="userEmail" placeholder="userEmail" autocomplete="off"
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
                            <div class="submit">
                                    <button class="login__btn" type="submit">로그인</button>
                            </div>
                        </div>
                    </div>
                </article>
            </form> -->
            <!-- // login form end -->
            
            <!-- // signup form start -->
            <form id="signInForm" action="signUpForm.php" name="signUpForm" method="post" onsubmit="return joinChecks()">
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
                        <p class="msg" id="userEmailComment"></p>
                    </div>
                    <div class="Userbox">
                        <label for="userName" class="required">이름</label>
                        <div class="check">
                            <input type="text" name="userName" id="userName" placeholder="이름을 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                        <p class="msg" id="userNameComment"></p>
                    </div>
                    <div class="Userbox">
                        <label for="userPass" class="required">비밀번호</label>
                        <div class="check">
                            <input type="password" name="userPass" id="userPass" placeholder="비밀번호를 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                        <p class="msg" id="userPassComment"></p>
                    </div>
                    <div class="Userbox">
                        <label for="userBirth" class="required">생년월일</label>
                        <div class="check">
                            <input type="text" name="userBirth" id="userBirth" placeholder="공백없이 8자리를 입력하세요."
                                autocomplete="off" class="input-style" required>
                        </div>
                        <p class="msg" id="userBirthComment"></p>
                    </div>
                    <input type="submit" class="signup-btn" onclick="emailChecking()" value="회원가입">
                </div>
            </form>

            <!-- // signup form end -->
        </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
        
        });

        function goSignUp() {
            document.getElementById('loginForm').style.display = 'none';
        }

</script> -->
<script>
    let isEmailCheck = false;

    function emailChecking() {
    let userEmail = $("#userEmail").val();

    if (userEmail == null || userEmail === '') {
        $("#userEmailComment").text("➟ 이메일을 입력해주세요!");
        $("#userEmail").focus();
        return false;
    } else {
        let getuserEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i);

        if (!getuserEmail.test($("#userEmail").val())) {
            $("#userEmailComment").text("➟ 올바른 이메일 주소를 입력해주세요");
            $("#userEmail").val('');
            $("#userEmail").focus();
            return false;
        }
    }

        $.ajax({
            type: "POST",
            url: "signUpCheck.php",
            data: {"userEmail": userEmail, "type": "isEmailCheck"},
            dataType: "json",
            success: function(data) {
                if (data.result == "good") {
                    $("#userEmailComment").text("➟ 사용 가능한 이메일입니다.");
                    isEmailCheck = true;
                    // 중복 여부 확인 후 회원가입 실행
                    signUp();
                } else {
                    $("#userEmailComment").text("➟ 이미 존재하는 이메일입니다.");
                    isEmailCheck = false;
                }
            }
        });
    }
        function joinChecks() {
            // 메세지 초기화
            $(".msg").text("");
            console.log(".msg");

            let userEmail = $("#userEmail").val();
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

            if (userEmail === '') {
                $("#userEmailComment").text("➟ 이메일을 입력해주세요.");
                $("#userEmail").focus();
                return false;
            } else if (!emailPattern.test(userEmail)) {
                $("#userEmailComment").text("➟ 유효한 이메일 주소를 입력해주세요.");
                $("#userEmail").focus();
                return false;
            }
            
            // 이름 검사
            let userName = $("#userName").val();
            let namePattern = /^[가-힣]{2,5}$/;

            if (userName === '') {
                $("#userNameComment").text("➟ 이름을 입력해주세요.");
                $("#userName").focus();
                return false;
            } else if (!namePattern.test(userName)) {
                $("#userNameComment").text("➟ 이름은 2~5글자의 한글로만 가능합니다.");
                $("#userName").focus();
                return false;
            }

            // 회원가입 비밀번호 검사
            let userPass = $("#signInForm #userPass").val();
            let passPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{4,20}$/; // 최소 4자, 최대 20자, 하나 이상의 문자, 숫자, 특수문자 포함
            if (userPass === "") {
                $("#userPassComment").text("➟ 비밀번호를 입력해주세요.");
                // console.log("#userPassComment");
                $("#userPass").focus();
                return false;
            } else if (!passPattern.test(userPass)) {
                $("#userPassComment").text("➟ 비밀번호는 4~20자의 영문자, 숫자, 특수문자를 포함해야 합니다.");
                $("#userPass").focus();
                return false;
            }



            // 연락처 검사
            let userBirth = $("#userBirth").val();
            let BirthPattern = /^(19|20)\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])$/;

            if (userBirth === '') {
                $("#userBirthComment").text("➟ 생년월일을 입력해주세요.");
                $("#userBirth").focus();
                return false;
            } else if (!BirthPattern.test(userBirth)) {
                $("#userBirthComment").text("➟ 유효한 생년월일을 입력해주세요. 공백, -없이 8자리");
                $("#userBirth").focus();
                return false;
            }
        }

    function signUp() {
        if (!isEmailCheck) {
            alert("가입 실패!");
        } else {
            // alert("회원가입을 축하합니다.!");
        }
    }

    </script>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const action = params.get('action');

            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signInForm');

            if (action === 'signup') {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            } else {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            }
        });
    </script>

</body>

</html>