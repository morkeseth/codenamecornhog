<?php

session_start();
ob_start();
require_once 'header.php';


?>

<form id="calendar" action="" method="post">

	<p>Velg dato:</p>
	<input type="date" name="date">

	<p>Antall studenter:</p>
	<select name="students">
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>

	<!--<p>Prosjektor eller ikke?</p>
	<input type="radio" name="projector" value="projector" required>Vi trenger prosjektor
	<br>
	<input type="radio" name="projector" value="noprojector" required>Vi trenger ikke prosjektor-->

	<p><input type="submit" value="Søk" name="search"></p>

</form>

<?php
	if(isset($_POST['search'])) {
		$date = $_POST['date'];
		$students = $_POST['students'];
		$projector = $_POST['projector'];
		$db = new PDO("mysql:host=localhost;dbname=pj2100", "root", "root");
		$sql = $db -> prepare ("SELECT * FROM rooms WHERE (date = '$date') AND (students = '$students')");
		$sql->setFetchMode(PDO::FETCH_OBJ);
		$sql -> execute();
		if ($sql->rowCount() > 0) {
			//echo '<div id="greenmessage">Hey, det er ledige rom på valgt dato!</div>';

			$connection = mysql_connect("localhost", "root", "root"); // Establishing Connection with Server
			$db = mysql_select_db("pj2100", $connection); // Selecting Database
			//MySQL Query to read data
			$query = mysql_query("SELECT * FROM rooms", $connection);
			while ($row = mysql_fetch_array($query)) {
			echo "<b>Ledig {$row['date']} for {$row['students']} studenter</b>";
			echo "<br />";
			}
		
		} 

		else { 
			echo '<div id="feilmelding">Ingen ledige rom på valgt dato!</div>'; 
		}
	}

?>

<div id="page1bot"><div> 
<?php require_once 'footer.php';?>