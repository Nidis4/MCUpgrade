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


            $sql = "SELECT * FROM priceoil ";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {

			$price= $row["oilprice"];
						
			}
                                 	
           echo $price;


}else{
	echo "test";
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn->close();


?>