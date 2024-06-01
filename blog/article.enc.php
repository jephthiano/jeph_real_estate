<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['title'])){// getting the value in $_GET  and assigning the value of id
	$raw_title = ($_GET['title']);
	$id = content_data('news_table','n_id',$raw_title,'n_title',"AND n_status = 'active'");
	if($id === false){trigger_error_manual(404);}
}else{
	trigger_error_manual(404);
}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url',get_media('news',$id));
$image_type = substr($image_link,-3);
$page = strtoupper($raw_title)."| ARTICLE | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','blog/article/'.$raw_title.'/');//url redirection current page
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$id === false?'Page Not Found':$page_name;?></title>
<script async src="https://static.addtoany.com/menu/page.js">//AddToAny js cdn</script></head>
<body id="body" class="j-color4" style="font-family:Roboto,sans-serif;">
	<?php
	$article_data = ['page_load','navigation','blog/article_section','footer','js'];
	foreach($article_data AS $article_datum){ require_once(file_location('inc_path',"$article_datum.inc.php")); }
	?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>">//AddToAny js plugins</script>
</body>
</html>