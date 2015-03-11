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

<ul>
	<li>
		<div id="mainbox">
			<div id="innerbox">
				<p id="innertext">Søk etter grupperom</p>
			</div>
		</div>
	</li>
	<li>
</ul>


<?php require_once 'footer.php';?>
