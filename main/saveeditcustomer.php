<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
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
$sql = "UPDATE customer_table 
        SET customer_name=?, address=?, contact1_name=?, contact1_mobile=?,contact2_name=?,contact2_mobile=?,due=?,website=?,email=?,tele=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$f,$g,$h,$i,$j,$k,$l,$m,$id));
header("location: customer.php");

?>