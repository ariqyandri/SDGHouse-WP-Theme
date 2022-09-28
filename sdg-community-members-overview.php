<?php
/**
 * Template Name: SDG Community Members Overview
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
    get_header();
    global $post;
    $page_id = $post->ID; 
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->

<!-- Info -->
<div class="content no-padding-bottom" data-aos="fade-up">
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


<div class="content">
  <div class="wrap column community-members">
    
  <!-- begining of roof -->
  <?php
    $loop = new WP_Query( array( 
      'post_type' => 'community_member',
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1,  
      )); 
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); 
      $sdgs = get_posts(
              array( 
                'post_type' => 'sdg',
                'posts_per_page' => -1,
                'meta_key' => 'number',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                  array( 
                    'key' => 'number', 
                    'compare' => 'IN', 
                    'value' => get_field("sdg")
                  ),
                ) 
              )
            )
      ?>
    <div class="community-member row" data-aos="fade-up">
      <a class="col-30 image" href="<?php the_field("link")?>" >
        <img src="<?php echo  $image[0]?>" alt="<?php the_field("name")?>">
      </a>   
      <div class="col-70 info">
        <h1>
          <?php the_field("name")?>
        </h1>

        <p>
          <?php the_field("description_".pll_current_language()) ?>
        </p>

        <p>
          <?php pll_e("SDGS")?>
        </p>

        <div class="row">
          <?php foreach ($sdgs as $key => $value) {?>
            <a href="<?php echo get_permalink($value->ID) ?>" class="hvr-grow">
              <img class="sdg" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $value->ID ), 'small' )[0]?>" alt="">
            </a>
            <?php
        }
        ?>
        </div>

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
    <!-- end of roof -->


  </div>
</div>
<!--  -->

<?php
    get_footer();
?>