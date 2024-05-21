<?php
    include "../connection/connection.php";


    $userName = $_POST['userName'];
    $userBirth = $_POST['userBirth'];

    $setBirth  = str_replace('-' , '', $userBirth);
    $response = array();
    $response['rows'] = array();

    $sql = "SELECT userID , userEmail , userName , userBirth FROM member where userName like '%$userName%' and DATE_FORMAT(userBirth, '%Y%m%d') = '$setBirth'";

    $stmt = $connection -> prepare($sql);

    if($stmt) {

        $stmt -> execute();
        $result = $stmt -> get_result();

        if($result -> num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response['rows'][] = $row;
            }
            $response['status'] = 'success';
            $response['cnt'] = $result -> num_rows;
        }else {
            $response['status'] = 'error';
            $response['msg'] = '검색된 이메일이 존재하지 않습니다.';
            $response['sql'] = $sql;
        }
        
    }else {
        $response['status'] = 'error';
        $response['msg'] = '에러 발생 관리자 연락바람.';
    }
    
    echo json_encode($response); 
?>