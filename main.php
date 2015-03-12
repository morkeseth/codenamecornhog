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
		<div id="topbox" class="mainbox mainbox2">
			<a href="#">
				<div id="textbox">
					<p id="innertext">Søk etter grupperom</p>
				</div>
			</a>
		</div>
		<ul>
			<li>	
				<div id="sok"></div>
			</li>
		</ul>
	</li>
	<li>
		<div id="botbox" class="mainbox mainbox2"></div>
</ul>


<?php require_once 'footer.php';?>
