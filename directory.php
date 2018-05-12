<?php
   include('functions.php');


   include('constants.php'); 
   include('front_end_config/core.php');

   $categories = file_get_contents($api_url .'webservices/api/category/read.php');
   $categories = json_decode($categories, true); // decode the JSON into an associative array
   
   $SelectedCatId=0;
   $SelectedAppId = 0;
   $url_county=1;

   $hasCategory = false;
   $hasApplication = false;
   


   $select_county = file_get_contents($api_url .'webservices/api/county/read_one_county.php?county_id='.$url_county);
   $select_county = json_decode($select_county, true);

   $url_county= $select_county['id'];

   $county_name_gr = $select_county['county_name_gr'];
   $county_display_name_gr = $select_county['display_name_gr'];
   $county_permalink = $select_county['permalink'];


   if(isset($_GET['cat_title'])){
   		$hasCategory=true;

   		$select_cat = file_get_contents($api_url .'webservices/api/category/read_cat_id.php?permalink='.$_GET['cat_title']);
   		$select_cat = json_decode($select_cat, true);

   		$SelectedCatId= $select_cat['category_id'];
   		$cat_meta_title= $select_cat['meta_title'];
   		$cat_meta_description= $select_cat['meta_description'];
		$cat_meta_robots=  $select_cat['meta_robots'];
		$cat_permalink= $select_cat['permalink'];


   		if(isset($_GET['app_title'])){
   			$hasApplication=true;

   			$select_app = file_get_contents($api_url .'webservices/api/application/read_app_id.php?permalink='.$_GET['app_title']);
   			$select_app = json_decode($select_app, true);

   			$SelectedAppId= $select_app['application_id'];
   			$app_meta_title= $select_app['meta_title'];
   			$app_meta_description= $select_app['meta_description'];
			$app_meta_robots=  $select_app['meta_robots'];
			$app_permalink= $select_app['permalink'];

   			if(isset($_GET['county_title'])){
   				$select_county = file_get_contents($api_url .'webservices/api/county/read_county_id.php?permalink='.$_GET['county_title']);
   				$select_county = json_decode($select_county, true);

   				$url_county= $select_county['id'];

   				

   				$county_name_gr = $select_county['county_name_gr'];
   				$county_display_name_gr = $select_county['display_name_gr'];
   				$county_permalink = $select_county['permalink'];

   			}
   		}else{
   			$SelectedAppId= 0;
   		}
   }else{
   		

   		$select_cat = file_get_contents($api_url .'webservices/api/category/read_cat_id.php?permalink=prosfores');
   		$select_cat = json_decode($select_cat, true);

   		$SelectedCatId= $select_cat['category_id'];
   		$cat_meta_title= $select_cat['meta_title'];
   		$cat_meta_description= $select_cat['meta_description'];
		$cat_meta_robots=  $select_cat['meta_robots'];
		$cat_permalink= $select_cat['permalink'];
   }

?>
<!DOCTYPE html>
<html lang="el">
	<head>
		<?php include('header.php'); ?>

		
		<?php if($hasCategory & $hasApplication ){ 

			$permalink = $directory_url . $cat_permalink .'/'.$app_permalink .'/'.$county_permalink .'/';
			?>
			<title><?php echo $app_meta_title; ?></title>
			<link rel="alternate" hreflang="el" href="<?php echo $permalink; ?> ">
			<meta name="description" content="<?php echo $app_meta_description; ?> ">
			<meta name="robots" content="<?php echo $app_meta_robots; ?> ">
			<link rel="canonical" href="<?php echo $permalink; ?> ">
			
		<?php }elseif( $hasCategory & !$hasApplication ){ //if has category and has not app

			$permalink = $directory_url . $cat_permalink .'/';
			?>

			<title><?php echo $cat_meta_title; ?></title>
			<link rel="alternate" hreflang="el" href="<?php echo $permalink; ?>">
			<meta name="description" content="<?php echo $cat_meta_description; ?>">
			<meta name="robots" content="<?php echo $cat_meta_robots; ?>">
			<link rel="canonical" href="<?php echo $permalink; ?>">
		<?php }else{?>

			<title>Υπηρεσίες MyConstructor σε προσφορά</title>
			<link rel="alternate" hreflang="el" href="<?php echo $directory_url; ?>"><!--+permanlink -->
			<meta name="description" content="">
			<meta name="robots" content="index,follow">
			<link rel="canonical" href="<?php echo $directory_url; ?>"><!--+permanlink -->

		<?php } ?>
		<meta property="og:locale" content="el_GR">
		


		
	</head>

<?php
include('menu.php');
include('search.php');

 ?>

 
