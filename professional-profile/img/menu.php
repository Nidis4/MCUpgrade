
        <div class="wrapper">
            <!-- Sidebar Holder -->

            <nav id="sidebar" class="active hide-menu">
                <div class="mobile-menu"><i class="glyphicon glyphicon-menu-hamburger"></i></div>
                <div class="sidebar-header">
                     
                    <h3 style="display: none;"><span class="orange-text">MY</span>CONSTRUCTOR</h3>
                   
                    <strong>MCR</strong>
                     

                </div>

                <ul class="list-unstyled components">
                    <li  class="<?php if($currentPage =='index'){echo 'active';}?>">
                        <a href="index.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Homepege
                        </a>
                    </li>
                    <li class="<?php if($currentPage =='timeline'){echo 'active';}?>">
                        <a href="timeline.php">
                            <i class="glyphicon glyphicon-calendar"></i>
                            Timeline & Calendar
                        </a>
                    </li>
                    <li class="<?php if($currentPage =='review'){echo 'active';}?>">
                        <a href="review.php" >
                            <i class="glyphicon glyphicon-star"></i>
                            Reviews
                        </a>
                    </li>
                    <li class="<?php if($currentPage =='pricelist'){echo 'active';}?>">
                        <a href="pricelist.php">
                            <i class="glyphicon glyphicon-list"></i>
                            Pricelist
                        </a>
                    </li>
                    <li  class="<?php if($currentPage =='editprofile'){echo 'active';}?>">
                        <a href="editprofile.php">
                            <i class="glyphicon glyphicon-edit"></i>
                            Edit Profile
                        </a>
                    </li>
                    <li class="<?php if($currentPage =='portfolio'){echo 'active';}?>">
                        <a href="portfolio.php">
                            <i class="glyphicon glyphicon-picture"></i>
                            Gallery & Portfolio
                        </a>
                    </li>
                    <li class="<?php if($currentPage =='payments'){echo 'active';}?>">
                        <a href="payments.php">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            Payments
                        </a>
                    </li>
                </ul>

              
            </nav>


            <div id="content"  >

                <nav style="display: none;" class="navbar navbar-default profile-top-bar">
                    <div class="container-fluid">

                        <div class="navbar-header">
                           
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a style="padding-top:0px; padding-bottom:0px;" href="#"><div class="cycle-profile-img"><img src="minas.jpg"></div></a></li>
                                <li><a class="professional-top-name"  href="#"><span class="hi-span">Hi</span> Βασίλης Μηνάς</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                            <div class="logo-mcr">
                              <img src="Greek-white-2.png" />
                            </div>
                           
                        </div>
                    </div>
                </nav>