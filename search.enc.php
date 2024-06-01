<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
if(isset($_GET['sear']) && isset($_GET['type'])){ //getting the value of the get 
	$sear = ($_GET['sear']);
	$ty = ($_GET['type']);
	if(!empty($sear) || !empty($ty)){$searchtext = $sear;$type = $ty;}else{trigger_error_manual(404);}
	if($type !== 'property' && $type !== 'blog'){trigger_error_manual(404);}
}else{
	trigger_error_manual(404);
}
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "SEARCH | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url',"search/$type/$searchtext/");//url redirection current page
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $searchtext." | ".$page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-color5"style="font-family:Roboto,sans-serif;">
	<?php
	$search_data = ['page_load','navigation','data_pagination','footer','js'];
	foreach($search_data AS $search_datum){ require_once(file_location('inc_path',"$search_datum.inc.php")); }
	?>
</body>
</html>