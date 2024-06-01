<?php
// DEVICE AND LOCATION FUNCTION STARTS

//get ip address starts
function get_ip_address(){
 $geolocation = @unserialize(file_get_contents("https://ip-api.com/php/"));
	if($geolocation && $geolocation['status'] === 'success'){
  $ip_address = $geolocation['query'];
 }else{
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){ // shared network
   $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ // proxy network
   $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
   $ip_address = $_SERVER['REMOTE_ADDR'];
  }
 }
	return $ip_address;
}
//get ip address ends
// DEVICE AND LOCATION FUNCTION ENDS
?>