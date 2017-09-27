<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM accessories WHERE acc_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditaccess.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-edit icon-large"></i> Edit Accessories</h4></center>
<hr>
<div class="span4"  style="margin-left: 410px;" id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>School Name </span>
<select id="customer" name="customer"  style="width:265px; height:30px; margin-left:-5px;" required>
<option value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_name'];?></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM customer_table");
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row1['customer_id'];?>"><?php echo $row1['customer_name']; ?></option>
		<?php
	}
	?>
	</select>
	<input type="hidden" style="width:265px; height:60px;" id="cname" name="cname" value="<?php echo $row['customer_name'];?>"><br>
	<span>Supplier/Dealer/Agent Name </span>
<select id="supplier" name="supplierid"  style="width:265px; height:30px; margin-left:-5px;" required>
<option value="<?php echo $row['supplier_id'];?>"><?php echo $row['supplier_name'];?></option>
<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM supplier_table");
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row1['supplier_id'];?>"><?php echo $row1['supplier_name']; ?></option>
		<?php
	}
	?>
	</select>
	<input type="hidden" style="width:265px; height:60px;" id="sname" name="sname" value="<?php echo $row['supplier_name'];?>"><br>
<span>Item </span><input type="text" id="item" name="item" list="fablist"  style="width:265px; height:30px; margin-left:-5px;" value="<?php echo $row['item'];?>" required>
<datalist id="fablist">
		<option value="Shoes">Shoes</option>
		<option value="Regular Socks">Regular Socks</option>
		<option value="White Socks">White Socks</option>
		<option value="Belt">Belt</option>
		<option value="Tie">Tie</option>
		<option value="Bag">Bag</option>
		<option value="Cap">Cap</option>
	</datalist>
<br>
<span>Quality </span><input type="text" id="quality"  list="qualityl" style="width:265px; height:30px;" value="<?php echo $row['quality'];?>" name="quality">
					<datalist id="qualityl">
						<option value="PU">PU</option>
						<option value="PVC">PVC</option>
						<option value="PV">PV</option>
						<option value="PVP">PVP</option>
						<option value="cotton lycra">Cotton Lycra</option>

					</datalist>
<br>
<span>Design  </span><input name="design" list="designl" id="design" style="width:265px; height:30px; margin-left:-5px;" value="<?php echo $row['design'];?>"  >
					<datalist id="designl">
						<option value="yawn dyed socks">yawn dyed socks</option>
						<option value="vertical stripes socks">yawn dyed socks</option>
						<option value="plain socks">yawn dyed socks</option>
						<option value="PU lace">PU lace</option>
						<option value="PU welcrow">PU welcrow</option>
						<option value="PV lace">PV lace</option>
						<option value="PV welcrow">PV welcrow</option>
					</datalist>

<span>Size : </span><select name="size"  style="width:265px; height:30px; margin-left:-5px;"  required >
<option value="<?php echo $row['size'];?>"><?php echo $row['item'];?>-<?php echo $row['size'];?></option>
		<option value="1">bag</option>
		<option value="1">socks-1</option>
		<option value="2">socks-2</option>
		<option value="3">socks-3</option>
		<option value="4">socks-4</option>
		<option value="5">socks-5</option>
		<option value="6">socks-6</option>
		<option value="7">socks-7(Free)</option>
		<option value="1">shoe-1</option>
		<option value="2">shoe-2</option>
		<option value="3">shoe-3</option>
		<option value="4">shoe-4</option>
		<option value="5">shoe-5</option>
		<option value="6">shoe-6</option>
		<option value="7">shoe-7</option>
		<option value="8">shoe-8</option>
		<option value="9">shoe-9</option>
		<option value="10">shoe-10</option>
		<option value="11">shoe-11</option>
		<option value="12">shoe-12</option>
		<option value="13">shoe-13</option>
		<option value="28">belt-28</option>
		<option value="36">belt-36</option>
		<option value="42">belt-42</option>
		<option value="10">tie-10</option>
		<option value="12">tie-12</option>
		<option value="14">tie-14</option>
		<option value="16">tie-16</option>
		<option value="52">tie-52</option>
		<option value="54">tie-54</option>
		<option value="s">cap-s</option>
		<option value="m">cap-m</option>
		<option value="l">cap-l</option>
	</select><br>
<span>Actual Price </span><input type="number" id="aprice"  style="width:265px; height:30px;"  name="aprice" value="<?php echo $row['price'];?>" Required><br>
<span>Freight Charge </span><input type="number" id="fcharge"  style="width:265px; height:30px;" name="fcharge" value="<?php echo $row['freight'];?>" Required><br>
<span>Profit (%)</span><input type="number" id="profit" min="0" max="50"style="width:265px; height:30px;" name="profit" step="1" value="<?php echo $row['profit'];?>" placeholder="0" Required><br>
<span>Rate/pcs </span><input type="number" id="rate" style="width:265px; height:30px;" name="rate" value="<?php echo $row['cost'];?>" readonly="true" Required><br>
<span>Stock(pcs) :</span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" name="stock" value="<?php echo $row['stock'];?>" Required ><br>
<span>Choose new image to upload</span><input type="file" name="image" style="width:265px; height:60px;"/>
<span></span><input type="hidden" style="width:265px; height:60px;" id="txt22" name="type" value="fabric"><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>

<script>
$('#supplier').on('change', function() {
  var selectedText = $("#supplier option:selected").html();
     $("#sname").val(selectedText);
     //alert($("#sname").val());
});
$('#customer').on('change', function() {
  var selectedText = $("#customer option:selected").html();
     $("#cname").val(selectedText);
     //alert($("#cname").val());
});



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
$("#profit").bind('keyup mouseup', function () {
			updateRate();
});
$("#aprice").bind('keyup mouseup', function () {
			updateRate();
});
$("#fcharge").bind('keyup mouseup', function () {
			updateRate();
});
		
});
function updateRate()
{
	var a=$('#aprice').val();
	var b=$('#fcharge').val();
	var p=$("#profit").val();
	var fee=(1*a)+(1*b);
	fee=(1*fee)+(1*fee)*((1*p)/100);
	$('#rate').val(fee);
}
</script>
<?php
}
?>