<?php
// required header
$catId = $_GET['cat_id'];

include_once '../config/database.php';
include_once '../objects/category.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);
$category->category_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : die();
 
// query categorys
$stmt = $category->readByCategoryPrice();
$num = $stmt->rowCount();

// For Electrical Certificates
if($catId == "60"){ // Electrical Certificate
    
    if($num>0){
        $prices =  array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $prices[$row['pkey']] = $row['pvalue'];
        }

    }

    
?>
    <label class="col-lg-3 control-label text-lg-right pt-2">Πόσα τετραγωνικά μέτρα είναι το ακίνητο;  </label>
    <div class="col-lg-9"><input class="form-control" type="number" name="buildingmtwo" id="buildingmtwo" /></div>

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
                var vale = $('#buildingmtwo').val();
                var country = $("#county").val();
                if(country == 1){
                    if(vale >= 1 && vale <= 30){
                        $("#countrybudget").val('<?php echo $prices['1-30m2_attica'];?>');
                    }else if(vale >= 31 && vale <= 100){
                        $("#countrybudget").val('<?php echo $prices['30-100m2_attica'];?>');
                    }else if(vale >= 101 && vale <= 150){
                        $("#countrybudget").val('<?php echo $prices['100-150m2_attica'];?>');
                    }else if(vale >= 151 && vale <= 200){
                        $("#countrybudget").val('<?php echo $prices['150-200m2_attica'];?>');
                    }else if(vale >= 201){
                        var zbud = <?php echo $prices['150-200m2_attica'];?> + ((parseFloat(vale) - 200) * 0.3);
                        $("#countrybudget").val(zbud);
                    }
                    
                }else if(country == 2){
                    if(vale >= 1 && vale <= 30){
                        $("#countrybudget").val('<?php echo $prices['1-30m2_thessaloniki'];?>');
                    }else if(vale >= 31 && vale <= 100){
                        $('#countrybudget').val('<?php echo $prices['30-100m2_thessaloniki'];?>');
                    }else if(vale >= 101 && vale <= 150){
                        $('#countrybudget').val('<?php echo $prices['100-150m2_thessaloniki'];?>');
                    }else if(vale >= 151 && vale <= 200){
                        $('#countrybudget').val('<?php echo $prices['150-200m2_thessaloniki'];?>');
                    }else if(vale >= 201){
                        var zbud = <?php echo $prices['150-200m2_thessaloniki'];?> + ((parseFloat(vale) - 200) * <?php echo $prices['charge_for_extra_m2_over_200'];?>);
                        $('#countrybudget').val(zbud);
                    }
                    
                }
                update_budget();
                update_comment();
        }
        $(document).ready(function(){

            
            
            $("#buildingmtwo").on('change',function(){
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
                   var sd = '<?php echo $prices['3phase'];?>';               
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
                   var epBudget = '<?php echo $prices['install_electrical_panel_for_single_phase'];?>';
                   $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '<?php echo $prices['install_electrical_panel_for_single_phase'];?>' +' €'); 
                   var rvale1 = $('.ElectricalCertificatebedStatus').val(); 
                   if(rvale1 == "YES"){ 
                        epBudget = '<?php echo $prices['install_electrical_panel_for_3phase'];?>';
                        $("#epBudget").attr('rel','Εγκατάσταση νέου πίνακα '+ '<?php echo $prices['install_electrical_panel_for_3phase'];?>' +' €');
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
                    $("#volBudget").val('<?php echo $prices['rele_install_single_phase'];?>');
                }else{
                    $("#volBudget").val('0');
                }

                update_budget();
                update_comment();
           });




        });
    </script>
    
<?php }else if($catId == "43"){ // Energy Certificate


    if($num>0){
        $prices =  array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $prices[$row['pkey']] = $row['pvalue'];
        }

    }
