<?php
include('../session.php');
include('../config/core.php');
?>


<?php 

   /*
    $deny = array("111.111.111", "222.222.222", "333.333.333");
    //echo $_SERVER['HTTP_CLIENT_IP'];
   // echo $_SERVER['REMOTE_ADDR'];
    if(getRealIpAddr() != "79.129.124.152"){
          header("location: https://myconstructor.gr");
        exit();
    }
    //echo getRealIpAddr();

function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    }
    */
 ?>


<!DOCTYPE html>

<html lang="el">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="../../favicon.ico">

    <title>Μετακόμιση με 4 απλά βήματα</title>

        <meta name="robots" content="noindex,nofollow">
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/jquery.json-2.4.min2.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>    <!-- Custom styles -->
        <link href="assets/multistepform/css/style.css?version=11" rel="stylesheet">
        <link href="assets/multistepform/css/bootstrap-multiselect.css" rel="stylesheet">
        <link rel="stylesheet" href="social-likes_flat.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-943776193"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
               

                //Living Room List
                var ArmChair=3.5;
                var TwoSeatSofa=7;
                var ThreeSeatSofa=10;
                var FourSeatSofa=12;
                var CornerSofa=12;
                var Coffeetable=2.5;
                var Sidetables=2;
                var ShelvingUnitsSystems=15;
                var DiningTableWood=8;
                var DiningTableGlass=20;
                var Chairs=2;
                var StereoSystemSpeakers=2;
                var Tv=2;
                var Shelves=2;
                var Library=15;
                var TvTable=2.5;
                var FloorLamp=2;
                var Lamp=2;
                var Paintings=1;


                //Bed Rooms List
                var DoubleBed=7;
                var SingleBed=5;
                var Mattress=5;
                var BedsideTable=2;
                var Wardrobe=10;
                var Mirror=4;
                var ChestofDrawers=2;
                var Stool=1.5;
                var FloorLampBed=1;
                var LampBed=1.5;
                var BabyCot=5;
                var Changingtableforbaby=2.5;
                var CurtainRods=0.7;


                //Electric Kitchen
                var Fridge=10;
                var WashingMachine=9;
                var Dishwasher=4;
                var TableKitchen=5;
                var ChairsKitchen=2;
                var ElectricCooker=7;
                var Microwave=3;
                var LampKitchen=1.5;
                var Freezer=7;
                var DryerMachine=7;
                var KitchenCabinets=10;
                var CurtainRodsKitchen=0.7;


                //Other Things List
                var Desk=4;
                var officeChest=1.5;
                var OtherChair=2;
                var OtherWardrobe=10;
                var Suitcases=1;
                var PlasticBags=1;
                var PlasticWardrobe=7;
                var PlasticPots=2;
                var ClayPots=4;
                var Jargoniers=5;
                var PatioTable=10;
                var AirCondition=7;
                var Piano=70;
                var Computer=2;
                var Printer=1;
                var OtherLamp=4;
                var OtherCurtainRods=0.7;
                var Statue=40;
                var BathroomFurniture=3;
                var PingPongTable=10;

                //From Floor

                var Fromfloor_One=7.5;
                var Fromfloor_Two=12;
                var Fromfloor_three=18;
                var Fromfloor_four= 26;
                var Fromfloor_five=34;
                var Fromfloor_six=40;
                var Fromfloor_seven=47;

                //To Floor

                var tofloor_One=7.5;
                var tofloor_Two=12;
                var tofloor_three=18;
                var tofloor_four=26;
                var tofloor_five=34;
                var tofloor_six=40;
                var tofloor_seven=47;

                //alert("test ="+tofloor_seven + " test2 ="+ tofloor_five);

                $("select#from_floor option:nth-child(2)").attr("pval",Fromfloor_One);
                $("select#from_floor option:nth-child(4)").attr("pval",Fromfloor_One);
                $("select#from_floor option:nth-child(5)").attr("pval",Fromfloor_Two);
                $("select#from_floor option:nth-child(6)").attr("pval",Fromfloor_three);
                $("select#from_floor option:nth-child(7)").attr("pval",Fromfloor_four);
                $("select#from_floor option:nth-child(8)").attr("pval",Fromfloor_five);
                $("select#from_floor option:nth-child(9)").attr("pval",Fromfloor_six);
                $("select#from_floor option:nth-child(10)").attr("pval",Fromfloor_seven);

                $("select#to_floor option:nth-child(2)").attr("pval",tofloor_One);
                $("select#to_floor option:nth-child(4)").attr("pval",tofloor_One);
                $("select#to_floor option:nth-child(5)").attr("pval",tofloor_Two);
                $("select#to_floor option:nth-child(6)").attr("pval",tofloor_three);
                $("select#to_floor option:nth-child(7)").attr("pval",tofloor_four);
                $("select#to_floor option:nth-child(8)").attr("pval",tofloor_five);
                $("select#to_floor option:nth-child(9)").attr("pval",tofloor_six);
                $("select#to_floor option:nth-child(10)").attr("pval",tofloor_seven);


                //Living Room List
                $("input[value='ArmChair']").attr("pVal",ArmChair);
                $("input[value='2SeatSofa']").attr("pVal",TwoSeatSofa);
                $("input[value='3SeatSofa']").attr("pVal",ThreeSeatSofa);
                $("input[value='4SeatSofa']").attr("pVal",FourSeatSofa);
                $("input[value='CornerSofa']").attr("pVal",CornerSofa);
                $("input[value='Coffeetable']").attr("pVal",Coffeetable);
                $("input[value='Sidetables']").attr("pVal",Sidetables);
                $("input[value='ShelvingUnitsSystems']").attr("pVal",ShelvingUnitsSystems);
                $("input[value='DiningTableWood']").attr("pVal",DiningTableWood);
                $("input[value='DiningTableGlass']").attr("pVal",DiningTableGlass);
                $("input[value='Chairs']").attr("pVal",Chairs);
                $("input[value='Tv']").attr("pVal",Tv);
                $("input[value='StereoSystemSpeakers']").attr("pVal",StereoSystemSpeakers);
                $("input[value='Shelves']").attr("pVal",Shelves);
                $("input[value='Library']").attr("pVal",Library);
                $("input[value='TvTable']").attr("pVal",TvTable);
                $("input[value='FloorLamp']").attr("pVal",FloorLamp);
                $("input[value='Lamp']").attr("pVal",Lamp);
                $("input[value='Paintings']").attr("pVal",Paintings);

                //Bed Rooms List
                $("input[value='DoubleBed']").attr("pVal",DoubleBed);
                $("input[value='SingleBed']").attr("pVal",SingleBed);
                $("input[value='Mattress']").attr("pVal",Mattress);
                $("input[value='BedsideTable']").attr("pVal",BedsideTable);
                $("input[value='Wardrobe']").attr("pVal",Wardrobe);
                $("input[value='Mirror']").attr("pVal",Mirror);
                $("input[value='ChestofDrawers']").attr("pVal",ChestofDrawers);
                $("input[value='Stool']").attr("pVal",Stool);
                $("input[value='FloorLampBed']").attr("pVal",FloorLampBed);
                $("input[value='LampBed']").attr("pVal",LampBed);
                $("input[value='BabyCot']").attr("pVal",BabyCot);
                $("input[value='Changingtableforbaby']").attr("pVal",Changingtableforbaby);
                $("input[value='CurtainRods']").attr("pVal",CurtainRods);

                //kitchen
                $("input[value='Fridge']").attr("pVal",Fridge);
                $("input[value='WashingMachine']").attr("pVal",WashingMachine);
                $("input[value='Dishwasher']").attr("pVal",Dishwasher);
                $("input[value='TableKitchen']").attr("pVal",TableKitchen);
                $("input[value='ChairsKitchen']").attr("pVal",ChairsKitchen);
                $("input[value='ElectricCooker']").attr("pVal",ElectricCooker);
                $("input[value='Microwave']").attr("pVal",Microwave);
                $("input[value='LampKitchen']").attr("pVal",LampKitchen);
               
                $("input[value='Freezer']").attr("pVal",Freezer);
                $("input[value='DryerMachine']").attr("pVal",DryerMachine);
                $("input[value='KitchenCabinets']").attr("pVal",KitchenCabinets);
                $("input[value='CurtainRodsKitchen']").attr("pVal",CurtainRodsKitchen);

                //Other Things List
                $("input[value='Desk']").attr("pVal",Desk);
                $("input[value='officeChest']").attr("pVal",officeChest);
                $("input[value='OtherChair']").attr("pVal",OtherChair);
                $("input[value='OtherWardrobe']").attr("pVal",OtherWardrobe);
                $("input[value='Suitcases']").attr("pVal",Suitcases);
                $("input[value='PlasticBags']").attr("pVal",PlasticBags);
                $("input[value='PlasticWardrobe']").attr("pVal",PlasticWardrobe);
                $("input[value='PlasticPots']").attr("pVal",PlasticPots);
                $("input[value='ClayPots']").attr("pVal",ClayPots);
                $("input[value='Jargoniers']").attr("pVal",Jargoniers);
                $("input[value='PatioTable']").attr("pVal",PatioTable);
                $("input[value='AirCondition']").attr("pVal",AirCondition);
                $("input[value='Piano']").attr("pVal",Piano);
                $("input[value='Computer']").attr("pVal",Computer);
                $("input[value='Printer']").attr("pVal",Printer);
                $("input[value='OtherLamp']").attr("pVal",OtherLamp);
                $("input[value='OtherCurtainRods']").attr("pVal",OtherCurtainRods);
                $("input[value='Statue']").attr("pVal",Statue);
                $("input[value='BathroomFurniture']").attr("pVal",BathroomFurniture);
                $("input[value='PingPongTable']").attr("pVal",PingPongTable);

            });

        </script>


</head>

<body>
  

<section role="main" class="content-body">
<div class="container containerFormMenu">
    <div class="row">
        <ul class="transportsFormMenu">
            <li><a href="../"><img src="../../img/home-page/logo-white.png"></a></li>
            <li><a href="../"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
            <li><a href="../offers.php"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Offers</a></li>
        </ul>
    </div>
