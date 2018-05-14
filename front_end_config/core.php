<!--core front end -->
<?php
	//$api_url= "http://localhost/MCUpgrade/";
	$api_url= "https://upgrade.myconstructor.gr/";
	
	$directory_url ="directory.php";
	$directory_url ="katalogos/";
	$directory_url = $api_url . $directory_url;

	$profile_url = "profile.php";
	$profile_url = "profile/";
	$profile_url = $api_url . $profile_url;

	$signup_url = "sign_up.php";
	$signup_url = $api_url . $signup_url;

	$portfolio_url = $api_url . 'img/professional-imgs/portfolio/';

	


	$select_counties ='<select class="counties">
				                                		<option value="1" selected="selected">Νομός Αττικής</option>
														<option value="2">Νομός Θεσσαλονίκης</option>
														<option value="3">Νομός Αχαΐας</option>
														<option value="4">Νομός Αιτωλοακαρνανίας</option>
														<option value="5">Νομός Αργολίδας</option>
														<option value="6">Νομός Αρκαδίας</option>
														<option value="7">Νομός Άρτας</option>
														<option value="8">Νομός Βοιωτίας</option>
														<option value="9">Νομός Γρεβενών</option>
														<option value="10">Νομός Δράμας</option>
														<option value="11">Νομός Δωδεκανήσου</option>
														<option value="12">Νομός Έβρου</option>
														<option value="13">Νομός Εύβοιας</option>
														<option value="14">Νομός Ευρυτανίας</option>
														<option value="15">Νομός Ζακύνθου</option>
														<option value="16">Νομός Ηλείας</option>
														<option value="17">Νομός Ημαθίας</option>
														<option value="18">Νομός Ηρακλείου</option>
														<option value="19">Νομός Θεσπρωτίας</option>
														<option value="20">Νομός Ιωαννίνων</option>
														<option value="21">Νομός Καβάλας</option>
														<option value="22">Νομός Καρδίτσας</option>
														<option value="23">Νομός Καστοριάς</option>
														<option value="24">Νομός Κέρκυρας</option>
														<option value="25">Νομός Κεφαλληνίας</option>
														<option value="26">Νομός Κιλκίς</option>
														<option value="27">Νομός Κοζάνης</option>
														<option value="28">Νομός Κορινθίας</option>
														<option value="29">Νομός Κυκλάδων</option>
														<option value="30">Νομός Λακωνίας</option>
														<option value="31">Νομός Λάρισας</option>
														<option value="32">Νομός Λασιθίου</option>
														<option value="33">Νομός Λέσβου</option>
														<option value="34">Νομός Λευκάδας</option>
														<option value="35">Νομός Μαγνησίας</option>
														<option value="36">Νομός Μεσσηνίας</option>
														<option value="37">Νομός Ξάνθης</option>
														<option value="38">Νομός Πέλλας</option>
														<option value="39">Νομός Πιερίας</option>
														<option value="40">Νομός Πρέβεζας</option>
														<option value="41">Νομός Ρεθύμνης</option>
														<option value="42">Νομός Ροδόπης</option>
														<option value="43">Νομός Σάμου</option>
														<option value="44">Νομός Σερρών</option>
														<option value="45">Νομός Τρικάλων</option>
														<option value="46">Νομός Φθιώτιδας</option>
														<option value="47">Νομός Φλώρινας</option>
														<option value="48">Νομός Φωκίδας</option>
														<option value="49">Νομός Χαλκιδικής</option>
														<option value="50">Νομός Χανίων</option>
														<option value="51">Νομός Χίου</option>
														<option value="52">Άγιο Όρος</option>
														<option value="53">Ελλάδα</option>
				                                	</select>';	


	$select_job = '<select class="select-job">
							<option selected="selected" value="-1">Ειδικότητα</option>
							<option value="126">Προσφορές</option>
							<option value="31">Γενική Φόρμα</option>
							<option value="41">Ανακαίνιση</option>
							<option value="132">Αποθήκευση Επίπλων</option>
							<option value="71">Οικοδομική Άδεια</option>
							<option value="72">Αρχιτεκτονικά Σχέδια</option>
							<option value="105">Άδεια Μικρής Κλίμακας</option>
							<option value="56">Ασανσέρ</option>
							<option value="102">Απολυμάνσεις</option>
							<option value="116">Αποφράξεις</option>
							<option value="54">Βάψιμο</option>
							<option value="104">Βεβαίωση Μηχανικού</option>
							<option value="133">Βιολογικός Καθαρισμός Αυτοκινήτου</option>
							<option value="111">Γέμισμα Τσιμεντοκονίας</option>
							<option value="55">Γυψοσανίδες Τσιμεντοσανίδες</option>
							<option value="64">Ενδοδαπέδια Θέρμανση</option>
							<option value="62">Δάπεδα Μπετού</option>
							<option value="43">Ενεργειακό Πιστοποιητικό</option>
							<option value="100">Επισκευή Λευκών Συσκευών</option>
							<option value="125">Θερμογραφία</option>
							<option value="32">Θερμομόνωση τοίχων</option>
							<option value="58">Ηλεκτρολόγος</option>
							<option value="117">Ηλεκτρονικός</option>
							<option value="134">Ηλεκτρολογική Ανακαίνιση</option>
							<option value="68">Κάδοι για Μπάζα</option>
							<option value="66">Ενεργειακά Τζάκια</option>
							<option value="101">Καθαρισμός Στρωμάτων</option>
							<option value="110">Καθαρισμός Τζακιού</option>
							<option value="112">Καθαρισμός Σαλονιού</option>
							<option value="114">Καθαρισμός Χαλιών</option>
							<option value="122">Κλειδαράς</option>
							<option value="57">Κλιματιστικό</option>
							<option value="42">Κουφώματα</option>
							<option value="109">Μάρμαρα</option>
							<option value="33">Μόνωση Ταράτσας</option>
							<option value="103">Μεταφορές - Μετακομίσεις</option>
							<option value="115">Ξύλινα Δάπεδα</option>
							<option value="73">Νομιμοποίηση Αυθαιρέτων</option>
							<option value="120">Ντουλάπες</option>
							<option value="63">Πατητή Τσιμεντοκονία</option>
							<option value="121">Ντουλάπια Κουζίνας</option>
							<option value="60">Πιστοποιητικό ΔΕΗ</option>
							<option value="44">Προκατασκευασμένα Σπίτια</option>
							<option value="128">Πλήρης Ανακαίνιση Κουζίνας</option>
							<option value="130">Πόρτες</option>
							<option value="136">Πετρέλαιο Θέρμανσης </option>
							<option value="67">Σκαλωσιές</option>
							<option value="65">Σοβάτισμα</option>
							<option value="119">Τεχνικός Ασφαλείας για επαγγελματικούς χώρους Α &amp; Β Κατηγορίας</option>
							<option value="129">Συναγερμοί- Κάμερες Ασφαλείας</option>
							<option value="118">Τεχνικός Ασφαλείας </option>
							<option value="123">Τέντες</option>
							<option value="127">Τεχνικός Υπολογιστών</option>
							<option value="137">Τοποθέτηση Δαπέδου PVC</option>
							<option value="113">Τοποθέτηση Δαπέδου Τύπου Laminate</option>
							<option value="135">Τοποθέτηση Ταπετσαρίας Τοίχου</option>
							<option value="70">Τοπογραφικό</option>
							<option value="61">Τοποθέτηση Πλακιδίων</option>
							<option value="59">Υδραυλικός</option>
							<option value="69">Χωματουργικές Εργασίες</option>
							<option value="106">Συντήρηση Καυστήρα</option>
							<option value="107">Συνεργεία καθαρισμού</option>
					</select>';


?>