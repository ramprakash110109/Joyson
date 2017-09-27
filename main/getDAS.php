<?php
$cusid=$_REQUEST['customer'];
$x=$_REQUEST['getf'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM costing_table WHERE customer_id='".$cusid."' order by size asc");
$result->execute();
$das=array();
$count = $result->rowCount();
if($count!=0){
for($i=0; $row = $result->fetch(); $i++){
		$item['desc']=$row['description'];
		$item['size']=$row['size'];
		$das[$i]=$item;
	}
	$tmp = array();
	foreach($das as $arg)
	{
    	$tmp[$arg['desc']][] = $arg['size'];
	}
	$descsize = array();
	foreach($tmp as $type => $labels )
	{
    	$descsize[] = array(
        'desc' => $type,
        'size' => $labels
    	);
	}
	if($x=='desc'){
		getdesc($descsize);
	}
	if($x=='size')
	{
		getsize($descsize);
	}	

	/*for($i=0;$i<count($descsize);$i++)
	{
		//for($j=0;$j<count($descsize[$i]['size']);$j++)
			//echo $descsize[$i]['size'][$j];
	}*/
}
else
{
	?><a href="costing.php" style="color:red;">Costin not Found clik here to add costing</a><?php
} 
function getdesc($descsize)
{
	?>
	<script type="text/javascript">
	$(document).ready(function() {
		 $("#condesc input[name='desc']").click(function(){
  			$.post( 
                              "getDAS.php",
                              {customer:$('#for').val(),getf:"size",desc:$('input:radio[name=desc]:checked').val()},
                              function(data) {
                               $('#appx').html(data);
                               //alert(data);
                              }
                        );
 		}); 

/*
$("#condesc :checkbox").change(function() {
    // this will contain a reference to the checkbox   
    if (this.checked) {
        // the checkbox is now checked 
        alert($(this).val());
        $.post( 
                              "getDAS.php",
                              {customer:$('#for').val(),getf:"size",desc:$(this).val()},
                              function(data) {
                              	var x='<div id="'+$(this).val()+'">'+data+'</div>';
                               $('#appx').append(x);
                               //alert(data);
                              }
                        );
    } else {
        // the checkbox is now no longer checked
        alert($(this).val());
    }
});*/
/*$("#preper").click(function(){
            var favorite = [];
            $.each($("input[name='desc']:checked"), function(){            
                favorite.push($(this).val());
            });
     		var desc='';
            $.each(favorite, function(index, value) { 
  				//alert(index + ': ' + value);
  				desc+=value+'#';
			});
			desc = desc.substring(0, desc.length - 1);
			//alert(desc);
            $.post( 
                              "getDAS.php",
                              {customer:$('#for').val(),getf:"size",desc:desc},
                              function(data) {
                              	//var x='<div id="'+$(this).val()+'">'+data+'</div>';
                               //$('#appx').append(x);
                               alert(data);
                              }
                        );
        });*/


	});
	</script>
	Choose Purchase Order for :&nbsp;&nbsp;
	<?php
		for($i=0;$i<count($descsize);$i++){
		?>
	<input type="radio" id="desc" clase="desc" name="desc" value="<?php echo $descsize[$i]['desc'];?>" > <?php echo $descsize[$i]['desc'];?></input>&nbsp;
		<?php
		}?>
		<!--<input type="button" id="preper" name="preper" value="Preper"></input>-->
		<?php
}
function getsize($descsize){
	$desc=$_REQUEST['desc'];
	/*echo $desc;
	$favorite=explode("#", $desc);//to ckechk the fabrics are equal if it is inequal cant make purchase
	for($k=0;$k<count($favorite);$k++)
	{
		echo $favorite[$k];
	}*/
	?>
	<script type="text/javascript">
function update_qtyc() {
  var row = $(this).parents('.item-row');
  var cc = row.find('.cc').val();
  var seventy=cc*0.7;
  var thirty=cc*0.3;
  row.find('.s1qty').val(seventy.toFixed());
  row.find('.s2qty').val(thirty.toFixed());
  row.find('.size1').removeAttr('disabled');
  row.find('.size2').removeAttr('disabled');
}
function update_sc1()
{
	var row = $(this).parents('.item-row');
	var data= $(this).val();
	var pdata=row.find('.pres1').val();
	row.find('.pres1').val(data);
	var y=($('#s'+pdata).val()*1)-(row.find('.s1qty').val()*1);
  	var x=(row.find('.s1qty').val()*1)+($('#s'+data).val()*1);
  	if(y>0)
  		$('#s'+pdata).val(y);
  	else
  		$('#s'+pdata).val(0);
  	if(x>0)
  		$('#s'+data).val(x);
  	else
  		$('#s'+data).val(0);
}
function update_sc2()
{
	var row = $(this).parents('.item-row');
	var data= $(this).val();
	var pdata=row.find('.pres2').val();
	row.find('.pres2').val(data);
	var y=($('#s'+pdata).val()*1)-(row.find('.s2qty').val()*1);
  	var x=(row.find('.s2qty').val()*1)+($('#s'+data).val()*1);
  	if(y>0)
  		$('#s'+pdata).val(y);
  	else
  		$('#s'+pdata).val(0);
  	if(x>0)
  		$('#s'+data).val(x);
  	else
  		$('#s'+data).val(0);
}
function update_prvs1()
{
	var row = $(this).parents('.item-row');
	row.find('.pres1').val($(this).val());
}
function update_prvs2()
{
	var row = $(this).parents('.item-row');
	row.find('.pres2').val($(this).val());
}
function delete_update(row)
{
	var pdata=row.find('.pres1').val();
	var y=($('#s'+pdata).val()*1)-(row.find('.s1qty').val()*1);
	var pdata1=row.find('.pres2').val();
	var y1=($('#s'+pdata1).val()*1)-(row.find('.s2qty').val()*1);
	if(y>0)
		$('#s'+pdata).val(y);
	else
		$('#s'+pdata).val(0);
	if(y1>0)
		$('#s'+pdata1).val(y1);
	else
		$('#s'+pdata1).val(0);
}
function bind() {
  $(".cc").bind('keyup mouseup',update_qtyc);
  $(".s1qty").bind('keyup mouseup',update_qtyc);
  $(".s2qty").bind('keyup mouseup',update_qtyc);
  $(".size1").focus(update_prvs1);
  $(".size2").focus(update_prvs2);
  $(".size1").change(update_sc1);
  $(".size2").change(update_sc2);
}

	$(document).ready(function() {
		$('#buffer').bind('keyup mouseup', function () {
			var v1=$('#totalfq').val();
			var v2=$('#buffer').val();
			var v3=(v1*1)+(v2*1);
			$('#oqty').val(v3+" meters");
		});
$("#fab input[name='fabric']").click(function(){
  			//alert($('input:radio[name=fabric]:checked').val());
  			//alert($('input:radio[name=desc]:checked').val());
  			var tqf=0.0;
  			<?php
  			for($i=0;$i<count($descsize);$i++){

  				if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			{?>
  					$.post( 
                              "getCost.php",
                              {cid:$('#for').val(),desc:$('input:radio[name=desc]:checked').val(),size:<?php echo $descsize[$i]['size'][$j];?>,sors:$('input:radio[name=fabric]:checked').val(),qty:$('#s'+<?php echo $descsize[$i]['size'][$j];?>).val(),type:"qty"},
                              function(data) {
                               //$('#appx').html(data);
                               $('#sq'+<?php echo $descsize[$i]['size'][$j];?>).val(data);
                               tqf=(tqf*1)+(data*1);
                               $('#totalfq').val(tqf);
                              }
                        );

			<?php }
		}
	}?>
  			/*$.post( 
                              "getDAS.php",
                              {customer:$('#for').val(),getf:"size",desc:$('input:radio[name=desc]:checked').val()},
                              function(data) {
                               $('#appx').html(data);
                               //alert(data);
                              }
                        );*/
                        $.post( 
                              "getCost.php",
                              {cid:$('#for').val(),desc:$('input:radio[name=desc]:checked').val(),sors:$('input:radio[name=fabric]:checked').val(),type:"detail"},
                              function(data) {
                               //$('#appx').html(data);
                               //alert(data);
                               var obj = JSON.parse(data);
                               //alert(obj.millname);
                               $('#mname').val(obj.millname);
                               //alert(obj.designno);
                               $('#dno').val(obj.designno);
                              }
                        );

 		}); 



		if ($(".delete").length < 2) $(".delete").hide();
  		$('input').click(function(){
    	$(this).select();
  		});   
  $("#addrow").click(function(){
    $(".item-row:last").after('<tr class="item-row"><td class="item-name count"><div class="delete-wpr">  <a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td class="description"><textarea class="cc" name="item[name][]" placeholder="Enter class Count"></textarea></td><td>Size 1 :<select class="size1" name="" style="width:130px;height: 30px" disabled="disabled" required><option value="">Select Size</option><?php 
for($i=0;$i<count($descsize);$i++)
	{
		if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			echo '<option value="'.$descsize[$i]['size'][$j].'">'.$descsize[$i]['size'][$j].'</option>';
		}
	}
?></select><input type="hidden" class="pres1" value="0"/><br>70% :<textarea class="s1qty" name="item[cost][]" style="width: 70px; height: 18px;" placeholder="Quantity in 70 %"></textarea></td><td>Size 2 :<select class="size2" name="" style="width:130px;height: 30px" disabled="disabled" required><option value="">Select Size</option><?php 
for($i=0;$i<count($descsize);$i++)
	{
		if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			echo '<option value="'.$descsize[$i]['size'][$j].'">'.$descsize[$i]['size'][$j].'</option>';
		}
	}
    	?></select><input type="hidden" class="pres2" value="0"/><br>30% :<textarea class="s2qty" name="item[qty][]" style="width: 70px; height: 18px;" placeholder="Quantity in 30 %"></textarea></td></tr>');
    if ($(".delete").length > 1) $(".delete").show();
   bind();
  });
  bind();
  
  $(".delete").live('click',function(){
  	var row = $(this).parents('.item-row');
  	delete_update(row);
    $(this).parents('.item-row').remove();
    if ($(".delete").length < 2) $(".delete").hide();
    //update_total();  
  });
});
	</script>
	<table id="items">
		  <tbody id="content">
		  <tr class="item-row">
		      <td class="item-name count"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description">
		      <textarea class="cc" name="item[cc][]" placeholder="Enter class Count"></textarea>
		      </td>
		      <td>Size 1 :<select class="size1" name="" style="width:130px;height: 30px" disabled="disabled" required><option value="">Select Size</option>
		      	<?php 
