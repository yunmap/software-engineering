<?php
	include "config.php"; //데이터베이스 연결 

	if(mysqli_select_db($conn,"se"))
	{
		echo "";
	}
	
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_birth = $_POST['user_birth'];
	$user_phone = $_POST['user_phone'];
	$user_address = $_POST['user_address'];
	$user_admin = $_POST['user_admin'];
	$user_family = $_POST['user_family'];

	$query = "INSERT INTO user() VALUES ('$user_id', '$user_name', '$user_birth', '$user_phone', '$user_address', '1', '$user_family')";
	$test = mysqli_query($conn, $query);

	echo "<meta http-equiv='refresh' content='0;url=index.php'>";

	mysqli_close($conn);
?>