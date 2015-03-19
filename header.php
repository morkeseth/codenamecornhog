<!DOCTYPE html>
<html>
	<head>
		<!--dette er ting som skal inkluderes på alle sidene som f.eks. charset og css filer-->
		<meta charset="UTF-8">
		<title>Grupperom</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<link rel="stylesheet" type="text/css" href="css/mediaqueries.css">
		<style type="text/css">
			<?php
			// dette er et array som sørger for at bakgrunnsfargen på boksen på reserveringssiden bytter 
			// farge tilfeldig for hver gang man er på siden 
			$box = array('#835581', '#FED575', '#1EB6EC', '#FD7265', '#63CAA6');
		 	echo '.mainbox { background-color: ';
		 	echo $box[array_rand($box)];
		 	echo '}';
			 ?>			
		</style>
		<script src="javaScript/jquery-1.11.2.js"></script>
	</head>

	<body>
		<header>
			<a href="index.php"><img class="mainlogo" id="mainlogotop" src ="images/mainlogo.png"></a>
		</header>

