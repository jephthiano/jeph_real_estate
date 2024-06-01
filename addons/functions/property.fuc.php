<?php
//PROPERTY FUNCTION STARTS
//get property starts
function get_property($id,$type='home'){
 $title = content_data('property_table','p_title',$id,'p_id');
 $price = content_data('property_table','p_price',$id,'p_id');
 $p_id = content_data('property_media_table','pm_id',$id,'p_id');
 $city = content_data('property_table','p_city',$id,'p_id');
 $location = content_data('property_table','p_location',$id,'p_id');
  if($type === 'home' || $type === 'property'){
   ?>
   <a href="<?=file_location("home_url","property/item/".addnum($id)."/")?>">
   <div class='j-col s12 <?=($type === 'property')?"m6":"m4";?> j-padding'>
   <div class='j-color6 j-border-2 j-border-color5 j-round-large'style=''>
				<img src="<?=file_location('media_url',get_media('property',$p_id))?>"alt="<?=$title?> Image"class="j-round-large"style="width:100%;height:230px;">
				<div class=''style='padding:10px 5px;line-height:28px;'>
     <div class='j-bolder j-text-color1'>₦<?=money($price,'no decimal')?></div>
     <div style='height:65px;overflow:hidden;'>
      <div class='j-text-color7'style='max-height:30px;overflow:hidden;'><b><?=ucfirst(decode_data($title))?></b></div>
      <div class='j-text-color5'style='max-height:30px;overflow:hidden;'>
       <i class='<?=icon('map-marker-alt')?>' style='margin-right:6px'></i> <span><?=ucwords($location.', '.$city)?></span>
      </div>
     </div>
				</div>
			</div>
   </div>
   </a>
 <?php
 }elseif($type === 'horizontal'){
      ?>
      <div class='j-padding-small'style='display:inline-block;'title="<?=$title?>">
       <div class='j-color6 j-display-container'style='width:140px;'>
        <a href="<?=file_location('home_url','property/item/'.addnum($id))?>">
        <div style='width:100%;height:140px;'class=''>
         <img src="<?=file_location('media_url',get_media('property',$p_id))?>"style='width:inherit;height:inherit;'class='j-round-top'>
        </div>
        <div class='j-color4 j-padding-small'>
         <div style='height:25px;overflow:hidden;'>
          <span class='j-text-color3 j-small'style='font-size:16px;padding-bottom:4px;padding-top:4px;'><?=ucfirst(decode_data($title))?></span>
         </div>
        </div>
        </a>
       </div>
      </div>
    <?php
 }elseif($type === 'similar'){
  ?>
  <div class='j-color4'title="<?=$title?>"style='margin:10px 0px;border-bottom:solid #ff9900 3px;'>
  <a href="<?=file_location('home_url','property/item/'.addnum($id))?>">
  <div class='j-row'style='padding-bottom:3px;'>
   <div style='height:100px;'class='j-col s4'>
    <img src="<?=file_location('media_url',get_media('property',$p_id))?>"style='width:100%;height:inherit;'class='j-round-top'>
   </div>
   <div class='j-col s8 j-padding-small j-display-container'>
    <div style='height:90px;overflow:hidden;'>
     <div class='j-text-color3 j-small'style='max-height:35px;overflow:hidden;'><?=ucfirst(decode_data($title))?></div>
     <div class='j-bolder j-text-color1'>₦<?=money($price,'no decimal')?></div>
     <div class='j-text-color5 j-padding-small j-display-bottomleft'style='max-height:30px;overflow:hidden;'>
       <i class='<?=icon('map-marker-alt')?>' style='margin-right:6px'></i> <span><?=ucwords($location.', '.$city)?></span>
      </div>
    </div>
   </div>
  </div>
  </a>
  </div>
  <?php
 }
}
//get property ends

//filter select starts
function filter_select($num,$select_array){
 $sel_category_id = strtolower($select_array[0]);
 $sel_state = strtolower($select_array[1]);
 $sel_condition = strtolower($select_array[2]);
 $sel_furnished = strtolower($select_array[3]);
 ?>
 <div>
  <div class='j-color1 j-text-color4 j-padding j-large'>Filter</div>
  <div class=''>
   <div class='j-padding'>
    <div class='j-text-color7 j-bolder'>Category</div>
    <select name='ct<?=$num?>'id='ct<?=$num?>'class='j-select'style='width:100%;line-height:50px;'>
     <option value='all' <?=($sel_category_id === 'all')?"selected":"";?>>All Category</option>
     <?php
     $category_id_array = multiple_content_data('category_table','c_id','','',);
     if($category_id_array !== false){
      foreach($category_id_array as $category_id){
       $category = content_data('category_table','c_category',$category_id,'c_id');
       ?><option value='<?=addnum($category_id)?>' <?=($sel_category_id == $category_id)?"selected":"";?>><?=$category?></option><?php
      }
     }
     ?>
    </select>
   </div>
   <div class='j-padding'>
    <div class='j-text-color7 j-bolder'>State</div>
    <select name='st<?=$num?>'id='st<?=$num?>'class='j-select'style='width:100%;line-height:50px;'>
     <option value='all' <?=($sel_state === 'all')?"selected":"";?>>All States</option>
     <?php
     $state_array = multiple_content_data('property_table','p_state','','','','unique');
     if($state_array !== false){
      foreach($state_array as $state){
       $state = strtolower($state);
       ?><option value='<?=($state)?>' <?=($sel_state == ($state))?"selected":"";?>><?=ucwords($state)?> State</option><?php
      }
     }
     ?>
    </select>
   </div>
   <div class='j-padding'>
    <div class='j-text-color7 j-bolder'>Condition</div>
    <select name='cd<?=$num?>'id='cd<?=$num?>'class='j-select'style='width:100%;line-height:50px;'>
     <option value='all' <?=($sel_condition === 'all')?"selected":"";?>>All Conditions</option>
     <option value='new' <?=($sel_condition === 'new')?"selected":"";?>>New</option>
     <option value='used' <?=($sel_condition === 'used')?"selected":"";?>>Used</option>
    </select>
    </div>
   <div class='j-padding'>
    <div class='j-text-color7 j-bolder'>Furnished</div>
    <select name='fn<?=$num?>'id='fn<?=$num?>'class='j-select'style='width:100%;line-height:50px;'>
     <option value='all' <?=($sel_furnished === 'all')?"selected":"";?>>All</option>
     <option value='furnished' <?=($sel_furnished === 'furnished')?"selected":"";?>>Furnished</option>
     <option value='unfurnished' <?=($sel_furnished === 'unfurnished')?"selected":"";?>>Unfurnished</option>
    </select>
   </div>
   <div class='j-padding'><div class='j-btn j-color1 j-round'style='width:100%'onclick="AppFil(<?=$num?>);">Apply</div></div>
  </div>
 </div>
 <?php
}
//filter select ends
//PROPERTY FUNCTION ENDS 
?>