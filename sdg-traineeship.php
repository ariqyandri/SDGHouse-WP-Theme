<?php
/**
 * Template Name: SDG Traineeship
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

<!-- Page Info and Review -->
<!-- first row -->
<div class="content traineeship">
	<div class="wrap">

        <div class="col-center margin-auto no-padding-top info"
        data-aos="fade-up">
            <p class="xl">
                <?php echo wp_strip_all_tags( get_field("text_1"));?>
            </p>
        </div>

        <div class="row" data-aos="fade-up">
            <?php
            get_template_part('templates/review-slider','review-slider');
            ?>
        </div>

	</div>
</div>
<!--  -->


<!-- Become a Trainee -->
<div class="content alt-2 medium-padding" data-aos="fade-up">
    <div class="wrap">

        <div class="row">
            <div class="col-50 center">
                <h1 class="big">
                    <?php the_field('header_2'); ?>
                </h1>
            </div>
            <div class="col-50 l">
              <?php the_field('text_2'); ?>
            </div>
        </div>

    </div>
</div>

<div class="content" data-aos="fade-up">
    <div class="wrap">

    <?php 
        $total = array(array("2a",''),array("2b",'reverse'));
        foreach ($total as $array) {
            $index=$array[0]?>
        <div class="row no-padding-top <?php echo $array[1]; ?>" data-aos="fade-up">
            <div class="col-50">
                <img src="<?php the_field('image_'.$index); ?>">
            </div>
            <div class="col-50 center checklist">
                <h1><?php the_field('sub_header_'.$index); ?></h1>
                <?php the_field('list_'.$index); ?>
            </div>
        </div>
        <?php }; ?>

        <div class="col-center" data-aos="fade-up">
            <?php do_action('display_button', array("2", "large") );?>
        </div>

    </div>
</div>
<!--  -->

<!-- Video -->
<!-- <div class="content no-padding-bottom">
    
</div> -->
<!--  -->

<!-- Blogs -->
<div class="content no-padding-top">
  <div class="wrap no-padding"  data-aos="fade-up">
    <div class="row video-and-blog">
        <?php
            get_template_part('templates/video','video', array(3));
            ?>
        <!-- <div class="video">
        </div> -->
        <div>
            <h3><?php the_field('header_4'); ?></h3>
            <?php
                $post_type = "post";
                $display_class = "blog";
                $posts_per_page = 1;
                $order_by = "date";
                $order = "DESC";
                do_action('display_post', array($post_type, '', $display_class, '', '', $order_by, $order, $posts_per_page, '', '') );
                ?>
            <?php do_action('display_button', array(4, "") );?>
        </div>
    </div>
  </div>
</div>
<!--  -->

<!-- FAQ -->
<!-- <div class="content  medium-padding-top">
  <div class="wrap" data-aos="fade-up">

    <?php
        get_template_part('templates/faq','faq', array(5));
        ?>

  </div>
</div> -->
<!--  -->

<!-- Become a Client -->
<div class="content alt medium-padding" data-aos="fade-up">
    <div class="wrap" >

        <div class="row" >
            <div class="col-50 center">
                <h1 class="big">
                    <?php the_field('header_6'); ?>
                </h1>
            </div>
            <div class="col-50 l">
              <?php the_field('text_6'); ?>
            </div>
        </div>

    </div>
</div>

<div class="content">
    <div class="wrap" data-aos="fade-up">

    <?php 
        $total = array(array(6,''));
        foreach ($total as $array) {
            $index=$array[0]?>
        <div class="row no-padding-top <?php echo $array[1]; ?>" data-aos="fade-up">
            <div class="col-50">
                <img src="<?php the_field('image_'.$index); ?>">
            </div>
            <div class="col-50 center checklist">
                <h1><?php the_field('sub_header_'.$index); ?></h1>
                <?php the_field('list_'.$index); ?>
            </div>
        </div>
        <?php }; ?>
    
    <div class="col-center" data-aos="fade-up">
        <?php do_action('display_button', array("6", "large alt") );?>
    </div>

    </div>
</div>
<!--  -->

<!-- Client Traineeship -->
<div class="content alt-3" data-aos="fade-up">
    <div class="wrap">

        <?php
            get_template_part('templates/client-slider','Client Slider', array(get_field('header_7')));
        ?>
        
    </div>
</div>

<div class="content" data-aos="fade-up">
    <div class="wrap">

        <div class="row" >
            <div class="col-50 center">
                <h1><?php the_field('header_8') ?></h1>
            </div>
            <div class="col-50">
            <p>
                <?php the_field('text_8') ?>
            </p>
            <div class="cta-wrapper">
                <?php do_action('display_button', array("8", "") );?>
            </div>
            </div>
        </div>

        <div class="logo-row" data-aos="fade-up">
            <?php the_field('gallery_8') ?>
        </div>

    </div> 
</div>
<!--  -->

<?php get_footer(); ?>