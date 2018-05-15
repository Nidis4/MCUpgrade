
<?php

if($_POST){
	       $oilprice = $_POST['oilprice'];
	
            $server='127.0.0.1';

            $userdb='stgmycon_db_user';

            $pass='u~,oEFS]5b}I';

            $db='my_constructor';


            $conn = mysqli_connect($server, $userdb, $pass, $db);
           // $conn->query("SET title_greek 'utf8';"); 
            $conn->query("SET CHARACTER SET 'utf8';");


           if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
  
            $sql   = "UPDATE priceoil SET oilprice =  '$oilprice' ";

           



            if (mysqli_query($conn, $sql)) {
                echo "Price updated successfully";
            } else {
                echo "Error updating Price: " . mysqli_error($conn);
            }



}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn->close();
?>