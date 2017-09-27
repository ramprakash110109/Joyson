<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM customer_table WHERE customer_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>