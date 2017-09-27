<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
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
$sql = "UPDATE accessories 
        SET customer_id=?,customer_name=? ,supplier_id=?, supplier_name=?,item=?, quality=?, design=?, size=?, price=?, freight=?,profit=?,cost=?,stock=?,image=?
		WHERE acc_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$j,$k,$l,$m,$n,$image,$id));
}
else
{
$sql = "UPDATE accessories 
        SET customer_id=?,customer_name=? ,supplier_id=?, supplier_name=?,item=?, quality=?, design=?, size=?, price=?, freight=?,profit=?,cost=?,stock=?
		WHERE acc_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$j,$k,$l,$m,$n,$id));
}
header("location: accessories.php");

?>