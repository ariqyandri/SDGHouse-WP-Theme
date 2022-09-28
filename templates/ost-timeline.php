
<?php
	$slides = array();
	$ps = get_posts( array( 
		'post_type' => 'slide',
		'posts_per_page' => -1,
		'order' => 'ASC', 
		'tax_query' => array( 
                array( 
                    'taxonomy' => 'slider_type', 
                    'field' => 'slug', 
                    'terms' => 'our-story-timeline'
                ),
            ),
		));
	foreach ($ps as $p) {
		$p_id = $p->ID;
		$raw_slide = array(
			"header" => get_post_meta($p_id, "header")[0],
			"icon" => get_post_meta($p_id, "icon")[0],
			"date" => get_post_meta($p_id, "date")[0],
			"id" => $p_id,
		);
		array_push($slides, $raw_slide);
	} 
?>

<div class="title center-text" data-aos="fade-up">
    <h1><?php echo get_field("header_1"); ?></h1>
</div>

<div class="timeline-wrapper" data-aos="fade-up">
    <div class="splide year-slider">
        <div class="splide__track">
                <ul class="splide__list">
                <?php
                    foreach ($slides as $slide) {?>
                    <li class="splide__slide">
                        <span></span>
                        <div class="timeline-year">
                            <?php echo $slide["icon"]; ?>
                            <h4><?php echo $slide["date"]; ?></h4>	
                        </div>
                    </li>
                <?php }; ?>
                </ul>
        </div>
    </div>

    <div class="splide timeline-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                    foreach ($slides as $slide) {?>
                <li class="splide__slide">
                    <div class="timeline-text">
                    <h2><?php echo $slide["header"]; ?></h2>
                    <?php
                    $loop = new WP_Query( array( 
                        'post_type' => 'slide',
                        'p' =>  $slide["id"]
                        )); 
                        while ( $loop->have_posts() ) : $loop->the_post();
                        
                        the_content();

                    endwhile;
                    wp_reset_postdata();
                    ?>
                    </div>
                </li>
                <?php }; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        var timeline = new Splide( '.timeline-slider', {
        type       : 'fade',	
        autoHeight	: true,
        pagination 	: false,
        arrows     	: true,
        focus       : 'center',
        padding: '6rem',

    } );
        var thumbnail = new Splide( '.year-slider', {
        rewind      	: true,
        // fixedWidth      : 104,
        isNavigation	: true,
        // gap             : 50,
        pagination  	: false,
        // arrows     		: false,
        drag			: false,
    } );
    timeline.sync(thumbnail);
    thumbnail.mount();
    timeline.mount();
    </script>

</div>