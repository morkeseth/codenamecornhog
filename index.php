<?php
session_start();
ob_start();
error_reporting(0);

if($_SESSION['auth_token']) {
	header("Location:main.php");
}

require_once 'header.php';
require_once 'libs/db.php';

?>

<a href="index.php"><img src="images/textlogo.png" id="textlogo"></a>

<div id="formwrapper">
<form id="innloggingsform" action="" method="post" name="form">	
	
	<p class="bruker">E-postadresse*</p>
	<input class="brukerinput" type="email" name="email" required title="Skriv inn e-post!" placeholder="E-post">
	<div id="feil_epost"></div>		

	<p class="bruker">Passord*</p>
	<input class="brukerinput" type="password" name="password" required title="Skriv inn passord!" placeholder="Passord"><br>
	<div id="submitdiv">
		<input id="submit" type="submit" value="Logg inn" name="login">
	</div>
</form>
</div>


<?php
	// Sjekker om bruker har trykket logg inn
	if(isset($_POST['login'])) {
		$_SESSION['auth_token'] = false;
		$email = $_POST['email'];
		$password = $_POST['password'];
		// Sjekker om e-post og passord som er skrevet inn stemmer overens med data i databasen
		$sql = $db -> prepare ("SELECT * FROM students WHERE (email = '$email') AND (password = '$password')");
		$sql->setFetchMode(PDO::FETCH_OBJ);
		$sql -> execute();
		$resultat = $sql;
		// Hvis e-post og passord stemmer, blir bruker sendt til main.php 
		if ($sql->rowCount() > 0) {
			$_SESSION['auth_token'] = true;
			header("Location: main.php");
			ob_flush();
		} else { 
			// Feilmelding hvis e-post eller passord ikke stemmer overens med data i databasen
			echo '<div id="feilmelding">Feil e-post eller passord!</div>'; 
		}
		// Oppretter sessionvariabler for bruk i main.php
		$_SESSION["email"] = $email;
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$_SESSION["firstname"] = $firstname;
		$_SESSION["lastname"] = $lastname;
		}
	}	

	?>

<div id="page1bot"><div> 
<?php require_once 'footer.php';?>