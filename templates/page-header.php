<?php     
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$basic = $image[0]? "":"full-overlay";
 ?>
<div class="header bg_texture <?php echo $basic." ".get_field("page_type"); ?> " style="background: url(<?php echo $image[0];?>) no-repeat center center / cover"
data-aos="fade-down"     
data-aos-once="true"
>
    <div class="header-title" data-aos="fade-up">
        <h1><?php the_field('headline'); ?></h1>
    </div>
</div>