<?php
	session_start();
	require_once('dbconnect.php');
	
	$firstname =trim(stripslashes($_POST['firstname'])); 
	$lastname = trim(stripslashes($_POST['lastname'])); 
	$userid = trim(stripslashes($_POST['userid'])); 
	$age= trim(stripcslashes($_POST['age']));
	$gender= trim(stripcslashes($_POST['gender']));
	$password = trim(stripcslashes($_POST['password']));

	$sql = "INSERT INTO user (userid, firstname, lastname, password, age, gender, admin) VALUES ('$userid', '$firstname', '$lastname', '$password', $age, $gender, 0);";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['message']="Welcome!";
		$username = $userid;
		$sql = "SELECT * FROM user WHERE userid = '$username' AND password = '$password' AND admin = FALSE;";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['userid'] = $row['userid'];
			$_SESSION['admin'] = FALSE;
			header("Location: ./userDashboard.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Unsuccessful registeration attempted</title>
  <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
  <div class="container">

    <div class="begin">
    <h1>Sorry we could not create an account for you.</h1>
    </div>
</div>

<script src="validation.js">
</script>

</body>
</html>