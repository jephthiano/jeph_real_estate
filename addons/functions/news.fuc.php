<?php
//NEWS FUNCTION STARTS
//get news starts
function get_news($id,$type='home'){
 $title = content_data('news_table','n_title',$id,'n_id');
  if($type === 'home'){
   ?>
   <div class='j-col s12 m4 l4 j-padding'title="<?=$title?>">
    <div class='j-color4'style=''>
     <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=(content_data('news_table','n_imagecaption',$id,'n_id'))?> Image"class="j-round-large"style="width:100%;height:230px;">
     <div class=''style='padding:10px 0px;line-height:28px;'>
      <div class='j-bolder j-text-color5'><b><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></b></div>
      <div style='height:130px;overflow:hidden;'>
       <div class='j-large j-text-color7'style='max-height:60px;overflow:hidden;'><b><?=ucfirst($title)?></b></div>
       <div class='j-text-color3'style='max-height:60px;overflow:hidden;'><?=text_length(ucfirst((content_data('news_table','n_paragraph1',$id,'n_id'))),80,'null')?></div>
      </div>
      <a href="<?=file_location('home_url','blog/article/'.urlencode(strtolower($title)))?>" class=' j-bolder j-btn j-color4 j-text-color1 j-round-large j-border j-border-color1'>
       Read More
      </a>
     </div>
    </div>
   </div>
 <?php
 }elseif($type === 'home_preview'){
  ?>
  <div>
   <a href="<?=file_location('home_url','blog/article//'.urlencode(strtolower($title)))?>">
   <div class=''>
   <div class='j-color4 j-display-container'style="height:500px;background-image:url('<?=file_location('media_url',get_media('news',$id))?>');background-size:cover;">
    <div class='j-display-bottommiddle j-padding-large'style='width:100%;background-color:rgba(0,0,0,0.7);'>
     <div class='j-xlarge j-text-color4'><?=ucfirst(($title))?></div>
     <div class='j-bolder j-text-color5'><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></div>
    </div>
   </div>
   </div>
   </a>
  </div>
  <?php
 }elseif($type === 'home_preview2'){
  ?>
  <a href="<?=file_location('home_url','blog/article/'.urlencode(strtolower($title)))?>"style='margin:15px 0px;'>
  <div class='j-padding'title="<?=$title?>"style="">
    <div class='j-color4 j-padding-small'style=''>
     <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=(content_data('news_table','n_imagecaption',$id,'n_id'))?> Image"class=""style="width:100%;height:300px;">
     <div class=''style='padding:10px 0px;line-height:28px;'>
      <div class='j-bolder j-text-color5'><b><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></b></div>
      <div style='overflow:hidden;'>
       <div class='j-large j-text-color7'style='max-height:60px;overflow:hidden;'><b><?=ucfirst($title)?></b></div>
       <div class='j-text-color3'style='max-height:60px;overflow:hidden;'><?=text_length(ucfirst((content_data('news_table','n_paragraph1',$id,'n_id'))),120,'null')?></div>
      </div>
     </div>
    </div>
  </div>
  </a>
  <?php
 }elseif($type === 'home_add'){
  ?>
  <?php //for medium, large and xlarge screen ?>
  <div class='j-col m4 l4 j-hide-small'>
   <a href="<?=file_location('home_url','blog/article//'.urlencode(strtolower($title)))?>">
   <div class="j-color4"style='margin:0px 5px 10px 5px;height:300px;border-bottom:solid 1px #f2f2f2'>
    <center>
     <div class='j-display-container'style="width:100%;height:200px;padding: 0px 0px 0px 0px;">
      <img  class=''src="<?=file_location('media_url',get_media('news',$id))?>"alt=""style="width:100%;height:inherit;">
      <span class='j-color3 j-text-color4 j-bolder j-display-bottomleft'style='padding:5px'>
       <?=ucwords(content_data('news_table','n_category',$id,'n_id'))?>
      </span>
     </div>
    </center>
    <div class=""style='padding:8px 0px;'>
     <span class="j-text-color1 j-large j-bolder"style='line-height:20px;'><?=ucfirst($title)?></span><br>
        <span>
         <span style='margin-right:20px;'>by <b> <?=ucwords(content_data('news_table','n_source',$id,'n_id'))?></b></span>
         <span class="j-opacity j-text-color3 j-bolder"> <?=showdate(content_data('news_table','n_regdatetime',$id,'n_id'),'short')?></span>
        </span>
        <br>
    </div>
   </div>
   </a>
  </div>
  <?php //for small screen ?>
  <div class='j-hide-medium j-hide-large j-hide-xlarge'>
   <a href="<?=file_location('home_url','news/'.urlencode(strtolower(($title))))?>"style='margin:15px 0px;'>
   <div class='j-row-padding'style='margin:10px 0px;'>
    <div class='j-col s2'style='padding: 5px 0px;'>
    <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=content_data('news_table','n_imagecaption',$id,'n_id')?>"class="j-margin-right"style="width:100%;height:60px">
    </div>
    <div class='j-col s10'>
    <span class=""><?=ucfirst(($title))?></span>
    </div>
   </div>
   </a>
  </div>
  <?php
 }elseif($type === 'spotlight'){
  ?>
  <div class="j-col m6">
   <a href="<?=file_location('home_url','blog/article/'.urlencode(strtolower($title)))?>"style='margin:15px 0px;'>
   <div class='j-row'style='margin:10px 0px;'title="<?=$title?>">
   <div class='j-col s2 j-center'>
    <span class='j-xlarge j-bolder j-circle j-color5'style=";padding:8px 15px;"><?php s_n();?></span>
   </div>
    <div class='j-col s8'>
    <span class="j-bolder"style="margin-right:5px;"><?=ucfirst($title)?></span>
    </div>
    <div class='j-col s2'style='padding: 5px 0px;'>
    <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=content_data('news_table','n_imagecaption',$id,'n_id')?>"class="j-margin-right"style="width:100%;height:60px">
    </div>
   </div>
   </a>
  </div>
  <?php
  }elseif($type === 'sidebar' || $type === 'sidebar2'){
  ?>
  <a href="<?=file_location('home_url','blog/article/'.urlencode(strtolower($title)))?>"style='margin:15px 0px;'>
  <div class='j-row-padding'style='margin:10px 0px;'title="<?=$title?>">
   <div class='j-col s2'style='padding: 5px 0px;'>
   <img src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=content_data('news_table','n_imagecaption',$id,'n_id')?>"class="j-margin-right"style="width:100%;height:60px">
   </div>
   <div class='j-col s10'>
   <div class="<?=$type === "sidebar2"?"j-bolder":"";?>"style='max-height:60px;overflow:hidden;'><?=ucfirst($title)?></div>
   <?php
   if($type === "sidebar2"){
   ?><div class="j-text-color5 j-small"style="margin-top:3px;">By <?=ucwords(content_data('news_table','n_source',$id,'n_id'))?></div><?php 
   }
   ?>
   </div>
  </div>
  </a>
  <?php
  }elseif($type === 'horizontal'){
   ?>
   <div class='j-padding-small'style='display:inline-block;'title="<?=$title?>">
    <div class='j-color6 j-display-container'style='width:120px;'>
     <a href="<?=file_location('home_url','blog/article/'.urlencode(strtolower($title)))?>">
     <div style='width:100%;height:140px;'class=''>
      <img src="<?=file_location('media_url',get_media('news',$id))?>"style='width:inherit;height:inherit;'class='j-round-top'>
     </div>
     <div class='j-color4'>
      <div style='height:25px;overflow:hidden;'>
       <span class='j-text-color3 j-small'style='font-size:16px;padding-bottom:4px;padding-top:4px;'><b><?=ucfirst($title)?></b></span>
      </div>
     </div>
     </a>
    </div>
   </div>
   <?php
  }
}
//get news ends

//advert starts
function show_advert($type){
 if($type === 'sidebar'){
  ?>
  <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Advertise</h4></div>
        <div class="j-container j-color4">
            <div class="j-container j-display-container j-light-grey j-section" style="height:200px">
               <span class="j-display-middle j-large j-text-color1"><b>Advert will be shown here</b></span>
            </div>
        </div>
    </div>
  <?php
 }elseif($type === 'main'){
  ?>
  <div class="j-card j-color4" style='margin:20px 5px 20px 5px;'>
        <div class="j-container j-color4">
            <div class="j-container j-display-container j-light-grey j-section" style="height:200px">
               <span class="j-display-middle j-large j-text-color1"><b>Advert will be shown here</b></span>
            </div>
        </div>
    </div>
  <?php
 }
}
//advert ends
//NEWS FUNCTION ENDS 
?>