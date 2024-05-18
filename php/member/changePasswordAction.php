<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>비밀번호 변경</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>
    <body>
        <div class="findPass__box">
            <form action="changePassAction.php" id="changePassAction" method="post">
                <div class="nav">
                    <ul>
                        <li><a href="/">비밀번호 변경</a></li>
                        <span>새로운 비밀번호를 입력해주세요</span>
                    </ul>   
                </div>
                <div class="idbox">
                    <div>
                        <input type="password" name="userPass" id="userPass" placeholder="새로운 비밀번호" autocomplete="off"
                            class="input-style" required>
                    </div>
                </div>
                <div class="confirm">
                    <ul onclick='changePass()'>
                        <li class="confirmBtn"><a href="#">비밀번호 변경하기</a></li>
                    </ul>
                </div>
            </form>
        </div>
        <script>
         
        </script>
    </body>
    </html>
    
</body>

</html>