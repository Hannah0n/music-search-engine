<?php
	session_start();
	if($_SESSION['admin']){
		header("Location: ./index.php");
	}
	echo "Hello " . $_SESSION['firstname'];
	echo "!";
	echo "<br/><br/>";
?>
<html>
<head>
	<title>User DashBoard</title>	
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>User DashBoard</h1>
   </div>
   <div class="end">
	<a href="./userSongSearch.php">Search Song / Artist / Album</a>
	<br><br>
	<a href="./topResults.php">Top Song / Artist / Album</a>
	<br><br>
	<a href="./userMusicTaste.php">Statistics of Music Taste</a>
	<br><br>
	<a href="./userFavorites.php">See My Favorites</a>
	<br><br>
	<a href="./userLogoutExecute.php">Log Out</a>
	</div>
</div>
</body>
</html>
