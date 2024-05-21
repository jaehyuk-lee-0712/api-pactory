<?php

    include "../connection/connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "../component/emailSender/SMTP.php";
    require "../component/emailSender/PHPMailer.php";
    require "../component/emailSender/Exception.php";

    $response = array();

    if (isset($_POST["userEmail"])) {
        $email = trim($_POST["userEmail"]);

        // 사용자가 존재하는지 확인하는 SQL 쿼리
        $sql = "SELECT * FROM member WHERE userEmail = '$email'";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            // prepare가 실패한 경우
            $response['status'] = 'error';
            $response['msg'] = '데이터베이스 연결 실패.';
        }

        $stmt->execute();
        $result = $stmt->get_result();        
        $info = $result -> fetch_assoc();

        $userID = $info['userID'];
        $userName = $info['userName'];

        if ($result->num_rows > 0) {

            $regDate = time();

            // 토큰 생성
            $token = bin2hex(random_bytes(32));

            // 비밀번호 재설정 링크 생성
            $resetLink = "http://dlwogur1215.dothome.co.kr/php/member/changePass.php?token=" . $token;

            $sql = "INSERT INTO member_token (userID, token, regDate) VALUES (?, ?, ?)";
            $stmt = $connection->prepare($sql);
            if ($stmt === false) {
                // prepare가 실패한 경우
                // echo "데이터베이스 쿼리 준비에 실패했습니다.";
                exit;
            }
            $stmt->bind_param("isi", $userID, $token , $regDate);
            
            if($stmt->execute()) {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.naver.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'dlwogur171215';                     //SMTP username
                    $mail->Password   = 'vmfleja1215#';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->CharSet = "UTF-8";
                    $mail->Port       = 465;    
                    
                    //Recipients
                    $mail->setFrom('dlwogur171215@naver.com', 'Admin');
                    $mail->addAddress($email, $uesrName);     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'apiPactory 인증 메일';
                    $mail->Body    = "$resetLink";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();

                    // echo "<script>alert('입력하신 이메일로 암호 변경 이메일이 발송되었습니다.')</script>";
                    // echo "<script>window.location.href = '/php/login/login.php'</script>";
                    
                    $response['status'] = 'success';
                    $response['msg'] = '입력하신 이메일로 암호 변경 이메일을 발송했습니다.';


                } catch (Exception $e) {
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    $response['status'] = 'error';
                    $response['msg'] = '암호 변경 이메일 발솔 실패. 관리자 문의 바람';
                }
            }

            // 비밀번호 재설정 링크 생성
            // $resetLink = "http://example.com/reset_password.php?token=" . $token;  
        } else {
           $response['status']='error';
           $response['msg'] = '검색된 이메일이 존재하지 않습니다.';

        }
       

    }

   
    echo json_encode($response); 
?>

