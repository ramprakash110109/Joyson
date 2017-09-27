<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM fabric_table WHERE f_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>