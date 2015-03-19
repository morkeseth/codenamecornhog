<?php
// Starte session for å sjekke at bruker er innlogget og for å bruke variabler fra forrige side
session_start();
ob_start();
error_reporting(0);

// Inkluderer header og databasekonfigurasjon
require_once 'header.php';
require_once 'libs/db.php';

if($_SESSION['auth_token']) {
	echo "";
} else {
	// Hvis bruker prøver å aksessere siden uten å være innlogget, blir h*n sendt tilbake til index.php
	header("Location:index.php");
	ob_flush();
}

// For å hente riktig e-post og fornavn/etternavn til innlogget bruker
$email = $_SESSION["email"];
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
?>

<form id="logout" action="logout.php" method="post">
	<input id="logoutbutton" type="submit" value="Logg ut" name="logout">
</form><br>
<?php echo "<div id='logout'>Velkommen,	$firstname $lastname!</div>"; ?>


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

	<p><form id="logout" action="logout.php" method="post">
	<input id="logoutbutton" type="submit" value="Søk" name="search">
</form></p>

</form>

<?php
// Sjekker om bruker har trykket på søk
if(isset($_POST['search'])) {
	$date = $_POST['date'];
	$students = $_POST['students'];
	$projector = $_POST['projector'];
	// Kode brukt for å klargjøre spørring mot rom-tabellen
	$sql = $db -> prepare ("SELECT * FROM rooms");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql -> execute();
	if ($sql->rowCount() > 0) {
		// Hvis spørringen under gir mer enn 0 resultater, kjøres den
		$query = $db -> prepare ("SELECT * FROM rooms WHERE available = 'yes' AND (date = '$date') AND (students = '$students') AND (projector = '$projector')");
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query -> execute();
		if ($query->rowCount() == 0) {
			// Hvis spørringen gir 0 resultater, kommer feilmeldiong
			echo "<br>";
			echo "<div id='logout'>Ingen ledige rom som matcher dine kriterier, prøv igjen.</div>";
		} else {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$roomid = $row['roomid'];
				$date = $row['date'];
				$students = $row['students'];
				$from = $row['from_time'];
				$to = $row['to_time'];
				echo '<div class="mainbox mainbox2">';
				echo "<br>";
				echo "<div id='logout'>Rom nummer $roomid er ledig $date for $students studenter fra klokken $from til klokken $to. Prosjektor: $projector.</div>";
				echo '<form action="" method="post">';
				// Laget hidden values for å sende variabler videre til neste submit-knapp
				echo "<input type='hidden' name='date' value='".$date."'>";
				echo "<input type='hidden' name='roomid' value='".$roomid."'>";
				echo "<input type='hidden' name='from_time' value='".$from."'>";
				echo "<input type='hidden' name='to_time' value='".$to."'>";
				echo "<input type='hidden' name='projector' value='".$projector."'>";
				echo "<input type='hidden' name='students' value='".$students."'>";
				echo "<form id='logout' action='' method='post'>";
				echo "<input id='logoutbutton' type='submit' value='Reserver' name='reserve'>";
				echo "</form><br>";
				echo '</div>';
			}
		}		
	} else { 

		echo "En feil oppstod!"; 
	}	
}

if(isset($_POST['reserve'])) {
	// Sjekker om bruker har trykket på reserver
	$date = $_POST['date'];
	$email = $_SESSION["email"];
	$roomid = $_POST['roomid'];
	$from = $_POST['from_time'];
	$to = $_POST['to_time'];
	$projector = $_POST['projector'];
	$students = $_POST['students'];

	try {
		// Om bruker har trykket reserver og alt stemmer, kjøres spørringen under
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO reservations (date, email, roomid, from_time, to_time, projector, students) 
		VALUES ('$date', '$email', '$roomid', '$from', '$to', '$projector', '$students')";
		$db->exec($sql);
		// For å sette ledig rom til opptatt
		$sql = "UPDATE rooms SET available = 'no' WHERE roomid = '$roomid'";
		$db->exec($sql);
		echo "<div id='logout'>Rom nummer $roomid reservert den $date for $email!</div>";
	}

	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;
} 

?>

<div id="firstbot" class="mainbox mainbox2"></div>

<div id="secondbox">
	<a id="roomopener" class="opener2" href="#">Vis/skjul reservasjoner</a>
</div>
<div id="rooms">
	<h2>Dine rom</h2> <br>
	<?php
	$email = $_SESSION["email"];
	// For å vise reserverte rom knyttet opp mot innlogget bruker 
	$query = $db -> prepare("SELECT * FROM reservations WHERE email = '$email'");
	$query->setFetchMode(PDO::FETCH_OBJ);
	$query -> execute();
	if ($query->rowCount() == 0) {
		// Melding når ingen reservasjoner er knyttet opp mot innlogget bruker
		echo "Ingen reservarsjoner funnet. Bruk søkefunksjonen over for å finne et ledig grupperom.";
	} else {

		echo "<table id='showrooms'>
		<tr>
		<th>Rom</th>
		<th>Fra</th>
		<th>Til</th>
		<th>Prosjektor</th>
		<th>Studenter</th>
		<th>Reservasjon</th>
		</tr>";

		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" .$row['roomid']. "</td>";
			echo "<td>" .$row['from_time']. "</td>";
			echo "<td>" .$row['to_time']. "</td>";
			echo "<td>" .$row['projector']. "</td>";
			echo "<td>" .$row['students']. "</td>";
			echo "<td>" .$row['date']. "</td>";
			echo "</tr>";

		}
	}

	echo "</table><br>";
	
	?>
</div>

<div id="secondboxbot"></div>
<br>
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
