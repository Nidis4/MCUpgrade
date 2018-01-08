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
        <div class="col-lg-1"><input class="form-control ElectricalPanelsecondNewInputName" type="radio" name="ElectricalPanelsecondNewInputName" value="YES" id="ElectricalPanelsecondNewInputId"></div>
        <div class="col-lg-2 pt-2">YES</div>
        <div class="col-lg-1"><input class="form-control ElectricalPanelsecondNewInputName" type="radio" name="ElectricalPanelsecondNewInputName" value="NO" id="ElectricalPanelsecondNewInputIdBestDesign"></div>
        <div class="col-lg-4 pt-2">NO</div>
    </div>

   




    <label class="col-lg-3 control-label text-lg-right pt-2">Το ρεύμα είναι τριφασικό?  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalCertificatebedStatus" value="YES" id="ElectricalCertificateCategory"></div>
        <div class="col-lg-2 pt-2">YES</div>
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalCertificatebedStatus" value="NO" id="ElectricalCertificateCategorytriple"></div>
        <div class="col-lg-4 pt-2">NO</div>
    </div>

    <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε έναν λογαριασμό της ΔΕΗ ή κάποιου άλλου παρόχου ρεύματος;  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-1"><input class="form-control ElectricalTagStatus" type="radio" name="ElectricalTagStatus" value="YES" ></div>
        <div class="col-lg-2 pt-2">YES</div>
        <div class="col-lg-1"><input class="form-control ElectricalTagStatus" type="radio" name="ElectricalTagStatus" value="NO" ></div>
        <div class="col-lg-4 pt-2">NO</div>
        <div class="col-lg-12 pt-2 ElectricalTagStatusYes" style="display: none">Παρακαλώ να έχετε μάζί σας στο ραντεβού ένα λογαριασμό ρεύματος</div>
    </div>
    <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε ηλεκτρολογικό πίνακα;  </label>
    <div class="col-lg-9 row">
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalPanelName" value="YES" id="ElectricalPanelId"></div>
        <div class="col-lg-2 pt-2">YES</div>
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalPanelName" value="NO" id="ElectricalPanelId"></div>
        <div class="col-lg-4 pt-2">NO</div>
    </div>
    <label class="col-lg-3 control-label text-lg-right pt-2">Έχετε ρελέ τάσης διαφυγής;   </label>
    <div class="col-lg-9 row">
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalVoltageRelayName" value="YES" id="ElectricalVoltageRelayID"></div>
        <div class="col-lg-2 pt-2">YES</div>
        <div class="col-lg-1"><input class="form-control" type="radio" name="ElectricalVoltageRelayName" value="NO" id="ElectricalVoltageRelayID"></div>
        <div class="col-lg-4 pt-2">NO</div>
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
                   $(".ElectricalTagStatusYes").css('display','inherit'); 
                }else{
                   $(".ElectricalTagStatusYes").css('display','none'); 
                }
           });




        });
    </script>
    
<?php } ?>