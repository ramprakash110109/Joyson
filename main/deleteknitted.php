<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM kcosting_table WHERE costing_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>