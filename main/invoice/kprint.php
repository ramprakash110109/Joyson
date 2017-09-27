<?php
$cid=$_REQUEST['to'];
$to=$_REQUEST['toname'];
$billno=$_REQUEST['billno'];
$item_name_set=$_REQUEST['item']['name'];
$item_cost_set=$_REQUEST['item']['cost'];
$item_qty_set=$_REQUEST['item']['qty'];
$item_price_set=$_REQUEST['item']['price'];
$subtotal=$_REQUEST['subtotal'];
$vat=$_REQUEST['vat'];
$total=$_REQUEST['total'];
$vatamt=$_REQUEST['vatamt'];
if(isset($_REQUEST['print']))
{
	$costing=$_REQUEST['costing_id'];
	if(saveinvoice($costing))
	{
		ptintBill();
	}
}
if(isset($_REQUEST['mail']))
{
	emailBill('Invoice');
}
if(isset($_REQUEST['printonly']))
{
	ptintBill();
}
if(isset($_REQUEST['mailonly']))
{
	emailBill('Proforma Invoice');
}
if(isset($_REQUEST['dnote']))
{
	printDeliver();
}
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
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
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
function ptintBill(){
global $to;
global $billno;
global $item_name_set;
global $item_cost_set;
global $item_qty_set;
global $item_price_set;
global $subtotal;
global $vat;
global $total;
global $vatamt;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Joyson Apparels</title>
	<link rel="shortcut icon" href="../images/pos.png">
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.css' />
		<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css' />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	
</head>

<body onload="doPrint(); return false;">

	<div id="page-wrap">

		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br>
		<div id="identity" algin="center">   
		</div>
		<div style="clear:both"></div>
		<div id="customer">
           <div class="col-md-9 pull-left">
                       <img src="images/logo.jpg " id="bill_logo" height="130px" >
            <h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
           </div>
           <div class="col-md-3 pull-right" style="padding-top: 25px;" >
            <table id="meta">
                <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">Invoice No.</td>
                    <td><?php echo $billno;?>
                    
                    </td>
                </tr>
                <tr class="tr2">

                    <td class="meta-head" style="color: #33337d;">Date</td>
                    <td><span id="date"><?php echo date("m/d/Y");?></span></td>
                </tr>
                <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		</div><br> 
		<div class="col-md-12">
		<h5 style="color: #3333d7">To: <?php echo $to;?>
		</h5> 
		
		<table id="items">
		<thead>
		  <tr>
		      <th style="width:20px;">S.No.</th>
		      <th>Description</th>
		      <th>Rate per piece  (&#x20B9;)</th>
		      <th>Quantity (Pcs) </th>
		      <th>Amount  (&#x20B9;)</th>
		  </tr>
		  </thead>
		  <tbody id="content">
		  <?php for($i=0; $i<count($item_name_set);$i++) { ?>
		  <tr class="item-row" style="border-bottom: 0;">
		      <td class="item-name count"></td>
		      <td class="description">
		      <span class="description"> <?php echo $item_name_set[$i]; ?></span>
		      </td>
		      <td><span class="cost"><?php echo $item_cost_set[$i]; ?></span></td>
		      <td><span class="qty"><?php echo $item_qty_set[$i]; ?></span></td>
		      <td><span class="price"><?php echo $item_price_set[$i]; ?></span></td>
		  </tr>
		  <?php } ?>
		 </tbody>	 
		  <tfoot>
<?php if($vat!="0.00"){?>
		  <tr style="border-top: 1px solid blue;">
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal  (&#x20B9;)</td>
		      <td class="total-value"><div id="subtotal" name="subtotal"><?php echo $subtotal; ?></div></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT (%) </td>

		      <td class="total-value"><span id="vat" name="vat"><?php echo $vat; ?></span></td>
		  </tr>
		   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT Amount (&#x20B9;)</td>
		      <td class="total-value"><span id="vatamt" name="vatamt"><?php echo $vatamt; ?></span></td>
		  </tr>
		  <?php } ?>
		  <?php if($vat=="0.00"){?>
		  <tr style="border-top: 1px solid blue;"><?php }
		  else {?><tr> <?php } ?>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"> <?php if($vat=="0.00"){?>(Inclusive of VAT)<?php }?> Grand Total (&#x20B9;)</td>
		      <td class="total-value balance"><div id="total" name="total"><h4><?php echo $total; ?></h4></div></td>

		  </tr>
		  <tr>
		  <td colspan="2" class="total-line">Amount In Words (&#x20B9;)</td>
		  <td colspan="3" class="total-value balance">
  <center><h4> <?php echo convertAmountToWord(round($total))." Only";?></h4></center>
		      </td>
		  </tr>
		</tfoot>
		</table>
		</form>
		<div id="terms">
		  <h5 style="color: #33337d;">Terms</h5>
		  <font>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</font>
		</div>
		
		<div class="row " style="padding-top: 60px">
			<div class="col-sm-4 text-left" style="color: #33337d;">Received by</div>
			<div class="col-sm-4 text-center" style="color: #33337d;">Checked by</div>
			<div class="col-sm-4 text-right" style="color: #33337d;">For <font style="font-family: sans-serif;">JOYSON APPARELS</font></div>
		</div>
	</div>
	</div>
</body>
<script type="text/javascript">	
		function doPrint() {
    		window.print();            
    		document.location.href = "../billing.php"; 
		}
	</script>


</html>
<?php }

function emailBill($purpose)
{
global $cid;
global $to;
global $billno;
global $item_name_set;
global $item_cost_set;
global $item_qty_set;
global $item_price_set;
global $subtotal;
global $vat;
global $total;
global $vatamt;
include("sendmail.php");
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
include('../../connect.php');
				$result = $db->prepare("SELECT * FROM customer_table where customer_id='".$cid."'");
				$result->execute();
				$row = $result->fetch();

				if (sendBillMail($row['email'],'Soundar',$purpose,$html))
				{
						?>
						<html><script>alert('Mail Sent Successfully!');</script>
						<body>
							Mail sent success.<a href="../index.php">Go Back.</a>
						</body>
						</html>
						<?php
				}
				else
				{?>
						<html><script>alert('Mail Send Failed!\n Check your internet connection!');</script>
						<body>
							Mail send not complted.Check your internet connection!<a href="../index.php">Go Back.</a>
						</body>
						</html>
				<?php
				}
}

function saveinvoice($costing){
	global $to;
	global $billno;
	global $item_name_set;
	global $item_cost_set;
	global $item_qty_set;
	global $item_price_set;
	global $subtotal;
	global $vat;
	global $total;
	global $vatamt;
	global $cid;
	include('../../connect.php');
	$result = $db->prepare("SELECT * FROM invoice where invoice_no='".$billno."'");
	$result->execute();
	$result->execute();
	$rowcount = $result->rowcount();
	if($rowcount>0){
	?>
	<script>alert('Record already found!');</script>
	Record already found!Bill already generated with same bill number <?php echo $billno;?>!<a href='../billing.php'>Go Back</a>
<?php
return false;
}
else
{
	$sql = "INSERT INTO invoice (invoice_no,customer_id,customer_name,date_issue,total_amt) VALUES (:id,:b,:c,:d,:f)";
	$q = $db->prepare($sql);
	$q->execute(array(':id'=>$billno,':b'=>$cid,':c'=>$to,':d'=>date("Y/d/m"),':f'=>$total));
	for($i=0;$i<count($item_name_set);$i++)
	{
		$sql = "INSERT INTO invoice_inline(invoice_no,description,rate,qty) VALUES (:id,:b,:c,:d)";
		$q = $db->prepare($sql);
		$q->execute(array(':id'=>$billno,':b'=>$item_name_set[$i],':c'=>$item_cost_set[$i],':d'=>$item_qty_set[$i]));
	}
	$salesprofit=0.00;
	$profit;
	for($j=0;$j<count($costing);$j++)
	{
		$result = $db->prepare("SELECT * FROM kcosting_table where costing_id='".$costing[$j]."'");
		$result->execute();
		$row = $result->fetch();
		$cp=(float)$row['price']*(float)$item_qty_set[$j];
		$sp=(float)$row['cost']*(float)$item_qty_set[$j];
		$profit[$j]=(float)$sp-$cp;
		$fab1stk=getStock($row['shirting'],'fabric_table','f_id');
		$obtainfab1stk=(float)$row['shirting_qty']*(float)$item_qty_set[$j];
		$sql = "UPDATE fabric_table SET stock='".((float)$fab1stk-((float)$obtainfab1stk/1000))."' WHERE f_id=? and type='knitted' and stock not like '0';";
		$q = $db->prepare($sql);
		$q->execute(array($row['shirting']));
		$fab2stk=getStock($row['suiting'],'fabric_table','f_id');
		$obtainfab2stk=(float)$row['suiting_qty']*(float)$item_qty_set[$j];
		$sql = "UPDATE fabric_table SET stock='".((float)$fab2stk-((float)$obtainfab2stk/1000))."' WHERE f_id=? and type='knitted' and stock not like '0';";
		$q = $db->prepare($sql);
		$q->execute(array($row['suiting']));
		$trimset=explode('#', $row['trims']);
		$trimqset=explode('#', $row['trims_qty']);
		for($k=0;$k<count($trimset);$k++)
		{
			if($trimset[$k]!=""){
				$trimstk=getStock($trimset[$k],'trim_table','t_id');
				$obtaintrimstk=(float)$trimqset[$k]*(float)$item_qty_set[$j];
				$sql = "UPDATE trim_table SET stock='".((float)$trimstk-(float)$obtaintrimstk)."' WHERE t_id=?  and stock not like '0';";
				$q = $db->prepare($sql);
				$q->execute(array($trimset[$k]));
				}
		}
	}
	for($l=0;$l<count($profit);$l++)
	{
		$salesprofit+=(float)$profit[$l];
	}
	$sql = "UPDATE invoice SET profit='".(float)$salesprofit."' WHERE invoice_no=?;";
	$q = $db->prepare($sql);
	$q->execute(array($billno));
	return true;
	}
}

function getStock($id,$table,$where)
{
	include('../../connect.php');
	$result = $db->prepare("SELECT * FROM ".$table." where ".$where."='".$id."'");
	$result->execute();
	$row = $result->fetch();
	return $row['stock'];
}

 function printDeliver(){
global $to;
global $item_name_set;
global $item_qty_set;
$itemset=formAccoArray($item_name_set,$item_qty_set);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Joyson Apparels</title>
	<link rel="shortcut icon" href="../images/pos.png">
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.css' />
		<link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css' />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	
</head>

<body onload="doPrint(); return false;">

	<div id="page-wrap">

		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br>
		<div id="identity" algin="center">   
		</div>
		<div style="clear:both"></div>
		<div id="customer">
           <div class="col-md-9 pull-left">
                       <img src="images/logo.jpg " id="bill_logo" height="130px" >
            <h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
           </div>
           <div class="col-md-3 pull-right" style="padding-top: 25px;" >
            <table id="meta">
                <tr class="tr2" >
                    <td class="meta-head" style="color: #33337d;text-align: center;" colspan="2"> DELIVERY NOTE</td>
                </tr>
                <tr class="tr2">

                    <td class="meta-head" style="color: #33337d;">Date</td>
                    <td><span id="date"><?php echo date('d/m/Y');?></span></td>
                </tr>
                <tr class="tr2">
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		</div><br> 
		<div class="col-md-12">
		<h4 style="color: #3333d7">To: <?php echo $to;?>
		</h4> 
		
		<table align="center" id="items" >
		<thead>
		  <tr >
		      <th style="width:20px;">S.No.</th>
		      <th>Items</th>
		      <th> <center>Details</center></th>
		  </tr>
		  </thead>
		  <tbody id="contents">
		  <?php 
		  $sumpcs=0;
		  for($i=0; $i<count($itemset);$i++) { ?>
		  <tr  >
		      <td  class=" count"></td>
		      <td >
		      <span  class="description"> <?php echo $itemset[$i]['item']; ?></span>
		      </td><td>
		      <table>
		      <tr>
		      <td >
		      Size
		      </td>
		      <?php for($j=0;$j<count($itemset[$i]['size']);$j++){?>
		      <td><?php echo $itemset[$i]['size'][$j]; ?> </td>
		      <?php }?>
		      </tr>
		      <tr>
		      <td>
		      	No.Pcs.
		      </td>
		      <?php for($j=0;$j<count($itemset[$i]['qty']);$j++){?>
		      <td><?php 
		      $sumpcs+=$itemset[$i]['qty'][$j];
		      echo $itemset[$i]['qty'][$j]; ?> </td>
		      <?php }?>
		      </tr>
		      </table>
		      </td>
 		  </tr>
		  <?php } ?>
		 </tbody>	 
		 <tfoot>
		  <tr >
		      <td colspan="2" class="total-line">Total No.pcs. </td>
		      <td class="total-value"><div id="subtotal" name="subtotal"><?php echo $sumpcs; ?></div></td>
		  </tr>
		  
		</tfoot>
		</table>
		</form>
		
		<div class="row " style="padding-top: 60px">
			<div class="col-sm-4 text-left" style="color: #33337d;">Received by</div>
			<div class="col-sm-4 text-center" style="color: #33337d;">Checked by</div>
			<div class="col-sm-4 text-right" style="color: #33337d;">For <font style="font-family: sans-serif;">JOYSON APPARELS</font></div>
		</div>
	</div>
	</div>
</body>
<script type="text/javascript">	
		function doPrint() {
    		window.print();            
    		//document.location.href = "../billing.php"; 
		}
	</script>


</html>
<?php }
function formAccoArray($ar,$ar1)
{
	$args=array();
	for($i=0;$i<count($ar);$i++)
	{
		$x=explode("-", $ar[$i]);
		$item['item']=$x[0];
		$item['size']=$x[1];
		$item['qty']=$ar1[$i];
		$args[$i]=$item;
	}
$tmp = array();
foreach($args as $arg)
{
    $tmp[$arg['item']][0][] = $arg['size'];
    $tmp[$arg['item']][1][] = $arg['qty'];
}

$output = array();

foreach($tmp as $type => $labels )
{
    $output[] = array(
        'item' => $type,
        'size' => $labels[0],
        'qty' => $labels[1]
    );
}
//var_dump($output);
return $output;
}
 ?>
