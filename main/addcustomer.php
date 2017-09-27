<script type="text/JavaScript" src='mystate.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	.error{
		color:red;
		width:200px;
		margin-right: 100px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		
		//$('#submit-btn').disabled(); 

		function mailchk() {  
		var emailaddressVal = $("#email").val();
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          if(emailaddressVal.length !=0){
         if(!emailReg.test(emailaddressVal)) {
         	$("#email-error").remove();
            $("#email").after('<span class="error" id="email-error" style="width:200px;">Please enter your email address.</span>');
           return false;
            
        }
        else{
        	 $("#email-error").remove();
        	 return true;

        }
      }else{
           $("#email-error").remove();
           return true;

        }
	  }

	  function pinchk() {  
		var pinVal = $("#pincode").val();
          var pinReg = /^[1-9][0-9]{5}$/;
         if(!pinReg.test(pinVal)) {
           $("#pincode-error").remove();
            $("#pincode").after('<span class="error" id="pincode-error" style="width:200px;">Pincode contains only numbers.</span>');
           	return false;
        }
        else{
        	 $("#pincode-error").remove();
        	 return true;
        }

	}

	function  mobile1chk() {  
		var mobile1Val = $("#mobile1").val();
          var mobile1Reg = /^\d{10}$/;
         if(!mobile1Reg.test(mobile1Val)) {
         	$("#mobile1-error").remove();
            $("#mobile1").after('<span class="error" id="mobile1-error" style="width:200px;">Invalid Mobile number.</span>');
            return false;
        }
        else{
        	 $("#mobile1-error").remove();
        	 return true;
        }

	}
	function mobile2chk() {  
		var mobile2Val = $("#mobile2").val();
          var mobile2Reg = /^\d{10}$/;
         if(!mobile2Reg.test(mobile2Val)) {
         	$("#mobile2-error").remove();
            $("#mobile2").after('<span class="error" id="mobile2-error" style="width:200px;">Invalid Mobile number.</span>');
           return false;
        }
        else{
        	 $("#mobile2-error").remove();
        	  return true;
        }

	}
	  $('#email').change(mailchk);
	 
	  //$('#pincode').change(pinchk);
	  
	  //$('#mobile1').change(mobile1chk);
	  
	  //$('#mobile2').change(mobile2chk);

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
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<div class="span4" id="ac">
<span style="width:110px; height:25px;">Customer Name : </span><input type="text" style="width:255px; height:30px;" name="Name" placeholder="Customer Name" Required/><br>
<span style="width:110px; height:25px;">Address : </span><textarea style="height:125px; width:255px;" name="Address" placeholder="Address" Required></textarea><br>
<span style="width:110px; height:25px;">Website : </span><input type="text" style="width:255px; height:30px;" name="Website" placeholder="Website" /><br>
<span style="width:110px; height:25px;">Email : </span><input type="text" style="width:255px; height:30px;" name="Email" placeholder="Email" id="email" /><br>
<span style="width:110px; height:25px;">Landline : </span><input type="tel" style="width:255px; height:30px;" name="tele" placeholder="Telephone" id="tele"/><br>

</div>
<div class="span4" id="ac">
<span style="width:110px; height:25px;">Contact1 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Name" placeholder="Name" Required/><br>
<span style="width:110px; height:25px;">Contact1 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Mobile" placeholder="Mobile" id="mobile1" Required/><br>
<span style="width:110px; height:25px;">Contact2 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Name" placeholder="Name" /></textarea><br>
<span style="width:110px; height:25px;">Contact2 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Mobile" placeholder="Mobile" id="mobile2"/><br>
</div>
<div id="ac" class="span4">
<span >Due: </span><input type="number" style="width:255px; height:30px;" name="Due" placeholder="Due"/><br>
<div style="float:right; margin-right:10px;margin-top: 300px;"><br>
<button class="btn btn-success btn-block btn-large" id="submit-btn"style="width:257px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>