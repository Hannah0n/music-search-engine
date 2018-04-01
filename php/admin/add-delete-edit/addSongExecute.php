<?php
	session_start();
	require_once('dbconnect.php');
	$songname = $_POST['songname'];
	$songyear = $_POST['year'];
	$expertrating = $_POST['expertrating'];
	$loudness = $_POST['loudness'];
	$danceability = $_POST['danceability'];
	$albumid = $_POST['album'];
	$artistid = $_POST['artist'];
	
	$sql = "INSERT INTO song_perf (songid, year, title, expert_rate, loudness, danceability, artistid) VALUES (UUID(), '$songyear', '$songname', '$expertrating', '$loudness', '$danceability', '$artistid');";
	//$sql = "INSERT INTO song_perf (year, title, expert_rate, loudness, danceability, artistid) VALUES ('$songyear', '$songname', '$expertrating', '$loudnes
	
	if ($conn->query($sql) === TRUE) {
		$lastIdTable = $conn->query("SELECT songid FROM song_perf WHERE title='$songname' and year='$songyear' and artistid = '$artistid';");
		$last_id = $lastIdTable->fetch_assoc()['songid'];
		
		// $last_id = $conn->insert_id; for albumid
		$sql = "INSERT INTO belong (albumid, songid) VALUES ('$albumid', '$last_id');";
		if ($conn->query($sql) === TRUE) {
			$sql = "INSERT INTO produce (albumid, artistid) VALUES ('$albumid', '$artistid');";
			if ($conn->query($sql) === TRUE) {
				$_SESSION['message']="Song Has Been Added";
				header("Location: ./adminAddSong.php");
			} else {
				printf("Error: Song Could Not be Added");
				printf("<br/><a href='./adminAddSong.php'>Click here to try again</a>");
			}
		} else {
			printf("Error: Song Could Not be Added");
			printf("<br/><a href='./adminAddSong.php'>Click here to try again</a>");
		}
	} else {
			printf("Error: Song Could Not be Added");
			printf("<br/><a href='./adminAddSong.php'>Click here to try again</a>");
	}
?>