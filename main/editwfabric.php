<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM fabric_table WHERE f_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditwfabric.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-edit icon-large"></i> Edit Woven Fabric</h4></center>
<hr>
<div class="span4"  style="margin-left: 410px;" id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Agent Name </span>
<select id="supplier" name="supplier"  style="width:265px; height:30px; margin-left:-5px;"  >
<option value="<?php echo $row['supplier_id']; ?>" > <?php echo $row['supplier_name'];?></option>
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
	<span>Mill Name </span>
<select id="agent" name="agent"  style="width:265px; height:30px; margin-left:-5px;" >
<option value="<?php echo $row['mill_name']; ?>" > <?php echo $row['mill_name'];?></option>
	</select>
	<input type="hidden" style="width:265px; height:60px;" id="sname" name="sname" value="<?php echo $row['supplier_name']; ?>"><br>
	<input type="hidden" style="width:265px; height:60px;" id="sname" name="type" value="woven">

<span>Fabric </span><select name="description"  style="width:265px; height:30px; margin-left:-5px;" >
<option value="<?php echo $row['f_description']; ?>" > <?php echo $row['f_description'];?></option>
		<option value="Shirting">Shirting</option>
		<option value="Suiting">Suiting</option>
		<option value="Spun">Spun</option>
	</select><br>
<span>Design No  </span><input type="text" id="txt2" style="width:265px; height:30px;" name="design_no" value="<?php echo $row['design_no']; ?>" Required><br>
<span>Width(inches)  </span><select name="length"  style="width:265px; height:30px; margin-left:-5px;">
<option value="<?php echo $row['f_width']; ?>" > <?php echo $row['f_width'];?></option>
		<option value="36">36 inches</option>
		<option value="58">58 inches</option>
	</select><br>

<span>Rate/m </span><input type="text" id="txt2" style="width:265px; height:30px;" name="price" value="<?php echo $row['f_rate']; ?>" Required><br>
<span>Stock(m) :</span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" name="qty" value="<?php echo $row['design_no']; ?>" Required ><br>
<span>Choose new image to upload</span><input type="file" name="image" style="width:265px; height:60px;"/>
<span></span><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
<?php
}
?>
<script>
$('#supplier').on('change', function() {
  var selectedText = $("#supplier option:selected").html();
     $("#sname").val(selectedText);
});

$(document).ready(function(){
   // jQuery methods go here...
$("#supplier").change( function () {
    var tc =$("#supplier").val();
	$.post( 
                  "getMillName.php",
                  {id:tc},
                  function(data) {
                  	$('#agent').empty();
                      $('#agent').append(data);
                  }
               );
	});
});

</script>