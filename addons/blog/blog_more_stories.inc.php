<?php // more stories
$or = multiple_content_data('news_table','n_id','active','n_status'," ORDER BY RAND() LIMIT 20");
if($or !== false){
  ?>
  <div class='j-color7'><div class='j-padding-small j-large'><b><?=$headline?></b></div></div>
  <div class='j-vertical-scroll j-color4'>
    <?php
    foreach($or AS $n_id){get_news($n_id,'horizontal');}
    ?>
  </div>
  <?php
  }
?>