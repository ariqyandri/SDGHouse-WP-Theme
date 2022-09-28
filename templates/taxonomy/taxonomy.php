<?php
/** @var array $args */
$name = $args->name;
$slug = $args->slug;
$description = $args->description;
$id = $args->term_id;
?>       

<div class="component a" 

>
    <div class="icon">
        <?php the_field('icon', 'feature_'.$id );?>
    </div>
    <div>
        <h3><?php echo $name;?></h3>
        <p><?php echo $description?></p>
    </div>
</div>