for($i=0;$i<count($descsize);$i++)
	{
		if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			echo '<option value="'.$descsize[$i]['size'][$j].'">'.$descsize[$i]['size'][$j].'</option>';
		}
	}
    	?>
		      </select> 
		      <input type="hidden" class="pres1" value="0"/>
		      <br>70% :<textarea style="width: 70px; height: 18px;" class="s1qty" name="item[s1qty][]" placeholder="Quantity in 70 %" readonly="true"></textarea></td>
		      <td>Size 2 :
		      <select class="size2" name="" style="width:130px;height: 30px" disabled="disabled" required>
			 	<option value="">Select Size</option>
<?php 
for($i=0;$i<count($descsize);$i++)
	{
		if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			echo '<option value="'.$descsize[$i]['size'][$j].'">'.$descsize[$i]['size'][$j].'</option>';
		}
	}
    	?>
			 </select> 
			 <input type="hidden" class="pres2" value="0"/>
			 <br>30% :<textarea class="s2qty" style="width: 70px; height: 18px;" name="item[s2qty][]" placeholder="Quantity in 30 %" readonly="true"></textarea></td>
		  </tr>
		 </tbody>
		 <tfoot>
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  </tfoot>
		 </table>
<br>	<div id="fab">Choose Purchase Order Fabric :&nbsp;&nbsp;<input type="radio" id="shf" name="fabric" value="shirting" > Shirting</input>&nbsp;<input id="suf" type="radio" name="fabric" value="suiting"> Suiting</input></div>
<br>
<br>
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
	<?php 
