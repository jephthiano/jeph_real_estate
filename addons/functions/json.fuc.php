<?php
//JSON FUNCTION STARTS
//get json_data starts
function get_json_data($subtype,$type,$file_location='settings.json'){
 $json = file_get_contents(file_location('home_path',$file_location));
 $array = json_decode($json,true);
 return decode_data($array[$type][$subtype]);
}
//get json_data ends
//JSON FUNCTION ENDS
?>