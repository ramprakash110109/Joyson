$(document).ready(function() {
  $('#for').change(function(){
            if($('#for').val() == 'addcustomer'){
                  window.location.href = '/joyson/main/customer.php';
                }
                else
                {
                  //to set customer name to hidden filed
                    $('#cusname').val($('#for option:selected').text());
                    $.post( 
                              "getDAS.php",
                              {customer:$('#for').val(),getf:"desc"},
                              function(data) {
                               $('#condesc').html(data);
                               $('#appx').html('');
                               //alert(data);
                              }
                        );
                }
                

        });
  $('#cutting').change(function(){
            if($('#cutting').val() == 'addcustomer'){
                  window.location.href = '/joyson/main/customer.php';
                }
                else
                {
                  //to set customer name to hidden filed
                    $('#cusname').val($('#cutting option:selected').text());
                    $.post( 
                              "getCutting.php",
                              {customer:$('#cutting').val(),getf:"desc"},
                              function(data) {
                               $('#condesc').html(data);
                               $('#appx').html('');
                               //alert(data);
                              }
                        );
                }
                

        });
  $('#from').change(function(){
            if($('#from').val() == 'addsupplier'){
                  window.location.href = '/joyson/main/supplier.php';
                }
                else
                {
                  //to set supplier name to hidden filed
                    $('#supname').val($('#from option:selected').text());
                    $.post( 
                              "getTableContent.php",
                              {customer:$('#from').val()},
                              function(data) {
                               // $('#content').html(data);
                               
                              }
                        );
                }
                

        });


/*
if ($(".delete").length < 2) $(".delete").hide();
  $('input').click(function(){
    $(this).select();
  });



   
  $("#addrow").click(function(){
    $(".item-row:last").after('<tr class="item-row"><td class="item-name count"><div class="delete-wpr">  <a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td class="description"><textarea class="cc" name="item[name][]" placeholder="Enter class Count"></textarea></td><td>Size 1 :<select id="size11" name="" style="width:130px;height: 30px" required><option value="">Select Size</option></select><textarea class="cost" name="item[cost][]" placeholder="Quantity in 70 %"></textarea></td><td>Size 2 :<select id="size21" name="" style="width:130px;height: 30px" required><option value="">Select Size</option></select><textarea class="qty" name="item[qty][]" placeholder="Quantity in 30 %"></textarea></td></tr>');
    if ($(".delete").length > 1) $(".delete").show();
    bind();
  });
  
  
  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    if ($(".delete").length < 2) $(".delete").hide();
    update_total();
    
  });*/

  
  
});