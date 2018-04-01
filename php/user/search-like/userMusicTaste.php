<?php
	session_start();
	if($_SESSION['admin']){
		header("Location: ./index.php");
	}
	require_once('dbconnect.php');
?>

<html>
<head>
	<title>Music Taste</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
</head>
<body>
	<div class="container">
   <div class="begin">
   	<h1>Music Taste</h1>
   </div>
   <div class="end">

	<a href="./userDashboard.php">Back to Home</a>
	<br/><br/>
	
	<?php
		echo "Check one of the two boxes below to see the statistics";
	echo "<br/>";
	?>
	
	<form method="POST" action="./userMusicTaste.php">
    <input type='radio' name='searchType' value='company'/>Music Company</br>
    <input type='radio' name='searchType' value='artist'/>Artist</br>
	<input type="text" name="searchValue"><br>
	<input type="submit" value="Search">
	</form>
	<br/>
	<table>
	
	<?php
		if($_POST) {
			$searchtype = $_POST['searchType'];
			$searchvalue = $_POST['searchValue'];
			if($searchtype == 'company'){
				$sql = "SELECT count(*) as count, gender FROM album ab, song_perf sp, belong b, favorite f, user u WHERE sp.songid = b.songid AND b.albumid = ab.albumid AND f.songid = sp.songid AND f.userid = u.userid AND ab.company = '$searchvalue' GROUP BY gender;";
			} else {
				$sql = "SELECT count(*) as count, gender FROM artist a, song_perf sp, favorite f, user u WHERE f.songid = sp.songid AND f.userid = u.userid AND sp.artistid = a.artistid AND a.name = '$searchvalue' GROUP BY gender;";
			}
				$result = $conn->query($sql);
				?>
				<table border=1 style="font-family:'Times New Roman';">
				<tr>
					<th>Gender</th>
					<th>Number of Users</th>
				</tr>
				<?php 
				while($row = $result->fetch_assoc()){
					$gender = "Male";
					if($row['gender']==1) $gender="Female";
					echo "<tr><td>".$gender."</td><td>".$row['count']."</td></tr>";
				}
				?>
				</table><br/>
				<?php
			if($searchtype == 'company'){
				$sql = "select floor(u.age/10.00)*10 as agegroup, count(*) as count FROM album ab, song_perf sp, belong b, favorite f, user u WHERE sp.songid = b.songid AND b.albumid = ab.albumid AND f.songid = sp.songid AND f.userid = u.userid AND ab.company = '$searchvalue' group by 1 order by 1;";
			} else{
				$sql = "select floor(u.age/10.00)*10 as agegroup, count(*) as count FROM artist a, song_perf sp, favorite f, user u WHERE f.songid = sp.songid AND f.userid = u.userid AND sp.artistid = a.artistid AND a.name = '$searchvalue' group by 1 order by 1;";
			}
				$result = $conn->query($sql);
				?>
				<table border=1 style="font-family:'Times New Roman';">
				<tr>
					<th>Age Group</th>
					<th>Number of Users</th>
				</tr>
				<?php 
				while($row = $result->fetch_assoc()){
					echo "<tr><td>" . $row['agegroup'] . " - " . (((int)$row['agegroup'])+10) . "</td><td>" . $row['count'] . "</td></tr>";
				}
				?>
				</table>
			<?php
			
		}
	?>
	</table>
	 <div style="float: right;">Neon proudly present.</div>
</div>
</div>
	

</body>
</html>