<?php 
	include('header.php');
	include('menu.php');

?>

	<div class="container-fluid top-sign-up-container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="h1-sing-up">
					Είσαι επαγγελματίας
					<div style="color:#ff6600;"  id="sign_up_carousel" class="carousel vertical slide ">
            <!-- Carousel items -->
		            <div class="carousel-inner" role="listbox">
		                <div class="active item">
		                  <p class="ticker-headline">υδραυλικός;</p>
		                </div>
		                <div class="item">
		                   <p class="ticker-headline">ηλεκτρολόγος;</p>
		                </div>
		                <div class="item">
		                   <p class="ticker-headline">ελαιοχρωματιστής;</p>
		                </div>
		                 <div class="item">
		                   <p class="ticker-headline">μηχανικός;</p>
		                </div>
		                <div class="item">
		                  <p class="ticker-headline">μεταφορέας;</p>
		                </div>
		            </div>
		           </div>
					<span class="h1-span-sing-up">Εάν ναι, τότε υπάρχουν καθημερινά νέες δουλειές που περιμένουν να τις αναλάβεις!</span>
				</h1>

				<h3 class="h3-sing-up">Βρες εύκολα νέες δουλειές και κέρδισε περισσότερα χρήματα</h3>
				
			</div>
				<div class="col-md-4 ">
					<div class="sing-up-form-outer">
							<form id="msform">
								<fieldset class="first">
									<h4 class="fieldset-h4">Δημιουργία νέου λογαριασμού</h4>
									<p class="sing-up-name">Ξεκινήστε την εγγραφή σας!</p>
								    <p><input placeholder="Όνομα.." class="fname" name="fname"></p>
								    <p><input placeholder="Επίθετο.." class="lname" name="lname"></p>
								    <p><input placeholder="Εmail.." class="sing_up_email" name="sing_up_email" type="email"></p>
								    <p class="p-outer-tel"><input placeholder="Κινητό Τηλέφωνο.." class="sing_up_til" name="sing_up_til" type="tel"></p>
								    <p class="sms-msg">*Θα λάβετε δωρεάν μήνυμα επιβεβαίωσης.</p>
								    <input type="button" onclick="validateFirstStep();"  name="next" class="nextstep action-button" value="Επόμενο" />
								</fieldset>

								<fieldset class="second">
									<h4 class="fieldset-h4">Επαγγελματικά στοιχεία</h4>
								   	<p><input placeholder="Επωνυμία.." class="companyName" name="companyName"></p>
								    <p><select class="select-idiotita">
								    	<option>Ελεύθερος επαγγελματίας</option>
								    	<option>Εταιρεία</option>
								    	<option>Άλλο</option>
								    </select></p>

								    <p><?php echo $select_job; ?></p>

								    <p>
								    	<select class="hear_us">
											<option value="-1">Πώς μάθατε για εμάς;</option>
											<option value="2">Google</option>
											<option value="3">Άλλο site</option>
											<option value="4">Σύσταση</option>
											<option value="6">Facebook</option>
											<option value="7">Άλλο</option>
											<option value="8">Το χρησιμοποιώ</option>
										</select>
								    </p>
									<input type="button" onclick="validateSecondStep();" name="next" class="nextstep action-button" value="Επόμενο" />
									<input type="button" onclick="returnPrevious($(this));" name="previous" class="previous action-button" value="Προηγούμενο" />
								</fieldset>
								<fieldset class="third">
									<h4 class="fieldset-h4">Ολοκλήρωση Εγγραφής</h4>
									<div id="error_header" class="alert alert-danger"><ul></ul></div>
								   	<p><input placeholder="Κωδικός επιβεβαίωσης που λάβατε με SMS.." class="validationCode" name="validationCode"></p>
								   	<input  class="smsCode" name="smsCode" value="" type="hidden">
								   	<p><input placeholder="Προσωπικός Κωδικός" class="your_pass" name="your_pass" type="password"></p>
								   	<p><input placeholder="Επαναλάβετε τον Κωδικό σας" class="repeat_pass" name="repeat_pass" type="password"></p>
								   	<p><input type="checkbox" class="terms-conditions" name="terms-conditions"> Συμφωνώ με τους <a href="https://myconstructor.gr/cms_pages/view_cms/terms_of_use">Όρους Χρήσης</a> του myConstructor</p>
								   	<div onclick="validateLastStep();" class="submit-btn nextstep action-button"><i class="fa fa-check-circle-o"></i> Καταχώρηση</div>
								    <input type="button" onclick="returnPrevious($(this));"  name="previous" class="previous action-button" value="Προηγούμενο" />
								</fieldset>
								<fieldset class="fieldset-thank-you">
								    <p class="success-msg-sing-up"><i class="fa fa-check-circle-o"></i><br/>Συγχαρητήρια! Ο λογαριασμός σας δημιουργήθηκε επιτυχώς!</p>
								    <a href="#"><div class="submit-btn nextstep action-button"><span class="glyphicon glyphicon-log-in"></span> Σύνδεση</div></a>
								</fieldset>
							</form>

					</div>

					
				
	          		<p class="sing-up-form-msg">Εγγραφείτε στο MyConstructor.gr και γίνετε ένας από τους πολλούς επαγγελματίες που βλέπουν τους πελάτες και τον τζίρο τους να αυξάνεται!</p>
	       		 </div>


				

			</div>

		</div>
	</div>

<script type="text/javascript">

	$('.carousel').carousel({
  		interval: 3000,
  		pause: "false"
	})




</script>

<script src="js/core.js" type="text/javascript"></script>
<script src="js/sing-up-form.js" type="text/javascript"></script>

<?php 
	include('footer.php');

?>