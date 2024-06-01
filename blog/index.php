<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
//for meta
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "BLOG | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','blog/');
$keywords = get_json_data('keywords','about_us').'|'.$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name;?></title>
<script async src="https://static.addtoany.com/menu/page.js">//AddToAny js cdn</script></head>
<body id="body" class="j-color4" style="font-family:Roboto,sans-serif;">
	<?php
	$article_data = ['page_load','navigation','blog/blog_home_data','footer','js'];
	foreach($article_data AS $article_datum){ require_once(file_location('inc_path',"$article_datum.inc.php")); }
	?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>">//AddToAny js plugins</script>
</body>
</html>