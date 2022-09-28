<div class="content no-padding-top" data-aos="fade-up">
    <div class="wrap">
        <h1><?php the_field("header");?></h1>
            <ul class="trainee-list">
                <?php 
                    $text = apply_filters('get_array', get_field('text_1'));
                    foreach ($text as $li) {?>
                        
                        <li><?php echo $li;?></li>

                <?php } ?>
            </ul>
            
            <?php the_content();?>
        <!-- <div class="cta-wrapper">
        </div>   -->
    </div>
    
</div>
