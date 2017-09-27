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
	<script type='text/javascript' src='js/example3.js'></script>
	<style type="text/css">
	table td{
		border: 1px solid blue;
	}

</style>
</head>
<?php
	require_once('../auth.php');
?>
<body>

	<div id="page-wrap">

		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br>
		<form method="post" id="target" target="_blank" action="aprint.php">

		<div id="identity" algin="center">   
		</div>
		<div style="clear:both"></div>
		<div class ="row"id="customer">
           <div class="col-md-9 pull-left">
                       <img src="images/logo.jpg " id="bill_logo" height="130px" >
            <h4 id="logoline">
            	Manufacturer and Suppliers of Uniforms &amp; Accessories
            </h4>
            <h5 style="color: #33337d;">1, Koothuva Nayanar Street, Melur, Palayamkottai, Tirunelveli-627002.</h5>
           </div>
           <div class="col-md-3 pull-right" style="padding-top: 25px;" >
            <table id="meta">
                <tr>
                    <td class="meta-head" style="color: #33337d;">Invoice No.</td>
                    <td><?php $iid=$_REQUEST['invoice']; echo $iid;?>
                    <input type="hidden" name="billno" value="<?php $iid=$_REQUEST['invoice']; echo $iid;?>"></input>
                    </td>
                </tr>
                <tr>

                    <td class="meta-head" style="color: #33337d;">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		      <div class="col-md-4 pull-right" style="margin-top: -100px;padding-left:47px; ">
			<h4 style="font-weight: bolder;"><u>PROFORMA INVOICE</u></h4>
			<button  type='submit' name='printonly' class="btn btn-success btn-md subt">
      		<span class="glyphicon glyphicon-print"></span> Print 
    		</button>
    		<button type='submit' name='mailonly' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> Mail
    		</button>
    		
		</div>        
		</div><br> 
		<div class="row" style="margin-top: -30px;margin-left: 650px;">
			<button type='submit' name='dnote' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-list-alt"></span> Delivery Note
    		</button>
		</div> 
		<div class="row" style="margin-top: -30px;margin-left: 800px;">
		<a href="../index.php" class="btn btn-danger btn-md">
      		<span class="glyphicon glyphicon-remove"></span> Close
    		</a>
		</div>
		
		<div class="col-md-8">
		<h5 style="color: #3333d7">To:
		 <select id="to" name="to" style="width:500px;height: 30px" required>
			 	<option value="">Choose a Customer</option>
			<?php
				include('../../connect.php');
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
		<div class="col-md-4" style=" margin-top:-10px;padding-top: 5px;padding-bottom: 5px;padding-left:50px;">
			<h4 style="font-weight: bolder;"><u>INVOICE</u></h4>
			<button type='submit' id="print" name='print' class="btn btn-success btn-md subt">
      		<span class="glyphicon glyphicon-print"></span> Save And Print 
    		</button>
    		<button type='submit'  name='mail' class="btn btn-warning btn-md subt">
      		<span class="glyphicon glyphicon-envelope"></span> Mail
    		</button>
    		
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

</html>

	
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