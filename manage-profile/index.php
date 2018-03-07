<?php 
    
    include('header.php');

    $currentPage = 'index';
    include('menu.php');
?>

                    <div class="container container-profile-home">
                        <div class="row">
                            <div class="col-md-12 page-title">
                                <h2>Overview</h2>
                            </div>

                            <div class="col-md-12">
                                 <div class="alert alert-danger">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Attention!</strong> Υou have unpaid debts. Your account will be frozen! <a href="/mcr/manage-profile/index.php" class="alert-link">read more</a>.
                                  </div>

                                  <div class="alert alert-info">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Info!</strong> 1500 Users viewed your category and 300 users viewed your profile at the past month. <a href="#" class="alert-link">read more</a>.
                                  </div>
                                    
                                <div class="alert alert-success" style="display: none;">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Last Payment!</strong> 300€ at 10 FEB 2018. <a href="#" class="alert-link">read more</a>.
                                  </div>
                                  
                                  <div class="alert alert-warning"  style="display: none;">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    <strong>Next Appointment!</strong> Energy Certificate 1 MAR 9:30 Thespion 2, Peristeri, Greece. <a href="/mcr/manage-profile/timeline.php" class="alert-link">read more</a>.
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
                                          <div class="col-md-12 "><h2 class="appointment-cat-title">Energy Certificate</h2>
                                            
                                          </div>
                                            <div class="home-app-date">15 MAR 09:30</div>
                                            <div class="col-md-6">
                                                <p class="appointment-customer-name">Name: <span class="custormer-name">Giannis Pragias</span></p>
                                              
                                                <p class="appointment-address">Address: <a class="customer-address" target="_blank" href="https://www.google.gr/maps/dir//Thespieon+2-8,+Peristeri/@38.0104074,23.6788927,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x14a1a3273e0e3a83:0x64da0d0ad313a4d9!2m2!1d23.713998!2d38.010345">Thespion 2, Peristeri, Greece</a></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="appointement-budget">Budget: <span class="customer-budget">60€</span></p>
                                                <p class="appointement-commission">Commission: <span class="customer-commission">24€</span></p>
                                                
                                            </div>
                                            <div class="col-md-12 read-timeline-btn">Read More</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                         <h3>Last Review</h3>
                                            <div class="col-review">
                                                    <div class="starsouter">
                                                        <div class="empty-bar">
                                                             <div style="width:80%;"></div>
                                                         </div>
                                                    </div>
                                                    <div class="rev-score">5.0/5</div>
                                                    <div class="reviewdate">Φεβρουάριος 16, 2018</div>
                                                    <p class="reviewComment">Έμεινα πάρα πολύ ικανοποιημένος με τον κ.Παναγιωτακόπουλο Βασίλη.Προσεχτικός &amp; Συνεπής στην ώρα του.</p>
                                                    <p class="reviewerName">Σωτήρης Μανόφης</p>
                                            </div>
                                            <div class="col-md-12 read-timeline-btn">Read More</div>
                                        </div>
                                        
                                    </div>
                                </div> 
                                

                            </div>

                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="card-body">
                                       
                                    </div>   
                                </div>
                            </div>



                        </div>


                
            </div>
        </div>
    </body>
</html>
