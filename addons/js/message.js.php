<?php //MESSAGE JS STARTS ?>
<?php if(php_self('/index.php','home') || (isset($second_column) && $second_column === 'set')){ ?>
<?php //subscribe ?>
$(document).ready(function(){
$('#subform').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Subscribing');
$.ajax({type:'POST',url:dar+"act/insub/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while sending message,try again'));r_b('Subscribe');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('.ip').val('');}$('#st').html(r_m2(s.message));};r_b('Subscribe');});alertoff();
})
})
<?php }?>
<?php if(php_self('/misc/contact_us.enc.php','home')){ ?>
<?php //insert message ?>
$(document).ready(function(){
$('#inmsfrm').on('submit',function(event){event.preventDefault();$('.mg').html('');loading('Sending Message');
$.ajax({type:'POST',url:dar+"act/im/",data:$(this).serialize(),cache:false,dataType:'JSON'})
.fail(function(e,f,g){$('#st').html(r_m2('Sorry!!!<br>Error occurred while sending message,try again'));r_b('Send Message');})
.done(function(s){if(s.status === 'error'){for(let x in s.errors){$('#'+x).html(s.errors[x]);}}else{if(s.status === 'success'){$('.ip').val('');}$('#st').html(r_m2(s.message));};r_b('Send Message');});alertoff();
})
})
<?php }?>