<div class="container-fluid">
	<div class="mobile-cat-btn show_cats" onclick="showMobileMenuCat()"><i class="fa fa-th-list"></i> Κατηγορίες</div>

	<div class="row row-directory">
		<div class="col-md-3 col-md-sub-cats">
			<div class="mobile_cats_close" onclick="closeMobileMenuCat()"><i class="fa fa-times"></i></div>
			<div class="menu-cat-selected">
				<?php
					foreach ($categories as $category) {
		              	if (!empty($category['applications'] )){
		              		if($hasCategory){
			              		if( $category['id'] == $SelectedCatId ){
									$cat_id = $category['id'];
									$cat_title = $category['title_greek'];
									$apps = $category['applications'];
									$cat_permalink_menu = $category['permalink'];
								}
							}else{
								if( $category['id'] == '126' ){
									$cat_id = $category['id'];
									$cat_title = $category['title_greek'];
									$apps = $category['applications'];
									$cat_permalink = $category['permalink'];
								}
							}
						}
					}
				?>


				<div class="menu-cat-selected-title"><span class="span_selected_cat_title"><?php echo $cat_title;?></span></div>
				<p class="menu-cat-sub-title" >Υπηρεσίες σε Προσφορά:</p>
				<div class="selected-cat-apps">
					<div class="selected-cat-apps">
						<?php 
							foreach ($apps as $app ) {
								$app_id = $app['id'];
								$app_title = $app['title_greek'];
								$app_permalink_menu = $app['permalink'];

								$app_url= $directory_url . $cat_permalink_menu . '/' . $app_permalink_menu . '/'.$county_permalink.'/';
							?>	

								<a href="<?php echo $app_url; ?>" class="list-group-item"><?php echo $app_title; ?></a>
					<?php  } ?>	 	
					</div>
					
				</div>
			</div>
			<div class="col-md-sub-cats-inner">
				<div class="title-catelog">Κατηγορίες</div>
				<div id="MainMenu">
				        <div class="list-group panel">
					        <?php    
		              				foreach ($categories as $category) {
		              					if (!empty($category['applications'])){
									            $cat_id = $category['id'];
									            $cat_title = $category['title_greek'];
									           	$apps = $category['applications'];
									           	$cat_permalink_menu = $category['permalink'];

							?>
							<a href="#<?php echo $cat_id; ?>" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false"><?php echo $cat_title; ?>  <i class="fa fa-caret-down"></i></a> <!-- Sidebar Categories names --> 

							<div class="collapse" id="<?php echo $cat_id; ?>" aria-expanded="false" >
								<?php 
											foreach ($apps as $app ) {
											    $app_id = $app['id'];
											    $app_title = $app['title_greek'];
											    $app_permalink_menu = $app['permalink'];

											    $app_url= $directory_url . $cat_permalink_menu . '/' . $app_permalink_menu . '/'.$county_permalink.'/';
								?>	
												<a href="<?php echo $app_url; ?>" class="list-group-item"><?php echo $app_title; ?></a>
									 <?php  } ?>
							</div>
								<?php

									     }
				              		}
			              		?>
			            </div>          
				</div>
			</div>
      	</div>	

      	<div class="col-md-9">
	
				<?php 
					if ($hasCategory & $hasApplication) {
						//echo $_GET['app_id'];
						$application = file_get_contents( $api_url .'webservices/api/application/getProfessionalsByApplication.php?app_id='.$SelectedAppId);
						$application = json_decode($application, true);
						$cat_app_name= $application['category_name'];
						$app_name= $application['title_greek'];
						$category_id = $application['category_id'];
						$application_id = $application['id'];
						$app_short_desc_gr = $application['short_description_gr'];
						$app_professionals = $application['professionals'];
						$app_unit = $application['unit'];
						$app_detail_description_gr = $application['detail_description_gr'];




		
				?>
				<div class="directory-breadcrumb">
					<ul class="ul-breadcrumb">
						<li><a class="a-breadcrumb" href="<?php echo $api_url; ?>">Αρχική</a></li>

						<?php $breadcrumb_cat_url= $directory_url . $cat_permalink .'/';  ?>

						<li><a class="a-breadcrumb breadcrumb_cat_id" data-cat-id="<?php echo $category_id; ?>" href="<?php echo $breadcrumb_cat_url; ?>"><?php echo $cat_app_name; ?></a></li>
						<?php $breadcrumb_app_url = $directory_url . $cat_permalink .'/'.$app_permalink .'/' . $county_permalink . '/'; ?>
						<li><a class="a-breadcrumb breadcrumb_app_name" href="<?php echo $breadcrumb_app_url ?>"><?php echo $app_name; ?></a></li>
						<li class="breadcrumb-county"><?php echo $county_display_name_gr; ?></li>
					</ul>
				</div>

				<div class="app-small-description-outer">
					<div class="app-small-desc-title">
						<h1 class="h3-small-desc-title"><span class="span-small-desc-title"><?php echo $app_name; ?></span></h1>
					</div>
					<div class="offer-details">H προσφορά περιλαμβάνει:</div>
				</div>

				<div class="app-small-description">
					<p><?php echo $app_short_desc_gr; ?></p>
				</div>

				<div class="results-title">
					<h3 id="directory-top"><span class="span-count-professionals"><?php echo sizeof($app_professionals); ?></span> Συνεργεία για <?php echo $app_name; ?> <span class="stin-color"> στην</span> <span class="span_county"><?php echo $county_display_name_gr; ?></span></h3>
				</div>

				<nav class="navbar navbar-default directory-filters" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				   
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs">
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
					                          		<?php 
					                          			$counties = file_get_contents( $api_url .'webservices/api/county/read.php');
					                          			$counties = json_decode($counties, true);
					                          			//$counties[0];
					                          		?>

					                          		<select value="<?php echo $url_county; ?>" class="counties" onchange="location= this.value;">
					                                <?php 
					                                    foreach ($counties as $county) {	

					                                    	$county_link= $directory_url . $cat_permalink .'/'.$app_permalink .'/' . $county["permalink"] . '/';
							                               	if($url_county == $county["id"] ){

							                                ?>
							                                	<option <?php echo 'val="'. $county["display_name_gr"] .'" value_id="'. $county["id"] .'"'; ?> value="<?php echo $county_link;?>" <?php echo 'selected'; ?> ><?php echo $county["county_name_gr"]; ?></option>
							                        <?php }else{ ?>

							                        			<option <?php echo $url_county. 'val="'. $county["display_name_gr"] .'" value_id="'. $county["id"] .'"'; ?> value="<?php echo $county_link;?>" ><?php echo $county["county_name_gr"]; ?></option>
							                        <?php }
							                        	}
					                            	 ?>
					                                </select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Τιμή ή βαθμολογία</label>
					                          		<select class="select-price-rating">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="1">χαμηλότερη → υψηλότερη τιμή</option>
					                          			<option value="2">υψηλότερη → χαμηλότερη αξιολόγηση</option>
					                          		</select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Συνολική βαθμολογία</label>
					                          		<select class="select-rating">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="5">Τουλάχιστον 5/5 αστέρια</option>
					                          			<option value="4.5">Τουλάχιστον 4,5/5 αστέρια</option>
					                          			<option value="4">Τουλάχιστον 4/5 αστέρια</option>
					                          		</select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Αριθμό αξιολογήσεων</label>
					                          		<select class="select-total-ratings">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="1">Περισσότερες αξιολογήσεις</option>
					                          			<option value="5">Τουλάχιστον 5 αξιολογήσεις</option>
					                          			<option value="10">Τουλάχιστον 10 αξιολογήσεις</option>
					                          			<option value="15">Τουλάχιστον 15 αξιολογήσεις</option>
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


				<?php 

					foreach ($app_professionals as $professionals) {

						$professional_first_name = $professionals['first_name'];
						$professional_last_name = $professionals['last_name'];
						$profile_img = $professionals['image'];
						$professional_id = $professionals['id'];
						$professional_price = $professionals['price'];
						$professional_budget = $professionals['budget'];
						$professional_description = $professionals['description'];
						$professional_city = $professionals['city'];
						$professional_servicearea = $professionals['servicearea'];
						$professional_review = $professionals['reviews_stats'];
						$porfessional_counties = $professionals['counties'];

						$professional_counties_num = sizeof($porfessional_counties);

						$professional_county = false;


					//	if(isset($_GET['county_id'])){
							$county_id= $url_county;
							foreach ($porfessional_counties as $counties ) {
								if(intval($county_id) == intval($counties['county_id']) || intval($county_id) == 53){
									$professional_county = true; // print proffessionals with equal $_GET['county_id'] || if county_id greece is selected print all
								}
							}
					/*	}else{
							$professional_county = true; // if !$_GET['county_id']  print all proffessionals
						}*/

						
				?>
				<?php if($professional_county){ ?>
						
						<div class="prof-main-col" data-county-num="<?php echo $professional_counties_num ?>" 
								<?php foreach ($porfessional_counties as $key=>$counties) {
										$county_ids= $counties['county_id']; // print county_ids for county filter
										echo "data-county".$key."='$county_ids'"; }?> data-price="<?php echo $professional_price; ?>" data-reviews="<?php echo $professional_review['total']; ?>" data-rating="<?php if($professional_review['average_total'] == null){ echo '0'; }else echo $professional_review['average_total']; ?>"  >
						<div class="row row-prof-main-col-inner">
						  		<div class="col-md-3 col-sm-3 professional-img-con">
						  			<div class="professional-img">
						  				<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id . '&app_id=' . $application_id; ?>" >
						  					<img src="<?php echo $api_url.'img/professional-imgs/'.$profile_img ?>" onerror="this.src='<?php echo $api_url; ?>img/professional-imgs/default-img-4.jpg';" alt="" />
						  					
						  				</a>
						  			</div>
						  		</div>

						  		<div class="col-md-6 col-sm-6 professional-details-box-con">
										<div class="row professional-details-box">
											
												<div class="professional-info-text-name">

													<p class="professional-name"><span class="newmemname"><a target="_blank" class="con-name" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ?>"><?php echo $professional_first_name . ' ' . $professional_last_name; ?></a></span></p>
													<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
														<p><span class="profile-label">Προβολή προφίλ</span></p>
													</a>
												</div>
												

												<div class="professional-info-text-box">
													<div class="professional-service-area">
														<p><i class="fa fa-map-marker"></i><span> <?php echo $professional_city; ?></span> <?php echo $professional_servicearea; ?></p>
													</div>
													
													<div class="professional-extra-infos">
															<p class="small-description"><?php echo $professional_description; ?></p>
															<div class="price-info">
																<p class="price-for"><span class="professional-cat-labels">Τιμή για: </span><?php echo $app_name; ?></p>
															</div>
															<div class="price-info" >
																<p class="price-for"> <span class="professional-cat-labels">Πληροφορίες Χρέωσης:</span>
																	<span><?php echo $professional_budget; ?></span>
																</p>
															</div>
															

															<div class="Techinical-data"></div>

													</div>
												</div>
											
										</div>

										
								</div>
								<div class="col-md-3 col-sm-3 col-professional-review">
									
										<?php if($professional_review['total'] > 0){ ?>
												<a target="_blank" class="directory-reviews-link" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id.'#proffessionalRiviews'; ?>">
			                                        <div class="new_professional_review_score">
				                                        <div class="professional_score">Βαθμολογία</div>
				                                        <div class="newTotalRatingOuter"><span class="rating-num"><?php 
				                                            	$totalRevScore = floordec($professional_review['average_total'], 1);
					                                            if( $totalRevScore == 5.0 || $totalRevScore == 4.0){
					                                                echo number_format($totalRevScore, -1);
					                                            }else{
					                                                echo $totalRevScore;
					                                            }
				                                            ?></span>/5</div>
				                                            <div class="directory-total-score"><span class="total-jobs"><?php echo $professional_review['total']; ?></span> Αξιολογήσεις</div>        
				                                    </div>
				                                    <div class="directoryStarsOuter">
				                                        <div class="directoryEmptyBar">
				                                            <?php $totalRevPercentage = floordec($professional_review['average_total']/5 *100 , 1).'%;';  ?>
				                                            <div style="width:<?php echo $totalRevPercentage;?>"></div>
				                                        </div>
				                                    </div>
				                                    
				                                    
			                                     </a>
			                                <?php }else{
			                                	echo '<div class="directory-rev-score">Δεν υπάρχουν αξιολογήσεις</div>';
			                                } ?>

			                                <div class="prices"><span><?php echo $professional_price; ?><span class="tax-fpa"><?php echo $app_unit ?></span></span></div>

			                                

											<?php if( $application_id == '69' || $application_id == '70' || $application_id == '71' || $application_id == '72' || $application_id == '196' || $application_id == '219' || $application_id == '218' ||  $application_id == '216'  ){ ?>
											<a href="https://myconstructor.gr/transport/?catid=<?php echo $category_id; ?>&amp;memid=<?php echo $professional_id; ?>&amp;appid=<?php echo $application_id; ?>&amp;name=<?php echo $professional_first_name; ?>&amp;surname=<?php echo $professional_last_name; ?>" target="_blank">
												<div class="btn-book-transport">Κλείσε online</div>
											</a>
											<?php } ?>

											<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
											<div class="professional_new_tel"><img src="<?php echo $api_url;?>img/new-tel-white.png">Τηλέφωνο</div>
											</a>
									
								</div>
							</div>
							<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
								<div style="display: none;" class="row row-professional-profile">
									<div class="prof-profile-btn">Προφίλ Επαγγελματία  <i class="fa fa-angle-right"></i></div>
								</div>
							</a>

						</div>
					<?php } ?>


				<?php } ?>

				<?php
					}else if( $hasCategory && !$hasApplication){

						//$applications = file_get_contents($api_url .'webservices/api/application/readByCategory.php?cat_id='. $_GET['cat_id'];);
              			//$applications = json_decode($applications, true); // decode the JSON into an associative array

						$directory_cat = file_get_contents($api_url .'webservices/api/application/readByCategory.php?cat_id='. $SelectedCatId );
						$directory_cat = json_decode($directory_cat, true);
						
              			$category_title = $directory_cat[0]['category_name'];
              			$category_id = $directory_cat[0]['category_id'];
              			$category_icon = $directory_cat[0]['image'];
						/*$directory_= $directory_cat['category_name'];
						$app_name= $directory_cat['title_greek'];
						$category_id = $directory_cat['category_id'];
						$application_id = $directory_cat['id'];
						$app_short_desc_gr = $directory_cat['short_description_gr'];*/

				?>
					<div class="directory-breadcrumb">
						<ul class="ul-breadcrumb">
							<li><a href="<?php echo $api_url; ?>">Αρχική</a></li>
							<?php $breadcrumb_cat_url= $directory_url . $cat_permalink .'/';  ?>
							<li><a href="<?php echo $breadcrumb_cat_url; ?>"><?php echo $category_title; ?></a></li>
							

						</ul>
					</div>


					<div class="app-small-description-outer">
						<div class="app-small-desc-title">
							<h1 class="h3-small-desc-title"><span class="span-small-desc-title"><?php echo $category_title; ?></span></h1>
						</div>
						<div class="offer-details"> Υπηρεσίες σε προσφορά:</div>
					</div>



					<?php foreach ($directory_cat as $cat_apps) {
						
						$application_name = $cat_apps['title_greek'];
						$application_min_price = $cat_apps['min_price'];
						$application_unit= $cat_apps['unit']; 
						$short_description_gr = $cat_apps['short_description_gr'];
						$cat_id = $cat_apps['category_id'];
						$app_id = $cat_apps['id'];
						$sum_professionals = $cat_apps['professionals'];
						$appPermalink = $cat_apps['permalink'];

						$appLink= $directory_url . $cat_permalink .'/'. $appPermalink . '/';
					 ?>

					<a  class="a-app" href="<?php echo $appLink;  ?>">
						<div  class="col-md-12 applications_outer">
							<div class="col-application">
								<div class="col-md-2">
									<div class="app-img">
										<div class="app-img-inner">
												<img src="<?php echo $api_url; ?>img/cat_icons/<?php echo $category_icon; ?>">	
										</div>							
									</div>
								</div>
								<div class="col-md-7 app-details">
									<h3 class="h3-app-title"><?php echo $application_name; ?></h3>
									<div><?php echo $short_description_gr; ?></div>
									
								</div>
								<div class="col-md-3 col-app-prices">
									<div class="price-start">από</div>
									<div class="app-price"><?php echo $application_min_price; ?><span class="app-units"><?php echo $application_unit; ?></span>
									</div>
									<div class="professionals-num"><?php echo $sum_professionals; ?> διαθέσιμα συνεργεία</div>
								</div>
							</div>

						</div>
					</a>

					<?php } ?>

				<?php
					}else{
						$application = file_get_contents( $api_url .'webservices/api/application/getProfessionalsByApplication.php?app_id=177');
						$application = json_decode($application, true);

						$cat_app_name= $application['category_name'];
						$app_name= $application['title_greek'];
						$category_id = $application['category_id'];
						$application_id = $application['id'];
						$app_short_desc_gr = $application['short_description_gr'];
						$app_professionals = $application['professionals'];
						$app_detail_description_gr = $application['detail_description_gr'];
						$app_unit=$application['unit'];



					?>		
					<div class="directory-breadcrumb">
						<ul class="ul-breadcrumb">
						<li><a class="a-breadcrumb" href="<?php echo $api_url; ?>">Αρχική</a></li>

						<?php $breadcrumb_cat_url= $directory_url . $cat_permalink .'/';  ?>

						<li><a class="a-breadcrumb breadcrumb_cat_id" data-cat-id="<?php echo $category_id; ?>" href="<?php echo $breadcrumb_cat_url; ?>"><?php echo $cat_app_name; ?></a></li>
						<?php $breadcrumb_app_url = $directory_url . $cat_permalink .'/'.$app_permalink .'/' . $county_permalink . '/'; ?>
						<li><a class="a-breadcrumb breadcrumb_app_name" href="<?php echo $breadcrumb_app_url ?>"><?php echo $app_name; ?></a></li>
						<li class="breadcrumb-county"><?php echo $county_display_name_gr; ?></li>
					</ul>
					</div>

					<div class="app-small-description-outer">
					<div class="app-small-desc-title">
						<h1 class="h3-small-desc-title"><span class="span-small-desc-title"><?php echo $app_name; ?></span></h1>
					</div>
					<div class="offer-details">H προσφορά περιλαμβάνει:</div>
				</div>

				<div class="app-small-description">
					<p><?php echo $app_short_desc_gr; ?></p>
				</div>

				<div class="results-title">
					<h1 id="directory-top"><span class="span-count-professionals"><?php echo sizeof($app_professionals); ?></span> Συνεργεία για <?php echo $app_name; ?> <span class="stin-color">στην</span> <span class="span_county">Αττική</span></h1>
				</div>

				<nav class="navbar navbar-default directory-filters" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				   
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" >
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
						                          		<?php 
						                          			$counties = file_get_contents( $api_url .'webservices/api/county/read.php');
						                          			$counties = json_decode($counties, true);
						                          		?>
						                          		<select value="<?php echo $url_county; ?>" class="counties" onchange="location= this.value;">
						                                <?php 
						                                    foreach ($counties as $county) {	
									                           $county_link= $directory_url . $cat_permalink .'/'.$app_permalink .'/' . $county["permalink"] . '/';
								                               	if($url_county == $county["id"] ){
								                                ?>
								                                	<option <?php echo 'val="'. $county["display_name_gr"] .'" value_id="'. $county["id"] .'"'; ?> value="<?php echo $county_link;?>" <?php echo 'selected'; ?> ><?php echo $county["county_name_gr"]; ?></option>
								                          <?php }else{ ?>

								                        			<option <?php echo 'val="'. $county["display_name_gr"] .'" value_id="'. $county["id"] .'"'; ?> value="<?php echo $county_link;?>" ><?php echo $county["county_name_gr"]; ?></option>
								                          <?php }
								                            }
						                            	 ?>
						                                </select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Τιμή ή βαθμολογία</label>
					                          		<select class="select-price-rating">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="1">χαμηλότερη → υψηλότερη τιμή</option>
					                          			<option value="2">υψηλότερη → χαμηλότερη αξιολόγηση</option>
					                          		</select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Συνολική βαθμολογία</label>
					                          		<select class="select-rating">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="5">Τουλάχιστον 5/5 αστέρια</option>
					                          			<option value="4.5">Τουλάχιστον 4,5/5 αστέρια</option>
					                          			<option value="4">Τουλάχιστον 4/5 αστέρια</option>
					                          		</select>
					                          	</div>

					                          	<div class="col-md-3">
					                          		<label>Αριθμό αξιολογήσεων</label>
					                          		<select class="select-total-ratings">
					                          			<option value="0">Επιλογή ταξινόμησης</option>
					                          			<option value="1">Περισσότερες αξιολογήσεις</option>
					                          			<option value="5">Τουλάχιστον 5 αξιολογήσεις</option>
					                          			<option value="10">Τουλάχιστον 10 αξιολογήσεις</option>
					                          			<option value="15">Τουλάχιστον 15 αξιολογήσεις</option>
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
				<?php 

					foreach ($app_professionals as $professionals) {

						$professional_first_name = $professionals['first_name'];
						$professional_last_name = $professionals['last_name'];
						$profile_img = $professionals['image'];
						$professional_id = $professionals['id'];
						$professional_price = $professionals['price'];
						$professional_budget = $professionals['budget'];
						$professional_description = $professionals['description'];
						$professional_city = $professionals['city'];
						$professional_servicearea = $professionals['servicearea'];
						$professional_review = $professionals['reviews_stats'];
						$porfessional_counties = $professionals['counties'];

						$professional_counties_num = sizeof($porfessional_counties);

						$professional_county = false;


						//if(isset($_GET['county_id'])){
							$county_id= $url_county;
							foreach ($porfessional_counties as $counties ) {
								if(intval($county_id) == intval($counties['county_id'])){
									$professional_county = true; // print proffessionals with equal $_GET['county_id']
								}
							}
					/*	}else{
							$professional_county = true; // if !$_GET['county_id']  print all proffessionals
						}*/

						
						?>
						<?php if($professional_county){ ?>

					  <div class="prof-main-col" data-county-num="<?php echo $professional_counties_num ?>" 
								<?php foreach ($porfessional_counties as $key=>$counties) {
										$county_ids= $counties['county_id']; // print county_ids for county filter
										echo "data-county".$key."='$county_ids'"; }?> data-price="<?php echo $professional_price; ?>" data-reviews="<?php echo $professional_review['total']; ?>" data-rating="<?php if($professional_review['average_total'] == null){ echo '0'; }else echo $professional_review['average_total']; ?>"  >
						<div class="row row-prof-main-col-inner">
						  		<div class="col-md-3 col-sm-3 professional-img-con">
						  			<div class="professional-img">
						  				<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id . '&app_id=' . $application_id; ?>" >
						  					<img src="<?php echo $api_url.'img/professional-imgs/'.$profile_img ?>" onerror="this.src='<?php echo $api_url; ?>img/professional-imgs/default-img-4.jpg';" alt="" />
						  					
						  				</a>
						  			</div>
						  		</div>

						  		<div class="col-md-6 col-sm-6 professional-details-box-con">
										<div class="row professional-details-box">
											
												<div class="professional-info-text-name">

													<p class="professional-name"><span class="newmemname"><a target="_blank" class="con-name" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ?>"><?php echo $professional_first_name . ' ' . $professional_last_name; ?></a></span></p>
													<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
														<p><span class="profile-label">Προβολή προφίλ</span></p>
													</a>
												</div>
												

												<div class="professional-info-text-box">
													<div class="professional-service-area">
														<p><i class="fa fa-map-marker"></i><span> <?php echo $professional_city; ?></span> <?php echo $professional_servicearea; ?></p>
													</div>
													
													<div class="professional-extra-infos">
															<p class="small-description"><?php echo $professional_description; ?></p>
															<div class="price-info">
																<p class="price-for"><span class="professional-cat-labels">Τιμή για: </span><?php echo $app_name; ?></p>
															</div>
															<div class="price-info" >
																<p class="price-for"> <span class="professional-cat-labels">Πληροφορίες Χρέωσης:</span>
																	<span><?php echo $professional_budget; ?></span>
																</p>
															</div>
															

															<div class="Techinical-data"></div>

													</div>
												</div>
											
										</div>

										
								</div>
								<div class="col-md-3 col-sm-3 col-professional-review">
									
										<?php if($professional_review['total'] > 0){ ?>
												<a target="_blank" class="directory-reviews-link" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id.'#proffessionalRiviews'; ?>">
			                                        <div class="new_professional_review_score">
				                                        <div class="professional_score">Βαθμολογία</div>
				                                        <div class="newTotalRatingOuter"><span class="rating-num"><?php 
				                                            	$totalRevScore = floordec($professional_review['average_total'], 1);
					                                            if( $totalRevScore == 5.0 || $totalRevScore == 4.0){
					                                                echo number_format($totalRevScore, -1);
					                                            }else{
					                                                echo $totalRevScore;
					                                            }
				                                            ?></span>/5</div>
				                                            <div class="directory-total-score"><span class="total-jobs"><?php echo $professional_review['total']; ?></span> Αξιολογήσεις</div>        
				                                    </div>
				                                    <div class="directoryStarsOuter">
				                                        <div class="directoryEmptyBar">
				                                            <?php $totalRevPercentage = floordec($professional_review['average_total']/5 *100 , 1).'%;';  ?>
				                                            <div style="width:<?php echo $totalRevPercentage;?>"></div>
				                                        </div>
				                                    </div>
				                                    
				                                    
			                                     </a>
			                                <?php }else{
			                                	echo '<div class="directory-rev-score">Δεν υπάρχουν αξιολογήσεις</div>';
			                                } ?>

			                                <div class="prices"><span><?php echo $professional_price; ?><span class="tax-fpa"><?php echo $app_unit ?></span></span></div>

			                                

											<?php if( $application_id == '69' || $application_id == '70' || $application_id == '71' || $application_id == '72' || $application_id == '196' || $application_id == '219' || $application_id == '218' ||  $application_id == '216'  ){ ?>
											<a href="https://myconstructor.gr/transport/?catid=<?php echo $category_id; ?>&amp;memid=<?php echo $professional_id; ?>&amp;appid=<?php echo $application_id; ?>&amp;name=<?php echo $professional_first_name; ?>&amp;surname=<?php echo $professional_last_name; ?>" target="_blank">
												<div class="btn-book-transport">Κλείσε online</div>
											</a>
											<?php } ?>

											<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
											<div class="professional_new_tel"><img src="<?php echo $api_url; ?>img/new-tel-white.png">Τηλέφωνο</div>
											</a>
									
								</div>
							</div>
							<a target="_blank" href="<?php echo $profile_url .'?id='. $professional_id .'&app_id='. $application_id; ; ?>">
								<div style="display: none;" class="row row-professional-profile">
									<div class="prof-profile-btn">Προφίλ Επαγγελματία  <i class="fa fa-angle-right"></i></div>
								</div>
							</a>

						</div>
						<?php } ?>


					<?php } ?>
			  <?php } ?>

			 <?php if ($hasApplication || (!$hasApplication && !$hasCategory)) { ?>

			  <div id="loadmore">Εμφάνισε Περισσότερους</div>
			  <a class="a-showless" href="#directory-top"><div id="showless">Εμφάνισε Λιγότερους</div></a>

			  <div class="col-md-12 app_detail_description">
			  	<p><?php echo $app_detail_description_gr; ?></p>
			  </div>


			  <?php } ?>

		</div>

		</div>

	</div>
