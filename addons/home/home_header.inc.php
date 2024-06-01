<section id='header'title='<?=ucwords(get_xml_data('company_name'))?> Header'class='j-color4 j-text-color1 j-home-padding j-hide-small j-hide-medium'style='height:45px;'>
	<div class=""style='padding-top:9px;padding-bottom:9px;'>
		<div class='j-right'>
			<span><i class='<?=icon('map-marker-alt')?>' style='margin-right:6px'></i><span><?=get_json_data('address','about_us')?></span></span>
			<span class='j-bolder j-large'style='margin-left:2px;margin-right:2px;'>|</span>
			<a href="tel:<?=get_json_data('phonenumber','about_us')?>">
			<span><i class="<?=icon('phone')?> fa-flip-horizontal" style='margin-right:4px'></i><span><?=get_json_data('phonenumber','about_us')?></span></span>
			</a>
		</div>
	</div>
</section>
<section id='header'class='j-color4 j-home-padding j-hide-large j-hide-xlarge'style='height:45px;'>
	<div class="j-text-color1"style='padding-top:9px;padding-bottom:9px;'>
		<div class='j-right'>
			<span><i class='<?=icon('map-marker-alt')?>' style='margin-right:6px'></i><span><?=get_json_data('address','about_us')?></span></span>
			<span class=' j-hide-small j-bolder j-large'style='margin-left:2px;margin-right:2px;'>|</span>
			<span class='j-hide-small'><i class="<?=icon('phone')?> fa-flip-horizontal" style='margin-right:4px'></i><span><?=get_json_data('phonenumber','about_us')?></span></span>
		</div>
	</div>
</section>