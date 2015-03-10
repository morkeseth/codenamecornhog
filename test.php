<?php
$db = new PDO("mysql:host=localhost;dbname=pj2100", "root", "root");

if(!$db) {
	echo "Feil.";
} else {
	echo "Tilkoblet!";
}

?>