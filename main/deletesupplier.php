<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM supplier_table WHERE supplier_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>