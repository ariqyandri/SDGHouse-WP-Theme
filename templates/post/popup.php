<?php     
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<div class="popup" >
    <div class="toggle">
        <i class="fa-solid fa-xmark down"></i>
        <i class="fa-solid fa-angle-up up"></i>
    </div>
    <div class="info" data-aos="fade-right" data-aos-duration="900">
        <div class="pic" style="background: url(<?php echo $image[0]?>) no-repeat center center / cover">
            <img src="<?php the_field("icon");?>" alt="">
        </div>
        <div class="text">
            <h2><?php the_content();?></h2>
        </div>
        <a href="<?php echo get_field("link")["url"];?>" class="btn">
            <?php echo get_field("link")["title"];?> 
        </a>
    </div>
</div>
<script src="<?php echo get_template_directory_uri()."/assets/js/popup.js"?>"></script>