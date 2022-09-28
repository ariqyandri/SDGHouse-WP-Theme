<?php
/**
 * Template Name: Become a Trainee
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

<!-- Become a Trainee -->
<div class="content" data-aos="fade-up">
    <div class="row wrap">

    <?php
        get_template_part('templates/page-info-image','page-info-image', array(1));
        ?>

    </div>
</div>  
<!---->

<!-- Traineeship Details-->
<div class="content no-padding-top" data-aos="fade-up">
    <div class="wrap">

        <h1><?php the_field("header_2");?></h1>
        <ul class="trainee-list">
        <?php 
            $text = apply_filters('get_array', get_field('list_2'));
            foreach ($text as $li) {?>
                    
            <li><?php echo $li;?></li>

        <?php } ?>
        </ul>
            
        <div class="cta-wrapper">
            <?php do_action('display_button', array("2a", "large") );?>
            <?php do_action('display_button', array("2b", "alt large") );?>
        </div>  

    </div>
</div>

<!--  -->

<!-- Eligible -->
<div class="content no-padding traineesehip-eligible" data-aos="fade-up">
    <div class="wrap">

        <h1><?php the_field("header_3");?></h1>
        <?php the_field("text_3");?>

        <div class="cta-wrapper">
            <?php do_action('display_button', array("3a", "large") );?>
            <?php do_action('display_button', array("3b", "alt large") );?>
        </div>

    </div>
</div>

<!--  -->

<!-- form -->
<div class="content" data-aos="fade-up">
    <div class="wrap">

        <?php
            get_template_part('templates/form','form', array(4, ""));
            ?>

    </div>
</div>
<!--  -->

<!-- important info -->
<div class="content" data-aos="fade-up">
    <div class="wrap">

        <?php
            get_template_part('templates/important-dates','important-dates', array(5, $page_id));
            ?>
            
    </div>
</div>
<!--  -->

<!-- youtube video -->
<div class="content no-padding-top" data-aos="fade-up">
    <div class="wrap row center no-padding-bottom">

    <h2><?php the_field("header_6");?></h2>        
    <?php
        get_template_part('templates/video','video', array(6));
    ?>

    </div>
</div>
<!--  -->

<!-- <script type="text/javascript">
(function ($) {
  $("#form-1").ready(function () {
    $("#form-1").trigger('click');
  });
})(jQuery);
</script> -->

<?php get_footer(); ?>