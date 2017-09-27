<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$b = $_POST['description'];
$c = $_POST['supplier'];
$d = $_POST['length'];;
$g = $_POST['price'];
$h = $_POST['qty'];
$j=$_POST['sname'];
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
$sql = "UPDATE trim_table 
        SET t_description=?, supplier_id=?, t_size=?, t_rate=?, stock=?,image=?,supplier_name=?
		WHERE t_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d,$g,$h,$image,$j,$id));
}
else
{
$sql = "UPDATE trim_table 
        SET t_description=?, supplier_id=?, t_size=?,  t_rate=?, stock=?,supplier_name=?
		WHERE t_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$c,$d,$g,$h,$j,$id));
}
header("location: trims.php");

?>