

//jQuery time

var current_fs, next_fs, previous_fs; //fieldsets

var left, opacity, scale; //fieldset properties which we will animate

var animating; //flag to prevent quick multi-click glitches

var num_stopover;
var stopoverstep=0;







$('#step2previous').click(function(){

     $('div.col-map').css('display','block');

     $('.col-md-12.main-title').css('display','block');

});







$("#step1btn").click(function(){

    var formLength = $("#from").val().length;
    var toLength = $("#to").val().length;
    var valEmail = $("#email").val();
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(valEmail)){
      var emailLenght = 10;
    }
    else{
      var emailLenght = 0;
    }

    

    var phoneLenght = $("#tel").val().length;





    var form = false;

    var to = false;

    var email = true;

    var phone = true;





    if(formLength>0){

        form = true;

        $('#from').css('border','1px solid #00ff10');



    }else{

        form = false;

        $('#from').css('border','1px solid red');

    }



    if(toLength>0){

        to = true;

        $('#to').css('border','1px solid #00ff10');



    }else{

        to = false;

        $('#to').css('border','1px solid red');

    }



   

  



  

     if(form && to && email && phone){
          $('.col-map').css('display','none');
          if ($(window).width() < 990) {

           $('div.col-map-outer').css('display','none');

       }
        
         $('.col-md-12.main-title').css('display','none');





          if(animating) return false;

          animating = true;

          

          current_fs = $(this).parent();

          next_fs = $(this).parent().next();

          

          //activate next step on progressbar using the index of next_fs

          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

          

          //show the next fieldset

          next_fs.show(); 

          //hide the current fieldset with style

          current_fs.animate({opacity: 0}, {

            step: function(now, mx) {

              //as the opacity of current_fs reduces to 0 - stored in "now"

              //1. scale current_fs down to 80%

              scale = 1 - (1 - now) * 0.2;

              //2. bring next_fs from the right(50%)

              left = (now * 50)+"%";

              //3. increase opacity of next_fs to 1 as it moves in

              opacity = 1 - now;

              current_fs.css({

                'transform': 'scale('+scale+')',

                //'position': 'absolute'

              });

              next_fs.css({'left': left, 'opacity': opacity});

            }, 

            duration: 800, 

            complete: function(){

              current_fs.hide();

              animating = false;

            }, 

            //this comes from the custom easing plugin

            easing: 'easeInOutBack'

          });

          var stopover=" ";
          var first_stopover=" ";
          var second_stopover= " ";
          var third_stopover= " ";
          var fourth_stopover= " ";
          var check_first_stopover= false;
          var check_second_stopover=false;
          var check_third_stopover=false;
          var check_fourth_stopover=false;
          num_stopover=0;

          if($("input#to1").val().length==0){
            first_stopover="Δεν υπάρχη";
          }else{
            first_stopover=$("input#to1").val();
            check_first_stopover= true;
            num_stopover++;
          }

          if($("input#to2").val().length==0){
            second_stopover="Δεν υπάρχη";
          }else{
            second_stopover=$("input#to2").val();
            check_second_stopover=true;
            num_stopover++;
          }

          if($("input#to3").val().length==0){
            third_stopover="Δεν υπάρχη";
          }else{
            third_stopover=$("input#to3").val();
            check_third_stopover=true;
            num_stopover++;
          }

          if($("input#to4").val().length==0){
            fourth_stopover="Δεν υπάρχη";
          }else{
            fourth_stopover=$("input#to4").val();
            check_fourth_stopover=true;
            num_stopover++;
          }

          stopover= " 1ηΣτάση "+ first_stopover+ " | 2ηΣτάση " + second_stopover + " | 3ηΣτάση" + third_stopover + " | 4ηΣτάση" +  fourth_stopover;


          if(!check_first_stopover && !check_second_stopover && !check_third_stopover && !check_fourth_stopover){
            stopover= "Δεν υπάρχουν";
          }

         if($("div.rem_stopover").length > 0 ){
           $("div.stopover div.rem_stopover").remove();       
         }

         if($("div.rowthingsfrom1").length > 0 ){
           $("div.rowthingsfrom1").remove();       
         }
         if($("div.rowthingsfrom2").length > 0 ){
           $("div.rowthingsfrom2").remove();       
         }
         if($("div.rowthingsfrom3").length > 0 ){
           $("div.rowthingsfrom3").remove();       
         }
         if($("div.rowthingsfrom4").length > 0 ){
           $("div.rowthingsfrom4").remove();       
         }
         
         for(var i=1; i<num_stopover; i++ ){
            $("div#rowthingsfrom"+i).remove();
         }




   var stopover_details=" ";
   var stopover_things=" ";
   var stopoverid=0;
   for(i=0; i<num_stopover; i++){
    stopoverid++;
        stopover_details='<div class="rem_stopover">';
          stopover_details+='<h3>'+ stopoverid +'η Ενδιάμεση Στάση</h3>';
            stopover_details+='<div class="input-group">';
              stopover_details+='<div class="house-details">';
                stopover_details+='<select id="stopover'+ stopoverid +'-distance" class="form-control" name="type" data-isselect="" >';
                  stopover_details+='<option value="-1" pVal="0">Απόσταση Φορτηγού-Σπίτιού (μέτρα)</option>';
                  stopover_details+='<option value="10"  pVal="0" >Λιγότερο από 10μ</option>';
                  stopover_details+='<option value="20"  pVal="5">Λιγότερο από 20μ</option>';
                  stopover_details+='<option value="30"  pVal="10">Λιγότερο από 30μ</option>';
                  stopover_details+='<option value="40"  pVal="15">Λιγότερο από 40μ</option>';
                  stopover_details+='<option value="50" pVal="20">Λιγότερο από 50μ</option>';
                  stopover_details+='<option value="60"  pVal="25">Λιγότερο από 60μ</option>';
                  stopover_details+='<option value="70+" pVal="30">70+</option>';
                stopover_details+='</select>';
              stopover_details+='</div>';
              stopover_details+='<div class="house-details">';
                stopover_details+='<select id="stopover'+ stopoverid +'_floor" class="form-control floors" name="stopover'+ stopoverid +'_floor" onchange="stopover_lift(this,'+stopoverid+')" >';
                  stopover_details+='<option pVal="0" value="-1">Επιλέξτε Όροφο</option>';
                  stopover_details+='<option pVal="7.5" value="0">Υπόγειο</option>';
                  stopover_details+='<option pVal="0" value="0" >Ισόγειο</option>';
                  stopover_details+='<option pVal="7.5" value="1">1ος Όροφος</option>';
                  stopover_details+='<option pVal="12" value="2" >2ος Όροφος</option>';
                  stopover_details+='<option pVal="18" value="3">3ος Όροφος</option>';
                  stopover_details+='<option pVal="26" value="4" >4ος Όροφος</option>';
                  stopover_details+='<option pVal="34" value="5" >5ος Όροφος</option>';
                  stopover_details+='<option pVal="40" value="6" >6ος Όροφος</option>';
                  stopover_details+='<option pVal="47" value="7" >7ος Όροφος</option>';
                stopover_details+='</select>';
              stopover_details+='</div>';
              stopover_details+='<div class="house-details">';
                stopover_details+='<select id="stopover'+ stopoverid +'_lift" class="form-control lifts" name="stopover'+ stopoverid +'_lift" data-isselect="">';
                  stopover_details+='<option pVal="0" value="-1">Διαλέξτε Είδος Ανελκυστήρα</option>';
                  stopover_details+='<option pVal="1" value="1">Μικρός Ανελκυστήρας (3-4 άτομα)</option>';
                  stopover_details+='<option pVal="2" value="2">Κανονικός Ανελκυστήρας (5-6 άτομα)</option>';
                  stopover_details+='<option pVal="3" value="3">Μεγάλος Ανελκυστήρας (7+)</option>';
                  stopover_details+='<option pVal="4" value="4">Δεν Υπάρχει Ανελκυστήρας</option>';
                stopover_details+='</select>';
              stopover_details+='</div>';

              stopover_details+='<label class="control control--checkbox label-checkbox">Το σπίτι βρίσκεται σε δρόμο ταχείας κυκλοφορίας;';
                stopover_details+='<input id="stopover'+ stopoverid +'HighRoad" class="checkbox-style" type="checkbox" name="stopover'+ stopoverid +'from_opt1">';
                stopover_details+='<div class="control__indicator"></div>';
              stopover_details+='</label>';

              stopover_details+='<label class="control control--checkbox label-checkbox">Χρειάζεται χρήση ανυψωτικού μηχανισμού (αναβατόριο);';
                stopover_details+='<input id="stopover'+ stopoverid +'ExternalLift" class="checkbox-style" type="checkbox" name="stopover'+ stopoverid +'from_ex">';
                stopover_details+='<div class="control__indicator"></div>';
              stopover_details+='</label>';
              stopover_details+='<div class="msg-red-'+ stopoverid +'">Αν το μπαλκόνι σας Δεν βλέπει στον δρόμο ή Αν το μπαλκόνι σας είναι εσωτερικό (Δεν φαίνεται από τον δρόμο, είναι πιο μέσα απο τα υπόλοιπα). Δεν μπορεί να γίνει χρήση ανυψωτικού.</div>';
            stopover_details+='</div>';
          stopover_details+='</div>';

        
      $("div#divStopover"+stopoverid).append(stopover_details);

      stopover_things='<div class="rowthingsfrom'+stopoverid+'">';
        stopover_things+='<h2 class="fs-title"><span >Επιλέξτε τα αντικείμενα που θα πάρουμε από την '+stopoverid+'</span>η στάση</h2>';
        stopover_things+='<h3 class="fs-subtitle"></h3>';
        stopover_things+='<div class="row rowThings">';
          stopover_things+='<div class="form-group col-md-6">';
          //stopover_things+='<div class="sofas'+stopoverid+'">';
            stopover_things+='<div class="sofasStopOver">';
              stopover_things+='<dl class="dropdown">';
                stopover_things+='<dt>';
                  stopover_things+='<a >';
                     stopover_things+='<span style="float:left;" class="hida">Επιλέξτε Αντικείμενα Σαλονιού</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">';
                  stopover_things+='</a>';
                stopover_things+=' </dt>';
                stopover_things+='<dd>';
                  stopover_things+='<div class="mutliSelect">';
                    stopover_things+='<ul>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="3.5" aVal="5.94" mVal="0" lVal="3" value="ArmChair'+ stopoverid +'" dimh="1.12" dimw="0.92" diml="0.82" /><label name="ArmChair'+ stopoverid +'">Πολυθρόνα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="7.2" mVal="0" lVal="3" value="2SeatSofa'+ stopoverid +'" dimh="0.8" dimw="0.85" diml="1.6" /><label name="2SeatSofa'+ stopoverid +'">Διθέσιος καναπές</label></li>';                                                   
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="9.94" mVal="0" lVal="5" value="3SeatSofa'+ stopoverid +'" dimh="0.9" dimw="0.9" diml="2.1" /><label name="3SeatSofa'+ stopoverid +'">Τριθέσιος καναπές</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="12" aVal="16.14" mVal="0" lVal="5" value="4SeatSofa'+ stopoverid +'"  dimh="0.9" dimw="0.9" diml="2.7" /><label name="4SeatSofa'+ stopoverid +'">Τετραθέσιος καναπές</label></li>';                                      
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="12" aVal="16.14" mVal="20" lVal="3" value="CornerSofa'+ stopoverid +'" dimh="0.9" dimw="0.9" diml="3.7" /><label name="CornerSofa'+ stopoverid +'" >Γωνιακός καναπές</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2.5" aVal="1.21" mVal="0" lVal="2" value="Coffeetable'+ stopoverid +'" dimh="0.45" dimw="0.38" diml="0.9" /><label name="Coffeetable'+ stopoverid +'">Τραπεζάκι σαλονιού</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="1.57" mVal="0" lVal="2" value="Sidetables'+ stopoverid +'" dimh="0.5" dimw="0.5" diml="0.5" /><label name="Sidetables'+ stopoverid +'">Πλαϊνά τραπεζάκια</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="15" aVal="4.5" mVal="15" lVal="5" value="ShelvingUnitsSystems'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="ShelvingUnitsSystems'+ stopoverid +'">Σύνθετο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="15" aVal="4.5" mVal="20" lVal="5" value="ShelvingUnitsSystemsM'+ stopoverid +'" dimh="2" dimw="1" diml="0.5" /><label name="ShelvingUnitsSystemsM'+ stopoverid +'">Μπουφές</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="4" mVal="20" lVal="2" value="Shelves'+ stopoverid +'" dimh="1.8" dimw="0.29" diml="0.5" /><label name="Shelves'+ stopoverid +'">Ραφιέρα (Κομμάτια 50cm πλάτος)</label></li><!--New -->';   

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="8" aVal="4.03" mVal="15" lVal="5" value="DiningTableWood'+ stopoverid +'" dimh="1.1" dimw="0.8" diml="1.8" /><label name="DiningTableWood'+ stopoverid +'">Ξύλινη τραπεζαρία</label></li>';                                          
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="20" aVal="5" mVal="20" lVal="5" value="DiningTableGlass'+ stopoverid +'" dimh="1.1" dimw="0.8" diml="1.8" /><label name="DiningTableGlass'+ stopoverid +'">Γυάλινη τραπεζαρία</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="25" aVal="13" mVal="20" lVal="5" value="'+ stopoverid +'DiningTableOver10" dimh="2.1" dimw="1.1" diml="0.74" /><label name="'+ stopoverid +'DiningTableOver10">Τραπεζαρία άνω των 10 θέσεων</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="Chairs'+ stopoverid +'" dimh="1.2" dimw="0.2" diml="0.2" /><label name="Chairs'+ stopoverid +'">Καρέκλες</label></li>';    
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="1.12" mVal="0" lVal="1" value="Tv'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Tv'+ stopoverid +'">Τηλεόραση</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="3.8" mVal="0" lVal="1" value="StereoSystemSpeakers'+ stopoverid +'" dimh="0.75" dimw="0.82" diml="0.69" /><label name="StereoSystemSpeakers'+ stopoverid +'">Ηχοσύστημα & Ηχεία</label></li>';
                      
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="5" mVal="0" lVal="0" value="Showcase'+ stopoverid +'" dimh="0.7" dimw="0.45" diml="1.95" /><label name="Showcase'+ stopoverid +'">Μονή Βιτρίνα</label></li><!--New -->';   

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="20" aVal="5.5" mVal="0" lVal="0" value="DoubleShowcase'+ stopoverid +'" dimh="1.15" dimw="0.45" diml="1.95" /><label name="DoubleShowcase'+ stopoverid +'">Διπλή Βιτρίνα</label></li><!--New -->';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="25" aVal="17" mVal="50" lVal="5" value="Bar'+ stopoverid +'" dimh="2" dimw="1.15" diml="0.9" /><label name="Bar'+ stopoverid +'">Μπαρ</label></li>';
                     
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="15" aVal="7.84" mVal="20" lVal="5" value="Library'+ stopoverid +'" dimh="2" dimw="0.5" diml="1" /><label name="Library'+ stopoverid +'">Βιβλιοθήκη μέχρι 1m πλάτος</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2.5" aVal="2.75" mVal="15" lVal="1" value="TvTable'+ stopoverid +'" dimh="1.1" dimw="0.51" diml="0.51" /><label name="TvTable'+ stopoverid +'">Τραπεζάκι Τηλεόρασης</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="2.24" mVal="0" lVal="1" value="FloorLamp'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="FloorLamp'+ stopoverid +'">Επιδαπέδιο φωτιστικό</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="2.24" mVal="0" lVal="1" value="Lamp'+ stopoverid +'" dimh="0" dimw="0" diml="0"/><label name="Lamp'+ stopoverid +'">Φωτιστικό</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1" aVal="3.95" mVal="0" lVal="2" value="Paintings'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Paintings'+ stopoverid +'">Πίνακες έργα τέχνης</label></li>';
                    stopover_things+='</ul>';                                          
                  stopover_things+='</div>';
                stopover_things+='</dd>';
              stopover_things+='</dl>';
            stopover_things+='</div>';
            stopover_things+='<div class="LivingRoomList'+stopoverid+'"></div>';
          stopover_things+='</div>';

          stopover_things+='<div class="form-group col-md-6">';
            stopover_things+='<div class="bedroomsStopOver">';
              stopover_things+='<dl class="dropdown">';
                stopover_things+='<dt>';
                  stopover_things+='<a >';
                    stopover_things+='<span style="float:left;" class="hida">Επιλέξτε Αντικείμενα Κρεβατοκάμαρας</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">';
                  stopover_things+='</a>';
                stopover_things+='</dt>';
                stopover_things+='<dd>';
                  stopover_things+='<div class="mutliSelect">';
                    stopover_things+='<ul>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="1.5" mVal="0" lVal="2" value="Rantza'+ stopoverid +'" dimh="0.9" dimw="0.6" diml="0.1" /><label name="Rantza'+ stopoverid +'">Σπαστά κρεβάτια ράτζα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="4" mVal="20" lVal="5" value="DoubleBed'+ stopoverid +'" dimh="0.27" dimw="1.6" diml="2.2" /><label name="DoubleBed'+ stopoverid +'">Διπλό κρεβάτι με στρώμα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="3.83" mVal="15" lVal="5" value="SingleBed'+ stopoverid +'" dimh="0.27" dimw="1.6" diml="2" /><label name="SingleBed'+ stopoverid +'">Μονό Κρεβάτι με στρώμα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="6.8" mVal="0" lVal="5" value="Mattress'+ stopoverid +'" dimh="0.27" dimw="1.6" diml="2.2" /><label name="Mattress'+ stopoverid +'">Στρώμα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="9.35" mVal="0" lVal="5" value="2Mattress'+ stopoverid +'" dimh="0.27" dimw="1.6" diml="2.2" /><label name="2Mattress'+ stopoverid +'">Στρώμα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="1.25" mVal="0" lVal="2" value="BedsideTable'+ stopoverid +'" dimh="0.5" dimw="0.4" diml="0.4" /><label name="BedsideTable'+ stopoverid +'">Κομοδίνο</label></li>';
 
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0"  pVal="8" aVal="10" mVal="19" lVal="3" value="Wardrobe'+ stopoverid +'" dimh="1" dimw="0.6" diml="1" /><label name="Wardrobe'+ stopoverid +'">Ντουλάπα Μονόφυλλη</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0"  pVal="10" aVal="12" mVal="30" lVal="5" value="2Wardrobe'+ stopoverid +'" dimh="1" dimw="0.8" diml="1" /><label name="2Wardrobe'+ stopoverid +'">Ντουλάπα Δίφυλλη</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0"  pVal="15" aVal="15" mVal="30" lVal="5" value="3Wardrobe'+ stopoverid +'" dimh="1" dimw="1.1" diml="1" /><label name="3Wardrobe'+ stopoverid +'">Ντουλάπα Τρίφυλλη</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0"  pVal="20" aVal="20" mVal="49" lVal="5" value="4Wardrobe'+ stopoverid +'" dimh="1" dimw="2.64" diml="1" /><label name="4Wardrobe'+ stopoverid +'">Ντουλάπα Τετράφυλλη</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="6.78" mVal="0" lVal="3" value="Mirror'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Mirror'+ stopoverid +'">Καθρέπτης</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2"  aVal="2" mVal="0" lVal="3" value="ChestofDrawers'+ stopoverid +'" dimh="1.3" dimw="1" diml="0.51" /><label name="ChestofDrawers'+ stopoverid +'">Συρταριέρα/σιφινιέρα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="2" mVal="0" lVal="1" value="Stool'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Stool'+ stopoverid +'">Σκαμπό/πουφ</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1" aVal="2.24" mVal="0" lVal="1" value="FloorLampBed'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="FloorLampBed'+ stopoverid +'">Επιδαπέδιο φωτιστικό</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1.5" aVal="2.24" mVal="0" lVal="1" value="LampBed'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="LampBed'+ stopoverid +'">Φωτιστικό</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="4.81" mVal="20" lVal="3" value="BabyCot'+ stopoverid +'" dimh="1.24" dimw="0.65" diml="0.82" /><label name="BabyCot'+ stopoverid +'">Κρεβατάκι μωρού</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2.5" aVal="3.92" mVal="0" lVal="2" value="Changingtableforbaby'+ stopoverid +'" dimh="0.9" dimw="0.7" diml="0.7" /><label name="Changingtableforbaby'+ stopoverid +'">Τραπεζάκι μωρού </label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="0.7" aVal="1" mVal="0" lVal="1" value="CurtainRods'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="CurtainRods'+ stopoverid +'">Κουρτινόξυλα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="12" aVal="9.94" mVal="0" lVal="5" value="Ntivanompaoulo'+ stopoverid +'" dimh="2.1" dimw="0.8" diml="0.6" /><label name="Ntivanompaoulo'+ stopoverid +'">Ντιβανομπάουλο/Kαναπέ κρεβάτι</label></li>';
                    stopover_things+='</ul>';
                  stopover_things+='</div>';
                stopover_things+='</dd>';
              stopover_things+='</dl>';
            stopover_things+='</div>';
            stopover_things+='<div class="BedRoomsList'+stopoverid+'"></div>';
          stopover_things+='</div>';

        stopover_things+='</div>';

        stopover_things+='<div class="row rowThings">';
          stopover_things+='<div class="form-group col-md-6">';
            stopover_things+='<div class="kitchenStopOver">';
              stopover_things+='<dl class="dropdown">';
                stopover_things+='<dt>';
                  stopover_things+='<a  >';
                    stopover_things+='<span style="float:left;" class="hida">Επιλέξτε Κουζινικά</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">';
                  stopover_things+='</a>';
                stopover_things+='</dt>';
                stopover_things+='<dd>';
                  stopover_things+='<div class="mutliSelect">';
                    stopover_things+='<ul>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="3.09" mVal="10" lVal="2" value="ElectricKitchen'+ stopoverid +'" dimh="0.85" dimw="0.6" diml="0.6" /><label name="ElectricKitchen'+ stopoverid +'">Ηλεκτρική Κουζίνα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0"  pVal="7" aVal="3.09" mVal="30" lVal="2" value="WallElectricKitchen'+ stopoverid +'" dimh="0.85" dimw="0.6" diml="0.6" /><label name="WallElectricKitchen'+ stopoverid +'">Εντοιχιζόμενη ηλεκ. Κουζίνα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="6.47" mVal="0" lVal="3" value="Fridge'+ stopoverid +'" dimh="1.9" dimw="0.6" diml="0.7" /><label name="Fridge'+ stopoverid +'">Ψυγείο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="20" aVal="8" mVal="30" lVal="3" value="FridgeWardrobe'+ stopoverid +'" dimh="1.9" dimw="0.92" diml="0.75" /><label name="FridgeWardrobe'+ stopoverid +'">Ψυγείο ντουλάπα</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="9" aVal="3.25" mVal="0" lVal="2" value="WashingMachine'+ stopoverid +'" dimh="0.85" dimw="0.65" diml="0.65" /><label name="WashingMachine'+ stopoverid +'">Πλυντήριο ρούχων</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="3.09" mVal="30" lVal="1" value="Dishwasher'+ stopoverid +'" dimh="0.85" dimw="0.6" diml="0.6" /><label name="Dishwasher'+ stopoverid +'">Πλυντήριο πιάτων</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="3.5" mVal="0" lVal="3" value="TableKitchen'+ stopoverid +'" dimh="1.1" dimw="0.8" diml="1.6" /><label name="TableKitchen'+ stopoverid +'">Τραπέζι</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="ChairsKitchen'+ stopoverid +'" dimh="1.2" dimw="0.2" diml="0.2" /><label name="ChairsKitchen'+ stopoverid +'">Καρέκλες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="2.05" mVal="0" lVal="1" value="ElectricCooker'+ stopoverid +'" dimh="0.3" dimw="0.5" diml="0.3" /><label name="ElectricCooker'+ stopoverid +'">Μίνι φουρνάκι ή εστίες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="3" aVal="1.05" mVal="0" lVal="1" value="Microwave'+ stopoverid +'" dimh="0.3" dimw="0.4" diml="0.5" /><label name="Microwave'+ stopoverid +'">Φούρνος Μικροκυμάτων</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1.5" aVal="2.24" mVal="0" lVal="1" value="LampKitchen'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="LampKitchen'+ stopoverid +'">Φωτιστικό</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="3.42" mVal="0" lVal="2" value="Freezer'+ stopoverid +'" dimh="0.85" dimw="0.7" diml="0.6" /><label name="Freezer'+ stopoverid +'">Καταψύκτης</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="3.25" mVal="0" lVal="2" value="DryerMachine'+ stopoverid +'" dimh="0.85" dimw="0.6" diml="0.65" /><label name="DryerMachine'+ stopoverid +'">Στεγνωτήριο ρούχων</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="5" mVal="0" lVal="5" value="KitchenCabinets'+ stopoverid +'" dimh="0.85" dimw="0.6" diml="0.65" /><label name="KitchenCabinets'+ stopoverid +'">Ντουλάπια κουζίνας</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="0.7" aVal="1" mVal="0" lVal="3" value="CurtainRodsKitchen'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="CurtainRodsKitchen'+ stopoverid +'">Κουρτινόξυλα</label></li>';
                    stopover_things+='</ul>';
                  stopover_things+='</div>';
                stopover_things+='</dd>';
              stopover_things+='</dl>';
            stopover_things+='</div>';
            stopover_things+='<div class="KitchenList'+stopoverid+'"></div>';
          stopover_things+='</div>';

          stopover_things+='<div class="form-group col-md-6">';
            stopover_things+='<div class="otherThingsStopOver">';
              stopover_things+='<dl class="dropdown">';
                stopover_things+='<dt>';
                  stopover_things+='<a  >';
                    stopover_things+='<span style="float:left;" class="hida">Επιλέξτε Αλλα Αντικείμενα</span><img style="float: right;" src="https://myconstructor.gr/transport/arrow-down-2.png">';
                  stopover_things+='</a>';
                stopover_things+='</dt>';
                stopover_things+='<dd>';
                  stopover_things+='<div class="mutliSelect">';
                    stopover_things+='<ul>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="5.6" mVal="20" lVal="3" value="Desk'+ stopoverid +'" dimh="0.75" dimw="0.8" diml="0.42" /><label name="Desk'+ stopoverid +'">Γραφείο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="13" aVal="11" mVal="25" lVal="5" value="BigDesk'+ stopoverid +'" dimh="1" dimw="1.78" diml="1" /><label name="BigDesk'+ stopoverid +'">Γραφείο βαρύ μεγάλο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1.5" aVal="2" mVal="0" lVal="2" value="officeChest'+ stopoverid +'" dimh="0.5" dimw="0.3" diml="0.40" /><label name="officeChest'+ stopoverid +'">Συρταριέρα Γραφείου</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="1" mVal="0" lVal="2" value="OtherChair'+ stopoverid +'" dimh="1.5" dimw="0.3" diml="0.3" /><label name="OtherChair'+ stopoverid +'">Καρέκλα</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="5" mVal="0" lVal="2" value="officeBigChair'+ stopoverid +'" dimh="1.5" dimw="0.3" diml="0.3" /><label name="officeBigChair'+ stopoverid +'">Καρέκλα γραφείου βαριά</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="5.70" mVal="20" lVal="5" value="OtherWardrobe'+ stopoverid +'" dimh="1.81" dimw="0.8" diml="0.4" /><label name="OtherWardrobe'+ stopoverid +'">Ντουλάπα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2.5" aVal="2.5" mVal="0" lVal="2" value="ShoesCase'+ stopoverid +'" dimh="0.5" dimw="0.3" diml="0.40" /><label name="ShoesCase'+ stopoverid +'">Παπουτσοθήκη</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1" aVal="0" mVal="0" lVal="1" value="Suitcases'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Suitcases'+ stopoverid +'">Βαλίτσες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1" aVal="0" mVal="0" lVal="1" value="PlasticBags'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="PlasticBags'+ stopoverid +'">Πλαστικές σακούλες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="7" aVal="4" mVal="0" lVal="3" value="PlasticWardrobe'+ stopoverid +'" dimh="1.81" dimw="0.6" diml="0.4" /><label name="PlasticWardrobe'+ stopoverid +'">Πλαστική ντουλάπα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1.5" aVal="1" mVal="0" lVal="1" value="SmallCarpet'+ stopoverid +'" dimh="1.5" dimw="0.3" diml="0.3" /><label name="SmallCarpet'+ stopoverid +'">Χαλί Μικρό 1,5m</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="2" mVal="0" lVal="3" value="MediumCarpet'+ stopoverid +'" dimh="4" dimw="0.3" diml="0.3" /><label name="MediumCarpet'+ stopoverid +'">Χαλί Μεγάλο 4m</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="6" aVal="3" mVal="0" lVal="3" value="BigCarpet'+ stopoverid +'" dimh="6" dimw="0.3" diml="0.3" /><label name="BigCarpet'+ stopoverid +'">Χαλί Μεγάλο βαρύ 6m</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="0" mVal="0" lVal="1"  value="PlasticPots'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="PlasticPots'+ stopoverid +'">Πλαστικές γλάστρες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="0" mVal="0" lVal="1" value="ClayPots'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="ClayPots'+ stopoverid +'">Κεραμικές γλάστρες </label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="0" mVal="0" lVal="2" value="Jargoniers'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Jargoniers'+ stopoverid +'">Ζαρτινιέρες</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="6.78" mVal="0" lVal="2" value="PatioTable'+ stopoverid +'" dimh="1.81" dimw="0.6" diml="0.4" /><label name="PatioTable'+ stopoverid +'">Έπιπλα υπαίθριου χώρου</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="1.87" mVal="35" lVal="1" value="AirCondition'+ stopoverid +'" dimh="0.6" dimw="0.75" diml="1.6" /><label name="AirCondition'+ stopoverid +'">AirCondition (Εσωτερική μονάδα)</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="0.99" mVal="35" lVal="1" value="AirConditionEx'+ stopoverid +'" dimh="0.6" dimw="0.75" diml="1.6" /><label name="AirConditionEx'+ stopoverid +'">AirCondition (Εξωτερική μονάδα)</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="5" aVal="2.5" mVal="30" lVal="2" value="WaterHeater'+ stopoverid +'" dimh="0.3" dimw="0.3" diml="0.7" /><label name="WaterHeater'+ stopoverid +'">Θερμοσίφωνας απλός</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="15" aVal="3.5" mVal="30" lVal="2" value="SolarWaterHeater'+ stopoverid +'" dimh="0.3" dimw="0.3" diml="0.9" /><label name="SolarWaterHeater'+ stopoverid +'">Ήλιακός Θερμοσίφωνας</label></li>';
                      
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="2" mVal="0" lVal="1" value="Armonio'+ stopoverid +'" dimh="1" dimw="0.3" diml="0.11" /><label name="Armonio'+ stopoverid +'">Αρμόνιο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="70" aVal="5.28" mVal="0" lVal="5" value="Piano'+ stopoverid +'" dimh="1.4" dimw="0.51" diml="0.86" /><label name="Piano'+ stopoverid +'">Πιάνο</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="140" aVal="8" mVal="0" lVal="5" value="BigPiano'+ stopoverid +'" dimh="1.4" dimw="1" diml="0.86" /><label name="BigPiano'+ stopoverid +'">Πιάνο με ουρά</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="0.94" mVal="0" lVal="1" value="ChairsSeparate'+ stopoverid +'" dimh="0" dimw="0.2" diml="0.2" /><label name="ChairsSeparate'+ stopoverid +'">Σπαστές Καρέκλες</label></li>';

                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="2" aVal="1" mVal="0" lVal="1" value="Computer'+ stopoverid +'" dimh="0.5" dimw="0.3" diml="0.4" /><label name="Computer'+ stopoverid +'">Υπολογιστής</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="1" aVal="0.5" mVal="0" lVal="1" value="Printer'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Printer'+ stopoverid +'">Εκτυπωτής</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="4" aVal="2.5" mVal="0" lVal="1" value="OtherLamp'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="OtherLamp'+ stopoverid +'">Φωτιστικά/Πολυέλαιοι</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="0.7" aVal="1" mVal="0" lVal="1" value="OtherCurtainRods'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="OtherCurtainRods'+ stopoverid +'">Κουρτινόξυλα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="40" aVal="20" mVal="0" lVal="5" value="Statue'+ stopoverid +'" dimh="0" dimw="0" diml="0" /><label name="Statue'+ stopoverid +'">Άγαλμα</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="3" aVal="3.72" mVal="0" lVal="3" value="BathroomFurniture'+ stopoverid +'" dimh="1" dimw="0.9" diml="0.4" /><label name="BathroomFurniture'+ stopoverid +'">Έπιπλα μπάνιου</label></li>';
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="10" aVal="5" mVal="0" lVal="3" value="PingPongTable'+ stopoverid +'" dimh="1.3" dimw="0.4" diml="1.5" /><label name="PingPongTable'+ stopoverid +'">Τραπέζι πινγκ-πόνγκ</label></li>'; 
                      stopover_things+='<li><input type="checkbox" from="'+ stopoverid +'" to="0" pVal="8" aVal="5" mVal="0" lVal="3" value="EllipticalMachine'+ stopoverid +'" dimh="1.4" dimw="0.62" diml="1.69" /><label name="EllipticalMachine'+ stopoverid +'">Ελλειπτικό μηχάνημα</label></li>';
                    stopover_things+='</ul>';
                  stopover_things+='</div>';
                stopover_things+='</dd>';
              stopover_things+='</dl>';
            stopover_things+='</div>';
            stopover_things+='<div class="OtherThingsList'+stopoverid+'"></div>';
          stopover_things+='</div>';
        stopover_things+='</div>';

        stopover_things+='<div class="col-md-12" style="padding-right: 0px; padding-left:0px;">';
          stopover_things+='<div class="koutesMetakomisis'+stopoverid+'" title="koutes'+ stopoverid +'">';
            stopover_things+='<input type="button" value="-" onclick="qtyminuskoutes(\'koutes'+stopoverid+'\','+stopoverid+')" class="qtyminus" field="koutes'+ stopoverid +'">';
            stopover_things+='<input type="text" id="koutes'+stopoverid+'" from="'+ stopoverid +'" to="0" pVal="5" aVal2="0" mVal="0" lVal="1" value="0" dimh="0.4" dimw="0.5" diml="0.6" class="qty" disabled >';
            stopover_things+='<input onclick="qtypluskoutes(\'koutes'+stopoverid+'\','+stopoverid+')" type="button" value="+" class="qtyplus" field="koutes'+ stopoverid +'"> <span>X Πόσες κούτες και τσάντες μετακόμισης υπολογίζετε να έχετε;</span>';
          stopover_things+='</div>';
          stopover_things+='<p style="text-align: left;">*Κούτες μετακόμισης νοούνται κούτες με ενδεικτικές διαστάσεις 40cmX50cmX60cm (κούτες ΝΟΥΝΟΥ) και βάρος εώς 10Kg. Αν έχετε μεγαλύτερες ή κούτες με περισσότερο βάρρος παρακαλούμε υπολογίστε τις κούτες σαν διπλές ή τριπλές.</p>';
        stopover_things+='</div>';
      //stopover_things+='<div class="col-md-6"><h4>Επιλέξτε τα πράγματα που θα αφήσετε</h4><div class="listofthings'+stopoverid+'"></div></div>';
      if(stopoverid == 1){
        stopover_things+='<div class="col-md-6"><h4>Επιλέξτε τα πράγματα που θα αφήσετε</h4><div class="listofthings'+stopoverid+'"><span class="liststopovertitle">Πράγματα από Αφετηρία</span><div class="listStopOver1"></div></div></div>';
      }else if(stopoverid == 2){
        stopover_things+='<div class="col-md-6"><h4>Επιλέξτε τα πράγματα που θα αφήσετε</h4><div class="listofthings'+stopoverid+'"><span class="liststopovertitle">Πράγματα από Αφετηρία</span><div class="listStopOver1"></div><span class="liststopovertitle">Πράγματα από '+i+'η Στάση</span><div class="listStopOver2"></div></div></div>';
      }else if(stopoverid == 3){
        stopover_things+='<div class="col-md-6"><h4>Επιλέξτε τα πράγματα που θα αφήσετε</h4><div class="listofthings'+stopoverid+'"><span class="liststopovertitle">Πράγματα από Αφετηρία</span><div class="listStopOver1"></div><span class="liststopovertitle">Πράγματα από 1η Στάση</span><div class="listStopOver2"></div><span class="liststopovertitle">Πράγματα από 2η Στάση</span><div class="listStopOver3"></div></div></div>';
      }else if(stopoverid ==4){
        stopover_things+='<div class="col-md-6"><h4>Επιλέξτε τα πράγματα που θα αφήσετε</h4><div class="listofthings'+stopoverid+'"><span class="liststopovertitle">Πράγματα από Αφετηρία</span><div class="listStopOver1"></div><span class="liststopovertitle">Πράγματα από 1η Στάση</span><div class="listStopOver2"></div><span class="liststopovertitle">Πράγματα από 2η Στάση</span><div class="listStopOver3"></div><span class="liststopovertitle">Πράγματα από 3η Στάση</span><div class="listStopOver4"></div></div></div>';
      }
      stopover_things+='<div class="col-md-6"><h4>Στην '+stopoverid+'η Στάση θα αφήσω</h4><div class="listofthingsleave'+stopoverid+'"></div></div>';
      stopover_things+='</div>'; 

      $("div#rowThings"+stopoverid).append(stopover_things);                                                                                                        

      }




         if(!jQuery("input.next").hasClass("done")){



              form = jQuery("input#from").val();

              to = jQuery("input#to").val();

              email= jQuery("input#email").val();

              phone = jQuery("input#tel").val(); 

              

           /*  jQuery.ajax({

                  type:"POST",

                  url:"https://myconstructor.gr/transport/contacts.php",

                  data:{form,to,email,phone},

                  success: function(data){

                     console.log(data);

                     jQuery("input.next").addClass("done"); 

                     // jQuery(".submit-msg").text("Θα επικοινωήσουμε σύντομα μαζί σας!");

                   //  jQuery(".submit-msg").css("color","green");

                 }
             })*/

           }

  }

});







