<?php
	session_start();
	if(!$_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');
	
	$sql = "SELECT albumid, title FROM album;";
	$albumlist = $conn->query($sql);
	
	$sql = "SELECT songid, title FROM song_perf;";
	$songlist = $conn->query($sql);
	
	$sql = "SELECT artistid, name FROM artist;";
	$artistlist = $conn->query($sql);
	
	echo "<br/>";
	echo $_SESSION['message'];
	
	echo "<br/>";
?>

<html>
<head>	
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>Search Song</title>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Search for your song</h1>
   </div>
   <div class="end">
	<a href="./adminDashboard.php">Back to Home</a>
	<form method="POST" action="./adminSongSearch.php">
	Song Name: <input type="text" name="song"><br><br>
	Album Name: <input type="text" name="album"><br><br>
	Artist Name: <input type="text" name="artist"><br><br>
	<input type="submit" value="Search">
	</form>
	<br/><br/><br/>
</div>

	</div>
	<?php
		if($_POST){
			$song = $_POST["song"];
			$artist = $_POST["artist"];
			$album = $_POST["album"];
			
			$sql = "SELECT sp.songid AS songid, sp.title AS song, sp.year AS year, a.artistid as artistid, a.name as artist, ab.albumid AS albumid, ab.title AS album, ab.company FROM song_perf sp, artist a, belong b, album ab WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid";
			if($song!="") $sql.=" AND sp.title LIKE '%$song%'" ;
			if($artist!="") $sql .= " AND a.name LIKE '%$artist%'";
			if($album!="") $sql .= " AND ab.title LIKE '%$album%'";
			$sql .= " ORDER BY CASE";
			if($song!="") $sql.=" WHEN sp.title LIKE '$song' THEN 1 WHEN sp.title LIKE '$song%' THEN 2 WHEN sp.title LIKE '%$song' THEN 3";
			if($artist!="") $sql.=" WHEN a.name LIKE '$artist' THEN 1 WHEN a.name LIKE '$artist%' THEN 2 WHEN a.name LIKE '%$artist' THEN 3";
			if($album!="") $sql.=" WHEN ab.title LIKE '$album' THEN 1 WHEN ab.title LIKE '$album%' THEN 2 WHEN ab.title LIKE '%$album' THEN 3";
			$sql .= " ELSE 4 END;";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Song ID</th>
				<th>Song Title</th>
				<th>Year Released</th>
				<th>Artist ID</th>
				<th>Artist</th>
				<th>Album ID</th>
				<th>Album</th>
				<th>Company</th>
			</tr>
			<?php
			while($row = $result->fetch_assoc()){
				?>
					<tr>
						<td><?php printf($row['songid']); ?></td>
						<td><?php printf($row['song']); ?></td>
						<td><?php printf($row['year']); ?></td>
						<td><?php printf($row['artistid']); ?></td>
						<td><?php printf($row['artist']); ?></td>
						<td><?php printf($row['albumid']); ?></td>
						<td><?php printf($row['album']); ?></td>
						<td><?php printf($row['company']); ?></td>
					</tr>
				<?php
			}
		}
	?>
	
</body>
</html>