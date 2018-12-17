<?php
    try {
        // DB 연결
        require_once('config.php');

        // 필수 파라미터 검사
        $paramRequired = Array('user_id');
        foreach($paramRequired as $v) {
            if(!isset($_GET[$v])) {
                http_response_code(400);
                throw new Exception('Parameters insufficient --- ' . print_r($_REQUEST, true));
            }
        }

        // 파라미터 가져오기
        $user_id = $_GET['user_id']; // 유저 번호

        // 신고 취소
        $sql = "UPDATE `alert`
                SET `alert_check` = 0
                WHERE `user_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->close();

        // 결과 전송
        header('Content-type: application/json');
        if(isset($res)) {
            echo json_encode($res);
        }

    } catch(Exception $e) {
        // 결과 전송(에러)
        $res['result'] = 'ERROR';
        $res['message'] = $e->getMessage();

        header('Content-type: application/json');
        echo json_encode($res);
        exit();
    }