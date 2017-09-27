<?php
session_start();
include('../connect.php');

$a=$_POST['agent'];
$b = $_POST['description'];
$c = $_POST['supplier'];
$d = $_POST['length'];
$f = $_POST['design_no'];
$g = $_POST['price'];
$h = $_POST['qty'];
$j=$_POST['sname'];
$k=$_POST['type'];

$flag=false;
$image;
if(getimagesize($_FILES['image']['tmp_name'])!=FALSE)
{
	$flag=true;
	$image=addslashes($_FILES['image']['tmp_name']);
	$image=file_get_contents($image);
	$image=base64_encode($image);
}

// query
if($flag)
{
$sql = "INSERT INTO fabric_table (f_description,supplier_id,f_width,design_no,f_rate,stock,image,supplier_name,mill_name,type) VALUES (:b,:c,:d,:f,:g,:h,:image,:j,:a,:k)";
$q = $db->prepare($sql);
$q->execute(array(':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':g'=>$g,':h'=>$h,':image'=>$image,':j'=>$j,':a'=>$a,':k'=>$k));
}
else
{
	$sql = "INSERT INTO fabric_table (f_description,supplier_id,f_width,design_no,f_rate,stock,supplier_name,mill_name,type) VALUES (:b,:c,:d,:f,:g,:h,:j,:a,:k)";
$q = $db->prepare($sql);
$q->execute(array(':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':g'=>$g,':h'=>$h,':j'=>$j,':a'=>$a,':k'=>$k));
}
if($k=='woven')
header("location: wfabric.php");
else
header("location: kfabric.php");

?>