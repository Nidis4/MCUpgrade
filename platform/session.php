<?php
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