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
	<a href="#open">
		<div id="textbox">
			<p id="innertext">Søk etter grupperom</p>
		</div>
	</a>
</div>
<div id="open">
<!--Søkemotor og kalender her-->
	<a href="#" id="close">Avslutt søk</a>
</div>
<div class="mainbox mainbox2"></div>

<div id="secondbox">
	<a href="#rooms">Se dine rom</a>
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

<?php require_once 'footer.php';?>
