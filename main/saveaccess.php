<?php
session_start();
include('../connect.php');

$a=$_POST['customer'];
$b = $_POST['cname'];
$c = $_POST['supplierid'];
$d = $_POST['sname'];
$e= $_POST['item'];
$f = $_POST['quality'];
$g = $_POST['design'];
$h = $_POST['size'];
$j=$_POST['aprice'];
$k=$_POST['fcharge'];
$l=$_POST['profit'];
$m=$_POST['rate'];
$n=$_POST['stock'];
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
$sql = "INSERT INTO accessories (customer_id,customer_name,supplier_id,supplier_name,item,quality,design,size,price,freight,profit,cost,stock,image) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:j,:k,:l,:m,:n,:image)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':image'=>$image));
}
else
{
	$sql = "INSERT INTO accessories (customer_id,customer_name,supplier_id,supplier_name,item,quality,design,size,price,freight,profit,cost,stock) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:j,:k,:l,:m,:n)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n));
}
header("location: accessories.php");


?>