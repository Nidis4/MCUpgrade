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

    <!-- Display if Yes  -->
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
        <!-- The energy certificate will be used for  ) -->
        <label class="col-lg-3 control-label text-lg-right pt-2">The energy certificate will be used for  </label>
        <div class="col-lg-9 row">
            <div class="col-lg-6">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="usedfor" type="radio" name="usedfor" value="forrent" id="usedforrent">
                        Renting/Selling the house
                    </label>
                </div>
            </div>
            <div class="col-lg-6">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="usedfor" type="radio" name="usedfor" value="forsave" id="usedforsave">
                        Εξοικονομώ
                    </label>
                </div>
            </div>
        </div>
        <!-- Do you want to use it for your appartment (bullet) or for the whole block of appartments(bullets)?--> 
        <label class="col-lg-3 control-label text-lg-right pt-2 forsave" style="display: none;">Do you want to use it for  </label>
        <div class="col-lg-9 row forsave" style="display: none;">
            <div class="col-lg-6" style="float: left;">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="usedappartment" type="radio" name="usedappartment" value="forappartment" id="usedappartmentrent">
                        Your appartment
                    </label>
                </div>
            </div>
            <div class="col-lg-6" style="float: right;">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="usedappartment" type="radio" name="usedappartment" value="forblock" id="usedwholeblocksave">
                        The whole block of appartments
                    </label>
                </div>
            </div>
            <input type="hidden" name="usedforbudget" id="usedforbudget" value="0">
        </div>


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
        <label class="col-lg-3 control-label text-lg-right pt-2">Πληρωμή</label>
        <div class="col-lg-9 row">
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="PaymentInfo" type="radio" name="PaymentInfo" value="Επι τόπου" id="">
                        Επι τόπου
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="PaymentInfo" type="radio" name="PaymentInfo" value="Μέσω τραπέζης" id="">
                        Μέσω τραπέζης
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="PaymentInfo" type="radio" name="PaymentInfo" value="Στο γραφείο" id="">
                        Στο γραφείο
                    </label>
                </div>
            </div>
            <div class="col-lg-3">            
                <div class="radio">
                    <label class="pt-3">
                        <input class="PaymentInfo" type="radio" name="PaymentInfo" value="Παράδοση στον πελάτη +10€" id="">
                        Παράδοση στον πελάτη +10€
                    </label>
                </div>
            </div>

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
                var  ubud = 0;
                var  cbud = 0;
                var  dbud = 0;
                
                if($("#usedforbudget").length){ ubud = $("#usedforbudget").val();}


                if($("#countrybudget").length){ cbud = $("#countrybudget").val();}
                if($("#buildingdrawingbudget").length){ dbud = $("#buildingdrawingbudget").val();}

                var rvale = $("input[name='usedfor']:checked"). val();
                if(rvale == "forsave"){
                    var totalbud = parseFloat(ubud);
                }else{
                    var totalbud = parseFloat(cbud) + parseFloat(dbud);
                }
               

                var samecatebud = $("#samecatebud").val();
                if(samecatebud >= 2){
                    totalbud = samecatebud * totalbud;               
                }

                $("#budget").val(totalbud);
            }

            function usedforbudget(){
                var vale = $('#buildingmtwo').val();
                //var rvale = $('.usedfor').val(); 
                var rvale = $("input[name='usedfor']:checked"). val();
                var bud = 0;
                
                if(rvale == "forsave"){
                    var avale = $("input[name='usedappartment']:checked").val();                    
                    if(avale == "forappartment"){
                        bud = 38 + (vale * 1.25);
                        if(bud >= 250){
                            bud = 250;
                        }
                    }else if(avale == "forblock"){
                        bud = 38 + (vale * 0.9);
                        if(bud >= 565){
                            bud = 565;
                        }
                    }
                    $("#usedforbudget").val(bud);
                }else{
                    $("#usedforbudget").val(0);
                }

                update_budget();
                update_comment();

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
                    usedforbudget();
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

                $(".PaymentInfo").on('change',function(){
                    var rvale = $(this).val(); 
                    //alert(rvale);
                    update_comment();
                    
                });

                $(".usedfor").on('change',function(){
                    var rvale = $(this).val(); 
                    //alert(rvale);
                    if(rvale == "forsave"){
                        $('.forsave').css('display','block');
                    }else{
                        $('.forsave').css('display','none');
                    }

                    usedforbudget();
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


    <!-- Do you believe that we are going to need more than 2m of copper tube?  YES   NO  (greek: Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper" type="radio" name="needmorecopper" value="YES" id="needmorecopperyes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper" type="radio" name="needmorecopper" value="NO" id="needmorecopperno">
                    NO
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 needmorecopperinfo"></div>
    </div>

    <!-- How many meters of copper tube are we going to use (greek:Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;)?  default value in box 2 (as 2meters are the minimum) -(box) + -->
    <label class="col-lg-3 control-label text-lg-right pt-2 coppertubemeteryes" style="display: none" >Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;</label>
    <div class="col-lg-5 coppertubemeteryes" style="display: none">
        <div data-plugin-spinner data-plugin-options='{ "value":2, "step": 1, "min": 2, "max": 200 }'>
            <div class="input-group" id='coppertubemeter'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control coppertubemeter coppertubemeteryes" value="2" maxlength="3" readonly name="coppertubemeter">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 coppertubemeteryes" style="display: none">
        
    </div>

    <!--the aircondtion for installation is new or used? New Old (greek: Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation" type="radio" name="acinstallation" value="NEW" id="acinstallationNEW">
                    NEW
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation" type="radio" name="acinstallation" value="OLD" id="acinstallationOLD">
                    OLD
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 acinstallationinfo"></div>
    </div>

    <label class="col-lg-3 control-label text-lg-right pt-2 freonacdisplay" style="display: none"></label>
    <div class="col-lg-9 freonacdisplay" style="display: none"><input class="form-control" type="text" name="freonac" id="freonac" /></div>


    <!-- 2)How many aircondition of 18000 btu do you have(greek:Πόσα κλιματιστικα των 18000btu έχετε;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα κλιματιστικα των 18000btu έχετε;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='acnumber18000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control acnumber18000" value="0" maxlength="3" readonly name="acnumber18000">
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

    <!-- 2a)How many of them do you want to maintain(greek:Πόσα από αυτά είναι για συντήρηση)? - (box) -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για συντήρηση?</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='maintainac18000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control maintainac18000" value="0" maxlength="3" readonly name="maintainac18000">
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

    <!-- 2b How many of them do you want to uninstall(greek: Ποσα απο αυτά ειναι για απεγκατάσταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Ποσα απο αυτά ειναι για απεγκατάσταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='uninstallac18000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control uninstallac18000" value="0" maxlength="3" readonly name="uninstallac18000">
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

    <!-- 2c How many of them do you want to install(greek: Πόσα από αυτά είναι για εγκατασταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για εγκατασταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='installac18000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control installac18000" value="0" maxlength="3" readonly name="installac18000">
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


    <!-- 2ci Do you believe that we are going to need more than 2m of copper tube?  YES   NO  (greek: Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper18000" type="radio" name="needmorecopper18000" value="YES" id="needmorecopper18000yes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper18000" type="radio" name="needmorecopper18000" value="NO" id="needmorecopper18000no">
                    NO
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 needmorecopper18000info"></div>
    </div>

    <!-- How many meters of copper tube are we going to use (greek:Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;)?  default value in box 2 (as 2meters are the minimum) -(box) + -->
    <label class="col-lg-3 control-label text-lg-right pt-2 coppertubemeter18000yes" style="display: none" >Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;</label>
    <div class="col-lg-5 coppertubemeter18000yes" style="display: none">
        <div data-plugin-spinner data-plugin-options='{ "value":2, "step": 1, "min": 2, "max": 200 }'>
            <div class="input-group" id='coppertubemeter18000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control coppertubemeter18000 coppertubemeter18000yes" value="2" maxlength="3" readonly name="coppertubemeter18000">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 coppertubemeter18000yes" style="display: none">
        
    </div>

    <!-- 2ciC the aircondtion for installation is new or used? New Old (greek: Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation18000" type="radio" name="acinstallation18000" value="NEW" id="acinstallation18000NEW">
                    NEW
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation18000" type="radio" name="acinstallation18000" value="OLD" id="acinstallation18000OLD">
                    OLD
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 acinstallation18000info"></div>
    </div>

    <label class="col-lg-3 control-label text-lg-right pt-2 freonacdisplay18000" style="display: none"></label>
    <div class="col-lg-9 freonacdisplay18000" style="display: none"><input class="form-control" type="text" name="freonac18000" id="freonac18000" /></div>

    <!-- 2)How many aircondition of 24000 btu do you have(greek:Πόσα κλιματιστικα των 24000btu έχετε;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα κλιματιστικα των 24000btu έχετε;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='acnumber24000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control acnumber24000" value="0" maxlength="3" readonly name="acnumber24000">
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

    <!-- 2a)How many of them do you want to maintain(greek:Πόσα από αυτά είναι για συντήρηση)? - (box) -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για συντήρηση?</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='maintainac24000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control maintainac24000" value="0" maxlength="3" readonly name="maintainac24000">
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

    <!-- 2b How many of them do you want to uninstall(greek: Ποσα απο αυτά ειναι για απεγκατάσταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Ποσα απο αυτά ειναι για απεγκατάσταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='uninstallac24000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control uninstallac24000" value="0" maxlength="3" readonly name="uninstallac24000">
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

    <!-- 2c How many of them do you want to install(greek: Πόσα από αυτά είναι για εγκατασταση;)? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πόσα από αυτά είναι για εγκατασταση;</label>
    <div class="col-lg-5 " >
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='installac24000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control installac24000" value="0" maxlength="3" readonly name="installac24000">
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


    <!-- 2ci Do you believe that we are going to need more than 2m of copper tube?  YES   NO  (greek: Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πιστεύετε ότι θα χρειαστεί παραπάνω από 2 μέτρα χαλκοσωλήνα?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper24000" type="radio" name="needmorecopper24000" value="YES" id="needmorecopper24000yes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="needmorecopper24000" type="radio" name="needmorecopper24000" value="NO" id="needmorecopper24000no">
                    NO
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 needmorecopper24000info"></div>
    </div>

    <!-- How many meters of copper tube are we going to use (greek:Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;)?  default value in box 2 (as 2meters are the minimum) -(box) + -->
    <label class="col-lg-3 control-label text-lg-right pt-2 coppertubemeter24000yes" style="display: none" >Πόσα μέτρα χαλκοσωλήνα πρόκειται να χρησιμοποιήσουμε για την εγκατάσταση του κλιματιστικού;</label>
    <div class="col-lg-5 coppertubemeter24000yes" style="display: none">
        <div data-plugin-spinner data-plugin-options='{ "value":2, "step": 1, "min": 2, "max": 200 }'>
            <div class="input-group" id='coppertubemeter24000'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control coppertubemeter24000 coppertubemeter24000yes" value="2" maxlength="3" readonly name="coppertubemeter24000">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 coppertubemeter24000yes" style="display: none">
        
    </div>

    <!-- 2ciC the aircondtion for installation is new or used? New Old (greek: Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο? -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Το κλιματιστικό που θα εγκατασταθεί είναι καινούργιο ή μεταχειρισμένο?  </label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation24000" type="radio" name="acinstallation24000" value="NEW" id="acinstallation24000NEW">
                    NEW
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="acinstallation24000" type="radio" name="acinstallation24000" value="OLD" id="acinstallation24000OLD">
                    OLD
                </label>
            </div>
        </div>
        <div class="col-lg-12 pt-2 acinstallation24000info"></div>
    </div>

    <label class="col-lg-3 control-label text-lg-right pt-2 freonacdisplay24000" style="display: none"></label>
    <div class="col-lg-9 freonacdisplay24000" style="display: none"><input class="form-control" type="text" name="freonac24000" id="freonac24000" /></div>

<!-- 4)Do you have cradles(greek:Έχετε βάσεις για το κλιματιστικο;)?   YES   NO  I DONT KNOW -->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Έχετε βάσεις για το κλιματιστικο;</label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="cradlesstatus" type="radio" name="cradlesstatus" value="YES" id="cradlesstatusYes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="cradlesstatus" type="radio" name="cradlesstatus" value="NO" id="cradlesstatusNo">
                    NO
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="cradlesstatus" type="radio" name="cradlesstatus" value="I DONT KNOW" id="cradlesstatusNo">
                    I DONT KNOW
                </label>
            </div>
        </div>
        <div class="col-lg-12 cradlesstatusinfo"></div>
    </div>

    <!-- How many cradles do yo want to to buy the tecnician(greek:Πόσες βάσεις θα χρειαστείτε ;)? -(box)+-->
    <label class="col-lg-3 control-label text-lg-right pt-2 cradlesstatusNo" style="display: none" >Πόσες βάσεις θα χρειαστείτε;</label>
    <div class="col-lg-5 cradlesstatusNo" style="display: none">
        <div data-plugin-spinner data-plugin-options='{ "value":0, "step": 1, "min": 0, "max": 200 }'>
            <div class="input-group" id='cradlesstatusNost'>
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="spinner-input form-control cradlesstatusNost cradlesstatusNo" value="0" maxlength="3" readonly name="cradlesstatusNost" style="display: none">
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 cradlesstatusNo" style="display: none">
        
    </div>

    <!-- 5) Do we have tο make holes in building pillars or building beams(Πρέπει να τρυπήσουμε σε κολώνες ή δοκάρια για να γίνει η εγκατάσταση)YES NO-->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Πρέπει να τρυπήσουμε σε κολώνες ή δοκάρια για να γίνει η εγκατάσταση;</label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="holeinpillars" type="radio" name="holeinpillars" value="YES" id="holeinpillarsYes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="holeinpillars" type="radio" name="holeinpillars" value="NO" id="holeinpillarsNo">
                    NO
                </label>
            </div>
        </div>
        
        <div class="col-lg-12 holeinpillarsinfo"></div>
    </div>

    <!-- 6)Does the external unit in order to be installed need scaffolding(greek:Ο τεχνικός μας θα πρέπει να κρεμαστεί απο κάποιο παράθυρο (δεν υπάρχει μπαλκόνι ή κάπου να πατήσει το τεχνικός για να βάλει την εξωτερική μονάδα;)?  YES  NO-->
    <label class="col-lg-3 control-label text-lg-right pt-2 " >Ο τεχνικός μας θα πρέπει να κρεμαστεί απο κάποιο παράθυρο (δεν υπάρχει μπαλκόνι ή κάπου να πατήσει το τεχνικός για να βάλει την εξωτερική μονάδα;</label>
    <div class="col-lg-9 row " >
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="scaffoldingstatus" type="radio" name="scaffoldingstatus" value="YES" id="scaffoldingstatusYes">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="scaffoldingstatus" type="radio" name="scaffoldingstatus" value="NO" id="scaffoldingstatusNo">
                    NO
                </label>
            </div>
        </div>
        
        <div class="col-lg-12 scaffoldingstatusinfo"></div>
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

                if($(".maintainac18000").length){ 
                    var manval = parseInt($(".maintainac18000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 18000 btu για συντηρηση";
                    }
                }

                if($(".maintainac24000").length){ 
                    var manval = parseInt($(".maintainac24000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 24000 btu για συντηρηση";
                    }
                }

                if($(".uninstallac").length){ 
                    var manval = parseInt($(".uninstallac").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 9000 ή 12000btu για απεγκατασταση";
                    }
                }
                if($(".uninstallac18000").length){ 
                    var manval = parseInt($(".uninstallac18000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 18000 btu για απεγκατασταση.";
                    }
                }

                if($(".uninstallac24000").length){ 
                    var manval = parseInt($(".uninstallac24000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 24000 btu για απεγκατασταση.";
                    }
                }

                if($(".installac").length){ 
                    var manval = parseInt($(".installac").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 9000 ή 12000 btu για εγκατασταση";
                    }
                }

                if($(".installac18000").length){ 
                    var manval = parseInt($(".installac18000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 18000 btu για εγκατασταση";
                    }
                }
                if($(".installac24000").length){ 
                    var manval = parseInt($(".installac24000").val());
                    if(manval >= 1){
                        cmt = cmt +" "+ manval +" κλιματιστικα 24000 btu για εγκατασταση";
                    }
                }


                if($(".coppertubemeter").length){ 
                    manval = parseInt($(".coppertubemeter").val());
                    if(manval >= 2){
                         cmt = cmt +" "+ manval +" μέτρα χαλκοσωλήνα για κλιματιστικο 9000 ή 12000btu";
                    }
                }

                if($(".coppertubemeter18000").length){ 
                    manval = parseInt($(".coppertubemeter18000").val());
                    if(manval >= 2){
                         cmt = cmt +" "+ manval +" μέτρα χαλκοσωλήνα για κλιματιστικο 18000 btu";
                    }
                }

                if($(".coppertubemeter24000").length){ 
                    manval = parseInt($(".coppertubemeter24000").val());
                    if(manval >= 2){
                         cmt = cmt +" "+ manval +" μέτρα χαλκοσωλήνα για κλιματιστικο 24000 btu";
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

                // 2a
                if($(".maintainac18000").length){ 
                    manval = parseInt($(".maintainac18000").val());
                    if(manval >= 1){
                        mbud = manval * 20;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                // 3a
                if($(".maintainac24000").length){ 
                    manval = parseInt($(".maintainac24000").val());
                    if(manval >= 1){
                        mbud = manval * 25;
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

                //2b
                if($(".uninstallac18000").length){ 
                    manval = parseInt($(".uninstallac18000").val());
                    if(manval >= 1){
                        mbud = manval * 20;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //3b
                if($(".uninstallac24000").length){ 
                    manval = parseInt($(".uninstallac24000").val());
                    if(manval >= 1){
                        mbud = manval * 25;
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

                //2c
                if($(".installac18000").length){ 
                    manval = parseInt($(".installac18000").val());
                    if(manval >= 1){
                        mbud = manval * 70;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //3c
                if($(".installac24000").length){ 
                    manval = parseInt($(".installac24000").val());
                    if(manval >= 1){
                        mbud = manval * 90;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //1ciA
                if($(".coppertubemeter").length){ 
                    manval = parseInt($(".coppertubemeter").val());
                    if(manval >= 3){
                        mbud = (manval - 2) * 15;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //2ciA
                if($(".coppertubemeter18000").length){ 
                    manval = parseInt($(".coppertubemeter18000").val());
                    if(manval >= 3){
                        mbud = (manval - 2) * 20;
                        totalbud = totalbud + parseFloat(mbud);
                    }
                }

                //3ciA
                if($(".coppertubemeter24000").length){ 
                    manval = parseInt($(".coppertubemeter24000").val());
                    if(manval >= 3){
                        mbud = (manval - 2) * 22;
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

                    if((valu >= 3) && ((sid == "coppertubemeter") || (sid == "coppertubemeter18000") || (sid == "coppertubemeter24000"))){
                        $("#"+sid+" input."+sid).val(valu - 1);    
                    }else if((valu >= 1) && (sid != "coppertubemeter")){
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


                //
                $('.needmorecopper').on('change',function(){
                    $('.needmorecopperinfo').text('Σας ενημερώνουμε οτι στην τιμή περιλαμβάνεται 2 μέτρα χαλκοσωλήνα,3 μέτρα υδροσωλήνα και 3 μέτρα καλώδιο.Για κάθε επιπλέον μέτρο χαλκοσωλήνα το κοστος ανέρχεται στα 15€/μέτρο ,για κάθε επιπλέον μέτρο υδροσωλήνα το κοστος ανέρχεται στα 3€/μέτρο και για κάθε επιπλέον μετρο καλώδιο το κόστος ανέρχεται στα 3€/μέτρο.');

                     var rvale = $(this).val(); 
                     
                     if(rvale == "YES"){
                        $('.coppertubemeteryes').css('display','inherit');
                     }else{
                        $('.coppertubemeteryes').css('display','none');
                        $(".coppertubemeter").val('2');
                     }

                    update_budget();
                    update_comment();

                });

                $('.needmorecopper18000').on('change',function(){
                    $('.needmorecopper18000info').text('Σας ενημερώνουμε οτι στην τιμή περιλαμβάνεται 2 μέτρα χαλκοσωλήνα,3 μέτρα υδροσωλήνα και 3 μέτρα καλώδιο.Για κάθε επιπλέον μέτρο χαλκοσωλήνα το κοστος ανέρχεται στα 20€,για κάθε επιπλέον μέτρο υδροσωλήνα το κοστος ανέρχεται στα 3€/μέτρο και για κάθε επιπλέον μετρο καλώδιο το κόστος ανέρχεται στα 3€/μέτρο');

                     var rvale = $(this).val(); 
                     
                     if(rvale == "YES"){
                        $('.coppertubemeter18000yes').css('display','inherit');
                     }else{
                        $('.coppertubemeter18000yes').css('display','none');
                        $(".coppertubemeter18000").val('2');
                     }

                    update_budget();
                    update_comment();

                });

                $('.needmorecopper24000').on('change',function(){
                    $('.needmorecopper24000info').text('Σας ενημερώνουμε οτι στην τιμή περιλαμβάνεται 2 μέτρα χαλκοσωλήνα,3 μέτρα υδροσωλήνα και 3 μέτρα καλώδιο.Για κάθε επιπλέον μέτρο χαλκοσωλήνα το κοστος ανέρχεται στα 20€,για κάθε επιπλέον μέτρο υδροσωλήνα το κοστος ανέρχεται στα 3€/μέτρο και για κάθε επιπλέον μετρο καλώδιο το κόστος ανέρχεται στα 3€/μέτρο');

                     var rvale = $(this).val(); 
                     
                     if(rvale == "YES"){
                        $('.coppertubemeter24000yes').css('display','inherit');
                     }else{
                        $('.coppertubemeter24000yes').css('display','none');
                        $(".coppertubemeter24000").val('2');
                     }

                    update_budget();
                    update_comment();

                });

                $(".acinstallation").on('change',function(){
                    var rvale = $(this).val();
                    
                    if(rvale == "NEW"){
                        $("label.freonacdisplay").text('Κάποια κινέζικα κλιματιστικά θέλουν συμπλήρωση φρέον για να λειτουργήσουν, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος?');
                    }else{
                        $("label.freonacdisplay").text('Ένα μεταχειρισμένο κλιματιστικό πιθανόν να χρειαστεί συμπλήρωση φρέον, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος?');
                    }

                    $(".freonacdisplay").css('display','inherit');


                });

                $(".acinstallation18000").on('change',function(){
                    var rvale = $(this).val();
                    
                    if(rvale == "NEW"){
                        $("label.freonacdisplay18000").text('Κάποια κινέζικα κλιματιστικά θέλουν συμπλήρωση φρέον για να λειτουργήσουν, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος?');
                    }else{
                        $("label.freonacdisplay18000").text('Ένα μεταχειρισμένο κλιματιστικό πιθανόν να χρειαστεί συμπλήρωση φρέον, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος');
                    }

                    $(".freonacdisplay18000").css('display','inherit');


                });
                $(".acinstallation24000").on('change',function(){
                    var rvale = $(this).val();
                    
                    if(rvale == "NEW"){
                        $("label.freonacdisplay24000").text('Κάποια κινέζικα κλιματιστικά θέλουν συμπλήρωση φρέον για να λειτουργήσουν, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος?');
                    }else{
                        $("label.freonacdisplay24000").text('Ένα μεταχειρισμένο κλιματιστικό πιθανόν να χρειαστεί συμπλήρωση φρέον, το κόστος για το φρέον είναι περίπου 15€/300gr και δεν συμπεριλαμβάνεται στην τιμή. Ποιός είναι ο τύπος φρέοντος?');
                    }

                    $(".freonacdisplay24000").css('display','inherit');


                });

                $(".cradlesstatus").on('change',function(){
                    var rvale = $(this).val();
                    if(rvale == "YES"){
                        $(".cradlesstatusNo").css('display','none');
                        $(".cradlesstatusNost").val('0');
                    }else{
                        $(".cradlesstatusNo").css('display','inherit');
                    }

                    $(".cradlesstatusinfo").text('Σας ενημερώνουμε ότι το κόστος της βάσης είναι +6€ και δεν συμπεριλαμβάνεται στην τιμή της εγκατάστασης.');
                });

                $(".holeinpillars").on('change',function(){
                    var rvale = $(this).val();
                    if(rvale == "YES"){
                        $(".holeinpillarsinfo").text('Σας ενημερώνουμε ότι σε αυτή την περίπτωση δεν μπορούμε να αναλάβουμε την τοποθέτηση του κλιματιστικού καθότι μπορέι να προκληθεί σημαντικό πρόβλημα στην στατικότητα του κτιρίου και μπορούμε να σας προτείνουμε την τοποθέτηση του σε κάποια άλλη θέση.');
                    }else{
                        $(".holeinpillarsinfo").text('');
                    }
                });

                $(".scaffoldingstatus").on('change',function(){
                    var rvale = $(this).val();
                    if(rvale == "YES"){
                        $(".scaffoldingstatusinfo").text('Σας ενημερώνουμε οτι αυτή η εργασία δεν μπορεί να πραγματοποιηθεί χωρίς τη χρήση σκαλωσιάς ή γερανού.Εναλλακτικά πρέπει να επιλέξετε κάποιο άλλο σημείο για την τοποθέτηση του κλιματιστικού.');
                    }else{
                        $(".scaffoldingstatusinfo").text('');
                    }
                });
                

                

            });

<?php } ?>