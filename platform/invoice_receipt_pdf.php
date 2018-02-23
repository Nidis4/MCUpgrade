<?php
//configure::write('debug',2);
//pr($invoice_receipt_data);
//pr($info_data_setting);die;

require_once('../vendor/TCPDF/tcpdf.php');

die("included");
$serial_no = sprintf('%05d', $invoice_receipt_data['ReceiptInvoice']['serial_no']);

$subsInfos = ClassRegistry::init('SubscriptionDetail')->find('first');
$unitCredits = ($subsInfos['SubscriptionDetail']['credit'] / $subsInfos['SubscriptionDetail']['amount']);
$price = ($subsInfos['SubscriptionDetail']['amount'] / $subsInfos['SubscriptionDetail']['credit']);
$vat = ($price * (24 / 100));
$quantity = ceil($unitCredits * $invoice_receipt_data['ReceiptInvoice']['amount']);
$vat_price = $invoice_receipt_data['ReceiptInvoice']['amount'] * (24 / 100);
$net_value = $invoice_receipt_data['ReceiptInvoice']['amount'] - $vat_price;

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
$tcpdf->SetAuthor("Pankaj Singh");
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont('dejavusans', '', 12, '', true);
$tcpdf->AddPage();
$tcpdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

if ($invoice_receipt_data['Member']['current_working'] == 'company') {

	$company_name = $info_data_setting['ReceiptInvoicesSetting']['company_name'];
	$business_type = $info_data_setting['ReceiptInvoicesSetting']['business_type'];
	$company_phone = $info_data_setting['ReceiptInvoicesSetting']['company_phone'];
	$vat_number = $info_data_setting['ReceiptInvoicesSetting']['vat_number'];
	$address = $info_data_setting['ReceiptInvoicesSetting']['address'];
	$text_office = $info_data_setting['ReceiptInvoicesSetting']['text_office'];
	$date = date('m-d-Y');
	$p_c = $info_data_setting['ReceiptInvoicesSetting']['p_c'];
	$amount = $invoice_receipt_data['ReceiptInvoice']['amount'];
	$quantity = $unitCredits * $invoice_receipt_data['ReceiptInvoice']['amount'];
	$vat_price = $invoice_receipt_data['ReceiptInvoice']['amount'] * (24 / 100);
	$net_value = $invoice_receipt_data['ReceiptInvoice']['amount'] - $vat_price;

	$html = <<<EOD
       <h2 style="width:100%;text-align:center;">τιμολόγιο</h2> 
<table   cellpadding="4" >
	<tr>
		<td style="width:50%" colspan="3" >
			<img src="img/logo.png" alt="adfas" width="250" height="150" />	
		</td>
	 
		<td style="text-align:left" colspan="3" >
		
			INTERNET SERVICES PROVIDER PRIVATE COMPANY  <br/>
			Βασικές Υπη�?εσίες Διαδικτ�?ου
			28ης Οκτωβ�?ίου 20, Άγ. Ανά�?γυ�?οι, 13561
			ΑΦΜ: 800439186
			ΔΟΥ: ΑΓ. Α�?ΑΡΓΥΡΩ�?
			ΑΡΙΘΜΟΣ ΓΕΜΗ 122641302000
			Υπη�?εσίες Υποστή�?ιξης & Marketing
			Λεωφ. Μεσογείων 2-4, Π�?�?γος Αθηνών, 11527
			Τηλ: 210 300 9323
			
		 </td>

	</tr>
	<tr>
	    <td style="width:50%;"  colspan="3" >
			Τιμολόγιο Πα�?οχής Υπη�?εσιών:{$serial_no}<br/>
			Ημε�?ομηνία Έκδοσης:{$date}<br/>
		</td>
 
		<td style="text-align:left"  colspan="3" >
			Στοιχεία Πελάτη: <br/>
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
	    <td style="text-align:center">
		 
			Πε�?ιγ�?αφή
	 
		</td>
 
		<td style="text-align:center"    >
			Ποσότητα
		 </td>
		 
		 <td style="text-align:center"    >
			Τιμή Μονάδας
		 </td>
		 
		 <td style="text-align:center"    >
			Φ.Π.Α
		 </td>
		 
		 <td style="text-align:center"    >
			 
		 </td>
		 
		  <td style="text-align:center"    >
			Σ�?νολο
		 </td>
		 
		 
	</tr>
	
	
	<tr>
	    <td style="text-align:center">
			 &nbsp; Credits 
		</td>
 
		<td style="text-align:center"    >
			&nbsp; {$quantity}
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 0.077 &#8364; 
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;  0.024 &#8364;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp; {$net_value} &#8364;
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
		 
		 <td style="text-align:center"    >
			&nbsp;Καθα�?ή Αξία:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp; {$net_value} &#8364;
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
			&nbsp;Φ.Π.Α:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 24.00%
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 
		 </td>
		 
		  <td style="text-align:center"    >
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
		 
		 <td style="text-align:center"    >
			&nbsp;Σ�?νολο:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
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
	
	    <td style="text-align:center">Σημείωση:</td>
 
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
	
	    <td style="text-align:center">
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
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:justify" colspan ="3" >
			Τιμολόγιο Πα�?οχής Υπη�?εσιών: # {$serial_no}
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
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	
</table>
EOD;


	$tcpdf->writeHTML($html, true, 0, true, 0);
	$member_id = $invoice_receipt_data['Member']['id'];
	$item_id = $invoice_receipt_data['ReceiptInvoice']['id'];
	$ps_time = time();
	$tcpdf->Output("files/invoices/{$member_id}_{$item_id}.pdf", 'F');
	$tcpdf->Output("{$ps_time}.pdf", 'D');


} else {
	$name = $invoice_receipt_data['Member']['first_name'] . $invoice_receipt_data['Member']['last_name'];

	//$company_name=$info_data_setting['ReceiptInvoicesSetting']['company_name'];
	$business_type = $info_data_setting['ReceiptInvoicesSetting']['business_type'];

	//$company_phone=$info_data_setting['ReceiptInvoicesSetting']['company_phone'];
	//$vat_number=$info_data_setting['ReceiptInvoicesSetting']['vat_number'];
	$address = $info_data_setting['ReceiptInvoicesSetting']['address'];

	$text_office = $info_data_setting['ReceiptInvoicesSetting']['text_office'];

	$date = date('m-d-Y');

	$p_c = $info_data_setting['ReceiptInvoicesSetting']['p_c'];

	$amount = $invoice_receipt_data['ReceiptInvoice']['amount'];
	$quantity = $unitCredits * $invoice_receipt_data['ReceiptInvoice']['amount'];

	$vat_price = $invoice_receipt_data['ReceiptInvoice']['amount'] * (24 / 100);

	$net_value = $invoice_receipt_data['ReceiptInvoice']['amount'] - $vat_price;

	$mobile_numebr = $info_data_setting['ReceiptInvoicesSetting']['mobile_number'];
	//pr($mobile_numebr);die;


	$html = <<<EOD
<h2 style="width:100%;text-align:center;">πα�?αλαβή</h2> 
<table   cellpadding="4" >
	<tr>
		<td style="width:50%" colspan="3" >
			<img src="img/logo.png" alt="adfas" width="250" height="150" />	
		</td>
	 
		<td style="text-align:left" colspan="3" >
		
			INTERNET SERVICES PROVIDER PRIVATE COMPANY  <br/>
			Βασικές Υπη�?εσίες Διαδικτ�?ου
			28ης Οκτωβ�?ίου 20, Άγ. Ανά�?γυ�?οι, 13561
			ΑΦΜ: 800439186
			ΔΟΥ: ΑΓ. Α�?ΑΡΓΥΡΩ�?
			ΑΡΙΘΜΟΣ ΓΕΜΗ 122641302000
			Υπη�?εσίες Υποστή�?ιξης & Marketing
			Λεωφ. Μεσογείων 2-4, Π�?�?γος Αθηνών, 11527
			Τηλ: 210 300 9323
			
		 </td>

	</tr>
	<tr>
	    <td style="width:50%;"  colspan="3" >
			Τιμολόγιο Πα�?οχής Υπη�?εσιών: #{$serial_no}<br/>
			Ημε�?ομηνία Έκδοσης:{$date}<br/>
		</td>
 
		<td style="text-align:left"  colspan="3" >
			Ον/μο:{$name}<br/>
			Επάγγελμα:{$business_type} <br/>
			Δ/νση:{$address} {$p_c}<br/>
			ΔΟΥ:{$text_office}<br/>
			Τηλ:{$mobile_numebr}<br/>
			<br/>
			<br/>
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
	
	
	
	<tr style="">
	    <td style="text-align:center">
		 
			Πε�?ιγ�?αφή
	 
		</td>
 
		<td style="text-align:center"    >
			Ποσότητα
		 </td>
		 
		 <td style="text-align:center"    >
			Τιμή Μονάδας
		 </td>
		 
		 <td style="text-align:center"    >
			Φ.Π.Α
		 </td>
		 
		 <td style="text-align:center"    >
			 
		 </td>
		 
		  <td style="text-align:center"    >
			Σ�?νολο
		 </td>
		 
		 
	</tr>
	
	
	<tr>
	    <td style="text-align:center">
			 &nbsp; Credits 
		</td>
 
		<td style="text-align:center"    >
			&nbsp; {$quantity}
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 0.077 &#8364; 
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 0.024 &#8364;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp; {$net_value} &#8364;
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
		 
		 <td style="text-align:center"    >
			&nbsp;Καθα�?ή Αξία:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp; {$net_value}
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
			&nbsp;Φ.Π.Α:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 24.00%
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp; 
		 </td>
		 
		  <td style="text-align:center"    >
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
		 
		 <td style="text-align:center"    >
			&nbsp;Σ�?νολο:
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
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
	
	    <td style="text-align:center">Σημείωση:</td>
 
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
	
	    <td style="text-align:center">
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
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	<tr style="height:100px;" >
	
	    <td style="text-align:justify" colspan ="3" >
			Τιμολόγιο Πα�?οχής Υπη�?εσιών: # {$serial_no}
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
		 
		 <td style="text-align:center"    >
			&nbsp;
		 </td>
		 
		  <td style="text-align:center"    >
			&nbsp;  
		 </td> 
	</tr>
	
	
</table>
EOD;

	$tcpdf->writeHTML($html, true, 0, true, 0);
	$member_id = $invoice_receipt_data['Member']['id'];
	$item_id = $invoice_receipt_data['ReceiptInvoice']['id'];
	$ps_time = time();
	$tcpdf->Output("files/invoices/{$ps_time}.pdf", 'F');

}
?>