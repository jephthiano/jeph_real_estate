<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$page_url = file_location('home_url','product/'.$_GET['val']);;//url redirection current page
if(isset($_GET['val'])){
	$raw_val = test_input(removenum($_GET['val']));
	if(!empty($raw_val)){
		$id = content_data('property_table','p_id',$raw_val,'p_id');
		$pm_id = content_data('property_media_table','pm_id',$id,'p_id');
		$raw_title = content_data('property_table','p_title',$id,'p_id','','not available');
	}else{trigger_error_manual(404);}
}else{
	trigger_error_manual(404);
}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url',get_media('property',$pm_id));
$image_type = substr($image_link,-3);
$page = ucwords($raw_title)." | Property | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$id===false?"404 Error Not Found":$page_name?></title></head>
<script async src="https://static.addtoany.com/menu/page.js">//AddToAny js cdn</script></head>
<body id="body"class="j-color6"style="font-family:Roboto,sans-serif;">
	<?php
	$item_data = ['page_load','navigation','property/item_section','footer','js'];
	foreach($item_data AS $item_datum){ require_once(file_location('inc_path',"$item_datum.inc.php")); }
	?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>">//AddToAny js plugins</script>
</body>
</html>