<?php
    get_header();
    global $post;
    $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
    $page_id = $post->ID; 
 
?>
    
<!-- Home Header -->
<?php
    get_template_part('templates/home-header','home-header');
?>
<!--  -->

<!-- Who We Are -->
<div class="content" data-aos="fade-up">
    <div class="wrap">
    
        <div class="title">
            <h1>
                <?php the_field("header_1"); ?>
            </h1>    

        </div>
        <!-- <div class="col-center">
            
            <?php the_field("text_1"); ?>
        
            <div class="cta-wrapper">
                <?php do_action('display_button', array("1", "") );?>
            </div>  
        </div> -->
        <div class="row">
            <?php 
            $total = array("a","b","c");
            foreach ($total as $index) {?>
                <div class="col-30">
                    <img src="<?php the_field("image_1".$index);?>" alt="<?php the_field("sub_header_1".$index);?>">
                    <h2><?php the_field("sub_header_1".$index);?></h2>
                    <p><?php the_field("text_1".$index);?></p>
                </div>
            <?php }; ?>
        </div>

    </div>
</div>
<!---->

<!-- What We Do -->
<div class="content alt" data-aos="fade-up">
    <div class="wrap">

        <div class="title">
            <h1>
                <?php the_field("header_2"); ?>
            </h1>    
        </div>
        <div class="row grid what-we-do">
            <?php 
            $total = array("a","b","c","d");
            foreach ($total as $i=>$index) {
                $i++
                ?>
            <div class="<?php echo "item".$i;?>">
                <a class="topic-wrapper main" href="<?php the_field("link_2".$index)?>" style="background: url(<?php the_field("image_2".$index);?>) no-repeat center center / cover">                
                    <div class="topic-info">
                    <h2><?php the_field("sub_header_2".$index);?></h2>
                    </div>	
                    <div class="topic-cta">
                        <p><?php pll_e("Read More")?><i class="fas fa-chevron-right"></i></p>
                    </div>
                </a>
            </div>
            <?php }; ?>
        </div>

    </div>
</div>
<!---->

<!-- Network Slider -->
<div class="content network-slider" data-aos="fade-up">
	<div class="wrap">

        <div class="row no-padding-top">
        <?php $networks = array(
                            array(
                                'name' => "houses",
                                'post' => "house",
                                'title' => get_field("header_3a")
                                )
                            ,
                            array(
                                'name' => "community",
                                'post' => "community_member",
                                'title'=>  get_field("header_3b") )
                        );
        foreach ($networks as $network) {
            $name = $network["name"];
            $type = $network["post"];
            $title = $network["title"];
            ?>
            <div class="col-50 <?php echo $name?>">
                <h1 class="center-text"><?php echo $title?></h1>
                <div class="splide sdg-<?php echo $name?>">
                    <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                $loop = new WP_Query( array( 
                                    'post_type' => $type,
                                    'posts_per_page' => -1,
                                    'orderby' => 'rand',
                                    )); 
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'medium' ); ?>
                                    <li class="splide__slide">
                                        <a href="<?php the_field("link")?>">
                                        <img src=<?php echo $image[0]?>>
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
            new Splide( '.sdg-<?php echo $name?>', {
                type    : 'loop',
                rewind: true,
                // arrows:false,
                pagination:false,
                pauseOnHover: false,
                autoplay    : true,
                perPage: 1,
                } ).mount();
            </script>
        <?php };?>
        </div>

	</div>
</div>	
<!---->

<!-- SDG Events -->
<div class="content events-wrapper" data-aos="fade-up">
	<div class="wrap">

		<div class="title">
		<h1><?php the_field("header_4"); ?></h1>
		</div>

		<div class="row event-grid">
			<?php 
				echo do_shortcode(get_field("shortcode_4"));
			?> 
		</div>

        <div class="cta-wrapper">
            <?php do_action('display_button', array("4", "") );?>
        </div>  

	</div>
</div>
<!---->

<!-- 17 SDGs -->
<div class="content" data-aos="fade-up">
    <div class="wrap">
        <div class="title">
            <h1><?php the_field("header_5"); ?></h1>
            <?php  the_field("text_5"); ?>
        </div>

        <div class="goals-row">
            <?php
                $loop = new WP_Query( array( 
                    'post_type' => 'sdg',
                    'posts_per_page' => -1,
                    'order' => 'ASC', 
                    )); 
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); ?>
                    <!-- <a href="<?php echo get_permalink();?>" class="goal-wrapper"  style="background: url(<?php echo $image[0];?>) no-repeat center center / cover" data-aos="fade-up"> -->

                    <a href="<?php echo get_permalink();?>" class="goal-wrapper"  style="background-color:<?php the_field("color");?>;" data-aos="fade-up">
                
                        <img src="<?php echo $image[0];?>">
                        <div class="goal-info" style="background-color:<?php the_field("color");?>;">
                            <h3>
                                <?php the_field("header");?>
                            </h3>
                            <p><?php the_field("goal");?></p>
                            <div><?php pll_e("Read More")?></div>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
        </div>

    </div>
</div>
<!---->

<?php
    get_footer();
?>