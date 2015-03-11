<?php
session_start();
ob_start();
require_once 'header.php';
?>

<img src="images/textlogo.png" id="textlogo">

<form id="innloggingsform" action="" method="post" name="form">	
	<p class="bruker">E-postadresse*</p>
	<input class="brukerinput" type="email" name="email" required title="Skriv inn e-post!">		<p class="bruker">Passord*</p>
	<input class="brukerinput" type="password" name="password" required title="Skriv inn passord!"><br>
	<div id="submitdiv">
		<input id="submit" type="submit" value="Logg inn" name="logginn">
	</div>
</form>

<?php
	if(isset($_POST['logginn'])) {
		$_SESSION['auth_token'] = false;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$db = new PDO("mysql:host=localhost;dbname=pj2100", "root", "root");
		$sql = $db -> prepare ("SELECT * FROM students WHERE (Email = '$email') AND (Passphrase = '$password')");
		$sql->setFetchMode(PDO::FETCH_OBJ);
		$sql -> execute();
		$resultat = $sql; 
		if ($sql->rowCount() > 0) {
			$_SESSION['auth_token'] = true;
			header("Location: main.php");
			ob_flush();
		} else { 
			echo "<strong>Feil e-post eller passord!</strong>"; 
		}
	}	

	?>

<div id="page1bot"><div> 
<?php require_once 'footer.php';?>

