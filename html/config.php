<?php
$db_host = "localhost";
$db_user = "admin";
$db_passwd = "software1234!";
$db_name = "se";
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

//if (mysqli_connect_errno($conn)) {
//	echo 'fail';
//} else {
//	echo 'success';
//}

if (!$conn) {
	die ('connection error:'.mysqli_connect_errno());
} else {
//	echo 'success1';
}

?>