?>
        <!-- How many m2 are the building ? (greek: Πόσα μ2 είναι το ακινητό σας?) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">Πόσα μ2 είναι το ακινητό σας? </label>
        <div class="col-lg-9"><input class="form-control" type="number" name="buildingmtwo" id="buildingmtwo" /></div>

        <!-- Do you have building drawing? (greek: Έχετε κάτοψη του ακινήτου? ) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε κάτοψη του ακινήτου?  </label>
        <div class="col-lg-9 row">
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="buildingdrawingstatus" type="radio" name="buildingdrawingstatus" value="YES" id="buildingdrawingstatusyes">
                        YES
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="buildingdrawingstatus" type="radio" name="buildingdrawingstatus" value="NO" id="buildingdrawingstatusno">
                        NO
                    </label>
                </div>
            </div>
            <div class="col-lg-12 pt-2 buildingdrawingstatusYes"></div>
            <input type="hidden" name="buildingdrawingbudget" id="buildingdrawingbudget" rel="" value="0">            
        </div>

        <!-- Is the building built after 1983? (greek: το ακίνητο είναι χτισμένο μέτα το 1983?) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">το ακίνητο είναι χτισμένο μέτα το 1983?  </label>
        <div class="col-lg-9 row">
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="buildingbuiltstatus" type="radio" name="buildingbuiltstatus" value="YES" id="buildingbuiltstatusyes">
                        YES
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="buildingbuiltstatus" type="radio" name="buildingbuiltstatus" value="NO" id="buildingbuiltstatusno">
                        NO
                    </label>
                </div>
            </div>
            <div class="col-lg-12 pt-2 buildingbuiltstatusYes"></div>            
        </div>

        <!-- Do you have available E9 of the owner ?  Greek (Έχετε διαθέσιμο το Ε9 του ιδιοκτήτη?) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε διαθέσιμο το Ε9 του ιδιοκτήτη?  </label>
        <div class="col-lg-9 row">
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="availableownerstatus" type="radio" name="availableownerstatus" value="YES" id="availableownerstatusyes">
                        YES
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="availableownerstatus" type="radio" name="availableownerstatus" value="NO" id="availableownerstatusno">
                        NO
                    </label>
                </div>
            </div>
            <div class="col-lg-12 pt-2 availableownerstatusYes"></div>            
        </div>
        <div class="col-lg-12">
            <div class="alert alert-info nomargin">
                <p>Να σας ενημερώσω για την διαδικασία, έρχεται ο μηχανικός κάνει την αυτοψία, φωτογραφίζει τα έγγραφα δεν θα πάρουμε αντίγραφα, θα πληρωθεί επι τόπου και θα σας στείλει με email το πιστοποιητικο σε 1-3 εργάσιμες</p>
            </div>     
        </div>
              

        <!-- Javascript Code -->
        <script type="text/javascript">

            function update_comment(){
                var cmt;
                var dfgdcomment = $("#buildingmtwo").val()+'m2';
                var epBudget = $("#buildingdrawingbudget").attr('rel');

                cmt = dfgdcomment + ' ' + epBudget;

                var samecatebud = $("#samecatebud").val();

                if(samecatebud >= 2){
                    cmt = samecatebud+" X \n" + cmt;                
                }
                $("#comment123").val(cmt);
            }
     
            function update_budget(){

                //var  bud = $("#budget").val();
                var  cbud = 0;
                var  dbud = 0;
               

                if($("#countrybudget").length){ cbud = $("#countrybudget").val();}
                if($("#buildingdrawingbudget").length){ dbud = $("#buildingdrawingbudget").val();}
               
                var totalbud = parseFloat(cbud) + parseFloat(dbud);
                var samecatebud = $("#samecatebud").val();
                if(samecatebud >= 2){
                    totalbud = samecatebud * totalbud;                
                }

                $("#budget").val(totalbud);
            }
            function ElectricalCertificateCountyBudget(){
                // Add Budget
                    var vale = $('#buildingmtwo').val();
                    var country = $("#county").val();
                    if(country == 1){
                        if(vale >= 1 && vale <= 30){
                            $("#countrybudget").val('<?php echo $prices['1-30m2_attica'];?>');
                        }else if(vale >= 31 && vale <= 100){
                            $("#countrybudget").val('<?php echo $prices['30-100m2_attica'];?>');
                        }else if(vale >= 101 && vale <= 150){
                            $("#countrybudget").val('<?php echo $prices['100-150m2_attica'];?>');
                        }else if(vale >= 151 && vale <= 200){
                            $("#countrybudget").val('<?php echo $prices['150-200m2_attica'];?>');
                        }else if(vale >= 201){
                            var zbud = <?php echo $prices['150-200m2_attica'];?> + ((parseFloat(vale) - 200) * <?php echo $prices['charge_for_extra_m2_over_200'];?>);
                            $("#countrybudget").val(zbud);
                        }
                        
                    }else if(country == 2){
                        if(vale >= 1 && vale <= 100){
                            $("#countrybudget").val('<?php echo $prices['1-100m2_thessaloniki'];?>');
                        }else if(vale >= 101 && vale <= 150){
                            $("#countrybudget").val('<?php echo $prices['100-150m2_thessaloniki'];?>');
                        }else if(vale >= 151 && vale <= 200){
                            $("#countrybudget").val('<?php echo $prices['150-200m2_thessaloniki'];?>');
                        }else if(vale >= 201){
                            var zbud = <?php echo $prices['150-200m2_thessaloniki'];?> + ((parseFloat(vale) - 200) * <?php echo $prices['charge_for_extra_m2_over_200'];?>);
                            $("#countrybudget").val(zbud);
                        }
                        
                    }
                    update_budget();
                    update_comment();
            }

            $(document).ready(function(){
                // 
                $("#buildingmtwo").on('change',function(){
                    var vale = $(this).val();
                    var country = $("#county").val();
                    $("#countrybudget").val('0');
                    ElectricalCertificateCountyBudget();
                });


                //
                $(".buildingdrawingstatus").on('change',function(){
                    var rvale = $(this).val();  

                    if(rvale == "YES"){
                       $(".buildingdrawingstatusYes").text('Παρακαλώ να έχετε μαζί σας στο ραντεβού την κάτοψη'); 
                       $("#buildingdrawingbudget").val('0');
                       $("#buildingdrawingbudget").attr('rel','Έχει κάτοψη');
                    }else{
                        
                        var vale = $('#buildingmtwo').val();
                         
                        if(vale >= 1 && vale <= 75){
                            $("#buildingdrawingbudget").val('<?php echo $prices['1-75_building_drawing'];?>');
                        }else if(vale >= 76 && vale <= 100){
                            $("#buildingdrawingbudget").val('<?php echo $prices['76-100_building_drawing'];?>');
                        }else if(vale >= 101 && vale <= 150){
                            $("#buildingdrawingbudget").val('<?php echo $prices['101-150_building_drawing'];?>');
                        }else if(vale >= 151 && vale <= 200){
                            $("#buildingdrawingbudget").val('<?php echo $prices['151-200_building_drawing'];?>');
                        }else if(vale >= 201){
                            var zbud = <?php echo $prices['151-200_building_drawing'];?> + (((parseFloat(vale) - 200)/100) * 10);
                            $("#buildingdrawingbudget").val(zbud);
                        }

                        $(".buildingdrawingstatusYes").text('κάτοψη + '+ $("#buildingdrawingbudget").val() +' €'); 
                        
                        $("#buildingdrawingbudget").attr('rel','κάτοψη + '+ $("#buildingdrawingbudget").val() +' €');
                        //alert($("#buildingdrawingbudget").val());
                    }
                    update_budget();
                    update_comment();
               });


                $(".buildingbuiltstatus").on('change',function(){
                    var rvale = $(this).val();                
                    if(rvale == "YES"){
                       $(".buildingbuiltstatusYes").text('Παρακαλώ να έχετε τον αριθμό αδείας διαθέσιμο'); 
                    }else{
                        $(".buildingbuiltstatusYes").text(''); 
                    }
               });

                $(".availableownerstatus").on('change',function(){
                    var rvale = $(this).val();                
                    if(rvale == "YES"){
                       $(".availableownerstatusYes").text('Παρακαλώ να έχετε το Ε9 στο ραντεβού'); 
                    }else{
                        $(".availableownerstatusYes").text('Εναλλακτικά με το Ε9 πρέπει να φέρετε το συμβολαιο ιδιοκτησίας, γονική παροχή ή οποιοδήποτε επίσημο έγγραφο που να φαίνεται ο ιδιοκτήτης'); 
                    }
               });


            });
        </script>
