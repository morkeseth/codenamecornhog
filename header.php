<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Grupperom</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<link rel="stylesheet" type="text/css" href="css/mediaqueries.css">
		<style type="text/css">
			<?php 
			$box = array('#835581', '#FED575', '#1EB6EC', '#FD7265', '#63CAA6');
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

