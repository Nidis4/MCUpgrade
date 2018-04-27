<?php 
	include('../header.php');
	include('../menu.php');
	include('../search.php');
?>
<div class="container-fluid container-how-it-works">
	<div class="row">
		<div class="col-md-12">
			<h4>How It Works?</h4>
			<p>Lets see how this works, select your status below</p>
		</div>
	</div>
</div>
<div class="container-fluid container-how-it-content">
	<div class="row row-how-it-menu">
		<div class="how-it-menu">
			<ul class="ul-how-it">
				<li><div class="customer">Είμαι Ιδιοκτητής Έργου</div></li>
				<li><div class="worker">Είμαι Επαγγελματίας</div></li>
			</ul>
		</div>
	</div>
	<div class="row row-how-it-content">
		<div class="content-customer">
			<div class="col-md-12 col-equal-height-outer">
				<div class="col-sm-3 how-it-icon-right">
					<img src="../img/how_it_works_4.jpg" />
				</div>
				<div class="col-sm-9 how-it-text">
					<h4>Συμπλήρωσε τη φόρμα</h4>
					<p>Μπες στη πλατφόρμα συμπλήρωσε την φόρμα για την τεχνική εργασία που επιθυμείς και βρες τον επαγγελματία που ταιριάζει περισσότερο στις ανάγκες σου. Η συμπλήρωση της πλατφόρμας γίνεται άμεσα και ΔΩΡΕΑΝ χωρίς καμία δέσμευση εκ μέρους σου.</p>
				</div>
			</div>

			<div class="col-md-12 col-equal-height-outer">
				
				<div class="col-sm-9 how-it-text">
					<h4>Πάρε τηλέφωνο</h4>
					<p>Αν δεν σου αρέσουν οι φόρμες αλλά θέλεις να μιλήσεις με πραγματικό άνθρωπο κατευθείαν. Μπες στο κατάλογο και βρες τον επαγγελματία που σου ταιριάζει καλύτερα βάση των πραγματικών αξιολογήσεων και κανόνισε το ραντεβού σου! Αν δεν ξέρεις ποιος επαγγελματίας σου ταιριάζει καλύτερα κάλεσε μας το 210 300 93 23 και θα σου βρούμε εμείς  την λύση.</p>
				</div>
				<div class="col-sm-3 how-it-icon-left">
					<img src="../img/how_it_works_5.jpg" />
				</div>
			</div>

			<div class="col-md-12 col-equal-height-outer">
				<div class="col-sm-3 how-it-icon-right">
					<img src="../img/how_it_works_6.jpg" />
				</div>
				<div class="col-sm-9 how-it-text">
					<h4>Αξιολόγησε τον Επαγγελματία σου</h4>
					<p>Όταν τελειώσεις με τη δουλεία σου, αξιολόγησε τον επαγγελματία σου για την ποιότητα των υπηρεσιών, την αξιοπιστία του και το αποτέλεσμα. Έτσι, θα βοηθήσεις και τους άλλους σαν και εσένα να κάνουν τη σωστή επιλογή! Όσο περισσότερες οι αξιολογήσεις τόσο πιο εύκολη η επιλογή σου την επόμενη φορά που θα διαλέξεις την πλατφόρμα μας!</p>
				</div>
			</div>
			<div class="col-md-12">
				<a href="<?php echo $api_url; ?>directory.php"><div class="btn-how-it">Κατάλογος Επαγγελματιών</div></a>
			</div>
		</div>
			<div class="content-worker">
				<div class="col-md-12 how-it-text">
					<h4>Επικοινώνησε μαζί μας</h4>			 
					<p>Αν είσαι επαγγελματίας και θέλεις να συνεργαστείς μαζί μας; Κάλεσε μας στο 210 300 93 34 ή στείλε μας mail στο hr@myconstructor.gr Αν είσαι τύπος που τα πάει καλά με τη τεχνολογία συμπλήρωσε την φόρμα που θα βρεις εδώ και κάνε την εγγραφή σου στη πλατφόρμα.</p>
					<p>Το MyConstructor αναζητεί πάντοτε νέους επαγγελματίες για συνεργασία, οπότε μην χάνεις χρόνο! Γίνε και εσύ συνεργάτης της Νο 1 πλατφόρμας για όλες τις τεχνικές εργασίες.</p>
	 			</div>
				 <div class="col-md-12 how-it-text">
					 <h4>Δημιούργησε το προφιλ σου</h4>	
					<p>Σαν συνεργάτης του MyConstructor θα έχεις πρόσβαση στη πλατφόρμα όπου θα μπορείς να έχεις το δικό σου προφίλ. Στο προφίλ σου θα ανεβάζεις φωτογραφίες από τα έργα σου και τις δουλειές σου. Το προφίλ σου είναι ο δικός σου χώρος για να λάμψεις με τις επαγγελματικές σου ικανότητες. Στο προφίλ σου επίσης θα φαίνονται και οι αξιολογήσεις των πελατών που έχεις εξυπηρετήσει</p>
				</div>
				<div class="col-md-12">
				<a href="<?php echo $api_url; ?>sign_up.php"><div class="btn-how-it">Δημιουργία Προφίλ</div></a>
			</div>
		  </div>
		  
			
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.ul-how-it div.customer').click(function(){
			$('.ul-how-it div.customer').css('background','#fff');
			$('.ul-how-it div.customer').css('color','#333');

			$('.ul-how-it div.worker').css('background','#004a86');
			$('.ul-how-it div.worker').css('color','#fff');

			$('.content-customer').css('display','block');
			$('.content-worker').css('display','none');
		});

		$('.ul-how-it div.worker').click(function(){
			$('.ul-how-it div.worker').css('background','#fff');
			$('.ul-how-it div.worker').css('color','#333');

			$('.ul-how-it div.customer').css('background','#004a86');
			$('.ul-how-it div.customer').css('color','#fff');

			$('.content-worker').css('display','block');
			$('.content-customer').css('display','none');
		});
	});
</script>

<?php
	include('../footer.php');
 ?>