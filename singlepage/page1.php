<?php require_once 'header.php';?>
<img src="../images/textlogo.png" id="textlogo">

<div id="innloggingwrapper">
	<ul>	
		<li class="innloggingsliste">
			<p class="bruker">Brukernavn</p>
			<div class="brukerdiv">
				<input class="brukerinput" type="text" name="email" required title="Skriv inn e-post!">
			</div>
		</li>
		<li class="innloggingsliste">
			<p class="bruker">Passord</p>
			<div class="brukerdiv">
				<input class="brukerinput" type="password" name="password" required title="Skriv inn passord!">
			</div>
		</li>
		<li class="innloggingsliste">
			<input id="submit" type="submit" value="Logg inn" name="logginn">
		</li>
	</ul>
</div>

<?php require_once 'footer.php';?>

