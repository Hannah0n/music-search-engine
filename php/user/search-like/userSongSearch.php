<?php
	session_start();
	if($_SESSION['admin']){
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
	<title>Search Song</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Search Song</h1>
   </div>
   <div class="end">
	<a href="./userDashboard.php">Back to Home</a><br/>
	<?php printf($_SESSION['message']); 
		$_SESSION['message'] = ""
	?>
	
	<form method="POST" action="./userSongSearch.php">
	Song Name: <input type="text" name="song"><br>
	Album Name: <input type="text" name="album"><br>
	Artist Name: 
				<input type="text" name="artist"><br>
	<input type="submit" value="Search">
	</form>
	<br/>
</div>
</div>
	<?php
		if($_POST){
			$song = $_POST["song"];
			$artist = $_POST["artist"];
			$album = $_POST["album"];
// 			$sql = "SELECT sp.title AS song, sp.year AS year, a.name as artist, ab.title AS album, ab.company FROM song_perf sp, artist a, belong b, album ab WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid AND sp.title LIKE '%$song%' AND a.name LIKE '%$artist%' AND ab.title LIKE '%$album%' LIMIT 10;";
			//$sql = "SELECT sp.title AS song, sp.year AS year, a.name as artist, ab.title AS album, ab.company FROM song_perf sp, artist a, belong b, album ab WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid AND sp.title LIKE '%$song%' AND a.name LIKE '%$artist%' AND ab.title LIKE '%$album%' ORDER BY CASE WHEN sp.title LIKE '$song' THEN 1 WHEN a.name LIKE '$artist' THEN 1 WHEN ab.title LIKE '$album' THEN 1 WHEN sp.title LIKE '$song%' THEN 2 WHEN a.name LIKE '$artist%' THEN 2 WHEN ab.title LIKE '$album%' THEN 2 WHEN sp.title LIKE '%$song' THEN 3 WHEN a.name LIKE '%$artist' THEN 3 WHEN ab.title LIKE '%$album' THEN 3 ELSE 4 END ASC;";
			//$sql = "SELECT sp.title AS song, sp.year AS year, a.name as artist, ab.title AS album, ab.company FROM song_perf sp, artist a, belong b, album ab WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid AND sp.title LIKE '%$song%' AND a.name LIKE '%$artist%' AND ab.title LIKE '%$album%' ORDER BY CASE WHEN sp.title LIKE '$song' THEN 1 WHEN a.name LIKE '$artist' THEN 1 WHEN ab.title LIKE '$album' THEN 1 WHEN sp.title LIKE '$song%' THEN 2 WHEN a.name LIKE '$artist%' THEN 2 WHEN ab.title LIKE '$album%' THEN 2 WHEN sp.title LIKE '%$song' THEN 3 WHEN a.name LIKE '%$artist' THEN 3 WHEN ab.title LIKE '%$album' THEN 3 END ASC;";
			
			$sql = "SELECT sp.songid as songid, sp.title AS song, sp.year AS year, a.name as artist, ab.title AS album, ab.company FROM song_perf sp, artist a, belong b, album ab WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid";
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
				<th>Song Name</th>
				<th>Year Released</th>
				<th>Artist</th>
				<th>Album</th>
				<th>Company</th>
				<th>Like</th>
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
						<td><a href="./likeExecute.php?songid=<?php printf($row['songid']); ?>" style="background-color:rgba(1,1,1,0);"><img src="./heart.png" width=30></a></td>
					</tr>
				<?php
			}
		}
	?>
	</table>


</body>
</html>
