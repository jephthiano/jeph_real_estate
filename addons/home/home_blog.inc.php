<section id='blog'class="j-home-padding j-color4 j-text-color3"title='<?=ucwords(get_xml_data('company_name'))?> Blog'>
	<div class='j-color4'style='padding:25px 0px;'>
		<div>
			<div class='j-bolder j-text-color3 j-center j-xlarge'>BLOG</div>
			<div class='j-text-color3 j-center j-large'>Read articles written by our experts</div>
		</div>
		<div style='margin-top: 20px;'>
			<?php
			$or = multiple_content_data('news_table','n_id','active','n_status',"ORDER BY n_id DESC LIMIT 3");
			if($or === false){
				?><div class='j-text-color4 j-padding j-center'>No news at the moment, check again later</div><?php
			}else{
				?>
				<div class='j-row'>
					<?php
					foreach($or AS $id){get_news($id);}
					
					?>
				</div>
				<a href="<?=file_location('home_url','blog/')?>"class='j-btn j-color1 j-round j-bolder'style='margin-top:30px;margin-left:16px;'>See More Blogs >></a>
				<?php
			}
			?>
		</div>
	</div>
</section>