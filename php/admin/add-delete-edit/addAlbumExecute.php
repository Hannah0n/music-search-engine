<?php
	session_start();
	require_once('dbconnect.php');
	$albumtitle = $_POST['albumtitle'];
	$albumcompany = $_POST['albumcompany'];
	
	$sql = "SELECT MAX(albumid) as maxid FROM album;";
	$result = $conn->query($sql);
	$max = $result->fetch_assoc()['maxid'];
	$sql = "INSERT INTO album (albumid, title, company) VALUES
	($max + 1, '$albumtitle', '$albumcompany');";
	
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="Album Has Been Added";
		header("Location: ./adminAddAlbum.php");
	} else {
			printf("Error: Album Could Not be Added"); 
			printf("<br/><a href='./adminAddAlbum.php'>Click here to try again</a>");
	}
?>
