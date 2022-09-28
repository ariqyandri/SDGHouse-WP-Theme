

<?php
/** @var array $args */
$i = $args[0];
?>     

<!-- trainee blog row -->
<h1><?php the_field("header_".$i);?></h1>

<div class="row grid blogs">

    <?php
    $post_type = "post";
    $display_class = "blog";
    $posts_per_page = 4;
    $order_by = "date";
    $order = "DESC";
    do_action('display_post', array($post_type, '', $display_class, '', '', $order_by, $order, $posts_per_page, '', '') );
    ?>
    
</div>

<div class="col-center">
    <?php do_action('display_button', array($i, "") );?>
</div>
<!--  -->