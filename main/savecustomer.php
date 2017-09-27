<?php
session_start();
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
$m=$_POST['tele'];
// query
$sql = "INSERT INTO customer_table (customer_name,address,contact1_name,contact1_mobile,contact2_name,contact2_mobile,due,website,email,tele) VALUES (:a,:b,:f,:g,:h,:i,:j,:k,:l,:m)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m));
header("location: customer.php");


?>