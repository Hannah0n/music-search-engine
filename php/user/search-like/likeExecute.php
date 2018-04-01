<?php
	session_start();
	require_once('./dbconnect.php');
	$userid = $_SESSION['userid'];
	$songid = $_GET['songid'];
	$sql = "INSERT INTO favorite (songid, userid) VALUES ('$songid', '$userid');";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message'] = "Song has been added to favorites";
		header("Location: ./userFavorites.php");
	} else {
		$_SESSION['message'] = "Song could not be added to favorites";
		header("Location: ./userSongSearch.php");
	}
?>