<?php
    // 데이터베이스 연결
    include "../connection/connection.php";

    if (isset($_POST["userEmail"])) {
        $email = trim($_POST["userEmail"]);
        
        // 이메일 값이 비어있는지 확인
        if (empty($email)) {
            echo "이메일이 비어 있습니다.";
            exit;
        }

        // 사용자가 존재하는지 확인하는 SQL 쿼리
        $sql = "SELECT * FROM member WHERE userEmail = '$email'";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            // prepare가 실패한 경우
            echo "데이터베이스 쿼리 준비에 실패했습니다." . $connection->error;
            exit;
        }

        // $stmt->bind_param("s", $email);
        // echo "실행할 쿼리: " . $sql . " with email: " . $email;
        $stmt->execute();
        $result = $stmt->get_result();        

        $info = $result -> fetch_assoc();

        $memberID = $info['memberID'];

        echo $memberID;

        if ($result->num_rows > 0) {
            // 토큰 생성
            $token = bin2hex(random_bytes(32));
            
            $sql = "INSERT INTO member_token (memberID, deleteYn) VALUES (?, ?)";
            $stmt = $connection->prepare($sql);
            if ($stmt === false) {
                // prepare가 실패한 경우
                echo "데이터베이스 쿼리 준비에 실패했습니다.";
                exit;
            }
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();

            // 비밀번호 재설정 링크 생성
            $resetLink = "http://example.com/reset_password.php?token=" . $token;

            // 이메일 발송 설정
            $to = $email;
            $subject = "비밀번호 재설정";
            $message = "
                <html>
                <head>
                    <title>비밀번호 재설정</title>
                </head>
                <body>
                    <p>비밀번호를 재설정하려면 다음 링크를 클릭하세요:</p>
                    <a href='$resetLink'>$resetLink</a>
                </body>
                </html>
            ";
            $headers = "From: jh439@naver.com\r\n";
            $headers .= "Content-type: text/html";

            // 이메일 발송
            if (mail($to, $subject, $message, $headers)) {
                echo "이메일을 확인하여 비밀번호를 재설정할 수 있는 링크를 받으세요.";
            } else {
                echo "이메일 발송에 실패했습니다. 나중에 다시 시도하세요.";
            }
        } else {
            echo "해당 이메일 주소를 가진 사용자를 찾을 수 없습니다." . $sql;
        }
    } else {
        echo "요청된 데이터가 없습니다.";
    }
?>
