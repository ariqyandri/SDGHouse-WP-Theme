<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); ?>
<a href="<?php echo get_permalink();?>" class="project-wrapper">

    <div class="project-logo">
        <img src="<?php echo $image[0];?>">
    </div>

    <div class="project-info">
        <h2><?php the_field("name");?></h2>
        <div class="client-details">
            <p><i class="fas fa-bookmark"></i> <?php echo  apply_filters('get_tax_term', array("edition", $loop->ID));?></p>
        </div>  

    </div>  

    <div class="see-more">
        <p><?php pll_e("View Project")?></p>
    </div>
</a> 