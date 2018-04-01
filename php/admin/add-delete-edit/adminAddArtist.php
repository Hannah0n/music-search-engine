<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');

	echo $_SESSION['message'];
	$_SESSION['message']="";
	
	echo "<br/>";
?>
<html>
<head>
	<title>Admin - Add Artist</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	
</head>
<body>
	<div class="container">
	<div class="begin">
	<h1>Admin - Add Artist</h1>
    </div>
    <div class="end">
	<a href="./adminDashboard.php">Home</a>
    <br><br>
	<form method="POST" action="./addArtistExecute.php">
	Artist Name: <input type="text" name="artistname" required><br/>
	<br><br>
	<input type="submit" value="Add Artist">
	</form>
	<div style="float: right;">Neon proudly present.</div>
</div>

</div>
</body>
</html>

