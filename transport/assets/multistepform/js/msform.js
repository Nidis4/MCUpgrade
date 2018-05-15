

//jQuery time

var current_fs, next_fs, previous_fs; //fieldsets

var left, opacity, scale; //fieldset properties which we will animate

var animating; //flag to prevent quick multi-click glitches







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

    var email = false;

    var phone = false;





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



    if(emailLenght>0){

        email = true;

        $('#email').css('border','1px solid #00ff10');



    }else{

       email = false;

        $('#email').css('border','1px solid red');

    }



    if(phoneLenght == 10){

        phone = true;

        $('#tel').css('border','1px solid #00ff10');



    }else{

        phone = false;

        $('#tel').css('border','1px solid red');



    }

  





     if(form && to && email && phone){



          if ($(window).width() < 990) {

           $('div.col-map').css('display','none');

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


          var first_stop_over=" ";
          var second_stop_over = " ";
          var stop_over=" ";

          if($("input#to1").val().length == 0){
            first_stop_over= "Δεν υπάρχει ενδιάμεση στάση";
          }else{
            first_stop_over= $("input#to1").val();
          }

           if($("input#to2").val().length == 0){
             second_stop_over= "Δεν υπάρχει ενδιάμεση στάση";
          }else{
             second_stop_over= $("input#to2").val();
          }

          stop_over=" 1ηΣτάση " + first_stop_over + " | " + " 2ηΣτάση " + second_stop_over;

         

         if(!jQuery("input.next").hasClass("done")){



              form = jQuery("input#from").val();

              to = jQuery("input#to").val();

              email= jQuery("input#email").val();

              phone = jQuery("input#tel").val(); 

              

             jQuery.ajax({

                  type:"POST",

                  url:"https://myconstructor.gr/transport/contacts.php",

                  data:{form,to,email,phone,stop_over},

                  success: function(data){

                     console.log(data);

                     jQuery("input.next").addClass("done"); 

                     // jQuery(".submit-msg").text("Θα επικοινωήσουμε σύντομα μαζί σας!");

                   //  jQuery(".submit-msg").css("color","green");

                 }



             })

           }



  }

});







