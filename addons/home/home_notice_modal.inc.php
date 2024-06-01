<?php
$server = 'live';
if(isset($server) && $server === 'live'){
	$company = ucwords(get_xml_data('company_name'));
	$message = "
				<center class='j-large j-text-color1'><b>NOTICE</b></center><hr>
				<div class='j-text-color3 j-justify'>
					Welcome to {$company}, Please read the following carefully before using the web app. And please note that the web app may
					undergo changes at anytime.<br>
					Also please note that the infomation and media on this web application are not real nor are they true,
					they are meant for development and testing purpose<br><br>
					{$company} is a web application/website developed by Oladejo Jephthah. The Application is responsive and scalable,it has different views
					for different screen sizes.<br><br>
					This project approaches the problem of finding a real estate property within a locality through a certain real estate management firm.<br>
					It features include:<br>
					° Admin section with different admin level<br>
					° Uploading new, editing and deleting property at the admin section<br>
					° Browsing new property by user<br>
					° Users can make appointment on property that entice them<br>
					° Blog section<br>
					° Comment can be added on blog<br>
					° Articles can be shared on other platform with just a click<br>
					° Many more features.<br><br>
					You can now proceed to surf the foundation website application, thanks for your time.<br><br>
					If You need one or any other web application for your project or business, please visit my portfolio<br>
					<center><a href='https://jephthiano.000webhostapp.com'target='_blank'class='j-btn j-color1 j-round-large'>Visit Porfolio</a><center>
				</div>
				";
	?>
	<section id='notice_modal'class='j-modal'>
		<div class='j-card-4 j-modal-content j-color4 j-boder'style='width:96%;max-width:600px;'>
			<div class='j-padding'><?=$message?></div>
			<center class='j-padding'>
				<div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick=$('#notice_modal').hide();>
					Close
				</div>
				<br>
			</center>
		</div>
	</section>
	<?php
}
?>