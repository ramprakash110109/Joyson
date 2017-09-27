<?php
include('../../connect.php');
$c=$_REQUEST['customer'];
$result = $db->prepare("SELECT * FROM accessories where customer_id='".$c."'");
$result->execute();
$count = $result->rowCount();
if($count!=0){
for($i=0; $row = $result->fetch(); $i++){
?>
<tr class="item-row">
		      <td class="item-name count"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td >
		      <input type="hidden" name="acc_id[]" value="<?php echo $row['acc_id']; ?>"></input>
		      <textarea class="description" name="item[name][]"><?php echo $row['item']."-".$row['size']; ?></textarea>
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
		      <td colspan="5" align="center">  <a href="../accessories.php" style="color:red;">Accessories not Found clik here to add accessories</a>
		      </td>
</tr>
<?php
}
?>