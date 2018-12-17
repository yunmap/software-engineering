<?php
	include "config.php";
	
	$user_id = $_GET['user_id'];

	$sql = "DELETE FROM user WHERE user_id='$user_id'";
	$result = mysqli_query($conn, $sql);

	if($result){
		echo "<script>alert('삭제가 완료되었습니다.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>
