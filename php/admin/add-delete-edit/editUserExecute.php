<?php
	session_start();
	require_once('dbconnect.php');
	$userid = $_POST['userid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	
	$sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', password = '$password', age = '$age', gender = '$gender' WHERE userid = '$userid';";
	
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="User Information Has Been Updated";
		header("Location: ./adminEditUser.php");
		}
	else {
		printf("Error: User Information Could Not be Updated");
		printf("<br/><a href='./adminEditUser.php'>Click here to try again</a>");
	}
?>