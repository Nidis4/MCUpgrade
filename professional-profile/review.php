<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'review';
    include('menu.php');
        ?>
                <div class="container">
                     <div class="row total-reviews-row">
                        <div class="col-md-12 page-title-review"><h2>Customers Reviews</h2></div>
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

                        ?>
                             <div class="col-md-5">
                                <div class="reviewsTitle">
                                    <div class="TotalRatingOuter"><span class="totalRatingReviews"><?php echo number_format(($total_rating / 6),1);?></span>/5 </div><div class="total-score">Total score <br>
                                            Score from <span class="total-jobs"><?php echo $reviewsPag['records'][0]['total'];?></span> reviews </div>
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
                        <?php 
                            }else{
                        ?>  
                                <div class="col-md-5">
                                    <div class="reviewsTitle">
                                        <div class="TotalRatingOuter"><span class="totalRatingReviews">N</span>/A </div>
                                    </div>
                                </div>
                        <?php        
                            }

                            

                        ?>
                        
                            
                                                
                                            
                            
                        </div>
                    </div>
                    <div class="contaier latest-reviews-row">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Latest Reviews</h2>
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
                                    <div class="row review-row">
                                        <div class="col-md-7 review-outer">
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
                                        <div class="col-md-5">
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
                                }
                            }
                        ?>
                        
                       
                    </div>
           
           
        </div>

    </body>
</html>
