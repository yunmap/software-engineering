<?php
include "config.php"; //데이터베이스 연결 설정파일
	
$id = $_POST['admin_id'];
$pw = $_POST['admin_pw'];

$query = "SELECT * FROM admin WHERE admin_id='$id' AND admin_pw='$pw'";

$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_array($result);

if($id==$row['admin_id'])
{ // id와 pw가 맞다면 login

   $_SESSION['id']=$row['admin_id'];
   $_SESSION['name']=$row['admin_name'];
   echo "<meta http-equiv='refresh' content='0;url=index.php'>";

}else{ // id 또는 pw가 다르다면 login 폼으로

    echo '<script language="javascript">';
	echo 'alert("아이디 또는 비밀번호가 잘못 되었습니다.")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";

}
?>