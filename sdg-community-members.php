<?php
/**
 * Template Name: SDG Community Members
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

<div class="content top">
  <div class="house-wrapper">
    
  <!-- begining of roof -->
  <?php
    $loop = new WP_Query( array( 
      'post_type' => 'sdg',
      'meta_query' => array(
        array( 
          'key' => 'number', 
          'compare' => 'LIKE', 
          'value' => 17 
        ),
        )   
      )); 
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); 
      $members_17 = get_posts( array( 
        'post_type' => 'community_member',
        'posts_per_page' => -1,
        'meta_query' => array(
          array( 
            'key' => 'sdg', 
            'compare' => 'LIKE', 
            'value' => 17
          ),
          ) 
        ));
        ?>

    <div class="triangle-up" style="background-color:<?php the_field("color")?>;"></div>

    <div class="sdg-roof" style="background-color:<?php the_field("color")?>;">


      <div class="house-img">
        <img src="<?php echo $image[0]?>">
      </div>

      <div class="house-members">
        <h4><?php pll_e("Members")?></h4>

    <!-- gallery for members -->
        <div class="splide sdg-member">
          <div class="splide__track">
            <ul class="splide__list">
              <?php
              foreach ($members_17 as $member) {
                $member_id = $member->ID;
                $member_image = wp_get_attachment_image_src( get_post_thumbnail_id( $member_id ), 'medium' )[0];?>

              <li class="splide__slide">
                <a href="<?php echo get_post_meta($member_id, "link")[0] ?>" target="_blank" class="members-link">
                  <img src="<?php echo $member_image ?>">
                </a>
              </li>

              <?php } ?>
              
            </ul>
          </div>
        </div>

    <!--  -->
      </div>

    </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
    <!-- end of roof -->

    <!-- begining of rooms -->
    <div class="room-row">

      <?php
      $post_type = 'sdg';
      $display_class = 'sdg';
      $extra_meta_query = array( 
        'key' => 'number', 
        'compare' => 'NOT IN', 
        'value' => array(17) 
      );
      $order = 'DESC';

      do_action('display_post', array($post_type, '', $display_class, '', $extra_meta_query, '', $order,'' ,array('posts_per_page' => -1)) );
      ?>
  
    </div>
    <!--  -->


  </div>
</div>
<!--  -->


<script type="text/javascript">
      function changeHeight() {
        var width = $(window).width();
        $(".triangle-up:after").css({
            "top": width
        });
    }
    window.addEventListener('resize', changeHeight);
    changeHeight();
</script>
<script type="text/javascript">
      
      var elms = document.getElementsByClassName( 'sdg-member' );
  
      for ( var i = 0; i < elms.length; i++ ) {
        new Splide( elms[ i ],{
        rewind: true,
        arrows:true,
        pagination:false,
        perPage: 4,
        breakpoints: {
          1100: {
            perPage: 3,
          },
          900: {
            perPage: 2,
          },
            600: {
            perPage: 1,
          },
        }
        } ).mount();
      }
  
      </script>
<?php
    get_footer();
?>