<?php
/** @var array $args */
$i = $args[0];
$page_id = $args[1];
?>     
<div class="col-center"
>
    <h1><?php the_field("header_".$i);?></h1>
    <div class="row">
    <?php
        $display_class = "important-dates";
        do_action('display_post', array('section', $page_id, $display_class) );?>
    </div>  
</div>