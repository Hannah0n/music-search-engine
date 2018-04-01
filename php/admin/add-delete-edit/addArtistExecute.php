<?php
	session_start();
	require_once('dbconnect.php');
	$artistname = $_POST['artistname'];
	
	$sql = "INSERT INTO artist (artistid, name) VALUES (UUID(), '$artistname');";
	
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="Artist Has Been Added";
		header("Location: ./adminAddArtist.php");
	} else {
			printf("Error: Artist Could Not be Added");
			printf("<br/><a href='./adminAddArtist.php'>Click here to try again</a>");
	}
?>
?>