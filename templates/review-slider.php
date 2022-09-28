<!-- slider -->
<div class="splide review-slider">
    <div class="splide__track">
        <ul class="splide__list">
        <?php
        $loop = new WP_Query( array( 
            'post_type' => 'review',
            'posts_per_page' => -1,
            )); 
            while ( $loop->have_posts() ) : $loop->the_post();
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $border = get_template_directory_uri()."/assets/images/review-border.svg"  ?>

            <!-- review-item -->
            <li class="splide__slide">
            <?php
                get_template_part('templates/review-border','page-header');
            ?>
                <div class="review-item" >
                    <div class="main">
                        <div class="review-item-img" style="background: url(<?php echo $image[0];?>) no-repeat center center / cover"></div>
                        <a class="review-info" href="<?php echo get_permalink();?>">
                            <p><?php the_field("review");?></p>
                            <h4><?php echo get_field("name").", ".apply_filters('get_tax_term', array("role", $post->ID));?></h4>
                        </a>
                    </div>
                    </div>
            </li>
            <!--  --> 

        <?php
        endwhile;
        wp_reset_postdata();
        ?>

        </ul>
    </div>
</div>
<!--  -->
<script type="text/javascript">
new Splide( '.review-slider', {
rewind: true,
type    : 'loop',
arrows:true,
pagination:false,
perPage: 3,
breakpoints: {
    1350: {
    perPage: 2,
    },900: {
    perPage: 1,
    },
}
} ).mount();
</script>