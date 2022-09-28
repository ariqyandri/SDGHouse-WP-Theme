<?php
/** @var array $args */
$i = $args[0];
?>     
<h1><?php the_field('header_'.$i); ?></h1>

  <div class="acordian">
  <?php
    $faqs = get_field('list_'.$i);
    
    foreach ($faqs as $faq) {
      $faq_id = $faq->ID
      ?>
    <div id="faq" class="slide-out">
        <div class="slide-title">
            <div class="cross"><h3>+</h3></div>
            <h2><?php echo get_post_meta($faq_id, "question")[0];?></h2>
        </div>
        <div class="slide-content">
            <p><?php echo get_post_meta($faq_id, "answer")[0];?></p>
        </div>
    </div>
    <?php  } ?>

  </div>