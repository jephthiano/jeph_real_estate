<div class='j-home-padding'>
	<br>
	<div class="j-row">
		<div class="j-col l8 s12 j-padding-flexible">
			<div class=''>
				<?php
				if($id === false){
					page_not_available();
				}else{
					$title = (content_data('property_table','p_title',$id,'p_id'));
					$price = content_data('property_table','p_price',$id,'p_id');
					$location = ucwords(content_data('property_table','p_location',$id,'p_id'));
					$city = content_data('property_table','p_city',$id,'p_id');
					$state = content_data('property_table','p_state',$id,'p_id');
					$condition = ucwords(content_data('property_table','p_condition',$id,'p_id'));
					$furnished = ucwords(content_data('property_table','p_furnished',$id,'p_id'));
					$property_size = ucwords(content_data('property_table','p_property_size',$id,'p_id'));
					$facilities = content_data('property_table','p_facilities',$id,'p_id');
					?>
					<div class='j-display-container j-border'style='height:200px;width:100%;'>
						<span class='j-display-topright'><?php $share_type = 'property_top';require(file_location('inc_path','share_this_story_button.inc.php'));//share this story button?></span>
						<?php require_once(file_location('inc_path',"property/property_image.inc.php"));?>
					</div>
					<div>

					</div>
					<div class='j-card-2 j-round j-text-color7'>
						<div class=''style='padding:20px 8px 10px 8px;'>
							<div class='j-text-color7 j-bolder j-xlarge'style='line-height:25px;margin-bottom:10px;'><?=$title?></div>
							<div class=''>
								<span class='j-bolder j-text-color1 j-large'style='margin-right:30px;'>₦<?=money($price,'no decimal')?></span>
								<span class=''><i class='<?=icon('map-marker-alt')?>' style='margin-right:6px'></i> <span><?=ucwords($city.', '.$state)?></span></span>
							</div>
						</div>
						<div class='j-center j-padding-small j-border-bottom j-border-color5'style='padding:20px 0px;'>
							<div class='j-row j-hide-large j-hide-xlarge'>
								<div class='j-col s6 j-padding-small'>
									<a href="tel:<?=get_json_data('phonenumber','about_us')?>"><div class='j-color4 j-border j-border-color1 j-btn j-round'style='width:100%;'>Call Us</div></a>
								</div>
								<div class='j-col s6 j-padding-small'onclick="$('#appointment_modal').fadeIn('slow');">
									<div class='j-color1 j-btn j-round'style='width:100%;'>Make Appointment</div>
								</div>
							</div>
						</div>
						<div class='j-row j-center j-padding'style='line-height:35px;margin-top:20px;'>
							<?php
							$type = content_data('property_table','p_type',$id,'p_id');
							$bedroom = content_data('property_table','p_bedroom',$id,'p_id');
							$bathroom = content_data('property_table','p_bathroom',$id,'p_id');
							$parking_space =  content_data('property_table','p_parking_space',$id,'p_id');
							$data = ["home"=>$type,"ban"=>$bedroom." Bedrooms","user"=>$bathroom." Bathrooms","users"=>$parking_space];
							foreach($data AS $icon => $value){
							?><div class='j-col s3'><span><i class='j-xlarge <?=icon($icon)?>'></i></span><br><span class='j-small'><?=$value?></span></div><?php }
							?>
						</div>
					</div>
					<div class='j-padding-small j-card-2 j-round j-text-color7 j-small'style='margin-top:15px;line-height:23px;'>
						<div class='j-row'>
						<div class='j-col s6 l3'><div><?=$location?></div><div class='j-text-color5 j-bolder'>PROPERTY ADDRESS</div></div>
						<div class='j-col s6 l3'><div><?=$condition?></div><div class='j-text-color5 j-bolder'>CONDITION</div></div>
						<div class='j-col s6 l3'><div><?=$furnished?></div><div class='j-text-color5 j-bolder'>FURNISHING</div></div>
						<div class='j-col s6 l3'><div><?=$property_size?></div><div class='j-text-color5 j-bolder'>PROPERTY SIZE</div></div>
						</div>
					</div>
					<div class='j-padding-small j-card-2 j-round j-text-color7'style='margin-top:15px;'>
						<div class='j-text-color1'style="margin-bottom:10px;">Facilities</div>
						
						<?php
						$facilities = explode(',',$facilities);
						foreach($facilities AS $facility){?><div class='j-color5 j-padding-small j-round j-section'style='margin:5px;display:inline-block;'><?=$facility?></div><?php }
						?>
					</div>
					<div class='j-padding-small j-card-2 j-round j-text-color7'style='margin-top:15px;'>
					<div><?=convert_2_br(content_data('property_table','p_details',$id,'p_id'))?></div>
					</div>
					<br>
					<?php
					$share_type = 'property_bottom';require(file_location('inc_path','share_this_story_button.inc.php'));//share this story button
					require_once(file_location('inc_path','share_modal.inc.php')); //share modal
				}
				?>
			</div>
		</div>
		<div class="j-col l4 s12 j-padding-flexible"><?php require_once(file_location('inc_path','property/property_second_column.inc.php'));?></div>
	</div>
	<?php
	back_to_top(); //back to the top
	other_modal('appointment',$id);
	?>
</div>