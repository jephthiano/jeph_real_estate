<?php
//GENERAL FUNCTIONS STARTS
//classes auto load starts
spl_autoload_register(function ($className){
 $className = str_replace('..','',$className); //to removes .. so as to ensure that it is not used by attacker to get to above folder
 require_once(file_location('inc_path','classes/'.$className.'.cla.php'));
});
//classes auto load ends

//close connection function starts
function closeconnect($connectionType='',$connectionVar=''){
	if(@$connectionType === "db"){
		return @$connectionVar = null;
	}elseif(@$connectionType === "stmt"){
		return @$connectionVar = null;
	}elseif(@$connectionType === "curl"){
		return curl_close(@$connectionVar);
	}
}
//close connection function ends

// decode output starts
function decode_data($data){$data = htmlspecialchars_decode($data);return $data;}
//decode output ends

//page not available starts
function page_not_available($type="full"){
	?>
	<br>
	<center>
   <div class=""style="font-family: Roboto,sans-serif;width: 100%;"">
        <p class="j-text-color1">
            Sorry, the page you are looking for is not available, page may have been deleted, link may have been broken or you may not have access to the content<br><br>
            <a href="<?=file_location('home_url','')?>"class="j-btn j-bolder j-color1 j-text-color4 j-round-large">
             Back to home
            </a>
        </p>
    </div>
	</center>
	<?php
 require_once(file_location('inc_path','js.inc.php')); //js
}
//page not available ends

// trigger error starts
function trigger_error_manual($error=404){http_response_code($error);require_once(file_location('home_path','error/index.php'));die();}
// trigger error starts

//redirection starts
function redirection($type){
 if($type === 'reload'){?><center><div class='j-text-color1 j-xlarge'style='margin-top: 50px;'>Error loading page<br><a href='' class='j-color1 j-round-xlarge j-large j-text-color4 j-btn'>Reload</a></div></center><?php
 }elseif($type === 'redirect'){header("location:".file_location('home_url',''));}
}
//redirection ends

//add random number starts
function addnum($data){$first_four = rand(1,9).rand(1,9).rand(1,9).rand(1,9);$last_three = rand(1,9).rand(1,9).rand(1,9);return strrev($first_four.$data.$last_three);}
//add random number ends
	
//remove random number starts
function removenum($data){return strrev(substr(substr($data,3),0,-4));}
//add random number ends

//text length start
function text_length($data,$length,$type='see_more'){
 if(strlen($data) > $length){
  if($type === 'see_more'){
   $data = substr($data,0,$length)."...<i class='j-text-color5'>See More</i>";
  }elseif($type === 'no_dot'){
   $data = substr($data,0,$length);
  }else{
   $data = substr($data,0,$length)."...";
  }  
 }
  return $data;
 }
//text length ends

//function convert to line break starts
function convert_2_br($data){$data2 = str_replace(array("\r\n","\r","\n"),"<br>",$data);echo $data2;}
//function convert to line break ends

//icon starts
function icon($data,$type='fas'){return $type.' fa-'.$data;}
//icon ends

//s/n starts
function s_n(){static $x = 1;echo $x;$x++;}
//s/n ends

// regex starts
function regex($type,$data){
 if($type === 'email'){
  $reg = "/^[\w.-]*@[\w.-]+\.[A-Za-z]{2,6}$/";
 }elseif($type === 'word_comma'){ //for languages and co
  $reg = "/^[\w]*\,?\ ?[\w]*\,?\ ?[\w]*\,?\ ?[\w]*\,?\ ?$/";
 }elseif($type === 'word_space'){
  $reg = "/^[a-zA-Z ]*$/";
 }elseif($type === 'word_number_nospace'){
  $reg = "/^[a-zA-Z0-9]*$/";
 }elseif($type === 'phonenumber'){
  $reg = "/^\+?[\d]{11,17}$/";
 }elseif($type === 'skill'){ // for word . ' - @ 
  $reg = "/^[\w .'-@]+$/";
 }elseif($type === 'sql_date'){
  $reg = "/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/";
 }elseif($type === 'account_number'){
  $reg = "/^[\d]{10}$/";
 }else{
  return false;
 }
 return preg_match($reg,$data);
}
// regex ends

//back to the top starts
function back_to_top($type=''){
 ?> <div><a class="j-color3 j-button j-right"href="#<?=$type?>"><i class="fa fa-arrow-up j-margin-right"> </i>To the top</a></div><br><br> <?php
}
//back to the top ends
//GENERAL FUNCTIONS ENDS
?>