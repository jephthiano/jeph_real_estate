<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
//for meta
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = "PROPERTIES | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','property/property/');
$keywords = get_json_data('keywords','about_us').'|'.$page_name;
$description = $page_name;

if(isset($_GET['pg'])){
	$pag = ($_GET['pg']);
	if(!empty($pag) && is_numeric($pag)){$cur_page = $pag;}else{$cur_page = 1;}
}else{
$cur_page = 1;
}

if(isset($_GET['ct'])){
	$type = $_GET['ct'];
	if(is_numeric($type)){
		$category_id = content_data('category_table','c_id',removenum($type),'c_id');
		if($category_id === false){trigger_error_manual(404);}
		$category_query = "AND c_id = {$category_id}";
	}else{
		$category_id = 'all';
		$category_query = '';
	}
}else{
	$category_id = 'all';
	$category_query = '';
}

if(isset($_GET['st'])){
	$state = $_GET['st'];
	if($state === 'all'){
		$state_query = '';
	}else{
		$state_query = "AND p_state = '{$state}'";
	}
}else{
	$state = 'all';
	$state_query = '';
}

if(isset($_GET['cd'])){
	$condition = $_GET['cd'];
	if($condition !== 'new' && $condition !== 'used' && $condition !== 'all'){
		trigger_error_manual(404);
	}else{
		if($condition === 'all'){
			$condition_query = '';
		}else{
			$condition_query = "AND p_condition = '{$condition}'";
		}
	}
}else{
	$condition = 'all';
	$condition_query = '';
}

if(isset($_GET['fn'])){
	$furnished = $_GET['fn'];
	if($furnished !== 'furnished' && $furnished !== 'unfurnished' && $furnished !== 'all'){
		trigger_error_manual(404);
	}else{
		if($furnished === 'all'){
			$furnished_query = '';
		}else{
			$furnished_query = "AND p_furnished = '{$furnished}'";
		}
	}
}else{
	$furnished = 'all';
	$furnished_query = '';
}
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name;?></title>
<script async src="https://static.addtoany.com/menu/page.js">//AddToAny js cdn</script></head>
<body id="body" class="j-color4" style="font-family:Roboto,sans-serif;">
	<?php
	$property_data = ['page_load','navigation','property/properties','footer','js'];
	foreach($property_data AS $property_datum){ require_once(file_location('inc_path',"$property_datum.inc.php")); }
	?>
	<script async src="<?=file_location('home_url','plugins/addtoany.js')?>">//AddToAny js plugins</script>
</body>
</html>