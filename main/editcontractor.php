<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM contractor_table WHERE contractor_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcontractor.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Contractor</h4></center><hr>
<div class="span4" id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span style="width:110px; height:30px;">Contractor Name : </span><input type="text" style="width:255px; height:30px;" name="Name" placeholder="Contractor Name" value="<?php echo $row['contractor_name']; ?>" Required/><br>
<span style="width:110px; height:30px;">Address : </span><textarea style="height:50px; width:255px;" name="Address" placeholder="Address" ><?php echo $row['address']; ?></textarea><br>
<span style="width:110px; height:30px;">Website : </span><input type="text" style="width:255px; height:30px;" name="Website" placeholder="Website" value="<?php echo $row['website']; ?>"/><br>
<span style="width:110px; height:30px;">Email : </span><input type="text" style="width:255px; height:30px;" name="Email" placeholder="Email" value="<?php echo $row['email']; ?>"/><br>
<span style="width:110px; height:30px;">Landline: </span><input type="text" style="width:255px; height:30px;" name="tele" placeholder="Phone" value="<?php echo $row['tele']; ?>"/><br>
</div>
<div class="span4" id="ac">
<span style="width:110px; height:30px;">Contact1 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Name" placeholder="Name" value="<?php echo $row['contact1_name']; ?>"/><br>
<span style="width:110px; height:30px;">Contact1 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Mobile" placeholder="Mobile" value="<?php echo $row['contact1_mobile']; ?>"/><br>
<span style="width:110px; height:30px;">Contact2 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Name" placeholder="Name" value="<?php echo $row['contact2_name']; ?>"/></textarea><br>
<span style="width:110px; height:30px;">Contact2 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Mobile" placeholder="Mobile" value="<?php echo $row['contact2_mobile']; ?>"/><br>
<span style="width:110px; height:30px;">TIN : </span><input type="text" style="width:255px; height:30px;" name="tin" placeholder="TIN" value="<?php echo $row['tin']?>"/><br>
<span style="width:110px; height:30px;">PAN: </span><input type="text" style="width:255px; height:30px;" name="pan" placeholder="PAN" value="<?php echo $row['pan']?>"/><br>
</div>
<div class="span4" id="ac">
<span style="width:110px; height:30px;">Bank Name: </span><input type="text" style="width:255px; height:30px;" name="bank" placeholder="Bank name" value="<?php echo $row['bank']?>"/><br>
<span style="width:110px; height:30px;">Bank A/C No: </span><input type="text" style="width:255px; height:30px;" name="ac" placeholder="A/c number" value="<?php echo $row['account_no']?>"/><br>
<span style="width:110px; height:30px;">IFSC Code: </span><input type="text" style="width:255px; height:30px;" name="ifsc" placeholder="IFSC Code" value="<?php echo $row['ifsc_code']?>"/><br>
<span style="width:110px; height:30px;">Due: </span><input type="text" style="width:255px; height:30px;" name="Due" placeholder="Due" value="<?php echo $row['due']; ?>"/><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>