<?php
header('Access-Control-Allow-Origin: *'); 

if($_POST){
	$id= $_POST['id'];
	$short_description= $_POST['short_description'];

    $short_description_gr= $_POST['short_description_gr'];
    $unit= $_POST['unit'];

    $detail_description= $_POST['detail_description'];

    $detail_description_gr= $_POST['detail_description_gr'];


    $short_description=  str_replace("'","/'","$short_description");
    $short_description_gr=  str_replace("'","/'","$short_description_gr");
    $detail_description=  str_replace("'","/'","$detail_description");
    $detail_description_gr=  str_replace("'","/'","$detail_description_gr");

            $server='127.0.0.1';
            $userdb='upgradem_super';
            $pass='x}zLIzWrI^zC';
            $db='upgradem_main';



           // $server='localhost';
           // $userdb='root';
           // $pass='';
           // $db='upgradem_main';

            $conn = mysqli_connect($server, $userdb, $pass, $db);
           // $conn->query("SET title_greek 'utf8';"); 
            $conn->query("SET CHARACTER SET 'utf8';");


           if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
  
            $sql   = "UPDATE applications SET short_description = '$short_description', short_description_gr = '$short_description_gr', detail_description = '$detail_description', detail_description_gr = '$detail_description_gr', unit = '$unit' WHERE id = $id ";

             if (mysqli_query($conn, $sql)) {
                echo "Updated successfully";
            } else {
                echo "Error updating: " . mysqli_error($conn);
            }



}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn->close();
?>