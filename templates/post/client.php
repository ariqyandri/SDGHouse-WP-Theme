<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); ?>
<a href="<?php echo get_permalink();?>" class="project-wrapper" data-aos="fade-up">

    <div class="project-logo">
        <img src="<?php echo $image[0];?>">
    </div>

    <div class="project-info">
        <h2><?php the_field("name");?></h2>
        <div class="client-details">
            <?php $terms = get_the_terms( $loop->ID, 'org_type' );?>
            <p><i class="far fa-building"></i><?php echo  $terms[0]->name;?></p>
        </div>  

    </div>  

    <div class="see-more">
        <p><?php echo pll__("View")." ".get_field("name")." ".pll__("Projects")?></p>
    </div>
</a> 