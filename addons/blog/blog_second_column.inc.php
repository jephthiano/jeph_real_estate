<div>
    <?php //ADVERT ?>
    <?php show_advert('sidebar')?>
    <?php //POPULAR POSTS ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Popular Posts</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            require_once(file_location('inc_path','connection.inc.php'));
            @$conn = dbconnect('admin','PDO');
            $status = 'active';
            $sql = "SELECT n_id from news_table WHERE n_status = :status ORDER BY RAND() LIMIT 5";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status',$status,PDO::PARAM_STR);
            $stmt->bindColumn('n_id',$news_id);
            $stmt->execute();
            $numRow = $stmt->rowCount();
            if($numRow > 0){
                while($stmt->fetch()){get_news($news_id,'sidebar');
                }// end of while
            }else{ // if num_row is 0
                ?><div class='j-center j-margin'>No content to display</div><br><?php
            }
            ?>
        </ul>
    </div>
    <?php //ADVERT ?>
    <?php show_advert('sidebar')?>
    <?php //LATEST POST ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Popular Posts</h4></div>
        <ul class="j-ul j-hoverable j-color4">
            <?php
            $status = 'active';
            $sql = "SELECT n_id from news_table WHERE n_status = :status ORDER BY n_id DESC LIMIT 5";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':status',$status,PDO::PARAM_STR);
            $stmt->bindColumn('n_id',$news_id);
            $stmt->execute();
            $numRow = $stmt->rowCount();
            if($numRow > 0){
                while($stmt->fetch()){get_news($news_id,'sidebar');
                }// end of while
            }else{ // if num_row is 0
                ?><div class='j-center j-margin'>No content to display</div><br><?php
            }
            ?>
        </ul>
    </div>
    <?php //TAGS ?>
    <div class="j-card j-white" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-black"><h4>Tags</h4></div>
        <div class="j-container j-white">
            <p>
                <?php
                require_once(file_location('inc_path','connection.inc.php'));
                @$conn = dbconnect('admin','PDO');
                $status = 'active';
                $sql = "SELECT DISTINCT (n_category) from news_table WHERE n_status = :status ORDER BY RAND() LIMIT 10";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':status',$status,PDO::PARAM_STR);
                $stmt->bindColumn('n_category',$news_category);
                $stmt->execute();
                $numRow = $stmt->rowCount();
                if($numRow > 0){
                    while($stmt->fetch()){
                        ?>
                        <a href="<?=file_location('home_url','search/'.$news_category.'/')?>">
                        <span class="j-tag j-btn j-black j-margin-bottom"><?=ucfirst($news_category)?></span>
                        </a>
                        <?php
                    }// end of while
                }else{ // if num_row is 0
                    ?>
                    <a href="<?=file_location('home_url','search/fashion/')?>"><span class="j-tag j-btn j-black j-margin-bottom">Fashion</span></a>
                    <a href="<?=file_location('home_url','search/culture')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Culture</span></a>
                    <a href="<?=file_location('home_url','search/event/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Event</span></a>
                    <a href="<?=file_location('home_url','search/place/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Place</span></a>
                    <a href="<?=file_location('home_url','search/people/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">People</span></a>
                    <a href="<?=file_location('home_url','search/nature/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Nature</span></a>
                    <a href="<?=file_location('home_url','search/asia/')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Asia</span></a>
                    <a href="<?=file_location('home_url','search/africa')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Africa</span></a>
                    <a href="<?=file_location('home_url','search/europe')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Europe</span></a>
                    <a href="<?=file_location('home_url','search/oceania')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">Oceania</span></a>
                    <a href="<?=file_location('home_url','search/america')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">South America</span></a>
                    <a href="<?=file_location('home_url','search/north america')?>"><span class="j-tag j-btn j-light-grey j-small j-margin-bottom">North America</span></a>
                <?php
                }
                ?>
			</p>
        </div>
    </div>
    <?php //FOLLOW US ?>
    <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
        <div class="j-container j-padding j-color3"><h4>Follow Us</h4></div>
        <div class="j-container j-xlarge j-padding j-color5">
            <div class=""><?php get_all_social_handle('j-color4','j-text-color7')?></div>
        </div>
    </div>
    <?php //NEWSLETTER ?>
    <?php
    if($_SERVER['PHP_SELF'] !== '/index.php'){
        ?>
        <div class="j-card j-color4" style='margin:0px 5px 30px 5px;'>
            <div class="j-container j-padding j-color3"><h4>Subscribe To Our Newletter</h4></div>
            <div class="j-text-color3 j-panel">Join our mailing list to receive updates on the latest news and programmes.</div>
            <div class="j-container">
                <form id='subform'class=''>
                    <span class='mg j-text-color1'id='nme'></span>
                    <input type='text'id='nm'name='nm'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Name'style="width:100%;"/><br>
                    <span class='mg j-text-color1'id='eme'></span>
                    <input type='email'id='em'name='em'class="ip j-input j-color4 j-color4 j-round-large j-border-2 j-border-color5"placeholder='Email'style="width:100%;"/><br>
                    <div style='padding-bottom: 20px;'class='j-itallic'>By clicking Subscribe, agree to receive notifications, updates, publications, alerts and newsletters from <?=ucwords(get_xml_data('company_name'))?>.</div>
                    <button type='submit'id='sbtn'class="j-btn j-medium j-color1 j-round-large j-bolder">Subscribe</button>
                </form>
            </div><br>
        </div>
        <?php
        $second_column = 'set';
    }
    ?>
</div>