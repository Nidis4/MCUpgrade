<?php 
include('header.php');
include('menu.php');
?>

<!-- <div class="contianer-fluid container-bg">
	<div class="row"></div>
</div> -->

<div class="contianer-fluid container-form">
	<div class="row row-form">
		<div class="col-md-8 colmd-form col-sm-8">
			<div class="col-title">
				 <h2>Γενική Ανακαίνιση Σπιτιού</h2>
				 <p class="sub-title">Συμπλήρωσε τη φόρμα ανακαίνισης και λάβε άμεσα μία προσφορά προσαρμοσμένη στις επιθυμίες και τις ανάγκες του χώρου σου.</p>
			</div>
			<div class="col-questions">

				<p class="p-question">Τι είδους ανακαίνιση χρειάζεστε;</p> 
				<label class="label-check-box">Γενική Ανακαίνιση
				  <input class="geniki-anakainisi-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Ανακαίνιση Κουζίνας
				  <input class="anakainisi-kouzinas-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Ανακαίνιση Μπάνιου
				  <input class="anakainisi-mpaniou-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Ανακαίνιση Υπνοδωματίου
				  <input class="anakainisi-ypnodomatiou-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Ανακαίνιση Σαλονιού
				  <input class="anakainisi-saloniou-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Εξωτερική Ανακαίνιση Σπιτιού
				  <input class="eksoteriki-anakinisi-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<span class="msg-error-idos-anakainisis"><i class="fa fa-warning"></i> Παρακαλούμε κάντε τουλάχιστον μια επιλογή!</span>		
			</div>

			<div class="col-questions">
				<p class="p-question">Πόσα τετραγωνικά μέτρα είναι ο χώρος προς ανακαίνιση; <input class="removal-tm" type="number" value="" placeholder="" > <span>m<sup>2</sup></span></p>

			     <span class="msg-error-tm-anakainisis"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε περίπου πόσα τετραγωνικά είναι ο χώρος!</span>
					
			</div>


			<div class="col-questions">
				<p class="p-question">Ποιες από τις παρακάτω εργασίες περιλαμβάνονται στην ανακαίνιση σας;</p>

				<label class="label-check-box">Σοβατίσμα & Ελαιοχρωματισμοί
				  <input class="paint-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Τοποθέτηση πόρτας ασφαλείας
				  <input class="porta-asfaleias-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Αντικατάσταση/Τοποθέτηση κουφωμάτων
				  <input class="koufomata-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Εσωτερικές πόρτες
				  <input class="esoterikies-portes-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Ηλεκτρολογικές εργασίες
				  <input class="ilektrologikes-ergasies-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Υδραυλικές εργασίες
				  <input class="ydraulikes-ergasies-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Αντικατάσταση/Τοποθέτηση συστήματος θέρμανσης
				  <input class="systimata-thermansis-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Αποξύλωση/Τοποθέτηση Δαπέδων
				  <input class="dapeda-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Κατασκευή Τζακιού
				  <input class="tzaki-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>

				<label class="label-check-box">Συστήματα σκίασης τέντες, υπόστεγα
				  <input class="skiasis-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>

			   
				<span class="msg-error-ergasies-anakainisis"><i class="fa fa-warning"></i> Παρακαλούμε κάντε τουλάχιστον μια επιλογή!</span>
			</div>


			<div class="col-questions div-paint-rooms">
				<p class="p-question">Επιλέξτε τους χώρους που θα χρειαστείτε Σοβατίσματα & Ελαιοχρωματισμούς.</p>

				<label class="label-check-box">Σαλόνι
				  <input class="elaioxromatismoi-saloni-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Κουζίνα
				  <input class="elaioxromatismoi-kouzina-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Μπάνιο
				  <input class="elaioxromatismoi-mpanio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Υπνοδωμάτια
				  <input class="elaioxromatismoi-upnodomatio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Τραπεζαρία, χωλ, γραφείο, άλλοι χώροι
				  <input class="elaioxromatismoi-alloixoroi-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
	
			</div>

			<div class="col-questions div-koufomata">
				<p class="p-question">Επιλέξτε τους χώρους που θα χρειαστείτε Κουφώματα.</p>

				<label class="label-check-box">Σαλόνι
				  <input class="koufomata-saloni-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Κουζίνα
				  <input class="koufomata-kouzina-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Μπάνιο
				  <input class="koufomata-mpanio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Υπνοδωμάτια
				  <input class="koufomata-upnodomatio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Τραπεζαρία, χωλ, γραφείο, άλλοι χώροι
				  <input class="koufomata-alloixoroi-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
	
			</div>

			

			<div class="col-questions div-dapeda">
				<p class="p-question">Επιλέξτε τους χώρους που επιθυμείτε να αλλάξετε δάπεδο.</p>

				<div><label class="label-check-box">Σαλόνι
				  <input class="dapeda-saloni-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label></div>
				<label class="label-check-box">Κουζίνα
				  <input class="dapeda-kouzina-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Μπάνιο
				  <input class="dapeda-mpanio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Υπνοδωμάτια
				  <input class="dapeda-upnodomatio-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
				<label class="label-check-box">Τραπεζαρία, χωλ, γραφείο, άλλοι χώροι
				  <input class="dapeda-alloixoroi-checkbox" type="checkbox">
				  <span class="checkmark"></span>
				</label>
	
			</div>

			
			

			<div class="col-questions">
				<p class="p-question">Έχετε σχέδιο για την ανακαίνιση σας;</p>


				<label class="radio-label">Ναι έχω σχέδιο από μηχανικό. Θέλω μόνο συνεργείο
				  <input type="radio" checked="checked" name="select-sxedio" value="Ναι έχω σχέδιο από μηχανικό. Θέλω μόνο συνεργείο">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Όχι χρειάζομαι καθοδήγηση απο μηχανικό ή εργολάβο
				  <input type="radio" name="select-sxedio" value="Όχι χρειάζομαι καθοδήγηση απο μηχανικό ή εργολάβο">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Όχι αλλα ξέρω περίπου τι θέλω να κάνω
				  <input type="radio" name="select-sxedio" value="Όχι αλλα ξέρω περίπου τι θέλω να κάνω">
				  <span class="checkmark"></span>
				</label>

	
			</div>

			<div class="col-questions">
				<p class="p-question">Είστε ιδιοκτήτης ή ενοικιαστής του ακινήτου;</p>
				<label class="radio-label">Είμαι ιδιοκτήτης
				  <input type="radio" checked="checked" name="idioktitis_enikiastis" value="Είμαι ιδιοκτήτης">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Είμαι ενοικιαστής
				  <input type="radio" name="idioktitis_enikiastis" value="Είμαι ενοικιαστής">
				  <span class="checkmark"></span>
				</label>
			</div>

			

			<div class="col-questions">
				<p class="p-question">Σε ποια περιοχή βρίσκεται το ακίνητο σας;</p>
				<select class="select_perioxi">
					<!--<option>Αθήνα Κέντρο</option>
					<option>Βόρεια Προάστια</option>
					<option>Νότια Προάστια</option>
					<option>Ανατολικά Προάστια</option>
					<option>Δυτικά Προάστια</option>
					<option>Πειραιάς</option>-->
					<option>Αγία Παρασκευή Αττικής‎</option>
					<option>Δήμος Αγίας Βαρβάρας Αττικής‎</option> 
					<option>Δήμος Αγίων Αναργύρων - Καματερού‎</option>
					<option>Δήμος Αθηναίων‎</option> 
					<option>Αιγάλεω‎</option>
					<option>Αίγινα‎</option>
					<option>Δήμος Ασπροπύργου‎ </option>
					<option>Δήμος Αχαρνών‎ </option>
					<option>Δήμος Βάρης - Βούλας - Βουλιαγμένης‎ </option>
					<option>Βριλήσσια‎ </option>
					<option>Δήμος Βύρωνα‎ </option>
					<option>Δήμος Γαλατσίου‎ </option>
					<option>Δήμος Γλυφάδας‎ </option>
					<option>Δήμος Δάφνης - Υμηττού‎ </option>
					<option>Δήμος Διονύσου‎</option>
					<option>Δήμος Ελευσίνας‎ </option>
					<option>Δήμος Ελληνικού - Αργυρούπολης‎ </option>
					<option>Δήμος Ζωγράφου‎ </option>
					<option>Δήμος Καισαριανής‎ </option>
					<option>Δήμος Καλλιθέας‎ </option>
					<option>Δήμος Κερατσινίου - Δραπετσώνας‎ </option>
					<option>Δήμος Κηφισιάς‎ </option>
					<option>Δήμος Κορυδαλλού‎ </option>
					<option>Δήμος Κρωπίας‎ </option>
					<option>Κύθηρα‎ </option>
					<option>Δήμος Λαυρεωτικής‎ </option>
					<option>Δήμος Μάνδρας - Ειδυλλίας‎ </option>
					<option>Δήμος Μεγαρέων‎ </option>
					<option>Δήμος Μοσχάτου - Ταύρου‎ </option>
					<option>Νέα Ιωνία Αττικής‎ </option>
					<option>Νέα Σμύρνη‎ </option>
					<option>Δήμος Νίκαιας - Αγίου Ιωάννη Ρέντη‎ </option>
					<option>Δήμος Παιανίας‎ </option>
					<option>Δήμος Παλαιού Φαλήρου‎ </option>
					<option>Δήμος Παλλήνης Αττικής‎ </option>
					<option>Δήμος Παπάγου-Χολαργού‎ </option>
					<option>Δήμος Πειραιώς‎ </option>
					<option>Δήμος Πεντέλης‎ </option>
					<option>Δήμος Περάματος Αττικής‎</option>
					<option>Περιστέρι Αττικής‎ </option>
					<option>Δήμος Πεύκης-Λυκόβρυσης‎ </option>
					<option>Πόρος‎</option>
					<option>Δήμος Ραφήνας - Πικερμίου‎</option> 
					<option>Σαλαμίνα‎ </option>
					<option>Δήμος Σαρωνικού‎</option>
					<option>Δήμος Σπάτων - Αρτέμιδος‎</option>
					<option>Σπέτσες‎ </option>
					<option>Δήμος Τροιζηνίας‎ </option>
					<option>Ύδρα‎ </option>
					<option>Δήμος Φιλαδελφείας-Χαλκηδόνος‎</option>
					<option>Δήμος Φιλοθέης-Ψυχικού‎</option>
					<option>Δήμος Φυλής‎ </option>
					<option>Δήμος Χαϊδαρίου‎ </option>
					<option>Χαλάνδρι‎ </option>
				</select>
			</div>


			<div class="col-questions">
				<p class="p-question">Επιλέξτε μια επιλογή για την προσφοράς σας.</p>
				<label class="radio-label">Προτιμώ επίσκεψη για λεπτομερή επιμέτρηση & τελική προσφορά
				  <input type="radio" checked="checked" name="episkepsi" value="Προτιμώ επίσκεψη για λεπτομερή επιμέτρηση & τελική προσφορά">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Προτιμώ κατά προσέγγιση ενδεικτικό κόστος
				  <input type="radio" name="episkepsi" value="Προτιμώ κατά προσέγγιση ενδεικτικό κόστος">
				  <span class="checkmark"></span>
				</label>
				
			</div>

			<div class="col-questions">
				<p class="p-question">Πότε σκέφτεστε να ξεκινήσετε την ανακαίνιση σας;</p>
				<label class="radio-label">Τις επόμενες 10 ημέρες
				  <input type="radio" checked="checked" name="anakainisi-pote" value="Τις επόμενες 10 ημέρες">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Τις επόμενες 30 ημέρες
				  <input type="radio" name="anakainisi-pote" value="Τις επόμενες 30 ημέρες">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Σε 1-3 μήνες
				  <input type="radio" name="anakainisi-pote" value="Σε 1-3 μήνες">
				  <span class="checkmark"></span>
				</label>
				<label class="radio-label">Σε πάνω από 3 μήνες
				  <input type="radio" name="anakainisi-pote" value="Σε πάνω από 3 μήνες">
				  <span class="checkmark"></span>
				</label>
				
			</div>

			<div class="col-questions">
				<p class="p-question">Συμπληρώστε προαιρετικά το μέγιστο προϋπολογισμό που διαθέτετε για το έργο σας.</p>
				<input class="budget" type="number" placeholder="3000"><span> €</span>
				
			</div>

			<div class="col-questions">
				<p class="p-question">Συμπληρώστε το email σας:</p>
				<input class="emailaddress" type="email" placeholder="xxx@gmail.com">
				<span class="msg-error-email-anakainisis"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε σωστά το email σας!</span>
			</div>
			<div class="col-questions">
				<p class="p-question">Συμπληρώστε τον αριθμός του κινητού τηλεφώνου σας:</p>
				<input class="phonenumber" placeholder="6900000000" type="tel" >
				<span class="msg-error-tel-anakainisis"><i class="fa fa-warning"></i> Παρακαλούμε συμπληρώστε σωστά το τηλέφωνο σας!</span>
				
			</div>

			<div class="col-questions">
				<p class="p-question">Επιπλέον σχόλια:</p>
				<textarea class="renovation-msg"></textarea>
			</div>

			<div onclick="validation();" class="btn-submit"><i class="fa fa-check-circle-o"></i> Καταχώρηση</div>

			<span class="validation-msg"></span>
			

		</div>

		<div class="col-md-4 col-4-why-mcr-outer col-sm-4">
			<div class="col-4-why-mcr">
				<h3 class="h3-why-mcr">Γιατί να επιλέξετε το MyConstructor.gr;</h3>

				<div class="sep-why-mcr"></div>
			
				<p><span class="icon"><i class="fa fa-check"></i></span> <span class="text">Συνεργαζόμαστε με εξειδικευμένα συνεργεία με πολυετή εμπειρία στο χώρο.</span></p>

				<p><span class="icon"><i class="fa fa-check"></i></span> <span class="text">Δημιουργούμε για κάθε πελάτη ένα προσωπικό πακέτο ανακαίνισης που να ικανοποιεί τις προσδοκίες σας.</span></p>


				<p><span class="icon"><i class="fa fa-check"></i></span> <span class="text">Καθ’ όλη τη διάρκεια της ανακαίνισης είμαστε δίπλα σας για τυχόν προβληματισμούς και συμβουλές.</span></p>

				<p><span class="icon"><i class="fa fa-check"></i></span> <span class="text">Έχουμε καταφέρει να βρούμε τις οικονομικότερες λύσεις από συνεργεία μέχρι υλικά χωρίς εκπτώσεις στην ποιότητα.</span></p>
			
			</div>
		</div>
		

	</div>
	
</div>



<?php 
include('footer.php');
?>