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
			<p id="innertext">Søk etter rom</p>
		</div>
	</a>
</div>


<form id="calendar" action="" method="post">

	<p>Velg dato:</p>
	<input type="date" name="date" required>

	<p>Antall studenter:</p>
	<select name="students" required>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>

	<p>Prosjektor eller ikke?</p>
	<input type="radio" name="projector" value="ja" required>Ja
	<br>
	<input type="radio" name="projector" value="nei" required>Nei

	<p><input type="submit" value="Søk" name="search"></p>

</form>

<?php
if(isset($_POST['search'])) {
	$date = $_POST['date'];
	$students = $_POST['students'];
	$projector = $_POST['projector'];
	$db = new PDO("mysql:host=localhost;dbname=pj2100", "root", "root");
	$sql = $db -> prepare ("SELECT * FROM rooms");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql -> execute();
	if ($sql->rowCount() > 0) {
		$query = $db -> prepare ("SELECT * FROM rooms WHERE available = 'yes' AND (date = '$date') AND (students = '$students') AND (projector = '$projector')");
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query -> execute();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$roomid = $row['roomid'];
			$date = $row['date'];
			$students = $row['students'];
			$from = $row['from_time'];
			$to = $row['to_time'];
			echo '<div class="mainbox mainbox2">';
			echo "<br>";
			echo "<b>Rom nummer $roomid er ledig $date for $students studenter fra klokken $from til klokken $to. Prosjektor: $projector.</b>";
			echo '<form method="post">';
			echo " <input type='submit' name='reserve' value='Reserver'>";
			echo '</form>';
			echo '</div>';
		}		
	} else { 
		echo "Ingen ledige rom på valgt dato!"; 
	}	
}

if(isset($_POST['reserve'])) {
	echo '<form action="" method="post">';
	echo "<input type=\"text\" name=\"date\" value=\"".$_POST['date']."\">"; 
	$email = $_SESSION["epost"];
	$roomid = "10";
	$from = "00:00:00";
	$to = "00:00:00";
	$projector = "yes";
	$students = "2";
	echo '</form>';

	try {
    $db = new PDO("mysql:host=localhost;dbname=pj2100", "root", "root");
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO reservations (date, email, roomid, from_time, to_time, projector, students) 
    VALUES ('$date', '$email', '$roomid', '$from', '$to', '$projector', '$students')";
    // use exec() because no results are returned
    $db->exec($sql);
    echo "Rom nummer $roomid reservert den $date for $email!";
    }

	catch(PDOException $e) {
    	echo $sql . "<br>" . $e->getMessage();
    }

	$conn = null;
} 

?>

<div id="firstbot" class="mainbox mainbox2"></div>

<div id="secondbox">
	<a class="opener2" href="#">Se dine rom</a>
</div>
<div id="rooms">
	<h2>(Eksempler)</h2> <br>
	<p>Du reserverer rom 13 fra 12:00 til 14:00 den 24. Mars</p> <br>
	<p>Du reserverer rom 2 fra 08:00 til 09:30 den 19. Mars</p>
</div>

<div id="secondboxbot"></div>

<script>
$(document).ready(function(){
	$(".opener").click(function(){
		$("#calendar").delay( 220 ).slideToggle( 300 );
		$("#firstbot").slideToggle( 300 );
	});
	$(".opener2").click(function(){
		$("#rooms").slideToggle( 300 );
	});
});
</script>

<?php require_once 'footer.php';?>
