<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'editprofile';
    include('menu.php');
?>
<style type="text/css">
    #content{
        background:#fff;
    }
</style>
                <?php
                            //echo SITE_URL.'webservices/api/review/read_paging.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=5';

                    $reviews = file_get_contents(SITE_URL.'webservices/api/review/read_avg.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=5');
                    $reviewsPag = json_decode($reviews, true);

                    if(@$reviewsPag['records'][0]['total']){

                        $quality = $reviewsPag['records'][0]['quality_avg'];
                        $quality_per = round(($reviewsPag['records'][0]['quality_avg'] / 5) * 100);

                        $reliability = $reviewsPag['records'][0]['reliability_avg'];
                        $reliability_per = round(($reviewsPag['records'][0]['reliability_avg'] / 5) * 100);

                        $cost = $reviewsPag['records'][0]['cost_avg'];
                        $cost_per = round(($reviewsPag['records'][0]['cost_avg'] / 5) * 100);

                        $schedule = $reviewsPag['records'][0]['schedule_avg'];
                        $schedule_per = round(($reviewsPag['records'][0]['schedule_avg'] / 5) * 100);

                        $behaviour = $reviewsPag['records'][0]['behaviour_avg'];
                        $behaviour_per = round(($reviewsPag['records'][0]['behaviour_avg'] / 5) * 100);

                        $cleanliness = $reviewsPag['records'][0]['cleanliness_avg'];
                        $cleanliness_per = round(($reviewsPag['records'][0]['cleanliness_avg'] / 5) * 100);

                        $total_rating = $quality + $reliability +  $cost + $schedule + $behaviour + $cleanliness;
                        $total_rating_per = number_format(($total_rating / 6) * 20,1) ;
                    }

                ?>

                <?php 
                    $profile = file_get_contents(SITE_URL.'webservices/api/professional/getProfile.php?id='.$_SESSION['id']);
                    $profile = json_decode($profile, true); // decode the JSON into an associative array
                    // echo "<pre>";
                    // print_r($profile['record']);
                    // die;
                    $first_name = "";
                    if(@$profile['record']['first_name']){
                        $first_name = $profile['record']['first_name'];
                    }
                    $last_name = "";
                    if(@$profile['record']['last_name']){
                        $last_name = $profile['record']['last_name'];
                    }

                    $description = "";
                    if(@$profile['record']['description']){
                        $description = $profile['record']['description'];
                    }

                    $service_area = "";
                    if(@$profile['record']['service_area']){
                        $service_area = $profile['record']['service_area'];
                    }

                    $address = "";
                    if(@$profile['record']['address']){
                        $address = $profile['record']['address'];
                    }

                    $mobile = "";
                    if(@$profile['record']['mobile']){
                        $mobile = $profile['record']['mobile'];
                    }
                    $image = "";
                    if(@$profile['record']['image']){
                        $image = $profile['record']['image'];
                    }

                ?>
                <div class="container-fluid main-container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="save-btn" id="editprofile" >Save</div>
                            </div>
                    </div>
                    <form id="profileEditForm">
                        <div class="container container-proffesional-profile">
                            <div class="row">
                                <div class="col-md-3 profile-img">
                                    <?php 
                                        if(@$image){
                                    ?>
                                            <div class="profile-img-inner">
                                                <img src="<?php echo SITE_URL.'img/professional-imgs/'.$image;?>">
                                            </div>
                                    <?php         
                                        }
                                    ?>
                                    <div class="total-rating-num-outer"><span class="total-rating-num"><?php echo number_format(($total_rating / 6),1);?></span>/5</div>
                                    <br><br>
                                    <div class="col-md-3"><input class="profile-img" id="profile_img" name="profile_img" type="file"></div>
                                </div>

                                <div class="col-md-5">
                                    <div class="col-md-6 col-sm-12" style="padding-left: 0px;">
                                        <input type="text" name="first_name" value="<?php echo $first_name;?>" class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                                        <input type="text" name="last_name" value="<?php echo $last_name;?>" class="form-control" placeholder="Last Name">
                                    </div>
                                    <!-- <h2 class="front-professional-name"><?php //echo $first_name. " ".$last_name;?></h2> -->
                                    <div class="col-md-12 proffesionalTotalReviews">
                                        <div class="starsouter">
                                            <div class="empty-bar">
                                                <div style="width:<?php echo $total_rating_per;?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="rev-score"><span class="rating-num"><?php echo number_format(($total_rating / 6),1);?></span>/5</div>
                                        <div class="total-score"><span class="total-jobs"><?php echo $reviewsPag['records'][0]['total'];?></span> Αξιολογήσεις</div>
                                    </div>
                                    <textarea class="form-control" name="service_area" placeholder="Service Area"><?php echo $service_area;?></textarea>
                                    <br>
                                    <textarea class="form-control" name="description" placeholder="Description"><?php echo $description;?></textarea>
                                    <br>
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address;?>">
                                    <br>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo $mobile;?>">
                                    <!-- <p class="front-professional-desc"><?php //echo $service_area;?></p> -->
                                    <!-- <p class="front-professional-oneline-desc"><?php //echo $description;?></p> -->
                                    <!-- <p class="front-proffesional-address"><i class="fa fa-map-marker"></i> <span class="spanAddress"><?php //echo $address;?></span></p>
                                    <p class="front-professional-tel"><i class="fa fa-phone"></i> <span class="front-tel-span">698 004 3090</span></p> -->                                
                                </div>

                                <div class="col-md-3">
                                    <h3 class="h3-offer-title">Καλέστε για την συγκεκριμένη προσφορά:</h3>
                                    <a href="tel:<?php echo $mobile;?>"><p class="font-offer-tel"><i class="fa fa-phone-square"></i> <span class="front-offer-tel-span"><?php echo $mobile;?></span></p></a>

                                    <p class="offer-mcr-txt">*Ενημερώστε τους ότι καλείτε για την προσφορά του myConstructor.</p>

                                    <a href="#" target="_blank"><div class="btn-prosfora-prof">Κλείσε online</div></a>
                                </div>
                            </div>

                            <div class="row row-profile-nav">
                                    <div class="col-md-3 col-sm-12">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="profile-side-menu">
                                            <ul>
                                                <a href="#"><li class="first active">Στοιχεία Επαγγελματία</li></a><!--
                                             --><a href="#"><li>Υπηρεσίες</li></a><!--
                                             --><a href="#"><li>Τιμές</li></a><!--
                                             --><a href="#"><li>Εικόνες Επαγγελματία</li></a><!--
                                             --><a href="#"><li>Αξιολογήσεις</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <input type="hidden" name="prof_id" value="<?php echo $_SESSION['id'];?>">
                    </form>

                    <div class="container">
                        <div class="row proffesional-row-content">
                            <div class="col-md-4 applications-tabs">
                                <div class="title-app-tabs">
                                    <h3>Υπηρεσίες</h3>
                                    <img src="img/separator-4.png">
                                </div>
                                <ul class="nav nav-pills-vertical mytabs">
                                    <li class="active"><a href="#1a" data-toggle="tab" aria-expanded="true">Μετακόμιση Γκαρσονιέρας</a></li>
                                    <li><a href="#2a" data-toggle="tab" aria-expanded="false">Μετακόμιση Δυάρι</a></li>
                                    <li><a href="#3a" data-toggle="tab" aria-expanded="false">Μετακόμιση Τριάρι</a></li>
                                    <li><a href="#4a" data-toggle="tab">Μετακόμιση Τεσσάρι</a></li>
                                    <li><a href="#5a" data-toggle="tab">Μεταφορική Αθήνα Θεσσαλονίκη-Κατερίνη-Βέροια-Κιλκίς</a></li>
                                    <li><a href="#6a" data-toggle="tab">Μεταφορική Αθήνα-Ξάνθη-Κομοτηνή-Αλεξανδρούπολη</a></li>
                                    <li><a href="#7a" data-toggle="tab">Μεταφορική Αθήνα-Χαλκιδική-Σέρρες-Δράμα-Καβάλα</a></li>
                                    <li><a href="#8a" data-toggle="tab">Μεταφορική Αθήνα Πάτρα</a></li>
                                    <li><a href="#9a" data-toggle="tab">Ενοικίαση Ανυψωτικού Μηχανήματος</a></li>
                                    <li><a href="#10a" data-toggle="tab">Συναρμολόγηση Επίπλων</a></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                 <div class="title-app-tabs">
                                    <h3>Περιγραφή υπηρεσιών</h3>
                                    <img src="img/separator-4.png">
                                </div>

                                <div class="tab-content clearfix">
                                            <div class="tab-pane active" id="1a">
                                                <ul class="ul-app-info">
                                                        <li class="app-description-title">
                                                            <h3>Μετακόμιση Γκαρσονιέρας</h3>
                                                        </li>
                                                        <li class="app-pricing-info">
                                                            <div class="app-seper">
                                                                <h4>Πληροφορίες Χρέωσης:</h4>
                                                                <span>Εργάτες +40€, Αναβατόριο +50 για κάθε σπίτι Δε-Κυ 09:00-22:00</span>
                                                            </div>
                                                        </li>
                                                        <li class="app-price-li">
                                                            <div class="app-seper">
                                                                <h4>Κόστος:</h4> 
                                                                <span class="app-price"> 49</span><span>€ + φπα</span>
                                                            </div>
                                                        </li>
                                                        <li class="app-more-info">
                                                            <div class="app-seper">
                                                                <h4>Περισσότερες Πληροφορίες:</h4> 
                                                                <span>Μετακόμιση Γκαρσονιέρας έως 30τμ Η τιμή αφορά μόνο την μετακόμιση με φορτηγό, ανυψωτικό μηχάνημα και εργάτες χρεώνονται έξτρα. Η τιμή αυτή περιλαμβάνει μεταφορά για οικοσυσκευές και έπιπλά. (π.χ. πλυντήριο, στεγνωτήριο, ψυγείο, κουζίνα, τραπεζαρία, συνθετο, κ.α.), 10-15 κούτες, μέχρι 5 κανονικές γλάστρες. Το μέγεθος της κούτας που αναφέρεται παραπάνω είναι 55cm x45cm x35cm (MxΠxY) και το μέγιστο βάρος της κούτας είναι 10 κιλά. Για οτιδήποτε διαφορετικό , υπάρχει μεγαλύτερη χρέωση ανα κούτα.  Για ογκώδη και βαριά αντικείμενα όπως μεγάλες ντουλάπες , μεγάλες βιβλιοθήκες, μεγάλες τραπεζαρίες , διάδρομους και όργανα γυμναστικής, μπιλιάρδο, πιάνα, έργα τέχνης ,πήλινες γλάστρες κ.ά. υπάρχει επιπλέον χρέωση. Εφόσον για την μετακόμιση χρειαστεί αναβατόριο, κοστίζει 50€ για το κάθε σπιτι. Οι εργάτες χρεώνονται 20€/άτομο. Εάν δεν υπάρχει ανσασέρ και η μεταφορά θα γίνει από σκάλες υπάρχει έξτρα επιβάρυνση.Η τιμή αυτή αφορά μόνο φορτηγό μέχρι 2-2,5 ώρες φόρτωμα-ξεφόρτωμα.Διαφορετικά υπάρχει έξτρα επιβάρυνση +15€/ώρα. Επίσης, για διαδρομές άνω των 10 χλμ. από σημείο σε σημείο , υπάρχει διαφορετική χρέωση.</span>
                                                            </div>
                                                        </li>
                                                </ul>
                                               
                                            </div>
                                            <div class="tab-pane" id="2a">

                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μετακόμιση Δυάρι</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span>Εργάτες +60€, Αναβατόριο +50 για κάθε σπίτι Δε-Κυ 09:00-22:00</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"> 70</span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Μετακόμιση Δυάρι έως 55τμ Η τιμή αφορά μόνο την μετακόμιση με φορτηγό, ανυψωτικό μηχάνημα και εργάτες χρεώνονται έξτρα. Η τιμή περιλαμβάνει μετακόμιση για οικοσυσκευές και έπιπλά. (π.χ. πλυντήριο, στεγνωτήριο, ψυγείο, κουζίνα, τραπεζαρία, συνθετο, κ.α.), 15 κούτες, μέχρι 5 κανονικές γλάστρες. Το μέγεθος της κούτας που αναφέρεται παραπάνω είναι 55cm x45cm x35cm (MxΠxY) και το μέγιστο βάρος της κούτας είναι 10 κιλά. Για οτιδήποτε διαφορετικό , υπάρχει μεγαλύτερη χρέωση ανα κούτα.  Για ογκώδη και βαριά αντικείμενα όπως μεγάλες ντουλάπες , μεγάλες βιβλιοθήκες, μεγάλες τραπεζαρίες , διάδρομους και όργανα γυμναστικής, μπιλιάρδο, πιάνα, έργα τέχνης ,πήλινες γλάστρες κ.ά. υπάρχει επιπλέον χρέωση. Εφόσον χρειαστεί αναβατόριο,κοστίζει 50€ για το κάθε σπιτι. Οι εργάτες χρεωνόνται  20€/άτομο Εάν δεν υπάρχει ασανσέρ και η μεταφορά θα γίνει από σκάλες υπάρχει έξτρα επιβάρυνση.Η τιμή αυτή αφορά μόνο φορτηγό μέχρι 2-2,5 ώρες φόρτωμα-ξεφόρτωμα.Διοφορετικά υπάρχει έξτρα επιβάρυνση +15€/ώρα. Επίσης, για διαδρομές άνω των 10 χλμ. από σημείο σε σημείο , υπάρχει διαφορετική χρέωση.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                       
                                            <div class="tab-pane" id="3a">
                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μετακόμιση Τριάρι</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span>Εργάτες +90€, Αναβατόριο +50 για κάθε σπίτι Δε-Κυ 09:00-22:00</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"> 90</span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Μετακόμιση Τριάρι έως 85τμ Η τιμή αφορά μόνο την μετακόμιση με φορτηγό, ανυψωτικό μηχάνημα και εργάτες χρεώνονται έξτρα. Η τιμή περιλαμβάνει μετακόμιση για οικοσυσκευές και έπιπλά. (π.χ. πλυντήριο, στεγνωτήριο, ψυγείο, κουζίνα, τραπεζαρία, συνθετο, κ.α.), μέχρι 25 κούτες, μέχρι 10 κανονικές γλάστρες. Το μέγεθος της κούτας που αναφέρεται παραπάνω είναι 55cm x45cm x35cm (MxΠxY) και το μέγιστο βάρος της κούτας είναι 10 κιλά. Για οτιδήποτε διαφορετικό , υπάρχει μεγαλύτερη χρέωση ανα κούτα.  Για ογκώδη και βαριά αντικείμενα όπως μεγάλες ντουλάπες , μεγάλες βιβλιοθήκες, μεγάλες τραπεζαρίες , διάδρομους και όργανα γυμναστικής, μπιλιάρδο, πιάνα, έργα τέχνης ,πήλινες γλάστρες κ.ά. υπάρχει επιπλέον χρέωση. Εφόσον χρειαστεί αναβατόριο,κοστίζει 50€ για το κάθε σπιτι. Οι εργάτες χρεωνόνται  20€/άτομο. Εάν δεν υπάρχει ανσασέρ και η μεταφορά θα γίνει από σκάλες υπάρχει έξτρα επιβάρυνση. Η τιμή αυτή αφορά μόνο φορτηγό μέχρι 2-2,5 ώρες φόρτωμα-ξεφόρτωμα.Διοφορετικά υπάρχει έξτρα επιβάρυνση +15€/ώρα.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                              
                                               
                                            </div>
                                            <div class="tab-pane" id="4a">
                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μετακόμιση Τεσσάρι</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span>Εργάτες +100€, Αναβατόριο +100€ (50€ για κάθε σπίτι) Δε-Κυ 09:00-22:00</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"> 120</span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Μετακόμιση Τεσσάρι έως 120τμ. Η τιμή αφορά μόνο την μετακόμιση με φορτηγό, ανυψωτικό μηχάνημα και εργάτες χρεώνονται έξτρα. Η τιμή περιλαμβάνει μετακόμιση για οικοσυσκευές και έπιπλά. (π.χ. πλυντήριο, στεγνωτήριο, ψυγείο, κουζίνα, τραπεζαρία, συνθετο, κ.α.), μέχρι 40 κούτες, μέχρι 20 κανονικές γλάστρες. Το μέγεθος της κούτας που αναφέρεται παραπάνω είναι 55cm x45cm x35cm (MxΠxY) και το μέγιστο βάρος της κούτας είναι 10 κιλά. Για οτιδήποτε διαφορετικό, υπάρχει μεγαλύτερη χρέωση ανα κούτα.  Για ογκώδη και βαριά αντικείμενα όπως μεγάλες ντουλάπες, μεγάλες βιβλιοθήκες, μεγάλες τραπεζαρίες, διάδρομους και όργανα γυμναστικής, μπιλιάρδο, πιάνα, έργα τέχνης, πήλινες γλάστρες κ.ά. υπάρχει επιπλέον χρέωση. Εφόσον χρειαστεί αναβατόριο,κοστίζει 50€ για το κάθε σπιτι. Οι εργάτες χρεωνόνται  20€/άτομο. Εάν δεν υπάρχει ανσασέρ και η μεταφορά θα γίνει από σκάλες υπάρχει έξτρα επιβάρυνση. Η τιμή αυτή αφορά μόνο φορτηγό μέχρι 2-2,5 ώρες φόρτωμα-ξεφόρτωμα.Διοφορετικά υπάρχει έξτρα επιβάρυνση +15€/ώρα.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                              
                                               
                                            </div>
                                            <div class="tab-pane" id="5a">
                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μεταφορική Αθήνα Θεσσαλονίκη-Κατερίνη-Βέροια-Κιλκίς</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span>Εργάτες +100€, Αναβατόριο +100€ (50€ για κάθε σπίτι) Δε-Κυ 09:00-22:00</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"></span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Μεταφορική Αθήνα Θεσσαλονίκη - Κατερίνη - Βέροια - Κιλκίς Οι αξιολογημένοι επαγγελματίες της πλατφόρμας αναλαμβάνουν υπεύθυνα οποιαδήποτε μεταφορά από και προς Αθήνα και Θεσσαλονίκη - Κατερίνη - Βέροια -Κιλκίς.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>


                                            <div class="tab-pane" id="6a">
                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μεταφορική Αθήνα-Ξάνθη-Κομοτηνή-Αλεξανδρούπολη</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"></span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Μεταφορική Αθήνα - Ξάνθη - Κομοτηνή - Αλεξανδρούπολη  Οι αξιολογημένοι επαγγελματίες της πλατφόρμας αναλαμβάνουν υπεύθυνα οποιαδήποτε μεταφορά από και προς Αθήνα και Ξάνθη - Κομοτηνή - Αλεξανδρούπολη .</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                              
                                                
                                            </div>

                                            <div class="tab-pane" id="7a">
                                                <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μεταφορική Αθήνα-Χαλκιδική-Σέρρες-Δράμα-Καβάλα</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"></span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span> Μεταφορική Αθήνα - Χαλκιδική - Σέρρες - Δράμα - Καβάλα Οι αξιολογημένοι επαγγελματίες της πλατφόρμας αναλαμβάνουν υπεύθυνα οποιαδήποτε μεταφορά από και προς Αθήνα και Χαλκιδική - Σέρρες - Δράμα - Καβάλα.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                              
                                                
                                            </div>
                                            <div class="tab-pane" id="8a">
                                               <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Μεταφορική Αθήνα Πάτρα</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price"></span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Αναλαμβάνουμε μεταφορές - μετακομίσεις από Αθήνα προς Πάτρα και από Πάτρα προς Αθήνα. Μεταφέρουμε οικοσυσκευές, κούτες, έπιπλα, στρώματα κ.ά.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="9a">
                                               <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Ενοικίαση Ανυψωτικού Μηχανήματος</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span> +15€/ έξτρα ώρα ενοικίασης</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price">70</span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Ενοικίαση Ανυψωτικού Μηχανήματος Μπορείτε πλέον να ενοικιάσετε μόνο το ανυψωτικό μηχάνημα με χρονοχρέωση.  Οι τιμές είναι ενδεικτικές και μπορεί να διαφοροποιηθούν σε ιδιαίτερες περιπτώσεις.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="10a">
                                               <ul class="ul-app-info">
                                                    <li class="app-description-title">
                                                        <h3>Συναρμολόγηση Επίπλων</h3>
                                                    </li>
                                                    <li class="app-pricing-info">
                                                        <div class="app-seper">
                                                            <h4>Πληροφορίες Χρέωσης:</h4>
                                                            <span> +15€/ έξτρα ώρα ενοικίασης</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-price-li">
                                                        <div class="app-seper">
                                                            <h4>Κόστος:</h4> 
                                                            <span class="app-price">30</span><span>€ + φπα</span>
                                                        </div>
                                                    </li>
                                                    <li class="app-more-info">
                                                        <div class="app-seper">
                                                            <h4>Περισσότερες Πληροφορίες:</h4> 
                                                            <span>Συναρμολόγηση Επίπλων   Οι έμπειροι επαγγελματίες συναρμολογούν πολύ γρήγορα τα έπιπλα σας κατα τη διάρκεια μιας μετακόμισης σε χρόνο ρεκόρ. Οι χρεώσεις για κάθε έπιπλο διαμορφώνονται συνήθως ως εξής: Κρεβάτι Απλό 30€ Κρεβάτι με μηχανισμό ή ντουλάπια 60€ Γραφείο απλό 30€ Ντουλάπια ράφια γραφείου 20€ Ντουλαπάκι 20-30€ Ντουλάπες(απαιτούνται 2 άτομα) 60€ ( 2 φύλλα & 2 m ύψος) ,τα 3 φύλλα 75€ Σύνθετο 50€ (μέχρι 2 m πλάτος) και +20€/τρέχον μέτρο (πέραν των 2 μέτρων). Οι παραπάνω τιμές είναι ενδεικτικές και μπορεί να έχουν μια μικρή απόκλιση ανά περίπτωση.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                    </div>
                                
                            </div>
                            
                            

                            
                        </div>    
                    </div>

                    <div class="container container-lightbox">
                                        <div class="row proffessional-photos-row">
                                            <div class="title-app-tabs">
                                                <h3>Εικόνες Επαγγελματία</h3>
                                                <img src="img/separator-4.png">
                                            </div>
                                            <?php 
                                                //echo SITE_URL.'webservices/api/professional/getPhotos.php?prof_id='.$_SESSION['id'];
                                                $photos = file_get_contents(SITE_URL.'webservices/api/professional/getPhotos.php?prof_id='.$_SESSION['id']);
                                                $photos = json_decode($photos, true); // decode the JSON into an associative array

                                                if(@$photos['records']){
                                                    foreach ($photos['records'] as $value) {
                                            ?>
                                                        <a href="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3">
                                                            <img src="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" class="img-fluid">
                                                        </a>   
                                            <?php            
                                                    }
                                                }
                                                
                                            ?>
                                            
                                        </div>


                    </div>

                    <div class="container container-reviews">
                        

                            <div class="row profile-reviews-row">
                                <div class="col-md-12">
                                    <div class="title-app-tabs">
                                        <h3>Αξιολογήσεις πελατών</h3>
                                        <img src="img/separator-4.png">
                                    </div>
                                </div>
                                    <div class="col-md-5 prof-total-score">
                                        <div class="reviewsTitle">
                                            <div class="TotalRatingOuter"><span class="totalRatingReviews"><?php echo number_format(($total_rating / 6),1);?></span>/5 </div><div class="total-score">Συνολικό σκορ <br>
                                                    Σκορ από <span class="total-jobs"><?php echo $reviewsPag['records'][0]['total'];?></span> αξιολογήσεις</div>
                                        </div>
                                        <div class="totalScore">
                                            <div class="totalStars">
                                                <div style="width: <?php echo $total_rating_per;?>%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                                        
                                                    
                                    <div class="col-md-7">
                                        <div class="col-md-6 bars-one-half">                         
                                            <p class="emplexp">Quality</p>
                                            <div class="quality-empty">
                                                <div style="width:<?php echo $quality_per;?>%;"></div>
                                            </div>
                                             <p class="emplexp">Reliability</p>
                                            <div class="reliability-empty">
                                                <div style="width:<?php echo $reliability_per;?>%;"></div>
                                            </div>
                                             <p class="emplexp">Cost</p>
                                            <div class="cost-empty">
                                                <div style="width:<?php echo $cost_per;?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 bars-one-half">
                                            <p class="emplexp">Schedule</p>
                                            <div class="schedule-empty">
                                                <div style="width:<?php echo $schedule_per;?>%;"></div>
                                            </div>
                                            <p class="emplexp">Behaviour</p>
                                            <div class="behaviour-empty">
                                                <div style="width:<?php echo $behaviour_per;?>%;"></div>
                                            </div>
                                            <p class="emplexp">Cleanliness</p>
                                            <div class="cleanliness-empty">
                                                <div style="width:<?php echo $cleanliness_per;?>%;"></div>
                                            </div>
                                        </div>
                                     </div>
                            </div>
                            <?php
                            //echo SITE_URL.'webservices/api/review/read_paging.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=5';

                            $reviews = file_get_contents(SITE_URL.'webservices/api/review/read_paging.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=5');
                            $reviewsPag = json_decode($reviews, true);

                            if(@$reviewsPag['records'][0]['id']){
                                foreach ($reviewsPag['records'] as $review) {
                                    // echo "<pre>";
                                    // print_r($review);
                                    // die;
                                    $quality = $review['quality'];
                                    $quality_per = round(($review['quality'] / 5) * 100);

                                    $reliability = $review['reliability'];
                                    $reliability_per = round(($review['reliability'] / 5) * 100);

                                    $cost = $review['cost'];
                                    $cost_per = round(($review['cost'] / 5) * 100);

                                    $schedule = $review['schedule'];
                                    $schedule_per = round(($review['schedule'] / 5) * 100);

                                    $behaviour = $review['behaviour'];
                                    $behaviour_per = round(($review['behaviour'] / 5) * 100);

                                    $cleanliness = $review['cleanliness'];
                                    $cleanliness_per = round(($review['cleanliness'] / 5) * 100);

                                    $total_rating = $quality + $reliability +  $cost + $schedule + $behaviour + $cleanliness;
                                    $total_rating_per = number_format(($total_rating / 6) * 20,1) ;
                            ?>

                                <div class="row row-profile-review">
                                    <div class="col-md-12 review-outer">
                                        <div class="col-review">
                                            <div class="starsouter">
                                                <div class="empty-bar">
                                                     <div style="width:<?php echo $total_rating_per;?>%;"></div>
                                                 </div>
                                            </div>
                                            <div class="rev-score"><?php echo number_format(($total_rating / 6),1)?>/5</div>
                                            <div class="reviewdate"><?php echo date('F, d Y',strtotime($review['created']));?></div>
                                            <p class="reviewComment"><?php echo $review['comment'];?></p>
                                            <p class="reviewerName"><?php echo $review['cust_member_name'];?></p>
                                        </div>
                                    </div>
                                </div>
                            
                        <?php        
                                }
                            }
                        ?>
                    </div>

                
                    
                </div>

            </div>
        </div>
       
        <script src="js/professional-edit-profile.js"></script>
        <link href="../lightbox/dist/ekko-lightbox.css" rel="stylesheet">
        <script src="../lightbox/dist/ekko-lightbox.js"></script>
        <script src="../js/core.js"></script>
        <script>
            $(document).ready(function() {
                $("#editprofile").on('click',function(){
                    var getSaveAPI = API_LOCATION+'professional/updateProfile.php';

                    var form_data = new FormData(); 

                    //Form data
                    var input_data = $('#profileEditForm').serializeArray();
                    $.each(input_data, function (key, input) {
                        form_data.append(input.name, input.value);
                    });

                    var profile_img = $('#profile_img').prop('files')[0];
                    form_data.append('profile_img', profile_img);
                
                    $.ajax({
                            type: "POST",
                            url: getSaveAPI,
                            dataType: "JSON",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function(data)
                            {
                                alert(data['message']);
                                location.reload();
                            }
                        });
                    return false;
                });
            });
        </script>    
     


    </body>

</html>
