<?php
session_start();

include_once('libs/db.php');

if(empty($_POST)) redirect();

if(empty($_POST['email'])) redirect();
if(empty($_POST['password'])) redirect();

$email = $_POST['email'];
$password = $_POST['password'];

$session_token = $db->createSession($email);

setcookie('auth_token', $session_token, time()+60*60*24*30, '/');

header("Location: reserve.php");

function redirect() {
	header("Location: ./");
	exit();
}

?>