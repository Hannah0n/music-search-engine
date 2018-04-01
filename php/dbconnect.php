<?php
	$servername = "localhost";
	$username = "...";
	$password = "...";

	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) { 
	die("connection failed: " . $conn->connect_error);
	}

	$sql = "USE ...;";
	if ($conn->query($sql) === TRUE) {
	} else {
	echo "Error using database: " . $conn->error;
	}
?>