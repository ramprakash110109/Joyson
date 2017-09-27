<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
 <script type="text/JavaScript" src='mystate.js'></script>


 <style type="text/css">
body {counter-reset:section;}
.count:before
{
counter-increment:section;
content:counter(section);
}
</style>
<form action="savesupplier.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div class="span4" id="ac">
<span> Agent Name : </span><input type="text" style="width:255px; height:30px;" name="AgentName" placeholder="Agent Name" Required/><br>
 
<div id="ac">
	<div >
<table class="form-table" id="customFields">
	<tr valign="top">
		<td scope="row"><span>Mill Name :</span></td>
		<td>
			&nbsp;<input type="text" class="code" style="width:170px; height:30px;" id="customFieldName" name="millName[]" value="" placeholder="Mill Name" Required/>
			&nbsp;<a href="javascript:void(0);" class="addCF">Add</a>
		</td>
	</tr>
</table>
</div>
</div>
 <!-- <div id="m">
<table id="milltlp">
  <tfoot>
      <tr><th><input type="button" value="+ Mills" id="addmill"></th></tr>
  </tfoot>
  <tbody id="detail">
    <tr>
      <td class="count"></td>
       <td><span> Mill Name: </span>
		<input class="millq" type="text"  style="width:170px; height:30px;" name="mill[name][]" placeholder="Mill Name" Required>
		</td>
       <td><input type="button" value="-" id="remove"></td>
    </tr>
  </tbody>
</table>
</div>
-->
<span> Address : </span><textarea style="height:50px; width:255px;" name="Address" placeholder="Address"></textarea><br>
<span> State : </span><select id="listBox" name="State" onchange='selct_district(this.value)'></select>
<br>
<span> District : </span><select name="District" id='secondlist'></select><br>

<span> Pincode : </span><input type="text" style="width:255px; height:30px;" name="Pincode" placeholder="Pincode"/><br>
<span> Website : </span><input type="text" style="width:255px; height:30px;" name="Website" placeholder="Website"/><br>
<span> Email : </span><input type="text" style="width:255px; height:30px;" name="Email" placeholder="Email"/><br>
</div>
<div class="span4" id="ac">
<span >Contact1 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Name" placeholder="Name"/><br>
<span >Contact1 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact1_Mobile" placeholder="Mobile"/><br>
<span >Contact2 Name: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Name" placeholder="Name"/></textarea><br>
<span >Contact2 Mobile: </span><input type="text" style="width:255px; height:30px;" name="Contact2_Mobile" placeholder="Mobile"/><br>
</div>
<div class="span4" id="ac">
<span >TIN : </span><input type="text" style="width:255px; height:30px;" name="tin" placeholder="TIN"/><br>
<span >PAN: </span><input type="text" style="width:255px; height:30px;" name="pan" placeholder="PAN"/><br>
<span >Bank Name: </span><input type="text" style="width:255px; height:30px;" name="bank" placeholder="Bank name"/><br>
<span >Bank A/C No: </span><input type="text" style="width:255px; height:30px;" name="ac" placeholder="A/c number"/><br>
<span >IFSC Code: </span><input type="text" style="width:255px; height:30px;" name="ifsc" placeholder="IFSC Code"/><br>
<span >Due: </span><input type="text" style="width:255px; height:30px;" name="Due" placeholder="Due"/><br>
<div style="float:right; margin-right:10px;">
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
	$(".addCF").click(function(){
		$("#customFields").append('<tr valign="top"><td scope="row"><span>Mill Name: </span></td><td>&nbsp;<input type="text" class="code" style="width:170px; height:30px;" id="customFieldName" name="millName[]" value="" placeholder="Mill Name" Required/> &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	});
    $("#customFields").delegate('.remCF','click',function(){
        $(this).parent().parent().remove();
    });
});

</script>