</div>
<div class="container">

            <div id="rowAdmin" class="row">
                <div class="col-md-2 col-sm-2 personalDetails">
                      <div class="totalmiles"><span class="totalkm"></span>KM</div>
                      <div class="extra-infos"><label>Όνομα</label><input id="inputName" type="text" placeholder="" /></div>
                        <div class="extra-infos"><label>Επίθετο</label><input id="inputSurname" type="text" placeholder="" /></div>
                        <div class="extra-infos"><label>Email</label><input id="email" type="email" name="email" placeholder="" required/></div>
                        <div class="extra-infos"><label>Τηλέφωνο</label> <input id="tel" type="tel" name="phone" placeholder=""/></div>

                        <div class="extra-infos"><label>Sex</label> 
                        <select id="transportSex">
                            <option selected="selected" value="Κύριε">Κύριος</option>
                            <option value="Κυρία">Κυρία</option>
                        </select>
                        </div>

                        <div class="extra-infos"><label>Budget</label><input  id="inputBudget" type="text" placeholder="" disabled="true" /></div>
                        <div class="extra-infos"><label>Commission</label><input id="inputComission" type="text" placeholder="" disabled="true" /></div>
                        <div class="extra-infos"><label>Χρόνος</label><input  id="inputTime" type="text" placeholder="" /></div>

                       
                        <div class="extra-infos"><label>Agent</label>

                            <select name="data[Offer][agent_id]" id="OfferAgentId">
                                <option value="">(choose one)</option>
                                <option value="1" selected="selected">Christos Fragoulakis</option>
                                <option value="2">Andreas Sgouros</option>
                                <option value="3">Markela Markela</option>
                                <option value="4">Tzeni Mazi</option>
                                <option value="5">Panoraia Panoraia</option>
                                <option value="6">marios Ioanidis</option>
                                <option value="7">kosmas kosmas</option>
                                <option value="8">leuteris leuteris</option>
                                <option value="10">Danai Danai</option>
                            </select>
                        </div>
                        <div class="extra-infos"><label>Application</label>
                            <select style="max-width: 167px!important;" id="applicationId" name="data[Offer][application_id]">
                                    <option value="69" minp="50" dur="60">Μετακόμιση Γκαρσονιέρας</option>
                                    <option value="70" minp="70" dur="60">Μετακόμιση Δυάρι</option>
                                    <option value="71" minp="90" dur="60">Μετακόμιση Τριάρι</option>
                                    <option value="72" minp="110" dur="60">Μετακόμιση Τεσσάρι</option>
                                    <option value="196" minp="90" dur="60">Μεταφορική Αθήνα Θεσσαλονίκη-Κατερίνη-Βέροια-Κιλκίς</option>
                                    <option value="219" minp="100" dur="60">Μεταφορική Αθήνα - Ξάνθη - Κομοτηνή - Αλεξανδρούπολη</option>
                                    <option value="218" minp="110" dur="60">Μεταφορική Αθήνα - Χαλκιδική - Σέρρες - Δράμα - Καβάλα </option>
                                    <option value="216" minp="70" dur="60">Μεταφορική Αθήνα Πάτρα</option>
                                    <option value="198" minp="70" dur="60">Ενοικίαση Ανυψωτικού Μηχανήματος</option>
                                    <option value="199" minp="30" dur="60">Συναρμολόγηση Επίπλων</option>
                            </select>
                        </div>
                         <div class="extra-infos"><label>Περιοχή</label>
                                    <select style="max-width: 167px!important;" data-plugin-selecttwo="" id="county" tabindex="-1" aria-hidden="true">
                                                        <option value="3">Achaia</option><option value="4">Aitoloakarnania</option><option value="6">Arcadia</option><option value="5">Argolida</option><option value="7">Arta</option><option selected="selected" value="1">Attica</option><option value="8">Boeotia Prefecture</option><option value="50">Chania </option><option value="51">Chios </option><option value="24">Corfu </option><option value="28">Corinth </option><option value="29">Cyclades </option><option value="11">Dodecanese </option><option value="10">Drama </option><option value="13">Euvias </option><option value="14">Evritania</option><option value="12">Evros</option><option value="47">Florina </option><option value="48">Fokida </option><option value="46">Fthiotida </option><option value="53">Greece</option><option value="9">Grevena </option><option value="49">Halkidiki </option><option value="18">Heraklion </option><option value="16">Ilia</option><option value="17">Imathia </option><option value="20">Ioannina </option><option value="22">Karditsa </option><option value="23">Kastoria </option><option value="21">Kavala </option><option value="25">Kefalonia </option><option value="26">Kilkis </option><option value="27">Kozani </option><option value="30">Laconia </option><option value="31">Larissa Prefecture</option><option value="34">Lefkada </option><option value="33">Lesvos </option><option value="35">Magnesia </option><option value="36">Messinia </option><option value="52">Mount Athos</option><option value="38">Pella </option><option value="32">Prefecture of Lasithi</option><option value="39">Prefecture of Pieria</option><option value="2">Prefecture of Thessaloniki</option><option value="40">Preveza </option><option value="41">Rethymno </option><option value="42">Rodopi </option><option value="43">Samos </option><option value="44">Serres </option><option value="19">Thesprotia </option><option value="45">Trikala </option><option value="37">Xanthi </option><option value="15">Zakynthos </option>                                                  
                                    </select>
                        </div>
                        <div class="sendEmailCheckBox">
                            <input type="checkbox" class="sendEmailCustomer" checked /> <span class="span-sendEmailCustomer">Αποστολή προσφοράς στον πελάτη</span>
                        </div>

                        

                        <div class="extra-infos">
                              <label class="chooseDate" for="myDate">Σχόλια</label>

                                        <textarea class="msg-user" rows="6"></textarea>

                        </div>

                </div>

                <div class="col-md-9 col-form">

                    <form id="msform">

                        <!-- progressbar -->

                        <ul id="progressbar">

                            <li class="active">Προσωπικές Πληροφορίες</li>

                            <li>Πληροφορίες Σπιτιού</li>

                            <li>Τα Πράγματα Σας</li>

                            <li>Υπηρεσίες Μετακόμισης</li>

                        </ul>     

                        <!-- fieldsets -->

                       
                        <fieldset>

                            <h2 class="fs-title">ΠΛΗΡΟΦΟΡΙΕΣ ΜΕΤΑΚΟΜΙΣΗΣ</h2>

                            <h3 class="fs-subtitle">Πείτε μας λίγα λόγια για την μετακόμιση σας</h3>

                            <div class="row">

                                <div class="col-md-6 col-adress removal-fields">

                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>

                                        <input id="from" type="text" class="form-control autocomplete" onfocus="initialize(this,'from')" name="from" placeholder="Διεύθυνση Αφετηρίας" >


                                                   

                                </div>


                                
                                 <div class="col-md-6 col-adress removal-fields to1">
                                        <div id="close-btn1" onclick="removeto(1)">X</div>

                                            

                                            <input id="to1" type="text" class="form-control autocomplete" onfocus="initialize(this,'to1')" name="to1" placeholder="1η Ενδιάμεση στάση" >

                                </div>

                                 <div class="col-md-6 col-adress removal-fields to2">
                                        <div id="close-btn2" onclick="removeto(2)">X</div>
                                            

                                            <input id="to2" type="text" class="form-control autocomplete" onfocus="initialize(this,'to2')" name="to2" placeholder="2η Ενδιάμεση στάση" >

                                </div>
                                <div class="col-md-6 col-adress removal-fields to3">
                                            <div id="close-btn3" onclick="removeto(3)">X</div>
                                            

                                            <input id="to3" type="text" class="form-control autocomplete" onfocus="initialize(this,'to3')" name="to3" placeholder="3η Ενδιάμεση στάση" >

                                </div>
                                <div class="col-md-6 col-adress removal-fields to4">
                                            <div id="close-btn4" onclick="removeto(4)">X</div>
                                           

                                            <input id="to4" type="text" class="form-control autocomplete" onfocus="initialize(this,'to4')" name="to4" placeholder="4η Ενδιάμεση στάση" >

                                </div>

                         		<div class="col-md-6 col-adress removal-fields">

                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>

                                        <input id="to" type="text" class="form-control autocomplete" onfocus="initialize(this,'to')" name="to" placeholder="Διεύθυνση Τελικού προορισμού" >

                                </div>

                                    

                            
                               
                                <div class="col-md-12 addDestinations">
                                    <div class="addimg" onclick="addDirection();"><img src="add.png" ></div><label onclick="addDirection();" name="addDestinations">Προσθέστε ενδιάμεσες στάσεις</label>
                                </div>
                            </div>


                           <!-- <input style="display: none;" class="btn btn-default add_more action-button" type="button" value="ΠΡΟΣΘΗΚΗ ΔΙΕΥΘΥΝΣΗΣ" /> -->

                           

                            <input id="step1btn" type="button" name="next" class="next action-button" value="ΕΠΟΜΕΝΟ"/>

                        </fieldset>

                        <fieldset>

                              <h2 class="fs-title">ΠΛΗΡΟΦΟΡΙΕΣ ΣΠΙΤΙΟΥ</h2>

                               <div class="col-md-12 select-service-col">

                                            <select id="type" class="form-control" name="type" data-isselect="" >

                                                <option value="-1"  pVal="0">Επιλέξτε Yπηρεσία Μετακόμισης</option>

                                                <option value="1" myVal="1" pVal="1" >Μονο φορτηγό, δεν χρειάζομαι εργάτες</option>

                                                <option value="2" myVal="2" pVal="2">Μόνο φορτηγό. Βοήθεια από τον Οδηγό</option>

                                                <option value="3" myVal="3" pVal="3">Χρειάζομαι και φορτηγο και εργάτες</option>

                                            </select>   

                                </div>



                                <div class="col-md-6">

                                    <h3>Παλιά Κατοικία</h3>

                                        <div class="input-group">



                                                    <div class="house-details">

                                                         <select id="old-home-distance" class="form-control" name="type" data-isselect="" >

                                                            <option value="-1" pVal="0">Απόσταση Φορτηγού-Σπίτιού (μέτρα)</option>

                                                            <option value="10"  pVal="0" >Λιγότερο από 10μ</option>

                                                            <option value="20"  pVal="5">Λιγότερο από 20μ</option>

                                                            <option value="30"  pVal="10">Λιγότερο από 30μ</option>

                                                            <option value="40"  pVal="15">Λιγότερο από 40μ</option>

                                                            <option value="50" pVal="20">Λιγότερο από 50μ</option>

                                                            <option value="60"  pVal="25">Λιγότερο από 60μ</option>

                                                            <option value="70+" pVal="30">70+</option>

                                                        </select>   

                                                    </div>

                                                    <div class="house-details">

                                                      <select id="from_floor" class="form-control floors" name="from_floor" data-isselect="">

                                                            <option pVal="0" value="-1">Επιλέξτε Όροφο</option>

                                                            <option pVal="7.5" value="0">Υπόγειο</option>

                                                            <option pVal="0" value="0">Ισόγειο</option>

                                                            <option pVal="7.5" value="1">1ος Όροφος</option>

                                                            <option pVal="12" value="2">2ος Όροφος</option>

                                                            <option pVal="18" value="3">3ος Όροφος</option>

                                                            <option pVal="26" value="4">4ος Όροφος</option>

                                                            <option pVal="34" value="5">5ος Όροφος</option>

                                                            <option pVal="40" value="32">6ος Όροφος</option>

                                                            <option pVal="47" value="7">7ος Όροφος</option>

                                                        </select>

                                                    </div>



                                                    <div class="house-details">

                                                        <select id="from_lift" class="form-control lifts" name="from_lift" data-isselect="">

                                                            <option pVal="0" value="-1">Διαλέξτε Είδος Ανελκυστήρα</option>

                                                            <option pVal="1" value="1">Μικρός Ανελκυστήρας (3-4 άτομα)</option>

                                                            <option pVal="2" value="2">Κανονικός Ανελκυστήρας (5-6 άτομα)</option>

                                                            <option pVal="3" value="3">Μεγάλος Ανελκυστήρας (7+)</option>

                                                            <option pVal="4" value="4">Δεν Υπάρχει Ανελκυστήρας</option>

                                                        </select>

                                                    </div>



                                                    <label  class="control control--checkbox label-checkbox">Το σπίτι βρίσκεται σε δρόμο ταχείας κυκλοφορίας;

                                                          <input id="oldHighRoad" class="checkbox-style" type="checkbox" name="from_opt1">

                                                          <div class="control__indicator"></div>

                                                    </label>



                                                    <label class="control control--checkbox label-checkbox">Χρειάζεται χρήση ανυψωτικού μηχανισμού (αναβατόριο);

                                                      <input id="oldExternalLift" class="checkbox-style" type="checkbox" name="from_ex">

                                                      <div class="control__indicator"></div>

                                                    </label>
                                                    <div class="msg-red">Αν το μπαλκόνι σας Δεν βλέπει στον δρόμο ή Αν το μπαλκόνι σας είναι εσωτερικό (Δεν φαίνεται από τον δρόμο, είναι πιο μέσα απο τα υπόλοιπα). Δεν μπορεί να γίνει χρήση ανυψωτικού.</div>


 



                                        </div>

                                </div>

                                <div id="divStopover1" class="col-md-6 stopover"></div>
                                <div id="divStopover2" class="col-md-6 stopover"></div>
                                <div id="divStopover3" class="col-md-6 stopover"></div>
                                <div id="divStopover4" class="col-md-6 stopover"></div>


                                <div class="col-md-6">

                                    <h3>Νέα Κατοικία</h3>

                                     <div class="input-group">

                                               <div class="house-details">

                                                     <select id="new-home-distance" class="form-control" name="type" data-isselect="" >

                                                            <option value="-1" pVal="0">Απόσταση Φορτηγού-Σπίτιού (μέτρα)</option>

                                                            <option value="10"  pVal="0" >Λιγότερο από 10μ</option>

                                                            <option value="20"  pVal="5">Λιγότερο από 20μ</option>

                                                            <option value="30"  pVal="10">Λιγότερο από 30μ</option>

                                                            <option value="40"  pVal="15">Λιγότερο από 40μ</option>

                                                            <option value="50" pVal="20">Λιγότερο από 50μ</option>

                                                            <option value="60"  pVal="25">Λιγότερο από 60μ</option>

                                                            <option value="70+" pVal="30">70+</option>

                                                    </select> 

                                                </div>

                                                <div class="house-details">

                                                        <select id="to_floor" class="form-control to_floor floors" name="to_floor">

                                                            <option pVal="0" value="-1">Επιλέξτε Όροφο</option>

                                                            <option pVal="7.5" value="0">Υπόγειο</option>

                                                            <option pVal="0" value="0">Ισόγειο</option>

                                                            <option pVal="7.5" value="1">1ος Όροφος</option>

                                                            <option pVal="12" value="2">2ος Όροφος</option>

                                                            <option pVal="18" value="3">3ος Όροφος</option>

                                                            <option pVal="26" value="4">4ος Όροφος</option>

                                                            <option pVal="34" value="5">5ος Όροφος</option>

                                                            <option pVal="40" value="32">6ος Όροφος</option>

                                                            <option pVal="47" value="7">7ος Όροφος</option>

                                                        </select>

                                                </div>

                                                <div class="house-details">

                                                    <select id="to_lift" class="form-control to_lift lifts" name="to_lift" >
                                                       
                                                            <option pVal="0" value="-1">Διαλέξτε Είδος Ανελκυστήρα</option>

                                                            <option pVal="1" value="1">Μικρός Ανελκυστήρας (3-4 άτομα)</option>

                                                            <option pVal="2" value="2">Κανονικός Ανελκυστήρας (5-6 άτομα)</option>

                                                            <option pVal="3" value="3">Μεγάλος Ανελκυστήρας (7+)</option>

                                                            <option pVal="4" value="4">Δεν Υπάρχει Ανελκυστήρας</option>
                                                    </select>

                                                 </div>



                                                <label  class="control control--checkbox label-checkbox">Το σπίτι βρίσκεται σε δρόμο ταχείας κυκλοφορίας;

                                                  <input id="newHighRoad" class="checkbox-style" type="checkbox" name="from_opt2">

                                                  <div class="control__indicator"></div>

                                                </label>



                                                 <label class="control control--checkbox label-checkbox">Χρειάζεται χρήση ανυψωτικού μηχανισμού (αναβατόριο);

                                                      <input id="newExternalLift" class="checkbox-style" type="checkbox" name="to_ex" onclick="exlift($(this));">

                                                      <div class="control__indicator"></div>

                                                </label>  

                                                <div class="msg-red-n">Αν το μπαλκόνι σας Δεν βλέπει στον δρόμο ή Αν το μπαλκόνι σας είναι εσωτερικό (Δεν φαίνεται από τον δρόμο, είναι πιο μέσα απο τα υπόλοιπα). Δεν μπορεί να γίνει χρήση ανυψωτικού.</div>            

                                    </div>

                                </div>

                                <div style="margin-top:20px;" class="row"></div>

                                <input id="step2previous" type="button" name="previous" class="previous action-button-previous" value="ΠΡΟΗΓΟΥΜΕΝΟ"/>

                                <input id="step2btn" type="button" name="next" class="next action-button" value="ΕΠΟΜΕΝΟ"/>
                          
                        </fieldset>

                        <fieldset>

                            <div class="row">
                                <div class="rowthingsfrom"> 

                                        <h2 class="fs-title">ΤΑ ΠΡΑΓΜΑΤΑ ΣΑΣ</h2>

                                        <h3 class="fs-subtitle"></h3>

                                        <div class="row rowThings">

                                         <div class="form-group col-md-6">

                                            <div class="sofas">

                                                <dl class="dropdown"> 

                                                    <dt>

                                                    <a >

                                                      <span style="float:left;" class="hida">Επιλέξτε Αντικείμενα Σαλονιού</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">    

                                                    </a>

                                                    </dt>

                                                  
                                                    <dd>

                                                        <div class="mutliSelect">

                                                            <ul>

                                                                <li>
                                                                <input type="checkbox" from="0" to="0" pVal="3.5" aVal="5.94" mVal="0" lVal="3" value="ArmChair" dimh="1.12" dimw="0.92" diml="0.82" /><label name="ArmChair">Πολυθρόνα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="7" aVal="7.2" mVal="0" lVal="3" value="2SeatSofa" dimh="0.8" dimw="0.85" diml="1.6" /><label name="2SeatSofa">Διθέσιος καναπές</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="9.94" mVal="0" lVal="5" value="3SeatSofa" dimh="0.9" dimw="0.9" diml="2.1" /><label name="3SeatSofa">Τριθέσιος καναπές</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="12" aVal="16.14" mVal="0" lVal="5" value="4SeatSofa"  dimh="0.9" dimw="0.9" diml="2.7"  /><label name="4SeatSofa">Τετραθέσιος καναπές</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="12" aVal="16.14" mVal="20" lVal="3" value="CornerSofa" dimh="0.9" dimw="0.9" diml="3.7" /><label name="CornerSofa" >Γωνιακός καναπές</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2.5" aVal="2" mVal="0" lVal="2" value="Coffeetable" dimh="0.45" dimw="0.38" diml="0.9" /><label name="Coffeetable">Τραπεζάκι σαλονιού</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="1.57" mVal="0" lVal="2" value="Sidetables" dimh="0.5" dimw="0.5" diml="0.5" /><label name="Sidetables">Πλαϊνά τραπεζάκια</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="15" aVal="4.5" mVal="20" lVal="5" value="ShelvingUnitsSystems" dimh="2" dimw="1" diml="0.5" /><label name="ShelvingUnitsSystems">Σύνθετο</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="15" aVal="4.5" mVal="20" lVal="5" value="ShelvingUnitsSystemsM" dimh="2" dimw="1" diml="0.5" /><label name="ShelvingUnitsSystemsM">Μπουφές</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="4" mVal="20" lVal="2" value="Shelves" dimh="1.8" dimw="0.29" diml="0.5" /><label name="Shelves">Ραφιέρα (Κομμάτια 50cm πλάτος)</label></li><!--New -->

                                                                <li><input type="checkbox" from="0" to="0" pVal="8" aVal="4.03" mVal="15" lVal="5" value="DiningTableWood" dimh="1.1" dimw="0.8" diml="1.8" /><label name="DiningTableWood">Ξύλινη τραπεζαρία</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="20" aVal="5" mVal="20" lVal="5" value="DiningTableGlass" dimh="1.1" dimw="0.8" diml="1.8" /><label name="DiningTableGlass">Γυάλινη τραπεζαρία</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="25" aVal="13" mVal="20" lVal="5" value="DiningTableOver10" dimh="2.1" dimw="1.1" diml="0.74" /><label name="DiningTableOver10">Τραπεζαρία άνω των 10 θέσεων</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="Chairs" dimh="1.2" dimw="0.2" diml="0.2" /><label name="Chairs">Καρέκλες</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="1.12" mVal="0" lVal="1" value="Tv" dimh="0" dimw="0" diml="0" /><label name="Tv">Τηλεόραση</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="3.8" mVal="0" lVal="1" value="StereoSystemSpeakers" dimh="0.75" dimw="0.82" diml="0.69" /><label name="StereoSystemSpeakers">Ηχοσύστημα & Ηχεία</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="5" mVal="0" lVal="0" value="Showcase" dimh="0.7" dimw="0.45" diml="1.95" /><label name="Showcase">Μονή Βιτρίνα</label></li>   

                                                                <li><input type="checkbox" from="0" to="0" pVal="20" aVal="5.5" mVal="0" lVal="0" value="DoubleShowcase" dimh="1.15" dimw="0.45" diml="1.95" /><label name="DoubleShowcase">Διπλή Βιτρίνα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="25" aVal="17" mVal="50" lVal="5" value="Bar" dimh="2" dimw="1.15" diml="0.9" /><label name="Bar">Μπαρ</label></li>

                                                                

                                                                <li><input type="checkbox" from="0" to="0" pVal="15" aVal="7.84" mVal="20" lVal="5" value="Library" dimh="2" dimw="0.5" diml="1" /><label name="Library">Βιβλιοθήκη μέχρι 1m πλάτος</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2.5" aVal="2.75" mVal="15" lVal="1" value="TvTable" dimh="1.1" dimw="0.51" diml="0.51" /><label name="TvTable">Τραπεζάκι Τηλεόρασης</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="2.24" mVal="0" lVal="1" value="FloorLamp" dimh="0" dimw="0" diml="0" /><label name="FloorLamp">Επιδαπέδιο φωτιστικό</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="2.24" mVal="0" lVal="1" value="Lamp" dimh="0" dimw="0" diml="0"/><label name="Lamp">Φωτιστικό</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1" aVal="3.95" mVal="0" lVal="2" value="Paintings" dimh="0" dimw="0" diml="0" /><label name="Paintings">Πίνακες έργα τέχνης</label></li>

                                                                 

                                                            </ul>

                                                        </div>

                                                    </dd>

                 

                                                    </dl>

                                                </div>



                                         <div class="LivingRoomList"></div>      

                                        </div>





                                          <div class="form-group col-md-6">

                                            <div class="bedrooms">

                                                <dl class="dropdown"> 

                  

                                                    <dt>

                                                    <a >

                                                      <span style="float:left;" class="hida">Επιλέξτε Αντικείμενα Κρεβατοκάμαρας</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">    

                                                      

                                                    </a>

                                                    </dt>

                                                  

                                                    <dd>

                                                        <div class="mutliSelect">

                                                            <ul>
                                                                 <li><input type="checkbox" from="0" to="0" pVal="5" aVal="5" mVal="0" lVal="2" value="Rantza" dimh="0.9" dimw="0.6" diml="0.1" /><label name="Rantza">Σπαστά κρεβάτια ράτζα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="7" aVal="4" mVal="20" lVal="5" value="DoubleBed" dimh="0.27" dimw="1.6" diml="2.2" /><label name="DoubleBed">Διπλό κρεβάτι με στρώμα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="3.83" mVal="15" lVal="5" value="SingleBed" dimh="0.27" dimw="1.6" diml="2" /><label name="SingleBed">Μονό Κρεβάτι με στρώμα</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="6.8" mVal="0" lVal="5" value="Mattress" dimh="0.27" dimw="1.6" diml="2.2" /><label name="Mattress">Μονό Στρώμα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="9.35" mVal="0" lVal="5" value="2Mattress" dimh="0.27" dimw="1.6" diml="2.2" /><label name="2Mattress">Στρώμα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="12" aVal="9.94" mVal="0" lVal="5" value="Ntivanompaoulo" dimh="2.1" dimw="0.8" diml="0.6" /><label name="Ntivanompaoulo">Ντιβανομπάουλο/Kαναπέ κρεβάτι</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="1.25" mVal="0" lVal="2" value="BedsideTable" dimh="0.5" dimw="0.4" diml="0.4" /><label name="BedsideTable">Κομοδίνο</label></li>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="8" aVal="10" mVal="19" lVal="3" value="Wardrobe" dimh="1" dimw="0.6" diml="1" /><label name="Wardrobe">Ντουλάπα Μονόφυλλη</label></li>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="10" aVal="12" mVal="30" lVal="5" value="2Wardrobe" dimh="1" dimw="0.8" diml="1" /><label name="2Wardrobe">Ντουλάπα Δίφυλλη</label></li>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="15" aVal="15" mVal="30" lVal="5" value="3Wardrobe" dimh="1" dimw="1.1" diml="1" /><label name="3Wardrobe">Ντουλάπα Τρίφυλλη</label></li>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="20" aVal="20" mVal="49" lVal="5" value="4Wardrobe" dimh="1" dimw="2.64" diml="1" /><label name="4Wardrobe">Ντουλάπα Τετράφυλλη</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="6.78" mVal="0" lVal="3" value="Mirror" dimh="0" dimw="0" diml="0" /><label name="Mirror">Καθρέπτης</label></li>
  

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="2" mVal="0" lVal="3" value="ChestofDrawers" dimh="1.3" dimw="1" diml="0.51" /><label name="ChestofDrawers">Συρταριέρα/σιφινιέρα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1.5" aVal="2" mVal="0" lVal="1" value="Stool" dimh="0" dimw="0" diml="0" /><label name="Stool">Σκαμπό/πουφ</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1" aVal="2.24" mVal="0" lVal="1" value="FloorLampBed" dimh="0" dimw="0" diml="0" /><label name="FloorLampBed">Επιδαπέδιο φωτιστικό</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1.5" aVal="2.24" mVal="0" lVal="1" value="LampBed" dimh="0" dimw="0" diml="0" /><label name="LampBed">Φωτιστικό</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="4.81" mVal="20" lVal="3" value="BabyCot" dimh="1.24" dimw="0.65" diml="0.82" /><label name="BabyCot">Κρεβατάκι μωρού</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2.5" aVal="3.92" mVal="20" lVal="2" value="Changingtableforbaby" dimh="0.9" dimw="0.7" diml="0.7" /><label name="Changingtableforbaby">Τραπεζάκι μωρού </label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="0.7" aVal="1" mVal="10" lVal="1" value="CurtainRods" dimh="0" dimw="0" diml="0" /><label name="CurtainRods">Κουρτινόξυλα</label></li>


                                                            </ul>

                                                        </div>

                                                    </dd>

                 

                                                    </dl>

                                                </div>

                                            <div class="BedRoomsList"></div>      

                                        </div>

                                        </div>

                                        <div class="row rowThings">

                                        <div class="form-group col-md-6">

                                            <div class="kitchen">

                                                <dl class="dropdown"> 

                  

                                                    <dt>

                                                    <a  >

                                                      <span style="float:left;" class="hida">Επιλέξτε Κουζινικά</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png"> 

                                                    </a>

                                                    </dt>

                                                  

                                                    <dd>

                                                        <div class="mutliSelect">

                                                            <ul>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="7" aVal="3.09" mVal="10" lVal="2" value="ElectricKitchen" dimh="0.85" dimw="0.6" diml="0.6" /><label name="ElectricKitchen">Ηλεκτρική Κουζίνα</label></li>

                                                                <li><input type="checkbox" from="0" to="0"  pVal="7" aVal="3.09" mVal="30" lVal="2" value="WallElectricKitchen" dimh="0.85" dimw="0.6" diml="0.6" /><label name="WallElectricKitchen">Εντοιχιζόμενη ηλεκ. Κουζίνα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="6.47" mVal="0" lVal="3" value="Fridge" dimh="1.9" dimw="0.6" diml="0.7" /><label name="Fridge">Ψυγείο</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="20" aVal="8" mVal="30" lVal="3" value="FridgeWardrobe" dimh="1.9" dimw="0.92" diml="0.75" /><label name="FridgeWardrobe">Ψυγείο ντουλάπα</label></li>

                                                               <li><input type="checkbox" from="0" to="0" pVal="9" aVal="3.25" mVal="25" lVal="2" value="WashingMachine" dimh="0.85" dimw="0.65" diml="0.65" /><label name="WashingMachine">Πλυντήριο ρούχων</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="3.09" mVal="30" lVal="1" value="Dishwasher" dimh="0.85" dimw="0.6" diml="0.6" /><label name="Dishwasher">Πλυντήριο πιάτων</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="3.5" mVal="0" lVal="3" value="TableKitchen" dimh="1.1" dimw="0.8" diml="1.6" /><label name="TableKitchen">Τραπέζι</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="ChairsKitchen" dimh="1.2" dimw="0.2" diml="0.2" /><label name="ChairsKitchen">Καρέκλες</label></li>




                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="2.05" mVal="0" lVal="1" value="ElectricCooker" dimh="0.3" dimw="0.5" diml="0.3" /><label name="ElectricCooker">Μίνι φουρνάκι ή εστίες</label></li>

                                                                <li><input type="checkbox"  from="0" to="0" pVal="3" aVal="1.05" mVal="0" lVal="1" value="Microwave" dimh="0.3" dimw="0.4" diml="0.5" /><label name="Microwave">Φούρνος Μικροκυμάτων</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1.5" aVal="2.24" mVal="0" lVal="1" value="LampKitchen" dimh="0" dimw="0" diml="0" /><label name="LampKitchen">Φωτιστικό</label></li>
  

                                                                <li><input type="checkbox" from="0" to="0" pVal="7" aVal="3.42" mVal="0" lVal="2" value="Freezer" dimh="0.85" dimw="0.7" diml="0.6" /><label name="Freezer">Καταψύκτης</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="7" aVal="3.25" mVal="0" lVal="2" value="DryerMachine" dimh="0.85" dimw="0.6" diml="0.65" /><label name="DryerMachine">Στεγνωτήριο ρούχων</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="5" mVal="0" lVal="5" value="KitchenCabinets" dimh="0.85" dimw="0.6" diml="0.65" /><label name="KitchenCabinets">Ντουλάπια κουζίνας</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="0.7" aVal="1" mVal="0" lVal="3" value="CurtainRodsKitchen" dimh="0" dimw="0" diml="0" /><label name="CurtainRodsKitchen">Κουρτινόξυλα</label></li>



                                                            </ul>

                                                        </div>

                                                    </dd>

                 

                                                    </dl>

                                                </div>



                                         <div class="KitchenList"></div>      

                                        </div>





                                        <div class="form-group col-md-6">

                                            <div class="otherThings">

                                                <dl class="dropdown"> 

                  

                                                    <dt>

                                                    <a  >

                                                      <span style="float:left;" class="hida">Επιλέξτε Αλλα Αντικείμενα</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">    

                                                      

                                                    </a>

                                                    </dt>

                                                  

                                                    <dd>

                                                        <div class="mutliSelect">

                                                            <ul>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="5.6" mVal="20" lVal="3" value="Desk" dimh="0.75" dimw="0.8" diml="0.42" /><label name="Desk">Γραφείο</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="13" aVal="11" mVal="25" lVal="5" value="BigDesk" dimh="1" dimw="1.78" diml="1" /><label name="BigDesk">Γραφείο βαρύ μεγάλο</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="1.5" aVal="2" mVal="0" lVal="2" value="officeChest" dimh="0.5" dimw="0.3" diml="0.40" /><label name="officeChest">Συρταριέρα Γραφείου</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="1" mVal="0" lVal="2" value="OtherChair" dimh="1.5" dimw="0.3" diml="0.3" /><label name="OtherChair">Καρέκλες</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="5" aVal="5" mVal="0" lVal="2" value="officeBigChair" dimh="1.5" dimw="0.3" diml="0.3" /><label name="officeBigChair">Καρέκλα γραφείου βαριά</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="ChairsSeparate" dimh="0" dimw="0.2" diml="0.2" /><label name="ChairsSeparate">Σπαστές Καρέκλες</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="5.70" mVal="20" lVal="5" value="OtherWardrobe" dimh="1.81" dimw="0.8" diml="0.4" /><label name="OtherWardrobe">Ντουλάπα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2.5" aVal="2.5" mVal="0" lVal="2" value="ShoesCase" dimh="0.5" dimw="0.3" diml="0.40" /><label name="ShoesCase">Παπουτσοθήκη</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1" aVal="0" mVal="0" lVal="1" value="Suitcases" dimh="0" dimw="0" diml="0" /><label name="Suitcases">Βαλίτσες</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1" aVal="0" mVal="0" lVal="1" value="PlasticBags" dimh="0" dimw="0" diml="0" /><label name="PlasticBags">Πλαστικές σακούλες</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="7" aVal="4" mVal="0" lVal="3" value="PlasticWardrobe" dimh="1.81" dimw="0.6" diml="0.4" /><label name="PlasticWardrobe">Πλαστική ντουλάπα</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1.5" aVal="1" mVal="0" lVal="1" value="SmallCarpet" dimh="1.5" dimw="0.3" diml="0.3" /><label name="SmallCarpet">Χαλί Μικρό 1,5m</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="2" mVal="0" lVal="3" value="MediumCarpet" dimh="4" dimw="0.3" diml="0.3" /><label name="MediumCarpet">Χαλί Μεγάλο 4m</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="6" aVal="3" mVal="0" lVal="3" value="BigCarpet" dimh="6" dimw="0.3" diml="0.3" /><label name="BigCarpet">Χαλί Μεγάλο βαρύ 6m</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="2" aVal="0" mVal="0" lVal="1"  value="PlasticPots" dimh="0" dimw="0" diml="0" /><label name="PlasticPots">Πλαστικές γλάστρες</label></li>

                                                                 <li><input type="checkbox" from="0" to="0" pVal="4" aVal="0" mVal="0" lVal="1" value="ClayPots" dimh="0" dimw="0" diml="0" /><label name="ClayPots">Κεραμικές γλάστρες </label></li>

                                                                 <li><input type="checkbox" from="0" to="0" pVal="5" aVal="0" mVal="0" lVal="2" value="Jargoniers" dimh="0" dimw="0" diml="0" /><label name="Jargoniers">Ζαρτινιέρες</label></li>

                                                                 <li><input type="checkbox" from="0" to="0" pVal="10" aVal="6.78" mVal="0" lVal="2" value="PatioTable" dimh="1.81" dimw="0.6" diml="0.4" /><label name="PatioTable">Έπιπλα υπαίθριου χώρου</label></li>

                                                                  <li><input type="checkbox" from="0" to="0" pVal="5" aVal="1.87" mVal="35" lVal="1" value="AirCondition" dimh="0.6" dimw="0.75" diml="1.6" /><label name="AirCondition">AirCondition (Εξωτερική μονάδα)</label></li>

                                                                  <li><input type="checkbox" from="0" to="0" pVal="5" aVal="0.99" mVal="35" lVal="1" value="AirConditionEx" dimh="0.6" dimw="0.75" diml="1.6" /><label name="AirConditionEx">AirCondition (Εσωτερική μονάδα)</label></li>


                                                                  <li><input type="checkbox" from="0" to="0" pVal="5" aVal="2.5" mVal="30" lVal="2" value="WaterHeater" dimh="0.3" dimw="0.3" diml="0.7" /><label name="WaterHeater">Θερμοσίφωνας απλός</label></li>

                                                                  <li><input type="checkbox" from="0" to="0" pVal="15" aVal="3.5" mVal="30" lVal="2" value="SolarWaterHeater" dimh="0.3" dimw="0.3" diml="0.9" /><label name="SolarWaterHeater">Ήλιακός Θερμοσίφωνας</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="2" mVal="0" lVal="1" value="Armonio" dimh="1" dimw="0.3" diml="0.11" /><label name="Armonio">Αρμόνιο</label></li>


                                                                <li><input type="checkbox" from="0" to="0" pVal="70" aVal="5.28" mVal="0" lVal="5" value="Piano" dimh="1.4" dimw="0.51" diml="0.86" /><label name="Piano">Πιάνο</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="140" aVal="8" mVal="0" lVal="5" value="BigPiano" dimh="1.4" dimw="1" diml="0.86" /><label name="BigPiano">Πιάνο με ουρά</label></li>


                                                                <li><input type="checkbox" from="0" to="0"  pVal="2" aVal="1" mVal="0" lVal="1" value="Computer" dimh="0.5" dimw="0.3" diml="0.4" /><label name="Computer">Υπολογιστής</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="1" aVal="0.5" mVal="0" lVal="1" value="Printer" dimh="0" dimw="0" diml="0" /><label name="Printer">Εκτυπωτής</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="4" aVal="2.5" mVal="0" lVal="1" value="OtherLamp" dimh="0" dimw="0" diml="0" /><label name="OtherLamp">Φωτιστικά/Πολυέλαιοι</label></li>
                                                                

                                                                <li><input type="checkbox" from="0" to="0" pVal="0.7" aVal="1" mVal="0" lVal="1" value="OtherCurtainRods" dimh="0" dimw="0" diml="0" /><label name="OtherCurtainRods">Κουρτινόξυλα</label></li>

                                                                
                                                                <li><input type="checkbox" from="0" to="0" pVal="40" aVal="20" mVal="0" lVal="5" value="Statue" dimh="0" dimw="0" diml="0" /><label name="Statue">Άγαλμα</label></li>

                                                                 <li><input type="checkbox" from="0" to="0" pVal="3" aVal="3.72" mVal="0" lVal="3" value="BathroomFurniture" dimh="1" dimw="0.9" diml="0.4" /><label name="BathroomFurniture">Έπιπλα μπάνιου</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="10" aVal="5" mVal="0" lVal="3" value="PingPongTable" dimh="1.3" dimw="0.4" diml="1.5" /><label name="PingPongTable">Τραπέζι πινγκ-πόνγκ</label></li>

                                                                <li><input type="checkbox" from="0" to="0" pVal="8" aVal="5" mVal="0" lVal="3" value="EllipticalMachine" dimh="1.4" dimw="0.62" diml="1.69" /><label name="EllipticalMachine">Ελλειπτικό μηχάνημα</label></li>

                                                                 

                                                            </ul>

                                                        </div>

                                                    </dd>

                 

                                                    </dl>

                                                </div>



                                         <div class="OtherThingsList"></div>      

                                        </div>

                                    </div>     

                                     <div class="col-md-12" style="padding-right: 0px; padding-left:0px;">

                                                    <div class="koutesMetakomisis" title="koutes">

                                                        <input type="button" value="-" onclick="qtyminus('koutes');" class="qtyminus" field="koutes">

                                                        <input type="text" id="koutes" from="0" to="0" pVal="5" aVal2="0" mVal="0" lVal="1" value="0" dimh="0.4" dimw="0.5" diml="0.6" class="qty" disabled>

                                                        <input onclick="qtyplus('koutes');" type="button" value="+" class="qtyplus" field="koutes"> <span>X Πόσες κούτες και τσάντες μετακόμισης υπολογίζετε να έχετε;</span>

                                                    </div>
                                                     <p style="text-align: left;">*Κούτες μετακόμισης νοούνται κούτες με ενδεικτικές διαστάσεις 40cmX50cmX60cm (κούτες ΝΟΥΝΟΥ) και βάρος εώς 10Kg. Αν έχετε μεγαλύτερες ή κούτες με περισσότερο βάρρος παρακαλούμε υπολογίστε τις κούτες σαν διπλές ή τριπλές.</p>

                                      </div>   

                            </div>
                        </div>

                        <div id="rowThings1" class="row"></div>
                        <div id="rowThings2" class="row"></div>
                        <div id="rowThings3" class="row"></div>
                        <div id="rowThings4" class="row"></div>

                        

                       

                            <input id="step3prev" type="button"  name="previous" class=" action-button-previous" value="ΠΡΟΗΓΟΥΜΕΝΟ"/>

                            <input id="step3btn" type="button" onclick="checkThingsValues();"  name="next" class="next action-button" value="ΕΠΟΜΕΝΟ"/>

                       

                        </fieldset>

                        <fieldset id="last-step">

                            <div class="row">



                                    <h2 class="fs-title">Υπηρεσιες μετακομισης</h2>

                                    

                                 <!--   <div class="col-md-6">

                                            <select id="epilogiAmpalaz"  name="Επιλογή για Αμπαλάζ" isselect="" ">

                                                    <option value="-1">Επιλογές για Αμπαλάζ</option>

                                                    <option value="Θα επιλέξω σε πια θέλω αμπαλάζ" data-per="0">Θα επιλέξω σε πια αντιμέμενα θέλω αμπαλάζ</option>

                                                    <option value="Χωρις Αμπαλάζ" data-per="1" >Χωρίς αμπάλαζ αντικειμένων</option>

                                                    <option value="Αμπαλάζ σε όλα τα αντικείμενα" data-per="2" >Θέλω αμπαλάζ σε όλα τα αντικείμενα</option>

                                            </select>

                                    </div>

                                    <div class="col-md-6">

                                            <select id="epilogiLisimoDesimo"  name="Επιλογή Λύσιμο Δέσιμο" isselect="" onchange="lisimoDesimo();">

                                                    <option value="-1">Επιλογές για Λύσιμο/Δέσιμο</option>

                                                    <option value="Θα επιλέξω για πια αντικείμενα θέλω Λύσιμο/Δέσιμο" data-per="0">Θα επιλέξω σε πια αντιμέμενα θέλω Λύσιμο/Δέσιμο</option>

                                                    <option value="Θα επιλέξω σε πια θέλω αμπαλαζ" data-per="1" >Θα κάνω το Λύσιμο/Δέσιμο μόνος μου</option>

                                                    <option value="Αμπαλάζ σε όλα τα αντικείμενα" data-per="2" >Θέλω Λύσιμο/Δέσιμο για όλα τα αντικείμενα</option>

                                            </select>

                                    </div> -->



                                    <div class="table-responsive col-md-12">          

                                              <table id="removaltable" class="table table-striped">

                                                <thead>

                                                  <tr>

                                                    <th>Πράγματα</th>

                                                    <th><div class="th-ampalaz"><div class="divCheckAll"><input id="checkAllAmpalaz" onclick="ampalaz();" type="checkbox" value="" /></div><span>Αμπαλάζ</span></div></th>

                                                    <th><div class="th-lisimo"><div class="divCheckAll"><input id="checkAllLisimo" onclick="lisimoDesimo();" type="checkbox" value="" /></div><span>Λύσιμο</span></div></th>

                                                    <th><div class="th-desimo"><div class="divCheckAll"><input id="checkAllDesimo" onclick="desimoCheck();" type="checkbox" value="" /></div><span>Δέσιμο</span></div></th>

                                                  </tr>

                                                </thead>

                                                <tbody>



                                                </tbody>

                                              </table>

                                    </div>



                                     





                                    <div class="col-md-12">

                                        <div class="divArithmosAtomwn"><label for="varia-antikeimena">Υπάρχουν αντικείμενα που χρειάζονται περισσότερα από δύο άτομα για να μετακινηθούν;</label><div class="variaCheck" ><span class="variaNai"><input id="varia-antikeimena" onclick="variaYes();" type="checkbox" value="Υπάρχουν βαριά αντικείμενα" /></span><span>Ναι</span><span class="variaOxi"><input id="oxi-varia-antikeimena" onclick="variaNo();" type="checkbox" value="Δεν υπάρχουν βαριά αντικείμενα" /></span><span>Όχι</span></div>

                                        </div>

                                    </div>





                                    <div class="col-md-12">

                                        <select id="posa-atoma" class="form-control" name="arithmos-atomon" >

                                                 <option value="-1">Πόσα άτομα θα χρειαστούν;</option>

                                                 <option value="3">3</option>

                                                 <option value="4">4</option>

                                                 <option value="5">5</option>

                                                 <option value="6">6+</option>

                                        </select>

                                    </div>





                                    <div class="col-md-12">

                                        <div class="divAnikeimeaAksias"><label for="antikeimena-aksias">Υπάρχουν αντικείμενα πολύ μεγάλης αξίας;</label>
                                            <div class="aksiasCheck" >
                                                <span class="aksiasNai"><input id="antikeimena-aksias" onclick="aksiasYes();" type="checkbox" value="Υπάρχουν αντικείμενα αξίας" /></span><span>Ναι</span>

                                                <span class="aksiasOxi"><input id="oxi-antikeimena-aksias" onclick="aksiasNo();" type="checkbox" value="Υπάρχουν αντικείμενα αξίας" /></span><span>Όχι</span>

                                            </div>

                                        </div>
                                         <p class="p-antikeimena-aksias">Τα αντικείμενα μεγάλης αξίας χρειάζονται αμπαλάζ και μεταφέρονται με δική σας ευθύνη!</p>

                                    </div>

                                    <div class="col-md-12">

                                        <label class="chooseDate" for="myDate">Eπιθυμητή ημερομηνία</label>

                                        <input type="date" id="myDate" placeholder="2017-11-01" value="">

                                    </div>

                                    

                                   

                                    

                                    

                            </div>





                                    <input id="step4prev" type="button" name="previous" class=" action-button-previous" value="ΠΡΟΗΓΟΥΜΕΝΟ"/>

                             

                                    <input id="step4btn" style="min-width: 150px;" type="button" name="next" class="next action-button" value="ΕΛΕΓΧΟΣ ΤΙΜΩΝ"/>
                                      <input id="printTransport" type="button" value="ΕΠΟΜΕΝΟ" />

                                        <p id="errorsmsg"></p>

                                      



                                

                              

                                    



                        </fieldset>

                         <fieldset id="thankyou">

                            <div class="row rowthankyou">



                                 

                                    

                            </div>

                            <input id="lastprevbtn" type="button" name="" value="ΠΡΟΗΓΟΥΜΕΝΟ" />
                            <input id="savebtn" type="button" name="" value="ΑΠΟΘΗΚΕΥΣΗ" />

                            <p id="saveMsg"></p>



                        </fieldset>





                    </form>

                    <!-- link to designify.me code snippets -->

                    

                    <!-- /.link to designify.me code snippets -->

                </div>
                <div class="col-md-2"></div>
                <div class="col-md-10 print-thing"></div>

                <div class="col-md-12 col-map-outer">

                    <div class="col-map">

                        <div id="map-canvas" style="width: 100%;height:300px;"></div>

                             
                               <!-- <div class="totalmiles"></div> -->

                    </div>

                    

            </div>



