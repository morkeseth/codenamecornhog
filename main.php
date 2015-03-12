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

<div id="topbox" class="mainbox mainbox2">
	<a href="#open">
		<div id="textbox">
			<p id="innertext">Søk etter grupperom</p>
		</div>
	</a>
</div>
<div id="open">
	<a href="#close">
		<div id="close"></div>
	</a>
</div>
<div id="botbox" class="mainbox mainbox2"></div>

<div>

</div>



<?php require_once 'footer.php';?>
