<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savetrim.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Trim</h4></center>
<hr>
<div style="margin-left: 410px;" class="span4" id="ac">
<span>Trim </span><input type="text" list="trimlist" style="width:265px; height:30px;" name="description" Required><br>
<datalist id="trimlist">
		<option value="Collor-Canvas">Collor-Canvas</option>
		<option value="Placket-Canvas">Placket-Canvas</option>
		<option value="Button">Button</option>
		<option value="Zip">Zip</option>
		<option value="Logo">Logo</option>
		<option value="Polybag">Polybag</option>
		<option value="Pant buckle">Pant buckle</option>
		<option value="Elastic">Elastic</option>
		<option value="Chudi Nada">Chudi Nada</option>
</datalist>
<span>Supplier Name </span>
<select id="supplier" name="supplier"  style="width:265px; height:30px; margin-left:-5px;" Required>
<option value="">Choose a supplier</option>
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
	</select>
	<input type="hidden" style="width:265px; height:60px;" id="sname" name="sname" ><br>

<span>Size(in m or kg) </span><input type="number" id="txt2" style="width:265px; height:30px;" value="0" name="length" ><br>

<span>Rate/m (or)/Pices </span><input type="number" id="txt2" min="0.00" step="0.01" style="width:265px; height:30px;" name="price" Required><br>
<span>Stock(m) :</span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" name="qty" Required ><br>
<span>Choose an image to upload</span><input type="file" name="image" style="width:265px; height:60px;" />
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
		
});

</script>