</div>

</div>
</section>










<!-- /.MultiStep Form -->



    <!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>



<script src="assets/multistepform/js/msform.js?version=18"></script>

<script src="assets/multistepform/js/bootstrap-multiselect.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE&libraries=places"></script>


<script type="text/javascript">
  function addDirection(){
        if($('.to1').css('display') == 'none'){
            $('.to1').css('display', 'block');
        }else if($('.to2').css('display') == 'none'){
            $('.to2').css('display', 'block');
        }else if($('.to3').css('display') == 'none'){
            $('.to3').css('display', 'block');
        }else if($('.to4').css('display') == 'none'){
            $('.to4').css('display', 'block');
        }
  }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#close-btn1").click(function(){
            $("div.to1").css("display","none");
            $("input#to1").val("");
        });

        $("#close-btn2").click(function(){
            $("div.to2").css("display","none");
            $("input#to2").val("");
        });

        $("#close-btn3").click(function(){
            $("div.to3").css("display","none");
            $("input#to3").val("");
        });

        $("#close-btn4").click(function(){
            $("div.to4").css("display","none");
            $("input#to4").val("");
        });

    });

    
</script>




<script type="text/javascript">

    $(document).ready(function(){

        if($(window).width() < 990){

            $('.col-md-4.col-map-outer').css('margin-top','10px'); 

            $('.col-md-8.col-form').css('margin-bottom','20px');

        }

    });



