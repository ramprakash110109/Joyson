<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM costing_table WHERE costing_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>