<?php
/**
 * Template Name: Become a Client
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
<div class="content">
    <div class="row wrap" data-aos="fade-up">

    <?php
        get_template_part('templates/page-info-image','page-info-image', array(1));
        ?>

    </div>
</div>  
<!---->

<div class="content no-padding" data-aos="fade-up">
  <div class="wrap">

    <h1><?php the_field("header_2");?></h1>
    <p>
      <?php the_field("text_2");?>
    </p>
  
  </div>
</div>

<!-- Traineeship Details-->
<div class="content" data-aos="fade-up">
    <div class="wrap">

        <?php 
            $total = array(
                array("3a" , 'alt'),
                array("3b" , '' ,'padding-top-component')
            );
            foreach ($total as $i) {?>
        
        <div class="<?php echo $i[2];?>">
            
            <h1><?php the_field("header_".$i[0]);?></h1>

            <ul class="trainee-list <?php echo $i[1];?>">
                <?php 
                    $text = apply_filters('get_array', get_field('list_'.$i[0]));
                    foreach ($text as $li) {?>
                        
                        <li><?php echo $li;?></li>

                <?php } ?>
            </ul>
        </div>

        <?php }; ?>            
        <div class="cta-wrapper">
            <?php do_action('display_button', array("3a", "large") );?>
            <?php do_action('display_button', array("3b", "alt large") );?>
            <?php do_action('display_button', array("5", "large") );?>
        </div>

    </div>    
</div>
<!--  -->

<!-- Slider -->
<div class="content alt-3" data-aos="fade-up">
    <div class="wrap">

        <?php
            get_template_part('templates/client-slider','Client Slider', array(get_field('header_4')));
        ?>

    </div>
</div>
<!--  -->

<!-- Form -->
<div class="content" data-aos="fade-up">
    <div class="wrap">
        <!-- <div class="cta-wrapper"  data-aos="fade-up">
            <?php do_action('display_button', array("5", "") );?>
        </div> -->
        <?php
            get_template_part('templates/form','form', array(5, "alt"));
            ?>

    </div>
</div>
<!--  -->

<!-- Important -->
<div class="content" data-aos="fade-up">
    <div class="wrap">

        <?php
            get_template_part('templates/important-dates','important-dates', array(6, $page_id));
            ?>

    </div>
</div>
<!--  -->

<!-- youtube video -->
<div class="content no-padding-top" data-aos="fade-up">

    <?php
        get_template_part('templates/video','video', array(7));
    ?>

</div>
<!--  -->

<!-- <script type="text/javascript">
(function ($) {
  $("#form-2").ready(function () {
    $("#form-2").trigger('click');
  });
})(jQuery);
</script> -->

<?php get_footer(); ?>