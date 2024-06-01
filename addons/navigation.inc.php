<nav id="nav"title='<?=ucwords(get_xml_data('company_name'))?> Navigation'class="j-bar j-animate-left j-home-padding j-hide-small j-hide-medium j-color1 j-text-color4"style="position:sticky;top:0;margin:0px;font-size:12px;z-index:1;height:60px;overflow:hidden;">
		<?php //code for large screen ?>
			<a href="<?= file_location('home_url','');?>"class="j-bar-item j-large j-text-color3 j-bolder"style=''>J<span class='j-xxlarge j-itallic'>R</span>E</a>
			<?php // search for large ?>
			<span class="j-bar-item j-hide-small"style='padding:13px 10px 0px 30px;'>
				<input type="search"name="txtsearch"id="txtsearch"class="searchinput j-input j-small j-border j-border-color1 j-round"
					   onsearch="sb($('#txtsearch').val(),$('#sel').val());"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="display:inline;width:300px"/>
				<select name='sel'id='sel'class='j-round j-select j-border-color1'style='display:inline;max-width:70px;'>
					<option class='j-large'value='property'>Property</option><option class='j-large'value='blog'>Blog</option>
				</select>
				<span class="j-large j-clickable j-padding j-round j-color4 j-text-color1"id="search" style="padding: 0px 0px;position:relative;top:3px;left:0px;"
					onclick="sb($('#txtsearch').val(),$('#sel').val());">
					<i class="<?= icon('search');?>"></i>
				</span>
			</span>
			<div class="j-right j-large j-text-color3">
				<a href="<?= file_location('home_url','property/');?>" class="j-bar-item j-button j-padding-16">Property</a>		
				<a href="<?= file_location('home_url','blog/');?>" class="j-bar-item j-button j-padding-16"style='margin-right:50px;'>Blog</a>
				<div style='display:inline;'class=''>
					<a href="<?= file_location('home_url','misc/about_us/');?>" class="j-bar-item j-button j-padding-16">About Us</a>
					<a href="<?= file_location('home_url','misc/contact_us/');?>" class="j-bar-item j-button j-padding-16">Contact Us</a>
				</div>
			</div>
</nav>
<?// code for small and medium screen ?>
<nav id="nav"title='<?=ucwords(get_xml_data('company_name'))?> Navigation'class="j-bar j-animate-left j-hide-large j-hide-xlarge j-color1"style="position:sticky;top:0;margin:0px;font-size:12px;z-index:1;height:60px;">
	<a href="<?= file_location('home_url','');?>"class="j-bar-item j-padding j-large j-text-color3 j-bolder"style=''>J<span class='j-xxlarge j-itallic'>R</span>E</a>
	<span style='padding-top:10px;'>
		<a  id="mo" href="javascript:void(0)" class="j-hide-medium j-text-color3 j-bar-item j-right j-xlarge"style='background-color:'onclick="ad()">&#9776;</a>
		<span id='srht'class="j-text-color3 j-bar-item j-padding-16 j-right"onclick="n('nav',$('#nav'),$('#sp'))">
			<i class="j-large <?=icon('search')?>"></i>
		</span>
	</span>
	<div class="j-hide-small j-large j-text-color3 j-right"style='margin-right: 20px;'>
		<a href="<?= file_location('home_url','property/');?>" class="j-bar-item j-button j-padding-16">Property</a>		
		<a href="<?= file_location('home_url','blog/');?>" class="j-bar-item j-button j-padding-16"style='margin-right:50px;'>Blog</a>
		<a href="<?= file_location('home_url','misc/about_us/');?>" class="j-bar-item j-button j-padding-16">About Us</a>
		<a href="<?= file_location('home_url','misc/contact_us/');?>" class="j-bar-item j-button j-padding-16">Contact Us</a>
	</div>
	<div id="a" class="j-bar-block j-sidebar j-collapse j-animate-top j-bolder j-color1 j-text-color3 clickable j-hide-medium"style="max-height:250px;right:0;top:60px;display:none">
		<a href="<?= file_location('home_url','property/');?>"style=""class="j-text-color3 j-bar-item j-button j-padding-16">Property</a>
		<a href="<?= file_location('home_url','blog/');?>"style=""class="j-text-color3 j-bar-item j-button j-padding-16">Blog</a>
		<a href="<?= file_location('home_url','misc/about_us/');?>"style=""class="j-text-color3 j-bar-item j-button j-padding-16">About Us</a>
		<a href="<?= file_location('home_url','misc/contact_us/');?>"style=""class="j-text-color3 j-bar-item j-button j-padding-16">Contact Us</a>
	</div>
	<?php // search for small ?>
	<div id='sp'class="j-card-4 j-color4 j-fixed-top j-animate-top"style="margin:0px;font-size:12px;z-index:1;height:60px;width:100%;display:none;">
		<input type="search"name="txtsearch2"id="txtsearch2"class="searchinput j-input j-small j-round j-border-0 j-color4 j-text-color3"
			onsearch="sb($('#txtsearch2').val(),$('#sel2').val());"onkeyup="sc($('#txtsearch2'),$('#search2'));"placeholder="Search <?=ucwords(get_xml_data('company_name'))?>"style="width:64%;height:inherit;display:inline;"/>
		<select name='sel2'id='sel2'class='j-select j-color4 j-border-color1'style='display:inline;max-width:70px;'>
			<option class='j-large'value='property'>Property</option><option class='j-large'value='blog'>Blog</option>
		</select>
		<span id="search2"class="j-right j-text-color1"style="position:relative;top:3px;left:0px;width:10%;height:inherit;padding-top:5px;">
			<span class='j-xlarge'onclick="n('sea',$('#nav'),$('#sp'))">&times</span>
		</span>
	</div>
</nav>