<?php 
$total = array(1,2,3,4);
foreach ($total as $index) {?>
<div class="step-wrapper">
    <div class="step">
        <h4><?php the_field("date_".$index);?></h4>
        <p><?php the_field("text_".$index);?></p>
    </div>  
</div>
<?php }; ?>