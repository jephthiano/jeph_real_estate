<?php // share this story ?>
<?php
if($share_type === 'property_bottom'){
 ?>
 <div>
  <div class='j-bolder j-text-color1'>Share this Property</div>
  <span class="j-button j-tiny j-card-4 j-color1 j-round"onclick="$('#sharemodal').show();">SHARE <i class="<?=icon('share-alt')?>"></i></span>
 </div>
 <br>
 <?php
}elseif($share_type === 'property_top'){
 ?>
 <div>
  <span class="j-button j-tiny j-card-4 j-color1 j-round"onclick="$('#sharemodal').show();">SHARE <i class="<?=icon('share-alt')?>"></i></span>
 </div>
 <br>
 <?php
}else{
 ?>
 <div>
  <div class='j-bolder j-text-color1'>Share this Article</div>
  <span class="j-button j-tiny j-card-4 j-color1 j-round"onclick="$('#sharemodal').show();">SHARE <i class="<?=icon('share-alt')?>"></i></span>
 </div>
 <br>
 <?php
}
?>