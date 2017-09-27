
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM costing_table WHERE costing_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	function getFabName($fabid){
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM fabric_table WHERE f_id= :userid");
		$result->bindParam(':userid', $fabid);
		$result->execute();
		$r=$result->fetch();
		return $r['f_description']."-".$r['supplier_name']."-".$r['design_no'];;
	}
	function getTrimname($tid)
	{
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM trim_table WHERE t_id= :userid");
		$result->bindParam(':userid', $tid);
		$result->execute();
		$r=$result->fetch();
		return $r['t_description'];
	}
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<style type="text/css">
body {counter-reset:section;}
.count:before
{
counter-increment:section;
content:counter(section);
}
</style>
<form action="savewovencost.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="memi" value="<?php echo $id; ?>" readonly="true"/>
<center><h4><i class="icon-plus icon-large"></i> Add variety Costing of <?php echo $row['description'];?></h4></center>
<hr>
<div class="span4" id="ac">
	<!--<div id="ac">-->
<span>School Name </span>
<select id="customer" name="customerid"  style="width:265px; height:30px; margin-left:-5px;" >
<option value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_name'];?></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM customer_table");
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
		<option disabled="disabled" value="<?php echo $row1['customer_id'];?>"><?php echo $row1['customer_name']; ?></option>
		<?php
	}
	?>
	</select><br>
	<input type="hidden" id="cname" name="cname" value="<?php echo $row['customer_name'];?>" /> <br>
<span> Description </span><input type="text" list="desc" style="width:265px; height:30px;" name="desc"value="<?php echo $row['description'];?>" readonly="true" ><br>
<datalist id="desc">
    <option value="Boys Shirt">
    <option value="Girls Shirt">
    <option value="Trouser">
    <option value="Boys pant">
    <option value="A line frock">
    <option value="Pinafore">
    <option value="Girls Overcoat">
    <option value="Chudi set(Top&amp;Bottom)">
  </datalist>

<span> Size </span><input type="text" style="width:265px; height:30px;" name="size" value="" ><br>


<span> Shirting</span><select id="fname1" name='fab[name][]'  style='width:265px; id='fabn"+i+"' height:30px; margin-left:-5px;'  Required>
<?php include('../connect.php');
		 $result = $db->prepare("SELECT * FROM fabric_table where type='Woven'");
		 $result->execute(); ?>
<option  value="<?php echo $row['shirting'];?>"><?php echo getFabName($row['shirting']); ?></option>
<?php for($i=0; $row1 = $result->fetch(); $i++){ ?>
<option disabled="disabled" value='<?php echo $row1['f_id'];?>'> <?php echo $row1['f_description']."-".$row1['mill_name']."-".$row1['design_no']; ?></option>
<?php }?>
</select><br>
<span> Shirting qty(m)</span> <input id="fqty1" type='number' class="fabq" min='0.0' step='0.1' style='width:265px; height:30px;' name="fab[qty][]" value="" Required><br> <br>


<span> Suiting</span>

<select name='fab[name][]'  style='width:265px; height:30px; margin-left:-5px;' id="fname2"  Required>
<?php 
		 $result = $db->prepare("SELECT * FROM fabric_table where type='Woven' ");
		 $result->execute(); ?> 
<option  value="<?php echo $row['suiting'];?>"><?php echo getFabName($row['suiting']); ?></option>
<?php for($i=0; $row1 = $result->fetch(); $i++){ ?>
<option disabled="disabled" value='<?php echo $row1['f_id'];?>'> <?php echo $row1['f_description']."-".$row1['mill_name']."-".$row1['design_no']; ?></option>
<?php }?>
</select><br> 
<span> Suiting qty(m)</span> <input id='fqty2' type='number' class="fabq" min='0.0' step='0.1' style='width:265px; height:30px;' name="fab[qty][]" value="" Required><br> <br> <br>
<!-- to display trims -->
<?php

$trimset=explode('#', $row['trims']);
$trimqtyset=explode('#', $row['trims_qty']);

?>

</div><?php 		 
		 $result3 = $db->prepare("SELECT * FROM trim_table");
		 $result3->execute();
		 ?>
<div class="span4" id="ac">
	<div id="trim">
	<table id="trimtlp">
	<?php 
	$trimset=explode("#", $row['trims']);
	$trim_qtyset=explode("#", $row['trims_qty']);
	for($j=0 ;$j < count($trimset)-1; $j++) {
		if($trimset[$j]!=" " && $trim_qtyset[$j]!=" "){
	?>

  
  <tbody id="detail">
    <tr>
      <td class="count"></td>
       <td><span> Trims: </span><select class="trimn" name='trims[name][]' readonly="true"  style='width:170px; height:30px; margin-left:-5px;' Required>
       <option value="<?php echo $trimset[$j];?>"> <?php echo getTrimname($trimset[$j]);?></option>
		<?php for($i=0; $row1 = $result3->fetch(); $i++){ ?>
		<option disabled="disabled" value='<?php echo $row1['t_id'];?>'> <?php echo $row1['t_description']; ?></option>
		<?php }?> 
		</select><br>
		<span> Trims qty(Pieces) </span><input class="trimq" type='number' value='<?php echo $trim_qtyset[$j]; ?>'  min='0' step='0.1' style='width:170px; height:30px;' name='trims[qty][]' Required>
	</td>
       <td><input type="button" value="-" id="remove"></td>
    </tr>
  <tbody>
  <?php 
		}
	}
  ?>
  <tfoot>
      <tr>
    <th><input type="button" value="+ Trims" id="addtrim"></th>  
      </tr>
  </tfoot>
