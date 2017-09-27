<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM accessories WHERE acc_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>