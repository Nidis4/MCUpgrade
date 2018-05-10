<?php
//configure::write('debug',2);
//pr($invoice_receipt_data);
//pr($info_data_setting);die;

require_once('../../../vendor/TCPDF/tcpdf.php');

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/payment.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$payment = new Payment($db);
// set ID property of product to be edited
$payment->payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : die();


$stmt = $payment->readOne();



if($payment->issuetype == "Invoice"){
	$serial_no = sprintf('%05d', $payment->invoice_no);
}else{
	$serial_no = sprintf('%05d', $payment->receipt_no);
}



$subsInfos = "";
$unitCredits = "";
$price = $payment->amount;
$vat = ($price * (24 / 100));
$quantity = "";
$vat_price = $payment->amount * (24 / 100);
$net_value = $payment->amount - $vat_price;

$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$tcpdf->setLanguageArray($l);
}

$tcpdf->setFontSubsetting(true);
$textfont = 'helvetica';
$tcpdf->SetAuthor("Harpreet Singh");
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont('dejavusans', '', 12, '', true);
$tcpdf->AddPage();
$tcpdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

//if ($invoice_receipt_data['Member']['current_working'] == 'company') {

	$company_name = $payment->company_name;
	$business_type = $payment->profession;
	$company_phone = $payment->phone;
	$vat_number = $payment->tax_id;
	$address = $payment->legal_address;
	$text_office = $payment->tax_office;
	
	$date = date('m-d-Y');
	$p_c = '';
	$amount = $payment->amount;
	$quantity = '';
	$vat_price = $payment->amount * (24 / 100);
	if(@$payment->description){
		$description = $payment->description;
	}else{
		$description = "παροχή υπηρεσιών";
	}
	
	//$vat_price = '';
	$net_value = $payment->amount - $vat_price;
	$total_amount = $payment->amount + $vat_price;
	//$net_value = "";
	/*<h2 style="width:100%;text-align:center;">τιμολόγιο</h2> */
	$html = <<<EOD
       
