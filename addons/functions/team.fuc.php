<?php
//TEAM FUNCTION STARTS
//get team starts
function get_team($id,$type='home'){
 $name = content_data('team_table','t_name',$id,'t_id','','null');
 ?>
  <div class='j-color4 j-round j-card-4 j-display-container'style="height:320px;background-image:url('<?=file_location('media_url',get_media('team',$id))?>');background-size:cover;"title="<?=$name?> Team">
   <div class='j-display-bottommiddle j-padding-large j-round'style='width:100%;background-color:rgba(0,0,0,0.9);'>
    <div class='j-bolder j-large j-center j-text-color4'><?=ucwords($name);?></div>
    <div class='j-medium j-center j-text-color4'><?=ucwords(content_data('team_table','t_position',$id,'t_id','','null'));?></div>
   </div>
  </div>
 <?php
}
//get team ends
//TEAM FUNCTION ENDS
?>