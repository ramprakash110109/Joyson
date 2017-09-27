<?php
session_start();
include('../connect.php');
$b = $_POST['description'];
$c = $_POST['supplier'];
$d = $_POST['length'];
$g = $_POST['price'];
$h = $_POST['qty'];
$j=$_POST['sname'];
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
$sql = "INSERT INTO trim_table (t_description,supplier_id,t_size,t_rate,stock,image,supplier_name) VALUES (:b,:c,:d,:g,:h,:image,:j)";
$q = $db->prepare($sql);
$q->execute(array(':b'=>$b,':c'=>$c,':d'=>$d,':g'=>$g,':h'=>$h,':image'=>$image,':j'=>$j));
}
else
{
	$sql = "INSERT INTO trim_table (t_description,supplier_id,t_size,t_rate,stock,supplier_name) VALUES (:b,:c,:d,:g,:h,:j)";
$q = $db->prepare($sql);
$q->execute(array(':b'=>$b,':c'=>$c,':d'=>$d,':g'=>$g,':h'=>$h,':j'=>$j));
}
header("location: trims.php");


?>