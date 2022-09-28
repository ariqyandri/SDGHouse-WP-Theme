<?php 
  get_header();
  global $post;

  $post_type = !get_field("page_type")||get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
?>

<!-- Page Header -->
<div class="header sdg" style="background-color:<?php the_field("color");?>">
  <div class="wrap">
    <div class="header-title" data-aos="fade-up">
      <img src="<?php echo $image[0]; ?>">
      <div>
        <h1><?php the_field("header"); ?></h1>
        <p><?php the_field("sub_header"); ?></p>
      </div>
    </div>
  </div>
</div>
<!--  -->

<!-- Content -->
<div class="content sdg-page">
  <div class="wrap">
    <?php the_content(); ?>
  </div>
</div>
<!--  -->

<!-- Members and SDGs -->
<?php
    $display_class = "members-and-more-sdgs";
    do_action('display_post', array($post_type, $page_id, $display_class, '', '', '', '', '', '', $post) );
    ?>
<!--  -->

<?php get_footer(); ?>