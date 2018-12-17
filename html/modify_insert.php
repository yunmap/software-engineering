<?php
	include "config.php"; //데이터베이스 연결 

	$new_id = $_POST['new_id'];
	$new_name = $_POST['new_name'];
	$new_birth = $_POST['new_birth'];
	$new_phone = $_POST['new_phone'];
	$new_address = $_POST['new_address'];
	$new_family = $_POST['new_family'];

	$query = "UPDATE user SET user_name='$new_name', user_birth='$new_birth', user_phone='$new_phone', user_address='$new_address', user_family='$new_family' WHERE user_id='$new_id' ";
	
	$test = mysqli_query($conn, $query);

	if($test){
		echo "<script>alert('수정이 완료되었습니다.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	//echo "<meta http-equiv='refresh' content='0;url=index.php'>";

	mysqli_close($conn);
?>