<?php // more properties
if($page_type === 'item page'){
 $or = multiple_content_data('property_table','p_id','available','p_status',"AND p_id != $id ORDER BY RAND() LIMIT 12");
}else{
  $or = multiple_content_data('property_table','p_id','available','p_status',"ORDER BY RAND() LIMIT 12");
}
if($or !== false){
  ?>
  <div class="j-container j-padding j-color3"><h4><?=$headline?></h4></div>
  <div class='j-color6'>
    <?php foreach($or AS $p_id){get_property($p_id,'similar');} ?>
  </div>
  <?php
  }
?>