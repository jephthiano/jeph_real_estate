<div class='j-home-padding'style='margin:20px 0px;min-height:350px;'>
	<?php
	$or = multiple_content_data('category_table','c_id','','',"ORDER BY c_id ASC");
	if($or === false){
		?><div class='j-text-color7 j-padding j-center'>No category at the moment</div><?php
	}else{
		?>
		<div class='j-row'>
			<?php
			foreach($or AS $id){
				$category = content_data('category_table','c_category',$id,'c_id');
				?>
				<a href="<?=file_location('home_url','property/property?ct='.addnum($id))?>">
				<div class='j-col l6'style='margin-bottom:10px;'>
					<div class=''style='width:20%;display:inline-block;'>
						<img src="<?=file_location('media_url',get_media('category',$id))?>"alt="<?=$category?> Image"class="j-round"style="width:100%;height:60px;">
					</div>
					<div class='j-padding j-display-container'style='width:75%;display:inline-block;'>
						<div>
							<span><?=$category;?></span><br><span class='j-text-color5'>
							<?php $total_property = get_numrow('property_table','c_id',$id,'return','no round')?>
								<?=$total_property?> <?= ($total_property > 1) ? "properties" : "property";?>
							</span>
						</div>
						<span class='j-text-color5 j-bolder j-display-right'>&#10095</span>
					</div>
				</div>
				</a>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>