<?php
session_start();
ob_start();
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reserver grupperom</title>

</head>
<body>
	<h3>
		Logg inn på adminbruker
	</h3>
	<form action="" method="post" name="form">
		Brukernavn:
		<br><input type="text" name="email" required title="Skriv inn e-post!"><br>
		Passord:
		<br><input type="password" name="password" required title="Skriv inn passord!">
		<br><input type="submit" value="Logg inn" name="logginn">
	</form>

	<?php
	if(isset($_POST['logginn'])) {
		$_SESSION["loggetinn"]=false;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$db = new mysqli("localhost", "root", "root", "pj2100");  
		$sql = "SELECT * FROM students WHERE (Email = '$email') AND (Passphrase = '$password')"; 
		$resultat = $db->query($sql); 
		if ($db->affected_rows > 0) 
		{
			$_SESSION["loggetinn"]=true;
			echo "Passordet er korrekt!";
			header("Location: reserve.php");
			ob_flush();

		} 
		else 
		{ 
			echo "<strong>Feil brukernavn eller passord!</strong>"; 
		}
	}	

	?>

</body>

</html>