<table   cellpadding="4" >
	<tr>
		<td style="width:50%" colspan="3" >
			<img src="mcr.png" alt="Logo" width="200" height="50" />	
		</td>
	 
		<td style="text-align:left" colspan="3" >
		
			MYCONSTRUCTOR ΙΚΕ <br/>
			Βασικές Υπηρεσίες Διαδικτύου <br/>
			28ης Οκτωβρίου 20,Άγ. Ανάργυροι, 13561 <br/>
			ΑΦΜ: 800439186 ΔΟΥ:ΑΓ.ΑΝΑΡΓΥΡΩΝ <br/>
			ΑΡΙΘΜΟΣ ΓΕΜΗ-122641302000 <br/>
			Υπηρεσίες Υποστήριξης & Marketing <br/>
			Λεωφ.Μεσογείων 2-4,Πύργος Αθηνών, 11527 <br/>
			Τηλ: 210 300 9323
			
		 </td>

	</tr>
	<tr>
	    <td style="width:50%;"  colspan="3" >
			Τιμολόγιο Παροχής Υπηρεσιών:{$serial_no}<br/>
			Ημερομηνία Έκδοσης:{$date}<br/>
		</td>
 
		<td style="text-align:left"  colspan="3" >
			ΣτοιχείαΠελάτη: <br/>
			Επωνυμία:{$company_name} <br/>
			Επάγγελμα:{$business_type} <br/>
			Δ/νση:{$address} {$p_c} <br/>
			Τηλ:{$company_phone} <br/>
			AΦΜ:{$vat_number}<br/>
			ΔΟΥ:{$text_office}
			<br/>
		 </td>
	</tr>
	
	<tr>
	    <td style="text-align:center">
		 
		    &nbsp;	 
	 
		</td>
 
		<td style="text-align:center"    >
			 &nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			 &nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			 &nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			 &nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			 &nbsp;
		 </td>
		 
		 
	</tr>
	
	
	
	<tr style="border-bottom: 1px solid black !important;">
	    <td style="text-align:center;border:0.1px solid black; " colspan="4" >
		 
			Περιγραφή
	 
		</td>
		
		 
	  <td style="text-align:center; border:0.1px solid black; " colspan="2"    >
		Σύνολο
	 </td>
		 
		 
	</tr>
	
	
	<tr>
	    <td style="text-align:center; border:0.1px solid black;" colspan="4">
			 {$description} 
		</td>
 
		
		 
		  <td style="text-align:center; border:0.1px solid black;" colspan="2"   >
			&nbsp; {$amount} &#8364;
		 </td>
		 
		 
	</tr>
	
	<tr>
	    <td style="text-align:center">
			 &nbsp;
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 
	</tr>
	
	<tr>
	    <td style="text-align:center ">
			 &nbsp;
		 
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 
	</tr>
	
	<tr>
	    <td style="text-align:center">
			 &nbsp; 
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center; border:0.1px solid black;" colspan="2"   >
			&nbsp;Καθαρή Αξία:
		 </td>
		 
		 <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp;
		 </td>
		 
		 
		 
		  <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp; {$amount} &#8364;
		 </td>
		 
		 
	</tr>
	<tr style="height:100px;" >
	    <td style="text-align:center">
			 &nbsp;
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center;  border:0.1px solid black;"  colspan="2"  >
			&nbsp;Φ.Π.Α:
		 </td>
		 
		 <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp; 24.00%
		 </td>
		 
		
		 
		  <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp;{$vat_price} &#8364;
		 </td>
		 
		 
	</tr>
	<tr style="height:100px;" >
	
	    <td style="text-align:center">
			 &nbsp;
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center;  border:0.1px solid black;"  colspan="2"  >
			&nbsp;Σύνολο:
		 </td>
		 
		 <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp;
		 </td>
		 
		
		 
		  <td style="text-align:center;  border:0.1px solid black;"    >
			&nbsp; {$total_amount} &#8364;
		 </td>
		 
		 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:center">
			 &nbsp;
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td>
		 
		 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:center">
			 &nbsp;
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:justify">Σημείωση:</td>
 
		<td style="text-align:center">
			&nbsp;
		 </td>
		 
		 <td style="text-align:center">
			&nbsp; 
		 </td>
		 
		 <td style="text-align:center">
			&nbsp;
		 </td>
		 
		 <td style="text-align:center">
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:justify" colspan="3">
			Έχει Εξοφληθεί
		</td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:justify" colspan ="3" >
			Τιμολόγιο Παροχής Υπηρεσιών: # {$serial_no}
		</td>
 
		<td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center">
			&nbsp; 
		 </td>
		 
		 <td style="text-align:center">
			&nbsp;
		 </td>
		 
 
	</tr>
	
	
</table>
EOD;


	$tcpdf->writeHTML($html, true, 0, true, 0);
	//$member_id = $invoice_receipt_data['Member']['id'];
	$member_id = "1";
	//$item_id = $invoice_receipt_data['ReceiptInvoice']['id'];
	$item_id = "1";
	$ps_time = time();

	$outputName = dirname(__FILE__). "/".$ps_time.".pdf";

	
	//$tcpdf->Output('test.pdf', 'F');

	//$tcpdf->Output("{$member_id}_{$item_id}.pdf", 'F');
	if(@$_GET['type'] && ($_GET['type'] == 'i')){
		//$tcpdf->Output("{$ps_time}.pdf", 'I');
		$filename = 'invoice-'.$_GET['payment_id'].".pdf";
		$outputName = dirname(__FILE__). "/".$filename;

		$tcpdf->Output($outputName, 'F');

		echo json_encode(
	        array("message" => "Uploaded")
	    );

	}else{
		$tcpdf->Output("{$ps_time}.pdf", 'D');
	}
	


?>