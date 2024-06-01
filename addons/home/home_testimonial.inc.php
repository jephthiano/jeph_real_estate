<section id='testimonial'class="j-home-padding j-color2 j-text-color3"title='<?=ucwords(get_xml_data('company_name'))?> Testimonials'>
	<div class='j-color2'style='padding:25px 0px;'>
		<div>
			<div class='j-bolder j-text-color3 j-center j-xlarge'>TESTIMONIALS</div>
			<div class='j-text-color3 j-center j-large'>What do customers say about us?</div>
		</div>
		<center>
		<div style='margin-top: 20px;'>
			<?php
				$or = multiple_content_data('testimonial_table','t_id','','',"ORDER BY RAND() LIMIT 10");
				if($or === false){
					?><div class='j-center j-text-color5'>Customer Testimonials are not available at the moment</div><?php
				}else{
					?>
					<?php //for large?>
					<div class='j-vertical-scroll j-hide-small'><?php foreach($or AS $id){get_testimonial($id,'large');} ?></div>
					<?php //for small?>
					<div class='j-content j-display-container j-hide-medium j-hide-large j-hide-xlarge'style='width:100%;'>
						<?php foreach($or AS $id){get_testimonial($id,'small');} ?>
						<span class="j-display-left j-btn j-text-color4"id='prev'onclick="pD(-1)"style='background-color:rgba(0,0,0,0.5);'>&#10094;</span>
						<span class="j-display-right j-btn j-text-color4"id='next'onclick="pD(1)"style='background-color:rgba(0,0,0,0.5);'>&#10095</span>
						<?php foreach($or AS $id){?> <span class='j-badge dot j-order'style='border:solid 2px black'></span> <?php } // for the indicators?>
					</div>
					<?php
				}
				?>
			
		</div>
		</center>
	</div>
</section>