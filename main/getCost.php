<?php
$type=$_REQUEST['type'];
if($type=="qty"){
$cid=$_REQUEST['cid'];
$desc=$_REQUEST['desc'];
$size=$_REQUEST['size'];
$sors=$_REQUEST['sors'];
$qty=$_REQUEST['qty'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM costing_table WHERE customer_id='".$cid."' AND description='".$desc."' AND size='".$size."'");
$result->execute();
$count = $result->rowCount();
$rqty=0.0;
if($count!=0){
	$row = $result->fetch();
	if($sors=='shirting'){
			$rqty=$qty*$row['shirting_qty'];
			 echo $rqty;
		}
	else{
			$rqty=$qty*$row['suiting_qty'];
			echo $rqty;
	}
	}
}
else
{
	$cid=$_REQUEST['cid'];
	$desc=$_REQUEST['desc'];
	$sors=$_REQUEST['sors'];
	include('../connect.php');
$result = $db->prepare("SELECT * FROM costing_table WHERE customer_id='".$cid."' AND description='".$desc."'");
$result->execute();
$count = $result->rowCount();
if($count!=0){
	$row = $result->fetch();
	if($sors=='shirting'){
			 $detail=getDetail($row['shirting']);
			 $post_data = json_encode($detail);
			 echo $post_data;
		}
	else{
			$detail=getDetail($row['suiting']);
			 $post_data = json_encode($detail);
			 echo $post_data;
	}
	}

}
function getDetail($fid){
	include('../connect.php');
$result = $db->prepare("SELECT * FROM fabric_table WHERE f_id='".$fid."'");
$result->execute();
$count = $result->rowCount();
$detail = array();
if($count!=0){
	$row = $result->fetch();
		$detail['millname']=$row['mill_name'];
		$detail['designno']=$row['design_no'];
		return $detail;
		}
	else{
		return $detail;	
	}
}
?>