<?php
/**
 * Template Name: Project Overview
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
  get_header();
  global $post;
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->


<div class="content">
  <div class="wrap">
    <div class="row projects">
    <?php
      $post_type = 'client';
      $display_class = 'client';
      $order_by = 'name';
      $order = 'ASC';
      do_action('display_post', array($post_type, '', $display_class,'', '', $order_by, $order, $per_page,$extra) );
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>