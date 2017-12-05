<?php
$upgrade_db_name = 'upgradem_main';
$upgrade_user_name = 'upgradem_super';
$upgrade_db_pass = 'x}zLIzWrI^zC';

$live_db_name = 'my_constructor';
$live_user_name = 'stgmycon_db_user';
$live_db_pass ='u~,oEFS]5b}I';


echo "Synchronization Starts<br>";
syncCategories();

function syncCategories(){
	echo "In Sync Categories<br>";
	$query = "SELECT `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate` FROM `categories`";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        printf ("%s (%s)\n", $row["name"], $row["name_greek"]);
	    }

	    /* free result set */
	    $result->free();
	}
}

function LiveDB(){
	 $con = mysqli_connect("localhost",$live_user_name,$live_db_pass,$live_db_name);
	 return $con;
}

function UpgradeDB(){
	 $con = mysqli_connect("localhost",$upgrade_db_name,$upgrade_user_name,$upgrade_db_pass);
	 return $con;
}

?>