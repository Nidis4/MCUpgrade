<?php

if($_POST){

                      // Unescape the string values in the JSON array

                      //$myThings = stripcslashes($_POST['myThings']);



                      // Decode the JSON array

                      //$myThings = json_decode($myThings,TRUE);

                      //appid,agentid,myDate,telprice,telcommission,inputName,inputSurname,afetiria,telikos,email,tel,transport,clearTransport

                      

                      $myDate= $_POST['myDate'];

                      $email= $_POST['userEmail'];

                      $telprice= $_POST['telprice'];



                      $inputName= $_POST['inputName'];

                      $inputSurname= $_POST['inputSurname'];

                      $afetiria= $_POST['afetiria'];

                      $telikos= $_POST['telikos'];



                      $selectService = $_POST['selectService'];

                      $km= $_POST['km'];


                      $transTime= $_POST['transTime'];

                    

                      $transType1_2_msg= $_POST['transType1_2_msg'];


                      






                     // $mess = " \n \n Στοιχεία επικοινωνίας \n\n Μετακόμιση από: $form \n\n Μετακόμιση σε: $to \n\n Email: $email \n\n Τηλ.: $phone" ;

                      

                      $mailContent= '<div style="background-color:#004a86">

<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td>
<table class="wlf full-width" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto;max-width:610px">
    <tbody><tr>
        <td width="5" style="font-size:1px;line-height:1px">&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                <tbody><tr>
                    <td height="20">&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-size:1px;line-height:1px"><img src="https://myconstructor.gr/AdminTransport/assets/img/corners-top.png" width="600" alt="" style="display:block;width:100%;max-width:610px;max-height:31px"></td>
                </tr>
            </tbody></table>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%; background:#fff;">
                <tbody><tr>
                    <td width="1" bgcolor="#a1a6a8" style="font-size:1px;line-height:1px"></td>
                    <td bgcolor="#ffffff">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                            <tbody><tr>
                                <td width="5%" style="font-size:1px;line-height:1px">&nbsp;</td>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #e7e7e7;min-width:100%">
                                        <tbody><tr>
                                            <td height="20">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                                                    <tbody><tr>
                                                        <td style="font-size:0;text-align:center">
                                                                <table class="t-width" width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:240px;display:inline-block;vertical-align:middle">
                                                                    <tbody><tr>
                                                                        <td height="10" style="font-size:1px;line-height:1px">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" style="width:240px; height:54px">
                                                                            <a href="https://myconstructor.gr" target="_blank"><img src="https://myconstructor.gr/app/webroot/services/ilektrologos/img/mcr.png" width="240" height="54" alt="" style="display:block;border:none;max-height:100%;max-width:100%;"></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="10" style="font-size:1px;line-height:1px">&nbsp;</td>
                                                                    </tr>
                                                                </tbody></table>
                                                        
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20">&nbsp;</td>
                                        </tr>
                                    </tbody></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                                        <tbody><tr>
                                            <td height="5">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:20px">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td height="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:20px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tbody><tr>
    <td height="25">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:20px;line-height:26px;overflow-y:hidden"><p>Γεία σας, '.$inputName.' '. $inputSurname .' </p><p>Σε ευχαριστούμε που επέλεξες το MyConstructor!</p> <p>Ας δούμε την προσφορά για την μετακόμισή σου '. $myDate .'  με μία ματιά</p>
</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
  </tr>
  
    <td align="center"><img src="https://myconstructor.gr/AdminTransport/assets/img/line-2.png" width="361" alt="" style="display:block;width:100%;max-width:361px;max-height:86px"></td>
  </tr>  
</tbody></table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
     <tbody>
      <tr>
        <td align="center" width="50%">'. $afetiria .' </td>
        <td align="center" width="50%">'. $telikos .' </td>
      </tr>
    </tbody>
</table>

    </td>    
  </tr>

  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td height="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:20px">
      
    </td>    
  </tr>

  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td height="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:20px">
      
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
      <td width="5%">&nbsp;</td>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d6d6d6;border-radius:5px; box-shadow:0px 0px 4px 0px #cccccc;">
            <tbody><tr>
                <td>
                    <table width="100%" bgcolor="#146880" border="0" cellspacing="0" cellpadding="0" style="border-top-left-radius:5px;border-top-right-radius:5px;background-color:#004A86;">
                        <tbody><tr>
                            <td width="5%">&nbsp;</td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td height="20">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="color:#ffffff;font-family:Verdana, Arial, sans-serif;font-size:18px;line-height:22px;"></td>
                                    </tr>
                                    <tr>
                                        <td  style="font-size:1px;line-height:1px">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="color:#ffffff;font-family:Verdana, Arial, sans-serif;font-size:18px;line-height:20px;overflow:hidden;">Πληροφορίες Μετακόμισης</td>
                                    </tr>
                                    <tr>
                                        <td height="20">&nbsp;</td>
                                    </tr>
                                </tbody></table>
                            </td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                    </tbody></table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td width="2%">&nbsp;</td>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody><tr>
                                  <td height="20">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td style="color:#333;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:25px; text-decoration: none;">
                                    <span><b>Υπηρεσία μετακόμισης:</b> '.$selectService.' </span><br/>
                                    <span><b>Ημερομηνία:</b> '. $myDate .'</span><br/>
                                    <span><b>Απόσταση:</b> '. $km .'km</span><br/>
                                    <span><b>Τιμή:</b> '. $telprice .'€</span><br/>
                                    <span><b>Εκτιμώμενος χρόνος:</b> '.$transTime.'</span><br/>
                                    <span><a style="color:#333" href="tel:2103009323"><b>Τηλ:</b> 210 300 9323</span><br/>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:18px">
                                    
                                  </td>
                              </tr>
                              <tr>
                                  <td height="20" style="border-bottom:1px solid #a4a4a4">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td height="20">&nbsp;</td>
                              </tr>
                              <tr>
                                  <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:25px;">
                                     '. $userEmail .'
                                     '. $transType1_2_msg .'
                                  </td>
                                </tr>

                              <tr>
                                  <td height="20">&nbsp;</td>
                              </tr>
                          </tbody></table>
                        </td>
                        <td width="2%">&nbsp;</td>
                      </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody></table>
      </td>
      <td width="5%">&nbsp;</td>
    </tr>
  </tbody></table>
  <br>


    </td>    
  </tr>

  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td height="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:14px;line-height:20px">
      

    </td>    
  </tr>

  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td height="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:18px;line-height:24px">
      <p>Για οποιαδήποτε απορία ή διευκρίνηση επικοινωνήστε με το τμήμα εξυπηρέτησης πελατών του MyConstructor.gr</p>
    </td>    
  </tr>

  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  
  <tr>
    <td width="50%" align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:16px;line-height:40px; border-right: 2px solid #4f4f4f;  ">
      <span><a style="color:#4f4f4f" href="tel:2103009323">Τηλ: 210 300 9323</span>
    </td>
    <td width="50%" align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:16px;line-height:40px">info@myconstructor.gr</td>

  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</tbody></table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="5">&nbsp;</td>
                                        </tr>
                                    </tbody></table>
                                </td>
                                <td width="5%" style="font-size:1px;line-height:1px">&nbsp;</td>
                            </tr>
                        </tbody></table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%; background:#efefef;">
                            <tbody><tr>
                                <td width="10">&nbsp;</td>
                                <td>
                                    <table width="100%" bgcolor="#efefef" border="0" cellspacing="0" cellpadding="0" style="border-radius:5px;min-width:100%">
                                        <tbody><tr>
                                            <td width="10">&nbsp;</td>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                                                    <tbody><tr>
                                                        <td height="5">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-family:Verdana, Arial, sans-serif;font-size:14px;font-weight:bold"><a href="https://myconstructor.gr" target="_blank" style="color:#339fb4;text-decoration:none"><img src="https://myconstructor.gr/app/webroot/services/ilektrologos/img/mcr.png" width="180" height="45" alt="powered by mytime" style="display:block;border:none"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="20">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:20px;line-height:38px;"><span>Όλες οι τεχνικές και οικοδομικές εργασίες</span><br/>
                                                          <span style="font-size:15px; line-height: 22px;">Βρες Αξιολογημένους & Οικονομικούς επαγγελματίες για όλες τις εργασίες για το σπίτι και την οικοδομή!</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10">&nbsp;</td>
                                                    </tr>
                                                        <tr>
                                                            <td style="border-bottom: 1px solid #e1e1e1" height="5">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="color:#4f4f4f;font-family:Verdana, Arial, sans-serif;font-size:12px;line-height:18px">
                                                               <a href="https://myconstructor.gr" target="_blank" style="color:#319fb5;text-decoration:none">myconstructor.gr</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10">&nbsp;</td>
                                                        </tr>
                                                </tbody></table>
                                            </td>
                                            <td width="10">&nbsp;</td>
                                        </tr>
                                    </tbody></table>
                                </td>
                                <td width="10">&nbsp;</td>
                            </tr>
                        </tbody></table>
                    </td>
                    <td width="1" bgcolor="#a1a6a8" style="font-size:1px;line-height:1px"></td>
                </tr>
            </tbody></table>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width:100%">
                <tbody><tr>
                <td width="5" style="font-size:1px;line-height:1px">&nbsp;</td>
                    <td align="center" style="font-size:1px;line-height:1px"><img src="https://myconstructor.gr/AdminTransport/assets/img/email_template_footer.png" width="610" alt="" style="display:block;width:100%;max-width:606px;max-height:20px"></td>
                </tr>
                <tr>
                    <td height="20">&nbsp;</td>
                </tr>
            </tbody></table>
        </td>
        <td width="5" style="font-size:1px;line-height:1px">&nbsp;</td>
    </tr>
</tbody></table>
</td></tr></tbody></table>
</div>';


                if(!empty($email)){
                      //$to = "mcr.chatzopoulou@gmail.com";
                    $to = $email;
                    $subject= "MyConstructor σύνοψη μετακόμισης από ".$afetiria. " προς ". $telikos;
                    $headerFields = array('MIME-Version: 1.0', 'Content-Type: text/html;charset=utf-8');
                    $mail_sent = @mail( $to, $subject, $mailContent,implode("\r\n", $headerFields));

                }
          
               


          

              }else{

                echo "lathos";

              } 


?>
