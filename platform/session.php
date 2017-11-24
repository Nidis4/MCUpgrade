<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();// Starting Session

if ( isset($_POST['user']) && isset($_POST['user'])!="" ){
	$_SESSION['login_user'] = $_POST['user'];
}
else {
	$user_check=$_SESSION['login_user'];
	if(!isset($_SESSION['login_user'])){
		header('Location: login.html'); // Redirecting To Home Page
	}
}
?>