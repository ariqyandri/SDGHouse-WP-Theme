<?php
/**
 * Template Name: Background Traineeship
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
    get_header();
    global $post;
    $page_id = $post->ID; 
    $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
    $content = get_posts(array( 
        'post_type' => $post_type,
        'order_by'=>'date',
        'order'=> 'ASC',
        'tax_query'=>(array(
            array(
                'taxonomy' => 'display_class', 
                'field' => 'slug', 
                'terms' => "page-info" 
            ),
        )),
        'meta_query' => array(
                array( 
                    'key' => 'page_id', 
                    'compare' => 'LIKE', 
                    'value' => $page_id 
                ),
            )
    ));
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->

<div class="content">
    <div class="wrap">

        <div class="row" data-aos="fade-up">
            <div class="col-50">
                <?php the_field("text_1")?>
            </div>
            <div class="col-50 center">
                <img src="<?php echo get_field("image_1")?>)" alt="">
            </div>
        </div>
        <div data-aos="fade-up">
            <h1><?php the_field("header_2")?></h1>
            <?php the_field("text_2")?>
        </div>

    </div>
</div>

<?php
$companies = array( array(3, 'alt'), array(4));
foreach ($companies as $company) {?>
<div class="content no-padding-top" data-aos="fade-up">
    <div class="wrap">

        <div class="row">
            <div class="col-75">
                <h1><?php the_field("header_".$company[0])?></h1>
                <?php the_field("text_".$company[0])?>
                <div class="cta-wrapper no-padding-top">
                    <?php do_action('display_button', array($company[0], $company[1]) );?>
                </div>
            </div>
            <div class="col-25 center">
                <img src="<?php echo get_field("image_".$company[0]) ?>" alt="">
            </div>
        </div>

    </div>
</div>
<?php } ?>

<?php get_footer(); ?>