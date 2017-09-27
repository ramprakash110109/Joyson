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
	<script type='text/javascript' src='js/example.js'></script>
	<style type="text/css">
		
		table td{
			border:none;
			padding:10px;
		}
		table{
			border:1px solid blue;
			width: 860px;
		}
		td input,
		td datalist{
			width: 600px;
			height: 30px;
			border-top: none;
			border-left: none;
			border-right: none;
			border-bottom: 1px solid;
			border-bottom-style: dotted;

		}
		.items{
			width: 300px;
		}
		.values{
			padding-left: 50px;
			

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
			 </li>             
			<li><a href="costing.php"><i class="icon-tags icon-2x"></i> Costing</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="contractor.php"><i class="icon-group icon-2x"></i> Contractors</a>                                    </li>
			<li><a href="purchase.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Purchase</a> 
<ul class="nav nav-list">
			<li class="active"><a href="purchasew.php"><i class="icon-shopping-cart icon-1x"></i>Woven</a>      
<li><a href="purchaseorderk.php"><i class="icon-shopping-cart icon-1x"></i>Knit </a>     
<li><a href="purchasesoredera.php"><i class="icon-shopping-cart icon-1x"></i>Accessories</a>
</li> 
</ul>
			 </li>
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
			<i class="icon-shopping-cart"></i> Purchase Woven
			</div>
			<ul class="breadcrumb">
			<li ><a href="index.php">Dashboard</a></li>/
			<li><a href="purchase.php">Purchase</a></li>/
			<li class="active">Purchase Woven</li>
			</ul>
	<div >

		<div id="page-wrap">

		<br>
		<form method="post" id="target" target="_blank" action="print.php">
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
		<div class="col-md-4 pull-right" style=" margin-top:-10px;padding-top: 5px;padding-bottom: 5px;padding-left:50px;">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
			<button  type='submit' name='printonly' class="btn btn-success btn-md subt">
      		<span class="icon-print"></span> Order
    		</button>
    		<button type='submit' name='mailonly' class="btn btn-warning btn-md subt">
      		<span class="icon-envelope"></span> Mail
    		</button>
    		<button type='submit' name='smsonly' class="btn btn-warning btn-md subt">
      		<span class="icon-envelope"></span> SMS
    		</button>
		</div>
		</div><br>
		<div class="col-md-12"><center><h2>Purchase Order</h2></center>
	</div>
	<table style="margin: 10px;">
		<tr>
		<td style="border-right: 1px solid blue; ">
		

		<h5 style="color: #3333d7">Customer:
		 <select id="for" name="cus" style="width:300px;height: 30px" required>
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
			 <input type="hidden" id="cusname" name="cusname"></input>
		</h5> 

		</td>
		<td>
		<h5 style="color: #3333d7">Supplier:
		 <select id="from" name="from" style="width:300px;height: 30px" required>
			 	<option value="">Choose a Supplier</option>
			 	<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM supplier_table");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				?>
				<option value="<?php echo $row['supplier_id'];?>"><?php echo $row['supplier_name']; ?></option>
			<?php
			}
			?>
	<option value="addsupplier">Add a Supplier</option>
			 </select> 
			 <input type="hidden" id="supname" name="supname"></input>
			
		</h5> 
		</td>
		</tr>
		</table>
		<!-- to get description-->
		<div class="span10" id="condesc" >
		</div>
<div class="span10" id="appx" >
</div>
<div class="span10" id="sors" >
</div>
<div class="span10" id="ac" >
<table>
	<tr>
		<td class="items"><span>Mill Name </span> </td><td>:</td>
		<td  class="values"><input type="text" id="mname" name="supplier"><br> </td>
	</tr>
	<tr>
		<td class="items"><span >Specification  </span> </td><td>:</td>
		<td  class="values"> <input type ="text" id="listBox" list="specs" name="Specification" >
		<datalist id="specs">
			<option value="shirting">Shirting</option>
			<option value="suiting">Suting</option>
			<option value="spun">Spun</option>
			</datalist></td>
	</tr>
	<tr>
		<td class="items"><span >Design No.</span> </td><td>:</td>
		<td class="values"><input type="text" id="dno" name="Design"  /> </td>
	</tr>
	
	<tr>
		<td class="items"> <span >Colour </span></td><td>:</td>
		<td class="values"> <input type="text"  name="colour" /></td>
	</tr>
	<tr>
		<td class="items"> <span >Order Quantity </span></td><td>:</td>
		<td class="values"> <input type="text" id="oqty" name="Quantity"  /></td>
	</tr>
	<tr>
		<td class="items"><span >Rate/m  </span> </td><td>:</td>
		<td class="values"> <input type="text"  name="Rate/m"  /></td>
	</tr>
	<tr>
		<td class="items"> <span >Order Date  </span></td><td>:</td>
		<td class="values"><input type="date"  name="Contact1_Name" > </td>
	</tr>
	<tr>
		<td class="items"><span >Expected Delivery Date </span> </td><td>:</td>
		<td class="values"><input type="date"  name="Expected_Delivery_Date" /> </td>
	</tr>
	<tr>
		<td class="items"><span >Fabric Received Date</span> </td><td>:</td>
		<td class="values"><input type="date"  name="received_date" /> </td>
	</tr>


</table>

</form>
<div class="col-md-4 pull-right" style=" margin-top:-10px;padding-top: 5px;padding-bottom: 5px;padding-left:50px;">
		<br>
		<br>
			<button  type='submit' name='printonly' class="btn btn-success btn-md subt">
      		<span class="icon-print"></span> Order
    		</button>
    		<button type='submit' name='mailonly' class="btn btn-warning btn-md subt">
      		<span class="icon-envelope"></span> Mail
    		</button>
    		<button type='submit' name='smsonly' class="btn btn-warning btn-md subt">
      		<span class="icon-envelope"></span> SMS
    		</button>
		</div>
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
