<?php
//MODAL FUNCTION STARTS
//other modal starts
function other_modal($type,$id=''){
 if($type === 'filter'){
 ?>
 <!--project modal starts-->
 <section id='filter_modal'class='j-modal'>
		<div class='j-card-4 j-modal-content dm4 j-color4 j-round'style='width:96%;max-width:600px;'>
   <?php filter_select(1,$id); ?>
			<center class='j-padding'>
				<div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick="$('#filter_modal').fadeOut('slow')";>Close</div><br>
			</center>
		</div>
	</section>
	<!--project modal ends-->
 <?php
 }elseif($type === 'appointment'){
 ?>
   <div class='j-color1 j-text-color4 j-padding j-large'>Fix an appointment with us</div>
   <div>
    <form id='fxapfrm'method='POST'class='j-padding'>
     <label class="j-large j-text-color7"><b>Name:</b> <span class='j-text-color1 mg'id='nme'>*</span></label>
						<input type="text"class="ip j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Name"maxlength='70'name="nm"id="nm"value=""style="width:100%;"/><br>
      
      <label class="j-large j-text-color7"><b>Email:</b> <span class='j-text-color1 mg'id='eme'>*</span></label>
						<input type="email"class="ip j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Email"maxlength='70'name="em"id="em"value=""style="width:100%;"/><br>
      
      <label class="j-large j-text-color7"><b>Mobile Number:</b> <span class='j-text-color1 mg'id='phe'>*</span></label>
						<input type="tel"class="ip j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Mobile Number"maxlength='11'name="ph"id="ph"value=""style="width:100%;"/><br>
      
      <label class="j-large j-text-color7"><b>Date:</b> <span class='j-text-color1 mg'id='dte'>*</span></label>
						<input type="date"class="ip j-input j-medium j-border-2 j-border-color5 j-round"name="dt"id="dt"value=""style="width:100%;"/><br>
      
      <label class="j-large j-text-color7"><b>Time:</b> <span class='j-text-color1 mg'id='tme'>*</span></label>
						<input type="time"class="ip j-input j-medium j-border-2 j-border-color5 j-round"name="tm"id="tm"value=""style="width:100%;"/><br>
      
      <label class="j-large j-text-color7"><b>Message:</b> <span class='j-text-color1 mg'id='mse'>*</span></label>
      <textarea class="ip j-input j-medium j-border-2 j-border-color5 j-round"placeholder="Message"name="ms"id="ms"value=""style="width:100%;"></textarea><br>
      
     <input type="hidden"name="ipd"value="<?=addnum($id)?>"/>
     <button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round j-bolder j-padding"style='width:100%;'>Fix Appointment</button>
    </form>
   </div>
			<center class='j-padding'>
				<div class='j-clickable j-text-color1 j-round j-border j-border-color1 j-padding'style='width:100%'onclick="$('#appointment_modal').fadeOut('slow')";>Close</div><br>
			</center>
		</div>
	</section>
	<!--project modal ends-->
 <?php
 }
}
//other modal ends
//MODAL FUNCTIONS ENDS
?>