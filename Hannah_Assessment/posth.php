<div class="container">
    <div class="col round posts">
        <div class="row insidepost pink-bg radius">
            <div class="col-2">
            <?php 
                    $image = "";
                    if(file_exists($ROW_USER['profile_image']))
                    {
                        $image = $ROW_USER['profile_image'];
                    }
                    ?>
                <img src="<?php echo $image ?>" width="70rem">
            </div>
            <div class="col-10 text-start">
                <h1 class="regular white"><?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']?></h1>
                <p class="small white"><?php echo $ROW['date']?></p>
                <p class="white"><?php echo $ROW['post']?></p>
                <div class="row">
                    <div class="col-2">
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div><br>