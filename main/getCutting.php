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
                              "getCutting.php",
                              {customer:$('#cutting').val(),getf:"size",desc:$('input:radio[name=desc]:checked').val()},
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
	Choose :&nbsp;&nbsp;
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
	$(document).ready(function() {
		$("#fab input[name='fabric']").click(function(){
  			alert($('input:radio[name=fabric]:checked').val());
  			//alert($('input:radio[name=desc]:checked').val());
  			var tqf=0.0;
  			<?php
  			for($i=0;$i<count($descsize);$i++){

  				if($descsize[$i]['desc']==$desc){
		for($j=0;$j<count($descsize[$i]['size']);$j++)
			{?>
  					$.post( 
                              "getCost.php",
                              {cid:$('#cutting').val(),desc:$('input:radio[name=desc]:checked').val(),size:<?php echo $descsize[$i]['size'][$j];?>,sors:$('input:radio[name=fabric]:checked').val(),qty:$('#s'+<?php echo $descsize[$i]['size'][$j];?>).val(),type:"qty"},
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
                              {cid:$('#cutting').val(),desc:$('input:radio[name=desc]:checked').val(),sors:$('input:radio[name=fabric]:checked').val(),type:"detail"},
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
});
	</script>

<br>
	<table id="fab">
	<thead>
	<tr>
		      <td class="total-line">Choose :</td>
		      <td class="total-value balance" clospan="2">&nbsp;&nbsp;<input type="radio" id="shf" name="fabric" value="shirting" > Shirting</input>&nbsp;<input id="suf" type="radio" name="fabric" value="suiting"> Suiting</input></td>
		  </tr>
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
		<textarea style="width: 70px; height: 15px;" placeholder="Size Count" class="" id="s<?php echo $descsize[$i]['size'][$j];?>" name="size[]"></textarea>
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

	</table
	<?php
}
?>