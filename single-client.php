<?php 
  get_header();
  global $post;
  $page_id = $post->ID; 
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' ); 

?>

<!-- Page Header -->
<div class="header bg_texture full-overlay client"
data-aos="fade-down"     
data-aos-once="true"
>
</div>
<!--  -->
<!--  -->


<div class="content">
  <div class="wrap" data-aos="fade-up">
    <div class="client-header" data-aos="fade-up">
      <img src="<?php echo $image[0]; ?>">
      <div>
        <h1><?php echo get_field('name').", ".apply_filters('get_tax_term', array("org_type", $page_id)); ?></h1>
      </div>
    </div>

<div class="title">
  <h1><?php echo pll_e("Projects") ?></h1>
</div>


<div class="row client-projects">

  <?php
    $loop = new WP_Query( array( 
      'post_type' => 'project',
      'posts_per_page'=>-1,
      'meta_query' => array(
        array( 
          'key' => 'team', 
          'compare' => 'LIKE', 
          'value' => $page_id 
        ),
        )   
      )); 
      while ( $loop->have_posts() ) : $loop->the_post();
      ?>

        <div href="<?php echo get_permalink()?>" class="client-wrapper">
          <div class="client-info">
          <h2><?php the_field('name')?></h2>
          <span>
          <h3><i class="fas fa-bookmark"></i><?php echo apply_filters('get_tax_term', array("edition", $post -> ID)) ?></h3>
          </span>
          
          <?php the_content();?>
          </div>

          <div class="cta-wrapper">

          <?php $teams = get_field('team');
          foreach ($teams as $team) { 
            ?>
            
            <a href="<?php echo get_post_meta($team, "link")[0];?>" target="_blank" class="btn-default"><?php pll_e("View")?> <?php echo get_post_meta($team, "name")[0];?> <?php pll_e("Site")?></a>

            <?php $blogs = get_posts(array( 
                            'post_type' => 'post',
                            'tax_query' => array( 
                                  array( 
                                      'taxonomy' => 'edition', 
                                      'field' => 'name', 
                                      'terms' => apply_filters('get_tax_term', array("edition", $post -> ID))
                                  ),
                              ),
                            'meta_query'=>(array(
                              array(
                                'key' => 'team', 
                                'compare' => 'LIKE', 
                                'value' => $team
                              ),
                            ))
                          ));
            foreach ($blogs as $blog) { 
              $blog_id=$blog->ID;
              ?>

              <a href="<?php echo get_permalink($blog);?>" class="btn-default alt"><?php pll_e("Read")?> <?php echo get_post_meta($blog_id, "header")[0];?></a>

            <?php } ?>
          <?php } ?>
        </div>  

        </div>

    <?php
    endwhile;
    wp_reset_postdata();
    ?>

</div>

</div>
</div>



<div class="content no-padding-top">
  <div class="wrap">

    <h1><?php pll_e("View More Clients")?></h1>

    <div class="row projects more">
    <?php
      $post_type = 'client';
      $display_class = 'client';
      $order_by = 'rand';
      $per_page = 2;
      $extra = array( 
        'post__not_in' => array($page_id)
      );

      do_action('display_post', array($post_type, '', $display_class,'', '', $order_by, '', $per_page ,$extra) );
      ?>
    </div>

  </div>
</div>


<?php get_footer(); ?>