</div>
<style type="text/css">
.call-btn img {
    box-shadow: 0px 2px 6px 0px #333;
    border-radius: 50%;
}
.col-call-back {
    max-width: 400px;
    position: fixed;
    bottom: 40px;
    right: 40px;
    z-index: 20;
}
button.close-text-call-back-btn {
    position: fixed;
    border: 0px solid;
    font-size: 24px;
    line-height: 17px;
    padding: 1px;
    background-color: transparent;
    color: #fff;
    font-weight: bold;
    z-index: 30;
    margin-top: 11px;
    margin-left: 5px;
}
.text-call-back {
    background: #333;
    padding: 10px 22px;
    margin-top: 7px;
    border-radius: 5px;
    float: left;
    margin-right: 20px;
    box-shadow: 0px 2px 6px 0px #333;
    cursor: pointer;
    position: relative;
}
.call-btn {
    float: left;
}
.text-call-back p {
    margin-bottom: 5px;
    text-align: center;
    font-family: opensans;
    color: #fff;
    margin-top: 3px;
}
div#callback.modal {
    background: none;
}

div#callback {
    border: 0px;
    box-shadow: 0px 0px 0px 0px;
}
#callback .modal-dialog {
    all: unset;
}
div#callback .modal-content {
    max-width: 400px;
    margin: auto;
    background: #fff;
    font-family: opensans;
    color: #686F7F;
}
div#callback .modal-header {
    border-bottom: 0px solid;
    padding: 9px 15px;
}
#callback .modal-dialog .modal-content .modal-body {
    max-height: none;
}

