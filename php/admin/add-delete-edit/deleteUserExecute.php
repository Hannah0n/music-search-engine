<?php
	session_start();
	require_once('dbconnect.php');
	$userid = $_POST['userid'];
	
	$sql = "DELETE FROM user WHERE userid = '$userid';";
	echo($sql);
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="User is Successfully Deleted";
		header("Location: ./adminDeleteUser.php");
	} else {
			printf("Error: User Could Not be Deleted");
			printf("<br/><a href='./adminDeleteUser.php'>Click here to try again</a>");
	}
?>