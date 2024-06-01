<?php
//DATE AND TIME FUNCTION STARTS
//show date starts
function show_date($date,$type = 'date'){
 if($type === 'year'){
  $year = new DateTime($date.'-01');
  return $year->format('Y');
 }elseif($type === 'month'){
  $month = new DateTime($date);
  return $month->format('F Y');
 }else{
  $now = time()+(get_xml_data('time_correction'));
  $today = date("Y-m-d",$now); // today day,month and year
  $yesterday = date("Y-m-d",strtotime($today)-60*60*24); // yesterday day,month and year
  $thedate = date('Y-m-d',strtotime($date));
  if($today === $thedate){  // if same day return the time not days
    return "Today"; // ECHO TODAY
  }elseif($yesterday === $thedate){  //if yesterday return yesterday
    return "Yesterday";
  }else{
    $thedate = strtotime($date);
    return date('M d, Y',$thedate);
  }
 }//end of else
}
//show date ends

//show date starts
 function showdate($datetime,$type='full'){
	$now = time()+(get_xml_data('time_correction'));
	$thedate = strtotime($datetime);
	if($type === "short"){ //return in full format for short
		return date('M d, Y',$thedate);
	}else{ // else return in full format
		return date('M d, Y : g:i a',$thedate);	
	}
 }
//show date ends

//show time starts
function show_time($time){
 $time = new DateTime($time);
 return $time->format('g:ia');
}
//show time ends

//show date starts
 function showdate2($datetime,$type){
	$now = time();
	$thedate = strtotime($datetime);
	$interval = $now-$thedate;
	if($interval < 60){ // if less than 60seconds return in second
		return $interval. " sec ago";
	}elseif($interval >= 60 AND $interval < (60*60)){ // if less than 60 min return in minute
		return floor($interval/60). " min ago";
	}elseif($interval >= (60*60) AND $interval < (60*60*24)){ // if less than 1day return in hours
		return floor($interval/(60*60)). " hr ago";
	}elseif($interval >= (60*60*24) AND $interval < (60*60*24*2)){ //if less than 2days return in day
		return floor($interval/(60*60*24)). " day ago";
	}elseif($interval >= (60*60*24*2) AND $interval < (60*60*24*7)){ //if less than 2days and less than 7 days return in days
		return floor($interval/(60*60*24)). " days ago";
	}elseif($interval >= (60*60*24*7) AND $interval < (60*60*24*14)){ //if greater than 7days  and less than 2 weeks return in week
		return floor($interval/(60*60*24*7)). " week ago";
	}elseif($interval >= (60*60*24*14) AND $interval < (60*60*24*30)){ //if greater than 2 weeks and less than 30days return in weeks
		return floor($interval/(60*60*24*7)). " weeks ago";
	}elseif($interval >= (60*60*24*30) AND $interval < (60*60*24*60)){ //if greater than 1month and less than 2months return in month
		return floor($interval/(60*60*24*30)). " month ago";
	}elseif($interval >= (60*60*24*60) AND $interval < (60*60*24*365)){ //if greater than 2months and less than one year return in months
		return floor($interval/(60*60*24*30)). " month ago";
	}elseif($type === "short"){ //return in full format for short
		return date('jS, M Y',$thedate);
	}else{ // else return in full format
		return date('g:i a - jS, M Y',$thedate);	
	}
 }
//show date ends

//check time validity starts
function time_validity($duration,$starttime='',$endtime=''){
 if(empty($endtime)){
  $end_time = time();
 }else{
  $end_time = strtotime($endtime);
 }
 $total_time = strtotime($starttime)+$duration;
 if($total_time < $end_time){ // if total_time has not expired (i.e less than now)
  return true;
 }else{
  return false;
 }
}
//check time validity starts

//check if date data is valid starts
function is_date_valid($data){
 if(strtotime($data)){return true;}else{return false;}
}
//check if date data is valid ends
// DATE AND TIME FUNCTION ENDS
?>