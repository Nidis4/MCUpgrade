                <?php      
                    include('functions.php');
                    include('constants.php'); 
                    include('front_end_config/core.php');

                        if (isset($_GET['prof_permalink'])) {

                            $professional_meta = file_get_contents($api_url .'/webservices/api/professional/read_professional_meta.php?prof_permalink='. $_GET['prof_permalink']);
                            $professional_meta = json_decode($professional_meta, true); // decode the JSON into an associative array

                            $professionalID = $professional_meta['professional_id'];
                            $professional_meta_title = $professional_meta['meta_title'];
                            $professional_meta_description = $professional_meta['meta_description'];
                            $professional_meta_robots = $professional_meta['meta_robots'];
                            $professional_permalink = $professional_meta['permalink'] .'/';


                            $professional = file_get_contents($api_url .'/webservices/api/professional/read_one.php?id='. $professionalID);
                            $professional = json_decode($professional, true); // decode the JSON into an associative array

                            $first_name = $professional['first_name'];
                            $last_name = $professional['last_name'];
                            $sex = $professional['sex'];
                            $address = $professional['address'];
                            $city= $professional['city'];
                            $service_area = $professional['service_area'];
                            $image = $professional['image'];
                            $description = $professional['description'];
                            $county_id = $professional['county_id'];
                            $profile_status = $professional['profile_status'];
                            $mobile = $professional['mobile'];
                            $phone = $professional['phone'];
                            $email =$professional['email'];
                            $calendar_id=$professional['calendar_id'];
                            $admin_comments=$professional['admin_comments'];
                            $viewtype= $professional['viewtype'];
                            $verified= $professional['verified'];
                            $image1= $professional['image1'];
                            $image2 = $professional['image2'];
                            $image3 = $professional['image3'];
                            $perid1 = $professional['perid1'];
                            $perid2 = $professional['perid2'];
                            $agreement1 = $professional['agreement1'];
                            $agreement2 = $professional['agreement2'];
                            $agreement3 = $professional['agreement3'];
                            $agreement4 = $professional['agreement4'];
                            $agreement5 = $professional['agreement5'];
                            $approve_per = $professional['approve_per'];
                            $approve_doc = $professional['approve_doc'];
                            $percentage = $professional['percentage'];
                            $applications = $professional['applications'];
                            $portfolio_photos = $professional['photos'];
                            $review_stats= $professional['reviews_stats'];
                            $reviews= $professional['reviews'];


                        }else{
                              exit(header("Location: index.php"));
                        }

                        $totalRevPercentage = floordec($review_stats['average_total']/5 *100 , 1).'%;'; // total scrore for stars
                 ?>

<!DOCTYPE html>
<html lang="el">
    <head>
        
        <title><?php echo $professional_meta_title; ?></title>

        <link rel="alternate" hreflang="el" href="<?php echo $profile_url . $professional_permalink; ?>">
        <meta name="description" content="<?php $professional_meta_description; ?>">
        <link rel="canonical" href="<?php echo $profile_url . $professional_permalink; ?>">

        <meta name="robots" content="<?php echo $professional_meta_robots; ?>">
        <meta property="og:locale" content="el_GR">

        <?php include('header.php');  

        session_start();

        if(isset($_SESSION["appID"])){
            $SelectedAppId = $_SESSION["appID"];
        }else{
            $SelectedAppId = $applications[0]['id'];
        }
        ?>


       
    </head>

<?php
include('menu.php');
include('search.php');

