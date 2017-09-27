<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM trim_table WHERE t_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>