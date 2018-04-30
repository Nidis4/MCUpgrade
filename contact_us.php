<?php 
	include('header.php');
	include('menu.php');
	include('search.php');
?>

<div class="container-fluid container-contact-bg">
	<div class="row">
		<div class="col-md-12">
			<h3>Επικοινωνήστε Μαζί Μας</h3>
		</div>
	</div>	
</div>
<div class="container-fluid container-contact">
	<div class="row">
		<div class="col-md-12 col-contact-titles">
			<h4>Είστε Επαγγελματίας ή Ιδιοκτήτης Έργου;</h4>
			<p>Πείτε μας πώς μπορούμε να σας βοηθήσουμε!</p>
		</div>
		<div class="col-md-4 col-contact-infos">
			<p><span class="span-contact-icon"><i class="fa fa-fax"></i></span> <span class="span-contact-text">Φαξ: 210 300 9627</span></p>
			<p class="contanct-phone"><span class="span-contact-icon"><i class="fa fa-phone" style="padding: 9px 13px; font-size:34px;"></i></span> <span class="span-contact-text">Τηλ: 210 300 9323</span></p>
			<p><span class="span-contact-icon"><i class="fa fa-envelope"></i></span> <span class="span-contact-text">info@myconstructor.gr <br/>support@myconstructor.gr</span></p>
		</div>
		<div class="col-md-8 col-form">
			<div class="row">
				<div class="col-sm-6">
					<p>Όνομα </p> <span class="msg-error-name-contanct"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε το όνομα σας!</span>
					<input type="text" name="contact_name" class="contact_name" />
					
				</div>
				<div class="col-sm-6">
					<p>Email </p><span class="msg-error-email-contanct"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε σωστά το email σας!</span>
					<input type="email" name="contact_email" class="contact_email" />
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>Τηλέφωνο </p><span class="msg-error-tel-contanct"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε σωστά το τηλέφωνο σας!</span>
					<input type="tel" name="contact_tel" class="contact_tel" />
					
				</div>
				<div class="col-sm-6">
					<p>Θέμα </p><span class="msg-error-thema-contanct"><i class="fa fa-warning"></i> Παρακαλούμε επιλέξτε ένα θέμα!</span>
					<select name="contact_for" class="contact_for">
						<option value="0">Επιλέξτε</option>
						<option value="1">Καταχώρηση Έργου</option>
						<option value="3">Εγγραφή Επαγγελματία</option>
						<option value="4">Τεχνικά Θέματα</option>
						<option value="5">Θέμα Marketing</option>
						<option value="6">Άλλο</option>
					</select>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p>Μήνυμα</p>
					<textarea name="contact_msg" class="contact_msg"></textarea>
				</div>
				<div class="col-sm-12">
					<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Ld14hIUAAAAAA5VcsQgmHxo-OM9-Vp35dm-IcIb"></div>
					<p class="p-contact-"><i>Επιβεβαιώστε ότι δεν είστε ρομπότ για να ξεκλειδώσετε το κουμπί Αποστολή!</i></p>
					<button class="contact-send-btn" onclick="contactValidation()" disabled >Αποστολή</button>
					<p class="modal-msg"></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?php echo  $api_url; ?>js/contact.js'></script>
<?php
	include('footer.php');
?>