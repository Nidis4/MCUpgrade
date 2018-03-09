<?php 
    include('header.php');
    $currentPage = 'payments';
    include('menu.php');
?>

            <!-- Page Content Holder -->
            
            <div class="container container-receipt-settings">

                <div class="row">
                    <div class="col-md-12 page-title-receipt-settings">
                        <h2>Choose a payment method</h2>

                    </div>
                    <div class="col-md-6 payments">
                          <div class="radio-payments"><input type="radio" name="payment_method" value="Credit Card"> <span>Credit Card</span></div>
                          <div class="radio-payments"><input type="radio" name="payment_method" value="female"> <span>Cash</span></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 page-title-receipt-settings">
                        <h2>Receipt Settings</h2>
                    </div>
                    <div class="app-cols col-md-6">
                         <label class="app-label" name="company_name">Company Name:</label>
                         <input type="text" name="company_name" class="receipt_settings" value="ΣΠΟΥΔΑΣ ΚΩΝΣΤΑΝΤΙΝΟΣ & ΣΙΑ ΙΚΕ">

                         <label class="app-label" name="business_type">Business Type:</label>
                         <input type="text" name="business_type" class="receipt_settings" value="ΤΕΧΝΙΚΑ ΕΡΓΑ">

                         <label class="app-label" name="vat_number">VAT Number:</label>
                         <input type="text" name="vat_number" class="receipt_settings" value="00000000">

                         <label class="app-label" name="tax_office">Tax Office:</label>
                         <select type="text" name="tax_office" class="receipt_settings">
                                    <option value="">Select</option>
                                        <option value="Α ΚΑΤΕΡΙΝΗΣ"> Α ΚΑΤΕΡΙΝΗΣ </option>
                                        <option value="Α ΑΘΗΝΩΝ"> Α ΑΘΗΝΩΝ </option>
                                        <option value="Α ΗΡΑΚΛΕΙΟΥ"> Α ΗΡΑΚΛΕΙΟΥ </option>
                                        <option value="Α ΘΕΣΣΑΛΟΝΙΚΗΣ"> Α ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="Α ΛΑΡΙΣΑΣ"> Α ΛΑΡΙΣΑΣ </option>
                                        <option value="Α ΠΑΤΡΩΝ"> Α ΠΑΤΡΩΝ </option>
                                        <option value="Α ΠΕΡΙΣΤΕΡΙΟΥ"> Α ΠΕΡΙΣΤΕΡΙΟΥ </option>
                                        <option value="Α ΣΕΡΡΩΝ"> Α ΣΕΡΡΩΝ </option>
                                        <option value="Α ΠΕΙΡΑΙΑ"> Α ΠΕΙΡΑΙΑ </option>
                                        <option value="ΑΓΙΟΥ ΔΗΜΗΤΡΙΟΥ"> ΑΓΙΟΥ ΔΗΜΗΤΡΙΟΥ </option>
                                        <option value="ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ"> ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ </option>
                                        <option value="ΑΓΙΩΝ ΑΝΑΡΓΥΡΩΝ"> ΑΓΙΩΝ ΑΝΑΡΓΥΡΩΝ </option>
                                        <option value="ΑΓΡΙΝΙΟΥ"> ΑΓΡΙΝΙΟΥ </option>
                                        <option value="ΑΙΓΑΛΕΩ"> ΑΙΓΑΛΕΩ </option>
                                        <option value="ΑΙΓΙΟΥ"> ΑΙΓΙΟΥ </option>
                                        <option value="ΑΛΕΞΑΝΔΡΟΥΠΟΛΗΣ"> ΑΛΕΞΑΝΔΡΟΥΠΟΛΗΣ </option>
                                        <option value="ΑΜΑΛΙΑΔΑΣ"> ΑΜΑΛΙΑΔΑΣ </option>
                                        <option value="ΑΜΑΡΟΥΣΙΟΥ"> ΑΜΑΡΟΥΣΙΟΥ </option>
                                        <option value="ΑΜΠΕΛΟΚΗΠΩΝ"> ΑΜΠΕΛΟΚΗΠΩΝ </option>
                                        <option value="ΑΜΦΙΣΣΑΣ"> ΑΜΦΙΣΣΑΣ </option>
                                        <option value="ΑΡΓΟΣΤΟΛΙΟΥ"> ΑΡΓΟΣΤΟΛΙΟΥ </option>
                                        <option value="ΑΡΓΟΥΣ"> ΑΡΓΟΥΣ </option>
                                        <option value="ΑΡΤΑΣ"> ΑΡΤΑΣ </option>
                                        <option value="ΑΧΑΡΝΩΝ"> ΑΧΑΡΝΩΝ </option>
                                        <option value="Β ΗΡΑΚΛΕΙΟΥ"> Β ΗΡΑΚΛΕΙΟΥ </option>
                                        <option value="Β ΠΕΡΙΣΤΕΡΙΟΥ" selected="selected"> Β ΠΕΡΙΣΤΕΡΙΟΥ </option>
                                        <option value="Β ΛΑΡΙΣΑΣ"> Β ΛΑΡΙΣΑΣ </option>
                                        <option value="ΒΕΡΟΙΑΣ"> ΒΕΡΟΙΑΣ </option>
                                        <option value="ΒΟΛΟΥ"> ΒΟΛΟΥ </option>
                                        <option value="ΒΥΡΩΝΟΣ"> ΒΥΡΩΝΟΣ </option>
                                        <option value="Γ ΠΑΤΡΩΝ"> Γ ΠΑΤΡΩΝ </option>
                                        <option value="Γ ΠΕΙΡΑΙΑ"> Γ ΠΕΙΡΑΙΑ </option>
                                        <option value="ΓΑΛΑΤΣΙΟΥ"> ΓΑΛΑΤΣΙΟΥ </option>
                                        <option value="ΓΙΑΝΝΙΤΣΩΝ"> ΓΙΑΝΝΙΤΣΩΝ </option>
                                        <option value="ΓΛΥΦΑΔΑΣ"> ΓΛΥΦΑΔΑΣ </option>
                                        <option value="ΓΡΕΒΕΝΩΝ"> ΓΡΕΒΕΝΩΝ </option>
                                        <option value="Δ ΑΘΗΝΩΝ"> Δ ΑΘΗΝΩΝ </option>
                                        <option value="Δ ΘΕΣΣΑΛΟΝΙΚΗΣ "> Δ ΘΕΣΣΑΛΟΝΙΚΗΣ  </option>
                                        <option value="Δ ΠΕΙΡΑΙΑ"> Δ ΠΕΙΡΑΙΑ </option>
                                        <option value="ΔΡΑΜΑΣ"> ΔΡΑΜΑΣ </option>
                                        <option value="Ε ΘΕΣΣΑΛΟΝΙΚΗΣ"> Ε ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="Ε ΠΕΙΡΑΙΑ"> Ε ΠΕΙΡΑΙΑ </option>
                                        <option value="ΕΔΕΣΣΑΣ"> ΕΔΕΣΣΑΣ </option>
                                        <option value="ΕΛΕΥΣΙΝΑΣ"> ΕΛΕΥΣΙΝΑΣ </option>
                                        <option value="Ζ ΘΕΣΣΑΛΟΝΙΚΗΣ"> Ζ ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="ΖΑΚΥΝΘΟΥ"> ΖΑΚΥΝΘΟΥ </option>
                                        <option value="Η ΘΕΣΣΑΛΟΝΙΚΗΣ"> Η ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="ΗΓΟΥΜΕΝΙΤΣΑΣ"> ΗΓΟΥΜΕΝΙΤΣΑΣ </option>
                                        <option value="ΗΛΙΟΥΠΟΛΗΣ"> ΗΛΙΟΥΠΟΛΗΣ </option>
                                        <option value="ΘΗΒΩΝ"> ΘΗΒΩΝ </option>
                                        <option value="ΘΗΡΑΣ"> ΘΗΡΑΣ </option>
                                        <option value="ΙΒ ΑΘΗΝΩΝ"> ΙΒ ΑΘΗΝΩΝ </option>
                                        <option value="ΙΓ ΑΘΗΝΩΝ"> ΙΓ ΑΘΗΝΩΝ </option>
                                        <option value="ΙΔ ΑΘΗΝΩΝ"> ΙΔ ΑΘΗΝΩΝ </option>
                                        <option value="ΙΖ ΑΘΗΝΩΝ"> ΙΖ ΑΘΗΝΩΝ </option>
                                        <option value="ΙΩΑΝΝΙΝΩΝ"> ΙΩΑΝΝΙΝΩΝ </option>
                                        <option value="ΙΩΝΙΑΣ ΘΕΣΣΑΛΟΝΙΚΗΣ"> ΙΩΝΙΑΣ ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="ΚΑΒΑΛΑΣ"> ΚΑΒΑΛΑΣ </option>
                                        <option value="ΚΑΛΑΜΑΡΙΑΣ"> ΚΑΛΑΜΑΡΙΑΣ </option>
                                        <option value="ΚΑΛΑΜΑΤΑΣ"> ΚΑΛΑΜΑΤΑΣ </option>
                                        <option value="ΚΑΛΛΙΘΕΑΣ"> ΚΑΛΛΙΘΕΑΣ </option>
                                        <option value="ΚΑΡΔΙΤΣΑΣ"> ΚΑΡΔΙΤΣΑΣ </option>
                                        <option value="ΚΑΡΠΕΝΗΣΙΟΥ"> ΚΑΡΠΕΝΗΣΙΟΥ </option>
                                        <option value="ΚΑΣΤΟΡΙΑΣ"> ΚΑΣΤΟΡΙΑΣ </option>
                                        <option value="ΚΑΤΟΙΚΩΝ ΕΞΩΤΕΡΙΚΟΥ"> ΚΑΤΟΙΚΩΝ ΕΞΩΤΕΡΙΚΟΥ </option>
                                        <option value="ΚΕΡΚΥΡΑΣ"> ΚΕΡΚΥΡΑΣ </option>
                                        <option value="ΚΗΦΙΣΙΑΣ"> ΚΗΦΙΣΙΑΣ </option>
                                        <option value="ΚΙΛΚΙΣ"> ΚΙΛΚΙΣ </option>
                                        <option value="ΚΟΖΑΝΗΣ"> ΚΟΖΑΝΗΣ </option>
                                        <option value="ΚΟΜΟΤΗΝΗΣ"> ΚΟΜΟΤΗΝΗΣ </option>
                                        <option value="ΚΟΡΙΝΘΟΥ"> ΚΟΡΙΝΘΟΥ </option>
                                        <option value="ΚΟΡΩΠΙΟΥ"> ΚΟΡΩΠΙΟΥ </option>
                                        <option value="ΚΥΜΗΣ"> ΚΥΜΗΣ </option>
                                        <option value="ΚΩ"> ΚΩ </option>
                                        <option value="ΛΑΓΚΑΔΑ"> ΛΑΓΚΑΔΑ </option>
                                        <option value="ΛΑΜΙΑΣ"> ΛΑΜΙΑΣ </option>
                                        <option value="ΛΕΥΚΑΔΑΣ"> ΛΕΥΚΑΔΑΣ </option>
                                        <option value="ΛΙΒΑΔΕΙΑΣ"> ΛΙΒΑΔΕΙΑΣ </option>
                                        <option value="ΜΕΣΟΛΟΓΓΙΟΥ"> ΜΕΣΟΛΟΓΓΙΟΥ </option>
                                        <option value="ΜΟΣΧΑΤΟΥ"> ΜΟΣΧΑΤΟΥ </option>
                                        <option value="ΜΥΚΟΝΟΥ"> ΜΥΚΟΝΟΥ </option>
                                        <option value="ΜΥΤΙΛΗΝΗΣ"> ΜΥΤΙΛΗΝΗΣ </option>
                                        <option value="Ν.ΗΡΑΚΛΕΙΟΥ"> Ν.ΗΡΑΚΛΕΙΟΥ </option>
                                        <option value="Ν.ΙΩΝΙΑΣ ΒΟΛΟΥ"> Ν.ΙΩΝΙΑΣ ΒΟΛΟΥ </option>
                                        <option value="ΝΑΞΟΥ"> ΝΑΞΟΥ </option>
                                        <option value="ΝΑΥΠΛΙΟΥ"> ΝΑΥΠΛΙΟΥ </option>
                                        <option value="ΝΕΑΣ ΙΩΝΙΑΣ"> ΝΕΑΣ ΙΩΝΙΑΣ </option>
                                        <option value="ΝΕΑΣ ΣΜΥΡΝΗΣ"> ΝΕΑΣ ΣΜΥΡΝΗΣ </option>
                                        <option value="ΝΕΩΝ ΜΟΥΔΑΝΙΩΝ"> ΝΕΩΝ ΜΟΥΔΑΝΙΩΝ </option>
                                        <option value="ΝΙΚΑΙΑΣ"> ΝΙΚΑΙΑΣ </option>
                                        <option value="ΞΑΝΘΗΣ"> ΞΑΝΘΗΣ </option>
                                        <option value="ΟΡΕΣΤΙΑΔΑΣ"> ΟΡΕΣΤΙΑΔΑΣ </option>
                                        <option value="ΠΑΛΑΙΟΥ ΦΑΛΗΡΟΥ"> ΠΑΛΑΙΟΥ ΦΑΛΗΡΟΥ </option>
                                        <option value="ΠΑΛΛΗΝΗΣ"> ΠΑΛΛΗΝΗΣ </option>
                                        <option value="ΠΑΡΟΥ"> ΠΑΡΟΥ </option>
                                        <option value="ΠΛΟΙΩΝ ΠΕΙΡΑΙΑ"> ΠΛΟΙΩΝ ΠΕΙΡΑΙΑ </option>
                                        <option value="ΠΟΛΥΓΥΡΟΥ"> ΠΟΛΥΓΥΡΟΥ </option>
                                        <option value="ΠΡΕΒΕΖΑΣ"> ΠΡΕΒΕΖΑΣ </option>
                                        <option value="ΠΤΟΛΕΜΑΙΔΑΣ"> ΠΤΟΛΕΜΑΙΔΑΣ </option>
                                        <option value="ΠΥΡΓΟΥ"> ΠΥΡΓΟΥ </option>
                                        <option value="ΡΕΘΥΜΝΟΥ"> ΡΕΘΥΜΝΟΥ </option>
                                        <option value="ΡΟΔΟΥ"> ΡΟΔΟΥ </option>
                                        <option value="ΣΑΜΟΥ"> ΣΑΜΟΥ </option>
                                        <option value="ΣΠΑΡΤΗΣ"> ΣΠΑΡΤΗΣ </option>
                                        <option value="ΣΤ΄ ΘΕΣΣΑΛΟΝΙΚΗΣ"> ΣΤ΄ ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="ΣΤ ΑΘΗΝΩΝ"> ΣΤ ΑΘΗΝΩΝ </option>
                                        <option value="ΣΥΡΟΥ"> ΣΥΡΟΥ </option>
                                        <option value="ΤΡΙΚΑΛΩΝ"> ΤΡΙΚΑΛΩΝ </option>
                                        <option value="ΤΡΙΠΟΛΗΣ"> ΤΡΙΠΟΛΗΣ </option>
                                        <option value="Φ.Α.Ε. ΑΘΗΝΩΝ"> Φ.Α.Ε. ΑΘΗΝΩΝ </option>
                                        <option value="ΦΑΕ ΘΕΣΣΑΛΟΝΙΚΗΣ"> ΦΑΕ ΘΕΣΣΑΛΟΝΙΚΗΣ </option>
                                        <option value="ΦΑΕ ΠΕΙΡΑΙΑ"> ΦΑΕ ΠΕΙΡΑΙΑ </option>
                                        <option value="ΦΛΩΡΙΝΑΣ"> ΦΛΩΡΙΝΑΣ </option>
                                        <option value="ΧΑΛΑΝΔΡΙΟΥ"> ΧΑΛΑΝΔΡΙΟΥ </option>
                                        <option value="ΧΑΛΚΙΔΑΣ"> ΧΑΛΚΙΔΑΣ </option>
                                        <option value="ΧΑΝΙΩΝ"> ΧΑΝΙΩΝ </option>
                                        <option value="ΧΙΟΥ"> ΧΙΟΥ </option>
                                        <option value="ΧΟΛΑΡΓΟΥ"> ΧΟΛΑΡΓΟΥ </option>
                                        <option value="ΨΥΧΙΚΟΥ"> ΨΥΧΙΚΟΥ </option>
                            </select>

                            <label class="app-label" name="Address">Address:</label>
                            <input type="text" name="Address" class="receipt_settings" value="ΤΡΩΩΝ 12 ΠΕΡΙΣΤΕΡΙ">


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



                </div>

                

            </div>




            </div>
        </div>

        <script type="text/javascript">
            function bs_input_file() {
                $(".input-file").before(
                    function() {
                        if ( ! $(this).prev().hasClass('input-ghost') ) {
                            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                            element.attr("name",$(this).attr("name"));
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

    </body>
</html>
