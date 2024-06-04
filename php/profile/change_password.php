<?php
    include "../connection/connection.php";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userPass = $connection->real_escape_string(trim($_POST['userPass']));
        $newPass = $connection->real_escape_string(trim($_POST['newPass']));
        $confirmPass = $connection->real_escape_string(trim($_POST['confirmPass']));

        // 세션에서 현재 사용자 아이디 가져오기
        $userId = $_SESSION['userID'];

        // 현재 비밀번호 확인
        $stmt = $connection->prepare("SELECT userPass FROM member WHERE userID = ?");
        if ($stmt === false) {
            echo "<script>alert('쿼리 준비에 실패했습니다.'); history.back();</script>";
            exit;
        }
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $info = $result->fetch_assoc();
            // 비밀번호 확인
            if (password_verify($userPass, $info['userPass'])) {
                // 새로운 비밀번호와 확인이 일치하는지 확인
               // 새로운 비밀번호와 확인이 일치하는지 확인
                if (trim($newPass) === trim($confirmPass)) {
                    // 새로운 비밀번호를 해싱
                    $hashed_new_pass = password_hash($newPass, PASSWORD_DEFAULT);
                    
                    // 비밀번호 업데이트
                    $update_stmt = $connection->prepare("UPDATE member SET userPass = ? WHERE userID = ?");
                    if ($update_stmt === false) {
                        echo "<script>alert('쿼리 준비에 실패했습니다.'); history.back();</script>";
                        exit;
                    }
                    $update_stmt->bind_param("ss", $hashed_new_pass, $userId);
                    if ($update_stmt->execute()) {
                        echo "<script>alert('비밀번호가 성공적으로 변경되었습니다.'); location.href='/';</script>";
                    } else {
                        echo "<script>alert('비밀번호 변경 중 오류가 발생했습니다.'); history.back();</script>";
                    }
                    $update_stmt->close();
                } else {
                    echo "<script>alert('새 비밀번호와 확인이 일치하지 않습니다.'); history.back(); </script>";
                }
            } else {
                echo "<script>alert('현재 비밀번호가 올바르지 않습니다.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('사용자 정보를 찾을 수 없습니다.');</script>";
        }
        $stmt->close();
        $connection->close();
    } else {
        echo "<script>alert('잘못된 접근입니다. 관리자에게 문의하세요!'); history.back();</script>";
    }
?>
