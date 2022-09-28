<?php
    get_header();
    global $post;
    $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
    $page_id = $post->ID; 
 
?>
    
<!-- Home Header -->
<?php
    get_template_part('templates/page-header','page-header');
?>
<!--  -->
	
<div class="content">
  <div class="wrap">
      <div class="blog-col index">
        <?php the_content();?>
      </div>
  </div>
</div>
<?php get_footer(); ?>