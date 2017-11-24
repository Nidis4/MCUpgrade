<?php
include('session.php');
session_unset();
header('Location: login.html');
?>