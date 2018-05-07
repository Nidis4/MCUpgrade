 $.ajax({

                                    type: "POST",

                                    url:'transports.php',

                                    data:"origin="+first+"&destinations="+second,
                                    
                                    success:function(data){  

                                        var km = $.trim(data);
                                        totalKm= parseFloat(totalKm)+ parseFloat(km);

                                        if(km != 'failed'){

                                            
                                                
                                                //var diff = km - 10;
                                                var km = "<span class='totalkm'>"+totalKm+"</span>"

                                                $('.totalmiles').html(km+'KM');

                                        }

                                        else{

                                            $('.totalmiles').html('Unable to get KM');

                                        }

                                    }

                                });




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

     }

?>