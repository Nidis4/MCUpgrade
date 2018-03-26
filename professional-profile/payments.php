<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'payments';
    include('menu.php');
?>

            <!-- Page Content Holder -->
            
            <div class="container container-receipt-settings">
                <form id="saveInvoiceForm" >
                    <div class="row">
                        <div class="col-md-12 page-title-receipt-settings">
                            <h2>Choose a payment method</h2>

                        </div>
                        <div class="col-md-6 payments">
                              <div class="radio-payments"><input type="radio" name="payment_method" checked="checked" value="Cash"> <span>Cash</span></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 page-title-receipt-settings">
                            <h2>Receipt Settings</h2>
                            <div class=" col-md-6">                                
                                <div class="col-md-6 payments">
                                    <div class="radio-payments">
                                        <input type="radio" name="viewtype" value="Invoice"> 
                                        <span>Invoice</span>
                                    </div>
                                </div>
                                <div class="col-md-6 payments">
                                    <div class="radio-payments">
                                        <input type="radio" name="viewtype" value="Receipt"> 
                                        <span>Receipt</span>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>

                        <div class="app-cols col-md-6">

                             <label class="app-label">Company Name:</label>
                             <input type="text" name="company_name" class="receipt_settings" value="ΣΠΟΥΔΑΣ ΚΩΝΣΤΑΝΤΙΝΟΣ & ΣΙΑ ΙΚΕ">

                             <label class="app-label">Profession:</label>
                             <input type="text" name="profession" class="receipt_settings" value="ΤΕΧΝΙΚΑ ΕΡΓΑ">

                             <label class="app-label" name="business_type">Business Type:</label>
                             <input type="text" name="business_type" class="receipt_settings" value="ΤΕΧΝΙΚΑ ΕΡΓΑ">

                             <label class="app-label" name="vat_number">VAT Number:</label>
                             <input type="text" name="vat_number" class="receipt_settings" value="00000000">

                             <label class="app-label" name="tax_office">Tax Office:</label>
                             <?php
                                $tax_office = array('Α ΚΑΤΕΡΙΝΗΣ','Α ΑΘΗΝΩΝ','Α ΗΡΑΚΛΕΙΟΥ','Α ΘΕΣΣΑΛΟΝΙΚΗΣ','Α ΛΑΡΙΣΑΣ','Α ΠΑΤΡΩΝ','Α ΠΕΡΙΣΤΕΡΙΟΥ','Α ΣΕΡΡΩΝ','Α ΠΕΙΡΑΙΑ','ΑΓΙΟΥ ΔΗΜΗΤΡΙΟΥ','ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ','ΑΓΙΩΝ ΑΝΑΡΓΥΡΩΝ','ΑΓΡΙΝΙΟΥ','ΑΙΓΑΛΕΩ','ΑΙΓΙΟΥ','ΑΛΕΞΑΝΔΡΟΥΠΟΛΗΣ','ΑΜΑΛΙΑΔΑΣ','ΑΜΑΡΟΥΣΙΟΥ','ΑΜΠΕΛΟΚΗΠΩΝ','ΑΜΦΙΣΣΑΣ','ΑΡΓΟΣΤΟΛΙΟΥ','ΑΡΓΟΥΣ','ΑΡΤΑΣ','ΑΧΑΡΝΩΝ','Β ΗΡΑΚΛΕΙΟΥ','Β ΠΕΡΙΣΤΕΡΙΟΥ','Β ΛΑΡΙΣΑΣ','ΒΕΡΟΙΑΣ','ΒΟΛΟΥ','ΒΥΡΩΝΟΣ','Γ ΠΑΤΡΩΝ','Γ ΠΕΙΡΑΙΑ','ΓΑΛΑΤΣΙΟΥ','ΓΙΑΝΝΙΤΣΩΝ','ΓΛΥΦΑΔΑΣ','ΓΡΕΒΕΝΩΝ','Δ ΑΘΗΝΩΝ','Δ ΘΕΣΣΑΛΟΝΙΚΗΣ','Δ ΠΕΙΡΑΙΑ','ΔΡΑΜΑΣ','Ε ΘΕΣΣΑΛΟΝΙΚΗΣ','Ε ΠΕΙΡΑΙΑ','ΕΔΕΣΣΑΣ','ΕΛΕΥΣΙΝΑΣ','Ζ ΘΕΣΣΑΛΟΝΙΚΗΣ','ΖΑΚΥΝΘΟΥ','Η ΘΕΣΣΑΛΟΝΙΚΗΣ','ΗΓΟΥΜΕΝΙΤΣΑΣ','ΗΛΙΟΥΠΟΛΗΣ','ΘΗΒΩΝ','ΘΗΡΑΣ','ΙΒ ΑΘΗΝΩΝ','ΙΓ ΑΘΗΝΩΝ','ΙΔ ΑΘΗΝΩΝ','ΙΖ ΑΘΗΝΩΝ','ΙΩΑΝΝΙΝΩΝ','ΙΩΝΙΑΣ ΘΕΣΣΑΛΟΝΙΚΗΣ','ΚΑΒΑΛΑΣ','ΚΑΛΑΜΑΡΙΑΣ','ΚΑΛΑΜΑΤΑΣ','ΚΑΛΛΙΘΕΑΣ','ΚΑΡΔΙΤΣΑΣ','ΚΑΡΠΕΝΗΣΙΟΥ','ΚΑΣΤΟΡΙΑΣ','ΚΑΤΟΙΚΩΝ ΕΞΩΤΕΡΙΚΟΥ','ΚΕΡΚΥΡΑΣ','ΚΗΦΙΣΙΑΣ','ΚΙΛΚΙΣ','ΚΟΖΑΝΗΣ','ΚΟΜΟΤΗΝΗΣ','ΚΟΡΙΝΘΟΥ','ΚΟΡΩΠΙΟΥ','ΚΥΜΗΣ','ΚΩ','ΛΑΓΚΑΔΑ','ΛΑΜΙΑΣ','ΛΕΥΚΑΔΑΣ','ΛΙΒΑΔΕΙΑΣ','ΜΕΣΟΛΟΓΓΙΟΥ','ΜΟΣΧΑΤΟΥ','ΜΥΚΟΝΟΥ','ΜΥΤΙΛΗΝΗΣ','Ν.ΗΡΑΚΛΕΙΟΥ','Ν.ΙΩΝΙΑΣ ΒΟΛΟΥ','ΝΑΞΟΥ','ΝΑΥΠΛΙΟΥ','ΝΕΑΣ ΙΩΝΙΑΣ','ΝΕΑΣ ΣΜΥΡΝΗΣ','ΝΕΩΝ ΜΟΥΔΑΝΙΩΝ','ΝΙΚΑΙΑΣ','ΞΑΝΘΗΣ','ΟΡΕΣΤΙΑΔΑΣ','ΠΑΛΑΙΟΥ ΦΑΛΗΡΟΥ','ΠΑΛΛΗΝΗΣ','ΠΑΡΟΥ','ΠΛΟΙΩΝ ΠΕΙΡΑΙΑ','ΠΟΛΥΓΥΡΟΥ','ΠΡΕΒΕΖΑΣ','ΠΤΟΛΕΜΑΙΔΑΣ','ΠΥΡΓΟΥ','ΡΕΘΥΜΝΟΥ','ΡΟΔΟΥ','ΣΑΜΟΥ','ΣΠΑΡΤΗΣ','ΣΤ΄ ΘΕΣΣΑΛΟΝΙΚΗΣ','ΣΤ ΑΘΗΝΩΝ','ΣΥΡΟΥ','ΤΡΙΚΑΛΩΝ','ΤΡΙΠΟΛΗΣ','Φ.Α.Ε. ΑΘΗΝΩΝ','ΦΑΕ ΘΕΣΣΑΛΟΝΙΚΗΣ','ΦΑΕ ΠΕΙΡΑΙΑ','ΦΛΩΡΙΝΑΣ','ΧΑΛΑΝΔΡΙΟΥ','ΧΑΛΚΙΔΑΣ','ΧΑΝΙΩΝ','ΧΙΟΥ','ΧΟΛΑΡΓΟΥ','ΨΥΧΙΚΟΥ');
                             ?>

                                <select type="text" name="tax_office" class="receipt_settings">
                                        <option value="">Select</option>
                                    <?php
                                        foreach ($tax_office as $value) {
                                    ?>
                                            <option value="<?php echo $value;?>"><?php echo $value;?></option>    
                                    <?php
                                        }
                                    ?>            
                                            
                                            
                                </select>

                                <label class="app-label">Address:</label>
                                <input type="text" name="address" class="receipt_settings" value="ΤΡΩΩΝ 12 ΠΕΡΙΣΤΕΡΙ">


                        </div>

                        <div class="app-cols col-md-6">
                            
                            <label class="app-label" name="country">Country:</label>
                            <input type="text" name="country" class="receipt_settings" value="12133">

                            <label class="app-label" name="pc">P.C.:</label>
                            <input type="text" name="pc" class="receipt_settings" value="12133">

                            <label class="app-label" name="land_line">Land line:</label>
                            <input type="text" name="land_line" class="receipt_settings" value="">


                            <label class="app-label" name="mobile_phone">Mobile phone:</label>
                            <input type="text" name="mobile_phone" class="receipt_settings" value="6950000000">

                            <label class="app-label" name="receipt_email">e-Receipt Email:</label>
                            <input type="text" name="receipt_email" class="receipt_settings" value="">



                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-12 page-title-receipt-settings">
                            <h2>Verification Data</h2>
                        </div>

                        <div class="app-cols col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-file" name="company_stamp">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                                        </span>
                                        <input type="text" class="form-control receipt_settings" placeholder="Company's Stamp..." />
                                        <span class="input-group-btn">
                                             <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-file" name="id_card">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                                        </span>
                                        <input type="text" class="form-control receipt_settings" placeholder='ID card...' />
                                        <span class="input-group-btn">
                                             <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                        </span>
                                    </div>
                                </div>

                                <label class="app-label" name="id_card_number">ID card Number:</label>
                                <input type="text" name="id_card_number" class="receipt_settings" value="">

                                <label class="app-label" name="personal_vat_id">Personal VAT id:</label>
                                <input type="text" name="personal_vat_id" class="receipt_settings" value="">

                                <label class="app-label" name="website">Website:</label>
                                <input type="text" name="website" class="receipt_settings" value="">

                                <label class="app-label" name="directory_link">Link your company to a directory ( eg xo.gr, vrisko.gr etc. ):</label>
                                <input type="text" name="directory_link" class="receipt_settings" value="">


                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="save-btn" id="saveInvoice" >Save</div>
                        </div>
                    </div>



                    </div>
                    <input type="hidden" name="professional_id" value="<?php echo $_SESSION['id'];?>">
                </form>

                

            </div>




            </div>
        </div>
        <script src="../js/core.js"></script>
        
        <script type="text/javascript">
            function bs_input_file() {
                $(".input-file").before(
                    function() {
                        if ( ! $(this).prev().hasClass('input-ghost') ) {
                            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                            element.attr("name",$(this).attr("name"));
                            element.attr("id",$(this).attr("name"));

                            element.change(function(){
                                element.next(element).find('input').val((element.val()).split('\\').pop());
                            });
                            $(this).find("button.btn-choose").click(function(){
                                element.click();
                            });
                            $(this).find("button.btn-reset").click(function(){
                                element.val(null);
                                $(this).parents(".input-file").find('input').val('');
                            });
                            $(this).find('input').css("cursor","pointer");
                            $(this).find('input').mousedown(function() {
                                $(this).parents('.input-file').prev().click();
                                return false;
                            });
                            return element;
                        }
                    }
                );
        }
        $(function() {
            bs_input_file();
        });



        </script>
        <script>
            $(document).ready(function() {
                $("#saveInvoice").on('click',function(){
                    var getSaveAPI = API_LOCATION+'professional/saveIncoiceSettings.php';  

                    var form_data = new FormData(); 

                    //Form data
                    var input_data = $('#saveInvoiceForm').serializeArray();
                    $.each(input_data, function (key, input) {
                        form_data.append(input.name, input.value);
                    });

                    var company_stamp = $('#company_stamp').prop('files')[0];
                    form_data.append('company_stamp', company_stamp);

                    var id_card = $('#id_card').prop('files')[0];
                    form_data.append('id_card', id_card);


                    $.ajax({
                            type: "POST",
                            url: getSaveAPI,
                            dataType: "JSON",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function(data)
                            {
                                alert(data['message']);
                                location.reload();
                            }
                        });
                    return false;
                });
            });
        </script> 

    </body>
</html>
