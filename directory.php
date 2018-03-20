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
			          	<a href="" class="list-group-item">Αλλαγή πρίζας</a>
			            <a href="" class="list-group-item">Αλλαγή διακόπτη</a>
			            <a href="" class="list-group-item">Θερμοσίφωνας</a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
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
			            <a href="" class="list-group-item " data-parent="#MainMenu">Εγκατάσταση Ηλεκτρολογικού Πίνακα</a>
			          	<a href="" class="list-group-item " data-parent="#MainMenu">Εγκατάση Ρελέ</a>
			         	<a href="" class="list-group-item " data-parent="#MainMenu">Αλλαγή Ασφάλειας</a>
			          	<a href="" class="list-group-item " data-parent="#MainMenu">Τράβηγμα Γραμμής από Πίνακα</a>
			          	<a href="" class="list-group-item " data-parent="#MainMenu">Τιμοκατάλογος</a>
			          </div>

			          <a href="#demo4" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Συχνές ηλεκτρολογικές εργασίες  <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo4" aria-expanded="false" style="height: 0px;">
			          	<a href="" class="list-group-item">Αλλαγή πρίζας</a>
			            <a href="" class="list-group-item">Αλλαγή διακόπτη</a>
			            <a href="" class="list-group-item">Θερμοσίφωνας</a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo5" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="true">Φωτισμός <i class="fa fa-caret-down"></i></a>
			          <div class="collapse in" id="demo5" aria-expanded="false" style="">
			          	<a href="" class="list-group-item">Άπεγκατάσταση &amp; εγκατάσταση φωτιστικού</a>
			           	<a href="" class="list-group-item">Αλλαγή λαμπών σποτ σε led</a>
			            <a href="" class="list-group-item">Κρυφός φωτισμός με led</a>
			            <a href="" class="list-group-item">Φωτισμός led</a>
			            <a href="" class="list-group-item">Κρυφός φωτισμός σε γυψοσανίδα</a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
			            
			          </div>
			          <a href="#demo6" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Εγκατάσταση δικτύων <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo6" aria-expanded="false">
			          	
			            <a href="" class="list-group-item">Αλλαγή γραμμής τηλεφώνου</a>
			            <a href="" class="list-group-item">Εξωτερική γραμμή Ethernet</a>
			            <a href="" class="list-group-item">Δίκτυο Infotainment</a>
			            <a href="" class="list-group-item">Σύνδεση ανεξάρτητης γραμμής κεραίας </a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo7" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Θυροτηλέφωνο <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo7" aria-expanded="false">
			            <a href="" class="list-group-item">Εγκατάσταση θυροτηλέφωνου</a>
			            <a href="" class="list-group-item">Εγκατάσταση θυροτηλεόρασης</a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
			          </div>
			          <a href="#demo8" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Συστήματα Ασφαλείας <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo8" aria-expanded="false">
			            <a href="" class="list-group-item">Κάμερες</a>
			            <a href="" class="list-group-item">Συναγερμοί</a>
			            <a href="" class="list-group-item">Τιμοκατάλογος</a>
			          
			          </div>
			          <a href="#demo9" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false">Πιστοποιητικά <i class="fa fa-caret-down"></i></a>
			          <div class="collapse" id="demo9" aria-expanded="false">
			            <a href="" class="list-group-item">Ενεργειακό πιστοποιητικό ΠΕΑ</a>
			          	<a href="" class="list-group-item">Πιστοποιητικό ΔΕΗ</a>
			          	<a href="" class="list-group-item">Τιμοκατάλογος</a>
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

			<div class="results-title">
					<h1>6 Μεταφορικές <span class="stin-color">στην</span> Αττική</h1>
			</div>


				<nav class="navbar navbar-default directory-filters" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				   
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
				        <ul class="nav navbar-nav filters-menu">

				        	

				            <li class="dropdown mega-dropdown">
							   <a id="open-close-filters" > <i class="fa fa-filter"></i> ΦΙΛΤΡΑ <span class="caret"></span></a>				
								<div id="filters" class="dropdown-menu mega-dropdown-menu">
				                    <div class="container-fluid2">
				    				    <!-- Tab panes -->
				                        <div class="tab-content">
				                         
				                          
				                          <div class="tab-pane active" id="filters-area">
				                          	<div class="col-md-3">
				                          		<label>Νομός</label>
				                                	<select>																							<option value="1" selected="selected">Νομός Αττικής</option>
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
				                                	</select>
				                          	</div>

				                          	<div class="col-md-3">
				                          		<label>Τιμή ή βαθμολογία</label>
				                          		<select>
				                          			<option>χαμηλότερη → υψηλότερη τιμή</option>
				                          			<option>υψηλότερη → χαμηλότερη αξιολόγηση</option>
				                          		</select>
				                          	</div>

				                          	<div class="col-md-3">
				                          		<label>Συνολική βαθμολογία</label>
				                          		<select>
				                          			<option>Τουλάχιστον 5/5 αστέρια</option>
				                          			<option>Τουλάχιστον 4,5/5 αστέρια</option>
				                          			<option>Τουλάχιστον 4/5 αστέρια</option>
				                          		</select>
				                          	</div>

				                          	<div class="col-md-3">
				                          		<label>Αριθμό αξιολογήσεων</label>
				                          		<select>
				                          			<option>Τουλάχιστον 5 αξιολογήσεις</option>
				                          			<option>Τουλάχιστον 10 αξιολογήσεις</option>
				                          			<option>Τουλάχιστον 15 αξιολογήσεις</option>
				                          		</select>
				                          	</div>
				                          </div>
				                          
				                        </div>
				                    </div>
				                    <!-- Nav tabs -->
				                                       
								</div>				
							</li>
							<li class="close-filters"><a><i class="fa fa-times"></i> ΚΛΕΙΣΕ</a></li>
				        </ul>
				       
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

						

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