$("#step2btn").click(function(){



   var removalType = $("select#type option:selected").attr('myVal');

   var done=false;



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



          if(oldDistance == -1 || fromFloor == -1 || fromLift == -1 || newDistance == -1 || toFloor == -1 || toLift == -1 ){

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



              if(fromLift == -1){

                   $('select#from_lift').css('border','1px solid red');

              }else{

                  $('select#from_lift').css('border','1px solid #00ff10');

              }



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



              if(toLift == -1){

                 $('select#to_lift').css('border','1px solid red');

              }else{

                 $('select#to_lift').css('border','1px solid #00ff10');

              } 



          }else{

              done=true;

              $('select#old-home-distance, select#from_floor, select#from_lift, select#new-home-distance, select#to_floor, select#to_lift').css('border','1px solid #00ff10');

          }

   }else{

      done=false;

      $('select#type').css('border','1px solid red');

   }





   if(done){

      

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



 if($(".rowThings input.qty").length > 0 || $("input#koutes").val() > 0 ){



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



$("#step4btn").click(function(){

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

        var first_stop_over=" ";
        var second_stop_over = " ";
        var stop_over=" ";

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



         

          if($("input#to1").val().length == 0){
            first_stop_over= "Δεν υπάρχει ενδιάμεση στάση";
          }else{
            first_stop_over= $("input#to1").val();
          }

           if($("input#to2").val().length == 0){
             second_stop_over= "Δεν υπάρχει ενδιάμεση στάση";
          }else{
             second_stop_over= $("input#to2").val();
          }

          stop_over=" 1ηΣτάση " + first_stop_over + " | " + " 2ηΣτάση " + second_stop_over;







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



        jQuery.ajax({

                  type:"POST",

                  url:"https://myconstructor.gr/transport/offer.php",

                  data:{fromAddress,toAddreess,email,tel,selectService,oldHouseRange,oldFloor,oldLift,oldHighRoad,oldExternalLift,newHouseRange,newFloor,newLift,newHighRoad,newExternalLift,myThings,variaAntikeimena,antikeimenaAksias,myDate,userMsg,professional,profName,profSurName,stop_over},

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

             })

     }

});



function storeTblValues(){

          var TableData = new Array();

          var ampalaz;

          var lisimoDesimo;



          $('#removaltable tr').each(function(row, tr){



                if(!jQuery(this).is('.koutes-tsantes')){

                    if(jQuery(this).find('td:eq(2) input').length > 0){

                      

                        if(jQuery(this).find('td:eq(1) input').is(':checked')){

                          ampalaz ="Θέλω αμπαλάζ";

                        }else{

                          ampalaz=" ";

                        }



                        if(jQuery(this).find('td:eq(2) input').is(':checked')){

                          lisimoDesimo = "Θέλω Λύσιμο/Δέσιμο";

                        }else{

                          lisimoDesimo = " ";

                        }





                        TableData[row]={

                            "things" : $(tr).find('td:eq(0)').text()

                            , "ampalaz" : ampalaz

                            , "lisimoDesimo" : lisimoDesimo

                        }



                    }else{

                      if(jQuery(this).find('td:eq(1) input').is(':checked')){

                              ampalaz ="Θέλω αμπαλάζ";

                            }else{

                              ampalaz=" ";

                            }



                      TableData[row]={

                            "things" : $(tr).find('td:eq(0)').text()

                            , "ampalaz" : ampalaz

                            , "lisimoDesimo" : " "

                        }



                  }

              }else{

                TableData[row]={

                        "things" : $(tr).find('td:eq(0)').text()

                        , "ampalaz" : " "

                        , "lisimoDesimo" : " "

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



$(".submit").click(function(){

  return false;

})









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



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';

    



    if ( title === "DiningTableWood" || title === "DiningTableGlass" || title === "ShelvingUnitsSystems" || title === "Library" ) {

    

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" value="Θέλω Λύσιμο Δέσιμο" /></td></tr>';

    

    }else{

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td></tr>';

    }



   



    $('.LivingRoomList').append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();

  } else {

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    var ret = $(".hida");

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



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';

   

     if ( title === "DoubleBed" ) {

      

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" value="Θέλω Λύσιμο Δέσιμο" /></td></tr>'; 

         

    }else{

       var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td></tr>'; 

    }

    



    $('.BedRoomsList').append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();

  } else {

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    var ret = $(".hida");

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

var labelname= $("label[name="+ title +"]").text();



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';





    var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td></tr>'; 

   

    $('.KitchenList').append(html);

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);

   // $(".hida").hide();

  } else {

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    var ret = $(".hida");

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



  if ($(this).is(':checked')) {

    var html = '<div class="livingroomthings" title="' + title + '"><input type="button" value="-" onclick="qtyminus(\'' + title + '\')" class="qtyminus"  field="' + title + '" /><input type="text" id="' + title + '" value="1" class="qty" /> <input onclick="qtyplus(\'' + title + '\')"  type="button" value="+" class="qtyplus" field="' + title + '" /> <span>x ' + labelname + '</span></div>';

    



    if ( title === "Wardrobe" || title === "Desk" ) {

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"><input class="synarm-checkbox" type="checkbox" value="Θέλω Λύσιμο Δέσιμο" /></td></tr>';  

   

    }else{

        var tablerow =  '<tr class="' + title + '"><td><span class="' + title + ' tdTitle"></span> ' + labelname + '</td><td class="td-ampalaz"><input class="ampalaz" type="checkbox" value="Θέλω Αμπαλάζ" /></td><td class="td-lisimoDesimo"></td></tr>';  

    }

    

    $('div.table-responsive #removaltable > tbody:last-child').append(tablerow);



    $('.OtherThingsList').append(html);

   // $(".hida").hide();

  } else {

    $('div[title="' + title + '"]').remove();

    $('#removaltable .'+ title).remove();

    var ret = $(".hida");

   // $('.dropdown dt a').append(ret);



  }

});







