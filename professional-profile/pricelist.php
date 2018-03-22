<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'pricelist';
    include('menu.php');
?>
             <div class="container">
                        <div class="row pricelist-row">
                            <div class="col-md-12 page-title ">
                                <h2>Pricelist</h2>
                            </div>
                            <div class="col-md-6">
                                <p>Your Main Trade:*</p>
                                <?php 
                                    //echo SITE_URL.'webservices/api/professional/getCategories.php?prof_id='.$_SESSION['id'];

                                    $categories = file_get_contents(SITE_URL.'webservices/api/professional/getCategories.php?prof_id='.$_SESSION['id']);
                                    $categories = json_decode($categories, true); // decode the JSON into an associative array
                                    
                                ?>
                                <select class="select_trade">
                                    <option class="0" value="">Select</option>
                                    <?php 
                                        if(@$categories){
                                            foreach ($categories as $value) {
                                    ?>
                                               <option <?php if($value['is_main'] == 1){?> selected <?php }?> value="<?php echo $value['category_id']?>"><?php echo $value['category_name']?></option> 
                                    <?php
                                            }
                                        }
                                    ?>
                                   
                                </select>

                                <div class="addtrade">ADD ANOTHER TRADE</div>
                            </div>
                            <div class="col-md-6">

                                <p>County:*</p>
                                <select class="select_counties">
                                    <option value="">Select</option>
                                    <option value="3">Achaia</option>
                                    <option value="4">Aitoloakarnania</option>
                                    <option value="6">Arcadia</option>
                                    <option value="5">Argolida</option>
                                    <option value="7">Arta</option>
                                    <option selected="selected" value="1">Attica</option>
                                    <option value="8">Boeotia Prefecture</option>
                                    <option value="50">Chania</option>
                                    <option value="51">Chios</option>
                                    <option value="24">Corfu</option>
                                    <option value="28">Corinth</option>
                                    <option value="29">Cyclades</option>
                                    <option value="11">Dodecanese</option>
                                    <option value="10">Drama</option>
                                    <option value="13">Euvias</option>
                                    <option value="14">Evritania</option>
                                    <option value="12">Evros</option>
                                    <option value="47">Florina</option>
                                    <option value="48">Fokida</option>
                                    <option value="46">Fthiotida</option>
                                    <option value="53">Greece</option>
                                    <option value="9">Grevena</option>
                                    <option value="49">Halkidiki</option>
                                    <option value="18">Heraklion</option>
                                    <option value="16">Ilia</option>
                                    <option value="17">Imathia</option>
                                    <option value="20">Ioannina</option>
                                    <option value="22">Karditsa</option>
                                    <option value="23">Kastoria</option>
                                    <option value="21">Kavala</option>
                                    <option value="25">Kefalonia</option>
                                    <option value="26">Kilkis</option>
                                    <option value="27">Kozani</option>
                                    <option value="30">Laconia</option>
                                    <option value="31">Larissa Prefecture</option>
                                    <option value="34">Lefkada</option>
                                    <option value="33">Lesvos</option>
                                    <option value="35">Magnesia</option>
                                    <option value="36">Messinia</option>
                                    <option value="52">Mount Athos</option>
                                    <option value="38">Pella</option>
                                    <option value="32">Prefecture of Lasithi</option>
                                    <option value="39">Prefecture of Pieria</option>
                                    <option value="2">Prefecture of Thessaloniki</option>
                                    <option value="40">Preveza</option>
                                    <option value="41">Rethymno</option>
                                    <option value="42">Rodopi</option>
                                    <option value="43">Samos</option>
                                    <option value="44">Serres</option>
                                    <option value="19">Thesprotia</option>
                                    <option value="45">Trikala</option>
                                    <option value="37">Xanthi</option>
                                    <option value="15">Zakynthos</option>
                                </select>

                                <div class="addcountie">ADD ANOTHER COUNTY</div>
                            </div>
                            <div class="col-md-12">

                                <p>Pricing for each job category and specific applications</p>
                                <?php 
                                    $applications = file_get_contents(SITE_URL.'webservices/api/professional/getApplicationsPrices.php?id='.$_SESSION['id']);
                                    $applications = json_decode($applications, true); // decode the JSON into an associative array
                                    
                                    if(@$applications['records'][0]['application_id']){
                                        $cats = array();
                                        $i = 0;
                                        foreach ($applications['records'] as $value) {
                                            $i++;
                                            if($i == 1){
                                               $cats[] = $value['category_id']; 
                                ?>
                                                <div class="panel panel-default category-panel">
                                                  <div class="panel-heading">
                                                    <a data-toggle="collapse" href="#collapse<?php echo $value['category_id'];?>">
                                                        <h4 class="panel-title"><?php echo $value['category_name']?> <i class="fa fa-angle-down angel-style"></i></h4>
                                                    </a>
                                                  </div>
                                                  <div id="collapse<?php echo $value['category_id']?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h4 class="h4-cat-apps"><?php echo $value['category_name']?> Applications</h4>
                                                            <div class="panel-group app-group" id="accordion<?php echo $value['application_id']?>">
                                <?php
                                            }elseif(!in_array($value['category_id'], $cats)){
                                                $cats[] = $value['category_id'];
                                ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer"><?php echo $value['category_name']?></div>
                                                  </div>
                                                </div>

                                                <div class="panel panel-default category-panel">
                                                  <div class="panel-heading">
                                                    <a data-toggle="collapse" href="#collapse<?php echo $value['category_id'];?>">
                                                        <h4 class="panel-title"><?php echo $value['category_name']?> <i class="fa fa-angle-down angel-style"></i></h4>
                                                    </a>
                                                  </div>
                                                  <div id="collapse<?php echo $value['category_id']?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h4 class="h4-cat-apps"><?php echo $value['category_name']?> Applications</h4>
                                                            <div class="panel-group app-group" id="accordion<?php echo $value['application_id']?>">    
                                <?php
                                            }
                                            
                                ?>
                                                
                                
                                                        
                                                            <div class="panel panel-default">
                                                              <div class="panel-heading">
                                                                <a data-toggle="collapse" data-parent="#accordion<?php echo $value['application_id']?>" href="#collapse<?php echo $value['application_id']?>">
                                                                    <h4 class="panel-title">
                                                                     <?php echo $value['application_title']?> <i class="fa fa-angle-down inner-angel-style"></i>
                                                                    </h4>
                                                                </a>
                                                              </div>
                                                              <div id="collapse<?php echo $value['application_id']?>" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <h4>Moving up 30tm² studios</h4>
                                                                    <div class="app-description col-md-12">
                                                                        <p>The price includes the moving of objects with truck. If there will be needed extra men or lift, there is extra charge. Moreover, for routes over 10kms , there is diferrent charge.</p>
                                                                        <div class="read-more-btn">Read more</div>
                                                                        <div class="read-more-txt">
                                                                            <p>
                                                                                Moving up 30tm² studios. The price refers to moving with truck only, lift and workers are charged extra.

                                                                                Price includes moving for up to 5 normal pots,10-15 boxes, house appliances and furniture.

                                                                                Workers are charged 20€ each.

                                                                                If there is not elevator at the building, there is extra charge.Price refers to 2-2,5 hours. If else, the extra charge is 15€/hour.
                                                                            </p>
                                                                            <div class="col-md-12 read-less-btn">Read less</div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label" name="app_price">Price:</label>
                                                                        <input type="number" name="app_price" class="app_price" value="49" > <span class="app-span">€ + φπα</span>
                                                                    </div>
                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label" name="free_distance">Free distance:</label>
                                                                        <input type="number" name="free_distance" class="free-distance" value="10"> <span class="app-span">km</span>
                                                                    </div>

                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label" name="extra_price_km">Extra price/km:</label>
                                                                        <input type="number" name="extra_price_km" class="extra-price-km" value=""> <span class="app-span">€</span>
                                                                    </div>

                                                                    <div class="app-cols">
                                                                        <label class="app-label" name="app_one_line_desc">One line description:</label>
                                                                        <input type="text" name="app_one_line_desc" class="app-one-line-desc" value="Πολύχρονη Πείρα στις μεταφορές και τις μετακομίσεις">
                                                                    </div>

                                                                    <div class="app-cols">
                                                                        <label class="app-label" name="charge_info">Charge info:</label>
                                                                        <input type="text" name="charge_info" class="app-one-line-desc" value="Εργάτες +40€, Αναβατόριο +50 για κάθε σπίτι  Δε-Κυ 09:00-22:00">
                                                                    </div>

                                                                </div>
                                                              </div>
                                                            </div>
                                
                                                        
                                <?php                                         
                                            if($i == count($applications['records'])){
                                ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer"><?php echo $value['category_name']?></div>
                                                  </div>
                                                </div>      
                                <?php
                                            }
                                        }
                                    }
                                ?>

                                

                                <div class="save-pricelist">SAVE</div>

                            </div>  

                            
                    </div>
                </div>

          

            
          
            </div>
        </div>

    </body>
</html>
