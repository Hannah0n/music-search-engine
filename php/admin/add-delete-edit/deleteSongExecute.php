<?php
	session_start();
	require_once('dbconnect.php');
	$searchType = $_POST['searchType'];
	$searchValue = $_POST["searchValue"];
	
	if ($searchType == 'songid') {
		$sql = "DELETE FROM song_perf where songid = '$searchValue';";
	}
	if ($searchType == 'artistid') {
		$sql = "DELETE FROM artist where artistid = '$searchValue';";
	}
	if ($searchType == 'albumid') {
		$sql = "DELETE FROM album where albumid = '$searchValue';";
	}

	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="Successfully Deleted";
		header("Location: ./adminDeleteSong.php");
	} else {
			printf("Error: Could Not be Deleted");
			printf("<br/><a href='./adminDeleteSong.php'>Click here to try again</a>");
	}
?>