<?php
	include "config.php"; //데이터베이스 연결 

	if(mysqli_select_db($conn,"se"))
	{
		echo "";
	}
	
	$admin_id = $_POST['admin_id'];
	$admin_name = $_POST['admin_name'];
	$admin_pw = $_POST['admin_pw'];
	$c_admin_pw = $_POST['c_admin_pw'];
	$admin_company = $_POST['admin_company'];
	$admin_phone = $_POST['admin_phone'];

	/*
	$check = "SELECT * FROM admin WHERE admin_id='$admin_id'";
	$id_check = mysqli_query($conn, $check);
	if ($) {
		# code...
	}
	*/

	$query = "INSERT INTO admin() VALUES ('$admin_id', '$admin_name', '$admin_pw', '$admin_company', '$admin_phone')";
	$test = mysqli_query($conn, $query);

	if($test){
		echo '<script language="javascript">';
		echo 'alert("가입되었습니다!")';
		echo '</script>';
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	}
	mysqli_close($conn);
?>