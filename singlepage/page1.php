<?php require_once 'header.php';?>
<img src="../images/textlogo.png" id="textlogo">

<form id="innloggingsform" action="" method="post" name="form">
	<div id="innloggingwrapper">
		<ul>	
			<li class="innloggingsliste">
				<p class="bruker">Brukernavn*</p>
				<div class="brukerdiv">
					<input class="brukerinput" type="text" name="email" required title="Skriv inn e-post!">
				</div>
			</li>
			<li class="innloggingsliste">
				<p class="bruker">Passord*</p>
				<div class="brukerdiv">
					<input class="brukerinput" type="password" name="password" required title="Skriv inn passord!">
				</div>
			</li>
			<li class="innloggingsliste">
				<div id="submitdiv">
					<input id="submit" type="submit" value="Logg inn" name="logginn">
				</div>
			</li>
		</ul>
	</div>
</form>

<div id="page1bot"><div> 
<?php require_once 'footer.php';?>

