<?php
    // 이상 심박수로 판단할 범위 지정 (평균 심박수로부터의 차이)
    $error_range = 20;

    try {
        // 플래그값이 2이면 test_flag.php 참조
        if(isset($_GET['flag'])) {
            if($_GET['flag'] == '2') {
                require_once('test_flag.php');
                exit();
            }
        }
        
        // DB 연결
        require_once('config.php');

        // 필수 파라미터 검사
        $paramRequired = Array('user_id', 'beat_value');
        foreach($paramRequired as $v) {
            if(!isset($_GET[$v])) {
                http_response_code(400);
                throw new Exception('Parameters insufficient --- ' . print_r($_REQUEST, true));
            }
        }

        // 파라미터 가져오기
        $user_id = $_GET['user_id']; // 유저 번호
        $beat_value = $_GET['beat_value']; // 전송된 심박수

        // DB에서 해당 유저의 평균 심박수 가져오기
        $sql = "SELECT AVG(`beat_value`)
                FROM `heartbeat`
                WHERE `user_id` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($beat_avg);
        $stmt->fetch();
        $stmt->close();

        // 만약 기존 심박수가 없으면 첫 심박수는 무조건 저장
        $sql = "SELECT count(`beat_value`)
                FROM `heartbeat`
                WHERE `user_id` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($beat_cnt);
        $stmt->fetch();
        $stmt->close();
        if($beat_cnt == 0) {
            $beat_avg = $beat_value;
        }

        // 전송된 심박수와 평균 심박수의 비교
        if(($beat_value > $beat_avg + $error_range)
        || ($beat_value < $beat_avg - $error_range)) {
            // 이상 있을 시
            $res['result'] = 'WARNING';
            if($beat_value > $beat_avg + $error_range) {
                $res['message'] = 'Heart rate is too high';
            } else {
                $res['message'] = 'Heart rate is too low';
            }
            // 신고 저장
            $alert_value = 'call 119';
	        $sql = "INSERT INTO `alert`(`user_id`, `alert_value`)
                    VALUES (?, ?)";
	        $stmt = $conn->prepare($sql);
	        $stmt->bind_param('is', $user_id, $alert_value);
            $stmt->execute();
	        $stmt->close();
        } else {
            // 이상 없을 시
            // 전송된 심박수 저장
            $sql = "INSERT INTO `heartbeat`(`user_id`, `beat_value`)
                    VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $user_id, $beat_value);
            $stmt->execute();
            $stmt->close();
        }

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