$("#step2btn").click(function(){




   var removalType = $("select#type option:selected").attr('myVal');

   var done=false;
   var doneFromFloor;
   var doneToFloor;
   var Sp1_done=true;
   var Sp2_done=true;
   var Sp3_done=true;
   var Sp4_done=true;


   if(removalType == 1){

          done=true;

          $('select#type').css('border','1px solid #00ff10');

           

          $('select#old-home-distance, select#from_floor, select#from_lift, select#new-home-distance, select#to_floor, select#to_lift').css('border','1px solid #ccc');

     



   }else if(removalType == 2 || removalType == 3){

           var oldDistance = jQuery('#old-home-distance option:selected').attr('value');

           var fromFloor = jQuery('#from_floor option:selected').attr('value');

           var fromLift = jQuery('#from_lift option:selected').attr('value');



           var newDistance = jQuery('#new-home-distance option:selected').attr('value');

           var toFloor = jQuery('#to_floor option:selected').attr('value');

           var toLift = jQuery('#to_lift option:selected').attr('value');

           $('select#type').css('border','1px solid #00ff10');

           
        //Stepovers CHECK
        if($('#divStopover1 div.rem_stopover').length >0){
            var Sp1_Distance = $('#stopover1-distance option:selected').attr('value');
            var Sp1_Floor = $('#stopover1_floor option:selected').attr('value');
            var Sp1_Lift = $('#stopover1_lift option:selected').attr('value');


            if(Sp1_Distance == -1 || Sp1_Floor == -1 ){
                    
                    Sp1_done=false;

                    if(Sp1_Distance == -1){
                          $('select#stopover1-distance').css('border','1px solid red');
                    }else{
                          $('select#stopover1-distance').css('border','1px solid #00ff10');
                    }

                    if(Sp1_Floor == -1){
                          $('select#stopover1_floor').css('border','1px solid red');
                    }else{
                          $('select#stopover1_floor').css('border','1px solid #00ff10');
                    }
  
            }else{
               $('select#stopover1_floor').css('border','1px solid #00ff10');
               if(Sp1_Floor == 0){
                  Sp1_done=true;

                }else if(Sp1_Floor>0){
                    if(Sp1_Lift == -1){
                        Sp1_done=false;
                        $('select#stopover1_lift').css('border','1px solid red');
                    }else{
                        Sp1_done=true;
                        $('select#stopover1_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  Sp1_done=false;
                  if(Sp1_Lift == -1){
                      $('select#stopover1_lift').css('border','1px solid red');
                  }else{
                      $('select#stopover1_lift').css('border','1px solid #00ff10');
                  }
                }  
            }
        }

         if($('#divStopover2  div.rem_stopover').length >0){
            var Sp2_Distance = $('#stopover2-distance option:selected').attr('value');
            var Sp2_Floor = $('#stopover2_floor option:selected').attr('value');
            var Sp2_Lift = $('#stopover2_lift option:selected').attr('value');


            if(Sp2_Distance == -1 || Sp2_Floor == -1 ){
                    
                    Sp2_done=false;

                    if(Sp2_Distance == -1){
                          $('select#stopover2-distance').css('border','1px solid red');
                    }else{
                          $('select#stopover2-distance').css('border','1px solid #00ff10');
                    }

                    if(Sp2_Floor == -1){
                          $('select#stopover2_floor').css('border','1px solid red');
                    }else{
                          $('select#stopover2_floor').css('border','1px solid #00ff10');
                    }
  
            }else{
               $('select#stopover2_floor').css('border','1px solid #00ff10');
               if(Sp2_Floor == 0){
                  Sp2_done=true;

                }else if(Sp2_Floor>0){
                    if(Sp2_Lift == -1){
                        Sp2_done=false;
                        $('select#stopover2_lift').css('border','1px solid red');
                    }else{
                        Sp2_done=true;
                        $('select#stopover2_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  Sp2_done=false;
                  if(Sp2_Lift == -1){
                      $('select#stopover2_lift').css('border','1px solid red');
                  }else{
                      $('select#stopover2_lift').css('border','1px solid #00ff10');
                  }
                }  
            }
        }

        if($('#divStopover3  div.rem_stopover').length >0){
            var Sp3_Distance = $('#stopover3-distance option:selected').attr('value');
            var Sp3_Floor = $('#stopover3_floor option:selected').attr('value');
            var Sp3_Lift = $('#stopover3_lift option:selected').attr('value');


            if(Sp3_Distance == -1 || Sp3_Floor == -1 ){
                    
                    Sp3_done=false;

                    if(Sp3_Distance == -1){
                          $('select#stopover3-distance').css('border','1px solid red');
                    }else{
                          $('select#stopover3-distance').css('border','1px solid #00ff10');
                    }

                    if(Sp3_Floor == -1){
                          $('select#stopover3_floor').css('border','1px solid red');
                    }else{
                          $('select#stopover3_floor').css('border','1px solid #00ff10');
                    }
  
            }else{
               $('select#stopover3_floor  div.rem_stopover').css('border','1px solid #00ff10');
               if(Sp3_Floor == 0){
                  Sp3_done=true;

                }else if(Sp3_Floor>0){
                    if(Sp3_Lift == -1){
                        Sp3_done=false;
                        $('select#stopover3_lift').css('border','1px solid red');
                    }else{
                        Sp3_done=true;
                        $('select#stopover3_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  Sp3_done=false;
                  if(Sp3_Lift == -1){
                      $('select#stopover3_lift').css('border','1px solid red');
                  }else{
                      $('select#stopover3_lift').css('border','1px solid #00ff10');
                  }
                }  
            }
        }

          if($('#divStopover4  div.rem_stopover').length >0){
            var Sp4_Distance = $('#stopover4-distance option:selected').attr('value');
            var Sp4_Floor = $('#stopover4_floor option:selected').attr('value');
            var Sp4_Lift = $('#stopover4_lift option:selected').attr('value');


            if(Sp4_Distance == -1 || Sp4_Floor == -1 ){
                    
                    Sp4_done=false;

                    if(Sp4_Distance == -1){
                          $('select#stopover4-distance').css('border','1px solid red');
                    }else{
                          $('select#stopover4-distance').css('border','1px solid #00ff10');
                    }

                    if(Sp4_Floor == -1){
                          $('select#stopover4_floor').css('border','1px solid red');
                    }else{
                          $('select#stopover4_floor').css('border','1px solid #00ff10');
                    }
  
            }else{
               $('select#stopover4_floor').css('border','1px solid #00ff10');
               if(Sp4_Floor == 0){
                  Sp4_done=true;

                }else if(Sp4_Floor>0){
                    if(Sp4_Lift == -1){
                        Sp4_done=false;
                        $('select#stopover3_lift').css('border','1px solid red');
                    }else{
                        Sp4_done=true;
                        $('select#stopover3_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  Sp4_done=false;
                  if(Sp4_Lift == -1){
                      $('select#stopover3_lift').css('border','1px solid red');
                  }else{
                      $('select#stopover3_lift').css('border','1px solid #00ff10');
                  }
                }  
            }
        }




          //From To CHECKS
          if(oldDistance == -1 || fromFloor == -1 || newDistance == -1 || toFloor == -1){

              done=false;



              if(oldDistance == -1){

                  $('select#old-home-distance').css('border','1px solid red');

              }else{

                  $('select#old-home-distance').css('border','1px solid #00ff10');

              }



              if(fromFloor == -1){

                  $('select#from_floor').css('border','1px solid red');

              }else{

                  $('select#from_floor').css('border','1px solid #00ff10');

              }



        /*      if(fromLift == -1){

                   $('select#from_lift').css('border','1px solid red');

              }else{

                  $('select#from_lift').css('border','1px solid #00ff10');

              }*/



              if (newDistance == -1) {

                  $('select#new-home-distance').css('border','1px solid red');

              }else{

                  $('select#new-home-distance').css('border','1px solid #00ff10');

              }



             if(toFloor == -1){

                  $('select#to_floor').css('border','1px solid red');

              }else{

                  $('select#to_floor').css('border','1px solid #00ff10');

              }



           /*    if(toLift == -1){

                 $('select#to_lift').css('border','1px solid red');

              }else{

                 $('select#to_lift').css('border','1px solid #00ff10');

              } */
          }else{
            $('select#to_floor').css('border','1px solid #00ff10');
            $('select#from_floor').css('border','1px solid #00ff10');
             
              if(fromFloor == 0){
                  doneFromFloor=true;
                
                }else if(fromFloor>0){
                    if(fromLift == -1){
                        doneFromFloor=false;
                        $('select#from_lift').css('border','1px solid red');
                    }else{
                        doneFromFloor=true;
                        $('select#from_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  doneFromFloor=false;
                  if(fromLift == -1){
                      $('select#from_lift').css('border','1px solid red');
                  }else{
                      $('select#from_lift').css('border','1px solid #00ff10');
                  }
                }

                if(toFloor == 0){
                  doneToFloor=true;
                }else if(toFloor>0){
                    if(toLift == -1){
                        doneToFloor=false;
                        $('select#to_lift').css('border','1px solid red');
                    }else{
                        doneToFloor=true;
                        $('select#to_lift').css('border','1px solid #00ff10');
                    }
                }else{
                  doneToFloor=false;
                  if(toLift == -1){
                     $('select#to_lift').css('border','1px solid red');
                  }else{
                     $('select#to_lift').css('border','1px solid #00ff10');
                  } 
                }

                
            }
  }else{

      done=false;

      $('select#type').css('border','1px solid red');

   }

  if(doneFromFloor && doneToFloor){
        done=true;
        $('select#old-home-distance, select#from_floor, select#from_lift, select#new-home-distance, select#to_floor, select#to_lift').css('border','1px solid #ccc');//#00ff10
  }   

  if(Sp1_done && $('#divStopover1 div.rem_stopover').length >0){
    $('#stopover1-distance, #stopover1_floor, #stopover1_lift').css('border','1px solid #ccc');
  }

  if(Sp2_done && $('#divStopover2 div.rem_stopover').length >0){
    $('#stopover2-distance, #stopover2_floor, #stopover2_lift').css('border','1px solid #ccc');
  }

   if(Sp3_done && $('#divStopover3 div.rem_stopover').length >0){
    $('#stopover3-distance, #stopover3_floor, #stopover3_lift').css('border','1px solid #ccc');
  }

   if(Sp4_done && $('#divStopover4 div.rem_stopover').length >0){
    $('#stopover4-distance, #stopover4_floor, #stopover4_lift').css('border','1px solid #ccc');
  }
     
      




   if(done && Sp1_done && Sp2_done && Sp3_done && Sp4_done){
   

      stopoverstep=0; // Pragmata gia oles tis endiameses staseis
    
      if(animating) return false;

          animating = true;

          

          current_fs = $(this).parent();

          next_fs = $(this).parent().next();

          

          //activate next step on progressbar using the index of next_fs

          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

          

          //show the next fieldset

          next_fs.show(); 

          //hide the current fieldset with style

          current_fs.animate({opacity: 0}, {

            step: function(now, mx) {

              //as the opacity of current_fs reduces to 0 - stored in "now"

              //1. scale current_fs down to 80%

              scale = 1 - (1 - now) * 0.2;

              //2. bring next_fs from the right(50%)

              left = (now * 50)+"%";

              //3. increase opacity of next_fs to 1 as it moves in

              opacity = 1 - now;

              current_fs.css({

                'transform': 'scale('+scale+')',

               // 'position': 'absolute'

              });

              next_fs.css({'left': left, 'opacity': opacity});

            }, 

            duration: 800, 

            complete: function(){

              current_fs.hide();

              animating = false;

            }, 

            //this comes from the custom easing plugin
            easing: 'easeInOutBack'

          });

   }

});





$("#step3btn").click(function(){

  if(stopoverstep<=num_stopover){
   stopoverstep++;
  }

  if(stopoverstep == num_stopover){
    $('#step4prev').addClass('lastStep');
  }

 if(stopoverstep == 1 &&  stopoverstep<= num_stopover){
   $('.rowthingsfrom').css('display','none');
   $('#rowThings1').css('display','block');

 }else if(stopoverstep == 2 &&  stopoverstep<= num_stopover ){
  $('#rowThings1').css('display','none');
  $('#rowThings2').css('display','block');
 }else if(stopoverstep == 3 &&  stopoverstep<= num_stopover){
  $('#rowThings2').css('display','none');
  $('#rowThings3').css('display','block');
 }else if(stopoverstep == 4 &&  stopoverstep<= num_stopover){
  $('#rowThings3').css('display','none');
  $('#rowThings4').css('display','block');

      
  }else{
            //After previews return to last stopover
          stopoverstep=num_stopover;

        //   if($(".rowThings input.qty").length > 0 || $("input#koutes").val() > 0 ){
            



                if(animating) return false;
               

                    animating = true;

                    

                    current_fs = $(this).parent();

                    next_fs = $(this).parent().next();

                    

                    //activate next step on progressbar using the index of next_fs

                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    

                    //show the next fieldset

                    next_fs.show(); 

                    //hide the current fieldset with style

                    current_fs.animate({opacity: 0}, {

                      step: function(now, mx) {

                        //as the opacity of current_fs reduces to 0 - stored in "now"

                        //1. scale current_fs down to 80%

                        scale = 1 - (1 - now) * 0.2;

                        //2. bring next_fs from the right(50%)

                        left = (now * 50)+"%";

                        //3. increase opacity of next_fs to 1 as it moves in

                        opacity = 1 - now;

                        current_fs.css({

                          'transform': 'scale('+scale+')',

                         // 'position': 'absolute'

                        });

                        next_fs.css({'left': left, 'opacity': opacity});

                      }, 

                      duration: 800, 

                      complete: function(){

                        current_fs.hide();

                        animating = false;

                      }, 

                      //this comes from the custom easing plugin

                      easing: 'easeInOutBack'

                    });

          // }

}

});









$("#step4btn").click(function(){
    

    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

  var urlParams;

  (window.onpopstate = function () {

    var match,

        pl     = /\+/g,  // Regex for replacing addition symbol with a space

        search = /([^&=]+)=?([^&]*)/g,

        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },

        query  = window.location.search.substring(1);



    urlParams = {};

    while (match = search.exec(query))

       urlParams[decode(match[1])] = decode(match[2]);

})();

//alert(urlParams["catid"]);

//alert(urlParams["memid"]);



    var done = false;

    var done1 = false;

   // ar done2 = false;

    var done3 = false;

    $('p#errorsmsg span').remove();



    /* if($('select#epilogiAmpalaz option:selected').attr('value') == -1){

            done2= false;

            

            $('select#epilogiAmpalaz').css('border','1px solid red');

            $('p#errorsmsg').append('<span class="errorampalaz">Επιλέξτε μια επιλογή για Aμπαλάζ!<br/></span>');

        }else{

            done2= true;

           

            $('select#epilogiAmpalaz').css('border','1px solid #ccc');

            $('p#errorsmsg span.errorampalaz').remove();

        }*/

       

        if($('input#myDate').val().length > 0) {
          done3=true;
          $('input#myDate').css('border', '1px solid #ccc');
          $('p#errorsmsg span.imerominia-error').remove();
        }else{
          $('input#myDate').css('border', '1px solid red');
          $('p#errorsmsg').append('<span class="imerominia-error">Επιλέξτε Ημερομηνία<br/></span>');
        }

   



    if(!$('input#antikeimena-aksias').is(":checked") && !$('input#oxi-antikeimena-aksias').is(":checked") ){ 

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid red');

        done1=false;

        $('p#errorsmsg').append('<span class="erroraksias">Επιλέξτε Ναι ή Όχι<br/></span>');

    }else{

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid #fff');

        done1=true;

      $('p#errorsmsg span.erroraskias').remove();

    }





    if(!$('input#varia-antikeimena').is(":checked") && !$('input#oxi-varia-antikeimena').is(":checked") ){ 

      $('span.variaOxi, span.variaNai').css('border','2px solid red');

      $('p#errorsmsg').append('<span class="errorvaria">Επιλέξτε Ναι ή Όχι<br/></span>');

        done=false;

    }else{

      $('span.variaOxi, span.variaNai').css('border','2px solid #fff');

        done=true;

        $('p#errorsmsg span.errorvaria').remove();

    }



   



    if($('input#varia-antikeimena').is(":checked")){

        if(jQuery('#posa-atoma option:selected').attr('value') == -1){

          jQuery('#posa-atoma').css('border','1px solid red');

          

          done=false;

        }else{

           jQuery('#posa-atoma').css('border','1px solid #ccc');

          done=true;

        }



    }







    if(done && done1 && done3){



        var fromAddress;

        var toAddreess;

        var email;

        var tel;

        var selectService;



        var oldHouseRange;

        var oldFloor;

        var oldLift;

        var oldHighRoad;

        var oldExternalLift;



        var newHouseRange;

        var newFloor;

        var newLift;

        var newHighRoad;

        var newExternalLift;



        var TableData;



      //  var epilogiAmpalaz;

      //  var epilogiLisimoDesimo;



        var variaAntikeimena;



        var antikeimenaAksias;

        var userMsg;
        var professional;
        var profName;
        var profSurName;

        if (urlParams["memid"] !== undefined){
          professional= urlParams["memid"];
        }else{
          professional=0;
        }

        if(urlParams["name"] !== undefined){
          profName= urlParams["name"];
        }else{
          profName= 0;
        }

        if(urlParams["surname"] !== undefined){
          profSurName= urlParams["surname"];
        }else{
          profSurName=0;
        }







        fromAddress= jQuery('input#from').val();

        toAddreess= jQuery('input#to').val();

        email= jQuery('input#email').val();

        tel= jQuery('input#tel').val();

        selectService= $("#type option:selected").text();



        /*OLD HOUSE*/

        oldHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#old-home-distance option:selected').text() +"</b>";

        oldFloor="Όροφος: <b>"+ jQuery('#from_floor option:selected').text() +"</b>";

        oldLift="Ασανσέρ: <b>"+ jQuery('#from_lift option:selected').text() +"</b>";

        

        if(jQuery('#oldHighRoad').is(':checked')){

          oldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          oldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#oldExternalLift').is(':checked')){

          oldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          oldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        /*NEW HOUSE*/



        newHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#new-home-distance option:selected').text() +"</b>";

        newFloor="Όροφος: <b>"+ jQuery('#to_floor option:selected').text() +"</b>";

        newLift="Ασανσέρ: <b>"+ jQuery('#to_lift option:selected').text() +"</b>";



        if(jQuery('#newHighRoad').is(':checked')){

          newHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          newHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#newExternalLift').is(':checked')){

          newExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          newExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        userMsg = jQuery('textarea.msg-user').val();







      

      /*Get table Rows*/

      TableData = storeTblValues()

    //  TableData = $.toJSON(TableData);

   

    /*Print table

      $.each(TableData, function(index, val) {

        console.log(val.things);

        console.log(val.ampalaz);

        console.log(val.lisimoDesimo);

       });  */ 



       /*REMOVAL SERVICES */

       epilogiAmpalaz= jQuery('#epilogiAmpalaz option:selected').text();

       epilogiLisimoDesimo= jQuery('#epilogiLisimoDesimo option:selected').text();



       if(jQuery('#varia-antikeimena').is(':checked')){

         variaAntikeimena="Υπάρχουν βαριά αντικείμενα που χρειάζονται: <b>"+ jQuery('#posa-atoma option:selected').text() + "άτομα</b> για να μετακινηθούν.";

       }else{

         variaAntikeimena= "Δεν υπάρχουν βαριά αντικείμενα.";

       }



       if(jQuery('#antikeimena-aksias').is(':checked')){

          antikeimenaAksias= "Υπάρχουν αντικείμενα μεγάλης αξίας.";

       }else{

          antikeimenaAksias="Δεν υπάρχουν αντικείμενα αξίας.";

       }

       var myDate= jQuery('input#myDate').val();

       var myThings = JSON.stringify(TableData);

       
        /* CALCULATE PRICE */

        var trackPrice=50;
        var km= $('.totalmiles span.totalkm').text();

        var typeTrans = $("select#type option:selected").attr('pVal');

        var from_floor = 0;
        var to_floor=0;
        var old_home_distance=0;
        var new_home_distance=0;
        var from_lift = 0;
        var to_lift=0;

        var Old_ExternalLift =false;
        var New_ExternalLift =false;
        var totalPrice=0;

        var sumThing= 0;
        var thingPrice;
        var OldExtraPrice;
        var mPrice;
        var fromExLiftPrice=0;
        var toExLiftPrice=0;
        var stp1ExLiftPrice=0;
        var stp2ExLiftPrice=0;
        var stp3ExLiftPrice=0;
        var stp4ExLiftPrice=0;
        var thingVolume;
        var dimh;
        var dimw;
        var diml;
        var totalVolume=0;
        var ampalazTotalPrice=0;
        var ampalazCheck=false;
        var val_from;
        var val_to;


        var workers = $("select#posa-atoma option:selected").val();
        
        if(typeTrans > 2){
          trackPrice=40;
        }

       $('#removaltable tbody tr').each(function(row, tr){

            thingPrice=0;
            ampalazPrice=0;
            OldExtraPrice=0;
            NewExtraPrice=0;
            OldExtraPriceDestance=0;
            NewExtraPriceDestance=0;
            mPrice=0;
            fromThingPrice=0;
            toThingPrice=0;
            thingVolume=0;
            dimh=0;
            dimw=0;
            diml=0;
            
            val_from= parseInt($(this).find('td span.tdTitle').attr('from'));
            val_to= parseInt($(this).find('td span.tdTitle').attr('to'));

            if(val_from ==0){
                 old_home_distance= $("select#old-home-distance option:selected").attr('pVal');
                 from_floor= $("select#from_floor option:selected").attr('pVal');
                 from_lift= $("select#from_lift option:selected").attr('pVal');

                if($('#oldExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==0){
                   new_home_distance= $("select#new-home-distance option:selected").attr('pVal');
                   to_floor= $("select#to_floor option:selected").attr('pVal');
                   to_lift= $("select#to_lift option:selected").attr('pVal');

                if($('#newExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==1){
                 old_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover1_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==1){
                   new_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover1_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }


            if(val_from ==2){
                 old_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover2_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==2){
                   new_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover2_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

             if(val_from ==3){
                 old_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover3_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==3){
                   new_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover3_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==4){
                 old_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover4_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==4){
                   new_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover4_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            thingName=$(this).find('td:eq(0)').text();

            sumThing= $(this).find('td:eq(0) span.tdTitle span.sumThing').text();
            thingPrice = $(this).find('td:eq(0) span.tdTitle').attr('pVal');
            liftTypeThing= $(this).find('td:eq(0) span.tdTitle').attr('lVal');



            

                if(!Old_ExternalLift){
                   
                          if(typeTrans == 1){/*Extra Prices */
                                    OldExtraPrice=0;
                                    OldExtraPriceDestance=0;
                                    thingPrice=0;

                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>from_lift && from_lift !=4){
                                if(!from_floor == 0 ){
                                       //OldExtraPrice= 0.3*thingPrice*from_floor/100;
                                     OldExtraPrice= thingPrice*from_floor/100;
                                 }
                                
                                 if(old_home_distance>10){
                                    //  old_home_distance= old_home_distance/5;
                                      //OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 }  
                             }else if(from_lift == 4){
                                
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;

                                if(old_home_distance>10){
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 } 
                             } 
                             fromThingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);
                             fromThingPrice = fromThingPrice*0.3;
                             

                           }else if(typeTrans == 3){
                              if(liftTypeThing>from_lift && from_lift !=4){
                                    if(!from_floor == 0 ){
                                          OldExtraPrice= thingPrice*from_floor/100;
                                    } 
                                    if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                    }
                              }else if(from_lift == 4){
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;
                                if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                }
                             }
                             fromThingPrice = OldExtraPrice + OldExtraPriceDestance;
                             // thingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);

                            }

                            
                }else{
                  if(typeTrans == 1){/*Extra Prices */
                      OldExtraPrice=0;
                      OldExtraPriceDestance=0;
                      thingPrice=0;        
                  }else if(typeTrans == 2){
                      fromThingPrice = parseFloat(thingPrice)*0.3;
                  }else if(typeTrans == 3){
                      fromThingPrice= 0;
                  }
                }


                if(!New_ExternalLift){
                       if(typeTrans == 1){/*Extra Prices */
                                    NewExtraPrice=0;
                                    NewExtraPriceDestance=0;
                                    thingPrice=0;
                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>to_lift && to_lift !=4){ 
                                 if(!to_floor == 0 ){
                                      NewExtraPrice= thingPrice*to_floor/100;
                                  }

                                  if(new_home_distance>10){
                                    
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                    
                                  }
                            }else if(to_lift == 4){//An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;

                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                            NewExtraPrice = NewExtraPrice*0.3;
                            NewExtraPriceDestance= NewExtraPriceDestance*0.3;

                            thingPrice =  /*parseFloat(thingPrice) +*/ parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                             //toThingPrice = toThingPrice*0.4;


                           }else if(typeTrans == 3){
                              if(liftTypeThing>to_lift){ 
                                  if(!to_floor == 0 ){
                                          NewExtraPrice= thingPrice*to_floor/100;
                                   }                                
                                  if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                              }else if(to_lift == 4){ //An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;
                              
                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                              thingPrice = parseFloat(thingPrice) + parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                            }  
                  }else{
                     if(typeTrans == 1){
                       NewExtraPrice=0;
                       NewExtraPriceDestance=0;
                       thingPrice=0;        
                     }else if(typeTrans == 2){
                       thingPrice = fromThingPrice.toFixed(1);
                     }else if(typeTrans == 3){
                       thingPrice = parseFloat(fromThingPrice) + parseFloat(thingPrice);
                     }
                  }

              
                //thingPrice= parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(NewExtraPrice)+ parseFloat(OldExtraPriceDestance) +parseFloat(NewExtraPriceDestance);
                      
                if($(this).find('td:eq(1) input').is(":checked")){
                         ampalazPrice = $(this).find('td:eq(1) input').attr('aVal');
                         thingPrice =  parseFloat(thingPrice) + parseFloat(ampalazPrice);
                         ampalazTotalPrice = parseFloat(ampalazPrice) + parseFloat(ampalazTotalPrice);
                         ampalazCheck=true;
                }

                if($(this).find('td:eq(2) input').length > 0){
                    if($(this).find('td:eq(2) input').is(":checked")){
                           mPrice = 0.4*$(this).find('td:eq(2) input').attr('mVal'); //*lisimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);
                    }

                     if($(this).find('td:eq(3) input').is(":checked")){
                           mPrice = 0.6*$(this).find('td:eq(3) input').attr('mVal'); //*Desimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);
                    }
                }
                

                thingPrice = sumThing * thingPrice;
                thingPrice= thingPrice.toFixed(2);

            
        totalPrice = parseFloat(totalPrice) + parseFloat(thingPrice);

  

        dimh= $(this).find('td:eq(0) span.tdTitle').attr('dimh');
        dimw= $(this).find('td:eq(0) span.tdTitle').attr('dimw');
        diml= $(this).find('td:eq(0) span.tdTitle').attr('diml');

        thingVolume= parseFloat(dimh)*parseFloat(dimw)*parseFloat(diml)*parseFloat(sumThing);
        thingVolume= thingVolume.toFixed(2);

        if(sumThing != 0){
            var printthing= '<p>'+thingName +' VOLUME: '+ thingVolume +' AMPALAZ: ' +ampalazPrice + ' PRICE: '+ thingPrice +'</p>';
            $('.print-thing').append(printthing);
        }


        totalVolume=parseFloat(thingVolume) + parseFloat(totalVolume);
     
        });
        


        if(!$("input#to1").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to1");
        }
        if(!$("input#to2").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to2");
        }
        if(!$("input#to3").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to3");
        }
        if(!$("input#to4").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to4");
        }


        
     // alert("THINGS PRICE: " + totalPrice + " VOLUME: " + totalVolume + " AMPALAZ PRICE: "+ ampalazTotalPrice );
         

        
        var kmPrice=0;
        var extraAmpalazPrice=0;
        

        /*if(Old_ExternalLift){
          fromExLiftPrice=50;
        }

        if(New_ExternalLift){
          toExLiftPrice=50;
        }*/

        if(km > 10 & km < 30){
          kmPrice = parseFloat(km) - parseFloat(10);
          kmPrice = 1.2*kmPrice.toFixed(1);
        }else if(km > 30){
          kmPrice = parseFloat(km) - parseFloat(30);
          kmPrice = 1.7*kmPrice.toFixed(1);
          kmPrice = kmPrice + 24;
        }

        
        //totalPrice = parseFloat(totalPrice) + parseFloat(kmPrice) + parseFloat(trackPrice) + parseFloat(fromExLiftPrice) + parseFloat(toExLiftPrice);

        totalPrice = parseFloat(totalPrice) + parseFloat(kmPrice) + parseFloat(trackPrice);

        switch (workers) { 
            case '3': 
              if(totalPrice <140){
                totalPrice = 140;
              }
              break;
            case '4': 
              if(totalPrice <170){
                totalPrice = 170;
              }
              break;
            case '5': 
              if(totalPrice <200){
                totalPrice = 200;
              }
              break;    
            case '6': 
             if(totalPrice <240){
                totalPrice = 240;
              }
              break;
            default:
             
          }



          if(ampalazCheck){
              if(ampalazTotalPrice<20){
                extraAmpalazPrice= 20 - parseFloat(ampalazTotalPrice);
              }
          }

          totalPrice= parseFloat(extraAmpalazPrice) + parseFloat(totalPrice);

          totalVolume= 0.1*parseFloat(totalVolume) + parseFloat(totalVolume);

          

          if(totalVolume<=4 ){
            driver="Παναγιωτακόπουλος Νίκος";
          }else if(totalVolume > 4 && totalVolume <=9 ){
            driver= "Παναγιωτακόπουλος Βασίλης";
          }else if(totalVolume > 9 && totalVolume<=14.5 ){
            driver="Σταυριανός";
          }else if(totalVolume > 14.5 && totalVolume<=18.5){
            driver="Πανουριας ή Ραικος";
          }else if(totalVolume > 18.5 && totalVolume<=21){
            driver="Ραικος ή Μηνάς";
          }else if(totalVolume > 21 && totalVolume<=22){
            driver="Μηνάς ή Φωτόπουλος";
          }else if(totalVolume > 22 && totalVolume<=25.5){
            driver="Φωτόπουλος ή Πατσέλος ή Φιλίππου ή Βασιλόπουλος";
          }else if(totalVolume > 25.5 && totalVolume<=27.5){
            driver="Πατσέλος ή Φιλίππου ή Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 27.5 && totalVolume<=28){
            driver=" Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 28 && totalVolume<=32.6){
            driver="Μαντζουράνης";
          }else{
            driver="Τα πράγματα δεν χωράνε σε ένα δρομολόγιο";
          }


        var printTotalVol = '<p class="totalvol">Total Volume: ' +  totalVolume.toFixed(2) + ' Driver: ' + driver + ' Km: ' + km + ' kmCost: '+ kmPrice +'Euro</p>';

        //$(printTotalVol).insertBefore('.print-thing');

        $('.print-thing').prepend(printTotalVol);

        var doneTransType1_2=false;
        
        if( ($('#oldExternalLift').is(':checked') && typeTrans == 2) || ($('#oldExternalLift').is(':checked') && typeTrans == 1) ){
          doneTransType1_2=true;
          fromExLiftPrice=70;
          printExLift = '<p class="liftPrice">Ανυψωτικό για αφετηρία τιμή: '+fromExLiftPrice+'€</p>';
          $('.print-thing').prepend(printExLift);

        }else if($('#oldExternalLift').is(':checked') && typeTrans == 3){
          fromExLiftPrice=50;
          printExLift = '<p class="liftPrice">Ανυψωτικό για αφετηρία τιμή: '+fromExLiftPrice+'€</p>';
          $('.print-thing').prepend(printExLift);
        }

        if($('#newExternalLift').is(':checked') && typeTrans == 3){
            toExLiftPrice=50;
            printExLift = '<p class="liftPrice">Ανυψωτικό για τελικό προορισμό τιμή: '+toExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
        }else if( ($('#newExternalLift').is(':checked') && typeTrans == 2) || ($('#newExternalLift').is(':checked') && typeTrans == 1) ){
            toExLiftPrice=70;
            printExLift = '<p class="liftPrice">Ανυψωτικό για τελικό προορισμό τιμή: '+toExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
            doneTransType1_2=true;
        }

        if($('#divStopover1').length  > 0 ){

          if( $('#stopover1ExternalLift').is(':checked') && typeTrans == 3  ){
            stp1ExLiftPrice=50;
            printExLift = '<p class="liftPrice">Ανυψωτικό για 1η Εν στάση τιμή: '+stp1ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
          }else if( ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 2 ) || ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 1 )  ){
            stp1ExLiftPrice=70;
             printExLift = '<p class="liftPrice">Ανυψωτικό για 1η Εν στάση τιμή: '+stp1ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
            doneTransType1_2=true;
          }


        }

        if($('#divStopover2').length  > 0 ){

          if($('#stopover2ExternalLift').is(':checked') && typeTrans == 3){
            stp2ExLiftPrice=50;
            printExLift = '<p class="liftPrice">Ανυψωτικό για 2η Εν στάση τιμή: '+stp2ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
          }else if( ($('#stopover2ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover2ExternalLift').is(':checked') && typeTrans == 1) ){
            stp2ExLiftPrice=70;
             printExLift = '<p class="liftPrice">Ανυψωτικό για 2η Εν στάση τιμή: '+stp2ExLiftPrice+'€</p>';
             $('.print-thing').prepend(printExLift);
             doneTransType1_2=true;
          }

        }

        if($('#divStopover3').length  > 0 ){

          if($('#stopover3ExternalLift').is(':checked') && typeTrans == 3){
            stp3ExLiftPrice=50;
             printExLift = '<p class="liftPrice">Ανυψωτικό για 3η Εν στάση τιμή: '+stp3ExLiftPrice+'€</p>';
             $('.print-thing').prepend(printExLift);
          }else if(($('#stopover3ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover3ExternalLift').is(':checked') && typeTrans == 1)){
            stp3ExLiftPrice=70;
            printExLift = '<p class="liftPrice">Ανυψωτικό για 3η Εν στάση τιμή: '+stp3ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
            doneTransType1_2=true;
          }

        }

        if($('#divStopover4').length  > 0 ){

          if($('#stopover4ExternalLift').is(':checked') && typeTrans == 3){
            stp4ExLiftPrice=50;
            printExLift = '<p class="liftPrice">Ανυψωτικό για 4η Εν στάση τιμή: '+stp4ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
          }else if(($('#stopover4ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover4ExternalLift').is(':checked') && typeTrans == 1)){
            stp4ExLiftPrice=70;
            printExLift = '<p class="liftPrice">Ανυψωτικό για 4η Εν στάση τιμή: '+stp4ExLiftPrice+'€</p>';
            $('.print-thing').prepend(printExLift);
            doneTransType1_2=true;
          }

        }


        var comission = totalPrice*0.3;
        comission = comission.toFixed(0);

        totalPrice = parseFloat(totalPrice) + parseFloat(fromExLiftPrice) + parseFloat(toExLiftPrice) + parseFloat(stp1ExLiftPrice) + parseFloat(stp2ExLiftPrice) + parseFloat(stp3ExLiftPrice) + parseFloat(stp4ExLiftPrice);
        totalPrice= totalPrice.toFixed(0);

        $("#inputBudget").val(totalPrice);
        $("#inputComission").val(comission);


        if(doneTransType1_2){
          alert('Αν το ανυψωτικό και το φορτηγο χρησιμοποιηθούν για πάνω από 2,5 ώρες υπάρχει επιπλέον χρέωση 15€ για κάθε μηχάνημα/όχημα!');
          $('.print-thing').prepend('<p style="color:red;">Αν το ανυψωτικό και το φορτηγο χρησιμοποιηθούν για πάνω από 2,5 ώρες υπάρχει επιπλέον χρέωση 15€ για κάθε μηχάνημα/όχημα!</p>');
        }

        var hours = Math.floor( totalPrice / 60);          
        var minutes = totalPrice % 60;

        if(hours < 1 ){
          hours= minutes + 'λεπτά';
        }else if(hours == 1){
          hours= hours+'ώρα και ' + minutes + 'λεπτά';
        }else{
          hours= hours+'ώρες και ' + minutes + 'λεπτά';
        }

        $('input#inputTime').val(hours);







       

       

        //alert("Συνολικός Όγκος: "+totalVolume+ " Προτεινόμενος οδηγός: "+driver + " Τελική τιμή: "+totalPrice);



        $('#printTransport').show();

        $('#step4btn').css('display','none');

        if(totalPrice < 70 ){
          alert('Η μεταφορά είναι κάτω των 70€ πρέπει να συνδυαστεί με άλλη μεταφορά που έχει φορτηγό και εργάτες!');
          $('.print-thing').prepend('<p style="color:red;">Η μεταφορά είναι κάτω των 70€ πρέπει να συνδυαστεί με άλλη μεταφορά που έχει φορτηγό και εργάτες!</p>');
        }








      /*  jQuery.ajax({

                  type:"POST",

                  url:"https://development.myconstructor.gr/transport/offer.php",

                  data:{fromAddress,toAddreess,email,tel,selectService,oldHouseRange,oldFloor,oldLift,oldHighRoad,oldExternalLift,newHouseRange,newFloor,newLift,newHighRoad,newExternalLift,myThings,variaAntikeimena,antikeimenaAksias,myDate,userMsg,professional,profName,profSurName},

                  async: true,

                  dataType: 'json',

                  success: function(data){

                     console.log(data);

                    if(data){ 

                          $('#last-step').css('display','none');

                          $('#thankyou').css('display','block');

                    }else{

                      jQuery('p#errorsmsg').append('<span>Αποτυχία Αποστολής</span><br/>');

                    }

                 }

             })*/

     }

});



$('#printTransport').click(function(){


    var done = false;

    var done1 = false;

   // ar done2 = false;

    var done3 = false;

    $('p#errorsmsg span').remove();
       
        if($('select#epilogiLisimoDesimo option:selected').attr('value') == -1){

            done3= false;

          

            $('select#epilogiLisimoDesimo').css('border','1px solid red');

            $('p#errorsmsg').append('<span class="errorlisimo">Επιλέξτε μια επιλογή για Λύσιμο/Δέσιμο!<br/></span>');

        }else{

            done3= true;

            

            $('select#epilogiLisimoDesimo').css('border','1px solid #ccc');

            $('p#errorsmsg span.errorlisimo').remove();

        }

   



    if(!$('input#antikeimena-aksias').is(":checked") && !$('input#oxi-antikeimena-aksias').is(":checked") ){ 

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid red');

        done1=false;

        $('p#errorsmsg').append('<span class="erroraksias">Επιλέξτε Ναι ή Όχι<br/></span>');

    }else{

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid #fff');

        done1=true;

      $('p#errorsmsg span.erroraskias').remove();

    }





    if(!$('input#varia-antikeimena').is(":checked") && !$('input#oxi-varia-antikeimena').is(":checked") ){ 

      $('span.variaOxi, span.variaNai').css('border','2px solid red');

      $('p#errorsmsg').append('<span class="errorvaria">Επιλέξτε Ναι ή Όχι<br/></span>');

        done=false;

    }else{

      $('span.variaOxi, span.variaNai').css('border','2px solid #fff');

        done=true;

        $('p#errorsmsg span.errorvaria').remove();

    }



   



    if($('input#varia-antikeimena').is(":checked")){

        if(jQuery('#posa-atoma option:selected').attr('value') == -1){

          jQuery('#posa-atoma').css('border','1px solid red');

          

          done=false;

        }else{

           jQuery('#posa-atoma').css('border','1px solid #ccc');

          done=true;

        }



    }





    if(done && done1 && done3){



        var fromAddress;

        var toAddreess;

        var email;

        var tel;

        var selectService;

        var oldHouseRange;

        var oldFloor;

        var oldLift;

        var oldHighRoad;

        var oldExternalLift;

        var newHouseRange;

        var newFloor;

        var newLift;

        var newHighRoad;

        var newExternalLift;

        var TableData;

        var variaAntikeimena;

        var antikeimenaAksias;

        var userMsg;
        var professional;
        var profName;
        var profSurName;



        fromAddress= jQuery('input#from').val();

        toAddreess= jQuery('input#to').val();

        email= jQuery('input#email').val();

        tel= jQuery('input#tel').val();

        selectService= $("#type option:selected").text();



        /*OLD HOUSE*/

        oldHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#old-home-distance option:selected').text() +"</b>";

        oldFloor="Όροφος: <b>"+ jQuery('#from_floor option:selected').text() +"</b>";

        oldLift="Ασανσέρ: <b>"+ jQuery('#from_lift option:selected').text() +"</b>";

        

        if(jQuery('#oldHighRoad').is(':checked')){

          oldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          oldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#oldExternalLift').is(':checked')){

          oldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          oldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        /*NEW HOUSE*/



        newHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#new-home-distance option:selected').text() +"</b>";

        newFloor="Όροφος: <b>"+ jQuery('#to_floor option:selected').text() +"</b>";

        newLift="Ασανσέρ: <b>"+ jQuery('#to_lift option:selected').text() +"</b>";



        if(jQuery('#newHighRoad').is(':checked')){

          newHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          newHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#newExternalLift').is(':checked')){

          newExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          newExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        userMsg = jQuery('textarea.msg-user').val();

      

      /*Get table Rows*/

      TableData = storeTblValues()


       /*REMOVAL SERVICES */

       epilogiAmpalaz= jQuery('#epilogiAmpalaz option:selected').text();

       epilogiLisimoDesimo= jQuery('#epilogiLisimoDesimo option:selected').text();



       if(jQuery('#varia-antikeimena').is(':checked')){

         variaAntikeimena="Υπάρχουν βαριά αντικείμενα που χρειάζονται: <b>"+ jQuery('#posa-atoma option:selected').text() + "άτομα</b> για να μετακινηθούν.";

       }else{

         variaAntikeimena= "Δεν υπάρχουν βαριά αντικείμενα.";

       }



       if(jQuery('#antikeimena-aksias').is(':checked')){

          antikeimenaAksias= "Υπάρχουν αντικείμενα μεγάλης αξίας.";

       }else{

          antikeimenaAksias="Δεν υπάρχουν αντικείμενα αξίας.";

       }

       var myDate= jQuery('input#myDate').val();

       var myThings = JSON.stringify(TableData);

       
        /* CALCULATE PRICE */

        var trackPrice=50;
        var km= $('.totalmiles span.totalkm').text();

        var typeTrans = $("select#type option:selected").attr('pVal');

        var from_floor = 0;
        var to_floor=0;
        var old_home_distance=0;
        var new_home_distance=0;
        var from_lift = 0;
        var to_lift=0;

        var Old_ExternalLift =false;
        var New_ExternalLift =false;
        var totalPrice=0;

        var sumThing= 0;
        var thingPrice;
        var OldExtraPrice;
        var mPrice;
        var fromExLiftPrice=0;
        var toExLiftPrice=0;
        var stp1ExLiftPrice=0;
        var stp2ExLiftPrice=0;
        var stp3ExLiftPrice=0;
        var stp4ExLiftPrice=0;
        var thingVolume;
        var dimh;
        var dimw;
        var diml;
        var totalVolume=0;
        var ampalazTotalPrice=0;
        var ampalazCheck=false;
        var val_from;
        var val_to;


       
         
        

        var workers = $("select#posa-atoma option:selected").val();
        
        if(typeTrans > 2){
          trackPrice=40;
        }

       $('#removaltable tbody tr').each(function(row, tr){

            thingPrice=0;
            ampalazPrice=0;
            OldExtraPrice=0;
            NewExtraPrice=0;
            OldExtraPriceDestance=0;
            NewExtraPriceDestance=0;
            mPrice=0;
            fromThingPrice=0;
            toThingPrice=0;
            thingVolume=0;
            dimh=0;
            dimw=0;
            diml=0;
            
            val_from= parseInt($(this).find('td span.tdTitle').attr('from'));
            val_to= parseInt($(this).find('td span.tdTitle').attr('to'));

            if(val_from ==0){
                 old_home_distance= $("select#old-home-distance option:selected").attr('pVal');
                 from_floor= $("select#from_floor option:selected").attr('pVal');
                 from_lift= $("select#from_lift option:selected").attr('pVal');

                if($('#oldExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==0){
                   new_home_distance= $("select#new-home-distance option:selected").attr('pVal');
                   to_floor= $("select#to_floor option:selected").attr('pVal');
                   to_lift= $("select#to_lift option:selected").attr('pVal');

                if($('#newExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==1){
                 old_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover1_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==1){
                   new_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover1_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }


            if(val_from ==2){
                 old_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover2_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==2){
                   new_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover2_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

             if(val_from ==3){
                 old_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover3_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==3){
                   new_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover3_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==4){
                 old_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover4_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==4){
                   new_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover4_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            

            sumThing= $(this).find('td:eq(0) span.tdTitle span.sumThing').text();
            thingPrice = $(this).find('td:eq(0) span.tdTitle').attr('pVal');
            liftTypeThing= $(this).find('td:eq(0) span.tdTitle').attr('lVal');



            

                if(!Old_ExternalLift){
                   
                          if(typeTrans == 1){/*Extra Prices */
                                    OldExtraPrice=0;
                                    OldExtraPriceDestance=0;
                                    thingPrice=0;

                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>from_lift && from_lift !=4){
                                if(!from_floor == 0 ){
                                       //OldExtraPrice= 0.3*thingPrice*from_floor/100;
                                     OldExtraPrice= thingPrice*from_floor/100;
                                 }
                                
                                 if(old_home_distance>10){
                                    //  old_home_distance= old_home_distance/5;
                                      //OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 }  
                             }else if(from_lift == 4){
                                
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;

                                if(old_home_distance>10){
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 } 
                             } 
                             fromThingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);
                             fromThingPrice = fromThingPrice*0.3;

                            
                             

                           }else if(typeTrans == 3){
                              if(liftTypeThing>from_lift && from_lift !=4){
                                    if(!from_floor == 0 ){
                                          OldExtraPrice= thingPrice*from_floor/100;
                                    } 
                                    if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                    }
                              }else if(from_lift == 4){
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;
                                if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                }
                             }
                             fromThingPrice = OldExtraPrice + OldExtraPriceDestance;
                             // thingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);

                            }

                            
                }else{
                   if(typeTrans == 1){/*Extra Prices */
                        OldExtraPrice=0;
                        OldExtraPriceDestance=0;
                        thingPrice=0;        
                    }else if(typeTrans == 2){
                        fromThingPrice = parseFloat(thingPrice)*0.3;
                    }else if(typeTrans == 3){
                        fromThingPrice= 0;
                    }
                }

                if(!New_ExternalLift){
                       if(typeTrans == 1){/*Extra Prices */
                                    NewExtraPrice=0;
                                    NewExtraPriceDestance=0;
                                    thingPrice=0;
                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>to_lift && to_lift !=4){ 
                                 if(!to_floor == 0 ){
                                      NewExtraPrice= thingPrice*to_floor/100;
                                  }

                                  if(new_home_distance>10){
                                    
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                    
                                  }
                            }else if(to_lift == 4){//An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;

                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                            NewExtraPrice = NewExtraPrice*0.3;
                            NewExtraPriceDestance= NewExtraPriceDestance*0.3;

                            thingPrice =  /*parseFloat(thingPrice) +*/ parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                             //toThingPrice = toThingPrice*0.4;

                           


                           }else if(typeTrans == 3){
                              if(liftTypeThing>to_lift){ 
                                  if(!to_floor == 0 ){
                                          NewExtraPrice= thingPrice*to_floor/100;
                                   }                                
                                  if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                              }else if(to_lift == 4){ //An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;
                              
                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                              thingPrice = parseFloat(thingPrice) + parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                            }  
                  }else{
                        if(typeTrans == 1){
                            NewExtraPrice=0;
                            NewExtraPriceDestance=0;
                            thingPrice=0;        
                        }else if(typeTrans == 2){
                            thingPrice = fromThingPrice.toFixed(1);
                        }else if(typeTrans == 3){
                            thingPrice = parseFloat(fromThingPrice) + parseFloat(thingPrice);
                        }
                  }

              
                //thingPrice= parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(NewExtraPrice)+ parseFloat(OldExtraPriceDestance) +parseFloat(NewExtraPriceDestance);
                      
                if($(this).find('td:eq(1) input').is(":checked")){
                         ampalazPrice = $(this).find('td:eq(1) input').attr('aVal');
                         thingPrice =  parseFloat(thingPrice) + parseFloat(ampalazPrice);
                         ampalazTotalPrice = parseFloat(ampalazPrice) + parseFloat(ampalazTotalPrice);
                         ampalazCheck=true;
                }

                if($(this).find('td:eq(2) input').length > 0){
                    if($(this).find('td:eq(2) input').is(":checked")){
                           mPrice = 0.4*$(this).find('td:eq(2) input').attr('mVal'); //*lisimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);
                          
                    }

                     if($(this).find('td:eq(3) input').is(":checked")){
                           mPrice = 0.6*$(this).find('td:eq(3) input').attr('mVal'); //*Desimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);

                    }
                }
                

                thingPrice = sumThing * thingPrice;

            
        totalPrice = parseFloat(totalPrice) + parseFloat(thingPrice);

	

        dimh= $(this).find('td:eq(0) span.tdTitle').attr('dimh');
        dimw= $(this).find('td:eq(0) span.tdTitle').attr('dimw');
        diml= $(this).find('td:eq(0) span.tdTitle').attr('diml');

        

        thingVolume= parseFloat(dimh)*parseFloat(dimw)*parseFloat(diml)*parseFloat(sumThing);
        thingVolume= thingVolume.toFixed(2);

        totalVolume=parseFloat(thingVolume) + parseFloat(totalVolume);
     
        });

        if(!$("input#to1").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to1");
        }
        if(!$("input#to2").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to2");
        }
        if(!$("input#to3").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to3");
        }
        if(!$("input#to4").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to4");
        }


        
       // alert("THINGS PRICE: " + totalPrice + " VOLUME: " + totalVolume + " AMPALAZ PRICE: "+ ampalazTotalPrice );
         

        
        var kmPrice=0;
        var extraAmpalazPrice=0;
        

        if(km > 10 & km < 30){
          kmPrice = parseFloat(km) - parseFloat(10);
          kmPrice = 1.2*kmPrice.toFixed(1);
        }else if(km > 30){
          kmPrice = parseFloat(km) - parseFloat(30);
          kmPrice = 1.7*kmPrice.toFixed(1);
          kmPrice = kmPrice + 24;
        }

        
        totalPrice = parseFloat(totalPrice) + parseFloat(kmPrice) + parseFloat(trackPrice);

        switch (workers) { 
            case '3': 
              if(totalPrice <140){
                totalPrice = 140;
              }
              break;
            case '4': 
              if(totalPrice <170){
                totalPrice = 170;
              }
              break;
            case '5': 
              if(totalPrice <200){
                totalPrice = 200;
              }
              break;    
            case '6': 
             if(totalPrice <240){
                totalPrice = 240;
              }
              break;
            default:
             
          }



          if(ampalazCheck){
              if(ampalazTotalPrice<20){
                extraAmpalazPrice= 20 - parseFloat(ampalazTotalPrice);
              }
          }

          totalPrice= parseFloat(extraAmpalazPrice) + parseFloat(totalPrice);

          totalVolume= 0.1*parseFloat(totalVolume) + parseFloat(totalVolume);

          if(totalVolume<=4 ){
            driver="Παναγιωτακόπουλος Νίκος";
          }else if(totalVolume > 4 && totalVolume <=9 ){
            driver= "Παναγιωτακόπουλος Βασίλης";
          }else if(totalVolume > 9 && totalVolume<=14.5 ){
            driver="Σταυριανός";
          }else if(totalVolume > 14.5 && totalVolume<=18.5){
            driver="Πανουριας ή Ραικος";
          }else if(totalVolume > 18.5 && totalVolume<=21){
            driver="Ραικος ή Μηνάς";
          }else if(totalVolume > 21 && totalVolume<=22){
            driver="Μηνάς ή Φωτόπουλος";
          }else if(totalVolume > 22 && totalVolume<=25.5){
            driver="Φωτόπουλος ή Πατσέλος ή Φιλίππου ή Βασιλόπουλος";
          }else if(totalVolume > 25.5 && totalVolume<=27.5){
            driver="Πατσέλος ή Φιλίππου ή Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 27.5 && totalVolume<=28){
            driver=" Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 28 && totalVolume<=32.6){
            driver="Μαντζουράνης";
          }else{
            driver="Τα πράγματα δεν χωράνε σε ένα δρομολόγιο";
          }


        if( ($('#oldExternalLift').is(':checked') && typeTrans == 2) || ($('#oldExternalLift').is(':checked') && typeTrans == 1) ){
          fromExLiftPrice=70;
        }else if($('#oldExternalLift').is(':checked') && typeTrans == 3){
          fromExLiftPrice=50;
        }

        if($('#newExternalLift').is(':checked') && typeTrans == 3){
            toExLiftPrice=50;
        }else if( ($('#newExternalLift').is(':checked') && typeTrans == 2) || ($('#newExternalLift').is(':checked') && typeTrans == 1) ){
            toExLiftPrice=70;
        }

        if($('#divStopover1').length  > 0 ){

          if( $('#stopover1ExternalLift').is(':checked') && typeTrans == 3  ){
            stp1ExLiftPrice=50;
          }else if( ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 2 ) || ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 1 )  ){
            stp1ExLiftPrice=70;
          }

        }

        if($('#divStopover2').length  > 0 ){

          if($('#stopover2ExternalLift').is(':checked') && typeTrans == 3){
            stp2ExLiftPrice=50;
          }else if( ($('#stopover2ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover2ExternalLift').is(':checked') && typeTrans == 1) ){
            stp2ExLiftPrice=70;
          }

        }

        if($('#divStopover3').length  > 0 ){

          if($('#stopover3ExternalLift').is(':checked') && typeTrans == 3){
            stp3ExLiftPrice=50;
          }else if(($('#stopover3ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover3ExternalLift').is(':checked') && typeTrans == 1)){
            stp3ExLiftPrice=70;
          }

        }

        if($('#divStopover4').length  > 0 ){

          if($('#stopover4ExternalLift').is(':checked') && typeTrans == 3){
            stp4ExLiftPrice=50;
          }else if(($('#stopover4ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover4ExternalLift').is(':checked') && typeTrans == 1)){
            stp4ExLiftPrice=70;
          }

        }




        var comission = totalPrice*0.3;
        comission = comission.toFixed(0);

        totalPrice = parseFloat(totalPrice) + parseFloat(fromExLiftPrice) + parseFloat(toExLiftPrice) + parseFloat(stp1ExLiftPrice) + parseFloat(stp2ExLiftPrice) + parseFloat(stp3ExLiftPrice) + parseFloat(stp4ExLiftPrice);
        totalPrice= totalPrice.toFixed(0);

        $("#inputBudget").removeAttr('disabled');
        $("#inputComission").removeAttr('disabled');
      
        $("#inputBudget").val(totalPrice);
        $("#inputComission").val(comission);


        var agent = $('#OfferAgentId option:selected').attr('value');
        var telprice= $('#inputBudget').val();
        var telcommission= $('#inputComission').val();
        var inputName= $('#inputName').val();
        var inputSurname= $('#inputSurname').val();
        var afetiria= $('#from').val();
        var telikos= $('#to').val();
        var to1= $('#to1').val();
        var to2= $('#to2').val();
        var to3= $('#to3').val();
        var to4= $('#to4').val();
        var stopOv1=false;
        var stopOv2=false;
        var stopOv3=false;
        var stopOv4=false;

        var aDistance= $('#old-home-distance option:selected').text();
        var afrom_floor= $('#from_floor option:selected').text();
        var afrom_lift= $('#from_lift option:selected').text();

        if($('#oldHighRoad').is(':checked')){

          var aOldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          var aOldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }

        if($('#oldExternalLift').is(':checked')){

          var aOldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          var aOldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }


        var nDistance= $('#new-home-distance option:selected').text();
        var nfrom_floor= $('#to_floor option:selected').text();
        var nfrom_lift= $('#to_lift option:selected').text();

        if($('#newHighRoad').is(':checked')){

          var nOldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          var nOldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }

        if($('#newExternalLift').is(':checked')){

          var nOldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          var nOldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }

        var stopo1Distance=" ";
        var stopo1from_floor=" ";
        var stopo1from_lift=" ";
        var stopo1OldHighRoad=" ";
        var stopo1OldExternalLift= " ";

        var stopo2Distance=" ";
        var stopo2from_floor=" ";
        var stopo2from_lift=" ";
        var stopo2OldHighRoad=" ";
        var stopo2OldExternalLift= " ";

        var stopo3Distance=" ";
        var stopo3from_floor=" ";
        var stopo3from_lift=" ";
        var stopo3OldHighRoad=" ";
        var stopo3OldExternalLift= " ";

        var stopo4Distance=" ";
        var stopo4from_floor=" ";
        var stopo4from_lift=" ";
        var stopo4OldHighRoad=" ";
        var stopo4OldExternalLift= " ";
      

        if(to1.length <= 0){
          to1 = '';
          stopOv1= false;
        }else{
               stopOv1=true;
               stopo1Distance= $('#stopover1-distance option:selected').text();
               stopo1from_floor= $('#stopover1_floor option:selected').text();
               stopo1from_lift= $('#stopover1_lift option:selected').text();

              if($('#stopover1HighRoad').is(':checked')){

                 stopo1OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo1OldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

              }

              if($('#stopover1ExternalLift').is(':checked')){

                 stopo1OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo1OldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

              }

        }
        if(to2.length <= 0){
          to2 = '';
          stopOv2= false;
        }else{
               stopOv2= true;
               stopo2Distance= $('#stopover2-distance option:selected').text();
               stopo2from_floor= $('#stopover2_floor option:selected').text();
               stopo2from_lift= $('#stopover2_lift option:selected').text();

              if($('#stopover2HighRoad').is(':checked')){

                 stopo2OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo2OldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

              }

              if($('#stopover2ExternalLift').is(':checked')){

                 stopo2OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo2OldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

              }

        }
        if(to3.length <= 0){
          to3 = '';
          stopOv3= false;
        }else{
               stopOv3= true;
               stopo3Distance= $('#stopover3-distance option:selected').text();
               stopo3from_floor= $('#stopover3_floor option:selected').text();
               stopo3from_lift= $('#stopover3_lift option:selected').text();

              if($('#stopover3HighRoad').is(':checked')){

                 stopo3OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo3OldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

              }

              if($('#stopover3ExternalLift').is(':checked')){

                 stopo3OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo3OldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

              }


        }
        if(to4.length <= 0){
          to4 = '';
          stopOv4= false;
        }else{

               stopOv4= true;
               stopo4Distance= $('#stopover4-distance option:selected').text();
               stopo4from_floor= $('#stopover4_floor option:selected').text();
               stopo4from_lift= $('#stopover4_lift option:selected').text();

              if($('#stopover4HighRoad').is(':checked')){

                 stopo4OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo4OldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

              }

              if($('#stopover4ExternalLift').is(':checked')){

                 stopo4OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo4OldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

              }

        }


         var transport='<div class="col-md-12">';
         transport+='<h2>Σύνοψη Μετακόμισης</h2>';
         transport+='<p style="font-size: 17px;" class="pricesp">Budget: <span class="newprice">'+ telprice +'</span>€  Commission: <span class="newcommision">'+ telcommission +'</span>€</p>';
         transport+='<p style="font-size: 17px;">Συνολικός Όγκος: '+totalVolume.toFixed(2)+ ' Προτεινόμενος οδηγός: '+driver+ '</p>';
         transport+='<p>'+km+'km</p>';
         transport+='<h3>Στοιχεία Επικοινωνίας</h3>';
         transport+='<p class="contactDetails">Όνομα: <b>'+inputName +'</b> Επίθετο: <b>'+ inputSurname +'</b> Email: <b>'+ email +'</b> Τηλ: <b>' + tel + '</b></p>';
         transport+='<h3>Πληροφορίες Μετακόμισης</h3>';
         transport+='<p>Μετακόμιση Από: <b>' + afetiria + '</b></p>';
         transport+='<p>Σε <b>'+telikos+'</b></p>';
         transport+='<p>1η Ενδιάμεση στάση: '+ to1 +'</p>';
         transport+='<p>2η Ενδιάμεση στάση: '+ to2 +'</p>';
         transport+='<p>3η Ενδιάμεση στάση: '+ to3 +'</p>';
         transport+='<p>4η Ενδιάμεση στάση: '+ to4 +'</p>';
         transport+='<p>Για την Μετακόμιση θα χρειαστώ: <b>'+ selectService +'</b></p>';
         transport+='<p>Hμερομηνία μετακόμισης: <b>'+ myDate +'</b></p>';
         transport+='</div>';

         transport+='<div class="table-responsive col-md-12">';
         transport+='<table class="table table-striped"><thead><tr><th>Πληροφορίες Παλιού σπιτιού</th>';
         if(stopOv1){
            transport+='<th>1η Στάση '+ to1 +'</th>';
         }
          if(stopOv2){
             transport+='<th>2η Στάση '+ to2 +'</th>';
         }
          if(stopOv3){
             transport+='<th>3η Στάση '+ to3 +'</th>';
         }
          if(stopOv4){
             transport+='<th>4η Στάση '+ to4 +'</th>';
         }
         transport+='<th>Πληροφορίες Νέου σπιτιού</th>';  
         transport+='</tr></thead><tbody>';
         transport+='<tr><td>'+aDistance+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1Distance+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2Distance+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3Distance+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4Distance+'</td>';
         }
         transport+='<td>'+nDistance+'</td></tr>'; //end firt tbody row

         transport+='<tr><td>'+afrom_floor+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1from_floor+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2from_floor+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3from_floor+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4from_floor+'</td>';
         }
         transport+='<td>'+nfrom_floor+'</td></tr>'; //end Second tbody row


         transport+='<tr><td>'+afrom_lift+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1from_lift+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2from_lift+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3from_lift+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4from_lift+'</td>';
         }
         transport+='<td>'+nfrom_lift+'</td></tr>'; //end third tbody row


         transport+='<tr><td>'+aOldHighRoad+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1OldHighRoad+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2OldHighRoad+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3OldHighRoad+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4OldHighRoad+'</td>';
         }
         transport+='<td>'+nOldHighRoad+'</td></tr>'; //end Fourth tbody row


         transport+='<tr><td>'+aOldExternalLift+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1OldExternalLift+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2OldExternalLift+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3OldExternalLift+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4OldExternalLift+'</td>';
         }
         transport+='<td>'+nOldExternalLift+'</td></tr>'; //end last tbody row
         transport+='</tbody></table><br/><br/>';


         transport+='<h3>Υπηρεσίες Μετακόμισης</h3>';
         transport+='<p><b>'+variaAntikeimena+'</b></p>';
         transport+='<p><b>'+antikeimenaAksias+'</b></p><br/><br/>';

         transport+='<h3>Πράγματα για μεταφορά</h3>';

         transport+='<div class="table-responsive"><table class="table table-striped"><thead><tr><th>Πράγματα</th><th>Αμπαλαζ</th><th>Λύσιμο</th><th>Δέσιμο</th></tr></thead><tbody>';


        TableData = storeTblValues()

        /* $.each(TableData, function(index, val) {
              console.log(val.TableData);
        });*/


          $.each( TableData, function( i, row ){

              if(row.things != 0 ){
                  transport+= '<tr><td>'+ row.things + '</td><td>' + row.ampalaz +'</td><td>'+ row.lisimo +'</td><td>'+ row.desimo +'</td></tr>';
              }
          });

        transport+="</tbody></table></div><br/><br/>";


        transport+="<p><b>Σχόλια: </b></p><p>"+userMsg+"</>";



 

      $('.rowthankyou').html(transport);

      $('#last-step').css('display','none');

      $('#thankyou').css('display','block');

      /*  jQuery.ajax({

                  type:"POST",

                  url:"https://development.myconstructor.gr/transport/offer.php",

                  data:{fromAddress,toAddreess,email,tel,selectService,oldHouseRange,oldFloor,oldLift,oldHighRoad,oldExternalLift,newHouseRange,newFloor,newLift,newHighRoad,newExternalLift,myThings,variaAntikeimena,antikeimenaAksias,myDate,userMsg,professional,profName,profSurName},

                  async: true,

                  dataType: 'json',

                  success: function(data){

                     console.log(data);

                    if(data){ 

                          $('#last-step').css('display','none');

                          $('#thankyou').css('display','block');

                    }else{

                      jQuery('p#errorsmsg').append('<span>Αποτυχία Αποστολής</span><br/>');

                    }

                 }

             })*/

     }




});


$('#savebtn').click(function(){


    var done = false;

    var done1 = false;

   // ar done2 = false;

    var done3 = false;

    $('p#errorsmsg span').remove();
       
        if($('select#epilogiLisimoDesimo option:selected').attr('value') == -1){

            done3= false;

          

            $('select#epilogiLisimoDesimo').css('border','1px solid red');

            $('p#errorsmsg').append('<span class="errorlisimo">Επιλέξτε μια επιλογή για Λύσιμο/Δέσιμο!<br/></span>');

        }else{

            done3= true;

            

            $('select#epilogiLisimoDesimo').css('border','1px solid #ccc');

            $('p#errorsmsg span.errorlisimo').remove();

        }

   



    if(!$('input#antikeimena-aksias').is(":checked") && !$('input#oxi-antikeimena-aksias').is(":checked") ){ 

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid red');

        done1=false;

        $('p#errorsmsg').append('<span class="erroraksias">Επιλέξτε Ναι ή Όχι<br/></span>');

    }else{

      $('span.aksiasNai, span.aksiasOxi').css('border','2px solid #fff');

        done1=true;

      $('p#errorsmsg span.erroraskias').remove();

    }





    if(!$('input#varia-antikeimena').is(":checked") && !$('input#oxi-varia-antikeimena').is(":checked") ){ 

      $('span.variaOxi, span.variaNai').css('border','2px solid red');

      $('p#errorsmsg').append('<span class="errorvaria">Επιλέξτε Ναι ή Όχι<br/></span>');

        done=false;

    }else{

      $('span.variaOxi, span.variaNai').css('border','2px solid #fff');

        done=true;

        $('p#errorsmsg span.errorvaria').remove();

    }



   



    if($('input#varia-antikeimena').is(":checked")){

        if(jQuery('#posa-atoma option:selected').attr('value') == -1){

          jQuery('#posa-atoma').css('border','1px solid red');

          

          done=false;

        }else{

           jQuery('#posa-atoma').css('border','1px solid #ccc');

          done=true;

        }



    }





    if(done && done1 && done3){



        var fromAddress;

        var toAddreess;

        var email;

        var tel;

        var selectService;

        var oldHouseRange;

        var oldFloor;

        var oldLift;

        var oldHighRoad;

        var oldExternalLift;

        var newHouseRange;

        var newFloor;

        var newLift;

        var newHighRoad;

        var newExternalLift;

        var TableData;

        var variaAntikeimena;

        var antikeimenaAksias;

        var userMsg;
        var professional;
        var profName;
        var profSurName;



        fromAddress= jQuery('input#from').val();

        toAddreess= jQuery('input#to').val();

        email= jQuery('input#email').val();

        tel= jQuery('input#tel').val();

        selectService= $("#type option:selected").text();



        /*OLD HOUSE*/

        oldHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#old-home-distance option:selected').text() +"</b>";

        oldFloor="Όροφος: <b>"+ jQuery('#from_floor option:selected').text() +"</b>";

        oldLift="Ασανσέρ: <b>"+ jQuery('#from_lift option:selected').text() +"</b>";

        

        if(jQuery('#oldHighRoad').is(':checked')){

          oldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          oldHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#oldExternalLift').is(':checked')){

          oldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          oldExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        /*NEW HOUSE*/



        newHouseRange="Απόσταση Φορτηγού: <b>"+ jQuery('#new-home-distance option:selected').text() +"</b>";

        newFloor="Όροφος: <b>"+ jQuery('#to_floor option:selected').text() +"</b>";

        newLift="Ασανσέρ: <b>"+ jQuery('#to_lift option:selected').text() +"</b>";



        if(jQuery('#newHighRoad').is(':checked')){

          newHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          newHighRoad= "<b>ΔΕΝ βρίσκεται σε δρόμο υψηλής κυκλοφορίας</b>";

        }



        if(jQuery('#newExternalLift').is(':checked')){

          newExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          newExternalLift= "<b>ΔΕΝ θα χρειαστεί ανυψωτικό</b>";

        }



        userMsg = jQuery('textarea.msg-user').val();

      

      /*Get table Rows*/

      TableData = storeTblValues()


       /*REMOVAL SERVICES */

       epilogiAmpalaz= jQuery('#epilogiAmpalaz option:selected').text();

       epilogiLisimoDesimo= jQuery('#epilogiLisimoDesimo option:selected').text();



       if(jQuery('#varia-antikeimena').is(':checked')){

         variaAntikeimena="Υπάρχουν βαριά αντικείμενα που χρειάζονται: <b>"+ jQuery('#posa-atoma option:selected').text() + "άτομα</b> για να μετακινηθούν.";

       }else{

         variaAntikeimena= "Δεν υπάρχουν βαριά αντικείμενα.";

       }



       if(jQuery('#antikeimena-aksias').is(':checked')){

          antikeimenaAksias= "Υπάρχουν αντικείμενα μεγάλης αξίας.";

       }else{

          antikeimenaAksias="Δεν υπάρχουν αντικείμενα αξίας.";

       }

       var myDate= jQuery('input#myDate').val();

       var myThings = JSON.stringify(TableData);

       
        /* CALCULATE PRICE */

        var trackPrice=50;
        var km= $('.totalmiles span.totalkm').text();

        var typeTrans = $("select#type option:selected").attr('pVal');

        var from_floor = 0;
        var to_floor=0;
        var old_home_distance=0;
        var new_home_distance=0;
        var from_lift = 0;
        var to_lift=0;

        var Old_ExternalLift =false;
        var New_ExternalLift =false;
        var totalPrice=0;

        var sumThing= 0;
        var thingPrice;
        var OldExtraPrice;
        var mPrice;
        var fromExLiftPrice=0;
        var toExLiftPrice=0;
        var stp1ExLiftPrice=0;
        var stp2ExLiftPrice=0;
        var stp3ExLiftPrice=0;
        var stp4ExLiftPrice=0;
        var thingVolume;
        var dimh;
        var dimw;
        var diml;
        var totalVolume=0;
        var ampalazTotalPrice=0;
        var ampalazCheck=false;
        var val_from;
        var val_to;


       
         
        

        var workers = $("select#posa-atoma option:selected").val();
        
        if(typeTrans > 2){
          trackPrice=40;
        }

       $('#removaltable tbody tr').each(function(row, tr){

            thingPrice=0;
            ampalazPrice=0;
            OldExtraPrice=0;
            NewExtraPrice=0;
            OldExtraPriceDestance=0;
            NewExtraPriceDestance=0;
            mPrice=0;
            fromThingPrice=0;
            toThingPrice=0;
            thingVolume=0;
            dimh=0;
            dimw=0;
            diml=0;
            
            val_from= parseInt($(this).find('td span.tdTitle').attr('from'));
            val_to= parseInt($(this).find('td span.tdTitle').attr('to'));

            if(val_from ==0){
                 old_home_distance= $("select#old-home-distance option:selected").attr('pVal');
                 from_floor= $("select#from_floor option:selected").attr('pVal');
                 from_lift= $("select#from_lift option:selected").attr('pVal');

                if($('#oldExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==0){
                   new_home_distance= $("select#new-home-distance option:selected").attr('pVal');
                   to_floor= $("select#to_floor option:selected").attr('pVal');
                   to_lift= $("select#to_lift option:selected").attr('pVal');

                if($('#newExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==1){
                 old_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover1_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==1){
                   new_home_distance= $("select#stopover1-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover1_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover1_lift option:selected").attr('pVal');

                if($('#stopover1ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }


            if(val_from ==2){
                 old_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover2_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==2){
                   new_home_distance= $("select#stopover2-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover2_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover2_lift option:selected").attr('pVal');

                if($('#stopover2ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

             if(val_from ==3){
                 old_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover3_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==3){
                   new_home_distance= $("select#stopover3-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover3_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover3_lift option:selected").attr('pVal');

                if($('#stopover3ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }

            if(val_from ==4){
                 old_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                 from_floor= $("select#stopover4_floor option:selected").attr('pVal');
                 from_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    from_floor=0;
                    from_lift= 0;
                    Old_ExternalLift=true;
                }
            }

            if(val_to ==4){
                   new_home_distance= $("select#stopover4-distance option:selected").attr('pVal');
                   to_floor= $("select#stopover4_floor option:selected").attr('pVal');
                   to_lift= $("select#stopover4_lift option:selected").attr('pVal');

                if($('#stopover4ExternalLift').is(':checked')){
                    to_floor=0;
                    to_lift= 0;
                    New_ExternalLift=true;
                }
            }


            sumThing= $(this).find('td:eq(0) span.tdTitle span.sumThing').text();
            thingPrice = $(this).find('td:eq(0) span.tdTitle').attr('pVal');
            liftTypeThing= $(this).find('td:eq(0) span.tdTitle').attr('lVal');



            

                if(!Old_ExternalLift){
                   
                          if(typeTrans == 1){/*Extra Prices */
                                    OldExtraPrice=0;
                                    OldExtraPriceDestance=0;
                                    thingPrice=0;

                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>from_lift && from_lift !=4){
                                if(!from_floor == 0 ){
                                       //OldExtraPrice= 0.3*thingPrice*from_floor/100;
                                     OldExtraPrice= thingPrice*from_floor/100;
                                 }
                                
                                 if(old_home_distance>10){
                                    //  old_home_distance= old_home_distance/5;
                                      //OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 }  
                             }else if(from_lift == 4){
                                
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;

                                if(old_home_distance>10){
                                     OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                 } 
                             } 
                             fromThingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);
                             fromThingPrice = fromThingPrice*0.3;
                             

                           }else if(typeTrans == 3){
                              if(liftTypeThing>from_lift && from_lift !=4){
                                    if(!from_floor == 0 ){
                                          OldExtraPrice= thingPrice*from_floor/100;
                                    } 
                                    if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                    }
                              }else if(from_lift == 4){
                                newfrom_floor= 0.3*parseFloat(from_floor) + parseFloat(from_floor);
                                OldExtraPrice= thingPrice*newfrom_floor/100;
                                if(old_home_distance>10){
                                        OldExtraPriceDestance = thingPrice*old_home_distance/100;
                                }
                             }
                             fromThingPrice = OldExtraPrice + OldExtraPriceDestance;
                             // thingPrice = parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(OldExtraPriceDestance);

                            }

                            
                }else{
                    if(typeTrans == 1){/*Extra Prices */
                         OldExtraPrice=0;
                         OldExtraPriceDestance=0;
                         thingPrice=0;        
                    }else if(typeTrans == 2){
                         fromThingPrice = parseFloat(thingPrice)*0.3;
                    }else if(typeTrans == 3){
                         fromThingPrice= 0;
                    }
                }

                if(!New_ExternalLift){
                       if(typeTrans == 1){/*Extra Prices */
                                    NewExtraPrice=0;
                                    NewExtraPriceDestance=0;
                                    thingPrice=0;
                                  
                          }else if(typeTrans == 2){
                            if(liftTypeThing>to_lift && to_lift !=4){ 
                                 if(!to_floor == 0 ){
                                      NewExtraPrice= thingPrice*to_floor/100;
                                  }

                                  if(new_home_distance>10){
                                    
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                    
                                  }
                            }else if(to_lift == 4){//An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;

                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                            NewExtraPrice = NewExtraPrice*0.3;
                            NewExtraPriceDestance= NewExtraPriceDestance*0.3;

                            thingPrice =  /*parseFloat(thingPrice) +*/ parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                             //toThingPrice = toThingPrice*0.4;


                           }else if(typeTrans == 3){
                              if(liftTypeThing>to_lift){ 
                                  if(!to_floor == 0 ){
                                          NewExtraPrice= thingPrice*to_floor/100;
                                   }                                
                                  if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                              }else if(to_lift == 4){ //An den yparxei katholoy asanser 
                                newto_floor= 0.3*parseFloat(to_floor) + parseFloat(to_floor);
                                NewExtraPrice= thingPrice*newto_floor/100;
                              
                                if(new_home_distance>10){
                                      NewExtraPriceDestance = thingPrice*new_home_distance/100;
                                  }
                            }
                              thingPrice = parseFloat(thingPrice) + parseFloat(fromThingPrice) + parseFloat(NewExtraPrice) + parseFloat(NewExtraPriceDestance);
                            }  
                  }else{
                     if(typeTrans == 1){
                         NewExtraPrice=0;
                         NewExtraPriceDestance=0;
                         thingPrice=0;        
                     }else if(typeTrans == 2){
                         thingPrice = fromThingPrice.toFixed(1);
                     }else if(typeTrans == 3){
                         thingPrice = parseFloat(fromThingPrice) + parseFloat(thingPrice);
                     }
                  }

              
                //thingPrice= parseFloat(thingPrice) + parseFloat(OldExtraPrice) + parseFloat(NewExtraPrice)+ parseFloat(OldExtraPriceDestance) +parseFloat(NewExtraPriceDestance);
                      
                if($(this).find('td:eq(1) input').is(":checked")){
                         ampalazPrice = $(this).find('td:eq(1) input').attr('aVal');
                         thingPrice =  parseFloat(thingPrice) + parseFloat(ampalazPrice);
                         ampalazTotalPrice = parseFloat(ampalazPrice) + parseFloat(ampalazTotalPrice);
                         ampalazCheck=true;
                }

                if($(this).find('td:eq(2) input').length > 0){
                    
                    if($(this).find('td:eq(2) input').is(":checked")){
                           mPrice = 0.4*$(this).find('td:eq(2) input').attr('mVal'); //*lisimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);
                            //alert('lisimo ' + mPrice + ' ' + thingPrice);
                    }

                     if($(this).find('td:eq(3) input').is(":checked")){
                           mPrice = 0.6*$(this).find('td:eq(3) input').attr('mVal'); //*Desimo
                           thingPrice =  parseFloat(thingPrice) + parseFloat(mPrice);
                            //alert('Desimo ' + mPrice + ' ' + thingPrice);
                    }
                }
                

                thingPrice = sumThing * thingPrice;


            
        totalPrice = parseFloat(totalPrice) + parseFloat(thingPrice);

  

        dimh= $(this).find('td:eq(0) span.tdTitle').attr('dimh');
        dimw= $(this).find('td:eq(0) span.tdTitle').attr('dimw');
        diml= $(this).find('td:eq(0) span.tdTitle').attr('diml');

        
        thingVolume= parseFloat(dimh)*parseFloat(dimw)*parseFloat(diml)*parseFloat(sumThing);
        thingVolume= thingVolume.toFixed(2);

        totalVolume=parseFloat(thingVolume) + parseFloat(totalVolume);
     
        });

        if(!$("input#to1").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to1");
        }
        if(!$("input#to2").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to2");
        }
        if(!$("input#to3").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to3");
        }
        if(!$("input#to4").val().length ==0){
          totalPrice= parseFloat(totalPrice)+ 20;
          //alert("to4");
        }


        
       // alert("THINGS PRICE: " + totalPrice + " VOLUME: " + totalVolume + " AMPALAZ PRICE: "+ ampalazTotalPrice );
         

        
        var kmPrice=0;
        var extraAmpalazPrice=0;
        

        if(km > 10 & km < 30){
          kmPrice = parseFloat(km) - parseFloat(10);
          kmPrice = 1.2*kmPrice.toFixed(1);
        }else if(km > 30){
          kmPrice = parseFloat(km) - parseFloat(30);
          kmPrice = 1.7*kmPrice.toFixed(1);
          kmPrice = kmPrice + 24;
        }


        
        totalPrice = parseFloat(totalPrice) + parseFloat(kmPrice) + parseFloat(trackPrice);

        switch (workers) { 
            case '3': 
              if(totalPrice <140){
                totalPrice = 140;
              }
              break;
            case '4': 
              if(totalPrice <170){
                totalPrice = 170;
              }
              break;
            case '5': 
              if(totalPrice <200){
                totalPrice = 200;
              }
              break;    
            case '6': 
             if(totalPrice <240){
                totalPrice = 240;
              }
              break;
            default:
             
          }



          if(ampalazCheck){
              if(ampalazTotalPrice<20){
                extraAmpalazPrice= 20 - parseFloat(ampalazTotalPrice);
              }
          }

          totalPrice= parseFloat(extraAmpalazPrice) + parseFloat(totalPrice);

          totalVolume= 0.1*parseFloat(totalVolume) + parseFloat(totalVolume);

          if(totalVolume<=4 ){
            driver="Παναγιωτακόπουλος Νίκος";
          }else if(totalVolume > 4 && totalVolume <=9 ){
            driver= "Παναγιωτακόπουλος Βασίλης";
          }else if(totalVolume > 9 && totalVolume<=14.5 ){
            driver="Σταυριανός";
          }else if(totalVolume > 14.5 && totalVolume<=18.5){
            driver="Πανουριας ή Ραικος";
          }else if(totalVolume > 18.5 && totalVolume<=21){
            driver="Ραικος ή Μηνάς";
          }else if(totalVolume > 21 && totalVolume<=22){
            driver="Μηνάς ή Φωτόπουλος";
          }else if(totalVolume > 22 && totalVolume<=25.5){
            driver="Φωτόπουλος ή Πατσέλος ή Φιλίππου ή Βασιλόπουλος";
          }else if(totalVolume > 25.5 && totalVolume<=27.5){
            driver="Πατσέλος ή Φιλίππου ή Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 27.5 && totalVolume<=28){
            driver=" Βασιλόπουλος ή Μαντζουράνης";
          }else if(totalVolume > 28 && totalVolume<=32.6){
            driver="Μαντζουράνης";
          }else{
            driver="Τα πράγματα δεν χωράνε σε ένα δρομολόγιο";
          }

        var doneTransType1_2=false;
        if( ($('#oldExternalLift').is(':checked') && typeTrans == 2) || ($('#oldExternalLift').is(':checked') && typeTrans == 1) ){
          fromExLiftPrice=70;
          doneTransType1_2=true;
        }else if($('#oldExternalLift').is(':checked') && typeTrans == 3){
            fromExLiftPrice=50;
        }

        if($('#newExternalLift').is(':checked') && typeTrans == 3){
            toExLiftPrice=50;
        }else if( ($('#newExternalLift').is(':checked') && typeTrans == 2) || ($('#newExternalLift').is(':checked') && typeTrans == 1) ){
            toExLiftPrice=70;
            doneTransType1_2=true;
        }

        if($('#divStopover1').length  > 0 ){

          if( $('#stopover1ExternalLift').is(':checked') && typeTrans == 3  ){
            stp1ExLiftPrice=50;
          }else if( ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 2 ) || ( $('#stopover1ExternalLift').is(':checked') && typeTrans == 1 )  ){
            stp1ExLiftPrice=70;
            doneTransType1_2=true;
          }

        }

        if($('#divStopover2').length  > 0 ){

          if($('#stopover2ExternalLift').is(':checked') && typeTrans == 3){
            stp2ExLiftPrice=50;
          }else if( ($('#stopover2ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover2ExternalLift').is(':checked') && typeTrans == 1) ){
            stp2ExLiftPrice=70;
            doneTransType1_2=true;
          }

        }

        if($('#divStopover3').length  > 0 ){

          if($('#stopover3ExternalLift').is(':checked') && typeTrans == 3){
            stp3ExLiftPrice=50;
          }else if(($('#stopover3ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover3ExternalLift').is(':checked') && typeTrans == 1)){
            stp3ExLiftPrice=70;
            doneTransType1_2=true;
          }

        }

        if($('#divStopover4').length  > 0 ){

          if($('#stopover4ExternalLift').is(':checked') && typeTrans == 3){
            stp4ExLiftPrice=50;
          }else if(($('#stopover4ExternalLift').is(':checked') && typeTrans == 2) || ($('#stopover4ExternalLift').is(':checked') && typeTrans == 1)){
            stp4ExLiftPrice=70;
            doneTransType1_2=true;
          }

        }


        var comission = totalPrice*0.3;
        comission = comission.toFixed(0);

        totalPrice = parseFloat(totalPrice) + parseFloat(fromExLiftPrice) + parseFloat(toExLiftPrice) + parseFloat(stp1ExLiftPrice) + parseFloat(stp2ExLiftPrice) + parseFloat(stp3ExLiftPrice) + parseFloat(stp4ExLiftPrice);
        totalPrice= totalPrice.toFixed(0);


        var agent = $('#OfferAgentId option:selected').attr('value');
        var telprice= $('#inputBudget').val();
        var telcommission= $('#inputComission').val();
        var inputName= $('#inputName').val();
        var inputSurname= $('#inputSurname').val();
        var afetiria= $('#from').val();
        var telikos= $('#to').val();
        var to1= $('#to1').val();
        var to2= $('#to2').val();
        var to3= $('#to3').val();
        var to4= $('#to4').val();
        var stopOv1=false;
        var stopOv2=false;
        var stopOv3=false;
        var stopOv4=false;


        if($('#old-home-distance option:selected').val() > 5){
           var aDistance= $('#old-home-distance option:selected').text();
        }else{
           var aDistance = ' ';
        }
            

        if($('#from_lift option:selected').val() != -1){
            var afrom_lift= $('#from_lift option:selected').text();
        }else{
            var afrom_lift= ' ';
        }


        var afrom_floor= $('#from_floor option:selected').text();
       

        if($('#oldHighRoad').is(':checked')){

          var aOldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          var aOldHighRoad= " ";

        }

        if($('#oldExternalLift').is(':checked')){

          var aOldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          var aOldExternalLift= " ";

        }





        if($('#new-home-distance option:selected').val() > 5){
           var nDistance= $('#new-home-distance option:selected').text();
        }else{
           var nDistance = ' ';
        }



        if($('#to_lift option:selected').val() != -1){
            var nfrom_lift= $('#to_lift option:selected').text();
        }else{
            var nfrom_lift= ' ';
        }

        
        var nfrom_floor= $('#to_floor option:selected').text();
        

        if($('#newHighRoad').is(':checked')){

          var nOldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

        }else{

          var nOldHighRoad= " ";

        }

        if($('#newExternalLift').is(':checked')){

          var nOldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

        }else{

          var nOldExternalLift= " ";

        }

        var stopo1Distance=" ";
        var stopo1from_floor=" ";
        var stopo1from_lift=" ";
        var stopo1OldHighRoad=" ";
        var stopo1OldExternalLift= " ";

        var stopo2Distance=" ";
        var stopo2from_floor=" ";
        var stopo2from_lift=" ";
        var stopo2OldHighRoad=" ";
        var stopo2OldExternalLift= " ";

        var stopo3Distance=" ";
        var stopo3from_floor=" ";
        var stopo3from_lift=" ";
        var stopo3OldHighRoad=" ";
        var stopo3OldExternalLift= " ";

        var stopo4Distance=" ";
        var stopo4from_floor=" ";
        var stopo4from_lift=" ";
        var stopo4OldHighRoad=" ";
        var stopo4OldExternalLift= " ";
      

        if(to1.length <= 0){
          to1 = 'Δεν υπάρχει';
          stopOv1= false;
        }else{
               stopOv1=true;


               if($('#stopover1-distance option:selected').val() > 5){
                   stopo1Distance= $('#stopover1-distance option:selected').text();
                }else{
                   stopo1Distance = ' ';
                }


                if($('#stopover1_lift option:selected').val() != -1){
                    stopo1from_lift= $('#stopover1_lift option:selected').text();
                }else{
                    stopo1from_lift= ' ';
                }

                stopo1from_floor= $('#stopover1_floor option:selected').text();
              


                if($('#stopover1HighRoad').is(':checked')){

                   stopo1OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

                }else{

                   stopo1OldHighRoad= " ";

                }

                if($('#stopover1ExternalLift').is(':checked')){

                   stopo1OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

                }else{

                   stopo1OldExternalLift= " ";

                }

        }
        if(to2.length <= 0){
          to2 = 'Δεν υπάρχει';
          stopOv2= false;
        }else{
               stopOv2= true;


               if($('#stopover2-distance option:selected').val() > 5){
                   stopo2Distance= $('#stopover2-distance option:selected').text();
                }else{
                   stopo2Distance = ' ';
                }


                if($('#stopover2_lift option:selected').val() != -1){
                    stopo2from_lift= $('#stopover2_lift option:selected').text();
                }else{
                    stopo2from_lift= ' ';
                }


               
               stopo2from_floor= $('#stopover2_floor option:selected').text();
               

              if($('#stopover2HighRoad').is(':checked')){

                 stopo2OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo2OldHighRoad= " ";

              }

              if($('#stopover2ExternalLift').is(':checked')){

                 stopo2OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo2OldExternalLift= " ";

              }

        }
        if(to3.length <= 0){
          to3 = 'Δεν υπάρχει';
          stopOv3= false;
        }else{
               stopOv3= true;


               if($('#stopover3-distance option:selected').val() > 5){
                   stopo3Distance= $('#stopover3-distance option:selected').text();
                }else{
                   stopo3Distance = ' ';
                }


                if($('#stopover3_lift option:selected').val() != -1){
                    stopo3from_lift= $('#stopover3_lift option:selected').text();
                }else{
                    stopo3from_lift= ' ';
                }


               stopo3from_floor= $('#stopover3_floor option:selected').text();

              if($('#stopover3HighRoad').is(':checked')){

                 stopo3OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo3OldHighRoad= " ";

              }

              if($('#stopover3ExternalLift').is(':checked')){

                 stopo3OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo3OldExternalLift= " ";

              }


        }
        if(to4.length <= 0){
          to4 = 'Δεν υπάρχει';
          stopOv4= false;
        }else{

               stopOv4= true;

               if($('#stopover4-distance option:selected').val() > 5){
                   stopo4Distance= $('#stopover4-distance option:selected').text();
                }else{
                   stopo4Distance = ' ';
                }


                if($('#stopover4_lift option:selected').val() != -1){
                    stopo4from_lift= $('#stopover4_lift option:selected').text();
                }else{
                    stopo4from_lift= ' ';
                }


               
               stopo4from_floor= $('#stopover4_floor option:selected').text();
               

              if($('#stopover4HighRoad').is(':checked')){

                 stopo4OldHighRoad= "<b>Δρόμος υψηλής κυκλοφορίας</b>";

              }else{

                 stopo4OldHighRoad= " ";

              }

              if($('#stopover4ExternalLift').is(':checked')){

                 stopo4OldExternalLift= "<b>Θα χρειαστεί ανυψωτικό</b>";

              }else{

                 stopo4OldExternalLift= " ";

              }

        }


         var transport='<div class="col-md-12">';
         transport+='<h2>Σύνοψη Μετακόμισης</h2>';
         transport+='<p style="font-size: 17px;" class="pricesp">Budget: <span>'+ telprice +'</span>€  Commission: <span>'+ telcommission +'</span>€</p>';
         transport+='<p style="font-size: 17px;">Συνολικός Όγκος: '+totalVolume.toFixed(2)+ ' Προτεινόμενος οδηγός: '+driver+ '</p>';
         transport+='<p style="font-size: 17px;">'+km+'km</p>';
         transport+='<h3>Στοιχεία Επικοινωνίας</h3>';
         transport+='<p class="contactDetails">Όνομα: <b>'+inputName +'</b> Επίθετο: <b>'+ inputSurname +'</b> Email: <b>'+ email +'</b> Τηλ: <b>' + tel + '</b></p>';
         transport+='<h3>Πληροφορίες Μετακόμισης</h3>';
         transport+='<p>Μετακόμιση Από: <b>' + afetiria + '</b></p>';
         transport+='<p>Σε <b>'+telikos+'</b></p>';
         transport+='<p>1η Ενδιάμεση στάση: '+ to1 +'</p>';
         transport+='<p>2η Ενδιάμεση στάση: '+ to2 +'</p>';
         transport+='<p>3η Ενδιάμεση στάση: '+ to3 +'</p>';
         transport+='<p>4η Ενδιάμεση στάση: '+ to4 +'</p>';
         transport+='<p>Για την Μετακόμιση θα χρειαστώ: <b>'+ selectService +'</b></p>';
         transport+='<p>Hμερομηνία μετακόμισης: <b>'+ myDate +'</b></p>';
         transport+='</div>';

         userEmail='<b>Μετακόμιση από</b> ' + afetiria +' <b>προς</b> ' + telikos +' '; 

         transport+='<div class="table-responsive col-md-12">';
         transport+='<table class="table table-striped"><thead><tr><th>Πληροφορίες Παλιού σπιτιού</th>';
         if(stopOv1){
            transport+='<th>1η Στάση '+ to1 +'</th>';
            userEmail+='<br/> <b>1η Ενδιάμεση στάση:</b> '+ to1;
         }
          if(stopOv2){
             transport+='<th>2η Στάση '+ to2 +'</th>';
             userEmail+='<br/> <b>2η Ενδιάμεση στάση:</b> '+ to2;
         }
          if(stopOv3){
             transport+='<th>3η Στάση '+ to3 +'</th>';
             userEmail+='<br/> <b>3η Ενδιάμεση στάση:</b> '+ to3;
         }
          if(stopOv4){
             transport+='<th>4η Στάση '+ to4 +'</th>';
             userEmail+='<br/> <b>4η Ενδιάμεση στάση:</b> '+ to4;
         }
         transport+='<th>Πληροφορίες Νέου σπιτιού</th>';  
         transport+='</tr></thead><tbody>';
         transport+='<tr><td>'+aDistance+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1Distance+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2Distance+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3Distance+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4Distance+'</td>';
         }
         transport+='<td>'+nDistance+'</td></tr>'; //end firt tbody row

         transport+='<tr><td>'+afrom_floor+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1from_floor+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2from_floor+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3from_floor+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4from_floor+'</td>';
         }
         transport+='<td>'+nfrom_floor+'</td></tr>'; //end Second tbody row
   

         transport+='<tr><td>'+afrom_lift+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1from_lift+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2from_lift+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3from_lift+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4from_lift+'</td>';
         }

         transport+='<td>'+nfrom_lift+'</td></tr>'; //end third tbody row

         

         transport+='<tr><td>'+aOldHighRoad+'</td>';
         if(stopOv1){
            transport+='<td>'+stopo1OldHighRoad+'</td>';
         }
         if(stopOv2){
            transport+='<td>'+stopo2OldHighRoad+'</td>';
         }
         if(stopOv3){
            transport+='<td>'+stopo3OldHighRoad+'</td>';
         }
         if(stopOv4){
            transport+='<td>'+stopo4OldHighRoad+'</td>';
         }
         transport+='<td>'+nOldHighRoad+'</td></tr>'; //end Fourth tbody row


         transport+='<tr><td>'+aOldExternalLift+'</td>';
          
          if($('input#oldExternalLift').is(':checked')){
            userEmail+='<br/><br/><b>Χρήση ανυψωτικού για:</b> '+afetiria;
         }

         if(stopOv1){
            transport+='<td>'+stopo1OldExternalLift+'</td>';

            if($('input#stopover1ExternalLift').is(':checked')){
              userEmail+='<br/><b>Χρήση ανυψωτικού για:</b> '+to1;
            }

         }
         if(stopOv2){
            transport+='<td>'+stopo2OldExternalLift+'</td>';

             if($('input#stopover2ExternalLift').is(':checked')){
              userEmail+='<br/><b>Χρήση ανυψωτικού για:</b> '+to2;
            }

         }
         if(stopOv3){
            transport+='<td>'+stopo3OldExternalLift+'</td>';

            if($('input#stopover3ExternalLift').is(':checked')){
              userEmail+='<br/><b>Χρήση ανυψωτικού για:</b> '+to3;
            }

         }
         if(stopOv4){
            transport+='<td>'+stopo4OldExternalLift+'</td>';

            if($('input#stopover4ExternalLift').is(':checked')){
              userEmail+='<br/><b>Χρήση ανυψωτικού για:</b> '+to4;
            }

         }
         transport+='<td>'+nOldExternalLift+'</td></tr>'; //end last tbody row
         transport+='</tbody></table><br/><br/>';

         if($('input#newExternalLift').is(':checked')){
              userEmail+='<br/><b>Χρήση ανυψωτικού για:</b> '+telikos;
        }

        if($('input#varia-antikeimena').is(':checked')){
          if($('select#posa-atoma option:selected').val() != '-1'){

             userEmail+='<br/><b>Θα χρειαστούν</b> '+ $('select#posa-atoma option:selected').val() + ' άτομα'; 
          }

        }



         transport+='<h3>Υπηρεσίες Μετακόμισης</h3>';
         transport+='<p><b>'+variaAntikeimena+'</b></p>';
         transport+='<p><b>'+antikeimenaAksias+'</b></p><br/><br/>';

         transport+='<h3>Πράγματα για μεταφορά</h3>';

         transport+='<div class="table-responsive"><table class="table table-striped"><thead><tr><th>Πράγματα</th><th>Αμπαλαζ</th><th>Λύσιμο</th><th>Δέσιμο</th></tr></thead><tbody>';
         userEmail+='<br/><br/><div class="table-responsive"><table class="table table-striped"><thead><tr><th>Πράγματα</th><th>Αμπαλαζ</th><th>Λύσιμο</th><th>Δέσιμο</th></tr></thead><tbody>';
          $.each( TableData, function( i, row ){

             if(row.things != 0 ){
                  transport+= '<tr><td>'+ row.things + '</td><td>' + row.ampalaz +'</td><td>'+ row.lisimo +'</td><td>'+ row.desimo +'</td></tr>';
                  userEmail+= '<tr><td>'+ row.things + '</td><td>' + row.ampalaz +'</td><td>'+ row.lisimo +'</td><td>'+ row.desimo +'</td></tr>';
              }
          });

        transport+="</tbody></table></div><br/><br/>";
        userEmail+="</tbody></table></div><br/><br/>";


        transport+="<p><b>Σχόλια: </b></p><p>"+userMsg+"</>";









        var clearTransport='';
         /*clearTransport+='Budget: '+ telprice +'€  Commission: '+ telcommission +'€ \n';
         clearTransport+='Συνολικός Όγκος: '+totalVolume.toFixed(2)+ ' Προτεινόμενος οδηγός: '+driver+' \n\n';
         clearTransport+='Στοιχεία Επικοινωνίας \n\n';
         clearTransport+='Όνομα: '+inputName +' Επίθετο: '+ inputSurname +' Email: '+ email +' Τηλ: ' + tel + '\n\n';
         clearTransport+='Πληροφορίες Μετακόμισης';*/
         clearTransport+='Μετακόμιση Από: ' + afetiria + '\n';
         clearTransport+='Σε: '+telikos+'\n';

         var viber = 'Προσφορά Μετακόμισης\nΑπό: ' + afetiria + '\n';
         viber+='Σε: '+telikos+'\n\n';

         if(stopOv1){
            clearTransport+='1η Ενδιάμεση στάση: '+ to1 +'\n';
         }
         if(stopOv2){
            clearTransport+='2η Ενδιάμεση στάση: '+ to2 +'\n';
         }
         if(stopOv3){
            clearTransport+='3η Ενδιάμεση στάση: '+ to3 +'\n';
         }
         if(stopOv4){
            clearTransport+='4η Ενδιάμεση στάση: '+ to4 +'\n';
         }

         clearTransport+= '\n' + selectService +'\n\n';
         clearTransport+='Hμερομηνία μετακόμισης: '+ myDate +'\n\n';
         viber+='Hμ.: '+ myDate +'\n';
         viber+='Τηλ.: 2103009323\n';
         viber+='Τιμή: '+telprice+'€+φπα\n\n';
         viber+='Σας Ευχαριστούμε';


         
         clearTransport+='Πληροφορίες Παλιού σπιτιού \n';
         clearTransport+=aDistance + " "+ afrom_floor + " "+ afrom_lift +" "+ aOldHighRoad +" "+aOldExternalLift + "\n\n";

         if(stopOv1){
          clearTransport+='Πληροφορίες 1η Στάση '+ to1 + "\n";
          clearTransport+=' '+ stopo1Distance + ' ' + stopo1from_floor + ' ' + stopo1from_lift +' '+ stopo1OldHighRoad + ' ' +stopo1OldExternalLift + "\n\n";
         }

         if(stopOv2){
          clearTransport+='Πληροφορίες 2η Στάση '+ to2 + "\n";
          clearTransport+=' '+ stopo2Distance + ' ' + stopo2from_floor + ' ' + stopo2from_lift +' '+ stopo2OldHighRoad + ' ' +stopo2OldExternalLift + "\n\n";
         }

         if(stopOv3){
          clearTransport+='Πληροφορίες 3η Στάση '+ to3 + "\n";
          clearTransport+=' '+ stopo3Distance + ' ' + stopo3from_floor + ' ' + stopo3from_lift +' '+ stopo3OldHighRoad + ' ' +stopo3OldExternalLift + "\n\n";
         }

         if(stopOv4){
          clearTransport+='Πληροφορίες 4η Στάση '+ to4 + "\n";
          clearTransport+=' '+ stopo4Distance + ' ' + stopo4from_floor + ' ' + stopo4from_lift +' '+ stopo4OldHighRoad + ' ' +stopo4OldExternalLift + "\n\n";
         }


         clearTransport+='Πληροφορίες Νέου σπιτιού \n';
         clearTransport+=nDistance + " "+ nfrom_floor + " "+ nfrom_lift +" "+ nOldHighRoad +" "+nOldExternalLift + "\n\n";

         clearTransport+='Υπηρεσίες Μετακόμισης\n\n';
         clearTransport+=variaAntikeimena+'\n';
         clearTransport+=antikeimenaAksias+'\n\n';

         clearTransport+='Πράγματα για μεταφορά\n\n';

         

          $.each( TableData, function( i, row1 ){

            if(row1.things != 0 ){
              clearTransport+=  row1.things + ' ' + row1.ampalaz +' '+ row1.lisimo +' '+ row1.desimo +'\n\n';
            }
          });

        


        clearTransport+='\nΣχόλια: '+userMsg+'\n';

        //alert(clearTransport);

        var appid= $('#applicationId option:selected').attr('value');
        var agentid= $('#OfferAgentId option:selected').attr('value');

        if( $('input.sendEmailCustomer').is(':checked') ){
          var sendOffer = true;
        }else{
          var sendOffer = false;
        }

        var transTime= $('input#inputTime').val();


        
          doneCustomerEmail=false;
          doneCustomerName= false;
          doneCustomerSureName= false;
          doneTel=false;
          
          if($('#inputName').val().length > 0 ){
            doneCustomerName= true;
          }

          if($('#inputSurname').val().length > 0 ){
            doneCustomerSureName= true;
          }

            var valEmail = $("#email").val();
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (testEmail.test(valEmail)){
              doneCustomerEmail= true;
            }

            var transType1_2_msg="";

            if(doneTransType1_2){
              transType1_2_msg= "<br/><span><b>*Αν το ανυψωτικό και το φορτηγο χρησιμοποιηθούν για πάνω από 2,5ώρες υπάρχει επιπλέον χρέωση 15€ για κάθε μηχάνημα/όχημα!</b></span>"
            }


            tel= jQuery('input#tel').val();

            if(tel.length > 0){
              doneTel= true;
            }






        



        if(doneCustomerName && doneCustomerSureName && doneTel){


            var surname= inputSurname;
            var firstname= inputName;
            var address= afetiria;
            var mobile= tel;
            var sex= $('select#transportSex option:selected').val();
            var phone= '';
            var email= email;


            var agent_id= agentid;
            var application= $('select#applicationId option:selected').val();
            var category= 103;
            var budget= telprice;
            var commision= telcommission;
            var county= $('select#county option:selected').val();
            var comments= clearTransport;
            var status= 3;

/*application_id: application,
category_id: category,
                        address: address,
                        budget: budget,
                        county_id: county,
                        commision: commision,
                        agent_id: agent,
                        comment: comments,
                        mobile: mobile,
                        phone: phone,
                        surname: surname,
                        firstname: firstname,                        
                        sex: sex,
                        email: email,
                        status: status

viber,
transType1_2_msg,
transTime,
userEmail,
km,
selectService,
driver,
sendOffer
appid
agentid,
myDate,
afetiria,
telikos,
*/

/*transport var html */
 //https://upgrade.myconstructor.gr/webservices/api/

        // Find/Insert Customer data
        var findCustomerAPI ='https://upgrade.myconstructor.gr/webservices/api/customer/search_by_mobile.php?mobile='+mobile;
        $.ajax({
            type: "POST",
            url: findCustomerAPI,
            data: {
                surname: surname,
                firstname: firstname,
                address: address,
                mobile: mobile,
                sex: sex,
                phone: phone,
                email: email
            },
            dataType: "json",
            success: function(data)
            {

                var customer_id = data;
                //alert(customer_id);
                //var date = "2018-05-05";
                //var time ="10:00-12:00";
                

                var createOfferAPI = 'https://upgrade.myconstructor.gr/webservices/api/appointment/createTransportOffer.php';
                //alert(createOfferAPI);
                //create($prod_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
                $.ajax({
                    type: "POST",
                    url: createOfferAPI,
                    data: {
                        cust_id : customer_id,
                        application_id: application,
                        category_id: category,
                        address: address,
                        delivery_address: telikos,
                        budget: budget,
                        county_id: county,
                        commision: commision,
                        agent_id: agent,
                        comment: comments,
                        mobile: mobile,
                        phone: phone,
                        surname: surname,
                        firstname: firstname,                        
                        sex: sex,
                        email: email,
                        status: status,
                        date: myDate,
                        htmlTransport: transport
                    },
                    //dataType: "json",
                    success: function(data)
                    {
                        var sentSmsAPI ='https://upgrade.myconstructor.gr/webservices/api/webservices/api/sms/sent.php?mobile='+mobile+'&messagetext='+viber;

                        $.ajax({
                            type: "POST",
                            url: sentSmsAPI,
                            data: {
                                mobile: mobile,
                                viber: viber
                            },
                            dataType: "json",
                            success: function(data){
                                alert(data);
                            },
                              error: function(data){
                                  alert(data);
                              }
                          });


                        alert("Offer Created");
                        window.location.replace('https://upgrade.myconstructor.gr/platform/offers.php');
                    },
                    error: function(data){
                        alert(data);
                    }
                });

            }
        });
      










      /*    jQuery.ajax({

                      type:"POST",

                      url:"https://myconstructor.gr/AdminTransport/offer.php",

                      data:{viber,transType1_2_msg,transTime,userEmail,km,selectService,driver,sendOffer,appid,agentid,myDate,telprice,telcommission,inputName,inputSurname,afetiria,telikos,email,tel,transport,clearTransport},

                      //data:{fromAddress,toAddreess,email,tel,selectService,oldHouseRange,oldFloor,oldLift,oldHighRoad,oldExternalLift,newHouseRange,newFloor,newLift,newHighRoad,newExternalLift,myThings,variaAntikeimena,antikeimenaAksias,myDate,userMsg,professional,profName,profSurName},

                      async: true,

                      dataType: 'json',

                      success: function(data){

                         console.log(data);

                        if(data){ 

                           jQuery('p#saveMsg').html('<span style="color:green;">Αποθηκεύτηκε επιτυχώς! </span><br/>');

                           var win = window.open('https://myconstructor.gr/admin/offers/list', '_blank');
                            if (win) {
                              win.focus();
                            }

                        }else{

                          jQuery('p#saveMsg').html('<span style="color:red;>Αποτυχία Αποστολής</span><br/>');

                        }

                     }

                 })*/
            }else{
              alert('Συμπλήρωσε σωστά τα στοιχεία του πελάτη Όνομα, Επίθετο και Τηλέφωνο!');
            }


      }


});




$('#lastprevbtn').click(function(){

  $('#last-step').css('display','block');

  $('#thankyou').css('display','none');

  $('#printTransport').css('display','none');

  $('#step4btn').css('display','inline-block');

  $('#inputBudget').prop('disabled', true);
  $('#inputComission').prop('disabled', true);

  $('.print-thing p').remove();






});


function storeTblValues(){

          var TableData = new Array();

          var ampalaz;

          var lisimo;
          var sumThing;
          var desimo;

          var things;

          $('#removaltable tr').each(function(row, tr){

              sumThing= $(this).find('td span.sumThing').text();
              sumThing=parseInt(sumThing);


                  if(sumThing>0){

                        if(jQuery(this).find('td:eq(2) input').length > 0 ){

                            if(jQuery(this).find('td:eq(1) input').is(':checked')){

                              ampalaz ="Θέλω αμπαλάζ";

                            }else{

                              ampalaz=" ";

                            }

                            if(jQuery(this).find('td:eq(2) input').is(':checked')){

                              lisimo = "Θέλω Λύσιμο";

                            }else{

                              lisimo = " ";

                            }
                            if(jQuery(this).find('td:eq(3) input').is(':checked')){

                              desimo = "Θέλω Δέσιμο";

                            }else{

                              desimo = " ";

                            }

                            TableData[row]={
                                "things" : $(tr).find('td:eq(0)').text()
                                , "ampalaz" : ampalaz
                                , "lisimo" : lisimo
                                , "desimo" : desimo
                            }

                        }else{

                          lisimo=" ";
                          desimo=" ";
                          if(jQuery(this).find('td:eq(1) input').is(':checked')){
                                  
                                  ampalaz ="Θέλω αμπαλάζ";
                                
                                }else{

                                  ampalaz=" ";

                                }

                          TableData[row]={

                                "things" : $(tr).find('td:eq(0)').text()
                                , "ampalaz" : ampalaz
                                , "lisimo" : lisimo
                                , "desimo" : desimo

                            }

                      }
                }else{

                  TableData[row]={
                                "things" : 0
                                , "ampalaz" : 0
                                , "lisimo" : 0
                                , "desimo" : 0
                            }

                }
             
          }); 
          TableData.shift();  // first row will be empty - so remove
          return TableData;
  }



function variaAntikeimena(){



    if($('#varia-antikeimena').is(":checked")){   

        $("#posa-atoma").show();

        $('input#oxi-varia-antikeimena').removeAttr('checked');



    }else{

        $("#posa-atoma").hide();

        $('input#varia-antikeimena').removeAttr('checked');

    }

     if($('#antikeimena-aksias').is(":checked")){  

        $(".p-antikeimena-aksias").show();

        $('input#oxi-antikeimena-aksias').removeAttr('checked');



    }else{

        $(".p-antikeimena-aksias").hide();

        $('input#antikeimena-aksias').removeAttr('checked');

    }

}






















/*

  Dropdown with Multiple checkbox select with jQuery - May 27, 2013

  (c) 2013 @ElmahdiMahmoud

  license: https://www.opensource.org/licenses/mit-license.php

*/



$(".sofas .dropdown dt a").on('click', function() {

  $(".sofas .dropdown dd ul").slideToggle('fast');

});



$(".sofas .dropdown dd ul li a").on('click', function() {

  $(".sofas .dropdown dd ul").hide();

});



function getSelectedValue(id) {

  return $("#" + id).find("dt a span.value").html();

}



$(document).bind('click', function(e) {

  var $clicked = $(e.target);

  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();

});



$('.sofas .mutliSelect input[type="checkbox"]').on('click', function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();

var labelname= $("label[name="+ title +"]").text();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal'); 

var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');




  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';

    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="0" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';

    if ( title === "DiningTableWood" || title === "DiningTableGlass" || title === "ShelvingUnitsSystems" || title === "ShelvingUnitsSystemsM" || title === "Library" || title === "Bar" || title === "DiningTableOver10" || title === "CornerSofa" || title === "Shelves" || title === "TvTable") {

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';


    }else{

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox"  aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';

    }



    $('.LivingRoomList').append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
    
   
     if(stopoverstep < num_stopover){

      $('.listStopOver1').append(stepoverhtml);
     
    }

   // $(".hida").hide();

  } else {

    if(stopoverstep < num_stopover){
      $('.listStopOver1 div[title="' + title + '"]').remove();
    }
    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

   // var ret = $(".hida");

    //$('.dropdown dt a').append(ret);
  }

});





$(".bedrooms .dropdown dt a").on('click', function() {

  $(".bedrooms .dropdown dd ul").slideToggle('fast');

});



$(".bedrooms .dropdown dd ul li a").on('click', function() {

  $(".bedrooms .dropdown dd ul").hide();

});



function getSelectedValue(id) {

  return $("#" + id).find("dt a span.value").html();

}



$(document).bind('click', function(e) {

  var $clicked = $(e.target);

  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();

});



$('.bedrooms .mutliSelect input[type="checkbox"]').on('click', function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();

var labelname= $("label[name="+ title +"]").text();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal'); 


var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');




  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="0" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
   

     if ( title === "DoubleBed" || title === "SingleBed" || title === "Wardrobe" || title === "2Wardrobe" || title === "3Wardrobe" || title === "4Wardrobe" || title === "BabyCot" || title === "Changingtableforbaby" || title === "CurtainRods") {

      
       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'" ><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>'; 

         
    }else{

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>'; 

    }

    



    $('.BedRoomsList').append(html);
    
    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

    if(stopoverstep < num_stopover){

      $('.listStopOver1').append(stepoverhtml);
     
    }

  } else {

    if(stopoverstep < num_stopover){

      $('.listStopOver1 div[title="' + title + '"]').remove();
     
    }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    //var ret = $(".hida");

   // $('.dropdown dt a').append(ret);



  }

});









$(".kitchen .dropdown dt a").on('click', function() {

  $(".kitchen .dropdown dd ul").slideToggle('fast');

});



$(".kitchen .dropdown dd ul li a").on('click', function() {

  $(".kitchen .dropdown dd ul").hide();

});



function getSelectedValue(id) {

  return $("#" + id).find("dt a span.value").html();

}



$(document).bind('click', function(e) {

  var $clicked = $(e.target);

  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();

});



$('.kitchen .mutliSelect input[type="checkbox"]').on('click', function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal');


var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');



var labelname= $("label[name="+ title +"]").text();



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="0" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
    

    if ( title === "ElectricKitchen" || title === "WashingMachine" || title === "Dishwasher" || title === "FridgeWardrobe" || title=== "WallElectricKitchen" ) {
      
      var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';        
    
    }else{

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>'; 
    }
   

    $('.KitchenList').append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();
    if(stopoverstep < num_stopover){

      $('.listStopOver1').append(stepoverhtml);
     
    }

  } else {

     if(stopoverstep < num_stopover){

      $('.listStopOver1 div[title="' + title + '"]').remove();
     
    }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

   // var ret = $(".hida");
   // $('.dropdown dt a').append(ret);
  }

});





$(".otherThings .dropdown dt a").on('click', function() {

  $(".otherThings .dropdown dd ul").slideToggle('fast');

});



$(".otherThings .dropdown dd ul li a").on('click', function() {

  $(".otherThings .dropdown dd ul").hide();

});



function getSelectedValue(id) {

  return $("#" + id).find("dt a span.value").html();

}



$(document).bind('click', function(e) {

  var $clicked = $(e.target);

  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();

});



$('.otherThings .mutliSelect input[type="checkbox"]').on('click', function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();

var labelname= $("label[name="+ title +"]").text();

var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal'); 

var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');




  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty"  disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="0" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';



    if ( title === "Desk" || title === "BigDesk" || title === "OtherWardrobe" || title === "AirCondition" || title === "AirConditionEx" || title === "WaterHeater" || title === "SolarWaterHeater") {
      
      var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';        
    }else{

      var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>'; 
    }

    

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);



    $('.OtherThingsList').append(html);
    if(stopoverstep < num_stopover){

      $('.listStopOver1').append(stepoverhtml);
     
    }

   // $(".hida").hide();

  } else {
    if(stopoverstep < num_stopover){

      $('.listStopOver1 div[title="' + title + '"]').remove();
     
    }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

  // var ret = $(".hida");

   // $('.dropdown dt a').append(ret);



  }

});


$(document).on("click", ".sofasStopOver .dropdown dt a",function() {

  $(".sofasStopOver .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".sofasStopOver .dropdown dd ul li a" , function() {

  $(".sofasStopOver .dropdown dd ul").hide();

});

$(document).on("click", ".bedroomsStopOver .dropdown dt a",function() {

  $(".bedroomsStopOver .dropdown dd ul").slideToggle('fast');

});


$(document).on("click",".bedroomsStopOver .dropdown dd ul li a" , function() {

  $(".bedroomsStopOver .dropdown dd ul").hide();

});


$(document).on("click", ".kitchenStopOver .dropdown dt a",function() {

  $(".kitchenStopOver .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".kitchenStopOver .dropdown dd ul li a" , function() {

  $(".kitchenStopOver .dropdown dd ul").hide();

});

$(document).on("click", ".otherThingsStopOver .dropdown dt a",function() {

  $(".otherThingsStopOver .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".otherThingsStopOver .dropdown dd ul li a" , function() {

  $(".otherThingsStopOver .dropdown dd ul").hide();

});



$(document).on("click", ".sofas2 .dropdown dt a",function() {

  $(".sofas2 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".sofas2 .dropdown dd ul li a" , function() {

  $(".sofas2 .dropdown dd ul").hide();

});

$(document).on("click", ".bedrooms2 .dropdown dt a",function() {

  $(".bedrooms2 .dropdown dd ul").slideToggle('fast');

});


$(document).on("click",".bedrooms2 .dropdown dd ul li a" , function() {

  $(".bedrooms2 .dropdown dd ul").hide();

});


$(document).on("click", ".kitchen2 .dropdown dt a",function() {

  $(".kitchen2 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".kitchen2 .dropdown dd ul li a" , function() {

  $(".kitchen2 .dropdown dd ul").hide();

});

$(document).on("click", ".otherThings2 .dropdown dt a",function() {

  $(".otherThings2 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".otherThings2 .dropdown dd ul li a" , function() {

  $(".otherThings2 .dropdown dd ul").hide();

});


$(document).on("click", ".sofas3 .dropdown dt a",function() {

  $(".sofas3 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".sofas3 .dropdown dd ul li a" , function() {

  $(".sofas3 .dropdown dd ul").hide();

});

$(document).on("click", ".bedrooms3 .dropdown dt a",function() {

  $(".bedrooms3 .dropdown dd ul").slideToggle('fast');

});


$(document).on("click",".bedrooms3 .dropdown dd ul li a" , function() {

  $(".bedrooms3 .dropdown dd ul").hide();

});


$(document).on("click", ".kitchen3 .dropdown dt a",function() {

  $(".kitchen3 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".kitchen3 .dropdown dd ul li a" , function() {

  $(".kitchen3 .dropdown dd ul").hide();

});

$(document).on("click", ".otherThings3 .dropdown dt a",function() {

  $(".otherThings3 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".otherThings3 .dropdown dd ul li a" , function() {

  $(".otherThings3 .dropdown dd ul").hide();

});


$(document).on("click", ".sofas4 .dropdown dt a",function() {

  $(".sofas4 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".sofas4 .dropdown dd ul li a" , function() {

  $(".sofas4 .dropdown dd ul").hide();

});

$(document).on("click", ".bedrooms4 .dropdown dt a",function() {

  $(".bedrooms4 .dropdown dd ul").slideToggle('fast');

});


$(document).on("click",".bedrooms4 .dropdown dd ul li a" , function() {

  $(".bedrooms4 .dropdown dd ul").hide();

});


$(document).on("click", ".kitchen4 .dropdown dt a",function() {

  $(".kitchen4 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".kitchen4 .dropdown dd ul li a" , function() {

  $(".kitchen4 .dropdown dd ul").hide();

});

$(document).on("click", ".otherThings4 .dropdown dt a",function() {

  $(".otherThings4 .dropdown dd ul").slideToggle('fast');

});

$(document).on("click",".otherThings4 .dropdown dd ul li a" , function() {

  $(".otherThings4 .dropdown dd ul").hide();

});




$(".previous").click(function(){

  if(animating) return false;

  animating = true;

  

  current_fs = $(this).parent();

  previous_fs = $(this).parent().prev();

  

  //de-activate current step on progressbar

  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  

  //show the previous fieldset

  previous_fs.show(); 

  //hide the current fieldset with style

  current_fs.animate({opacity: 0}, {

    step: function(now, mx) {

      //as the opacity of current_fs reduces to 0 - stored in "now"

      //1. scale previous_fs from 80% to 100%

      scale = 0.8 + (1 - now) * 0.2;

      //2. take current_fs to the right(50%) - from 0%

      left = ((1-now) * 50)+"%";

      //3. increase opacity of previous_fs to 1 as it moves in

      opacity = 1 - now;

      current_fs.css({'left': left});

      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});

    }, 

    duration: 800, 

    complete: function(){

      current_fs.hide();

      animating = false;

    }, 

    //this comes from the custom easing plugin

    easing: 'easeInOutBack'

  });

});




$("#step3prev").click(function(){
  

if(stopoverstep == 1){
   $('.rowthingsfrom').css('display','block');
   $('#rowThings'+stopoverstep).css('display','none');
     stopoverstep--;
 }else if(stopoverstep == 2){
  $('#rowThings1').css('display','block');
  $('#rowThings'+stopoverstep).css('display','none');
    stopoverstep--;

 }else if(stopoverstep == 3){
  $('#rowThings2').css('display','block');
  $('#rowThings'+stopoverstep).css('display','none');
    stopoverstep--;

 }else if(stopoverstep == 4 ){
  $('#rowThings3').css('display','block');
  $('#rowThings'+stopoverstep).css('display','none');
  stopoverstep--;

             
      
  }else{

    if($('#step4prev').hasClass('lastStep')){
  stopoverstep=num_stopover;
  $('#step4prev').removeClass('lastStep');
}

        if(animating) return false;

        animating = true;

        

        current_fs = $(this).parent();

        previous_fs = $(this).parent().prev();

        

        //de-activate current step on progressbar

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

       

        previous_fs.show(); 


        current_fs.animate({opacity: 0}, {

          step: function(now, mx) {

            //as the opacity of current_fs reduces to 0 - stored in "now"

            //1. scale previous_fs from 80% to 100%

            scale = 0.8 + (1 - now) * 0.2;

            //2. take current_fs to the right(50%) - from 0%

            left = ((1-now) * 50)+"%";

            //3. increase opacity of previous_fs to 1 as it moves in

            opacity = 1 - now;

            current_fs.css({'left': left});

            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});

          }, 

          duration: 800, 

          complete: function(){

            current_fs.hide();

            animating = false;

          }, 

          //this comes from the custom easing plugin

          easing: 'easeInOutBack'

        });
    }

});

$("#step4prev").click(function(){

    $('#step4btn').css('display','inline-block');
    $('#printTransport').css('display','none');
    $('.print-thing p').remove();
  

        if(animating) return false;

        animating = true;



        current_fs = $(this).parent();

        previous_fs = $(this).parent().prev();

        

        //de-activate current step on progressbar

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

       

        previous_fs.show(); 


        current_fs.animate({opacity: 0}, {

          step: function(now, mx) {

            //as the opacity of current_fs reduces to 0 - stored in "now"

            //1. scale previous_fs from 80% to 100%

            scale = 0.8 + (1 - now) * 0.2;

            //2. take current_fs to the right(50%) - from 0%

            left = ((1-now) * 50)+"%";

            //3. increase opacity of previous_fs to 1 as it moves in

            opacity = 1 - now;

            current_fs.css({'left': left});

            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});

          }, 

          duration: 800, 

          complete: function(){

            current_fs.hide();

            animating = false;

          }, 

          //this comes from the custom easing plugin

          easing: 'easeInOutBack'

        });






        if(stopoverstep == 1){
          $('#rowThings'+stopoverstep).css('display','block');
         }else if(stopoverstep == 2){
          $('#rowThings'+stopoverstep).css('display','block');
         }else if(stopoverstep == 3){
          $('#rowThings'+stopoverstep).css('display','block');  
         }else if(stopoverstep == 4 ){
          $('#rowThings'+stopoverstep).css('display','block');
        }else{
          $('.rowthingsfrom').css('display','block');
        }
         
    

});



$(".submit").click(function(){

  return false;

})

//$('.sofas'+ stopoverstep.toString() +' .mutliSelect input[type="checkbox"]').on('click', function() {
$(document).on('click','.sofasStopOver .mutliSelect input[type="checkbox"]',function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();
    //title = $(this).val() + ",";

title = $(this).val();

var labelname= $("label[name="+ title +"]").text();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal'); 

var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var nextstop=0;
var from = $(this).attr('from');
var to= $(this).attr('to');




  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="'+from+'" to="0" > ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';


    if ( title === "DiningTableWood"+stopoverstep || title === "DiningTableGlass"+stopoverstep || title === "ShelvingUnitsSystems"+stopoverstep || title === "Library"+stopoverstep || title === "Bar"+stopoverstep || title === stopoverstep+"DiningTableOver10" || title === "CornerSofa"+stopoverstep || title === "Shelves"+stopoverstep || title === "TvTable"+stopoverstep) { 

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';

    }else{

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'"  dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox"  aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';

    }


    $('.LivingRoomList'+stopoverstep).append(html);


    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

    if(stopoverstep == 1){ // Create lists for stop overs
        $('.listStopOver2').append(stepoverhtml);
      }else if(stopoverstep == 2){
        $('.listStopOver3').append(stepoverhtml);
      }else if (stopoverstep == 3) {
         $('.listStopOver4').append(stepoverhtml);
      }

   // $(".hida").hide();

  } else {

    if(stopoverstep == 1){ // Remove from list
        $('.listStopOver2 .div[title="' + title + '"]').remove();
      }else if(stopoverstep == 2){
        $('.listStopOver3 .div[title="' + title + '"]').remove();
      }else if (stopoverstep == 3) {
         $('.listStopOver4 .div[title="' + title + '"]').remove();
      }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

  //  var ret = $(".hida");

    //$('.dropdown dt a').append(ret);
  }

});


$(document).on('click','.bedroomsStopOver .mutliSelect input[type="checkbox"]',function() {
//$('.bedrooms .mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";
    

title = $(this).val();

var labelname= $("label[name="+ title +"]").text();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal'); 


var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');




  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="'+from+'" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
   

     if ( title === "DoubleBed"+stopoverstep || title === "SingleBed"+stopoverstep || title === "Wardrobe"+stopoverstep || title === "2Wardrobe"+stopoverstep || title === "3Wardrobe"+stopoverstep || title === "4Wardrobe"+stopoverstep  ||  title === "BabyCot"+stopoverstep || title === "Changingtableforbaby"+stopoverstep || title === "CurtainRods"+stopoverstep) {
  

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'" ><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>'; 


    }else{

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>'; 

    }

    $('.BedRoomsList'+stopoverstep).append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

    if(stopoverstep == 1){ // Create lists for stop overs
        $('.listStopOver2').append(stepoverhtml);
      }else if(stopoverstep == 2){
        $('.listStopOver3').append(stepoverhtml);
      }else if (stopoverstep == 3) {
         $('.listStopOver4').append(stepoverhtml);
      }


   // $(".hida").hide();

  } else {

    if(stopoverstep == 1){ // Remove from list
        $('.listStopOver2 .div[title="' + title + '"]').remove();
      }else if(stopoverstep == 2){
        $('.listStopOver3 .div[title="' + title + '"]').remove();
      }else if (stopoverstep == 3) {
         $('.listStopOver4 .div[title="' + title + '"]').remove();
      }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    //var ret = $(".hida");

   // $('.dropdown dt a').append(ret);

  }

});



$(document).on('click','.kitchenStopOver .mutliSelect input[type="checkbox"]',function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal');


var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');



var labelname= $("label[name="+ title +"]").text();



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="'+from+'" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
    


     if ( title === "ElectricKitchen"+stopoverstep || title === "WashingMachine"+stopoverstep || title === "Dishwasher"+stopoverstep || title === "FridgeWardrobe"+stopoverstep || "WallElectricKitchen"+stopoverstep ) {
      
      var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';        
    }else{

      var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'"  pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>'; 
    }
   

    $('.KitchenList'+stopoverstep).append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();
     if(stopoverstep == 1){ // Create lists for stop overs
        $('.listStopOver2').append(stepoverhtml);
      }else if(stopoverstep == 2){
        $('.listStopOver3').append(stepoverhtml);
      }else if (stopoverstep == 3) {
         $('.listStopOver4').append(stepoverhtml);
      }

  } else {

    if(stopoverstep == 1){ // Remove from list
        $('.listStopOver2 .div[title="' + title + '"]').remove();
      }else if(stopoverstep == 2){
        $('.listStopOver3 .div[title="' + title + '"]').remove();
      }else if (stopoverstep == 3) {
         $('.listStopOver4 .div[title="' + title + '"]').remove();
      }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    var ret = $(".hida");
   // $('.dropdown dt a').append(ret);
  }

});

$(document).on('click','.otherThingsStopOver .mutliSelect input[type="checkbox"]',function() {



  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val();

    //title = $(this).val() + ",";

title = $(this).val();
var pTrans = $(this).attr('pVal');
var pAmpalaz = $(this).attr('aVal');
var pMantling = $(this).attr('mVal');
var lift= $(this).attr('lVal');


var dimh= $(this).attr('dimh');
var dimw= $(this).attr('dimw');
var diml= $(this).attr('diml');
var from = $(this).attr('from');
var to= $(this).attr('to');




var labelname= $("label[name="+ title +"]").text();



   if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" disabled /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';
    var stepoverhtml = '<div class="livingroomthings" title="' + title + '"><span class="valthings sum' + title + '">1</span><span class="thingname" from="'+from+'" to="0"> ' + labelname + '</span><div class="leavebtn"><img src="leavething.png"/></div></div>';



    if (  title === "Desk"+stopoverstep || title === "BigDesk"+stopoverstep || title === "OtherWardrobe"+stopoverstep || title === "AirCondition"+stopoverstep || title === "AirConditionEx"+stopoverstep || title === "WaterHeater"+stopoverstep || title === "SolarWaterHeater"+stopoverstep ) {

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Λύσιμο" /></td><td class="td-Desimo"><input class="desimo-checkbox" type="checkbox" mVal="'+pMantling+'" value="Θέλω Δέσιμο" /></td></tr>';  

   

    }else{

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle" from="'+from+'" to="'+to+'" dimh="'+dimh+'" dimw="'+dimw+'" diml="'+diml+'" pVal="'+pTrans+'" lVal="'+lift+'"><span class="sumThing">1</span>τεμ. </span> ' + labelname + '<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" aVal="'+pAmpalaz+'" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';  

    }



    $('.OtherThingsList'+stopoverstep).append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();
     if(stopoverstep == 1){ // Create lists for stop overs
        $('.listStopOver2').append(stepoverhtml);
      }else if(stopoverstep == 2){
        $('.listStopOver3').append(stepoverhtml);
      }else if (stopoverstep == 3) {
         $('.listStopOver4').append(stepoverhtml);
      }

  } else {

    if(stopoverstep == 1){ // Remove from list
        $('.listStopOver2 .div[title="' + title + '"]').remove();
      }else if(stopoverstep == 2){
        $('.listStopOver3 .div[title="' + title + '"]').remove();
      }else if (stopoverstep == 3) {
         $('.listStopOver4 .div[title="' + title + '"]').remove();
      }

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    if($('#removaltable .'+ title+'stopover'+stopoverstep).length> 0){
      $(this).remove();
    }

   // var ret = $(".hida");
   // $('.dropdown dt a').append(ret);
  }

});






 function qtyplus(fieldName){



     if(fieldName === "koutes"){

        var currentVal = parseInt($('#'+fieldName).val());

       

        // If is not undefined

        if (!isNaN(currentVal)) {

            // Increment  
            $('div[title="' + fieldName + '"].livingroomthings').remove();
            $('tr.' + fieldName).remove();

            var stepoverhtml = '<div class="livingroomthings" title="' + fieldName + '"><span class="valthings sum' + fieldName + '">1</span><span class="thingname" from="0" to="0"> Κούτες/Τσάντες</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
            var tablerow = '<tr class="' + fieldName + '"><td><span class="' + fieldName + ' tdTitle" from="0" to="0" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing"></span>  </span>Κούτες/Τσάντες<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';
            // Create lists for stop overs
            $('.listStopOver1').append(stepoverhtml);
            $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
            
            newboxval=currentVal + 5;
            $('div.table-responsive #removaltable tr.' + fieldName + ' td span span.sumThing').html(newboxval);

            
            $('#'+fieldName).val(currentVal + 5);

            if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(currentVal + 5); //Stopovers listofthings
            }

            var currentVal = parseInt($('#'+fieldName).val());

            if(currentVal == 0){
                $('.listStopOver1 div[title="' + fieldName + '"].livingroomthings').remove();

            }


        } else {

            

           $('#'+fieldName).val(1); //0

           if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(1); //Stopovers listofthings
            }

            var currentVal = parseInt($('#'+fieldName).val());
            if(currentVal == 0){
                $('.listStopOver1 div[title="' + fieldName + '"].livingroomthings').remove();
               

            }


        }



     }else{

        var currentVal = parseInt($('#'+fieldName).val());

        // If is not undefined

        if (!isNaN(currentVal)) {

            // Increment
            
            $('#'+fieldName).val(currentVal + 1);
            newval=currentVal + 1;
            $('#removaltable tbody tr.'+fieldName+' td span.sumThing' ).html(newval);

                if(stopoverstep == 0){

                  if($('.listStopOver1 .sum'+fieldName).length>0){
                      $('.listStopOver1 .sum'+fieldName).html(currentVal + 1); //Stopovers listofthings
                  }

                  var currentVal = parseInt($('#'+fieldName).val());
                  if(currentVal == 0){
                      $('.listStopOver1 div[title="' + fieldName + '"].livingroomthings').remove();
                  }
                  } else if(stopoverstep == 1){
                    if($('.listStopOver2 .sum'+fieldName).length>0){
                            $('.listStopOver2 .sum'+fieldName).html(currentVal + 1); //Stopovers listofthings
                        }

                        var currentVal = parseInt($('#'+fieldName).val());
                        if(currentVal == 0){
                            $('.listStopOver2 div[title="' + fieldName + '"].livingroomthings').remove();
                        }

                  }else if(stopoverstep == 2){
                    if($('.listStopOver3 .sum'+fieldName).length>0){
                            $('.listStopOver3 .sum'+fieldName).html(currentVal + 1); //Stopovers listofthings
                        }

                        var currentVal = parseInt($('#'+fieldName).val());
                        if(currentVal == 0){
                            $('.listStopOver3 div[title="' + fieldName + '"].livingroomthings').remove();
                        }

                  }else if(stopoverstep == 3){
                    if($('.listStopOver4 .sum'+fieldName).length>0){
                            $('.listStopOver4 .sum'+fieldName).html(currentVal + 1); //Stopovers listofthings
                        }

                        var currentVal = parseInt($('#'+fieldName).val());
                        if(currentVal == 0){
                            $('.listStopOver4 div[title="' + fieldName + '"].livingroomthings').remove();
                        }

                  }




        } else {

            // Otherwise put a 0 there

           $('#'+fieldName).val(1); //0
            if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(1); //Stopovers listofthings
            }

        }

    }

}





function qtyminus(fieldName){

    

    if(fieldName === "koutes"){

        var currentVal = parseInt($('#'+fieldName).val());

        // If it isn't undefined or its greater than 0



        if (!isNaN(currentVal) && currentVal > 1) {

            // Decrement one
            $('div[title="' + fieldName + '"].livingroomthings').remove();
            $('tr.' + fieldName).remove();


             var stepoverhtml = '<div class="livingroomthings" title="' + fieldName + '"><span class="valthings sum' + fieldName + '">1</span><span class="thingname" from="0" to="0"> Κούτες/Τσάντες</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
             var tablerow = '<tr class="' + fieldName + '"><td><span class="' + fieldName + ' tdTitle" from="0" to="0" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing"></span>  </span>Κούτες/Τσάντες<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';
           // var tablerow = '<tr class="koutes-tsantes"><td><span class="tdTitle" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing">'+ koutes +'</span>Χ </span>Κούτες/Τσάντες</td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td></tr>';


             // Create lists for stop overs
                $('.listStopOver1').append(stepoverhtml);
                $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
               
                
          

            $('#'+fieldName).val(currentVal - 5); 
            newboxval=currentVal - 5;
            $('div.table-responsive #removaltable tr.' + fieldName + ' td span span.sumThing').html(newboxval);
            if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(currentVal - 5); //Stopovers listofthings
            }

            
            var currentVal = parseInt($('#'+fieldName).val());
            if(currentVal <= 0){
                $('.listStopOver1 div[title="' + fieldName + '"].livingroomthings').remove();
                $('tr.'+fieldName).remove();
            }

           

        } else {

            // Otherwise put a 0 there

            $('#'+fieldName).val(0); //0

             if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(0); //Stopovers listofthings
            }

            var currentVal = parseInt($('#'+fieldName).val());
            if(currentVal <= 0){
                $('.listStopOver1 div[title="' + fieldName + '"].livingroomthings').remove();
            }

        }

    }else{



        var currentVal = parseInt($('#'+fieldName).val());

        // If it isn't undefined or its greater than 0

        if (!isNaN(currentVal) && currentVal > 1) {

        $('#'+fieldName).val(currentVal - 1);
        newval=currentVal - 1;
        $('#removaltable tbody tr.'+fieldName+' td span.sumThing' ).html(newval);

            // Decrement one
            if(stopoverstep == 0){



                  $('#'+fieldName).val(currentVal - 1);


                  if($('.listStopOver1 .sum'+fieldName).length>0){
                      $('.listStopOver1 .sum'+fieldName).html(currentVal - 1); //Stopovers listofthings
                  }

                }else if(stopoverstep == 1){
                   if($('.listStopOver2 .sum'+fieldName).length>0){
                      $('.listStopOver2 .sum'+fieldName).html(currentVal - 1); //Stopovers listofthings
                  }

                }else if(stopoverstep == 2){
                   if($('.listStopOver3 .sum'+fieldName).length>0){
                      $('.listStopOver3 .sum'+fieldName).html(currentVal - 1); //Stopovers listofthings
                  }

                }else if(stopoverstep == 3){
                   if($('.listStopOver4 .sum'+fieldName).length>0){
                      $('.listStopOver4 .sum'+fieldName).html(currentVal - 1); //Stopovers listofthings
                  }
                }

           

        } else {

            // Otherwise put a 0 there

            $('#'+fieldName).val(1); //0
            if($('.listStopOver1 .sum'+fieldName).length>0){
                $('.listStopOver1 .sum'+fieldName).html(1); //Stopovers listofthings

            }

        }

   }

}



   function qtypluskoutes(fieldName,step){

    boxes= "koutes"+step;
   

 if(fieldName == boxes){

             var currentVal = parseInt($('#'+fieldName).val());

        // If is not undefined

        if (!isNaN(currentVal)) {

                // Increment
            $('div[title="' + fieldName + '"].livingroomthings').remove();

            $('tr.'+fieldName).remove();

              var stepoverhtml = '<div class="livingroomthings" title="' + fieldName + '"><span class="valthings sum' + fieldName + '">1</span><span class="thingname" from="'+stopoverstep+'" to="0"> Κούτες/Τσάντες</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
              
              var tablerow = '<tr class="'+fieldName+'"><td><span class="'+fieldName+' tdTitle" from="'+stopoverstep+'" to="0" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing"></span>  </span>Κούτες/Τσάντες<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';
              // Create lists for stop overs
            if(step== 1){

                $('.listStopOver2').append(stepoverhtml);
                $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                 newboxval=currentVal + 5;
                $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);

                $('#'+fieldName).val(currentVal + 5);

                if($('.listStopOver2 .sum'+fieldName).length>0){
                    $('.listStopOver2 .sum'+fieldName).html(currentVal + 5); //Stopovers listofthings
                   
                }

                var currentVal = parseInt($('#'+fieldName).val());

                if(currentVal == 0){
                    $('.listStopOver2 div[title="' + fieldName + '"].livingroomthings').remove();
                }
          }else if(step== 2){
                $('.listStopOver3').append(stepoverhtml);
                $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                newboxval=currentVal + 5;
                $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);


                $('#'+fieldName).val(currentVal + 5);

                if($('.listStopOver3 .sum'+fieldName).length>0){
                    $('.listStopOver3 .sum'+fieldName).html(currentVal + 5); //Stopovers listofthing     
                }

                var currentVal = parseInt($('#'+fieldName).val());

                if(currentVal == 0){
                    $('.listStopOver3 div[title="' + fieldName + '"].livingroomthings').remove();
                }

          }else if(step== 3){
                 $('.listStopOver4').append(stepoverhtml);
                 $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                  newboxval=currentVal + 5;
                  $('div.table-responsive #removaltable tr.'+fieldName+'  td span span.sumThing').html(newboxval);

                  $('#'+fieldName).val(currentVal + 5);

                  if($('.listStopOver4 .sum'+fieldName).length>0){
                    $('.listStopOver4 .sum'+fieldName).html(currentVal + 5); //Stopovers listofthings

                }

                var currentVal = parseInt($('#'+fieldName).val());

                if(currentVal == 0){
                    $('.listStopOver4 div[title="' + fieldName + '"].livingroomthings').remove();
                }
          }else if(step== 4){
                $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                $('#'+fieldName).val(currentVal + 5);
                newboxval=currentVal + 5;
                $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);


          }



        } else {

            

           $('#'+fieldName).val(1); //0

           if($('.listStopOver'+stopoverstep+' .sum'+fieldName).length>0){
                $('.listStopOver'+stopoverstep+' .sum'+fieldName).html(1); //Stopovers listofthings
            }

            var currentVal = parseInt($('#'+fieldName).val());
            if(currentVal == 0){
                $('.listStopOver'+stopoverstep+' div[title="' + fieldName + '"].livingroomthings').remove();
            }


        }

     }

}


function qtyminuskoutes(fieldName,step){

    boxes= "koutes"+step;

    if(fieldName === boxes){

        var currentVal = parseInt($('#'+fieldName).val());



        // If it isn't undefined or its greater than 0


        if (!isNaN(currentVal) && currentVal > 1) {
            $('div[title="' + fieldName + '"].livingroomthings').remove();
            $('tr.'+fieldName).remove();

            var stepoverhtml = '<div class="livingroomthings" title="' + fieldName + '"><span class="valthings sum' + fieldName + '">1</span><span class="thingname" from="'+stopoverstep+'" to="0"> Κούτες/Τσάντες</span><div class="leavebtn"><img src="leavething.png"/></div></div>';
            var tablerow = '<tr class="'+fieldName+'"><td><span class="'+fieldName+' tdTitle" from="'+stopoverstep+'" to="0" dimh="0.4" dimw="0.5" diml="0.6" pVal="1" lVal="1" ><span class="sumThing"></span>  </span>Κούτες/Τσάντες<br><span class="places"><span class="from"></span><span class="to"></span></span></td><td class="td-ampalaz"><input style="display:none;" class="ampalaz" type="checkbox" aVal="0" value="Θέλω Αμπαλάζ"></td><td class="td-lisimoDesimo"></td><td class="td-Desimo"></td></tr>';
            // Decrement one
            if(step== 1){

                  $('.listStopOver2').append(stepoverhtml);

                  $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                  newboxval=currentVal - 5;
                  $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);
                  
                  $('#'+fieldName).val(currentVal - 5); 

                  if($('.listStopOver2 .sum'+fieldName).length>0){
                      $('.listStopOver2 .sum'+fieldName).html(currentVal - 5); //Stopovers listofthings
                  }

                  var currentVal = parseInt($('#'+fieldName).val());
                  if(currentVal == 0){
                      $('.listStopOver2 div[title="' + fieldName + '"].livingroomthings').remove();
                      $('tr.'+fieldName).remove();

                      if($('tr.'+fieldName+'stopover'+stopoverstep).length > 0){
                        $('tr.'+fieldName+'stopover'+stopoverstep).remove();
                      }
                  }
            }else if(step==2){

                  $('.listStopOver3').append(stepoverhtml);
                   $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                  newboxval=currentVal - 5;
                  $('div.table-responsive #removaltable tr .'+fieldName+' td span span.sumThing').html(newboxval);

                  $('#'+fieldName).val(currentVal - 5); 

                  if($('.listStopOver3 .sum'+fieldName).length>0){
                      $('.listStopOver3 .sum'+fieldName).html(currentVal - 5); //Stopovers listofthings
                  }

                  var currentVal = parseInt($('#'+fieldName).val());
                  if(currentVal == 0){
                      $('.listStopOver3 div[title="' + fieldName + '"].livingroomthings').remove();
                      $('tr.'+fieldName).remove();

                      if($('tr.'+fieldName+'stopover'+stopoverstep).length > 0){
                        $('tr.'+fieldName+'stopover'+stopoverstep).remove();
                      }
                  }

            }else if(step==3){

                  $('.listStopOver4').append(stepoverhtml);
                  $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                  newboxval=currentVal - 5;
                  $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);
                  
                  $('#'+fieldName).val(currentVal - 5); 

                  if($('.listStopOver4 .sum'+fieldName).length>0){
                      $('.listStopOver4 .sum'+fieldName).html(currentVal - 5); //Stopovers listofthings
                  }

                  var currentVal = parseInt($('#'+fieldName).val());
                  if(currentVal == 0){
                      $('.listStopOver4 div[title="' + fieldName + '"].livingroomthings').remove();
                      $('tr.'+fieldName).remove();

                      if($('tr.'+fieldName+'stopover'+stopoverstep).length > 0){
                        $('tr.'+fieldName+'stopover'+stopoverstep).remove();
                      }
                  }

            }else if(step==4){

                    
                  $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);
                  newboxval=currentVal - 5;
                  $('div.table-responsive #removaltable tr.'+fieldName+' td span span.sumThing').html(newboxval);
                  $('#'+fieldName).val(currentVal - 5); 

                  
                  var currentVal = parseInt($('#'+fieldName).val());
                  if(currentVal == 0){
                      $('.listStopOver4 div[title="' + fieldName + '"].livingroomthings').remove();
                      $('tr.'+fieldName).remove();

                      if($('tr.'+fieldName+'stopover'+stopoverstep).length > 0){
                        $('tr.'+fieldName+'stopover'+stopoverstep).remove();
                      }
                  }
            }
            
           

        } else {

            // Otherwise put a 0 there

            $('#'+fieldName).val(0); //0

             if($('.listStopOver'+stopoverstep+' .sum'+fieldName).length>0){
                $('.listStopOver'+stopoverstep+' .sum'+fieldName).html(0); //Stopovers listofthings
            }
            var currentVal = parseInt($('#'+fieldName).val());
            if(currentVal == 0){
                $('tr.'+fieldName+stopoverstep).remove();
                $('.listStopOver'+stopoverstep+' div[title="' + fieldName + '"].livingroomthings').remove();
            }

        }

    }

}