<?php
}else if($catId == "109"){ // Marbles

        if($num>0){
            $prices =  array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $prices[$row['pkey']] = $row['pvalue'];
            }

        }
?>
        <!-- How many m2 is the surface that we are going to shoe(greek:Ποσα τετραγωνικά είναι η επιφάνεια που θα γυαλίσουμε;) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">Ποσα τετραγωνικά είναι η επιφάνεια που θα γυαλίσουμε </label>
        <div class="col-lg-9"><input class="form-control" type="number" name="buildingmtwo" id="buildingmtwo" /></div>
        <input type="hidden" name="buildingmtwobudget" id="buildingmtwobudget" value="0">
        <!-- Javascript Code -->
        <script type="text/javascript">

            function update_comment(){
                var cmt;
                //var dfgdcomment = $("#buildingmtwo").val()+'m2';
                //var epBudget = $("#buildingdrawingbudget").attr('rel');

                //cmt = dfgdcomment + ' ' + epBudget;

                var samecatebud = $("#samecatebud").val();

                if(samecatebud >= 2){
                    cmt = samecatebud+" X \n" + cmt;                
                }
                $("#comment123").val(cmt);
            }
     
            function update_budget(){

                //var  bud = $("#budget").val();
                var  mbud = 0;

                if($("#buildingmtwobudget").length){ mbud = $("#buildingmtwobudget").val();}
                
                var totalbud = parseFloat(mbud);
                
                var samecatebud = $("#samecatebud").val();

                if(samecatebud >= 2){
                    totalbud = samecatebud * totalbud;                
                }

                $("#budget").val(totalbud);
            }
            

            $(document).ready(function(){
                // 
                $("#buildingmtwo").on('change',function(){
                    var vale = $(this).val();                    
                    var mul = parseFloat(vale) * <?php echo $prices['multiple_m2_by'];?>;

                    if(mul <= (<?php echo $prices['minimum_multiply_value'];?> - 1)){
                        mul = <?php echo $prices['minimum_multiply_value'];?>;
                    }

                    $("#buildingmtwobudget").val(mul);
                    update_budget();
                    update_comment();
                });
         });
        </script>
