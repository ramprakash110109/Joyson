<html>
<?php
	require_once('auth.php');
?>
<head>
<title>
Joyson Apparels
</title>
<link rel="shortcut icon" href="images/pos.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
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
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
             <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard  </a></li> 
			<li><a href="billing.php"><i class="icon-shopping-cart icon-2x"></i> Billing </a>  </li>          
			<li><a href="costing.php"><i class="icon-tags icon-2x"></i> Costing</a>                                     </li>
			<li ><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="contractor.php"><i class="icon-group icon-2x"></i> Contractors</a>                                    </li>
			<li><a href="purchase.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Purchase</a>  </li>
			<li><a href="stocks.php"><i class="icon-list-alt icon-2x"></i> Stock Details</a>                                     </li>
			<li class="active"><a href="salesreport.php?d1=<?php echo date("m/d/Y");?>&d2=<?php echo date("m/d/Y");?>"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<br><br><br>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

</div>
<form action="salesreport.php" method="get">
<center><strong>From : <input type="text" style="width: 223px; " name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report from&nbsp;<?php 
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dayf=date_create($d1);
				$dayt=date_create($d2);
				$d1=date_format($dayf,"Y/d/m");
				$d2=date_format($dayt,"Y/d/m");
				 echo $d1; ?>&nbsp;to&nbsp;<?php echo $d2; ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="13%"> Invoice Number</th>
			<th width="13%"> Transaction Date </th>
			<th width="20%"> Customer Name </th>
			<th width="18%"> Amount </th>
			<th width="13%"> Profit </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dayf=date_create($d1);
				$dayt=date_create($d2);
				$d1=date_format($dayf,"Y/d/m");
				$d2=date_format($dayt,"Y/d/m");
				$result = $db->prepare("SELECT * FROM invoice WHERE date_issue BETWEEN :a AND :b ORDER by invoice_no DESC ");
				$result->bindParam(':a',$d1);
				$result->bindParam(':b',$d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice_no']; ?></td>
			<td><?php echo $row['date_issue']; ?></td>
			<td><?php echo $row['customer_name']; ?></td>
			<td><?php
			$dsdsd=$row['total_amt'];
			echo formatMoney($dsdsd, true);
			?></td>
			<td><?php
			$zxc=$row['profit'];
			echo formatMoney($zxc, true);
			?></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dayf=date_create($d1);
				$dayt=date_create($d2);
				$d1=date_format($dayf,"Y/d/m");
				$d2=date_format($dayt,"Y/d/m");
				$results = $db->prepare("SELECT sum(total_amt) FROM invoice WHERE date_issue BETWEEN :a AND :b");
				$results->bindParam(':a',$d1);
				$results->bindParam(':b',$d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(total_amt)'];
				echo formatMoney($dsdsd, true);
				}
				?>
			</th>
				<th colspan="1" style="border-top:1px solid #999999">
			<?php 
				$resultia = $db->prepare("SELECT sum(profit) FROM invoice WHERE date_issue BETWEEN :c AND :d");
				$resultia->bindParam(':c',$d1);
				$resultia->bindParam(':d',$d2);
				$resultia->execute();
				for($i=0; $cxz = $resultia->fetch(); $i++){
				$zxc=$cxz['sum(profit)'];
				echo formatMoney($zxc, true);
				}
				?>
		
				</th>
		</tr>
	</thead>
</table>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>
</html>