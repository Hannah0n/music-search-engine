<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	echo "Hello " . $_SESSION['firstname'];
	echo "!";
	echo "<br/><br/>";
?>
<html>
<head>
	<title>Admin DashBoard</title>	
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Admin DashBoard</h1>
   </div>
   <div class="end">
	<a href="./adminAddSong.php">Add Song</a> &emsp;
	<a href="./adminAddAlbum.php">Add Album</a> &emsp;
	<a href="./adminAddArtist.php">Add Artist</a> &emsp;
	<br><br>
	<a href="./adminDeleteSong.php">Delete Song/Artist/Album</a> &emsp;
	
	<a href="./adminEditUser.php">Edit User Info</a>
	<br><br>
	<a href="./adminSongSearch.php">Search Song / Artist / Album</a>
	<br><br>
	<a href="./adminLogoutExecute.php">Log Out</a>
</div>
</div>
</body>
</html>
