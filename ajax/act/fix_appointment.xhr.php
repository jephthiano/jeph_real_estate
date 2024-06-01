<?php
if(isset($_POST)){
	require_once($_SERVER["DOCUMENT_ROOT"]."/addons/function.inc.php");// all functions
	$error = []; $data = [];
	
	// validating and sanitizing name
	$nam = $_POST['nm'];
	if(empty($nam)){$error['nme'] = "* Name cannot be empty";}else{$name = strtolower(test_input($nam));}
	
	// validating and sanitizing email
	$emai = $_POST['em'];
	if(empty($emai)){$error['eme'] = "* Email cannot be empty";}elseif(!regex('email',$emai)){$error['eme'] = "* Invalid email";}else{$email = strtolower(test_input($emai));}
	
	// validating and sanitizing phone number
	$ph = ($_POST['ph']);
	if(empty($ph)){$error['phe'] = "* Number cannot be empty";}elseif(!regex('phonenumber',$ph)){$error['phe'] = "* Invalid mobile number";}else{$phnumber = test_input($ph);}
	
	// validating and sanitizing message
	$mess = $_POST['ms'];
	if(empty($mess)){$error['mse'] = "* Message cannot be empty";}else{$message = test_input($mess);}
	
	// validating and sanitizing date and time
	$dat = $_POST['dt']; //date from form
	$tim = $_POST['tm']; //time from form
	$now = time()+(get_xml_data('time_correction')); //now data
	$today = date("Y-m-d",$now); //today date
	$thedate = date('Y-m-d',strtotime($dat));//converting form date
	if(empty($dat)){
		$error['dte'] = "* Date cannot be empty";
	}elseif(!is_date_valid($dat)){
		$error['dte'] = "* Invalid date";
	}elseif($today > $thedate){ //check if the day selected is before yesterday
		$error['dte'] = "* A day before current day is invalid";
	}elseif(date('w',strtotime($dat)) == 0){ //if the day is sunday
		$error['dte'] = "* Select another day, we don't work on sundays";
	}else{
		$date = ($dat);
		$dat_tim = $dat.' '.$tim;
		// validating and sanitizing time
		if(empty($tim)){
			$error['tme'] = "* Time cannot be empty";
		}elseif(!is_date_valid($tim)){
			$error['tme'] = "* Invalid time";
		}elseif(time_validity(-3600,$dat_tim)){
			$error['tme'] = "* Time should be 1 hour or more ahead of current time";
		}else{
			$time = test_input($tim);
		}
	}
	
	
	//validating and sanitising p_id
	$id = removenum($_POST['ipd']);
	if(empty($id)){$error[] = "ipd";}else{$p_id = test_input($id);}
	
	
	if(empty($error)){
		$appointment = new property('admin');
		$appointment->name = $name;
		$appointment->email = $email;
		$appointment->phnumber = $phnumber;
		$appointment->message = $message;
		$appointment->date = $date;
		$appointment->time = $time;
		$appointment->p_id = $p_id;
		$status = $appointment->fix_appointment();
		if($status === 'success'){
			$re_message = "Your inspection appointment has been book at ".show_time($time).",".show_date($date).".<br> One of our Customer Service Rep will contact you to validate the appointment.";
			$data["status"] = 'success';$data["message"] = "Thanks!!!<br>{$re_message}";
			//SEND MAIL
			$mail = new mail();
			$mail->p_receiver = get_json_data('support_email','about_us');
			$mail->p_subject = "New Appointment from {$name}";
			$mail->p_message = "<b>NAME: </b><br>{$name}<br><br><b>EMAIL: </b><br>{$email}<br><br><b>MOBILE NUMBER: </b><br>{$phnumber}<br><br><b>DATE: </b><br>{$date}<br><br><b>TIME: </b><br>{$time}<br><br><b>MESSAGE: </b><br>{$message}<br><br>";
			$mail->p_header = implode("\r\n",[
					"From:".$name." <".$email.">",
					"MIME-Version: 1.0",
					"Content-Type: text/html; charset=UTF-8"
					]);
			//$mailsent = $mail->send_mail();
		}elseif($status === 'fail'){
			$data["status"] = 'fail';$data["message"] = "Sorry!!!<br>Error occur while fixing appointment, try again later";
		}
	}else{
		$data["status"] = 'error';$data["errors"] = $error;
	}
	echo json_encode($data);
}//end of if isset
?>