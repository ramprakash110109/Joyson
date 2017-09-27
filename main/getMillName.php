<?php
$mid=$_REQUEST['id'];
include('../connect.php');
	$result = $db->prepare("SELECT * FROM supplier_table where supplier_id='".$mid."'");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$m=explode('#',$row['mill_name']);
			for($l=0;$l<count($m);$l++){
				if($m[$l]!=""){
	?>
		<option value="<?php echo $m[$l];?>"><?php echo $m[$l]; ?></option>
		<?php
			}
		}
	}
	?>