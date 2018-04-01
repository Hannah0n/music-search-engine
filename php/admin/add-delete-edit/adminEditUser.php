<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');
	
	$sql = "SELECT userid FROM user;";
	$userlist = $conn->query($sql);
	
	echo "<br/>";
	echo $_SESSION['message'];
	$_SESSION['message']="";
	
	echo "<br/>";
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>Admin - Edit User Info</title>
</head>
<body>
	<div class="container">
   <div class="begin">
	<h1>Admin - Edit User Info</h1>
</div>
<div class="end">
	<a href="./adminDashboard.php">Back to Home</a>
	<form method="POST" action="./editUserExecute.php">

	User ID: 
			<select name="userid">
			<?php while($row = $userlist->fetch_assoc()){
				echo "<option value='".$row['userid']."'>".$row['userid']."</option>";
			} ?>
			</select><br/>
	
	First Name: <input type="text" name="firstname" required><br/>
	Last Name: <input type="text" name="lastname" required><br/>
	Password: <input type="text" name="password" required><br/>
	Age: <input type="text" name="age" required><br/>
	Gender (1 for female, 0 for male): <input type="text" name="gender" required><br/>

	<input type="submit" value="Edit User Info">
	</form>
</div>
</div>
</body>
</html>