<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();// Starting Session

if (isset($_POST['user']) && isset($_POST['user'])!="" && (isset($_POST['type']) == "Professional")){
	$_SESSION['login_user'] = $_POST['user'];
	$_SESSION['fullname'] = $_POST['fullname'];
	$_SESSION['id'] = $_POST['id'];
	$_SESSION['usertype'] = $_POST['type'];
}
else {	
	if(!isset($_SESSION['login_user'])){
		header('Location: login.html'); // Redirecting To Home Page
		exit();
	}else{
		if(@$_SESSION['usertype'] && $_SESSION['usertype'] == "Professional" ){
			$user_check=$_SESSION['login_user'];
		}else{
			header('Location: login.html'); // Redirecting To Home Page
			exit();
		}
		
	}
}
?>