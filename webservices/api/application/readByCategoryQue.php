<?php
// required header
$catId = $_GET['cat_id'];

// For Electrical Certificates
if($catId == "60"){
?>
    <input type="hidden" name="ElectricalPanelNamesecond1" value="" class="ElectricalPanelNamesecondccc">
    <input type="hidden" name="ElectricalPanelNamesecond11" value="" class="ElectricalPanelNamesecondccc1">
    <input type="hidden" name="ElectricalPanelNamesecond2" value="" class="ElectricalPanelNamesecondcc2">

    <label class="col-lg-3 control-label text-lg-right pt-2">Πόσα τετραγωνικά μέτρα είναι το ακίνητο;  </label>
    <div class="col-lg-9"><input class="form-control" type="number" name="data[Appointment][par]" id="ElectricalCertificateCategory1" /></div>

    <!-- Display if m2 greater than 80 -->
    <label class="col-lg-3 control-label text-lg-right pt-2 MoreThanEightyDisplayNewQuestion" style="display: none">Το ακίνητο είναι μεζονέτα?  </label>
    <div class="col-lg-9 row MoreThanEightyDisplayNewQuestion" style="display: none">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelsecondNewInputName" type="radio" name="ElectricalPanelsecondNewInputName" value="YES" id="ElectricalPanelsecondNewInputId">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelsecondNewInputName" type="radio" name="ElectricalPanelsecondNewInputName" value="NO" id="ElectricalPanelsecondNewInputIdBestDesign">
                    NO
                </label>
            </div>
        </div>
    </div>    

    <!-- Display if Yes -->
    <label class="col-lg-3 control-label text-lg-right pt-2 ElectricalPanelsecondNewInputNameYes" style="display: none">Συνήθως κάθε όροφος έχει ξεχωριστό πίνακα, πόσους πίνακες έχετε?</label>
    <div class="col-lg-9 row ElectricalPanelsecondNewInputNameYes" style="display: none">
        <div data-plugin-spinner data-plugin-options='{ "value":1, "step": 1, "min": 1, "max": 200 }'>
            <div class="input-group">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control" value="1" maxlength="3" readonly>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <input type="hidden" name="spinbudget" id="spinbudget" value="0">
            </div>
        </div>
    </div>

   




    <label class="col-lg-3 control-label text-lg-right pt-2">Το ρεύμα είναι τριφασικό?  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalCertificatebedStatus" type="radio" name="ElectricalCertificatebedStatus" value="YES" id="ElectricalCertificateCategory">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalCertificatebedStatus" type="radio" name="ElectricalCertificatebedStatus" value="NO" id="ElectricalCertificateCategorytriple">
                    NO
                </label>
            </div>
        </div>
        
    </div>

    <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε έναν λογαριασμό της ΔΕΗ ή κάποιου άλλου παρόχου ρεύματος;  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalTagStatus" type="radio" name="ElectricalTagStatus" value="YES" id="ElectricalCertificateCategory">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalTagStatus" type="radio" name="ElectricalTagStatus" value="NO" id="ElectricalCertificateCategorytriple">
                    NO
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 ElectricalTagStatusYes"></div>
    </div>
    <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε ηλεκτρολογικό πίνακα;  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelName" type="radio" name="ElectricalPanelName" value="YES" id="ElectricalPanelId">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelName" type="radio" name="ElectricalPanelName" value="NO" id="ElectricalPanelIdtriple">
                    NO
                </label>
            </div>
        </div>        
    </div>
    <!-- Display if No -->
    <label class="col-lg-3 control-label text-lg-right pt-2 ElectricalPanelNameNo" style="display: none">Θέλετε να εγκαταστήσουμε εμείς τον πίνακα?  </label>
    <div class="col-lg-9 row ElectricalPanelNameNo" style="display: none">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelNamesecond" type="radio" name="ElectricalPanelNamesecond" value="YES" id="ElectricalPanelNamesecond">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalPanelNamesecond" type="radio" name="ElectricalPanelNamesecond" value="NO" id="ElectricalPanelNamesecondBestDesign">
                    NO
                </label>
            </div>
        </div>
    </div> 



    <label class="col-lg-3 control-label text-lg-right pt-2 ElectricalVoltageRelayNameYes">Έχετε ρελέ τάσης διαφυγής;   </label>
    <div class="col-lg-9 row ElectricalVoltageRelayNameYes">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalVoltageRelayNamedf" type="radio" name="ElectricalVoltageRelayName" value="YES" id="ElectricalVoltageRelayID">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="ElectricalVoltageRelayNamedf" type="radio" name="ElectricalVoltageRelayName" value="NO" id="ElectricalVoltageRelayIDa">
                    NO
                </label>
            </div>
        </div>
    </div>


    <label class="col-lg-3 control-label text-lg-right pt-2 ElectricalVoltageRelayNamedfNo" style="display: none;">Θέλετε να εγκαταστήσουμε το ρελέ διαφυγής;   </label>
    <div class="col-lg-9 row ElectricalVoltageRelayNamedfNo" style="display: none;">
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="EltageRelayNamedfNo" type="radio" name="EltageRelayNamedfNo" value="YES" id="">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="EltageRelayNamedfNo" type="radio" name="EltageRelayNamedfNo" value="NO" id="">
                    NO
                </label>
            </div>
        </div>
        <input type="hidden" name="volBudget" id="volBudget" value='0'>
    </div>
    
    <input type="hidden" name="dfgdBudget" id="dfgdBudget" rel="" value='0' style="display: block;">
    <input type="hidden" name="epBudget" id="epBudget" rel="" value='0' style="display: block;">

    <script type="text/javascript">

        function update_comment(){
            var cmt;
            var dfgdcomment = $("#dfgdBudget").attr('rel');
            var epBudget = $("#epBudget").attr('rel');

            cmt = dfgdcomment+ ' ' + epBudget;

            var samecatebud = $("#samecatebud").val();

            if(samecatebud >= 2){
                cmt = samecatebud+" X \n" + cmt;                
            }
            $("#comment123").val(cmt);
        }
 
        function update_budget(){

            //var  bud = $("#budget").val();
            var  cbud = 0;
            var  abud = 0;
            var  sbud = 0;
            var  vbud = 0;
            var  ebud = 0;

            if($("#countrybudget").length){ cbud = $("#countrybudget").val();}
            if($("#dfgdBudget").length){ abud = $("#dfgdBudget").val();}
            if($("#spinbudget").length){ sbud = $("#spinbudget").val();}
            if($("#volBudget").length){ vbud = $("#volBudget").val();}
            if($("#epBudget").length){ ebud = $("#epBudget").val();}
            


            var totalbud = parseFloat(cbud) + parseFloat(sbud) + parseFloat(abud) + parseFloat(vbud) + parseFloat(ebud);

            var samecatebud = $("#samecatebud").val();

            if(samecatebud >= 2){
                totalbud = samecatebud * totalbud;                
            }

            $("#budget").val(totalbud);
        }
        function ElectricalCertificateCountyBudget(){
            // Add Budget
                var vale = $('#ElectricalCertificateCategory1').val();
                var country = $("#county").val();
                if(country == 1){
                    if(vale >= 1 && vale <= 30){
                        $("#countrybudget").val('29');
                    }else if(vale >= 31 && vale <= 100){
                        $("#countrybudget").val('34');
                    }else if(vale >= 101 && vale <= 150){
                        $("#countrybudget").val('44');
                    }else if(vale >= 151 && vale <= 200){
                        $("#countrybudget").val('49');
                    }else if(vale >= 201){
                        var zbud = 49 + ((parseFloat(vale) - 200) * 0.3);
                        $("#countrybudget").val(zbud);
                    }
                    
                }else if(country == 2){
                    if(vale >= 1 && vale <= 30){
                        $("#countrybudget").val('49');
                    }else if(vale >= 31 && vale <= 100){
                        $("#countrybudget").val('54');
                    }else if(vale >= 101 && vale <= 150){
                        $("#countrybudget").val('64');
                    }else if(vale >= 151 && vale <= 200){
                        $("#countrybudget").val('74');
                    }else if(vale >= 201){
                        var zbud = 74 + ((parseFloat(vale) - 200) * 0.3);
                        $("#countrybudget").val(zbud);
                    }
                    
                }
                update_budget();
                update_comment();
        }
        $(document).ready(function(){

            
            
            $("#ElectricalCertificateCategory1").on('change',function(){
                var vale = $(this).val();
                var country = $("#county").val();
                $("#countrybudget").val('0');

                if(vale >= 81){
                   $(".MoreThanEightyDisplayNewQuestion").css('display','inherit'); 
                }else{
                   $(".MoreThanEightyDisplayNewQuestion").css('display','none'); 
                }

                ElectricalCertificateCountyBudget();

            });

           $(".ElectricalTagStatus").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                   $(".ElectricalTagStatusYes").text('Παρακαλώ να έχετε μάζί σας στο ραντεβού ένα λογαριασμό ρεύματος'); 
                }else{
                   $(".ElectricalTagStatusYes").text('Εναλλακτικά,βεβαιωθείτε οτι έχετε αριθμό ρολογιού και αριθμο παροχής'); 
                }
           });

           $(".ElectricalPanelName").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                   $(".ElectricalPanelNameNo").css('display','none'); 
                }else{                   
                   $(".ElectricalPanelNameNo").css('display','inherit'); 
                }
           });

           $(".ElectricalCertificatebedStatus").on('change',function(){
                var rvale = $(this).val(); 

                var epBudget = 0;
                if(rvale == "YES"){ 
                   $("#dfgdBudget").attr('rel','3φασικό');    
                   var sd = 15;               
                   $("#dfgdBudget").val(sd);
                }else{ 
                   $("#dfgdBudget").val('0'); 
                   $("#dfgdBudget").attr('rel','');  
                }

                // if($('.ElectricalPanelNameNo').length){
                //    var rvale1 = $('.ElectricalPanelNamesecond').val(); 
                //    alert(rvale1);
                //    if(rvale1 == "YES" && rvale == "YES"){ 
                //         epBudget = 300;
                //         $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '300' +' €');
                //    }else if(rvale1 == "YES" && rvale == "NO"){
                //         epBudget = 150;
                //         $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '150' +' €');
                //    }else{
                //         epBudget = 0;
                //         $("#epBudget").attr('rel','');
                //    }
                       
                // }
                // $("#epBudget").val(epBudget); 


                update_budget();
                 update_comment();
                   
           });

           

           $(".ElectricalPanelNamesecond").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                   $(".ElectricalVoltageRelayNameYes").css('display','none'); 
                   var epBudget = 150;
                   $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '150' +' €'); 
                   var rvale1 = $('.ElectricalCertificatebedStatus').val(); 
                   if(rvale1 == "YES"){ 
                        epBudget = 300;
                        $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '300' +' €');
                   }
                  
                   $("#epBudget").val(epBudget);
                   
                }else{
                   $("#epBudget").attr('rel','');                   
                   $(".ElectricalVoltageRelayNameYes").css('display','inherit'); 
                   $("#epBudget").val(0);
                }

                update_budget();
                 update_comment();
           });



           $(".ElectricalPanelsecondNewInputName").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                   $(".ElectricalPanelsecondNewInputNameYes").css('display','inherit'); 
                }else{
                   $(".ElectricalPanelsecondNewInputNameYes").css('display','none');
                   var vale = parseInt($('.spinner-input').val());
                   if(vale >= 2){
                        var uvars = (parseInt(vale - 1)) * 34;
                        var newbud = parseFloat($('#spinbudget').val()) - parseInt(uvars);
                        $('#spinbudget').val(newbud);
                   }
                   $('.spinner-input').val('1');
                   update_budget(); 
                   update_comment();
                }
           });

           $(".spinner-buttons .spinner-down").on('click',function(){
                var vale = $('.spinner-input').val();
                if(vale >= 2){
                    var newvale = parseInt(vale) - 1;
                    $('.spinner-input').val(newvale);
                    var newbud = parseFloat($('#spinbudget').val()) - 34;
                    $('#spinbudget').val(newbud);
                }
                update_budget();
                update_comment();
                
           });

           $(".spinner-buttons .spinner-up").on('click',function(){
                var vale = $('.spinner-input').val();
                var newvale = parseInt(vale) + 1;
                $('.spinner-input').val(newvale);
                var upsp = $('.spinner-input').val();
                var upsp = $('.spinner-input').val();
                if(upsp >= 2){
                    var newbud = parseFloat($('#spinbudget').val()) + 34;
                    $('#spinbudget').val(newbud);
                }
                update_budget();
                update_comment();
           });

           
           $(".ElectricalVoltageRelayNamedf").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                    $(".ElectricalVoltageRelayNamedfNo").css('display','none'); 
                }else{
                    $(".ElectricalVoltageRelayNamedfNo").css('display','inherit'); 
                }
           });


           $(".EltageRelayNamedfNo").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                    $("#volBudget").val('70');
                }else{
                    $("#volBudget").val('0');
                }

                update_budget();
                update_comment();
           });




        });
    </script>
    
<?php } ?>