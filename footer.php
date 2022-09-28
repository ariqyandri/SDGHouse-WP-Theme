<?php 

$display_class = "application-forms";
do_action('display_post', array('section', '', $display_class) );

$display_class = "popup";
do_action('display_post', array('section', '', $display_class) );
$page_type=get_field("page_type")?get_field("page_type"):'default';

if ($page_type == "traineeship") {
}
?>

    
    <footer>
        <!-- Footer -->
        <?php get_template_part('templates/display-footer','footer-display'); ?>
        <!--  -->
    </footer>

    <!-- Loading -->
    <?php get_template_part('templates/loading','loading');?>
    <!--  -->

    <!-- The Modal -->
    <?php get_template_part('templates/modal','modal')?>
    <!---->

    <!-- To Top -->
    <div class="to-top">
        <i class="fas fa-chevron-up"></i>	
    </div>
    <!---->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P4FT3RG"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php wp_footer(); ?>

    </div>
</body>

</html>
