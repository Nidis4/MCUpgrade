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
                                $profile = json_decode($profile, true); // decode the JSON into an associative array
                            ?>
                            <div class="col-md-12">
                                <?php if($profile['record']['verified']==0){?>    
                                 <div class="alert alert-danger">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Attention!</strong> Your profile is under verification.
                                  </div>
                                <?php }?>

                                 <div class="alert alert-danger">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Attention!</strong> Υou have unpaid debts. Your account will be frozen! <a href="/manage-profile/payments.php" class="alert-link">read more</a>.
                                  </div>

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

                                        <table class="table table-responsive-md table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Professional Name</th>
                                                    <th>Main Category</th>
                                                    <th>Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Αριστείδης Βελέντζας</td>
                                                    <td><span class="badge badge-success">Transports</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                                80%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Γιάννης Πράγιας</td>
                                                    <td><span class="badge badge-success">Energy Certificate</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                                78%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Δημήτρης Παππάς</td>
                                                    <td><span class="badge badge-warning">Paint</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
                                                                76%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="mypossition">
                                                    <td>10</td>
                                                    <td>Λευτέρης Ματζουράνης</td>
                                                    <td><span class="badge badge-success">Transports</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                                70%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>Μάριος Ιωαννίδης</td>
                                                    <td><span class="badge badge-warning">Plumber</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 61%;">
                                                                63%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Βασίλης Μούγιος</td>
                                                    <td><span class="badge badge-warning">Plumber</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                62%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>Θοδωρής Γιαννόπουλος</td>
                                                    <td><span class="badge badge-warning">Plumber</span></td>
                                                    <td>
                                                        <div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                                                61%
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h3>How to the best!</h3>

                                        <ul class="ul-how-to-best">
                                            <li><i class="fa fa-bolt"></i> Be kind to the clients! Remember it is how we make our living! </li>
                                            <li><i class="fa fa-bolt"></i> Be clean and presentable. We understand that you can’t look polished after a hard day at work but keeping our clothes neat and our personal hygiene to a good level will most certainly pay us back!</li>
                                            <li><i class="fa fa-bolt"></i> Work on your negotiations skills with the assigned jobs! Do your best to meet your clients need in the most respectful way! Listen to your clients and their needs.</li>
                                            <li><i class="fa fa-bolt"></i> Pay on time: Paying your commissions on time will help building the trust between us and will help us all work better and more efficient!</li>
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
