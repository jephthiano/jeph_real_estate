<?php //GENERAL JS STARTS ?>
<?php //hide modal when page is ready ?>
$(document).ready(function(){$('#load_modal').fadeOut(300);})
const hu="<?=file_location('home_url','')?>";var dar="<?=file_location('ajax_url','')?>";
function loading(s='Loading',t='id',i='sbtn'){let vl= "<span class='j-spinner-border j-spinner-border-sm'style='margin-right:7px;'></span>"+s;if(t==='id'){$('#'+i).html(vl);$('#'+i).prop('disabled',true);}else if(t==='class'){$('.'+i).html(vl);}$('.'+i).prop('disabled',true);}
function an(str){return '936'+str+'8793'}
function rn(str){return str.substring(3).split("").reverse().join('').substring(4);}
function r_b(s='Submit',t='id',i='sbtn'){if(t==='id'){$('#'+i).html(s);$('#'+i).prop('disabled',false);}else if(t==='class'){$('.'+i).html(s);$('.'+i).prop('disabled',false);}}
alertoff();function alertoff(){setTimeout(thealert,8000);}function thealert(){$("#thealert").fadeOut('slow');}
function r_m(s){if(s.length>0){s=s;}else{s='Error running request';}return "<span class='j-text-color4 j-button alert j-color1 j-bolder j-container j-padding j-round j-fixalert'id='thealert'>"+s+"</span>";}
function r_m2(s){if(s.length>0){s=s;}else{s='Sorry!!!<br>Error occurred while running request, please try again later or reload page';}var err="<div id='return_message_modal'class='j-modal j-modal-click'><div class='j-card-4 j-modal-content j-color4 j-bolder'style='margin-top:200px;'><div class='j-padding'>"+s+"</div><center class='j-padding'><div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick=$('#return_message_modal').fadeOut('slow');>Close</div></center></div></div>";$('#st').html(err);$('#return_message_modal').fadeIn('slow');}
<?php //for notice ?>
$('#notice_modal').fadeIn('slow');
<?php //show dropdown of account?>
$('.dropdown-btn,.dropdown-content').hover(function(e){$('.dropdown-content').show();},function(e){$('.dropdown-content').hide();})
<?php //click anywhere to hide modal?>
$(document).ready(function(){let m = document.getElementsByClassName('j-modal-click');window.onclick = function(event){for(let i = 0; i < m.length; i++){if(event.target == m[i]){m[i].style.display = 'none';}}};})
<?php //hide 000webhost advert ?>
<?php if(strstr(file_location('home_url',''),'000webhostapp')){ ?>
$(document).ready(function(){$('div').last().hide();})
<?php } ?>
<?php //code for show and hide with menu and close symbol on small and medium screen ?>
function ad(){$('#a').toggle('',function(){if($('#a').is(":hidden")){$('#mo').html('&#9776');}else{$('#mo').html('&times');}});}
<?php //show and hide search textbox input onclick?>
function n(t,n,s){if(t==='nav'){n.fadeOut('slow');s.fadeIn('slow');$('#txtsearch2').focus();}else{s.fadeOut('slow');n.fadeIn('slow');}}
<?php // for show search button/ X button depnding on the number of characters in the search textbox onfocus?>
function sc(d,f){
 if(d.val().length > 0){
  f.html('<span class="j-large j-clickable j-padding j-round j-btn j-text-color1"style="position:relative;right:20px;"onclick=sb($("#txtsearch2").val(),$("#sel2").val());><i class="<?= icon('search');?>"></i></span>');
 }else{
  f.html('<span class="j-xlarge j-text-color1" onclick=n("sea",$("#nav"),$("#sp"))>&times</span>');
 }
}
<?php // for search?>
function sb(s,lc){if(s.length > 0){window.location=hu+'search/'+lc+'/'+s+'/';}}
<?php if(php_self('/index.php','home')){ ?>
<?php //slidehow//?>
var sI = 1;var s = document.getElementsByClassName("img-slides");var dot = document.getElementsByClassName("dot");var t = null;
function pD(n) {clearTimeout(t);sD(sI += n);}
function sD(n) {
  var i;
  if(n === undefined){n = ++sI}if (n > s.length) {sI = 1}if (n < 1) {sI = s.length}
  for (i = 0; i < s.length; i++) {s[i].style.display = "none";}
  for(i=0;i<dot.length;i++){dot[i].style.border = 'solid 1px gray';}
  s[sI-1].style.display = "block";
  dot[sI-1].style.border = 'solid 1px #ff9900';
  t = setTimeout(sD,5000); // Change image every 2 seconds
}
<?php //for notice ?>
$(document).ready(function(){$('#notice_modal').show();})
<?php }?>