<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Grupperom</title>
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<style type="text/css">
			<?php 
			$box = array('rgb(112, 63, 111)', 'rgb(254, 207, 91)', '#1EB6EC', '#FD7265', '#63CAA6');
		 	echo '#mainbox { background-color: ';
		 	echo $box[array_rand($box)];
		 	echo '}';
			 ?>			
		</style>
	</head>

	<body>
		<header>
			<img class="mainlogo" id="mainlogotop" src ="images/mainlogo.png">
		</header>

