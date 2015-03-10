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
		Logg inn for å reservere
	</h3>
	<form action="" method="post" name="form">
		E-post:
		<br><input type="email" name="email" required title="Skriv inn e-post!"><br>
		Passord:
		<br><input type="password" name="password" required title="Skriv inn passord!">
		
		<br><input type="submit" value="Logg inn" name="logginn">
	</form>

	<?php
	if(isset($_POST['logginn'])) {
		$_SESSION['auth_token'] = false;
		$email = $_POST['email'];
		$password = $_POST['password'];
<<<<<<< HEAD
		$db = new mysqli("localhost", "root", "root", "pj2100");
		//$db = new mysqli("localhost", "root", "", "pj2100");   
		//$sql = $db->prepare("SELECT * FROM students WHERE (Email = '$email') AND (Passphrase = '$password')");
=======
		$db = new mysqli("localhost", "root", "", "pj2100");  
>>>>>>> origin/master
		$sql = "SELECT * FROM students WHERE (Email = '$email') AND (Passphrase = '$password')"; 
		$resultat = $db->query($sql); 
		if ($db->affected_rows > 0) {
			$_SESSION['auth_token']=true;
			echo "Passordet er korrekt!";
			header("Location: reserve.php");
			ob_flush();
		} else { 
			echo "<strong>Feil e-post eller passord!</strong>"; 
		}
	}	

	?>

</body>

</html>