div#callback .modal-body {
    padding: 4px 20px 20px 20px;
    background: #fff;
}
div#callback .modal-body {
    clear: both;
}
.callback-form {
    max-width: 300px;
    margin: auto;
}
div#callback h4.modal-title {
    font-size: 21px;
    text-align: center;
    color: #686F7F;
    font-family: opensans;
}
div#callback h4.modal-title span {
    font-family: opensans;
}
#callback p {
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
    font-style: italic;
}
.callback-form input#name, .callback-form input#mobile, .callback-form input#time {
    width: 100%;
    min-height: 41px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #D2D2D2;
    font-size: 18px;
}
.callback-form input#mobile, .callback-form input#time {
    padding: 0px 15px;
}

.callback-form input#name, .callback-form input#mobile, .callback-form input#time {
    width: 100%;
    min-height: 41px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #D2D2D2;
    font-size: 18px;
}
.radio-btns {
    margin-bottom: 15px;
    font-size: 18px;
}
button.btn-call-back {
    width: 100%;
    padding: 10px;
    border: none;
    background: #2E8DC7;
    font-size: 20px;
    border-radius: 5px;
    color: #fff;
    margin-top: 10px;
    font-family: opensans;
}
button.close-modal {
    border: 0px solid;
    font-size: 33px;
    line-height: 19px;
    float: right;
    color: #333;
    padding: 4px 10px;
}
div#callback .modal-header {
    border-bottom: 0px solid;
}
.submit-msg {
	font-weight: 600;
}
</style>
<div class="col-call-back">
		<button type="button" class="close-text-call-back-btn" onclick="closetextcallbackbtn();" >×</button>

    <div class="text-call-back" data-toggle="modal" data-target="#callback" >
    	
    	<div class="call-arrow"></div><p>Έχεις ακόμα απορίες;</p><p><b>Ζήτησε μας να σε καλέσουμε!</b></p></div>

    <div  type="button" class="call-btn" data-toggle="modal" data-target="#callback"><img src="<?php echo $api_url;?>img/tel-call-back-2.png"></div>

