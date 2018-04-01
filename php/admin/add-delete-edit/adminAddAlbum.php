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
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>Admin - Add Album</title>
</head>
<body>
	<div class="container">
   <div class="begin">
	<h1>Admin - Add Album</h1>
</div>
<div class="end">
	<a href="./adminDashboard.php">Back to Home</a>
	<form method="POST" action="./addAlbumExecute.php">
	Album Title: <input type="text" name="albumtitle" required><br/>
	Album Company: <input type="text" name="albumcompany"><br/>
	
	<input type="submit" value="Add Album">
	</form>
	<div style="float: right;">Neon proudly present.</div>
</div>
</div>

</body>
</html>