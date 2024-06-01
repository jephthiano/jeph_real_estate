<div class='j-color1 j-text-color4 j-btn j-right j-round j-hide-large j-hide-xlarge j-margin j-padding'onclick="$('#filter_modal').fadeIn('slow');">Filter</div>
<?php
$select_array = [$category_id,$state,$condition,$furnished];
other_modal('filter',$select_array);
?>
<div class='j-home-padding'style='margin:20px 0px;min-height:350px;'>
	<div class='j-row'>
		<?php //filter for large and xlarge?>
		<div class='j-col l3 j-hide-small j-hide-medium'>
			<?php filter_select(2,$select_array); ?>
		</div>
		<div class='j-col l9'>
			<?php
			//TOTAL_PAGE STARTS
			// creating connection
			require_once(file_location('inc_path','connection.inc.php'));
			@$conn = dbconnect('admin','PDO');
			$display = 20; // number of records to show per page
			$total_records = get_numrow('property_table','p_id','null',"return",'no round',"$category_query $state_query $condition_query $furnished_query",'not');
			if($total_records > $display){ // if the number of record is more than the displayed num(10)
				$total_pages = ceil($total_records / $display);
			}else{ // if the number of record is not more than the displayed num(10)
				$total_pages = 1;
			}
			
			// getting the current page and where to start
			if(isset($cur_page) && is_numeric($cur_page) && $cur_page > 0){ // for other pages other than first page
				$current_page =  $cur_page; //  get the current page from the url if it is  not the first page
				$start = ($current_page * $display) - $display;            // use the current page to determine the $start in the LIMIT
				if($cur_page > $total_pages){trigger_error_manual(404);;}// what to echo if the user enter more than maximum page
			}else{ // if $_GET IS empty
				$current_page = 1;  $start = 0;// for the first page
			}
			//TOTAL_PAGE ENDS
			//DATA SECION STARTS
			$sql = "SELECT p_id FROM property_table WHERE p_id != 'null' $category_query $state_query $condition_query $furnished_query ORDER BY p_id DESC LIMIT $start,$display";
			$stmt = $conn->prepare($sql);
			$stmt->bindColumn('p_id',$id);
			$stmt->execute();
			$numRow = $stmt->rowCount();
			if($numRow > 0){// if a record is found
				?>
				<div class='j-center j-large j-text-color5 j-bolder'><?=$total_records?> propert<?=($total_records > 1)?"ies":"y";?> available at the moment</div>
				<div class='j-row'>
					<?php
					while($stmt->fetch()){get_property($id,'property');}
					?>
				</div>
				<?php
			}else{
				?><div class='j-center j-large j-text-color5 j-bolder'>0 property available at the moment</div><?php
			}
			//DATA SECION ENDS
			//MAKING THE NEXT, CURRENT AND PREVIOUS BUTTON LINKS STARTS
			if($total_pages > 1){ //create next,previous and other links if pages are more than 1
				//setting the url
				  $url = "property/property?ct={$type}&st={$state}&cd={$condition}&fn={$furnished}&pg=";
				  echo file_location('home_url',$url.($current_page-1));
				?>
				<div class="j-center j-container">
				  <br><br>
				  <?php
				  // previous button (if the page is not first page)
				  if($current_page != 1){
					?><a class='j-button j-color1 j-round j-left j-bolder'style='position:relative;top:-4px;'href="<?=file_location('home_url',$url.($current_page-1))?>"><<</a> <?php
				  }
				  // other pages start
				  //for start and end pagination link
				  if($current_page <= 2){$start_link = 1;}else{$start_link = $current_page-2;}
				  if(($current_page + 2) > $total_pages){$end_link = $total_pages;}else{$end_link = $current_page + 2;}
				  //for first page
				  if($current_page  > 3){?><a class='j-button j-color5 j-tiny j-bolder' href="<?=file_location('home_url',$url.'1')?>">1</a> <span style='margin:10px;position:relative;top:5px;'><b>...</b></span> <?php }
				  for($i = $start_link; $i <= $end_link; $i++){
					if($i != $current_page){//  link the other pages except current page
					  ?><a class='j-button j-color5 j-tiny j-bolder' href="<?=file_location('home_url',$url.$i)?>"><?=$i;?></a> <?php
					}else{// do not link the current page
					  ?><span class='j-btn j-color1 j-tiny j-bolder'><?=$i;?></span> <?php
					}
				  }//end of for
				  //for last page
				  if($current_page+2  < $total_pages){?><span style='margin:10px;position:relative;top:5px;'><b>...</b></span><a class='j-button j-color5 j-tiny' href="<?=file_location('home_url',$url.$total_pages)?>"><?=$total_pages;?></a> <?php }
				  // next button (if the current page is not the last page)
				  if($current_page != $total_pages){
					?><a class='j-button j-color1 j-round j-right  j-bolder'style='position:relative;top:-4px;'href="<?=file_location('home_url',$url.($current_page+1))?>">>></a><?php
				  }
				  ?>
				  </div>
				<br><br>
				<?php
			  }// end of if($total_pages > 1)
			//MAKING THE NEXT, CURRENT AND PREVIOUS BUTTON LINKS ENDS
			?>
		</div>
	</div>
</div>