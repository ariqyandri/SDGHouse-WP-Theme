<?php
/** @var array $args */
$i = $args[0];
?>     
<div class="video-wrapper" data-aos="fade-up">
    <figure class="wp-block-embed is-type-rich is-provider-embed-handler wp-block-embed-embed-handler wp-embed-aspect-16-9 wp-has-aspect-ratio">
        <div class="wp-block-embed__wrapper">
            <?php echo get_field("video_".$i); ?>
        </div>
    </figure>
</div>