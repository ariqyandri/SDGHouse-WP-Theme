<?php 
  get_header();
  global $post;
  $page_id = $post->ID; 
?>

<!-- Page Header -->
<div class="header bg_texture full-overlay client"
data-aos="fade-down"     
data-aos-once="true"
>
    <div class="header-title" data-aos="fade-up">
        <h1><?php the_field('headline'); ?></h1>
    </div>
</div>
<!--  -->


<div class="content">
  <div class="wrap">
      <div class="blog-col index">
      <h1><?php the_field('header') ?></h1>

      <div class="blog-author">
      <!-- <h4><i class="fas fa-user"></i> <?php echo get_the_author_meta('display_name', $post->post_author);?></h4> -->
      <h4><i class="far fa-calendar-alt"></i><?php  echo substr($post->post_date, 0, 10); ?></h4>
      <h4><i class="fas fa-bookmark"></i> <?php echo apply_filters('get_tax_term', array("edition", $page_id));?></h4>
      </div>
      <?php the_content();?>
      </div>
  </div>
</div>


<div class="content  no-padding-top">
  <div class="wrap">

    <h1><?php pll_e("More Blogs")?></h1>

    <div class="row blogs more">
         <?php
        $post_type = 'post';
        $per_page = 2 ;
        $display_class = 'blog';
        $order_by = 'rand';
        $extra = array( 
          'post__not_in' => array($page_id)
        );

        do_action('display_post', array($post_type, '', $display_class,'', '', $order_by, '', $per_page,$extra) );
        ?>
    </div>
    
  </div>
</div>


<?php get_footer(); ?>