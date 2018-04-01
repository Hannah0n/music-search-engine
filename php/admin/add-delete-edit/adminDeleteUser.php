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
	<title>Admin - Delete User</title>
</head>
<body>
	<a href="./adminDashboard.php">Home</a>
	<form method="POST" action="./deleteUserExecute.php">
	
	User ID: <input type="text" name="userid" required><br/>
	<input type="submit" value="Delete User">
	
	</form>
</body>
</html>