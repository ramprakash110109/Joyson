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
		
		.mini {
			border:1px solid blue;
			width: 600px;
		}

		.mini td{
			line-height: 5px;
			padding:0px;
			text-align: center;

		}
		.maintbl td{
			border:none;
			padding:8px;
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
		</div>
		<div class="col-md-12"><center><h3>Purchase Shoes</h3></center>
	</div>
	<table style="margin: 5px;">
		<tr>
		<td style="border-right: 1px solid blue; ">
		<div class="col-md-8">

		<h5 style="color: #3333d7">To:
		 <input type ="text" id="to"   style="width:400px;height: 30px">
			
		</h5> 
		

		</div>
		</td>
		<td>
		<h5 style="color: #3333d7">School Name :
		 <input type ="text" id="school" style="width:400px;height: 30px">
			
		</h5> 
		</td>
		</tr>
		</table>
	<form action="#" method="post">

<div class="span10" id="ac" style="margin:5px;">
<table class="maintbl">
	<tr>
		<td class="items"><span>Color Combo </span> </td><td>:</td>
		<td  class="values"><input id="supplier" type="text" name="color"   ><br> </td>
	</tr>
	<tr>
		<td class="items"><span>Quality </span></td><td>:</td>
		<td  class="values"> <input id="supplier" type="text" name="quality"   ><br></td>
	</tr>
	<tr>
		<td class="items"><span >Design  </span> </td><td>:</td>
		<td class="values"><input type="text" name="Design"  /> </td>
	</tr>
		
	<tr ><td style=""colspan="3"><h4 class="text-center">Kids</h4></td></tr>
		<tr><td class="items"><br> <span >Sizes </span><br><br>
			 <span >Qty </span><br><br>
			<span >Rate/pcs </span> </td>
			<td>:</td><td>
				<table class="mini">
					<thead>
						<td >6</td><td>7</td><td>8</td><td>9</td><td>10</td>
					</thead><br>
					<tbody>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;" /></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
						</tr>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							</tr>
					</tbody>
				</table>
			</td>

		</tr>
		
		<tr><td class="items"><br> <span >Sizes </span><br><br>
			 <span >Qty </span><br><br>
			<span >Rate/pcs </span> </td>
			<td>:</td><td>
				<table class="mini">
					<thead>
						<td >11</td><td>12</td><td>13</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
					</thead><br>
					<tbody>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;" /></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							</tr>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							</tr>
					</tbody>
				</table>
			</td>

		</tr>
		<tr><td class="items"><br> <span >Sizes </span><br><br>
			 <span >Qty </span><br><br>
			<span >Rate/pcs </span> </td>
			<td>:</td><td>
				<table class="mini">
					<thead>
						<td >6</td><td>7</td><td>8</td><td>9</td><td>10</td>
					</thead><br>
					<tbody>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;" /></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							</tr>
						<tr>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							<td><input type="text" style="width: 40px;height: 20px;text-align: center;"/></td>
							</tr>
					</tbody>
				</table>
			</td>

		</tr>

	
	<tr>
		<td class="items"> <span >Order Date  </span></td><td>:</td>
		<td class="values"><input type="date"  name="order_date" > </td>
	</tr>
	<tr>
		<td class="items"><span >Expected Delivery Date </span> </td><td>:</td>
		<td class="values"><input type="date"  name="Expected_Delivery_Date" /> </td>
	</tr>
	<tr>
		<td class="items"> <span >Received Date  </span></td><td>:</td>
		<td class="values"><input type="date"  name="received" > </td>
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