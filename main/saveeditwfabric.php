<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a=$_POST['agent'];
$b = $_POST['description'];
$c = $_POST['supplier'];
$d = $_POST['length'];
$f = $_POST['design_no'];
$g = $_POST['price'];
$h = $_POST['qty'];
$j=$_POST['sname'];
$k=$_POST['type'];

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
$sql = "UPDATE fabric_table 
        SET f_description=?, supplier_id=?, f_width=?, design_no=?, f_rate=?, stock=?,image=?,supplier_name=?,mill_name=?,type=?
		WHERE f_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d,$f,$g,$h,$image,$j,$a,$k,$id));
}
else
{
$sql = "UPDATE fabric_table 
        SET f_description=?, supplier_id=?, f_width=?, design_no=?, f_rate=?, stock=?,supplier_name=?,mill_name=?,type=?
		WHERE f_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d,$f,$g,$h,$j,$a,$k,$id));
}
if($k=='woven')
header("location: wfabric.php");
else
header("location: kfabric.php");


?>