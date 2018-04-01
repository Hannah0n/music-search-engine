<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');
	
	$sql = "SELECT albumid, title FROM album;";
	$albumlist = $conn->query($sql);
	
	$sql = "SELECT artistid, name FROM artist;";
	$artistlist = $conn->query($sql);
	
	echo "<br/>";
	echo $_SESSION['message'];
	$_SESSION['message']="";
	
	echo "<br/>";
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>Admin - Add Song</title>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Admin - Add Song</h1>
   </div>
   <div class="end">
	<a href="./adminDashboard.php">Back to Home</a>
	<form method="POST" action="./addSongExecute.php">

	Song Name: <input type="text" name="songname" required><br/>
	Year: <input type="text" name="year" required><br/>
	Expert Rating: <input type="text" name="expertrating"><br/>
	Loudness: <input type="text" name="loudness" required><br/>
	Danceability: <input type="text" name="danceability" required><br/>
	
	Album Name: 
				<select name="album">
				<?php while($row = $albumlist->fetch_assoc()){
					echo "<option value='".$row['albumid']."'>".$row['albumid']."-".$row['title']."</option>";
				} ?>
				</select><br/>
	Artist Name: 
				<select name="artist">
				<?php while($row = $artistlist->fetch_assoc()){
					echo "<option value='".$row['artistid']."'>".$row['artistid']."-".$row['name']."</option>";
				} ?>
				</select>
				<br>
	<input type="submit" value="Add Song">
	</form>
</div>
</div>
<div style="float: right;">Neon proudly present.</div>
</body>
</html>