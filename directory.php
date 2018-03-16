<?php 
	include('header.php');
	include('menu.php');
	include('search.php');
?>

<div class="container-fluid">

	<div class="row row-directory">
		<div class="col-md-3">
			<div class="title-catelog">Κατηγορίες</div>
			<div id="MainMenu">
			        <div class="list-group panel">
			        <a href="#demo2" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Συχνές ηλεκτρολογικές εργασίες  <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo2" aria-expanded="false" style="height: 0px;">
			          	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#priza" class="list-group-item">Αλλαγή πρίζας</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#diakoptis" class="list-group-item">Αλλαγή διακόπτη</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#thermosifonas" class="list-group-item">Θερμοσίφωνας</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          
			          	



			         <a href="#demo3" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Ηλεκτρολογικός Πίνακας <i class="fa fa-caret-down"></i></a>
			          

			          <div class="collapse" id="demo3" aria-expanded="false">
			            <!--<a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1"  >Subitem 1 <i class="fa fa-caret-down"></i></a>
			            <div class="collapse list-group-submenu" id="SubMenu1">
			              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 1 a</a>
			              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 2 b</a>
			              <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
			              <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
			                <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
			                <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
			              </div>
			              <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
			            </div>-->
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikos-pinakas.php#elect-panel" class="list-group-item " data-parent="#MainMenu">Εγκατάσταση Ηλεκτρολογικού Πίνακα</a>
			          	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikos-pinakas.php#rele" class="list-group-item " data-parent="#MainMenu">Εγκατάση Ρελέ</a>
			         	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikos-pinakas.php#asfaleia" class="list-group-item " data-parent="#MainMenu">Αλλαγή Ασφάλειας</a>
			          	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikos-pinakas.php#" class="list-group-item " data-parent="#MainMenu">Τράβηγμα Γραμμής από Πίνακα</a>
			          	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikos-pinakas.php#times" class="list-group-item " data-parent="#MainMenu">Τιμοκατάλογος</a>
			          </div>

			          <a href="#demo4" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Συχνές ηλεκτρολογικές εργασίες  <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo4" aria-expanded="false" style="height: 0px;">
			          	<a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#priza" class="list-group-item">Αλλαγή πρίζας</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#diakoptis" class="list-group-item">Αλλαγή διακόπτη</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#thermosifonas" class="list-group-item">Θερμοσίφωνας</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/ilektrologikes-ergasies.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo5" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="true">Φωτισμός <i class="fa fa-caret-down"></i></a>
			          <div class="collapse in" id="demo5" aria-expanded="false" style="">
			          	<a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#fwtistiko" class="list-group-item">Άπεγκατάσταση &amp; εγκατάσταση φωτιστικού</a>
			           	<a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#allagiled" class="list-group-item">Αλλαγή λαμπών σποτ σε led</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#krufosled" class="list-group-item">Κρυφός φωτισμός με led</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#fwtismosled" class="list-group-item">Φωτισμός led</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#ledgypsosanida" class="list-group-item">Κρυφός φωτισμός σε γυψοσανίδα</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/fwtismos.php#times" class="list-group-item">Τιμοκατάλογος</a>
			            
			          </div>
			          <a href="#demo6" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Εγκατάσταση δικτύων <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo6" aria-expanded="false">
			          	
			            <a href="https://myconstructor.gr/services/ilektrologos/diktya.php" class="list-group-item">Αλλαγή γραμμής τηλεφώνου</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/diktya.php" class="list-group-item">Εξωτερική γραμμή Ethernet</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/diktya.php" class="list-group-item">Δίκτυο Infotainment</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/diktya.php" class="list-group-item">Σύνδεση ανεξάρτητης γραμμής κεραίας </a>
			             <a href="https://myconstructor.gr/services/ilektrologos/diktya.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo7" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Θυροτηλέφωνο <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo7" aria-expanded="false">
			            <a href="https://myconstructor.gr/services/ilektrologos/thirotilefona.php#thirotil" class="list-group-item">Εγκατάσταση θυροτηλέφωνου</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/thirotilefona.php#thirotel" class="list-group-item">Εγκατάσταση θυροτηλεόρασης</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/thirotilefona.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo8" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Συστήματα Ασφαλείας <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo8" aria-expanded="false">
			            <a href="https://myconstructor.gr/services/ilektrologos/cameres.php" class="list-group-item">Κάμερες</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/sunagermos.php" class="list-group-item">Συναγερμοί</a>
			            <a href="https://myconstructor.gr/services/ilektrologos/cameres.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          
			          </div>
			          <a href="#demo9" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Πιστοποιητικά <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo9" aria-expanded="false">
			            <a href="https://myconstructor.gr/services/ilektrologos/energeiako-pistopoihtiko.php" class="list-group-item">Ενεργειακό πιστοποιητικό ΠΕΑ</a>
			          	<a href="https://myconstructor.gr/services/ilektrologos/pistopoihtiko-deh.php" class="list-group-item">Πιστοποιητικό ΔΕΗ</a>
			          	<a href="https://myconstructor.gr/services/ilektrologos/pistopoihtiko-deh.php#times" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			        </div>
      			</div>	
		</div>
		

		<div class="col-md-9">
			<div class="directory-breadcrumb">
				<ul class="ul-breadcrumb">
					<li>Αρχική</li>
					<li>Μετακομίσεις</li>
					<li>Μετακόμιση Γκαρσονιέρας</li>
					<li>Αττική</li>
				</ul>

			</div>

			<div class="app-small-description-outer">
				<div class="app-small-desc-title">
					<h3 class="h3-small-desc-title"><span class="span-small-desc-title">Μετακόμιση Γκαρσονιέρας</span></h3>
				</div>
				<div class="offer-details">H προσφορά περιλαμβάνει:</div>
				
			</div>
			<div class="app-small-description">
					<p>Γκαρσονιέρας έως 30τμ. Η τιμή περιλαμβάνει την μετακόμιση των αντικειμένων με φορτηγό, μεταφορά για οικοσυσκευές και έπιπλά. (π.χ. πλυντήριο, στεγνωτήριο, ψυγείο, κουζίνα, τραπεζαρία, συνθετο, κ.α.), 10-15 κούτες, μέχρι 5 κανονικές γλάστρες. Εφόσον χρειαστούν επιπλέον άτομα για την μετακόμιση ή ανυψωτικό, χρεώνονται επιπλέον.</p>
				</div>
			<div class="results-title"><h1>6 Μεταφορικές <span class="stin-color">στην</span> Αττική</h1></div>

						<div class="prof-main-col">
					  		<div class="col-md-3 col-sm-12 professional-img-con">
					  			<div class="professional-img">
					  				<a target="_blank" style="font-size: 17px;float: left;color: #2b347f;font-weight: bold;" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">
					  					<img src="img/matzouranis-1.jpg" style="float: left;" alt="">
					  				</a>
					  			</div>
					  		</div>

					  		<div class="col-md-9 col-sm-12 professional-details-box-con">
									<div class="professional-details-box">
										<div class="professional-info-text">
											<div class="professional-info-text-name">
												<p class="professional-name"><span class="newmemname"><a target="_blank" class="con-name" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">Παναγιώτης Ιωάννατος</a></span></p>
											</div>
											

											<div class="professional-info-text-box">
												<div class="professional-service-area">
													<p><i class="fa fa-map-marker"></i><span> Έδρα Δυτικά Προάστια</span> Εξυπηρετούμε όλη την Αττική </p>
												</div>
												
												<div class="professional-extra-infos">
														<p class="small-description">Εμπειρία 15 ετών σε μεταφορές-μετακομίσεις οικονομικά και άμεσα!</p>
														<div class="price-info">
															<p class="price-for"><span class="professional-cat-labels">Τιμή για: </span>Μετακόμιση Γκαρσονιέρας</p>
														</div>
														<div class="price-info" >
															<p class="price-for"> <span class="professional-cat-labels">Πληροφορίες Χρέωσης:</span>
																<span>Εργάτες +40€, Αναβατόριο +50 για κάθε σπίτι  Δε-Κυ 09:00-22:00</span>
															</p>
														</div>
														

														<div class="Techinical-data"></div>
												</div>
											</div>
										</div>
									</div>

									
							</div>


							<a target="_blank" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">
								<div class="professional-phone-number"><img src="img/new-tel-white.png">Τηλέφωνο</div>
							</a>
							
							

								<div class="professional-address-contact">
									<div class="col-md-12 proffesionalDirectoryReviews">

		                                        <div class="directoryStarsOuter">
		                                            <div class="directoryEmptyBar">
		                                                <div style="width:98%;"></div>
		                                            </div>
		                                        </div>
		                                        <div class="directory-rev-score"><span class="rating-num">4,9</span>/5</div>
		                                       	<div class="directory-total-score"><span class="total-jobs">190</span> Αξιολογήσεις</div>
                                    		</div>

									<div class="price-box">
											<p>49<span class="tax-fpa">€ + φπα</span></p>
									</div>
										<a href="https://myconstructor.gr/transport/?catid=103&amp;memid=18876&amp;appid=69&amp;name=Λευτέρης&amp;surname=Ματζουράνης" target="_blank">
										<div class="btn-prosfora">Κλείσε online</div>
									</a>

										
								</div>
							</div>



							<div class="prof-main-col">
					  		<div class="col-md-3 col-sm-12 professional-img-con">
					  			<div class="professional-img">
					  				<a target="_blank" style="font-size: 17px;float: left;color: #2b347f;font-weight: bold;" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">
					  					<img src="img/matzouranis-1.jpg" style="float: left;" alt="">
					  				</a>
					  			</div>
					  		</div>

					  		<div class="col-md-9 col-sm-12 professional-details-box-con">
									<div class="professional-details-box">
										<div class="professional-info-text">
											<div class="professional-info-text-name">
												<p class="professional-name"><span class="newmemname"><a target="_blank" class="con-name" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">Παναγιώτης Ιωάννατος</a></span></p>
											</div>
											

											<div class="professional-info-text-box">
												<div class="professional-service-area">
													<p><i class="fa fa-map-marker"></i><span> Έδρα Δυτικά Προάστια</span> Εξυπηρετούμε όλη την Αττική </p>
												</div>
												
												<div class="professional-extra-infos">
														<p class="small-description">Εμπειρία 15 ετών σε μεταφορές-μετακομίσεις οικονομικά και άμεσα!</p>
														<div class="price-info">
															<p class="price-for"><span class="professional-cat-labels">Τιμή για: </span>Μετακόμιση Γκαρσονιέρας</p>
														</div>
														<div class="price-info" >
															<p class="price-for"> <span class="professional-cat-labels">Πληροφορίες Χρέωσης:</span>
																<span>Εργάτες +40€, Αναβατόριο +50 για κάθε σπίτι  Δε-Κυ 09:00-22:00</span>
															</p>
														</div>
														

														<div class="Techinical-data"></div>
												</div>
											</div>
										</div>
									</div>

									
							</div>


							<a target="_blank" href="https://myconstructor.gr/Homes/directoryProfile/JSxDLFMtM0BgCmAK">
								<div class="professional-phone-number"><img src="img/new-tel-white.png">Τηλέφωνο</div>
							</a>
							
							

								<div class="professional-address-contact">
									<div class="col-md-12 proffesionalDirectoryReviews">

		                                        <div class="directoryStarsOuter">
		                                            <div class="directoryEmptyBar">
		                                                <div style="width:98%;"></div>
		                                            </div>
		                                        </div>
		                                        <div class="directory-rev-score"><span class="rating-num">4,9</span>/5</div>
		                                       	<div class="directory-total-score"><span class="total-jobs">190</span> Αξιολογήσεις</div>
                                    		</div>

									<div class="price-box">
											<p>49<span class="tax-fpa">€ + φπα</span></p>
									</div>
										<a href="https://myconstructor.gr/transport/?catid=103&amp;memid=18876&amp;appid=69&amp;name=Λευτέρης&amp;surname=Ματζουράνης" target="_blank">
										<div class="btn-prosfora">Κλείσε online</div>
									</a>

										
								</div>
							</div>


							

						</div>

						







		</div>



	</div>
</div>

<?php include('footer.php'); ?>