<div class='j-home-padding'>
	<br>
	<div class="j-row">
		<div class="j-col l8 s12">
			<div class='j-color4 j-container'>
				<?php
				if($id === false){
					page_not_available();
				}else{
					$title = content_data('news_table','n_title',$id,'n_id');
					?>
					<div class="j-large"style=""><h3 title="<?=ucfirst($title)?>"><b><?=ucfirst($title)?></b></h3></div>
						<div class='j-display-container'style="width:98%;max-height:300px;padding: 0px 0px 0px 0px;">
						<img  class=''src="<?=file_location('media_url',get_media('news',$id))?>"alt="<?=ucfirst($title)?> Image"style="width:100%;max-height:inherit;">
						<span class='j-color3 j-text-color4 j-display-bottomleft j-padding'><b><?=show_date(content_data('news_table','n_regdatetime',$id,'n_id'))?></b></span>
						</div>
						<div style='line-height:30px;'>
						<div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph1',$id,'n_id'))))?></div>
						<?php show_advert('main')?>
						<?php
						if(!empty(content_data('news_table','n_paragraph2',$id,'n_id'))){
						?><div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph2',$id,'n_id'))))?></div><?php
						show_advert('main');
						}
						if(!empty(content_data('news_table','n_paragraph3',$id,'n_id'))){
						?><div class=''style="padding:0px;"><?=convert_2_br(ucfirst((content_data('news_table','n_paragraph3',$id,'n_id'))))?></div><?php
						show_advert('main');
						}
						?>
						</div>
					<?php
					$share_type = 'blog';require_once(file_location('inc_path','share_this_story_button.inc.php'));//share this story button
					require_once(file_location('inc_path','share_modal.inc.php')); //share modal
					$headline = 'More Stories';
					require_once(file_location('inc_path','blog/blog_more_stories.inc.php')); //more stories
					require_once(file_location('inc_path','blog/blog_add_comment_trigger_and_comment_input.inc.php'));//add comment trigger and comment input
					?>
					<div id='cmtsec'>
						<?php get_comment_section($id);// comment counter and comment section?>
					</div>
					<?php
				}
				?>
			</div>
			<br>
		</div>
		<div class="j-col l4 s12"><?php require_once(file_location('inc_path','blog/blog_second_column.inc.php'));?></div>
	</div>
	<?php back_to_top() //back to the top?>
</div>