<?php
   include('functions.php');

   if(isset($_GET['county_id'])){
   		$url_county= $_GET['county_id'];
   }else{
   		$url_county='1';
   }

   include('constants.php'); 
   include('front_end_config/core.php');

   $categories = file_get_contents($api_url .'webservices/api/category/read.php');
   $categories = json_decode($categories, true); // decode the JSON into an associative array
?>
<!DOCTYPE html>
<html lang="el">
	<head>
		<?php if(isset($_GET['app_id'])){ 

			$metadata = file_get_contents( $api_url .'webservices/api/application/readAppMetaData.php?app_id='. $_GET['app_id']);
			$metadata = json_decode($metadata, true);

			$meta_title= $metadata['meta_title'];
			$meta_description= $metadata['meta_description'];
			$meta_robots=  $metadata['meta_robots'];
			$permalink= $metadata['permalink'];

			?>
			<title><?php echo $meta_title; ?></title>
			<link rel="alternate" hreflang="el" href="<?php echo $directory_url; ?> "><!--+permanlink -->
			<meta name="description" content="<?php echo $meta_description; ?> ">
			<meta name="robots" content="<?php echo $meta_robots; ?> ">
			<link rel="canonical" href="<?php echo $directory_url; ?> "><!--+permanlink -->
			
		<?php }elseif(!isset($_GET['app_id']) && isset($_GET['cat_id'])){ 

			$metadata = file_get_contents( $api_url .'webservices/api/category/readCategoryMeta.php?cat_id='. $_GET['cat_id']);
			$metadata = json_decode($metadata, true);

			$meta_title= $metadata['meta_title'];
			$meta_description= $metadata['meta_description'];
			$meta_robots=  $metadata['meta_robots'];
			$permalink= $metadata['permalink'];
			?>

			<title><?php echo $meta_title; ?></title>
			<link rel="alternate" hreflang="el" href="<?php echo $directory_url; ?>"><!--+permanlink -->
			<meta name="description" content="<?php echo $meta_description; ?>">
			<meta name="robots" content="<?php echo $meta_robots; ?>">
			<link rel="canonical" href="<?php echo $directory_url; ?>"><!--+permanlink -->
		<?php }else{?>

			<title>Υπηρεσίες MyConstructor σε προσφορά</title>
			<link rel="alternate" hreflang="el" href="<?php echo $directory_url; ?>"><!--+permanlink -->
			<meta name="description" content="">
			<meta name="robots" content="index,follow">
			<link rel="canonical" href="<?php echo $directory_url; ?>"><!--+permanlink -->

		<?php } ?>
		<meta property="og:locale" content="el_GR">
		<?php include('header.php'); ?>


		
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
				<div class="menu-cat-selected-title"><span class="span_selected_cat_title"></span></div>
				<p class="menu-cat-sub-title" >Υπηρεσίες σε Προσφορά:</p>
				<div class="selected-cat-apps">
					
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

							?>
							<a href="#<?php echo $cat_id; ?>" class="list-group-item main-cat collapsed" data-toggle="collapse" data-parent="#MainMenu" aria-expanded="false"><?php echo $cat_title; ?>  <i class="fa fa-caret-down"></i></a> <!-- Sidebar Categories names --> 

							<div class="collapse" id="<?php echo $cat_id; ?>" aria-expanded="false" >
								<?php 
											foreach ($apps as $app ) {
											    $app_id = $app['id'];
											    $app_title = $app['title_greek'];
								?>	
												<a href="<?php echo $directory_url . '?cat_id=' . $cat_id . '&app_id=' . $app_id .'&county_id='. $url_county ?>" class="list-group-item"><?php echo $app_title; ?></a>
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
					if (isset($_GET['app_id'])) {
						//echo $_GET['app_id'];
						$application = file_get_contents( $api_url .'webservices/api/application/getProfessionalsByApplication.php?app_id='. $_GET['app_id']);
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
						<li><a class="a-breadcrumb breadcrumb_cat_id" data-cat-id="<?php echo $category_id; ?>" href="<?php echo $directory_url .'?cat_id='. $category_id .'$county_id='. $url_county; ?>"><?php echo $cat_app_name; ?></a></li>
						<li><a class="a-breadcrumb breadcrumb_app_name" data-app-id="<?php echo $application_id; ?>" href="<?php echo $directory_url .'?cat_id='. $category_id . '&app_id=' .$application_id . '&county_id='.$url_county; ?>"><?php echo $app_name; ?></a></li>
						<li class="breadcrumb-county">
						<?php
							if(isset($_GET['county_id'])){ ?>
								<a href="<?php echo $directory_url .'?cat_id='. $category_id . '&app_id=' .$application_id. '&county_id='. $_GET['county_id']; ?>">Αττική</a>
						<?php
							}else{
						?>
								<a href="<?php echo $directory_url .'?cat_id='. $category_id . '&app_id=' .$application_id. '&county_id=1'; ?>">Ελλάδα</a>
						<?php
							}
						?>
						</li>
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
					<h3 id="directory-top"><span class="span-count-professionals"><?php echo sizeof($app_professionals); ?></span> Συνεργεία για <?php echo $app_name; ?> <span class="stin-color"> στην</span> <span class="span_county">Αττική</span></h3>
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

					                          		<select class="counties">
					                                <?php 
					                                    foreach ($counties as $county) {	
							                                echo '<option val="'. $county["display_name_gr"] .'" value="'. $county["id"] .'">' .$county["county_name_gr"] .'</option>';
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


						if(isset($_GET['county_id'])){
							$county_id= $_GET['county_id'];
							foreach ($porfessional_counties as $counties ) {
								if(intval($county_id) == intval($counties['county_id']) || intval($county_id) == 53){
									$professional_county = true; // print proffessionals with equal $_GET['county_id'] || if county_id greece is selected print all
								}
							}
						}else{
							$professional_county = true; // if !$_GET['county_id']  print all proffessionals
						}

						
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
						  					<img src="<?php echo 'img/professional-imgs/'.$profile_img ?>" onerror="this.src='img/professional-imgs/default-img-4.jpg';" alt="" />
						  					
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
											<div class="professional_new_tel"><img src="img/new-tel-white.png">Τηλέφωνο</div>
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
					}else if(!isset($_GET['app_id']) && isset($_GET['cat_id'])){

						//$applications = file_get_contents($api_url .'webservices/api/application/readByCategory.php?cat_id='. $_GET['cat_id'];);
              			//$applications = json_decode($applications, true); // decode the JSON into an associative array

						$directory_cat = file_get_contents($api_url .'webservices/api/application/readByCategory.php?cat_id='. $_GET['cat_id'] );
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
							<li><a href="<?php echo $directory_url .'?cat_id='. $category_id . '$county_id='. $url_county; ?>"><?php echo $category_title; ?></a></li>
							
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

					 ?>

					<a  class="a-app" href="<?php echo $directory_url.'?cat_id='. $cat_id .'&app_id='.$app_id. '&county_id='.$url_county  ?>">
						<div  class="col-md-12 applications_outer">
							<div class="col-application">
								<div class="col-md-2">
									<div class="app-img">
										<div class="app-img-inner">
												<img src="img/cat_icons/<?php echo $category_icon; ?>">	
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
							<li><a class="a-breadcrumb breadcrumb_cat_id" data-cat-id="<?php echo $category_id; ?>" href="<?php echo $directory_url .'?cat_id='. $category_id .'$county_id='. $url_county; ?>"><?php echo $cat_app_name; ?></a></li>
							<li><a class="a-breadcrumb breadcrumb_app_name" data-app-id="<?php echo $application_id; ?>" href="<?php echo $directory_url .'?cat_id='. $category_id . '&app_id='. $application_id . '&county_id='. $url_county; ?>"><?php echo $app_name; ?></a></li>
							<li>Αττική</li>
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
						                          		<select class="counties">
						                                <?php 
						                                    foreach ($counties as $county) {	
								                                echo '<option val="'. $county["display_name_gr"] .'" value="'. $county["id"] .'">' .$county["county_name_gr"] .'</option>';
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


						if(isset($_GET['county_id'])){
							$county_id= $_GET['county_id'];
							foreach ($porfessional_counties as $counties ) {
								if(intval($county_id) == intval($counties['county_id'])){
									$professional_county = true; // print proffessionals with equal $_GET['county_id']
								}
							}
						}else{
							$professional_county = true; // if !$_GET['county_id']  print all proffessionals
						}

						
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
						  					<img src="<?php echo 'img/professional-imgs/'.$profile_img ?>" onerror="this.src='img/professional-imgs/default-img-4.jpg';" alt="" />
						  					
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
											<div class="professional_new_tel"><img src="img/new-tel-white.png">Τηλέφωνο</div>
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

			 <?php if ((isset($_GET['app_id'])) || (!isset($_GET['app_id']) && !isset($_GET['cat_id']))) { ?>

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

<?php include('footer.php'); ?>