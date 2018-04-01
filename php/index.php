<html>
<head>
<title>create account</title>	
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
	<h1>Create an account</h1>
    </div>
    <div class="end">
	<!-- Users and administrators are separated from the main page by choosing ‘admin login’ or ‘user login’ -->
	<!-- Users cannot log into admin page, or admins cannot log into user page -->
	<a href="./adminLogin.php"><input type="button" value="Admin Login"></a>
	
	<a href="./userLogin.php"><input type="button" value="User Login"></a>
	<?php
	echo "<br/>";
	?>
	<br><a href="./create_account.html">Doesn't have an acocunt?</a>
</div></div>
	
</body>
</html>
