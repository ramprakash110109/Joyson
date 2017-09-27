<?php
include('../connect.php');

$a = $_POST['Name'];
$b = $_POST['Address'];
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
$z=$_POST['tele'];
// query
$sql = "INSERT INTO contractor_table (contractor_name,address,contact1_name,contact1_mobile,contact2_name,contact2_mobile,due,website,email,pan,bank,account_no,ifsc_code,tin,tele) VALUES (:a,:b,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:x,:z)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,'o'=>$o,':p'=>$p,':x'=>$x,':z'=>$z));
header("location: contractor.php");


?>