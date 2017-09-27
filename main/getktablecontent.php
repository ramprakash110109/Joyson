<?php
include('../connect.php');
$c=$_REQUEST['customer'];
$result = $db->prepare("SELECT * FROM kcosting_table where customer_id='".$c."'");
$result->execute();
$count = $result->rowCount();
if($count!=0){
for($i=0; $row = $result->fetch(); $i++){
?>
<tr class="item-row">
		      <td class="item-name count"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td >
		      <input type="hidden" name="costing_id[]" value="<?php echo $row['costing_id']; ?>"></input>
		      <textarea class="description" name="item[name][]"><?php echo $row['description']."-".$row['size']; ?></textarea>
		      </td>
		      <td><textarea class="cost" name="item[cost][]"><?php $c=$row['cost']; echo str_ireplace(',', '', $c); ?></textarea></td>
		      <td><textarea class="qty" name="item[qty][]">0</textarea></td>
		      <td><textarea class="price" name="item[price][]" readonly="true">0.00</textarea></td>
</tr>
<?php 
}
}
else{?>

	<tr class="item-row">
		      <td colspan="5" align="center">  <a href="costing.php" style="color:red;">Costing not Found clik here to add knitted costing.</a>
		      </td>
</tr>
<?php
}
?>