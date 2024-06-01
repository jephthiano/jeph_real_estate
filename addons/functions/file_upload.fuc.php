<?php
//FILE UPLOAD STARTS
//get media starts
function get_media($type,$id){
 require_once(file_location('inc_path','connection.inc.php'));
 @$conn = dbconnect('admin','PDO');
	if($type === 'admin'){
  $sql = "SELECT am_link_name,am_extension FROM admin_media_table WHERE ad_id = :id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('am_link_name',$link_name);
  $stmt->bindColumn('am_extension',$extension);
 }elseif($type === 'category'){
  $sql = "SELECT cm_link_name,cm_extension FROM category_media_table WHERE c_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('cm_link_name',$link_name);
  $stmt->bindColumn('cm_extension',$extension);
 }elseif($type === 'partner'){
  $sql = "SELECT pm_link_name,pm_extension FROM partner_media_table WHERE p_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('pm_link_name',$link_name);
  $stmt->bindColumn('pm_extension',$extension);
 }elseif($type === 'property'){
  $sql = "SELECT pm_link_name,pm_extension FROM property_media_table WHERE pm_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('pm_link_name',$link_name);
  $stmt->bindColumn('pm_extension',$extension);
 }elseif($type === 'news'){
  $sql = "SELECT nm_link_name,nm_extension FROM news_media_table WHERE n_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('nm_link_name',$link_name);
  $stmt->bindColumn('nm_extension',$extension);
 }elseif($type === 'team'){
  $sql = "SELECT tm_link_name,tm_extension FROM team_media_table WHERE t_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('tm_link_name',$link_name);
  $stmt->bindColumn('tm_extension',$extension);
 }elseif($type === 'testimonial'){
  $sql = "SELECT tm_link_name,tm_extension FROM testimonial_media_table WHERE t_id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->bindColumn('tm_link_name',$link_name);
  $stmt->bindColumn('tm_extension',$extension);
 }else{
  return 'home/no_media.png';
 }
	$stmt->execute();
	$numRow = $stmt->rowCount();
	if($numRow > 0){
		while($stmt->fetch()){
   $file = $type.'/'.$link_name.".".$extension;
   if(file_exists(file_location('media_path',$file)) && is_file(file_location('media_path',$file))){
    return $file;
   }else{
     if($type === 'admin'){return 'home/avatar.png';}else{return 'home/no_media.png';}
   }
		}
	}else{
  if($type === 'admin'){return 'home/avatar.png';}else{return 'home/no_media.png';}
	}
 closeconnect("stmt",$stmt);
 closeconnect("db",$conn);
}
//get media ends
//FILE UPLOAD ENDS
?>