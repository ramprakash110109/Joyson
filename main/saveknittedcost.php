<html><body>
<?php
session_start();
include('../connect.php');

$a = $_REQUEST['customerid'];
$b = $_REQUEST['cname'];
$c = $_REQUEST['desc'];
$d = $_REQUEST['size'];
$e = $_REQUEST['cutting'];
$f = $_REQUEST['singer'];
$g = $_REQUEST['trimming'];
$h = $_REQUEST['ironing'];
$i = $_REQUEST['power_table'];
$j = $_REQUEST['printing'];
$k = $_REQUEST['embroidery'];
$X = $_REQUEST['ocost'];
$l = $_REQUEST['profit'];
$m = $_REQUEST['rate'];

$sql="SELECT * FROM kcosting_table where customer_name='".$b."' AND description='".$c."' AND size='".$d."'";
$result = $db->prepare($sql);
$result->execute();
$rowcount = $result->rowcount();
if($rowcount>0){
	?>
<script>alert('Record already found. Either delete or modify the existing record!');</script>
Record already found. Either delete or modify the existing record!<a href='kcosting.php'>Go Back</a>
<?php
}
else
{
$flag=false;
$image;
if(getimagesize($_FILES['image']['tmp_name'])!=FALSE)
{
	$flag=true;
	$image=addslashes($_FILES['image']['tmp_name']);
	$image=file_get_contents($image);
	$image=base64_encode($image);
}
$fabset='';
$fabqtyset='';
$trimsset='';
$trimsqtyset='';

for($i=0 ;$i < count($_REQUEST['fab']['name']); $i++) {
$fabset.=$_REQUEST['fab']['name'][$i]."#";
$fabqtyset.=$_REQUEST['fab']['qty'][$i]."#";
	}
	
for($i=0 ;$i < count($_REQUEST['trims']['name']); $i++) {
		$trimsset.=$_REQUEST['trims']['name'][$i]."#";
$trimsqtyset.=$_REQUEST['trims']['qty'][$i]."#";
	}
// query
if($flag)
{
$sql = "INSERT INTO kcosting_table(customer_id,customer_name,description,size,cutting,singer,trimming,ironing,power_table,printing,embroidery,price,profit,cost,shirting,shirting_qty,suiting,suiting_qty,trims,trims_qty,image) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:t,:l,:m,:n,:o,:p,:q,:r,:s,:image)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':t'=>$X,':l'=>$l,':m'=>$m,':n'=>$_REQUEST['fab']['name'][0],':o'=>$_REQUEST['fab']['qty'][0],':p'=>$_REQUEST['fab']['name'][1],':q'=>$_REQUEST['fab']['qty'][1],':r'=>$trimsset,':s'=>$trimsqtyset,':image'=>$image));
header("location: kcosting.php");
}
else
{
	$sql = "INSERT INTO kcosting_table(customer_id,customer_name,description,size,cutting,singer,trimming,ironing,power_table,printing,embroidery,price,profit,cost,shirting,shirting_qty,suiting,suiting_qty,trims,trims_qty) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:t,:l,:m,:n,:o,:p,:q,:r,:s)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':t'=>$X,':l'=>$l,':m'=>$m,':n'=>$_REQUEST['fab']['name'][0],':o'=>$_REQUEST['fab']['qty'][0],':p'=>$_REQUEST['fab']['name'][1],':q'=>$_REQUEST['fab']['qty'][1],':r'=>$trimsset,':s'=>$trimsqtyset));
header("location: kcosting.php");
}
}

?>
</body></html>