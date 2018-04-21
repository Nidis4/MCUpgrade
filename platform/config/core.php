<?php
// Environment URLS
$path = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'constants.php';
include($path);
$home_url = SITE_URL;
$api_url  = API_URL;

// Localhost URLS
//$home_url="http://localhost/";
//$api_url ="http://localhost/";

$platform_url = $home_url.'platform/';

?>
