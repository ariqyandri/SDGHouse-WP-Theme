<?php 
/** @var array $args */
$num=$args[0];
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
$edition = get_the_terms( $post->ID, "edition")[0];?>

<a href="<?php echo get_permalink()?>" class="blog-wrapper column <?php echo $edition->term_id?> <?php echo "blog".$num?>" style="grid-area: <?php echo "blog".$num?>;" data-aos="fade-up">
    <div class="blog-img">
        <img src="<?php echo $image[0]?>">
    </div>
    
    <div class="latest">
        <h2><?php the_field('header') ?></h2>
        <h3><i class="far fa-calendar-alt"></i><?php  echo substr($post->post_date, 0, 10); ?><i class="fas fa-bookmark"></i> <?php echo apply_filters('get_tax_term', array("edition", $post->ID));?></h3>
        <p><?php the_excerpt() ?></p>
       <div class="topic-cta"><p><?php pll_e("Read More")?></p> </div>
    </div>

    <div class="blog-name">
        <div class="info">
            <h2><?php the_field('header') ?></h2>
            <i class="far fa-calendar-alt"></i><?php  echo substr($post->post_date, 0, 10); ?>
            <i class="fas fa-bookmark"></i> <?php echo apply_filters('get_tax_term', array("edition", $post->ID));?>
        </div>
        <div class="topic-cta">
            <p><?php pll_e("Read More")?> <i class="fas fa-chevron-right"></i></p>
            
        </div>
    </div>
</a>
