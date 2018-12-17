<?php
    // 이상 심박수로 판단할 범위 지정 (평균 심박수로부터의 차이)
    $error_range = 10;
    
    try {
        // DB 연결
        require_once('config.php');

        // 필수 파라미터 검사
        $paramRequired = Array('user_id', 'beat_value','flag');
        foreach($paramRequired as $v) {
            if(!isset($_GET[$v])) {
                http_response_code(400);
                throw new Exception('Parameters insufficient');
            }
        }
        
       	
        // 파라미터 가져오기
        $user_id = $_GET['user_id']; // 유저 번호
        $beat_time = date('Y-m-d H:i:s'); // 현재 시간
        $beat_value = $_GET['beat_value']; // 전송된 심박수
        $flag = $_GET['flag'];//신고 취소
	

        // DB에서 해당 유저의 평균 심박수 가져오기
        $sql = "SELECT AVG(`beat_value`)
                FROM `heartbeat`
                WHERE `user_id` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        $beat_avg = 70;
        $stmt->fetch();
	$stmt->close();
	echo $flag;
	$alert_value = $user_id."call 119";
	$alert_cancel = "cancel_alert";
	$alert_check = 1;
	// 전송된 심박수와 평균 심박수의 비교
	if($flag == 0){
        if(($beat_value > $beat_avg + $error_range)
        || ($beat_value < $beat_avg - $error_range)) {
            // 이상 있을 시
            $res['result'] = 'WARNING';
            if($beat_value > $beat_avg + $error_range) {
                $res['message'] = 'Heart rate is too high';
            } else {
                $res['message'] = 'Heart rate is too low';
	    }  
	    $sql = "INSERT INTO alert VALUES(?,?,?,?)";
	    $stmt = $mysqli->prepare($sql);
	    $stmt->bind_param('issi', $user_id, $beat_time, $alert_value, $alert_check);
            $stmt->execute();
	    $stmt->close();
	    echo "warning";
        } else {
            // 이상 없을 시
            // 전송된 심박수 저장
            $sql = "INSERT INTO heartbeat VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('isi', $user_id, $beat_time, $beat_value);
            $stmt->execute();
            $stmt->close();
                 
            $res['result'] = 'OK';
            $res['message'] = 'No problem';
            echo "insert";
	}
	}else if($flag == 2){
		$sql = "INSERT INTO alert VALUES(?,?,?,?)";
                $stmt = $mysqli->prepare($sql);
		$stmt->bind_param('issi',$user_id,$beat_time,$alert_cancel,$alert_check);
		$stmt->excute();
		$stmt->close();
		$res['result'] = 'OK';
		$res['message'] = 'No problem';
	}
        // 결과 전송
        header('Content-type: application/json');
        echo json_encode($res);

    } catch(Exception $e) {
        // 결과 전송(에러)
        $res['result'] = 'ERROR';
        $res['message'] = $e->getMessage();

        header('Content-type: application/json');
        echo json_encode($res);
        exit();
    }
