<?php
    include "../connection/connection.php";

    $userEmail = mysqli_real_escape_string($connection , $_POST['userEmail']);
    $userPass = mysqli_real_escape_string($connection , $_POST['userPass']);


    $sql = "SELECT userID , userEmail , userName, userPass FROM member where userEmail='{$userEmail}' and userDelete = 1";

    $result = $connection -> query($sql);

    if($result){
        $cnt =$result -> num_rows;

        if($cnt == 0) {
            // 사용자 ID가 존재하지 않을 때.
            echo "<script>alert('아이디 또는 비밀번호1를 확인해주세요.');</script>";
            echo "<script>history.back();</script>";
        }else {
            // 사용자 ID가 존재할 때.
            $userInfo = $result -> fetch_array(MYSQLI_ASSOC);

            if(password_verify($userPass , $userInfo['userPass'])) {
                // 세션 설정
                $_SESSION['userID'] = $userInfo['userID'];
                $_SESSION['userName'] = $userInfo['userName'];

                echo "<script>alert('로그인성공');</script>";
                echo "<script>window.location.href='/'</script>";
            }else {
                echo "<script>alert('아이디 또는 비밀번호2를 확인해주세요.');</script>";
                echo $userInfo['userPass'];
                echo $userPass;
                // echo "<script>history.back();</script>";

            }

        }
    }else {
        die("쿼리 실행에 실패했습니다. : ". $connection->error);
        echo "<script>alert('error');</script>";
    }

    

    

    

?>