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
<link rel='stylesheet' type='text/css' href='css/style.css' />
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
			<li><a href="costing.php"><i class="icon-tags icon-2x"></i> Costing</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="contractor.php"><i class="icon-group icon-2x"></i> Contractors</a>                                    </li>
			<li ><a href="purchase.php"><i class="icon-shopping-cart icon-2x"></i> Purchase</a> 
			<li class="active"><a href="cutting.php"><i class="icon-glass icon-2x"></i> Cutting</a> 
<!--
			<li><a href="purchasefabric.php"><i  class="icon-list-alt icon-1x"></i> Fabrics</a></li>      
			<li><a href="purchaseshoes.php"><i  class="icon-list-alt icon-1x"></i> Shoes</a>    </li> 
			<li><a href="purchasesocks.php"><i  class="icon-list-alt icon-1x"></i> Socks</a>  </li>
			<li><a href="purchasebelt.php"><i class="icon-list-alt icon-1x"></i>Belt </a></li>
			<li><a href="purchasetie.php"><i class="icon-list-alt icon-1x"></i>Tie</a></li>
			<li><a href="purchasecap.php"><i class="icon-list-alt icon-1x"></i>Cap</a></li>

			</ul>
			 </li>
			 -->
			<li  ><a href="stocks.php"><i class="icon-list-alt icon-2x"></i> Stock Details</a>    
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
			<i class="icon-glass"></i> Cutting
			</div>
			<ul class="breadcrumb">
			<li ><a href="index.php">Dashboard</a></li>/
			<li class="active">Cutting</li>

			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>Joyson Apparels</center></font>
<div id="mainmain">
          <table style="margin: 10px;">
		<tr >
		<td clospan="2" style="border-right: 1px solid blue; ">
		

		<h5 style="color: #3333d7">Customer:
		 <select id="cutting" name="cus" style="width:300px;height: 30px" required>
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
		</tr>
		</table> 
		<div class="span10" id="condesc" >
		</div>
<div class="span10" id="appx" >
</div>
<div class="span10" id="sors" >
</div>
<div class="span10" id="ac" >    

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
