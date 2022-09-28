<?php
/** @var array $args */
$header = $args[0];
?>       

<!-- opdrachtgever slider -->
<h1><?php echo $header ?></h1>
<div class="col-center">
    <div class="splide opdrachtgever-slider">
        <div class="splide__track">
            <ul class="splide__list">
            <?php
            $loop = new WP_Query( array( 
                'post_type' => 'client',
                'posts_per_page' => -1,
                'orderby' => 'rand'
                )); 
                while ( $loop->have_posts() ) : $loop->the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); ?>

                <li class="splide__slide">
                <a href="<?php the_field('link') ?>">
                    <img src="<?php echo $image[0] ?>">
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
        new Splide( '.opdrachtgever-slider', {
type    : 'loop',
rewind: true,
// arrows:false,
pagination:false,
pauseOnHover: false,
autoplay    : true,
perPage: 4,
gap: 30,
breakpoints: {
1000: {
  perPage: 3,
},
700: {
  perPage: 2,
},
  400: {
  perPage: 1,
},
}
} ).mount();
</script>

<!--  -->