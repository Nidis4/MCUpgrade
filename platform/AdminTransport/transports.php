<?php  

if($_POST){


		$origin = urlencode($_POST['origin']);

		$destinations = urlencode($_POST['destinations']);

	   $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin."&destinations=".$destinations."&mode=driving&language=en-EN&sensor=false";



	   $obj = json_decode(file_get_contents($url), true);



	   $totaldistance = 0;

	     $a1 = array_shift($obj['rows']);

	     $a2 = array_shift($a1);

	     for ($i=0; $i < count($a2); $i++) { 

	       $distance = str_replace(' km', '', $a2[$i]['distance']['text']);

	       $totaldistance += $distance; 

	     }

//echo $distance;

	     if($totaldistance != ''){


		       echo $totaldistance;

		      }

		      else{

		       echo "failed";

		      }

		   exit;



	   // $a1 = array_shift($obj['rows']);

	   //    $a2 = array_shift($a1);

	   //    $a2 = array_shift($a2);

	   //    if($a2['distance']['text'] != ''){

		  //      echo $a2['distance']['text'];

		  //     }

		  //     else{

		  //      echo "failed";

		  //     }

		  //  exit;

	 }

?>