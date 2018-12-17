<?php
include "config.php";

$alert_time = $_GET['alert_time'];

echo "$alert_time";

$ret = "UPDATE alert SET alert_check='0' WHERE alert_time='$alert_time'";
$res = mysqli_query($conn, $ret);
if($ret){
	echo "<script>alert('삭제가 완료되었습니다.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=alert.php'>"; 
}
?>

