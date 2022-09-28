<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' )
?>

<div class="room-item" style="background-color:<?php the_field("color")?>">

    <!-- room text -->
    <div class="room-info">
      <div class="house-img">
      <img src="<?php echo $image[0]?>">
      </div>

      <div class="room-text">
        <p><?php the_excerpt()?></p>
      </div>
    </div>  
    <!--  -->

    <!-- gallery for members -->
    <div class="house-members">
      <h4><?php pll_e("Members")?></h4>      
        <div class="splide sdg-member">
            <div class="splide__track">
                <ul class="splide__list">

                <?php
                $members = get_posts( array( 
                    'post_type' => 'community_member',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                            array( 
                                'key' => 'sdg', 
                                'compare' => 'LIKE', 
                                'value' => get_field("number")
                            ),
                        ) 
                        ));
                    foreach ($members as $member) {
                    $member_id = $member->ID;
                    $member_image = wp_get_attachment_image_src( get_post_thumbnail_id( $member_id ), 'medium' )[0];
                    ?>

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