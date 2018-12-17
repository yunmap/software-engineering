<?php
include "config.php";

$user_id = $_GET['user_id'];

$ret = mysqli_query($conn, "DELETE FROM user WHERE user_i='$user_id'");
	
echo "<meta http-equiv='refresh' content='0;url=index.php'>"; 
?>