<?php
//TESTIMONEY FUNCTION STARTS
//get testimonial starts
function get_testimonial($id,$type='small'){
    $name = content_data('testimonial_table','t_name',$id,'t_id','','null');
    if($type === 'small'){
        ?>
        <div class='img-slides j-card-4 j-color4 j-round-large j-hide-medium j-hide-large j-hide-xlarge j-box'style='padding:0px;width:100%;'title="<?=$name?> testimonial">
           <div class='j-display-container'style='height:200px;width:inherit'>
               <div class='j-display-left j-color5'style='width:30%;height:inherit;'class=''>
                   <img src="<?=file_location('media_url',get_media('testimonial',$id));?>"style='width:100%;height:inherit;'/>
               </div>
               <div class='j-right j-padding j-text-color3 j-box-tip'style='width:70%;height:inherit;white-space:normal;text-align:left;position:relative;'>
                   <div class='j-xxxlarge j-text-color1 j-bolder'>“</div>
                   <div class=''style='position:relative;bottom:30px;'>
                       <?=ucwords(content_data('testimonial_table','t_testimony',$id,'t_id','','null'));?>
                   </div>
                   <div class='j-bolder j-text-color1'style='position:absolute;bottom:20px;'><?=ucwords($name);?></div>
               </div>
           </div>
        </div>
        <?php
    }elseif($type === 'large'){
        ?>
        <div class='j-card-4 j-color4 j-btn j-round-large j-hide-small j-margin j-box'style='padding:0px;'title="<?=$name?> testimonial">
            <div class='j-display-container'style='height:200px;width:400px'>
                <div class='j-display-left j-color5'style='width:100px;height:inherit;'class=''>
                    <img src="<?=file_location('media_url',get_media('testimonial',$id));?>"style='width:inherit;height:inherit;'/>
                </div>
                <div class='j-right j-padding j-text-color3 j-box-tip'style='width:300px;height:inherit;white-space:normal;text-align:left;position:relative;'>
                    <div class='j-xxxlarge j-text-color1 j-bolder'>“</div>
                    <div class=''style='position:relative;bottom:30px;'>
                        <?=ucwords(content_data('testimonial_table','t_testimony',$id,'t_id','','null'));?>
                    </div>
                    <div class='j-bolder j-text-color1'style='position:absolute;bottom:20px;'><?=ucwords($name);?></div>
                </div>
            </div>
        </div>
        <?php
    }
}
//get testimonial ends
//TESTIMONEY FUNCTION ENDS
?>