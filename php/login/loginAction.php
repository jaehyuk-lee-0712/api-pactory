<?php
    include "../connection/connection.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userEmail = $connection -> real_escape_string(trim($_POST['userEmail']));
        $userPass = $connection -> real_escape_string(trim($_POST['userPass']));
        // 유효성 검사
        if (empty($userEmail) || empty($userPass)) {
            echo "<script>alert('아이디와 비밀번호를 입력해주세요.'); history.back();</script>";
            exit;
        }
        // 쿼리 작성 및 실행
        $stmt = $connection->prepare("SELECT userID, userName, userEmail, userPass FROM member WHERE userEmail = ?");
        if ($stmt === false) {
            echo "<script>alert('쿼리 준비에 실패했습니다.'); history.back();</script>";
            exit;
        }
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $info = $result->fetch_assoc();
            // 비밀번호 확인
            if (password_verify($userPass, $info['userPass'])) {
                // 세션 설정
                $_SESSION['userID'] = $info['userID'];
                $_SESSION['userName'] = $info['userName'];
                $_SESSION['userEmail'] = $info['userEmail'];
                echo "<script>alert('로그인 성공!'); location.href='/';</script>";
            } else {
                echo "<script>alert('비밀번호가 틀렸습니다.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('존재하지 않는 아이디입니다.'); history.back();</script>";
        }
        $stmt->close();
        $connect->close();
    } else {
        echo "<script>alert('잘못된 접근입니다. 관리자에게 문의하세요!'); history.back();</script>";
    }
?>