<!DOCTYPE html>
<html>
<head>
<title>
Joyson Apparels
</title>
 <link rel="shortcut icon" href="images/pos.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='css/style.css' />
<!--test-->
<!--<link rel='stylesheet' type='text/css' href='invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/print.css' media="print" />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap-theme.min.css' />-->
	<script type='text/javascript' src='invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='invoice/js/example3.js'></script>
	<style type="text/css">
	table td{
		border: 1px solid blue;
	}

</style>


<!--end-->
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='JOY-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
<!--To Warn the user when press back button
window.onbeforeunload = function() { 
	return "You work will be lost."; };-->
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
</head>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>

<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
                     <ul class="nav nav-list">
              <li><a href="#"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li><a href="#"><i class="icon-shopping-cart icon-2x"></i> Billing </a>  </li> 

<ul class="nav nav-list">
			
			<li  ><a href="billwoven.php"><i class="icon-shopping-cart icon-1x"></i> Bill Woven</a></li>      
			<li ><a href="billknit.php"><i  class="icon-shopping-cart icon-1x"></i> Bill Knitted </a></li> 
			<li class="active"><a href="billaccess.php"><i  class="icon-shopping-cart icon-1x"></i> Bill Accessories </a></li>
			
			</ul>

			 </li>             
			<li><a href="costing.php"><i class="icon-tags icon-2x"></i> Costing</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="contractor.php"><i class="icon-group icon-2x"></i> Contractors</a>                                    </li>
			<li><a href="purchase.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Purchase</a>  </li>
			<li ><a href="stocks"><i class="icon-list-alt icon-2x"></i> Stock Details</a>    
			</li>
			<li><a href="salesreport.php?d1=<?php echo date("m/d/Y");?>&d2=<?php echo date("m/d/Y");?>"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<br><br><br>
			
			<!--<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>-->
				</ul>                               
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-shopping-cart"></i> Billing
			</div>
			<ul class="breadcrumb">
			<li ><a href="index.php">Dashboard</a></li>/
			<li><a href="billing.php">Billing</a></li>/
			<li class="active">Bill Accessories</li>
			</ul>
	<div >

		<div id="page-wrap">

		<br>
		<form method="post" id="target" target="_blank" action="invoice/aprint.php">
		<input type="hidden" name="billno" value="<?php echo $finalcode;?>"></input>
		<div id="identity" algin="center">   
		</div>
		<div style="clear:both"></div>
		<div class ="row" id="customer">
           <div class="col-md-9 pull-left" style="margin-top: -65px;">
                       <font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>
                       <h5 style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</h5>
                      <img src="invoice/images/logo.jpg " id="bill_logo" height="130px" >
                       <h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
                       </center></font>
           
           </div>
		      <div class="col-md-4 pull-right" style="margin-top: -10px;padding-left:100px; ">
			<h4 style="font-weight: bolder;"><u>PROFORMA INVOICE</u></h4>
			<button  type='submit' name='printonly' class="btn btn-success btn-md subt">
      		<span class="glyphicon glyphicon-print"></span> Print 
    		</button>
    		<button type='submit' name='mailonly' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> Mail
    		</button>
    		
		</div>        
		
		<div class="col-md-4 pull-right"  style="margin-top: 10px;margin-right: 35px;">
		<h4 style="font-weight: bolder;"><u>DELEVERY NOTE</u></h4>
			<button type='submit' name='dnote' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-list-alt"></span> Delivery Note
    		</button>
		</div> 
		
		<div class="col-md-4 pull-right" style=" margin-top:-10px;padding-top: 5px;padding-bottom: 5px;padding-left:50px;">
			<h4 style="font-weight: bolder;"><u>INVOICE</u></h4>
			<button type='submit' id="print" name='print' class="btn btn-success btn-md subt">
      		<span class="glyphicon glyphicon-print"></span> Save And Print 
    		</button>
    		<button type='submit'  name='mail' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> Mail
    		</button>
    		
		</div>
		</div><br>
		<div class="col-md-8">
		<h5 style="color: #3333d7">To:
		 <select id="to" name="to" style="width:500px;height: 30px" required>
			 	<option value="">Choose a Customer</option>
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM customer_table");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				?>
				<option value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_name']; ?></option>
			<?php
			}
			?>
	<option value="addcustomer">Add a Customer</option>
			 </select> 
			 <input type="hidden" id="toname" name="toname"></input>
		</h5> 
		

		</div>
		
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
		  <tr class="item-row">
		      <td class="item-name count"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description">
		      <textarea class="description" name="item[name][]">Nil</textarea>
		      </td>
		      <td><textarea class="cost" name="item[cost][]">0.00</textarea></td>
		      <td><textarea class="qty" name="item[qty][]">0</textarea></td>
		      <td><textarea class="price" name="item[price][]" readonly="true">0.00</textarea></td>
		  </tr>
		 </tbody>	 
		  <tfoot>
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal  (&#x20B9;)</td>
		      <td class="total-value"><textarea id="subtotal" name="subtotal" readonly="true">0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT (%) </td>
		      <td class="total-value"><textarea id="vat" name="vat">0</textarea></td>
		  </tr>
		   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">VAT Amount (&#x20B9;)</td>
		      <td class="total-value"><textarea id="vatamt" name="vatamt" readonly="true">0.00</textarea></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"> Grand Total (&#x20B9;)</td>
		      <td class="total-value balance"><textarea id="total" name="total" readonly="true">0.00</textarea></td>
		  </tr>
		</tfoot>
		</table>
		</form>
		<script type="text/javascript">
	$(document).ready(function(){
	  $('.subt').click(function(event){
	  	
	  	if(totalchk()){
	  		
	  		$('#target').submit();

	  	}
	  	else{
       // alert(mailchk());alert(pinchk());alert(mobile1chk());alert(mobile2chk());alert( pinchk());
       		alert('Provide item quantity!');
	  		event.preventDefault();
      }
	  });
});
	  function totalchk(){
	  	var t=$("#total").val();
	  	var qt=$('.qty');
	  	var flag=true;
	  	if(t==0.00)
	  		flag=false;
	  	else
	  	{
	  		for(var i=0;i<qt.length;i++)
	  		{
	  				var x=$(qt[i]).val();
	  				if(x==0)
	  				{
	  					flag=false;
	  				}
	  		}
	  	}
	  	return flag;
	  }
</script>
	</div>
	</div>
			
<?php
}
?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

</body>
<?php include('footer.php'); ?>
</html>