$(document).on('click','div.leavebtn', function(){

 var title= $(this).closest('div.livingroomthings').attr('title');
 var val = $('.listofthings'+stopoverstep+'  div.livingroomthings span.sum'+title).text();

 if(val > 0){
   
    if( $('#removaltable tbody').find('tr.'+title+'stopover'+stopoverstep).length > 0){
     
      newVal1 = $('#removaltable tbody tr.'+title+'stopover'+stopoverstep+' td span.sumThing').html();
      newVal1++;
      $('#removaltable tbody tr.'+title+'stopover'+stopoverstep+' td span.sumThing').html(newVal1);

      $('#removaltable tbody tr.'+title+' td span.sumThing').html(val-1);


       if($('#removaltable tbody tr.'+title+'stopover'+stopoverstep+' td span.sumThing').text() <= 0){
        $('#removaltable tbody tr.'+title+'stopover'+stopoverstep).hide();
        }else{
            $('#removaltable tbody tr.'+title+'stopover'+stopoverstep).show();
        }
      

    }else{
  
      var oldtr=  $('#removaltable tbody').find('tr.'+title).html();
      oldtr= '<tr class="'+title+'">'+oldtr+'</tr>';
      
      $('#removaltable tbody').find('tr.'+title).addClass(title+'stopover'+stopoverstep);

      $('#removaltable tbody').find('tr.'+title).removeClass(title);

      $(oldtr).insertBefore('tr.'+title+'stopover'+stopoverstep);
      //$('div.table-responsive #removaltable > tbody:last-child').append(oldtr);


      $('#removaltable tbody tr.'+title+'stopover'+stopoverstep+' td span.sumThing').html('1');

      $('#removaltable tbody tr.'+title+'stopover'+stopoverstep+' td span.'+title ).attr('to',stopoverstep);

      newVal=val-1;

       $('#removaltable tbody tr.'+title+' td span.sumThing').html(newVal);
     
    }

    if($('#removaltable tbody tr.'+title+' td span.sumThing').text() <= 0){
        $('#removaltable tbody tr.'+title).hide();
    }else{
        $('#removaltable tbody tr.'+title).show();
    }






    if($('.listofthingsleave'+stopoverstep).find('div[title="'+title+'"]').length > 0){
     sumleaves = $('.listofthingsleave'+stopoverstep+' div[title="'+title+'"] span.sum'+title).text();
     
      sumleaves++; 
      $('.listofthingsleave'+stopoverstep+' div[title="'+title+'"] span.sum'+title).html(sumleaves);


      

    }else{
       var thing=  $(this).closest('div.livingroomthings').html();
       thing= '<div class="livingroomthings" title="'+title+'">'+thing+'<div class="remove-thing-list" onclick="removeThingsForStopList('+stopoverstep+',\''+title+'\')">X</div></div>';
       $('.listofthingsleave'+stopoverstep).append(thing);
       $('.listofthingsleave'+stopoverstep+' div[title="'+title+'"] span.thingname').attr('to',stopoverstep);


     
       $('.listofthingsleave'+stopoverstep+'  div[title="'+title+'"] span.sum'+title).html('1');

    }

    newVal=val-1;
    for(var i=1; i<=num_stopover; i++){    
        $(' .listofthings'+i+' div[title="'+title+'"] span.sum'+title).html(newVal);
    }

 }

});

