<?php
	session_start();
	if($_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');
	$userid = $_SESSION['userid'];
?>

<html>
<head>
	<title>Favorite Song List</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Favorite Songs</h1>
   </div>
   <div class="end">
	<a href="./userDashboard.php">Back to Home</a><br/>
	<?php printf($_SESSION['message']); 
		$_SESSION['message'] = ""
	?>
	<br/>
</div>
</div>
	
	<?php
	$sql = "SELECT sp.title AS song, sp.year AS year, a.name as artist, ab.title AS album, ab.company
	FROM favorite f, song_perf sp, artist a, belong b, album ab
	WHERE f.userid = '$userid' AND f.songid=sp.songid AND sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid;";
	$result = $conn->query($sql);
	?>
	
	<table border="1" style="width:100%;">
	<tr>
	<th>Song Title</th>
	<th>Year Released</th>
	<th>Artist</th>
	<th>Album</th>
	<th>Company</th>
	</tr>
	<?php
		while($row = $result->fetch_assoc()){
	?>
	<tr>
	<td><?php printf($row['song']); ?></td>
	<td><?php printf($row['year']); ?></td>
	<td><?php printf($row['artist']); ?></td>
	<td><?php printf($row['album']); ?></td>
	<td><?php printf($row['company']); ?></td>
	</tr>
		<?php } ?>
	
</body>
</html>	