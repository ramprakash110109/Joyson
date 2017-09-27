<?php
include('../connect.php');
$z = $_POST['AgentName'];
$a = $_POST['millName'];
$b = $_POST['Address'];
$c = $_POST['District'];
$d = $_POST['State'];
$e = $_POST['Pincode'];
$f = $_POST['Contact1_Name'];
$g = $_POST['Contact1_Mobile'];
$h = $_POST['Contact2_Name'];
$i = $_POST['Contact2_Mobile'];
$j = $_POST['Due'];
$k=$_POST['Website'];
$l=$_POST['Email'];
$m =$_POST['pan'];
$n =$_POST['bank'];
$o =$_POST['ac'];
$p =$_POST['ifsc'];
$x =$_POST['tin'];
// query
$millnameset='';
for($w=0;$w<count($a);$w++)
{
	$millnameset.=$a[$w].'#';
}
$sql = "INSERT INTO supplier_table (mill_name,supplier_name,address,district,state,pincode,contact1_name,contact1_mobile,contact2_name,contact2_mobile,due,website,email,pan,bank,account_no,ifsc_code,tin) VALUES (:a,:z,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:x)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$millnameset,':z'=>$z,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,'o'=>$o,':p'=>$p,':x'=>$x));
header("location: supplier.php");


?>