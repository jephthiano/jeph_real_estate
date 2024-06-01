<section id='latest_deal'class="j-home-padding j-color6 j-text-color3"title='<?=ucwords(get_xml_data('company_name'))?> Latest Deal'>
	<div class='j-color6'style='padding:25px 0px;'>
		<div>
			<div class='j-bolder j-text-color3 j-center j-xlarge'>LATEST R. ESTATE DEALS</div>
			<div class='j-text-color3 j-center j-large'>Our latest available hot deals</div>
		</div>
		<div style='margin-top: 20px;'>
			<?php
			$or = multiple_content_data('property_table','p_id','available','p_status',"ORDER BY p_id DESC LIMIT 3");
			if($or === false){
				?><div class='j-text-color7 j-padding j-center'>No property at the moment, check again later</div><?php
			}else{
				?>
				<div class='j-row'>
					<?php foreach($or AS $id){get_property($id);}?>
				</div>
				<center>
					<a href="<?=file_location('home_url','property/property?ct=all')?>"class='j-btn j-color7 j-text-color4 j-round j-bolder'style='margin-top:30px;margin-left:16px;'>See More Properties >></a>
				</center>
				<?php
			}
			?>
		</div>
	</div>
</section>