<?php 
    include('header.php');
    $currentPage = 'pricelist';
    include('menu.php');
?>
             <div class="container">
                        <div class="row pricelist-row">
                            <div class="col-md-12 page-title ">
                                <h2>Pricelist</h2>
                            </div>

                            <div class="col-md-12">
                                <p>Professional Description:*</p>
                                <textarea class="proffessional-description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <p>Your Main Trade:*</p>

                                <select class="select_trade">
                                    <option class="0" value="">Select</option>
                                    <option id="126" class="126" value="126">Offers</option>
                                    <option id="31" class="31" value="31">General Form</option>
                                    <option id="41" class="41" value="41">Renovation</option>
                                    <option id="132" class="132" value="132">Furniture Safekeeping</option>
                                    <option id="71" class="71" value="71">Building Permit</option>
                                    <option id="72" class="72" value="72">Architectural Drawings</option>
                                    <option id="105" class="105" value="105">License of Small Scale</option>
                                    <option id="56" class="56" value="56">Elevators</option>
                                    <option id="102" class="102" value="102">Disinfection</option>
                                    <option id="116" class="116" value="116">Drainage</option>
                                    <option id="54" class="54" value="54">Paint</option>
                                    <option id="104" class="104" value="104">Legality Certificate Property</option>
                                    <option id="133" class="133" value="133">Biological Car Cleaning</option>
                                    <option id="111" class="111" value="111">Cement Filling</option>
                                    <option id="55" class="55" value="55">Gypsum Board</option>
                                    <option id="64" class="64" value="64">Underfloor Heating</option>
                                    <option id="62" class="62" value="62">Concrete Floors</option>
                                    <option id="43" class="43" value="43">Energy Certificate</option>
                                    <option id="100" class="100" value="100">Service White Appliances</option>
                                    <option id="125" class="125" value="125">Thermography</option>
                                    <option id="32" class="32" value="32">Walls Insulation</option>
                                    <option id="58" class="58" value="58">Electrician</option>
                                    <option id="117" class="117" value="117">Computer Electricician</option>
                                    <option id="134" class="134" value="134">Electrical Rennovation</option>
                                    <option id="68" class="68" value="68">Skips</option>
                                    <option id="66" class="66" value="66">Energy Fireplaces</option>
                                    <option id="101" class="101" value="101">Mattress cleaning</option>
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

                                <div class="panel panel-default category-panel">
                                  <div class="panel-heading">
                                    <a data-toggle="collapse" href="#collapse1">
                                        <h4 class="panel-title">Transports <i class="fa fa-angle-down angel-style"></i></h4>
                                    </a>
                                  </div>
                                  <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <h4 class="h4-cat-apps">Transports Applications</h4>


                                        <div class="panel-group app-group" id="accordion">
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    <h4 class="panel-title">
                                                     Studio Moving <i class="fa fa-angle-down inner-angel-style"></i>
                                                    </h4>
                                                </a>
                                              </div>
                                              <div id="collapse2" class="panel-collapse collapse in">
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
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    <h4 class="panel-title">
                                                        Moving Flat <i class="fa fa-angle-down inner-angel-style"></i>
                                                    </h4>
                                                </a>
                                              </div>
                                              <div id="collapse3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    

                                                        <h4>Moving up 55m² flat.</h4>
                                                        <div class="app-description col-md-12">
                                                            <p>The price includes the moving of objects with truck. If there will be needed extra men or lift, there is extra charge. Moreover, for routes over 10kms , there is diferrent charge.</p>
                                                            <div class="read-more-btn">Read more</div>
                                                            <div class="read-more-txt">
                                                                <p>
                                                                    Moving up 55m² flar.The price refers to moving with truck only, lift and workers are charged extra.

                                                                    Price includes moving for up to 5 normal pots,10-15 boxes, house appliances and furniture.

                                                                    Workers are charged 20€ each.

                                                                    If there is not elevator at the building, there is extra charge.Price refers to 2-2,5 hours. If else, the extra charge is 15€/hour.

                                                                </p>
                                                                <div class="col-md-12 read-less-btn">Read less</div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="app-cols col-md-4">
                                                            <label class="app-label" name="app_price">Price:</label>
                                                            <input type="number" name="app_price" class="app_price" value="70" > <span class="app-span">€ + φπα</span>
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
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    <h4 class="panel-title">
                                                      Two bedrooms moving <i class="fa fa-angle-down inner-angel-style"></i>
                                                    </h4>
                                                </a>
                                              </div>
                                              <div id="collapse4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    

                                                    <h4>Moving Triplex</h4>
                                                        <div class="app-description col-md-12">
                                                            <p>Triplex to 85tm². The price includes the moving of objects with truck. If there will be needed extra men or lift, there is extra charge. Moreover, for routes over 10kms , there is diferrent charge.</p>
                                                            <div class="read-more-btn">Read more</div>
                                                            <div class="read-more-txt">
                                                                <p>
                                                                    Moving Triplex to 85tm². The price refers to moving with truck only, lift and workers are charged extra.

                                                                    Price includes moving for up to 5 normal pots,10-15 boxes, house appliances and furniture.

                                                                    Workers are charged 20€ each.

                                                                    If there is not elevator at the building, there is extra charge.Price refers to 2-2,5 hours. If else, the extra charge is 15€/hour.

                                                                </p>
                                                                <div class="col-md-12 read-less-btn">Read less</div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="app-cols col-md-4">
                                                            <label class="app-label" name="app_price">Price:</label>
                                                            <input type="number" name="app_price" class="app_price" value="90" > <span class="app-span">€ + φπα</span>
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
                                          </div> 


                                    </div>
                                    <div class="panel-footer">myConstructor.gr</div>


                                  </div>
                                </div>

                                <div class="save-pricelist">SAVE</div>

                            </div>  

                            
                    </div>
                </div>

          

            
          
            </div>
        </div>

    </body>
</html>
