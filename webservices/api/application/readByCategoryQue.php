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
                    <input class="" type="radio" name="ElectricalVoltageRelayName" value="YES" id="ElectricalVoltageRelayID">
                    YES
                </label>
            </div>
        </div>
        <div class="col-lg-3">            
            <div class="radio">
                <label class="pt-3">
                    <input class="" type="radio" name="ElectricalVoltageRelayName" value="NO" id="ElectricalVoltageRelayIDa">
                    NO
                </label>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
           $("#ElectricalCertificateCategory1").on('change',function(){
                var vale = $(this).val();
                if(vale >= 81){
                   $(".MoreThanEightyDisplayNewQuestion").css('display','inherit'); 
                }else{
                   $(".MoreThanEightyDisplayNewQuestion").css('display','none'); 
                }
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
                if(rvale == "YES"){ 
                   $("#comment123").val('3φασικό'); 
                }else{ 

                }
           });

           

           $(".ElectricalPanelNamesecond").on('change',function(){
                var rvale = $(this).val();                
                if(rvale == "YES"){
                   $(".ElectricalVoltageRelayNameYes").css('display','none'); 
                   $("#comment123").val('3φασικό , Εγκατάσταση νέου πίνακα '+ '150' +' €');
                }else{                   
                   $(".ElectricalVoltageRelayNameYes").css('display','inherit'); 
                }
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
                        var newbud = parseFloat($('#budget').val()) - parseInt(uvars);
                        $('#budget').val(newbud);
                   }
                   $('.spinner-input').val('1'); 
                }
           });

           $(".spinner-buttons .spinner-down").on('click',function(){
                var vale = $('.spinner-input').val();
                if(vale >= 2){
                    var newvale = parseInt(vale) - 1;
                    $('.spinner-input').val(newvale);
                    var newbud = parseFloat($('#budget').val()) - 34;
                    $('#budget').val(newbud);
                }
                
           });

           $(".spinner-buttons .spinner-up").on('click',function(){
                var vale = $('.spinner-input').val();
                var newvale = parseInt(vale) + 1;
                $('.spinner-input').val(newvale);
                var upsp = $('.spinner-input').val();
                var upsp = $('.spinner-input').val();
                if(upsp >= 2){
                    var newbud = parseFloat($('#budget').val()) + 34;
                    $('#budget').val(newbud);
                }
           });

           





        });
    </script>
    
<?php } ?>