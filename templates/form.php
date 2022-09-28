<?php
/** @var array $args */
$i = $args[0];
$style = $args[1];
?>     
<div class="application-form <?php echo $style?>" data-aos="fade-up">
    <h1><?php the_field("header_".$i);?></h1>
    <?php the_field("form_".$i);?>
</div>