<?php
} else if($catId == "57"){ // Air Condition 
    ?>

    <!-- How many aircondition of 9000 and/or 12000 btu do you have(greek:Πόσα κλιματιστικά έχετε που είναι 9000btu-12000btu;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα κλιματιστικά έχετε που είναι 9000btu-12000btu;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id="totalac">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control totalac" value="0" maxlength="3" readonly name="totalac">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
    </div>

    <!-- 1a How many of them do you want to maintain(greek:Πόσα από αυτά είναι για συντήρηση)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για συντήρηση?</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='maintainac'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control maintainac" value="0" maxlength="3" readonly name="maintainac">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        
    </div>

    <!-- 1b How many of them do you want to uninstall(greek: Ποσα απο αυτά ειναι για απεγκατάσταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Ποσα απο αυτά ειναι για απεγκατάσταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='uninstallac'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control uninstallac" value="0" maxlength="3" readonly name="uninstallac">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        
    </div>

    <!-- 1c How many of them do you want to install(greek: Πόσα από αυτά είναι για εγκατασταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για εγκατασταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='installac'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control installac" value="0" maxlength="3" readonly name="installac">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        
    </div>

    <script type="text/javascript">

            function update_comment(){
                var cmt = "";
                //var dfgdcomment = $("#buildingmtwo").val()+'m2';
                //var epBudget = $("#buildingdrawingbudget").attr('rel');

                if($(".maintainac").length){ 
                    var manval = parseInt($(".maintainac").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 9000 ή 12000 btu για συντηρηση";
                    }
                }

                if($(".uninstallac").length){ 
                    var manval = parseInt($(".uninstallac").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 9000 ή 12000btu για απεγκατασταση";
                    }
                }

                if($(".installac").length){ 
                    var manval = parseInt($(".installac").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 9000 ή 12000 btu για εγκατασταση";
                    }
                }

                //cmt = dfgdcomment + ' ' + epBudget;

                var samecatebud = $("#samecatebud").val();

                if(samecatebud >= 2){
                    cmt = samecatebud+" X \n" + cmt;                
                }
                $("#comment123").val(cmt);
            }
     
            function update_budget(){

                //var  bud = $("#budget").val();
                var  mbud = 0;
                var  totalbud = 0;
                var  manval = 0;

                // 1a
                if($(".maintainac").length){ 
                    manval = parseInt($(".maintainac").val());
                    if(manval >= 1){
                        mbud = manval * 15;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //1b
                if($(".uninstallac").length){ 
                    manval = parseInt($(".uninstallac").val());
                    if(manval >= 1){
                        mbud = manval * 20;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //1c
                if($(".installac").length){ 
                    manval = parseInt($(".installac").val());
                    if(manval >= 1){
                        mbud = manval * 50;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }
                

                
                var samecatebud = $("#samecatebud").val();

                if(samecatebud >= 2){
                    totalbud = samecatebud * totalbud;                
                }

                $("#budget").val(totalbud);
            }
            

            $(document).ready(function(){
                $('.spinner-down').on('click',function(){
                    var sid = $(this).parent().parent().attr('id');

                    var valu = parseInt($("#"+sid+" input."+sid).val());

                    if(valu >= 1){
                        $("#"+sid+" input."+sid).val(valu - 1);    
                    }
                    
                    update_budget();
                    update_comment();
                });

                $('.spinner-up').on('click',function(){
                    var sid = $(this).parent().parent().attr('id');

                    var valu = parseInt($("#"+sid+" input."+sid).val());

                    if(valu >= 0){
                        
                        $("#"+sid+" input."+sid).val(valu + 1); 
                    }

                    update_budget();
                    update_comment();
                    
                });
            });

<?php } ?>