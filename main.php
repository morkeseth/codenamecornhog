<?php 
session_start();
ob_start();

require_once 'header.php';

if($_SESSION['auth_token']) {
	echo "";
} else {
	header("Location:index.php");
	ob_flush();
}
?>

<a href="logout.php"><p id="logout">Logg ut</p></a>


<div id="firstbox" class="mainbox mainbox2">
	<a class="opener" href="#">
		<div id="textbox">
			<p id="innertext"></p>
		</div>
	</a>
</div>


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
			echo '<p id="feilmelding">Ingen ledige rom på valgt dato!</p>'; 
		}
	}

	?>
	


<div id="firstbot" class="mainbox mainbox2"></div>

<div id="secondbox">
	<a class="opener2" href="#">Se dine rom</a>
</div>
<div id="rooms">
	<ul>
		<li>(Eksempler)</li> <br>
		<li>Du reserverer rom 13 fra 12:00 til 14:00 den 24. Mars</li>
		<li>Du reserverer rom 2 fra 08:00 til 09:30 den 19. Mars</li>
	</ul>
	<a href="#"><br><br><br><br><br><br>Avslutt søk</a>
</div>
<div id="secondboxbot"></div>

<script>
	$(document).ready(function(){

		$(".opener").click(function(){
			$("#calendar").delay( 220 ).slideToggle( 300 );
			$("#firstbot").slideToggle( 300 );
			if ($("#innertext").text("Søk etter grupperom")) {
				$("#innertext").text("Avslutt søk");
			} else {
				$("#innertext").text("Søk etter grupperom");
			};
		});
	});
</script>

<?php require_once 'footer.php';?>
