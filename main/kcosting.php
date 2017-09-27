<html>
<head>
<title>
Joyson Apparels
</title>

<?php 
require_once('auth.php');
?>
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
      .modal-body img{
      	height:300px;
      	width:300px;
      }
      .modal{
      	//height: 400px;
      	width:600px;
      }
      .modal-body{
      	padding-top:50px;
      	padding-bottom: 0px;
      	margin: auto;
      	height: 400px;
      	width: 400px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
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

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
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
<body>
<?php include('navfixed.php');?>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
                     <ul class="nav nav-list">
              <li><a href="#"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li><a href="billing.php"><i class="icon-shopping-cart icon-2x"></i> Billing </a>  </li>      
			<li ><a href="costing.php"><i class="icon-tags icon-2x"></i> Costing</a>
			<ul class="nav nav-list">
			
			<li><a href="wcosting.php"><i  class="icon-tags icon-1x"></i> Costing Woven</a></li>      
			<li class="active"><a href="kcosting.php"><i  class="icon-tags icon-1x"></i> Costing Knit </a></li> 
			
			</ul>                                     </li>
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
			<i class="icon-tags"></i> Costing
			</div>
			<ul class="breadcrumb">
			<li ><a href="index.php">Dashboard</a></li>/
			<li ><a href="costing.php">Costing</a></li>/
			<li class="active"> Costing Knitted </li>
			</ul>
	
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM kcosting_table ORDER BY customer_name DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
				<div style="text-align:center;">
			Total Number of Knitted Costing:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			<div style="text-align:center;">
			</div>
</div>


<input type="text" style="height: 35px;" name="filter" value="" id="filter" placeholder="Search Knits..." autocomplete="off" />
<a rel="facebox" href="createknitted.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> New Knitted Costing</button></a><br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> Image </th>
			<th width="12%"> School Name</th>
			<th width="6%"> Description </th>
			<th width="5%"> Size </th>
			<th width="6%"> Rate/Piece</th>
			<th width="12%"> Modify </th>
		</tr>
	</thead>
	<tbody>
		
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
				include('../connect.php');
				for($i=0; $row = $result->fetch(); $i++){
				
			?>
		<tr class="record">
			<td><a href="#" class="thumbnail" title="<?php echo $row['customer_name'].'-'.$row['description']; ?>"><img src="data:image;base64,<?php echo $row['image']; ?>" width="50" height="50" /></a></td>
			<td><?php echo $row['customer_name']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td><?php
			echo $row['size'];
			?></td>
			<td><?php
			

			$c=str_replace(',','',$row['cost']);
			$oprice=(float)$c;
			echo formatMoney($oprice, true);
			?></td>
			</td>			<td>
			<a rel="facebox" title="Click to edit the knit" href="editknitted.php?id=<?php echo $row['costing_id']; ?>"><button style="height:24px; width:42px;" class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['costing_id']; ?>" class="delbutton" title="Click to Delete the knit"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>
</div>
<br/>
<br/>


<div class="clearfix"></div>
</div>
</div>
</div>


<div id="myModal" class="modal hide fade"  role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" >×</button>
			<h3 align="center" class="modal-title ">Heading</h3>
	</div>
	<div align="center" class="modal-body">
		
	</div>
	
</div>


  <script type="text/javascript">
//viewimage
$(document).ready(function(){
	$('.thumbnail').click(function(){

  	$('.modal-body').empty();

  	var title = $(this).attr("title");
  	
  	$('.modal-title').html(title);
  	$(this.innerHTML).appendTo('.modal-body');
  	//modal.style.display = "none";
  	jQuery.noConflict(); 
	$('#myModal').modal('show');
});

});
  

$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Item? There is NO undo!"))
		  {
 $.ajax({
   type: "GET",
   url: "deleteknitted.php",
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
</body>
<?php include('footer.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</html>