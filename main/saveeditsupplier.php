<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
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
for($i=0;$i<count($a);$i++)
{
	$millnameset.=$a[$i].'#';
}
$sql = "UPDATE supplier_table 
        SET mill_name=?,supplier_name=?, address=?, district=?, state=?, pincode=?, contact1_name=?, contact1_mobile=?,contact2_name=?,contact2_mobile=?,due=?,website=?,email=?,pan=?,bank=?,account_no=?,ifsc_code=?,tin=?
		WHERE supplier_id=?";
$q = $db->prepare($sql);
$q->execute(array($millnameset,$z,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$x,$id));
header("location: supplier.php");

?>