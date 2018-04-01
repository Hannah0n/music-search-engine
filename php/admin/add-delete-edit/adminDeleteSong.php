<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');	
	
	echo "<br/>";
	echo $_SESSION['message'];
	$_SESSION['message']="";
	
	echo "<br/>";
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>Admin - Delete Song</title>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Admin - Delete Song</h1>
   </div>
   <div class="end">
	<a href="./adminDashboard.php">Back to Home</a>
	<form method="POST" action="./deleteSongExecute.php">
	
	<input type='radio' name='searchType' value='songid'/>Song ID</br>
    <input type='radio' name='searchType' value='artistid'/>Artist ID</br>
	<input type='radio' name='searchType' value='albumid'/>Album ID</br>
	<input type="text" name="searchValue"><br>
	<input type="submit" value="Delete">
	</form>
</div>
</div>
<div style="float: right;">Neon proudly present.</div>
</body>
</html>