<?php
	session_start();
	if($_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');	
	
	echo "<br/>";
	echo $_SESSION['message'];
	$_SESSION['message']="";
	
	echo "<br/>";
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
	<title>User - Top Results</title>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Top Songs, Artists, Albums</h1>
   </div>
   <div class="end">
	<a href="./userDashboard.php">Back to Home</a>
	<form method="POST" action="./topResults.php">
	
	<input type='radio' name='searchType' value='song'/>Popular Songs &emsp;
    <input type='radio' name='searchType' value='artist'/>Popular Artists &emsp;
	<input type='radio' name='searchType' value='album'/>Popular Albums</br>
	<input type='radio' name='searchType' value='danceability'/>Top Danceability &emsp;
	<input type='radio' name='searchType' value='loudness'/>Top Loudness &emsp;
	<input type='radio' name='searchType' value='expertrating'/>Top Expert Rates</br>
	Top # (give a number): <input type="text" name="searchValue"><br>
	<input type="submit" value="Submit">
	</form>
</div>
</div>
	<?php
		if($_POST){
			$searchType = $_POST["searchType"];
			$searchValue = $_POST["searchValue"];
			if ($searchType == 'song') {
				$sql = "SELECT sp.title AS song, sp.year as year, a.name AS artist, ab.title AS album
						FROM album ab, artist a, song_perf sp, belong b
						WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid AND sp.songid in
						(SELECT * FROM (SELECT songid FROM favorite
						GROUP BY songid ORDER BY count(*) DESC
						LIMIT $searchValue) AS tmp);";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Song Title</th>
				<th>Year Released</th>
				<th>Artist</th>
				<th>Album</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['song']); ?></td>
					<td><?php printf($row['year']); ?></td>
					<td><?php printf($row['artist']); ?></td>
					<td><?php printf($row['album']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
			if ($searchType == 'artist') {
				$sql = "SELECT a.name AS artist FROM artist a WHERE a.artistid in
					(SELECT * FROM (SELECT artistid FROM favorite, song_perf
					WHERE favorite.songid = song_perf.songid
					GROUP BY artistid ORDER BY count(*) DESC
					LIMIT $searchValue) AS tmp);";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:60%" align="center";>
			<tr>
				<th>Artist Name</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['artist']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
			if ($searchType == 'album') {
				$sql = "SELECT ab.title AS album, a.name AS artist, ab.company AS company
						FROM album ab, artist a, song_perf sp, belong b
						WHERE sp.artistid = a.artistid AND sp.songid = b.songid 
						AND b.albumid = ab.albumid AND sp.songid in
						(SELECT * FROM (SELECT songid FROM favorite
						GROUP BY songid ORDER BY count(*) DESC
						LIMIT $searchValue) AS tmp);";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Album Title</th>
				<th>Artist</th>
				<th>Company</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['album']); ?></td>
					<td><?php printf($row['artist']); ?></td>
					<td><?php printf($row['company']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
			if ($searchType == 'danceability') {
				$sql = "SELECT sp.title AS song, sp.danceability AS danceability, sp.year as year, a.name AS artist, ab.title AS album
						FROM album ab, artist a, song_perf sp, belong b
						WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid
						ORDER BY danceability DESC
						LIMIT $searchValue;";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Song Title</th>
				<th>Danceability</th>
				<th>Year Released</th>
				<th>Artist</th>
				<th>Album</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['song']); ?></td>
					<td><?php printf($row['danceability']); ?></td>
					<td><?php printf($row['year']); ?></td>
					<td><?php printf($row['artist']); ?></td>
					<td><?php printf($row['album']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
			if ($searchType == 'loudness') {
				$sql = "SELECT sp.title AS song, sp.loudness AS loudness, sp.year as year, a.name AS artist, ab.title AS album
						FROM album ab, artist a, song_perf sp, belong b
						WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid
						ORDER BY loudness DESC
						LIMIT $searchValue;";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Song Title</th>
				<th>Loudness</th>
				<th>Year Released</th>
				<th>Artist</th>
				<th>Album</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['song']); ?></td>
					<td><?php printf($row['loudness']); ?></td>
					<td><?php printf($row['year']); ?></td>
					<td><?php printf($row['artist']); ?></td>
					<td><?php printf($row['album']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
			if ($searchType == 'expertrating') {
				$sql = "SELECT sp.title AS song, sp.expert_rate AS expertrating, sp.year as year, a.name AS artist, ab.title AS album
						FROM album ab, artist a, song_perf sp, belong b
						WHERE sp.artistid = a.artistid AND sp.songid = b.songid AND b.albumid = ab.albumid
						ORDER BY expert_rate DESC
						LIMIT $searchValue;";
			$result = $conn->query($sql);
			?>
			<table border="1" style="width:100%;">
			<tr>
				<th>Song Title</th>
				<th>Expert Rates</th>
				<th>Year Released</th>
				<th>Artist</th>
				<th>Album</th>
			</tr>	
			<?php
			while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php printf($row['song']); ?></td>
					<td><?php printf($row['expertrating']); ?></td>
					<td><?php printf($row['year']); ?></td>
					<td><?php printf($row['artist']); ?></td>
					<td><?php printf($row['album']); ?></td>
				</tr>
			<?php
			}
			printf("</table>");
			}
		}
			?>
		
</body>
</html>