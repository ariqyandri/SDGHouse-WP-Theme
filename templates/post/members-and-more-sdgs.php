<?php 
/** @var array $args */
$sdg=$args[0];
$members = get_field("header");
$more_sdgs = get_field("sub_header") ?>

<!-- sdg members slider -->
<div class="content">
  <div class="wrap">

  <div class="col-center">
    <h1><?php echo $members; ?></h1>
    <div class="splide sdg-slider">
      <div class="splide__track">
        <ul class="splide__list">
        <?php
        $loop = new WP_Query( array( 
            'post_type' => 'community_member',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'meta_query' => array(
                    array( 
                        'key' => 'sdg', 
                        'compare' => 'LIKE', 
                        'value' => get_post_meta($sdg->ID, "number")[0]
                    ),
                ) 
            )); 
            while ( $loop->have_posts() ) : $loop->the_post();
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); ?>
            <li class="splide__slide">
                <a href="<?php the_field("link");?>">
                    <img src="<?php echo $image[0];?>">
                </a>
          </li>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </ul>
      </div>
    </div>
    </div>
  </div>  
</div>  

<script type="text/javascript">
        new Splide( '.sdg-slider', {
  // type    : 'loop',
  rewind: true,
  // arrows:false,
  autoplay: true,
  pagination:false,
  pauseOnHover: false,
  autoplay    : true,
  perPage: 4,
  breakpoints: {
    900: {
      perPage: 3,
    },
    600: {
      perPage: 2,
    },
  }
} ).mount();
</script>
<!--  -->


<!-- more sdg -->
<div class="content alt-3">
  <div class="wrap" >

  <div class="row"  data-aos="fade-up">
    <h1><?php echo $more_sdgs ?></h1>
  </div>
  <div class="splide more-sdg">
    <div class="splide__track">
      <ul class="splide__list">
      <?php
      $loop = new WP_Query( array( 
          'post_type' => 'sdg',
          'posts_per_page' => -1,
          'order' => 'ASC',
          'post__not_in' => array($post->ID)
          )); 
          while ( $loop->have_posts() ) : $loop->the_post();
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' );?>
        <li class="splide__slide" >
          <a href="<?php echo get_permalink();?>">
            <img src="<?php echo $image[0];?>">
          </a>
        </li>
      <?php
      endwhile;
      wp_reset_postdata();
      ?>             
      </ul>
    </div>
  </div>
  </div>
<script type="text/javascript">
        new Splide( '.more-sdg', {
  type    : 'loop',
  rewind: true,
  // arrows:false,
  fixedHeight: 230,
  gap: '1rem',
  pagination:true,
  pauseOnHover: false,
  autoplay    : true,
  perPage: 5,
  breakpoints: {
    1100: {
      perPage: 4,
    },
    900: {
      perPage: 3,
    },
      700: {
      perPage: 2,
    },
      500: {
      perPage: 1,
    },
  }
} ).mount();
</script>
</div>
</div>
<!--  -->