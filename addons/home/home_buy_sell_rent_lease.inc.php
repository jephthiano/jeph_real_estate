<section id='buy_sell_rent_lease'title='<?=ucwords(get_xml_data('company_name'))?> Buy Sell Rent Lease'class="j-home-padding j-color5 j-text-color4">
	<div class='j-color5'style='padding:25px 0px;'>
		<div>
			<div class='j-bolder j-text-color4 j-center j-xlarge'>WHAT WE DO</div>
			<div class='j-text-color4 j-center j-large'>Whether you are buying, selling, renting or leasing, we can help you.</div>
		</div>
		<center>
			<div style='margin-top: 20px;'>
				<div class='j-row'>
					<?php
					$link2 = urlencode('I Have a Property For Sale');
					$link3 = urlencode('I Have a Property for Lease');
					$data = [
							 ["home","Buy a Property","property/","Find top notch property within your budget"],
							 ["hand-holding-usd","Sell a Property","misc/contact_us/{$link2}#message","We can help you navigate a successful sale"],
							 ["building","Lease a Property","misc/contact_us/{$link3}#message","Let help you get a client for your property"],
							 ["registered","Rent a Property","property/","Rent affordable property with us"]
							 ];
					$data_total = count($data);
					for($i = 0;$i < $data_total;$i++){
							?>
							<a href="<?=file_location('home_url',$data[$i][2])?>">
						<div class='j-col s6 m3'>
							<div class='j-color4 j-round-large j-card-4 j-display-container j-margin'style='height:70px;width:70px;'>
								<div class='j-text-color1 j-xxlarge j-display-middle'><i class='<?=icon($data[$i][0])?>'></i></div>
							</div>
							<div>
								<div class='j-bolder j-text-color4 j-padding'><?=$data[$i][1]?></div>
							</div>
							<div class='j-text-color2 j-padding'><?=$data[$i][3]?></div>
						</div>
						</a>
							<?php
					}
					?>
				</div>
			</div>
		</center>
	</div>
</section>