</script>



<script type="text/javascript">



    var baseprice = 30;

    var locstring = "";



    $(window).load(function(){

        $('.totalcost h3').html('Total '+baseprice+'€');

        defaultMap();

        $('.loading').hide();

    });



    $(document).ready(function(){

        // $('.delete_add').on('click',function(event){

        //  alert('alert');

        //  $(this).parent('div').remove();

        // });

    }); 



    //delete address

    $(document).on('click','.delete_add',function() {

         $(this).closest("div.col-md-6").remove();

    });



    //external lifts checkboxes

    $('input[name=from_ex]').click(function(){

        if($(this).is(':checked') == true){

            baseprice = baseprice + 50;

            $('.totalcost h3').html('Total '+baseprice+'€');

        }

        else{

            if(baseprice !== 30){

                baseprice = baseprice - 50;

                $('.totalcost h3').html('Total '+baseprice+'€');        

            }

            

        }

    });






    // $('.autocomplete').focus(function(){

    //  initialize(this);

    // });



    //add more address

    $('.add_more').click(function(){

     

      if($('.to1:visible').length == 0){

        $('.to1').css('display','table');

      }else if($('.to1:visible').length > 0 && $('#to1').val().length > 0 ){

        $('.to2').css('display','table');

      }

    });



    //reset whole form

    $('.reset').click(function(){

        $(this).text('Reseting...');

        $('.loading').show();

        window.location.reload();

    });



    //add or remove number of items for transport

    $('.items_tra span').on('click',function(){



        var floors = $(".floors").map(function(){return $(this).find(':selected').data('per');}).get();

        var lifts = $(".lifts").map(function(){return $(this).find(':selected').data('per');}).get();



        if($('#type').val() != '1'){

            if(floors != "" && lifts != ""){



            var action = $(this).data('action');

            var part = $(this).parent().parent().parent().data('part');

            var value = parseInt($(this).parent().find('.numbers').html());

            //var add = $(this).parent().data('val');



            

            // if($('#type').find(':selected').val() == 1){

            //  var add = 1;

            // }

            // else{

            //  var add = 5;

            // }

            // var fl = $('#from_floor').find(':selected').data('per');

            //var lf = $('#from_lift').find(':selected').data('per');

            var fl = 0;

            var lf = 0;

            

            for(var i=0; i < floors.length; i++){

                fl += floors[i];

            }

            for(var i=0; i < lifts.length; i++){

                lf += lifts[i];

            }

            

            var getthis = $(this).parent().data('val');

            var first = getthis + getthis*(fl/100);

            var second = (getthis*(fl/100))*(lf/100)/lifts.length;

            var add = first - second;

        //alert('fl '+fl+'\n first '+first+'\nlf '+lf+'\n second '+second);

            if(action == 'plus'){

                    var newvalue = value + 1;

                    $(this).parent().find('.numbers').html(newvalue);

                    baseprice = baseprice+add;

                    $('.totalcost h3').html('Total '+baseprice.toFixed(2)+'€'); 

                }

            if(action == 'minus'){

                if(value != 0){

                    var newvalue = value - 1;

                    $(this).parent().find('.numbers').html(newvalue);

                    baseprice = baseprice-add;

                    $('.totalcost h3').html('Total '+baseprice.toFixed(2)+'€');

                }

            }

            }

            else{

                alert('First select floor and lift both in each address');

            }

        }

        else{

            var value = parseInt($(this).parent().find('.numbers').html());

            var newvalue = value + 1;

            $(this).parent().find('.numbers').html(newvalue);

            var action = $(this).data('action');

            if(action == 'plus'){

                    var newvalue = value + 1;

                    $(this).parent().find('.numbers').html(newvalue);

                }

            if(action == 'minus'){

                if(value != 0){

                    var newvalue = value - 1;

                    $(this).parent().find('.numbers').html(newvalue);

                }

            }

        }

    });





    //items to transport

    $('.items').click(function(){

        var add = $(this).data('val');

        if($(this).is(':checked') == true){

            baseprice = baseprice+add;

            $('.totalcost h3').html('Total '+baseprice.toFixed(2)+'€');

        }

        else{

            baseprice = baseprice-add;

            $('.totalcost h3').html('Total '+baseprice.toFixed(2)+'€'); 

        }


    });



    $('#type').change(function(){

        if($(this).val() == 1){

            $('.floors,.lifts').prop('disabled',true);

        }

        else{

            $('.floors,.lifts').prop('disabled',false); 

        }

    });

    $('#from_floor').change(function(){
        if($(this).val() == 0){
            $('select#from_lift').val("-1");
            $('select#from_lift').prop('disabled',true);
        }else{
            $('select#from_lift').prop('disabled',false);
        }
    });

    $('#to_floor').change(function(){
        if($(this).val() == 0){
            $('select#to_lift').val("-1");
            $('select#to_lift').prop('disabled',true);
        }else{
            $('select#to_lift').prop('disabled',false);
        }
    });

      function stopover_lift(val,id){
       // alert(id.value);
        if(val.value == 0){
            $('select#stopover'+id+'_lift').val("-1");
            $('select#stopover'+id+'_lift').prop('disabled',true);
        }else{
            $('select#stopover'+id+'_lift').prop('disabled',false);
        }
   }


    function exlift(value){

        if(value.is(':checked') == true){

            baseprice = baseprice + 50;

            $('.totalcost h3').html('Total '+baseprice+'€');

        }

        else{

            if(baseprice !== 30){

                baseprice = baseprice - 50;

                $('.totalcost h3').html('Total '+baseprice+'€');        

            }

            

        }

    }


    var autocomplete1, autocomplete2;

    var geocoder;

    var map;

    var directionsDisplay;

    var directionsService = new google.maps.DirectionsService();

      var locations = [];

      var destinations = [];

      var home = [];

      var end = [];

      var end1 =[];

      var end2=[];

      var locIntMap =[];

      locations[0]=["Athens Metropolitan Area,Athens Metropolitan Area, Greece", 38.0363274,23.715680900000052];
      locations[1]="0";
      locations[2]="0";
      locations[3]="0";
      locations[4]="0";
      locations[5]=["Athens,Athens, Greece", 37.9838096, 23.727538800000048];


        
      locIntMap[0]="0";
      locIntMap[1]="0";
      locIntMap[2]="0";
      locIntMap[3]="0";
      locIntMap[4]="0";
      locIntMap[5]="0";

      function removeto(x){
            locations[x]="0";
            locIntMap[x]="0";
            initMap();
            
        }

     

     function initialize(field,loc) {


            var acInputs = document.getElementsByClassName("autocomplete");

            var autocomplete = new google.maps.places.Autocomplete((field),{ types: ['geocode'] ,componentRestrictions: {country: "GR"}});

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
          

                var place = autocomplete.getPlace();

                var name = place.name+','+place.formatted_address;

                var lat = place.geometry.location.lat();

                var lng = place.geometry.location.lng();

                


   
               
                if(loc == 'from'){
                    
                    home = [name,lat,lng];
                    locations[0]= home;
                    locIntMap[0]= home;

                }

                 if(loc == 'to1'){

                    
                    to1 = [name,lat,lng];

                    locations[1]=to1;
                    locIntMap[1]=to1;

                }

                if(loc == 'to2'){
                    
                    to2 = [name,lat,lng];

                    locations[2]=to2;
                    locIntMap[2]=to2;

                }

                if(loc == 'to3'){
                    
                    to3 = [name,lat,lng];

                    locations[3]=to3;
                    locIntMap[3]=to3;

                }
                if(loc == 'to4'){
                    
                    to4 = [name,lat,lng];

                    locations[4]=to4;
                    locIntMap[4]=to4;

                }
                if(loc == 'to'){
                    
                    end = [name,lat,lng];

                    locations[5]=end;
                    locIntMap[5]=end;

                }

            
             
           

               initMap();
               
 

                
            });




    }



    function initMap() {

      directionsDisplay = new google.maps.DirectionsRenderer();


      var map = new google.maps.Map(document.getElementById('map-canvas'), {

        zoom: 10,

        mapTypeId: google.maps.MapTypeId.ROADMAP

      });

      directionsDisplay.setMap(map);

      var infowindow = new google.maps.InfoWindow();



      var marker, i;

      var request = {

        travelMode: google.maps.TravelMode.DRIVING

      };
      var locIntMap= [];
      var y=0;


    for (i = 0; i < locations.length; i++) {

    if(locations[i] != "0"){

                  marker = new google.maps.Marker({

                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),

                  map: map


                });
         


        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {

            infowindow.setContent(locations[i][0]);

            infowindow.open(map, marker);

          }

        })(marker, i));

        if (i == 0) request.origin = marker.getPosition();

        else if (i == locations.length - 1) request.destination = marker.getPosition();

        else {

          if (!request.waypoints) request.waypoints = [];

          request.waypoints.push({

            location: marker.getPosition(),

            stopover: true

          });

        }

    }

}

      directionsService.route(request, function(result, status) {

        if (status == google.maps.DirectionsStatus.OK) {

          directionsDisplay.setDirections(result);

        }

      });

                    locstring="";
                    for(var i=1; i < locations.length; i++){
                        if(locations[i] !="0"){
                            locstring += locations[i][0]+"|";  
                        }
                    }
                   //alert(locstring);
                   first=locations[0][1]+","+locations[0][2];
                // first=locations[0][0];
                   var totalKm=0;
                        for(var i=1; i < locations.length; i++){
                            if(locations[i] !="0"){
                                second= locations[i][1]+","+locations[i][2];
                                
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
                              first= locations[i][1]+","+locations[i][2];
                             // first= locations[i][0];
                          }
                         }




    }



    var defaultlocations = [

        ["Athens Metropolitan Area,Athens Metropolitan Area, Greece", 38.0363274,23.715680900000052],

        ["Athens,Athens, Greece", 37.9838096, 23.727538800000048]

      ];



    function defaultMap() {

      directionsDisplay = new google.maps.DirectionsRenderer();





      var map = new google.maps.Map(document.getElementById('map-canvas'), {

        zoom: 10,

        mapTypeId: google.maps.MapTypeId.ROADMAP

      });

      directionsDisplay.setMap(map);

      var infowindow = new google.maps.InfoWindow();



      var marker, i;

      var request = {

        travelMode: google.maps.TravelMode.DRIVING

      };

      for (i = 0; i < defaultlocations.length; i++) {

        marker = new google.maps.Marker({

          position: new google.maps.LatLng(defaultlocations[i][1], defaultlocations[i][2]),

          map: map

        });



        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {

            infowindow.setContent(defaultlocations[i][0]);

            infowindow.open(map, marker);

          }

        })(marker, i));

        if (i == 0) request.origin = marker.getPosition();

        else if (i == defaultlocations.length - 1) request.destination = marker.getPosition();

        else {

          if (!request.waypoints) request.waypoints = [];

          request.waypoints.push({

            location: marker.getPosition(),

            stopover: true

          });

        }



      }

      directionsService.route(request, function(result, status) {

        if (status == google.maps.DirectionsStatus.OK) {

          directionsDisplay.setDirections(result);

        }

      });

    }



    // function initialize() {





    //         var autocomplete1 = new google.maps.places.Autocomplete((document.getElementById('from')),{ types: ['geocode'] ,componentRestrictions: {country: "GR"}});

    //         var autocomplete2 = new google.maps.places.Autocomplete((document.getElementById('to')),{ types: ['geocode'] ,componentRestrictions: {country: "GR"}});



    //         if(autocomplete1 != ''){

    //          google.maps.event.addListener(autocomplete1, 'place_changed', function () {

    //              //document.getElementById("log").innerHTML = 'You used input with id ' + this.inputId;

    //             var place = autocomplete1.getPlace();

    //              $('#s_lat').val(place.geometry.location.lat());

    //              $('#s_lng').val(place.geometry.location.lng());

    //          }); 

    //         }

            

    //      if(autocomplete2 != ''){



    //              google.maps.event.addListener(autocomplete2, 'place_changed', function () {

    //                  //document.getElementById("log").innerHTML = 'You used input with id ' + this.inputId;

    //                  var place = autocomplete2.getPlace();

    //                  $('#d_lat').val(place.geometry.location.lat());

    //                  $('#d_lng').val(place.geometry.location.lng());



    //                  initMap();

    //              }); 

    //      }

    // }





    // function initMap() {

        

    //      var s_lat = $('#s_lat').val();

    //      var s_lng = $('#s_lng').val();

    //      var d_lat = $('#d_lat').val();

    //      var d_lng = $('#d_lng').val();

    //      $('.totalmiles h3').html("Loading...");



    //     var pointA = new google.maps.LatLng(s_lat, s_lng),

    //         pointB = new google.maps.LatLng(d_lat, d_lng),

    //         myOptions = {

    //             zoom: 7,

    //             center: pointA

    //         },

    //         map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),

    //         // Instantiate a directions service.

    //         directionsService = new google.maps.DirectionsService,

    //         directionsDisplay = new google.maps.DirectionsRenderer({

    //             map: map

    //         }),

    //         markerA = new google.maps.Marker({

    //             position: pointA,

    //             title: "point A",

    //             label: "A",

    //             map: map

    //         }),

    //         markerB = new google.maps.Marker({

    //             position: pointB,

    //             title: "point B",

    //             label: "B",

    //             map: map

    //         });



    //     // get route from A to B

    //      calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);



    //     //get km

    //     //   $.ajax({

    //          //  type: "POST",

    //          //  url:'/transports/getdistance',

    //          //  data:"s_lat="+s_lat+"&s_lng="+s_lng+"&d_lat="+d_lat+"&d_lng="+d_lng,

    //          //  success:function(data){

    //          //      if($.trim(data) != 'failed'){

    //          //          $('.totalmiles h3').html(data);

    //          //      }

    //          //      else{

    //              //  $('.totalmiles h3').html('Unable to get KM');

    //          //      }

    //          //  }

    //          // });

        

        

    // }







    // function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {

    //     directionsService.route({

    //         origin: pointA,

    //         destination: pointB,

    //         avoidTolls: true,

    //         avoidHighways: false,

    //         travelMode: google.maps.TravelMode.DRIVING

    //     }, function (response, status) {

    //         if (status == google.maps.DirectionsStatus.OK) {

    //             directionsDisplay.setDirections(response);

    //         } else {

    //             window.alert('Directions request failed due to ' + status);

    //         }

    //     });

    // }



    // function initialize() {



 //    var acInputs = document.getElementsByClassName("autocomplete");



    //     for (var i = 0; i < acInputs.length; i++) {



    //         var autocomplete1 = new google.maps.places.Autocomplete(acInputs[i]);

    //         autocomplete.inputId = acInputs[i].id;



            



    //         google.maps.event.addListener(autocomplete, 'place_changed', function () {

    //             //document.getElementById("log").innerHTML = 'You used input with id ' + this.inputId;

    //             var place = autocomplete.getPlace();

    //          console.log('Lat '+place.geometry.location.lat());

    //          console.log('Long '+place.geometry.location.lng());

    //         });

    //     }

    // }



 





