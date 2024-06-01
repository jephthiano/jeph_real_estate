<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
//require_once(file_location('inc_path','all_tables.inc.php')); // create all tables
if(strstr(file_location('home_url',''),'000webhostapp')){$server = 'live';}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "HOME | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','');
$keywords = get_json_data('keywords','about_us').'|'.$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"title='<?=ucwords(get_xml_data('company_name'))?> Home'class="j-color4"style="font-family:Roboto,sans-serif;"onload="sD(1)">
	<?php
	$home_data = ['page_load','home/home_header','navigation','home/home_section','home/home_how_it_works','home/home_buy_sell_rent_lease','home/home_why_choose_us','home/home_latest_deal','home/home_blog',
				  'home/home_testimonial','home/home_meet_the_team','home/home_subscribe','footer','home/home_notice_modal','js'];
	foreach($home_data AS $home_datum){ require_once(file_location('inc_path',"$home_datum.inc.php")); }
	?>
</body>
</html>