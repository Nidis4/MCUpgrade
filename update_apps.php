<?php

include('header.php');
header('Access-Control-Allow-Origin: *'); 


//echo $text;




			$server='127.0.0.1';
            $userdb='upgradem_super';
            $pass='x}zLIzWrI^zC';
			$db='upgradem_main';

			//$server='localhost';
            //$userdb='root';
           // $pass='';
			//$db='upgradem_main';




            $conn = mysqli_connect($server, $userdb, $pass, $db);
           // $conn->query("SET title_greek 'utf8';"); 
            $conn->query("SET CHARACTER SET 'utf8';");


            $sql = "SELECT * FROM applications";
            $result = $conn->query($sql);
            //$sqlcat = "SELECT * FROM categories WHERE title_greek = '$catid'";
			//$catresult = $conn->query($sqlcat);

//$result = $mysqli->query("SELECT * FROM searchcolours WHERE idcolor LIKE '%$text%' ");

	//if($result = $mysqli->query("SELECT * FROM searchcolours WHERE idcolor LIKE '%$text%' ")){
	$sub_cat="";


	
		    
					while($row = $result->fetch_assoc()) {

						$id= $row["id"];
						$short_description = $row["short_description"];
						$short_description_gr = $row["short_description_gr"];
						$detail_description = $row["detail_description"];
						$detail_description_gr = $row["detail_description_gr"];
						$greek_title = $row["title_greek"];
						$unit = $row["unit"];
						
						//echo $id . $short_description ."<textarea>". $short_description_gr. "</textarea>";


						$row ="<div class='row' style='min-height:200px; margin-right:20px; margin-left:20px; margin-top:40px; margin-bottom:40px; cursor:pointer;'>";
						$row.="<div class='col-md-2'><h3>".$id." ". $greek_title . "</h3><div style='width:100px; background:green; text-align:center; padding:5px; overflow:auto; font-size:18px; color:#fff;' class='saveappbtn' val='".$id."'>Save</div> <div class='msg".$id."'></div></div>";
						$row.="<div class='col-md-2'><h4>short_description</h4><textarea class='short_description".$id."' style='min-height:200px; width:100%;'>". $short_description ."</textarea></div>";
						$row.="<div class='col-md-2'><h4>short_description_GR</h4><textarea class='short_description_gr".$id."' style='min-height:200px;  width:100%;'>". $short_description_gr ."</textarea></div>";
						$row.="<div class='col-md-2'><h4>detail_description</h4><textarea class='detail_description".$id."' style='min-height:200px;  width:100%;'>". $detail_description ."</textarea></div>";
						$row.="<div class='col-md-2'><h4>detail_description_GR</h4><textarea class='detail_description_gr".$id."' style='min-height:200px;  width:100%;'>". $detail_description_gr ."</textarea></div>";
						
						$row.="<div class='col-md-2'><h4>unit</h4><textarea class='unit".$id."'>". $unit ."</textarea></div></div>";
						echo $row;
						
						}
                                 	
                      //echo $keywords;    
                      echo "</body>";           
                                       



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn->close();
?>


<script>
	$(document).ready(function(){

		$("div.saveappbtn").click(function(){

			

			var id=$(this).attr('val');

			var short_description = $('.short_description'+id).val();

			var short_description_gr = $('.short_description_gr'+id).val();

			var detail_description = $('.detail_description'+id).val();

			var detail_description_gr = $('.detail_description_gr'+id).val();

			var unit = $('.unit'+id).text();
				//alert(id);
			//alert(short_description);
			//alert(short_description_gr);
			//alert(detail_description);
			//alert(detail_description_gr);
			//alert(unit);

			jQuery.ajax({
					type: "POST",
					url:"update_app_db.php",
					data:{id, short_description, short_description_gr, detail_description, detail_description_gr, unit},
					success: function(data){
						console.log(data); 
						//alert(data);

						jQuery(".msg"+id).html(data);
					
						

						/*jQuery(".searchresults").empty();
						
						
						jQuery(".searchresults").append(data);
						jQuery(".searchresults").width(jQuery(".searcharea").width());*/

	

						}

					})





		});
	});


</script>