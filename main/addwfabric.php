<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savewfabric.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Woven Fabric</h4></center>
<hr>
<div class="span4" style="margin-left: 410px;" id="ac">
<span>Agent Name </span>
<select id="supplier" name="supplier"  style="width:265px; height:30px; margin-left:-5px;" Required>
<option value="">Choose an Agent</option>
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
	</select><br>
	<span>Mill Name </span>
<select id="agent" name="agent"  style="width:265px; height:30px; margin-left:-5px;" Required>
<option></option>
	</select>
	<input type="hidden" style="width:265px; height:60px;" id="sname" name="sname"><br>
		<input type="hidden" style="width:265px; height:60px;" id="sname" name="type" value="woven">

<span>Fabric </span><input type="text" name="description" list="fablist"  style="width:265px; height:30px; margin-left:-5px;" Required>
<datalist id="fablist">
		<option value="Shirting">Shirting</option>
		<option value="Suiting">Suting</option>
		<option value="Spun">Spun</option>
	</datalist>
<br>
<span>Design No  </span><input type="text" id="txt2" style="width:265px; height:30px;" name="design_no" Required><br>
<span>Width(inches)  </span><select name="length"  style="width:265px; height:30px; margin-left:-5px;" Required>
<option value="">Choose width of fabric</option>
		<option value="36">36 inches</option>
		<option value="58">58 inches</option>
	</select><br>
<!--<span>Colour  </span><select name="colour"  style="width:265px; height:30px; margin-left:-5px;" >
<option>Choose a clour of the fabric</option>
		<option value="white">white</option>
		<option value="black">black</option>
		<option value="red">red</option>
		<option value="green">green</option>
		<option value="orange">orange</option>
		<option value="pink">pink</option>
		<option value="blue">blue</option>
		<option value="violet">violet</option>
		<option value="gray">gray</option>
		<option value="yellow">yellow</option>
	</select><br>-->
<span>Rate/m </span><input type="number" id="txt2" style="width:265px; height:30px;" name="price" Required><br>
<span>Stock(m) :</span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" name="qty" Required ><br>
<span>Choose an image to upload</span><input type="file" name="image" style="width:265px; height:60px;"/>
<span></span><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>

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