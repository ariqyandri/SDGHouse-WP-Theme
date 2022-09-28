<?php
/**
 * Template Name: SDG Houses
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
    get_header();
    global $post;
    $slug = $post->post_name;
    $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
    $page_id = $post->ID; 
 
?>
    
<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->
	
<!-- Info -->
<div class="content no-padding-bottom"   data-aos="fade-up">
    <div class="wrap">

        <div class="row">
            <div class="col-50 center" >
                <h1><?php the_field("header_1");?></h1>
            </div>
            <div class="col-50">
                <?php the_field("text_1");?>
            </div>
        </div>

    </div>
</div>

<!--  -->

<!-- Map -->
<div class="content houses-map"   data-aos="fade-up">
    <div class="wrap">
        <div class="row no-padding-bottom">
            <div class="col-50" >
                <h1><?php the_field("header_2");?></h1>
                <div class="houses-row">
                <?php
                    $loop = new WP_Query( array( 
                        'post_type' => 'house',
                        'posts_per_page' => -1,
                        )); 
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); 
                        if (get_field("greece") == "1") {
                            ;
                        } else {
                        ?>

                        <div class="house-link">
                            <a href="<?php the_field("link");?>" target="_blank">
                                <img src="<?php echo $image[0];?>" alt="<?php the_field("header");?>">
                            </a>
                        </div> 
                        
                    <?php };
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>  
            </div>

            <div class="col-50 center">
                <?php echo do_shortcode(get_field('shortcode_2'));?>
            </div>
        </div>

        <div class="row no-padding-bottom maps">
            
            <div class="col-50" >
                <h1><?php the_field("header_2b");?></h1>
                <div class="houses-row">
                <?php
                    $loop = new WP_Query( array( 
                        'post_type' => 'house',
                        'meta_query' => array(
                                array( 
                                    'key' => 'greece', 
                                    'compare' => 'LIKE', 
                                    'value' => '1'
                                ),
                            )
                        )) ;
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); ?>

                        <div class="house-link">
                            <a href="<?php the_field("link");?>" target="_blank">
                                <img src="<?php echo $image[0];?>" alt="<?php the_field("header");?>">
                            </a>
                        </div> 
                        
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>  
            </div>

            <div class="col-50 center">
                <?php echo do_shortcode(get_field('shortcode_2b'));?>
            </div>

        </div>

        <div class="col-center cta-wrapper">

            <!-- <?php do_action('display_button', array("2", "alt") );?> -->
            <?php do_action('display_button', array("2b", "alt") );?>

        </div>
    </div>
</div>
<!--  -->

<!--  -->
<div class="content no-padding-top"  id="sdg-nederland">
  <div class="wrap column sdg-houses-overview">
    <h1><?php the_field("header_4");?></h1>
    
    <div class="sdg-house-overview row" data-aos="fade-up">
        x<a class="col-30 image" href="<?php the_field("link_4a");?>" >
            <img src="<?php the_field("image_4a");?>" alt="<?php the_field("link_4a");?>>">
        </a>   
        <div class="col-70 info">
            <h1><?php the_field("header_4a");?></h1>

            <?php the_field("text_4a");?>
            
            <a class="link" href="<?php the_field("link_4a");?>" target="_blank">
                <p>
                    <?php pll_e("Website")?> : <span><?php the_field("link_4a");?></span>
                </p>
            </a>
        </div>   
        
        
    </div>

  </div>
</div>

<div class="content no-padding-top no-padding-bottom ">
  <div class="wrap">
    <div class="row">
        <div class="col-50">
            <h1><?php the_field("header_4b" );?></h1>
            <?php the_field("text_4b");?>
        </div>
        <div class="col-50">
            <img src="<?php echo get_field("image_4b");?>">
        </div>
    </div>
    <div class="col-center cta-wrapper">
        <?php do_action('display_button', array("4b", "alt") );?>
    </div>
  </div>
</div>
<!--  -->

<!-- Video -->
<div class="content" data-aos="fade-up">
    <?php
    get_template_part('templates/video','video', array(3));
    ?>
    <div class="col-center no-padding-top">         
        <h2>
            <?php the_field("header_3");?>
        </h2>
        <?php do_action('display_button', array("3", "large") );?>
    </div>
</div>
<!--  -->

<?php get_footer(); ?>