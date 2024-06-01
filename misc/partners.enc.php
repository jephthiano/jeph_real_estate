<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/addons/function.inc.php'); // all functions
$data = "partners";
$follow_type = 'follow';
$image_link = file_location('media_url','home/logo.png');
$image_type = substr($image_link,-3);
$page = strtoupper($data)." | ".strtoupper(get_xml_data('company_name'));
$page_name = $page." | ".get_xml_data('seo_tag');
$page_url = file_location('home_url','misc/partners/');
$keywords = get_json_data('keywords','about_us')."|".$page_name;
$description = $page_name;
?>
<!DOCTYPE html>
<html>
<head><?php require_once(file_location('inc_path','meta.inc.php'));?><title><?=$page_name?></title></head>
<body id="body"class="j-color6"style="font-family:Roboto,sans-serif;">
	<?php require_once(file_location('inc_path','page_load.inc.php')); //page load?>
	<?php require_once(file_location('inc_path','navigation.inc.php'));//navigation?>
	<div class='j-center j-misc-padding'style="margin-top:20px;">
		<div class='j-xxlarge j-text-color1 j-bolder'><?=ucwords(get_xml_data('company_name'))?></div>
		<div class='j-xlarge j-text-color3 j-bolder'><?=ucwords($data)?></div>
	</div>
	<div class='j-home-padding'>
			<div>
				<div class='j-bolder j-text-color1 j-center j-xlarge'>MEET OUR PARTNERS</div>
				<div class='j-text-color3 j-center j-large'>Our supportive partners that keep us running with their effort to serve you</div>
			</div>
			<div style='margin-top: 20px;'>
				<center>
					<div class='j-row'>
						<?php
						$or = multiple_content_data('partner_table','p_id','','',"ORDER BY p_id");
						if($or !== false){
							foreach($or AS $id){get_partner($id,'partner');}
						}else{
							?><div>No Partner at the moment, contact us to be a partner</div><?php
						}
						?>
					</div>
				</center>
			</div>
	</div>
	<br>
	<div><?php require_once(file_location('inc_path','footer.inc.php')); //footer?></div>
	<?php require_once(file_location('inc_path','js.inc.php')); //js?>
</body>
</html>