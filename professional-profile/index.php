<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'index';
    include('menu.php');
?>

                    <div class="container container-profile-home">
                        <div class="row">
                            <div class="col-md-12 page-title">
                                <h2>Overview</h2>
                            </div>
                            <?php 
                                //echo SITE_URL.'webservices/api/professional/getProfile.php?id='.$_SESSION['id'];
                                $profile = file_get_contents(SITE_URL.'webservices/api/professional/getProfile.php?id='.$_SESSION['id']);
                                //echo SITE_URL.'webservices/api/professional/getProfile.php?id='.$_SESSION['id'];
                                $profile = json_decode($profile, true); // decode the JSON into an associative array

                                $categories = $profile['categories'];
                                
                            ?>
                            <div class="col-md-12">
                                <?php if($profile['verified']==0){?>    
                                 <div class="alert alert-danger">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Ενημέρωση!</strong> Το αίτημα σας για τη δημιουργία του προφιλ είναι υπο επεξεργασία.
                                  </div>
                                <?php }?>

                                <?php if($profile['balance'] > 150){?>    
                                 <div class="alert alert-danger">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Προσοχή!</strong> Το χρέος σας έχει ξεπεράσει τα 150 Ευρώ και ο λογαριασμός σας θα απενεργοποιηθεί εντός των επόμενων 3 ημερών! <a href="/professional-profile/payments.php" class="alert-link">read more</a>.
                                  </div>
                                <?php }?>
                                
                                  <div class="alert alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Info!</strong> 1500 Users viewed your category and 300 users viewed your profile at the past month.
                                  </div>
                                    
                                
                                 
                                </div>
                            </div>

                            <div class="row display-table">
                                
                                <div class="col-md-6">
                                    
                                    <div class="card-body">
                                        <h3>Top 10 Professionals</h3>
                                        <div class="row">
                                            <select data-plugin-selectTwo class="form-control populate" name="category" id="category">
                                                <?php
                                                $selCat = "";
                                                foreach ($categories as $category) {
                                                    
                                                    $cat_id = $category['category_id'];
                                                    $cat_name = $category['category_name'];
                                                    if ($selCat == ""){
                                                        $selCat = $cat_id;
                                                        $selCatName = $cat_name;
                                                    }
                                                    echo '<option value="'.$cat_id.'" data-name="'.$cat_name.'" data-prof="'.$_SESSION['id'].'">'.$cat_name.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <table class="table table-responsive-md mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Professional Name</th>
                                                    <th>Main Category</th>
                                                    <th>Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody class="profScores">
                                                <?php
                                                    $professionals = file_get_contents(SITE_URL.'webservices/api/professional/getScore.php?cat_id='.$selCat);
                                                    //echo 'webservices/api/professional/getScore.php?cat_id='.$selCat;
                                                    //echo SITE_URL.'webservices/api/professional/getProfile.php?id='.$_SESSION['id'];
                                                    $professionals = json_decode($professionals, true); // decode the JSON into an associative array
                                                    $i = 0;
                                                    foreach ($professionals as $professional) {
                                                        $i++;
                                                        if ($_SESSION['id'] == $professional['professional_id']){
                                                            echo "<tr class='mypossition'>";
                                                        }
                                                        else{
                                                            echo "<tr>";
                                                        }
                                                        
                                                        echo "<td>$i</td>";
                                                        echo "<td>".$professional['firstname']." ".$professional['lastname']."</td>";
                                                        echo "<td><span class='badge badge-success'>".$selCatName."</td>";
                                                        echo "<td><div class='progress progress-sm progress-half-rounded m-0 mt-1 light'><div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: ".$professional['score']."%;'>".$professional['score']."</div></div></td>";
                                                        echo "</tr>";
                                                    }
                                                ?>     
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h3>Πώς να γίνεις ο καλύτερος:</h3>

                                        <ul class="ul-how-to-best">
                                            <li><i class="fa fa-bolt"></i> Κάνε τις πληρωμές σου στην ώρα σου. Οι συνεπείς πληρωμές θα βοηθήσουν στη δημιουργία ενός κλίματος εμπιστοσύνης  ανάμεσα μας και αυτό με βεβαιότητα θα κάνει καλό στις δουλειές μας. </li>
                                            <li><i class="fa fa-bolt"></i> Να είσαι καλός και ευγενικός με τους πελάτες. Να θυμάσαι ότι έχουν το δικαίωμα αξιολόγησης και οι καλές αξιολογήσεις θα σε ανεβάσουν ψηλά!!</li>
                                            <li><i class="fa fa-bolt"></i> Μην ξεχνάς ότι όλοι οι πελάτες μας μας έχουν ανάγκη!  Μην απορρίπτεις δουλειές όσο μικρές και αν είναι! Στόχος μας είναι όλοι οι πελάτες μας να είναι ευχαριστημένοι!</li>
                                            <li><i class="fa fa-bolt"></i> Και μην ξεχνάς ότι για να κλείνουμε δουλειές πρέπει να είμαστε ευχάριστοι, διαλλακτικοί και με αξιοπρεπή εμφάνιση.</li>
                                            <li><i class="fa fa-bolt"></i> Άκου τον πελάτη σου και τις ανάγκες του! Αυτό θα σε βοηθήσει να κλείσεις περισσότερες δουλειές και θα σε ανεβάσει ψηλά στη κατάταξ</li>
                                        </ul>
                                    </div>

                                </div>

                                
                            </div>

                            <div class="row display-table">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h3>Next Appointment </h3>
                                            <?php
                                                $latest = 1;
                                                $appointments = file_get_contents(SITE_URL.'webservices/api/appointment/read_paging.php?prof_id='.$_SESSION['id'].'&latest='.$latest.'&from_record_num=0&records_per_page=1');
                                                $appointmentsPag = json_decode($appointments, true);

                                                if(@$appointmentsPag['records'][0]['id']){
                                                    foreach ($appointmentsPag['records'] as $appointment) {
                                                        $appointment_date = $appointment['date'];
                                                        $appointment_time = str_replace(" ", '', $appointment['time']);
                                                        if(@$appointment_time){
                                                            $atime = explode('-', $appointment_time);
                                                        }else{
                                                            $atime[0] = "";
                                                        }

                                                        $appointment_budget = $appointment['budget'];
                                                        $appointment_commision = $appointment['commision'];
                                                        $appointment_address = $appointment['address'];
                                                        $appointment_cust_member_name = $appointment['cust_member_name'];
                                                        $appointment_comment = $appointment['comment'];
                                                        $appointment_agent_name = $appointment['agent_name'];
                                                        $appointment_mobile = $appointment['mobile'];
                                                        $appointment_category = $appointment['category_name'];
                                                        //$appointment_category = "";


                                                ?>
                                                        <div class="col-md-12 ">
                                                            <h2 class="appointment-cat-title"><?php echo $appointment_category;?></h2>                                            
                                                        </div>
                                                        <div class="home-app-date"><?php echo date("d M",strtotime($appointment_date))." ".$atime[0];?></div>
                                                        <div class="col-md-6">
                                                            <p class="appointment-customer-name">Name: <span class="custormer-name"><?php echo $appointment_cust_member_name;?></span></p>
                                                          
                                                            <p class="appointment-address">Address: <a class="customer-address" target="_blank" href="https://www.google.gr/maps/dir//<?php echo $appointment_address;?>"><?php echo $appointment_address;?></a></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="appointement-budget">Budget: <span class="customer-budget"><?php echo $appointment_budget;?>€</span></p>
                                                            <p class="appointement-commission">Commission: <span class="customer-commission"><?php echo $appointment_commision;?>€</span></p>
                                                            
                                                        </div>
                                                        <a href="<?php echo SITE_URL;?>professional-profile/timeline.php"><div class="col-md-12 read-timeline-btn">Read More</div></a>
                                    <?php           }
                                                }else{
                                    ?>
                                                    <div class="col-md-12 ">
                                                            <p>No Upcoming Appointment.</p>                                            
                                                    </div>
                                    <?php                
                                                }
                                    ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                         <h3>Last Review</h3>
                                         <?php
                                            //echo SITE_URL.'webservices/api/review/read_paging.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=5';

                                            $reviews = file_get_contents(SITE_URL.'webservices/api/review/read_paging.php?prof_id='.$_SESSION['id'].'&from_record_num=0&records_per_page=1');
                                            $reviewsPag = json_decode($reviews, true);

                                            if(@$reviewsPag['records'][0]['id']){
                                                foreach ($reviewsPag['records'] as $review) {
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
                                                    <a href="<?php echo SITE_URL;?>/professional-profile/review.php"><div class="col-md-12 read-timeline-btn">Read More</div></a>
                                        <?php   } 
                                            }else{
                                        ?>
                                                    <div class="col-review">N/A</div>          
                                        <?php        
                                            }
                                        ?>
                                        </div>
                                        
                                    </div>
                                </div> 
                                

                            </div>

                        </div>


                
            </div>
        </div>
    </body>
</html>
