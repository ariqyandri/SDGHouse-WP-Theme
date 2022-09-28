
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div class="header home" style="background: url(<?php echo $image[0];?>) no-repeat center center / cover">
    <div class="header-title" data-aos="fade-up">
        <h1><?php the_field('headline'); ?></h1>
        <?php the_content(); ?>
    </div>
</div>