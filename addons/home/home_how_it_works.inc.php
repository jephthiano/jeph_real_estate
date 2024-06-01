<section id='how_it_works'title='<?=ucwords(get_xml_data('company_name'))?> How It Works'class="j-home-padding j-color4 j-text-color3">
	<div class='j-center j-bolder j-large j-text-color1'style='margin-top:20px;'>HOW IT WORKS</div>
	<div class='j-center j-text-color3 j-large'>Get a Property with the following 3 steps</div>
	<br>
	<center>
		<div class='j-row'style='position:relative;'>
			<?php // the line?>
			<div class='j-color1'style='height:4px;width:15%;position:absolute;left:26%;top:45px'></div>
			<div class='j-color1'style='height:4px;width:15%;position:absolute;right:26%;top:45px;'></div>
			<?php
			$data = ["search"=>"Browse Property","calendar-alt"=>"Book Appointment","glasses"=>"Inspect"];
			foreach($data AS $key=>$val){
				?>
				<div class='j-col s4'>
					<div class='j-color4 j-round-large j-card-4 j-display-container j-margin'style='height:70px;width:70px;'>
						<div class='j-text-color1 j-xxlarge j-display-middle'><i class='<?=icon("$key")?>'></i></div>
					</div>
					<div>
						<div class='j-bolder j-text-color3 j-padding'><?=$val?></div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class='j-row'style='margin-top:5px;'>
			<?php
			$data = ["Browse wide range of properties and select your preference","Book an appointment with us and we will connect with you","Come for inspection and seal the deal"];
			foreach($data AS $val){
				?>
				<div class='j-col s4'>
					<span class='j-text-color3'><?=$val?></span>
				</div>
				<?php
			}
			?>
		</div>
	</center>
	<br><br>
</section>