</div>
<div id="callback" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button  type="button" class="close-modal" data-dismiss="modal">&times;</button></div><div class="modal-body">

		<div class="callback-form">

			<h4 class="modal-title"><span>Είμαστε εδώ για οποιαδήποτε απορία και αν έχεις.</span></h4>

				<p>Στείλε μας ένα αίτοιμα για επικοινωνία!</p>

	            <input class="input-style" placeholder="Όνομα" name="name"  id="name" type="text" required> 

	            <input name="mobile"  id="mobile" placeholder="Τηλ: 691 234 5678" type="number" onkeyup="check();" required ><span id="message"></span>

	            <div class="radio-btns">

	          		<input type="radio" id="call-now" class="radio-time" name="radio-time" value="Τώρα" onclick="checktimecallnow();" checked> <span>Θέλω να με καλέσετε τώρα.</span><br>

						<input type="radio" id="call-not-now" class="radio-time" name="radio-time" value="Άλλη ώρα" onclick="checktime();"> <span>Θέλω να επιλέξω άλλη ώρα.</span><br>

					</div>

	             <input type="text"  id="time" name="usr_time" value='12:00 μμ'>

	            <button class="btn-call-back" onclick="callbackaction();">Επικοινωνήστε μαζί μου</button>

	            <p class="submit-msg"></p>

        </div>

      </div>

    </div>

  </div>