</script>







<script type="text/javascript">

 



function checkThingsValues(){

var to1Val = $('#to1').val().length;
var to2Val = $('#to2').val().length;
var to3Val = $('#to3').val().length;
var to4Val = $('#to4').val().length;

 $('#removaltable tr').each(function(row, tr){
    //alert($(this).find('td span.tdTitle').length);
    if($(this).find('td span.tdTitle').length>0){

        var firstFrom= $(this).find('td span.tdTitle').attr('from');
        var firstTo= $(this).find('td span.tdTitle').attr('to');
        var tr1=$(this);
        //alert('tr1 ' + tr1 + ' secForm ' + firstFrom + ' firstTo  ' + firstTo );
    }

    

    $('#removaltable tr').each(function(row1, tr){
        if($(this).find('td span.tdTitle').length>0){
            var tr2=$(this);
            var secFrom= $(this).find('td span.tdTitle').attr('from');
            var secTo= $(this).find('td span.tdTitle').attr('to');

           // alert('tr2 ' + tr2 + ' secFrom ' + secFrom + ' secTo  ' + secTo );
            if(firstFrom > secFrom ){
              
             
             tr1.insertAfter(tr2);

            }else if(firstFrom == secFrom){

                if(firstTo > secTo ){
                     tr1.insertAfter(tr2);
                }

            }

          

           
        }


    });


    if( to1Val > 0 || to2Val > 0 || to3Val > 0 || to4Val > 0){

         switch(firstFrom) {
                    case '0': 
                    $(this).find('td span.places span.from').html(" Αφετηρία > ");  
                        break;
                    case '1':   
                     $(this).find('td span.places span.from').html(" 1η Εν. Στάση > ");  
                        break;
                    case '2':
                    $(this).find('td span.places span.from').html(" 2η Εν. Στάση > "); 
                         break;
                    case '3':
                      $(this).find('td span.places span.from').html(" 3η Εν. Στάση > "); 
                        break;
                    case '4':
                     $(this).find('td span.places span.from').html(" 4η Εν. Στάση > "); 
                        break;
                    default:
                }

               switch(firstTo) {
                    case '0': 
                    $(this).find('td span.places span.to').html("Τελικός Προορισμός");  
                        break;
                    case '1':   
                     $(this).find('td span.places span.to').html("1η Εν. Στάση");  
                        break;
                    case '2':
                    $(this).find('td span.places span.to').html("2η Εν. Στάση"); 
                         break;
                    case '3':
                      $(this).find('td span.places span.to').html("3η Εν. Στάση"); 
                        break;
                    case '4':
                     $(this).find('td span.places span.to').html("4η Εν. Στάση"); 
                        break;
                    default:
                }

        }


 });




   /* if($(".rowThings input.qty").length > 0) {



            $('.livingroomthings').each(function(i, obj) {

              var value="<span class='sumThing'>"+  $(this).find('input.qty').val()+ "</span>"; 



              value= value+'X ';



              var id= $(this).find('input.qty').attr('id');



              $('#removaltable tbody tr td span.'+id).html(value);





            });



            $('.BedRoomsList').each(function(i, obj) {

              var value= "<span class='sumThing'>"+ $(this).find('input.qty').val()+ "</span>"; 



              value= value+'X ';



              var id= $(this).find('input.qty').attr('id');



              $('#removaltable tbody tr td span.'+id).html(value);





            });



            $('.KitchenList').each(function(i, obj) {

              var value= "<span class='sumThing'>"+ $(this).find('input.qty').val() + "</span>"; 



              value= value+'X ';



              var id= $(this).find('input.qty').attr('id');



              $('#removaltable tbody tr td span.'+id).html(value);





            });



            $('.OtherThingsList').each(function(i, obj) {

              var value= "<span class='sumThing'>"+ $(this).find('input.qty').val()+ "</span>"; 



              value= value+'X ';



              var id= $(this).find('input.qty').attr('id');



              $('#removaltable tbody tr td span.'+id).html(value);





            });

    }



    var koutes = $('input#koutes').val();*/

    

   /* if(koutes >= 0){

       

        if( $('tbody tr').hasClass('koutes-tsantes')){

            

            $('tbody tr.koutes-tsantes').remove();

        }


            var tablerow = '<tr class="koutes-tsantes"><td><span class="tdTitle" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing">'+ koutes +'</span>Χ </span>Κούτες/Τσάντες</td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td></tr>';

        $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

    }*/







    



}