function removeThingsForStopList(step,title){
 



var val= $('.listofthingsleave'+step+' div[title="'+title+'"] span.valthings').text();



if(val>0){

      newval=val-1;
      $('.listofthingsleave'+step+' div[title="'+title+'"] span.valthings').html(newval);

      oldval= $('.listofthings'+step+' div[title="'+title+'"] span.sum'+title).html();
      oldval++;
      for(var i=1; i<=num_stopover; i++){    
            $('.listofthings'+i+' div[title="'+title+'"] span.sum'+title).html(oldval);
      }

      if(newval <= 0){
       $('.listofthingsleave'+step+' div[title="'+title+'"]').remove();
      }
  }

 // if( $('#removaltable tbody').find('tr.'+title+'stopover'+step).length > 0){

      newValtr1 = $('#removaltable tbody tr.'+title+'stopover'+step+' td span.sumThing').html();
      newValtr1 = newValtr1-1;
     // alert(newValtr1);
      $('#removaltable tbody tr.'+title+'stopover'+step+' td span.sumThing').html(newValtr1);

      newValtr=$('#removaltable tbody tr.'+title+' td span.sumThing').html(); 
      newValtr= parseInt(newValtr) + 1 ;
     // alert(newValtr);
      $('#removaltable tbody tr.'+title+' td span.sumThing').html(newValtr); 

      if(newValtr1 <= 0){
        $('#removaltable tbody tr.'+title+'stopover'+step).hide();
      }else{
        $('#removaltable tbody tr.'+title+'stopover'+step).show();
      }

      if(newValtr <= 0){
         $('#removaltable tbody tr.'+title).hide();
      }else{
        $('#removaltable tbody tr.'+title).show();
      }

  //}else{

 // }


}


$( "#inputBudget" ).keyup(function() {
  var newprice=$('#inputBudget').val();
  var newcomm= 0.3*newprice;
  newcomm= newcomm.toFixed(0);
  $('#inputComission').val(newcomm);

  if($('.newprice').length >0){
   $('.newprice').html(newprice);

   $('.newcommision').html(newcomm);
  }

});


$( "#inputComission" ).keyup(function() {
  var newcom=$('#inputComission').val();
  if($('.newcommision').length >0){
    $('.newcommision').html(newcom);
  }

});


$(document).on('click','#oldExternalLift', function(){

  $('div.msg-red').toggle();

});

$(document).on('click','#newExternalLift', function(){

  $('div.msg-red-n').toggle();

});


$(document).on('click','#stopover1ExternalLift', function(){

  $('div.msg-red-1').toggle();

});

$(document).on('click','#stopover2ExternalLift', function(){

  $('div.msg-red-2').toggle();

});



$(document).on('click','#stopover3ExternalLift', function(){

  $('div.msg-red-3').toggle();

});

$(document).on('click','#stopover4ExternalLift', function(){

  $('div.msg-red-4').toggle();

});



