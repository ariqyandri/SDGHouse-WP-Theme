<?php 
  get_header();
  global $post;
  $page_id = $post->ID; 
?>

<!-- Page Header -->
<div class="header bg_texture full-overlay"
data-aos="fade-down"     
data-aos-once="true"
>
    <div class="header-title" data-aos="fade-up">
        <h1><?php pll_e("Team"); echo " ".get_field('name');?></h1>
    </div>
</div>
<!--  -->


<div class="content">
<div class="wrap">

    <div class="project-col">

      <h1><?php the_field('name');?></h1>
      <div class="project-details">
      <h4><i class="fas fa-bookmark"></i> <?php echo apply_filters('get_tax_term', array("edition", $page_id));?></h4>
      </div>

      <?php the_content();?>

    </div>

<div class="cta-wrapper">
    <?php $teams = get_field('team');
    foreach ($teams as $team) { 
      ?>
      
      <a href="<?php echo get_post_meta($team, "link")[0];?>" target="_blank" class="btn-default"><?php pll_e("View")?> <?php echo get_post_meta($team, "name")[0];?> <?php pll_e("Site")?></a>

      <?php $blogs = get_posts(array( 
                      'post_type' => 'post',
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
</div>


<div class="content no-padding-top">
  <div class="wrap">

    <h1><?php pll_e("View More Projects")?></h1>

    <div class="row projects more">
    <?php
      $post_type = 'project';
      $display_class = 'project';
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