<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM contractor_table WHERE contractor_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>