?>





                <div class="container-fluid main-container-profile">
                    <div class="container container-proffesional-profile">
                        <div id="professionalDetails" class="row">

                            <div class="col-md-3 profile-img">
                                <div class="profile-img-inner">
                                    <img src="<?php echo $api_url .'img/professional-imgs/'.$image ?>" onerror="this.src='<?php echo $api_url; ?>img/professional-imgs/default-img-4.jpg';" alt="" />
                                    <?php if(sizeof($reviews)>0){ ?>
                                        <div class="total-rating-num-outer"><span class="total-rating-num"><?php 
                                                $totalRevScore = floordec($review_stats['average_total'], 1);
                                                if( $totalRevScore == 5.0 || $totalRevScore == 4.0){
                                                    echo number_format($totalRevScore, -1);
                                                }else{
                                                    echo $totalRevScore;
                                                }
                                                 ?></span>/5</div>
                                    <?php } ?>
                                </div>

                                
                            </div>

                            <div class="col-md-5">
                                <h3 class="front-professional-name"><?php echo  $first_name . " " . $last_name; ?></h3>
                                <?php if(sizeof($reviews)>0){ ?>
                                    <a class="go-to-reviews" href="#proffessionalRiviews">
                                        <div class="col-md-12 proffesionalTotalReviews">
                                            <div class="starsouter">
                                                <div class="empty-bar">
                                                    <div style="width:<?php echo $totalRevPercentage; ?>"></div>
                                                </div>
                                            </div>
                                            <div class="rev-score"><span class="rating-num">
                                            <?php 
                                                $totalRevScore = floordec($review_stats['average_total'], 1);
                                                if( $totalRevScore == 5.0 || $totalRevScore == 4.0){
                                                    echo number_format($totalRevScore, -1);
                                                }else{
                                                    echo $totalRevScore;
                                                }
                                                 ?></span>/5</div>
                                            <div class="total-score"><span class="total-jobs"><?php echo $review_stats['total']; ?></span> Αξιολογήσεις</div>
                                        </div>
                                    </a>
                                <?php } ?>
                                <p class="front-professional-desc"><?php echo $service_area.', '.$city; ?>.</p>
                                <p class="front-professional-oneline-desc"><?php echo $description; ?></p>
                                <p class="front-proffesional-address"><i class="fa fa-map-marker"></i> <?php echo $address; ?></p>
                                <p class="front-professional-tel"><i class="fa fa-phone"></i> <span class="front-tel-span"><?php echo $mobile; ?></span></p>

                                
                            </div>

                            <div class="col-md-3">
                                <h3 class="h3-offer-title">Καλέστε για την συγκεκριμένη προσφορά:</h3>
                                <a class="a-offer-tel" href="tel:<?php echo $mobile; ?>"><p class="font-offer-tel"><i class="fa fa-phone-square"></i> <span class="front-offer-tel-span"><?php echo $mobile; ?></span></p></a>

                                <p class="offer-mcr-txt">*Ενημερώστε τους ότι καλείτε για την προσφορά του myConstructor.</p>

                                <?php 
                                if ($SelectedAppId != '0') {
                                    $app= $SelectedAppId;

                                    if( $app == '69' || $app == '70' || $app == '71' || $app == '72' || $app == '196' || $app == '219' || $app == '218' ||  $app == '216'  ){ ?>
                                        <a href="https://myconstructor.gr/transport/?memid=<?php echo $professionalID; ?>&amp;appid=<?php echo $app; ?>&amp;name=<?php echo $first_name; ?>&amp;surname=<?php echo $last_name; ?>" target="_blank">

                                            <div class="btn-prosfora-prof">Κλείσε online</div>
                                        </a>

                                         
                                        <?php } 
                                }?>

                                
                            </div>
                        </div>

                        <div class="row row-profile-nav">
                                <div class="col-md-3"></div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="profile-side-menu">
                                        <ul>
                                            <a href="#professionalDetails"><li class="first active">Στοιχεία Επαγγελματία</li></a><!--
                                         --><a href="#services"><li>Υπηρεσίες</li></a><!--
                                         --><a href="#prices"><li>Τιμές</li></a><!--
                                         --><?php if(sizeof($portfolio_photos) > 0){ ?><a href="#proffessionalImages"><li>Εικόνες Επαγγελματία</li></a><?php } ?><!--
                                         --><?php if(sizeof($reviews)>0){ ?><a href="#proffessionalRiviews"><li>Αξιολογήσεις</li></a><?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="container-fluid">
                    
                        <div class="row proffesional-row-content">
                            <div id="services" class="col-md-4 applications-tabs">
                               <div class="tabs-menu-outer">
                                    <div class="title-app-tabs">
                                        <h3>Υπηρεσίες</h3>
                                        
                                    </div>
                                     
                                    <ul class="nav nav-pills-vertical mytabs tab-app-profile">
                                        <?php 
                                            if ($SelectedAppId != '0') {
                                                $active_tab = $SelectedAppId;
                                            }else{
                                                $active_tab = $applications[0]['id'];
                                            
                                            }
                                            foreach ($applications as $application) {
                                                 $application_id = $application['id'];
                                                 $application_name = $application['application_name'];
                                                 $price = $application['price'];
                                                 $unit = $application['unit'];
                                                 $app_description = $application['app_description'];

                                                 if($active_tab == $application_id){
                                            ?>          
                                                 <li class="active"><a href="#app-<?php echo $application_id; ?>" data-toggle="tab" aria-expanded="true"><?php echo $application_name; ?></a></li>
                                            <?php }else{ ?>
                                                <li class=""><a href="#app-<?php echo $application_id; ?>" data-toggle="tab" aria-expanded="false"><?php echo $application_name; ?></a></li>
                                            <?php } 
                                            }
                                        ?>
                                    </ul>
                                </div>
                                
                            </div>
                            <div id="prices" class="col-md-8">
                                 
                                <div class="tab-content clearfix">

                                    <?php 
                                        if ($SelectedAppId != '0') {
                                            $active_tab = $SelectedAppId;
                                        }else{
                                            $active_tab = $applications[0]['id'];
                                        }
                                        foreach ($applications as $application) {
                                             $application_id = $application['id'];
                                             $application_name = $application['application_name'];
                                             $price = $application['price'];
                                             $unit = $application['unit'];
                                             $app_description = $application['app_description'];
                                             $budget = $application['budget'];

                                             if($active_tab == $application['id']){
                                    ?>
                                            <div class="tab-pane active" id="app-<?php echo $application['id']; ?>">
                                                <div class="title-app-tabs-content">
                                                    <h3><?php echo $application_name; ?></h3>
                                                    <div class="img-sep-1"><img src="<?php echo $api_url; ?>img/separator-4.png"></div>
                                                </div>
                                                <ul class="ul-app-info">
                                                        
                                                        <li class="app-pricing-info">
                                                            <div class="app-seper">
                                                                <h4>Πληροφορίες Χρέωσης:</h4>
                                                                <span><?php echo $budget; ?></span>
                                                            </div>
                                                        </li>
                                                        <li class="app-price-li">
                                                            <div class="app-seper">
                                                                <h4>Τιμή:</h4> 
                                                                <span class="app-price"> <?php echo $price; ?> </span><span><?php echo $unit; ?></span>
                                                            </div>
                                                        </li>
                                                        <li class="app-more-info">
                                                            <div class="app-seper">
                                                                <h4>Περισσότερες Πληροφορίες:</h4> 
                                                                <span><?php echo $app_description; ?></span>
                                                            </div>
                                                        </li>
                                                </ul>
                                               
                                            </div>
                                            <?php }else{ ?>
                                            <div class="tab-pane" id="app-<?php echo $application['id']; ?>">
                                                <div class="title-app-tabs-content">
                                                    <h3><?php echo $application_name; ?></h3>
                                                    <div class="img-sep-1"><img src="<?php echo $api_url; ?>img/separator-4.png"></div>
                                                </div>
                                                <ul class="ul-app-info"> 
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span><?php echo $budget; ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Τιμή:</h4> 
                                                            <span class="app-price"> <?php echo $price; ?> </span><span><?php echo $unit; ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span><?php echo $app_description; ?></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php }
                                        } ?>
                                       
                                    </div>
                                
                            </div>

                        </div>

                    </div>
                    <h1>  
               
                <?php if(sizeof($portfolio_photos) > 0){ ?>
                    <div class="container container-lightbox">
                        <div id="proffessionalImages" class="row proffessional-photos-row">
                            <div class="title-prof-photos">
                                <h3>Εικόνες Επαγγελματία</h3>
                                <img src="<php echo $api_url; ?>img/separator-4.png">
                            </div>
                            <?php foreach ($portfolio_photos as $photos) {
                                
                                $photo_name = $photos['image_name'];
                             ?>
                            
                                <a href="<?php echo $portfolio_url . $photo_name; ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3 portfolio-img">
                                        <img src="<?php echo $portfolio_url . $photo_name; ?>" class="img-fluid">
                                </a>
                            <?php } ?>
                            <div class="col-md-12 outer-porfolio-btns">
                                <div id="loadmore">Εμφάνισε Περισσότερες</div>
                                <div id="showless">Εμφάνισε Λιγότερες</div>
                            </div>
                            
                        </div>
                    </div>
                <?php } 
                if(sizeof($reviews)>0){
                ?>
                    <div class="container container-reviews">
                        

                            <div id="proffessionalRiviews" class="row profile-reviews-row">
                                <div class="col-md-12">
                                    <div class="title-prof-reviews">
                                        <h3>Αξιολογήσεις πελατών</h3>
                                        <img src="<?php echo $api_url; ?>img/separator-4.png">
                                    </div>
                                </div>
                                    <div class="col-md-5 prof-total-score">
                                        <div class="reviewsTitle">
                                            <div class="TotalRatingOuter col-md-5"><span class="totalRatingReviews"><?php 
                                            $totalRevScore = floordec($review_stats['average_total'], 1);
                                            if( $totalRevScore == 5.0 || $totalRevScore == 4.0){
                                                echo number_format($totalRevScore, -1);
                                            }else{
                                                echo $totalRevScore;
                                            }
                                             ?></span>/5 </div>
                                            
                                            <div class="total-score col-md-7"><p>Συνολικό σκορ</p> 
                                                    <p>Σκορ από <span class="total-jobs"><?php echo $review_stats['total']; ?></span> αξιολογήσεις</p>
                                                <div class="totalScore">
                                                    <div class="totalStars">
                                                        <div style="width: <?php  echo $totalRevPercentage.'%'; ?>"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       
                                    </div>
                                    <?php 
                                        $quality = floordec($review_stats['quality']/5 *100 , 1).'%;';
                                        $reliability= floordec($review_stats['reliability']/5 *100 , 1).'%;';
                                        $cost= floordec($review_stats['cost']/5 *100 , 1).'%';
                                        $schedule= floordec($review_stats['schedule']/5 *100 , 1).'%;';
                                        $behaviour= floordec($review_stats['behaviour']/5 *100 , 1).'%;';
                                        $cleaniness= floordec($review_stats['cleaniness']/5 *100 , 1).'%;';
                                    ?>                 
                                    <div class="col-md-7">
                                        <div class="col-md-6 bars-one-half">                         
                                                <p class="emplexp">Ποιότητα</p>
                                                   <div class="quality-empty">
                                                        <div style="width:<?php echo $quality; ?>"></div>
                                                    </div>
                                                 <p class="emplexp">Αξιοπιστία</p>
                                                    <div class="reliability-empty">
                                                        <div style="width:<?php echo $reliability; ?>"></div>
                                                    </div>
                                                 <p class="emplexp">Τιμή</p>
                                                    <div class="cost-empty">
                                                        <div style="width:<?php echo $cost; ?>"></div>
                                                    </div>
                                        </div>
                                            <div class="col-md-6 bars-one-half">
                                             <p class="emplexp">Συνέπεια</p>
                                                <div class="schedule-empty">
                                                    <div style="width:<?php echo $schedule; ?>"></div>
                                                </div>
                                             <p class="emplexp">Συμπεριφορά</p>
                                                <div class="behaviour-empty">
                                                    <div style="width:<?php echo $behaviour; ?>"></div>
                                                </div>
                                             <p class="emplexp">Καθαριότητα</p>
                                                <div class="cleanliness-empty">
                                                    <div style="width:<?php echo $cleaniness; ?>"></div>
                                                </div>
                                            </div>
                                     </div>
                            </div>

                            <?php 
                                foreach ($reviews as $review ) {
                                   $total = $review['quality'] + $review['reliability'] + $review['cost'] +$review['schedule'] + $review['behaviour'] + $review['cleaniness'];
                                   //$totalperReview = number_format($total/6 , 1);
                                   $totalperReview= floordec($total/6,1);
                                   $totalperReviewPercentage = floordec(($total/6)/5 *100 , 1).'%;';
                                   $format = 'Y-m-d H:i:s';
                                   $date= DateTime::createFromFormat($format, $review['created']);
                                   $comment= $review['comment'];
                                   $customer_name= $review['customer'];

                                ?>
                            <div class="row row-profile-review">
                                    <div class="col-md-12 review-outer">
                                        <div class="col-review">
                                                <div class="starsouter">
                                                    <div class="empty-bar">
                                                         <div style="width:<?php echo $totalperReviewPercentage; ?>"></div>
                                                     </div>
                                                </div>
                                            
                                            <div class="rev-score"><?php echo $totalperReview; ?>/5</div>
                                            <div class="reviewdate"><?php echo  $date->format('d-m-Y') ?></div>
                                            <p class="reviewComment"><?php echo $comment; ?></p>
                                            <p class="reviewerName"><?php echo $customer_name; ?></p>
                                        </div>
                                    </div>
                            </div>
                            <?php } ?>
                            
                    </div>
                <?php  } ?>
                </div>
                <script src="<?php echo $api_url;?>js/proffessional-profile.js"></script>
                <link href="<?php echo $api_url;?>lightbox/dist/ekko-lightbox.css" rel="stylesheet">
                <script src="<?php echo $api_url;?>lightbox/dist/ekko-lightbox.js"></script>


<?php include('footer.php'); ?>