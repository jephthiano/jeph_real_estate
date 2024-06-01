<?php //COMMENT JS STARTS ?>
<?php if(php_self('/property/property.enc.php','home')){ ?>
<?php //applyy filter?>
function AppFil(i){var ct,st,cd,fn;ct = $('#ct'+i).val();st = $('#st'+i).val();cd = $('#cd'+i).val();fn = $('#fn'+i).val();window.location=hu+"property/property?ct="+ct+"&st="+st+"&cd="+cd+"&fn="+fn;}
<?php }?>
<?php if(php_self('/property/item.enc.php','home')){ ?>
<?php //make appointment?>
$(document).ready(function(){
$('#fxapfrm').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Fixing Appointment');
$.ajax({type:'POST',url:dar+"act/fa/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while fixing appointment,try again'));r_b('Fix Appointment');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('#appointment_modal').fadeOut('fast');$('.ip').val('');}$('#st').html(r_m2(s.message));}r_b('Fix Appointment');});
})
})
<?php }?>