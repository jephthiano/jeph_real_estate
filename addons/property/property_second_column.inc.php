<div class=''>
    <div class='j-hide-small j-hide-medium'>
        <div class='j-color4'style='margin-bottom:16px;line-height:30px;'>
            <div class="j-container j-padding j-color3"><h4>Make appointment with us</h4></div>
            <div class='j-padding-small'>
                <div>You can make appointment with us by calling us or by clicking the appointment button.</div>
                <a href="tel:<?=get_json_data('phonenumber','about_us')?>"><div class='j-color4 j-border j-border-color1 j-btn j-round'style='width:100%;'>Call Us</div></a>
                <div class='j-itallic j-bolder j-center j-margin-small'>OR</div>
                <div class='j-color1 j-btn j-round'style='width:100%;'onclick="$('#appointment_modal').fadeIn('slow');">Make Appointment</div>
            </div>
        </div>
    </div>
    <div class='j-color4'style='margin-bottom:16px;'>
        <div class="j-container j-padding j-color3"><h4>How It Works</h4></div>
        <div>
            <?php
			$data = [
                     "Browse Property"=>"Browse wide range of properties and select your preference",
                     "Book Appointment"=>"Book an appointment with us and we will connect with you",
                     "Inspect"=>"Come for inspection and seal the deal"
                     ];
			foreach($data AS $key=>$val){
				?>
				<div class='j-padding-small'>
                    <div>
                        <span class='j-text-color1 j-bolder'style='margin-right:5px;'>>></span>
                        <span class='j-large j-bolder j-text-color1'><?=$key?></span>
                    </div>
                    <div style='padding-left:29px;'class='j-text-color3'>
                        <?=$val?>
                    </div>
                </div>
				<?php
			}
			?>
        </div>
    </div>
    <div class='j-color4'style='margin-bottom:16px;'>
        <?php
        //for similar properties
        $headline = 'Similar Properties';$page_type = 'item page';
        require_once(file_location('inc_path','property/property_more_properties.inc.php')); //more stories
        ?>
    </div>
</div>