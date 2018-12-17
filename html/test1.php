<?php
	include "config.php";
	$num = $_GET['beat_value'];
	$user_id = $_GET['user_id'];
	$beat_time = Date("Y-m-d H:i:s");
	$myfile = fopen("test.txt","a");
	//timeString = date('Y-m-d H:i:s',time());
	$txt = "num : ".$num."\n";

	echo ("hello");	
	fwrite($myfile, $txt);
	fclose($myfile);
	$query = "INSERT INTO heartbeat VALUES($user_id,$beat_time,$beat_value);";
	mysqli_query($conn,$query);

?>
