<?php 
  /**
 * Template Name: Newscasting
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
  get_header("newscasting");
  global $post;
  $page_id = $post->ID; 
?>

<?php     
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$basic = $image[0]? "":"full-overlay";
 ?>

<div class="newscasting-page">

  <div class="header bg_texture" style="background: url(<?php echo $image[0];?>) no-repeat center center / cover"
  data-aos="fade-down"     
  data-aos-once="true"
  >
    
    <div class="header-title" data-aos="fade-up">
        <h1><?php the_field('headline'); ?></h1>
    </div>

  </div>

  <div class="newscasting">
    
    <div  class="news1 news-wrapper">
      <div id="today-slider-wrapper" class="news">
        <h1>Today</h1>
        <!--  -->
      </div>
    </div>
    
    <div class="news2 news-wrapper">
      <div id="this-week-slider-wrapper" class="news">
        <h1>This Week</h1>
        <!--  -->
      </div>
    </div>

    <div class="news3 news-wrapper">
      <div id="all-slider-wrapper" class="news">
        <h1>All</h1>
        <!--  -->
      </div>
    </div>

  </div>

    <?php 
        echo do_shortcode('[curated_calendar endpoint="agenda-en-nieuws" max_items="100"]');
    ?> 
  <div class="none">

</div>

</div>
<script src="<?php echo get_template_directory_uri()."/assets/js/newscasting-filter.js"?>"></script>

<?php get_footer("newscasting"); ?>