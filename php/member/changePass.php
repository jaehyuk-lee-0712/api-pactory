<?php
    include "../connection/connection.php";

    $token = $_GET['token'];
    $tokenUpdateYn = false;


    $sql = "
        SELECT 
        a.userID , 
        a.userEmail , 
        a.userName ,
        b.tokenID , 
        b.token  
        FROM member a JOIN member_token b on (a.userID = b.userID)
        WHERE b.token = '$token' 
        and b.deleteYn = 1";

    $stmt = $connection -> prepare($sql);
    
    if($stmt == false) {
        echo "에러 발생";
    }

    $stmt -> execute();
    $result = $stmt -> get_result();


    // DB에 token 이 존재하는 지 확인
    if($result -> num_rows >0){
        // token 확인이 됐으므로 token을 비활성화처리

        $sql = "UPDATE member_token set deleteYn = 0 where token = '{$token}'";

        $stmt = $connection -> prepare($sql);
        if($stmt == false) {
            echo "<script>alert('토큰 에러 발생 관리자 연락 요먕.')</script>";
            echo "<script>window.location.href = '/'</script>";
            exit;
        }else {
            if($stmt -> execute()) {
                $tokenUpdateYn = true;
            }else {
                $tokenUpdateYn = false;
            }
        }
    }
?>

<?php if($tokenUpdateYn) {?>

<?php include "../component/header.php" ?>

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
        function changePass() {
            changePassForm = document.getElementById("changePassAction");
            userNewPass = document.getElementById("userPass").value;

            if(userNewPass == "") {
                alert("새로운 비밀번호를 입력해주세요")
            }else {
                
            }
        }
    </script>
</body>
</html>

<?php }else {?>

    <!DOCTYPE html>
    <html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>
    <body>
      <div class="findPass__box">
        <div class="nav">
            <ul>
                <li><a href="/">
                    잘못된 접근방식입니다.
                </a></li>
                <span>
                    같은 문제가 계속하여 발생한다면 관리자에게 문의바랍니다.
                </span>
            </ul>
        </div>
      </div>
    </body>
    </html>
<?php }?>


