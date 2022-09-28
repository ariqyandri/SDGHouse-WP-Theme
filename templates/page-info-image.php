<?php
/** @var array $args */
$i = $args[0];
?>  
<div class="col-50">
    <h1><?php the_field("header_".$i );?></h1>
    <span>
        <p>
            <?php the_field("sub_header_".$i);?>
        </p>
    </span>
    <?php the_field("text_".$i );?>
</div>
<div class="col-50">
    <img src="<?php echo get_field("image_".$i);?>">
</div>
