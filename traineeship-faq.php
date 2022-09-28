<?php
/**
 * Template Name: Traineeship FAQ
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
  get_header();
  global $post;
  $page_id = $post->ID; 
  $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->


<!-- FAQ -->
<div class="content">
  <div class="wrap">
    <?php
        get_template_part('templates/faq','faq', array(1));
        ?>
  </div>
</div>
<!--  -->

</div>

<?php get_footer(); ?>