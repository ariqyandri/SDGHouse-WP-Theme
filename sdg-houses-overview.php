<?php
/**
 * Template Name: SDG Houses Overview
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

<!--  -->

<!-- Map -->
<div class="content houses-map"  data-aos="fade-up">
    <div class="wrap">
        <div class="row no-padding-bottom">
            <div class="col-50" >
                <h1><?php the_field("header_1");?></h1>
                <?php the_field("text_1");?>
                <div class="houses-row">
                <?php
                    $loop = new WP_Query( array( 
                        'post_type' => 'house',
                        'posts_per_page' => -1,
                        )); 
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
                <?php echo do_shortcode(get_field('shortcode_1'));?>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!--  -->
<div class="content no-padding-top">
  <div class="wrap column sdg-houses-overview">
    
  <!--  -->
  <?php
    $loop = new WP_Query( array( 
      'post_type' => 'house',
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1,  
      )); 
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); 
      ?>
    <div class="sdg-house-overview row" data-aos="fade-up">
      <a class="col-30 image" href="<?php the_field("link")?>" >
        <img src="<?php echo  $image[0]?>" alt="<?php the_field("name")?>">
      </a>   
      <div class="col-70 info">
        <h1>
          <?php the_field("name")?>
        </h1>

        <?php the_content()?>

        <a class="link" href="<?php the_field("link")?>" target="_blank">
          <p>
            <?php pll_e("Website")?> : <span><?php the_field("link")?></span>
          </p>
        </a>

        <!-- <a class="link" href="<?php the_field("contact_link")?>" target="_blank">
          <p>
            <?php pll_e("Contact")?> : <span><?php the_field("contact")?></span>
          </p>
        </a> -->
        
      </div>   
    </div>

    <?php
    endwhile;
    wp_reset_postdata();
    ?>
    <!--  -->


  </div>
</div>
<!--  -->
<!--  -->

<?php get_footer(); ?>