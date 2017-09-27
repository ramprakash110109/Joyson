<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
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
$sql = "UPDATE kcosting_table  SET customer_id=?,customer_name=? ,description=?, size=?,cutting=?, singer=?, trimming=?, ironing=?, power_table=?,printing=?,embroidery=?,price=?,profit=?,cost=?,shirting=?,shirting_qty=?,suiting=?,suiting_qty=?,trims=?,trims_qty=?,image=? WHERE costing_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$e,$d,$f,$g,$h,$i,$j,$k,$X,$l,$m,$_REQUEST['fab']['name'][0],$_REQUEST['fab']['qty'][0],$_REQUEST['fab']['name'][1],$_REQUEST['fab']['qty'][1],$trimsset,$trimsqtyset,$image,$id));
}
else
{
$sql = "UPDATE kcosting_table  SET customer_id=?,customer_name=? ,description=?, size=?,cutting=?, singer=?, trimming=?, ironing=?, power_table=?,printing=?,embroidery=?,price=?,profit=?,cost=?,shirting=?,shirting_qty=?,suiting=?,suiting_qty=?,trims=?,trims_qty=? WHERE costing_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$e,$d,$f,$g,$h,$i,$j,$k,$X,$l,$m,$_REQUEST['fab']['name'][0],$_REQUEST['fab']['qty'][0],$_REQUEST['fab']['name'][1],$_REQUEST['fab']['qty'][1],$trimsset,$trimsqtyset,$id));

}
header("location: kcosting.php");
?>