</div>
<script type="text/javascript">
	jQuery('input#time').css('display','none');
    function check()
	{

	    var pass1 = document.getElementById('mobile');


	    var message = document.getElementById('message');

	    var goodColor = "#0C6";
	    var badColor = "#FF9B37";

	    if(mobile.value.length!=10){

	        mobile.style.backgroundColor = badColor;
	        message.style.color = badColor;
	        message.innerHTML = "Παρακαλούμε συμπλήρωσε δεκαψήφιο αριθμό!"

	    }else{
	        message.innerHTML = "Συνέχισε!"
		jQuery("#message").css("color","green");
	    }

	}

	jQuery('#call-not-now').click(function(){
		jQuery('#call-not-now').prop('checked', true);
		jQuery('#call-now').removeAttr('checked');
	});

	jQuery('.radio-btns').change(function() {
	    if (jQuery('#call-not-now').attr('checked')) {
	        jQuery('#time').show();
	    } else {
	        jQuery('#time').hide();
	    }
	});

	function callbackaction(){
	    var number = jQuery("input#mobile").val();
	      if(number.length == 10){

	        var name= jQuery("input#name").val();
	        var mobile= jQuery("input#mobile").val();
			var url = window.location.href; 
			if (jQuery('#call-not-now').attr('checked')){
		        	var time= jQuery("input#time").val();
			}else{
				var time= "Καλέστε με τώρα!"
			}
			var PostUrl = "<?php echo $api_url;?>callback.php";
			//var PostUrl = "http://localhost/MCUpgrade/callback.php";
	        jQuery.ajax({
	            type:"POST",
	            url:PostUrl,
	            data:{name,mobile,time,url},
				success: function(data){
				    jQuery(".submit-msg").text("Θα επικοινωήσουμε σύντομα μαζί σας!");
				    jQuery(".submit-msg").css("color","green");
				}

	       })


	      }else{ 
	        jQuery(".submit-msg").text("Συμπληρώστε σωστά τα πεδία!");
	        jQuery(".submit-msg").css("color","red");
	      }

	}

	jQuery(".button.close-btn-call-back").click(function(){
	jQuery(".col-call-back").css("display","none");
	});

	function checktime(){
		$("#call-not-now").attr('checked','true');
		$("#call-now").removeAttr('checked', 'checked');
		$('input#time').css('display','block');	
	}

	function checktimecallnow(){
		$("#call-not-now").removeAttr('checked','true');
		$("#call-now").attr('checked', 'checked');
		$('input#time').css('display','none');	
	}

	$(document).mouseup(function (e)
	{
	    var container = $("#callback.modal-content.modal-body");

	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	        container.hide();
	    }
	});
	function closetextcallbackbtn(){
		jQuery('.text-call-back').hide();
		jQuery('.close-text-call-back-btn').hide();
	}
</script>
<?php include('footer.php'); ?>