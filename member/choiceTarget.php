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
            <form action="" id="loginForm">
                <article id="main">
                    <div class="container">
                        <div class="find">
                            <div class="nav">
                                <ul>
                                    <li><a href="/">Find</a></li>
                                </ul>   
                            </div>
                            <div class="confirm">
                                <ul>
                                    <li><a href="#">Find Email</a></li> 
                                </ul>
                                <ul>
                                    <li><a href="#">Find Password</a></li> 
                                </ul>
                            </div>
                            <div class="signup">
                                <ul>
                                    <li><a href="#" onclick="goSignUp()">Signup</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="findID__Box">
                            <form action="" id="findIDBox">
                                <div class="nav">
                                    <ul>
                                        <li><a href="/">Find Email</a></li>
                                        <span>가입시 작성한 이름과 생년월일을 작성해주세요.</span>
                                    </ul>   
                                </div>
                                <div class="idbox">
                                    <div>
                                        <input type="email" name="userName" id="userName" placeholder="이름을 입력하세요" autocomplete="off"
                                            class="input-style" required>
                                    </div>
                                </div>
                                <div class="idbox">
                                    <div>
                                        <input type="text" name="userBirth" id="userBirth" placeholder="생년월일을 입력하세요" autocomplete="off"
                                            class="input-style" required>
                                    </div>
                                </div>
                                <div class="confirm">
                                    <ul>
                                        <li><a href="#">Find!</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="passbox">
                                    <div>
                                        <input type="password" name="userPass" id="userPass" placeholder="UserPassword"
                                            autocomplete="off" class="input-style" required>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </article>
            </form>
            <!-- // login form end -->
        </div>
        </div>
    </div>
    
</body>

</html>