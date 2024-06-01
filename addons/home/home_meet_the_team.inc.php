<section id='meet_the_team'class="j-home-padding j-color6 j-text-color3"title='<?=ucwords(get_xml_data('company_name'))?> Meet The Team'>
	<div class='j-color6'style='padding:25px 0px;'>
		<div>
			<div class='j-bolder j-text-color1 j-center j-xlarge'>MEET OUR INTELLIGENT AND EFFECTIVE TEAM</div>
			<div class='j-text-color3 j-center j-large'>Our team are working effectively to make your experience an interesting one</div>
		</div>
		<div style='margin-top: 20px;'>
			<div class='j-row'>
				<?php
				$or = multiple_content_data('team_table','t_id','','',"ORDER BY t_id LIMIT 3");
				if($or === false){
					?><div class='j-center j-text-color3'>Team members are not available at the moment</div><?php
				}else{
					foreach($or AS $id){
						?>
						<div class='j-col s12 m4 j-padding'><?=get_team($id)?></div>
						<?php
					}
				}
				?>
			</div>
			<br>
			<a href='<?=file_location('home_url','misc/meet_the_team/')?>'><center><div class='j-btn j-color1 j-round j-text-color4'>SEE ALL TEAM</div></center></a>
		</div>
	</div>
</section>