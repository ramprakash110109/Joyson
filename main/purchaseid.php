<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Joyson Apparels</title>
	
	<link rel='stylesheet' type='text/css' href='invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/print.css' media="print" />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap.min.css' />
	<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap-theme.css' />
		<link rel='stylesheet' type='text/css' href='invoice/css/bootstrap-theme.min.css' />
	<script type='text/javascript' src='invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='invoice/js/example.js'></script>
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

<body>

	<div id="page-wrap">

		<div class="col-sm-12 " style="color: #33337d;text-align: center;font-style: italic;font-size: 11	px;padding-top: 50px">
		" I will surely bless you and multiply you" Heb. 6:14
		</div><br>
		
		<div id="identity" algin="center">
		
           
<!--
            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		-->
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
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head" style="color: #33337d;">TIN NO:</td>
                    <td style="color: #33337d;">334255664488</td>
                </tr>

            </table>
		   </div>
		</div><br> 
		<div class="col-md-12"><center><h2>Purchase ID Cards</h2></center>
	</div>
	<table style="margin: 10px;">
		<tr>
		<td style="border-right: 1px solid blue; ">
		<div class="col-md-8">

		<h5 style="color: #3333d7">To:
		 <input type ="text" id="to"  list="tolist" style="width:400px;height: 30px">
			 
		</h5> 
		

		</div>
		</td>
		<td>
		<h5 style="color: #3333d7">School Name :
		 <input type ="text" list="schools" id="school" style="width:400px;height: 30px">
			 
		</h5> 
		</td>
		</tr>
		</table>
	<form action="#" method="post">
<hr>
<div class="span10" id="ac" style="margin:17px;">
<table>
	
		<td class="items"><span >Description  </span> </td><td>:</td>
		<td  class="values"> <input type ="text"   name="desc" >
		
	</tr>
	
		<td class="items"> <span > Order Quantity </span></td><td>:</td>
		<td class="values"> <input type="text"  name="Quantity"  /></td>
	</tr>
	<tr>
		<td class="items"><span >Rate/pcs  </span> </td><td>:</td>
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
		<td class="items"><span >Material Received Date</span> </td><td>:</td>
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
	</div><center>
	<button id="btns" class="btn btn-md glyphicon glyphicon-print" onclick="myprint();"></button></center>
	<script type="text/javascript">
		
		function myprint(){
			$('btns').remove();
			window.print();
		}
	</script>
</body>

</html>