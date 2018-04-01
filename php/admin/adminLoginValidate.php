<?php
	require_once('./dbconnect.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM user WHERE userid = '$username' AND password = '$password' AND admin = TRUE;";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		session_start();
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['admin'] = TRUE;
		$_SESSION['message'] = "";
		header("Location: ./adminDashboard.php");
	} else {
		echo("Unable to login");
	}
?>