for($i=0;$i<count($descsize);$i++)
	{
		if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			{
				?>
		<tr >
		<td class="description">
		<?php echo $desc.'-'.$descsize[$i]['size'][$j];?>
		</td>
		<td class="description">
		<textarea style="width: 70px; height: 15px;" placeholder="Total Size Count" class="" id="s<?php echo $descsize[$i]['size'][$j];?>" name="size[]" value="0" readonly="true"></textarea>
		</td>
		<td class="description">
		<textarea placeholder="Fabric required" id="<?php echo 'sq'.$descsize[$i]['size'][$j];?>" name="fr[]" style="width: 70px; height: 15px;" readonly="true"></textarea>m
		</td>
		</tr>
		<?php
			}
		}
	}
    	?>
	</tbody>
	<tfoot>
	 <tr>

		      <td colspan="1" class="blank"> </td>
		      <td class="total-line">Total Fabric Required</td>
		      <td class="total-value balance"><textarea id="totalfq" name="total" style="width: 70px; height: 15px;" readonly="true">0.0</textarea>m</td>
		  </tr>
		  <tr>
		  		<td colspan="1" class="blank"> </td>
		      <td class="total-line">Buffer : </td>
		      <td class="total-value balance"><input type="number" id="buffer" min="0.0" step="0.1" name="buffer" style="width: 70px; height: 15px;" ></input>m</td>
		  </tr>
		</tfoot>

	</table>
	<?php
}
?>