<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Joyson Apparels</title>
	<link rel="shortcut icon" href="images/pos.png">
	<link rel='stylesheet' type='text/css' href='invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/print.css' media="print" />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap-theme.css' />
		<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap-theme.min.css' />
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
</head>
<?php
	require_once('auth.php');
?>
<body>

	<div id="page-wrap">

		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br>
		<form action="#" method="post" target="_blank">
		<div id="identity" algin="center">
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">


           <div class="col-md-9 pull-left">
           		
           <!--
           	<h1 style="color: #33337d;font-family: sans-serif;	">
            	JOYSON APPARELS
            </h1>
            -->
            <img src="invoice/images/logo.jpg " id="bill_logo"  >
            <h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
           </div>
           <div class="col-md-3 pull-right" style="padding-top: 25px;" >
            <table id="meta">
    
                <tr>

                    <td class="meta-head" style="color: #33337d;">Date</td>
                    <td><textarea id="date"><?php echo date('M-d-Y'); ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		    <div class="col-md-4 pull-right" style="margin-top: -100px;padding-left:47px; ">
			<br>
			<button  type='submit' name='printonly' class="btn btn-success btn-md subt">
      		<span class="glyphicon glyphicon-print"></span> Order
    		</button>
    		<button type='submit' name='mailonly' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> Mail
    		</button>
    		<button type='submit' name='smsonly' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> SMS
    		</button>
		</div>        
		</div><br> 
		<div class="row" style="margin-top: -30px;margin-left: 800px;">
		
		<a href="purchase.php" class="btn btn-danger btn-md">
      		<span class="glyphicon glyphicon-remove"></span> Close
    		</a>
		</div>
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
		<hr>
		<!-- to get description-->
		<div class="span10" id="condesc" style="margin:17px;">
			
		</div>
		<!--
<div class="span10" id="ac" style="margin:17px;">
	Choose Purchase Order Fabric :&nbsp;&nbsp;<input type="radio" id="shf" name="for" value="shirting" > Shirting</input>&nbsp;<input id="suf" type="radio" name="for" value="suiting"> Suiting</input>
</div>-->
<div class="span10" id="appx" style="margin:17px;">
<!--<div class="span10" id="appraximation" style="margin:17px;">
	<table id="items">
		  <tbody id="content">
		  <tr class="item-row">
		      <td class="item-name count"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description">
		      <textarea class="cc" name="item[cc][]" placeholder="Enter class Count"></textarea>
		      </td>
		      <td>Size 1 :<select id="size1" name="" style="width:130px;height: 30px" required><option value="">Select Size</option></select> 
		      <textarea class="s1qty" name="item[s1qty][]" placeholder="Quantity in 70 %"></textarea></td>
		      <td>Size 2 :
		      <select id="size2" name="" style="width:130px;height: 30px" required>
			 	<option value="">Select Size</option>
			 </select> 
			 <textarea class="s2qty" name="item[s2qty][]" placeholder="Quantity in 30 %"></textarea></td>
		  </tr>
		 </tbody>
		 <tfoot>
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  </tfoot>
		 </table>
</div>
<div class="span10" id="fabricapx" style="margin:17px;">
	<table>
	<thead>
	<tr>
		<th>
		 Description
		</th>
		<th>
		 Count
		</th>
		<th>
		Fabric Required
		</th>
	</tr>
	</thead>
	<tbody>
		<tr >
		<td class="description">
		<span>Size</span> 
		</td>
		<td class="description">
		<textarea placeholder="Total Size Count" name="size[]"></textarea>
		</td>
		<td class="description">
		<textarea placeholder="Fabric required"  name="fr[]"></textarea>
		</td>
		</tr>
	</tbody>
	</table>
</div>-->
</div>
<div class="span10" id="sors" style="margin:17px;">
</div>
<div class="span10" id="ac" style="margin:17px;">
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
		
		<div class="row " style="padding-top: 70px">
			<div class="col-sm-4 text-left" style="color: #33337d;">Prepared by</div>
			<div class="col-sm-4 text-center" style="color: #33337d;">Approved by</div>
			<div class="col-sm-4 text-right" style="color: #33337d;">For <font style="font-family: sans-serif;">Md.Sign</font></div>
		</div>
	</div>
	</div>
<!--
	<center>
	<button id="btns" class="btn btn-md glyphicon glyphicon-print" onclick="myprint();"></button></center> -->
	<script type="text/javascript">
		
		function myprint(){
			$('btns').remove();
			window.print();
		}
	</script>
</body>

</html>