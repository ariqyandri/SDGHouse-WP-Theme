<div class="content no-padding"  data-aos="fade-up">
    <div class="wrap application-forms" id="application-forms">

        <h2>
            <?php the_field("header") ?>
        </h2>

        <div class="row">
            <?php 
            $total = array("","alt");
            foreach ($total as $i=>$style) {
            $index=$i+1;
            ?>
            <div class="application-form application_btn <?php echo $style ?>" id="form-<?php echo $index ?>" data-id="<?php echo $index ?>">
                <div class="title">
                    <h3><?php the_field("header_".$index);?></h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <?php }; ?>
        </div>
        <div class="form-wrapper">
            <?php 
                foreach ($total as $i=>$style) {
                $index=$i+1;
                ?>
                <div class="application-form column <?php echo $style." ".$index ?>">
                    <div class="forminator-guttenberg" >
                        <?php echo do_shortcode(get_field("shortcode_".$index)) ?>
                    </div>          
                </div>
                <?php }; ?>
        </div>
    </div>
</div>

<div class="application-form-popup">
    <div class="toggle">
        <i class="fas fa-chevron-right"></i>
    </div>
    <div class="info">
        <h4><?php the_field("sub_header") ?></h4>
        <div class="buttons">
        <?php 
                    $total = array("alt","");
            foreach ($total as $i=>$style) {
            $index=$i+1;
            ?>

            <div href="#form-<?php echo $index ?>" class="btn-default <?php echo $style ?>" data-id="<?php echo $index ?>"><?php the_field("sub_header_".$index);?></div>
            <?php }; ?>

        </div>
    </div>
</div>


<script src="<?php echo get_template_directory_uri()."/assets/js/application-forms.js"?>"></script>
