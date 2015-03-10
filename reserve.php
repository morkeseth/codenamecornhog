<?php
session_start();
ob_start();

if($_SESSION["loggetinn"])
{
	echo "";
}
else
{
	echo "Du er ikke logget inn.";
	header("Location:index.php");
	ob_flush();
}

?>

<!doctype html>
<html>
<head>

</head>
<body>
	<a href="logout.php">Logg ut</a>
</body>
</html>