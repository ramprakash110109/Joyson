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
			<li><a href="billing.php"><i class="icon-shopping-cart icon-2x"></i> Billing </a>  </li>            
			<li><a href="costing.php"><i class="icon-list-alt icon-2x"></i> Costing</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="contractor.php"><i class="icon-group icon-2x"></i> Contractors</a>                                    </li>
			<li ><a href="purchase.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Purchase</a> 
				<ul class="nav nav-list">
			
			<li class="active"><a href="purchasefabric.php"><i  class="icon-list-alt icon-1x"></i> Fabrics</a></li>      
			<li><a href="purchaseshoes.php"><i  class="icon-list-alt icon-1x"></i> Shoes</a>    </li> 
			<li><a href="purchasesocks.php"><i  class="icon-list-alt icon-1x"></i> Socks</a>  </li>
			<li><a href="purchasebelt.php"><i class="icon-list-alt icon-1x"></i>Belt </a></li>
			<li><a href="purchasetie.php"><i class="icon-list-alt icon-1x"></i>Tie</a></li>
			<li><a href="purchasecap.php"><i class="icon-list-alt icon-1x"></i>Cap</a></li>

			</ul>
			 </li>
			<li  ><a href="stocks.php"><i class="icon-dashboard icon-2x"></i> Stock Details</a>    
			</li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
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
			<i class="icon-dashboard"></i> Purchase Orders - Fabrics
			</div>
			<ul class="breadcrumb">
			<li ><a href="index.php">Dashboard</a></li>/
			<li >Purchase Order</li>/
			<li class="active">Fabrics</li>
			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>Joyson Apparels</center></font>
<form action="#" method="post">
<center><h4>Purchase Fabric</h4></center>
<hr>
<div class="span10" id="ac" style="margin-left: 100px;">

<span>Mill Name </span>
<input id="supplier" type="text" name="supplier"  style="width:265px; height:30px; margin-left:-5px;" Required>
<!--
<option value="">Choose an Mill name</option>
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
	</select><br> -->
	<br>
	<span>Agent Name </span>
<input id="agent" type="text" name="Agent_Name"  style="width:265px; height:30px; margin-left:-5px;" Required>
<br>

<span >Specification : </span><select id="listBox"  style="width:265px; height:30px;"name="Specification" required>
	<option value="shirting">Shirting</option>
	<option value="suiting">Suting</option>
	<option value="spun">Spun</option>
</select>
<br>
<span >Design No. :</span><input type="text" style="width:255px; height:30px;"name="Design" required />
<br>
<span >Width (Inches): </span><input type="text" style="width:255px; height:30px;" name="Width"  Required/><br>
<span >Colour : </span><input type="text" style="width:255px; height:30px;" name="colour" required/><br>
<span >Quantity Required : </span><input type="text" style="width:255px; height:30px;" name="Quantity" required /><br>
<span >Rate/m : </span><input type="text" style="width:255px; height:30px;" name="Rate/m"  required/><br>
<span >Order Date : </span><input type="date" style="width:255px; height:30px;" name="Contact1_Name" required><br>
<span >Expected Delivery Date: </span><input type="date" style="width:255px; height:30px;" name="Expected_Delivery_Date" required/><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large" ></i> Save</button>
</div>
</div>
</form>

</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
   // jQuery methods go here...
$("#supplier").change( function () {
    var tc =$("#supplier").val();
	$.post( 
                  "getAgentName.php",
                  {id:tc},
                  function(data) {
                  	$('#agent').empty();
                      $('#agent').append(data);
                  }
               );


	});
		
});

</script>
</body>
<?php 
}
include('footer.php'); ?>
</html>
