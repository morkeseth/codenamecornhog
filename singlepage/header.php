<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Grupperom</title>
		<link rel="stylesheet" type="text/css" href="../css/css.css">
		<style type="text/css">
			<?php 
			$box = array('#3399FF', '#660099', '#FFFF55', '#66CC99', '#FF6666');
		 	echo '#mainbox { background-color: ';
		 	echo $box[array_rand($box)];
		 	echo '}';
			 ?>			
		</style>
	</head>

	<body>
		<header>
			<img class="mainlogo" id="mainlogotop" src ="../images/mainlogo.png">
		</header>