</table>
</div>
</div>
<div class="span4" id="ac">
	<center><span style="width:300px;"> Cutting Machinery and Trimming(CMT) </span></center>
<span> Cutting rate/piece</span><input id="crp" class="excost" type="number"  min="0.00" step="0.01" style="width:265px; height:30px;" name="cutting" placeholder="0.00" value="<?php echo $row['cutting'];?>"><br>
<span> Singer rate/piece </span><input id="srp" class="excost" type="number"  min="0.00" step="0.01" style="width:265px; height:30px;" name="singer" placeholder="0.00" value="<?php echo $row['singer'];?>"><br>
<span> Trimming rate/piece </span><input id="trp" class="excost" type="number"  min="0.00" step="0.01" style="width:265px; height:30px;" name="trimming" placeholder="0.00" value="<?php echo $row['trimming'];?>"><br>
<span> Ironing Rate/piece </span><input id="irp" class="excost" type="number"  min="0.00" step="0.01" style="width:265px; height:30px;" name="ironing" placeholder="0.00" value="<?php echo $row['ironing'];?>"><br>
<span> Actual price </span><input type="number" style="width:265px; height:30px;" id="oc" name="ocost"  placeholder="0.00" value="0.00" readonly="true"><br>
<span> Profit (%) </span><input type="number" list="profit" id="gain" style="width:265px; height:30px;" name="profit" min="0" step="5" max="50"  placeholder="%" value="">

<br>
<span> Rate/piece </span><input type="number" id="rp" style="width:265px; height:30px;" name="rate"  placeholder="0.00" value="" readonly="true"><br>
<span>Choose new image to upload</span><input type="file" name="image" style="width:265px; height:60px;"/><br>
<span></span><input type="hidden" style="width:265px; height:60px;" id="txt22" value="fabric"><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>


</div>
</div>

</form>
<?php 		 
		 $result3 = $db->prepare("SELECT * FROM trim_table");
		 $result3->execute();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#addtrim").click(function(){
			addnewrow();
		});
		$("#trim").delegate('#remove','click',function()
		{
			$(this).parent().parent().remove();
		});

		$('#customer').change( function() {
			var selectedText = $("#customer option:selected").html();
     		$("#cname").val(selectedText);
		});

		$('#gain').bind('keyup mouseup', function () {
			updateRate();
		});
		$(".excost").bind('keyup mouseup', function () {
			updatePrice();
         });
		$(".fabq").bind('keyup mouseup', function () {
				updatePrice();
               });
		$(".trimq").bind('keyup mouseup', function () {
				updatePrice();
               });

	});
	function addnewrow()
	{
		var tr = '<tr>' +
                   '<td class="count"></td>'+
                    '<td><span> Trims: </span><select class="trimn" name="trims[name][]"  style="width:170px; height:30px; margin-left:-5px;" Required>'+
       '<option>Choose Trims</option>'+
		<?php for($i=0; $row1 = $result3->fetch(); $i++){ ?>
		'<option value="<?php echo $row1['t_id'];?>"> <?php echo $row1['t_description']; ?></option>'+
		<?php }?> 
		'</select><br>'+
		'<span> Trims qty(Pieces) </span><input class="trimq" type="number" value="0"  min="0" step="0.1" style="width:170px; height:30px;" name="trims[qty][]" Required></td>'+
                    '<td><input type="button" value="-" id="remove"></td>'+
                  '</tr>'
		$("#detail").append(tr);
	}
	function updateRate()
	{
		var r=$('#oc').val();
		var p=$('#gain').val();
			$.post( 
                  "calprofit.php",
                  {profit:p,oc:r},
                  function(data) {
                     $('#rp').val(data);
                  }
               );
	}
	function updatePrice()
	{
			var fn =$("#fname1").val()+"#"+$("#fname2").val() ;
	var fq=$("#fqty1").val()+"#"+$("#fqty2").val() ;
	var tn = "";
	var tq = "";
	var tnset = $(".trimn");
	var tqset = $(".trimq");
		
	for(var i=0;i<tnset.length;i++){
		tn+= $(tnset[i]).val()+"#";
		tq+= $(tqset[i]).val()+"#";
	}
	var cmtset=$(".excost");
	var cmt=0.0;
	for(var i=0;i<cmtset.length;i++){
		cmt+=$(cmtset[i]).val()*1.0;
	}
	$.post( 
                  "calwovencost.php",
                  {febname:fn,febqty:fq,trimname:tn,trimqty:tq,sellingcost:cmt},
                  function(data) {
                     $('#oc').val(data);
                     $('#rp').val(data);
                     updateRate();
                  }
               );
	}
	
</script>
<?php
}
?>