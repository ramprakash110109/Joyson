<?php
include("sendmail.php");
$to="mathan";//$_REQUEST['toname'];
$billno="joy-1345";//$_REQUEST['billno'];
$item_name_set=array('as','asd');//$_REQUEST['item']['name'];
$item_cost_set=array('10','10');;//$_REQUEST['item']['cost'];
$item_qty_set=array('2','2');//$_REQUEST['item']['qty'];
$item_price_set=array('20','20');//$_REQUEST['item']['price'];
$subtotal='40.00';//$_REQUEST['subtotal'];
$vat='5';//$_REQUEST['vat'];
$total='40.00';//$_REQUEST['total'];
$vatamt='5.00';//$_REQUEST['vatamt'];
function convertAmountToWord($number)
{
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred : $words[floor($number / 10) * 10]. " " . $words[$number % 10] . " ". $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ? "." . $words[$point / 10] . " " .$words[$point = $point % 10] : '';
  if($points=="")
  {
  	return $result . " Rupees";
  }
  return $result . "Rupees " . $points . " Paise";
}

$html='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Joyson Apparels</title>
	<link rel="shortcut icon" href="../images/pos.png">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/example.js"></script>
	<style type="text/css">
body {counter-reset:section;}
.count:before
{
counter-increment:section;
content:counter(section);
}
</style>
	
</head>

<body>
	<div id="page-wrap">
		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br><div id="identity" algin="center">   </div><div style="clear:both"></div><div id="customer">
		<div class="col-md-9 pull-left"><img src="cid:my-attach" id="bill_logo" height="130px" ><h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
           </div>
           <div class="col-md-3 pull-right" style="padding-top: 25px;" >
            <table id="meta">
            <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">Invoice No.</td>
                    <td>'.$billno.'
                    </td>
                </tr>
                <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">Date</td>
                    <td><span id="date">'.date("d/m/Y").'</span></td>
                </tr>
                <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		</div><br> 
		<div class="col-md-8">
		<h3 style="color: #3333d7">To:  '.$to.'
		</h3> 
		</div>
		<table id="items">
		<thead>
		  <tr>
		      <th style="width:20px;" >S.No.</th>
		      <th>Description</th>
		      <th>Rate per piece  (&#x20B9;)</th>
		      <th>Quantity (Pcs) </th>
		      <th>Amount  (&#x20B9;)</th>
		  </tr>
		  </thead>
		  <tbody id="content">';
$tbody='';
 for($i=0; $i<count($item_name_set);$i++) { 
		$tbody.= ' <tr class="item-row" style="border-bottom: 0;">
		      <td>'.($i+1).'</td>
		      <td class="description">
		      <span class="description"> '.$item_name_set[$i].'</span>
		      </td>
		      <td><span class="cost">'.$item_cost_set[$i].'</span></td>
		      <td><span class="qty">'. $item_qty_set[$i].'</span></td>
		      <td><span class="price">'. $item_price_set[$i].'</span></td>
		  </tr>';
		   }
		   $html.=$tbody;
		 $html.='</tbody>	 
		  <tfoot>';
if($vat!="0.00"){
		  $html.='<tr style="border-top: 1px solid blue;">
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal  (&#x20B9;)</td>
		      <td class="total-value"><div id="subtotal" name="subtotal">'. $subtotal.'</div></td>
		  </tr
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT (%) </td>
		      <td class="total-value"><span id="vat" name="vat">'.$vat.'</span></td>
		  </tr>
		   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT Amount (&#x20B9;)</td>
		      <td class="total-value"><span id="vatamt" name="vatamt">'.$vatamt.'</span></td>
		  </tr>';
		  } 

		 $html.='<tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">'; 
		 if($vat=="0.00"){ $html.='(Inclusive of VAT)'; 
		 }
		 $html.='Grand Total (&#x20B9;)</td>
		      <td class="total-value balance"><div id="total" name="total"><h4>'.$total.'</h4></div></td>
		  </tr>
		  <tr>
		  <td colspan="2" class="total-line">Amount In Words (&#x20B9;)</td>
		  <td colspan="3" class="total-value balance">
  <center><h4> '. convertAmountToWord(round($total)).' Only</h4></center>
		      </td>
		  </tr>
		</tfoot>
		</table>
		</form>
		<br>
		<hr>
		<center><h3>Powered by RADAR Info Solutions. </h3></center>
	</div>
	</div>
</body>';
echo sendBillMail('soundar706@hotmail.com','Soundar','Bill Check',$html);
 //echo $html;
?>