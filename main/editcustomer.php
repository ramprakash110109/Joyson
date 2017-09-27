<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer_table WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<style type="text/css">
	.error{
		color:red;
		width:200px;
		margin-right: 100px;
	}
</style>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(document).ready(function(){
		
		//$('#submit-btn').disabled(); 

		function mailchk() {  
			//alert('hai');
		var emailaddressVal = $("#email").val();
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         if(!emailReg.test(emailaddressVal)) {
         	$("#email-error").remove();
            $("#email").after('<span class="error" id="email-error" style="width:200px;">Please enter your email address.</span>');
           return false;
            
        }
        else{
        	 $("#email-error").remove();
        	 return true;

        }
      }

        $('#email').change(mailchk);

        $('#submit-btn').click(function(event){
	  	if(mailchk()){
	  		$('#target').submit();

	  	}
	  	else{
       // alert(mailchk());alert(pinchk());alert(mobile1chk());alert(mobile2chk());alert( pinchk());
       
	  		event.preventDefault();
      }
	  });
    });

</script>

<form id="tartget"action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac" class="span4">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span style="width:110px; height:25px;">Customer Name : </span><input type="text" style="width:255px; height:30px;" name="Name" placeholder="Customer Name" value="<?php echo $row['customer_name']; ?>" Required/>
<span style="width:110px; height:25px;">Address : </span><textarea style="height:125px; width:255px;" name="Address" placeholder="Address" Required><?php echo $row['address']; ?></textarea><br>


<span style="width:110px; height:25px;">Website : </span><input type="text" style="width:255px; height:30px;" name="Website" placeholder="Website" value="<?php echo $row['website']; ?>"/><br>
<span style="width:110px; height:25px;">Email : </span><input type="text" id="email" style="width:255px; height:30px;" name="Email" placeholder="Email" value="<?php echo $row['email']; ?>"/><br>
<span style="width:110px; height:25px;">Landline : </span><input type="text" style="width:255px; height:30px;" name="tele" placeholder="Telephone" id="tele" value="<?php echo $row['tele']; ?>"/><br>

</div>
<div id="ac" class="span4">
<span style="width:110px; height:25px;">Contact1 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Name" placeholder="Name" value="<?php echo $row['contact1_name']; ?>"/><br>
<span style="width:110px; height:25px;">Contact1 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Mobile" placeholder="Mobile" value="<?php echo $row['contact1_mobile']; ?>"/><br>
<span style="width:110px; height:25px;">Contact2 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Name" placeholder="Name" value="<?php echo $row['contact2_name']; ?>"/></textarea><br>
<span style="width:110px; height:25px;">Contact2 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Mobile" placeholder="Mobile" value="<?php echo $row['contact2_mobile']; ?>"/><br>
</div>
<div id="ac" class="span4">
<span style="width:110px; height:25px;">Due: </span><input type="text" style="width:255px; height:30px;" name="Due" placeholder="Due" value="<?php echo $row['due']; ?>"/><br>

<div style="float:right; margin-right:10px;margin-top: 300px;">

<button class="btn btn-success btn-block btn-large" id="submit-btn" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>