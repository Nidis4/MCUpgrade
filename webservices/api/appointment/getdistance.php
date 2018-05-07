<?php

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$_POST['s_lat'].",".$_POST['s_lng']."&destinations=".$_POST['d_lat'].",".$_POST['d_lng']."&mode=driving&language=en-EN&sensor=false";

	   $obj = json_decode(file_get_contents($url), true);

	   $a1 = array_shift($obj['rows']);
	      $a2 = array_shift($a1);
	      $a2 = array_shift($a2);
	      if($a2['distance']['text'] != ''){
		       echo $a2['distance']['text'];
		      }
		      else{
		       echo "failed";
		      }
		   exit;
?>