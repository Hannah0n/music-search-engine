<?php
	session_start();
	$_SESSION['firstname'] = "";
	$_SESSION['lastname'] = "";
	$_SESSION['userid'] = "";
	$_SESSION['admin'] = FALSE;
	$_SESSION['message'] = "";
	session_destroy();
	header("Location: ./index.php");
?>