</script>





<script type="text/javascript">

  





function variaYes(){

    $("#posa-atoma").show();

    $('input#oxi-varia-antikeimena').removeAttr('checked');

    $('input#varia-antikeimena').attr('checked', 'true');

    $('span.variaNai, span.variaOxi').css('border','2px solid #fff');

}



function variaNo(){

    $("#posa-atoma").hide();

    $('input#varia-antikeimena').removeAttr('checked');

     $('input#oxi-varia-antikeimena').attr('checked','true');

    $('span.variaNai, span.variaOxi').css('border','2px solid #fff');

}

function aksiasYes(){

    $(".p-antikeimena-aksias").show();

    $('input#oxi-antikeimena-aksias').removeAttr('checked');

    $('span.aksiasNai, span.aksiasOxi').css('border','2px solid #fff');

}



function aksiasNo(){

    $(".p-antikeimena-aksias").hide();

    $('input#antikeimena-aksias').removeAttr('checked');

    $('span.aksiasNai, span.aksiasOxi').css('border','2px solid #fff'); 

}



</script>



<script type="text/javascript">

   



      function ampalaz(){

        if($('input#checkAllAmpalaz').is(':checked')){

             $('input.ampalaz').each(function(i, obj) {

                    $('input.ampalaz').prop('disabled', false);

                    $('input.ampalaz').prop('checked', true);

                });

         }else if(!$('input#checkAllAmpalaz').is(':checked')){

             $('input.ampalaz').each(function(i, obj) {

                    $('input.ampalaz').removeAttr('checked');

                    $('input.ampalaz').prop('checked', false);

                });

         }

     }

    



    function lisimoDesimo(){

        if($('input#checkAllLisimo').is(':checked')){

             $('input.synarm-checkbox').each(function(i, obj) {

                    $('input.synarm-checkbox').prop('disabled', false);

                    $('input.synarm-checkbox').prop('checked', true);

                });

         }else if(!$('input#checkAllLisimo').is(':checked')){

             $('input.synarm-checkbox').each(function(i, obj) {

                    $('input.synarm-checkbox').removeAttr('checked');

                    $('input.synarm-checkbox').prop('checked', false);

                });

         }

     }

     function desimoCheck(){

        if($('input#checkAllDesimo').is(':checked')){

             $('input.desimo-checkbox').each(function(i, obj) {

                    $('input.desimo-checkbox').prop('disabled', false);

                    $('input.desimo-checkbox').prop('checked', true);

                });

         }else if(!$('input#checkAllDesimo').is(':checked')){

             $('input.desimo-checkbox').each(function(i, obj) {

                    $('input.desimo-checkbox').removeAttr('checked');

                    $('input.desimo-checkbox').prop('checked', false);

                });

         }

     }



</script>


<script type="text/javascript" src="<?php echo $platform_url; ?>js/core.js"></script>
</body>

</html>

