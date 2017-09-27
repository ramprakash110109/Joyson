<?php
	include('../connect.php');
	$fab_cost=0.0;
	$trim_cost=0.0;
	$mrp=0.0;
	$otherex=(float)$_POST['sellingcost'];
	$fn=$_POST['febname'];
	$fq=$_POST['febqty'];
	$tn=$_POST['trimname'];
	$tq=$_POST['trimqty'];

	$fabric_name=explode("#", $fn);
	$fabric_qty=explode("#", $fq);
	$trim_name=explode("#", $tn);
	$trim_qty=explode("#", $tq);

	function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}

    for($i=0 ;$i < count($fabric_name); $i++) {
    	if($fabric_name[$i]!=" " && $fabric_qty[$i]!=" "){
        	$iid = $fabric_name[$i]; 
        	$qty=	$fabric_qty[$i];
        	$result = $db->prepare("SELECT * FROM fabric_table where  f_id='".$iid."'");
			$result->execute();
			$row= $result->fetch();
			$fab_cost=$fab_cost+((float)$row['f_rate']*(float)$qty);
		}
    }

    for($i=0 ;$i < count($trim_name); $i++) {
    	if($trim_name[$i]!=" " && $trim_qty[$i]!=" "){
        	$iid = $trim_name[$i]; 
        	$qty=	$trim_qty[$i];
        	$result1 = $db->prepare("SELECT * FROM trim_table where t_id='".$iid."'");
			$result1->execute();
			$row1= $result1->fetch();
			$trim_cost=$trim_cost+((float)$row1['t_rate']*(float)$qty);
		}
    }
    $mrp=$fab_cost+$trim_cost+$otherex;
    echo formatMoney($mrp,true);
?>
