<?php $postID = $post->ID; ?>
<div id="post-gallery" class="post">
    <div class="post_img">
        <div class="splide post-<?php echo $postID; ?>" id="post-slider">
	        <div class="splide__track">
		        <ul class="splide__list">

                <!-- Load Gallery -->
                    <?php
                    get_template_part('templates/gallery-load','gallery-load');
                    ?>
                <!--  -->
	
    	        </ul>
	        </div>
        </div>
    </div>
    <div id="thumbnail-slider" class="splide thumbnail-slider-<?php echo $postID; ?>">
        <div class="splide__track">
            <ul class="splide__list">
            <?php $regex = '/src="([^"]*)"/';
            preg_match_all( $regex, get_the_content(), $gallery);
            $gallery = array_reverse($gallery);
            if($gallery[0]){        
                foreach ($gallery[0] as $src) { ?> 
    
                    <li class="splide__slide image hvr-grow" style="background-image: url(<?php echo $src?>)">
                    </li>
    
            <?php }
                }   ?>
            </ul>
        </div>
    </div>
    <script>
        var primarySlider = new Splide(".post-<?php echo $postID; ?>", {
        type: "fade",
        rewind: true,
        height: "70vh",
        focus: "center",
        perPage: 1,
        autoplay: true,
        })
        var secondarySlider = new Splide( '.thumbnail-slider-<?php echo $postID; ?>', {
		fixedWidth  : 100,
		height      : 100,
		cover       : true,
		isNavigation: true,
		breakpoints : {
			'600': {
				fixedWidth: 66,
				height    : 40,
			}
		},
	    } ).mount();
        primarySlider.sync( secondarySlider ).mount();

    </script>
</div>