<?php
// creating connection
require_once(file_location('inc_path','connection.inc.php'));
@$conn = dbconnect('admin','PDO');
//PAGINATION CODE START HERE
$display = 12; // number of records to show per page
//calculate the number of pages
if($_SERVER['PHP_SELF'] === '/search.enc.php'){ //for search
  if($type === 'blog'){
    $searchtext2 = $searchtext."*";
    $sql = "SELECT n_id FROM news_table
    WHERE n_status = 'active' AND MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:id IN BOOLEAN MODE)
    ORDER BY MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:id IN BOOLEAN MODE)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$searchtext2,PDO::PARAM_STR);
    $stmt->bindColumn('n_id',$id);
    $stmt->execute();
    $total_records = $stmt->rowCount(); 
  }elseif($type === 'property'){
    $searchtext2 = $searchtext."*";
    $sql = "SELECT p_id FROM property_table
    WHERE p_status = 'available' AND MATCH(p_title,p_details) AGAINST(:id IN BOOLEAN MODE)
    ORDER BY MATCH(p_title,p_details) AGAINST(:id IN BOOLEAN MODE)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$searchtext2,PDO::PARAM_STR);
    $stmt->bindColumn('p_id',$id);
    $stmt->execute();
    $total_records = $stmt->rowCount(); 
  }
}

if($total_records > $display){ // if the number of record is more than the displayed num(10)
  $total_pages = ceil($total_records / $display);
}else{ // if the number of record is not more than the displayed num(10)
  $total_pages = 1;
}
// getting the current page and where to start
if(isset($_GET['page']) and is_numeric($_GET['page'])){ // for other pages other than first page
  $cur_page = test_input($_GET['page']); // page value
  $current_page =  $cur_page; //  get the current page from the url if it is  not the first page
  $start = ($current_page * $display) - $display;
  // use the current page to determine the $start in the LIMIT
  if($cur_page > $total_pages){die(page_not_available(''));}// what to echo if the user enter more than maximum page
}else{ // if $_GET IS empty
  $current_page = 1;  $start = 0;// for the first page
}
//PAGINATION CODE PAUSE HERE


//SELECTING AND DISPLAYING CONTENT STARTS HERE
if($_SERVER['PHP_SELF'] === '/search.enc.php'){ //for search
  if($type === 'blog'){
    $sql = "SELECT n_id FROM news_table
    WHERE n_status = 'active' AND MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:id IN BOOLEAN MODE)
    ORDER BY MATCH(n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source) AGAINST(:id IN BOOLEAN MODE) LIMIT :start,:display";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$searchtext2,PDO::PARAM_STR);
    $stmt->bindParam(':start',$start,PDO::PARAM_INT);
    $stmt->bindParam(':display',$display,PDO::PARAM_INT);
    $stmt->bindColumn('n_id',$id);
    $stmt->execute();
    $numRow = $stmt->rowCount();
    if($numRow > 0){
      ?>
      <div class='j-home-padding j-row j-color4'>
        <div class='j-center j-large j-padding'><?=$total_records?> result(s) found for the keyword "<span class='j-bolder'><b><?=$searchtext?></b>" in news</span></div>
        <?php while($stmt->fetch()){get_news($id);} ?>
      </div>
        <?php
    }else{
      ?>
      <div class='j-home-padding j-color4'>
        <div class='j-center j-large j-color4'style='padding:70px 0px;'>No content found for the keyword "<span class='j-bolder'><?=$searchtext?></span>" in blogs</div>
        <?php $headline = 'You may like to read'; require_once(file_location('inc_path','blog/blog_more_stories.inc.php')); //more stories ?>
      </div>
      <?php
    } 
  }elseif($type === 'property'){
   $sql = "SELECT p_id FROM property_table
    WHERE p_status = 'available' AND MATCH(p_title,p_details) AGAINST(:id IN BOOLEAN MODE)
    ORDER BY MATCH(p_title,p_details) AGAINST(:id IN BOOLEAN MODE) LIMIT :start,:display";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$searchtext2,PDO::PARAM_STR);
    $stmt->bindParam(':start',$start,PDO::PARAM_INT);
    $stmt->bindParam(':display',$display,PDO::PARAM_INT);
    $stmt->bindColumn('p_id',$id);
    $stmt->execute();
    $numRow = $stmt->rowCount();
    if($numRow > 0){
      ?>
      <div class='j-home-padding j-row j-color6'>
        <div class='j-center j-large j-padding'><?=$total_records?> result(s) found for the keyword "<span class='j-bolder'><b><?=$searchtext?></b>" in properties</span></div>
        <?php while($stmt->fetch()){get_property($id);} ?>
      </div>
        <?php
    }else{
      ?>
      <div class='j-home-padding j-color4'>
        <div class='j-center j-large j-color4'style='padding:70px 0px;'>No content found for the keyword "<span class='j-bolder'><?=$searchtext?></span>" in properties</div>
        <?php $headline = 'You may like to read';$page_type = 'search page'; require_once(file_location('inc_path','property/property_more_properties.inc.php')); //more properties ?>
      </div>
      <?php
    }
  }
}
//SELECTING AND DISPLAYING CONTENT ENDS HERE



//MAKING THE NEXT, CURRENT AND PREVIOUS BUTTON LINKS STARTS
if($total_pages > 1){ //create next,previous and other links if pages are more than 1
  //setting the url
  if($_SERVER['PHP_SELF'] === '/search.enc.php'){ //for search
    $url = "search/{$type}/{$searchtext}/";
  }
  ?>
  <div class="j-center j-container">
    <br><br>
    <?php
    // previous button (if the page is not first page)
    if($current_page != 1){
      ?><a class='j-button j-color1 j-round-large j-left j-bolder'style='position:relative;top:-4px;'href="<?=file_location('home_url',$url.($current_page-1).'/')?>"><<</a> <?php
    }
    // other pages start
    //for start and end pagination link
    if($current_page <= 2){$start_link = 1;}else{$start_link = $current_page-2;}
    if(($current_page + 2) > $total_pages){$end_link = $total_pages;}else{$end_link = $current_page + 2;}
    //for first page
    if($current_page  > 3){?><a class='j-button j-color5 j-tiny j-bolder' href="<?=file_location('home_url',$url.'1'.'/')?>">1</a> <span style='margin:10px;position:relative;top:5px;'><b>...</b></span> <?php }
    for($i = $start_link; $i <= $end_link; $i++){
      if($i != $current_page){//  link the other pages except current page
        ?><a class='j-button j-color5 j-tiny j-bolder' href="<?=file_location('home_url',$url.$i.'/')?>"><?=$i;?></a> <?php
      }else{// do not link the current page
        ?><span class='j-btn j-color1 j-tiny j-bolder'><?=$i;?></span> <?php
      }
    }//end of for
    //for last page
    if($current_page+2  < $total_pages){?><span style='margin:10px;position:relative;top:5px;'><b>...</b></span><a class='j-button j-color5 j-tiny' href="<?=file_location('home_url',$url.$total_pages.'/')?>"><?=$total_pages;?></a> <?php }
    // next button (if the current page is not the last page)
    if($current_page != $total_pages){
      ?><a class='j-button j-color1 j-round-large j-right  j-bolder'style='position:relative;top:-4px;'href="<?=file_location('home_url',$url.($current_page+1).'/')?>">>></a><?php
    }
    ?>
    </div>
  <br><br>
  <?php
}// end of if($total_pages > 1)
//MAKING THE NEXT, CURRENT AND PREVIOUS BUTTON LINKS ENDS
?>