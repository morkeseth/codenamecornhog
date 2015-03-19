<?php 
session_start();
ob_start();

require_once 'header.php';
require_once 'libs/db.php';

if($_SESSION['auth_token']) {
	echo "";
} else {
	header("Location:index.php");
	ob_flush();
}

$_SESSION["epost"];
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
	$sql = $db -> prepare ("SELECT * FROM rooms");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql -> execute();
	if ($sql->rowCount() > 0) {
		$query = $db -> prepare ("SELECT * FROM rooms WHERE available = 'yes' AND (date = '$date') AND (students = '$students') AND (projector = '$projector')");
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query -> execute();
		if ($query->rowCount() == 0) {
			echo "Ingen ledige rom på valgt dato!";
		} else {
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$roomid = $row['roomid'];
			$date = $row['date'];
			$students = $row['students'];
			$from = $row['from_time'];
			$to = $row['to_time'];
			echo '<div class="mainbox mainbox2">';
			echo "<br>";
			echo "<b>Rom nummer $roomid er ledig $date for $students studenter fra klokken $from til klokken $to. Prosjektor: $projector.</b>";
			echo '<form action="" method="post">';
			echo "<input type='hidden' name='date' value='".$date."'>";
			echo "<input type='hidden' name='roomid' value='".$roomid."'>";
			echo "<input type='hidden' name='from_time' value='".$from_time."'>";
			echo "<input type='hidden' name='to_time' value='".$to_time."'>";
			echo "<input type='hidden' name='projector' value='".$projector."'>";
			echo "<input type='hidden' name='students' value='".$students."'>";
			echo " <input type='submit' name='reserve' value='Reserver'>";
			echo '</form>';
			echo '</div>';
		}
		}		
	} else { 

		echo "En feil oppstod!"; 
	}	
}

if(isset($_POST['reserve'])) {
	$date = $_POST['date'];
	$email = $_SESSION["epost"];
	$roomid = $_POST['roomid'];
	$from = $_POST['from_time'];
	$to = $_POST['to_time'];
	$projector = $_POST['projector'];
	$students = $_POST['students'];

	try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO reservations (date, email, roomid, from_time, to_time, projector, students) 
    VALUES ('$date', '$email', '$roomid', '$from', '$to', '$projector', '$students')";
    $db->exec($sql);
    $sql = "UPDATE rooms SET available = 'no' WHERE roomid = '$roomid'";
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
