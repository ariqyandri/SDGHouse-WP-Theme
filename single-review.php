<?php 
  get_header();
  global $post;
  $page_id = $post->ID; 
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
  ?>
<!--  -->


<div class="content">
  <div class="wrap">
      <div class="blog-col">
        <h1><?php the_field('header') ?></h1>

        <div class="blog-author">
          <!-- <h4><i class="fas fa-user"></i> <?php echo get_the_author_meta('display_name', $post->post_author);?></h4> -->
          <h4><i class="far fa-calendar-alt"></i><?php  echo substr($post->post_date, 0, 10); ?></h4>
        </div>

        <?php the_content();?>
      </div>
  </div>
</div>


<div class="content no-padding-top">
  <div class="wrap">

    <h1><?php pll_e("More Interviews")?></h1>

    <div class="row blogs more">
    <?php
    $loop = new WP_Query( array( 
      'post_type' => 'review',
      'posts_per_page'=>2,
      'order_by' => 'rand',
      'post__not_in'=>array($page_id)
    )); 
      while ( $loop->have_posts() ) : $loop->the_post();
      ?>

    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
    $edition = get_the_terms( $post->ID, "edition")[0];?>

    <a href="<?php echo get_permalink()?>" class="blog-wrapper">
        <div class="blog-img">
            <img src="<?php echo $image[0]?>">
        </div>

        <div class="blog-name">
            <div class="info">
                <h2><?php the_field('header')?></h2>
                <i class="far fa-calendar-alt"></i><?php  echo substr($post->post_date, 0, 10); ?>
            </div>
            <div class="topic-cta">
                <p><?php pll_e("Read More")?> <i class="fas fa-chevron-right"></i></p>
            </div>
        </div>
    </a>


    <?php
    endwhile;
    wp_reset_postdata();
    ?>
    </div>
    
  </div>
</div>


<?php get_footer(); ?>