<?php
header('Content-Type: text/html; charset=utf-8');

$upgrade_db_name = 'upgradem_main';
$upgrade_user_name = 'upgradem_super';
$upgrade_db_pass = 'x}zLIzWrI^zC';

$live_db_name = 'my_constructor';
$live_user_name = 'stgmycon_db_user';
$live_db_pass = 'u~,oEFS]5b}I';


echo "Synchronization Starts<br>";
syncCategories();

function syncCategories(){
	echo "In Sync Categories<br>";
	$query = "SELECT `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate` FROM `categories`";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        //printf ("%s (%s)\n", $row["name"], $row["name_greek"]);
	        insertCategories($row['id'], $row['name'], $row['name_greek'], $row['title'], $row['title_greek'], $row['description'], $row['description_greek'], $row['sequence'], $row['modified'], $row['commissionRate']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertCategories($id, $name, $name_greek, $title, $title_greek, $description, $description_greek, $sequence, $modified, $commissionRate){
	echo "Inserting Category ".$id."<br>";

	$query = "INSERT INTO `categories` ( `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate`) VALUES (".$id.",'".$name."','".$name_greek."','".$title."','".$title_greek."','".$description."','".$description_greek."','".$sequence."','".$modified."','".$commissionRate."') ON DUPLICATE KEY UPDATE `name`='".$name."', `name_greek`='".$name_greek."', `title`='".$title."', `title_greek`='".$title_greek."', `description`='".$description."', `description_greek`='".$description_greek."', `sequence`='".$sequence."', `modified`='".$modified."', `commissionRate`='".$commissionRate."' ";
	echo $query;

	$upgrade = UpgradeDB();
	$result = $upgrade->query($query);
}

function LiveDB(){
	global $live_user_name;
	global $live_db_pass;
	global $live_db_name;

	$con = mysqli_connect("localhost", $live_user_name, $live_db_pass, $live_db_name);
	mysqli_query($con, "SET NAMES 'utf8'"); 
	mysqli_query($con, "SET CHARACTER SET 'utf8'"); 

	if (mysqli_connect_errno())
	  {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	 return $con;
}

function UpgradeDB(){
	global $upgrade_db_pass;
	global $upgrade_user_name;
	global $upgrade_db_name;

	 $con = mysqli_connect("localhost", $upgrade_user_name, $upgrade_db_pass, $upgrade_db_name);
	 mysqli_query($con, "SET NAMES 'utf8'"); 
	 mysqli_query($con, "SET CHARACTER SET 'utf8'"); 
	
	 if (mysqli_connect_errno())
	   {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	 return $con;
}

?>