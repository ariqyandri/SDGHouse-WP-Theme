<?php
    $page_type=get_field("page_type")?get_field("page_type"):'default'
?>
<div class="wrap">

    <div class="footer-form">
        <?php
        $form = get_posts( array( 
            'post_type' => 'section',
            'tax_query' => array( 
                    array( 
                        'taxonomy' => 'display_class', 
                        'field' => 'slug', 
                        'terms' => 'form', 
                    ),
                ),
            'meta_query' => array(
                    array( 
                        'key' => 'location', 
                        'compare' => 'LIKE', 
                        'value' => 'footer' 
                    ),
                )  
            )); 
        $form_id = $form[0]->ID    ?>
        <h4><?php echo get_post_meta($form_id, "header")[0] ?></h4>
        <?php echo do_shortcode(get_the_content('','',$form_id)) ?>
    </div>	

    <div class="footer-info">
        
        <p>         
        <?php 
        echo date('Y')." © ".get_bloginfo('name');?>
        </p>

        <ul>
        <?php
        $contacts = get_posts( array( 
            'post_type' => 'contact',
            'posts_per_page' => -1,
            'meta_query' => array(
                array( 
                    'key' => 'label', 
                    'compare'=>'IN',
                    'value' => array('instagram','twitter','linkedin','facebook')
                ),
            ) 
            ));
        foreach ($contacts as $contact) {
        $contact_id = $contact->ID;
        ?>
        
        <li>
            <a href="<?php echo get_post_meta($contact_id, "link")[0]?>" target="_blank"><?php echo get_post_meta($contact_id, "icon")[0]?></a>
        </li>
        
        <?php } ?>
        </ul>

        <p>Designed by<span><a href="https://dcoders.nl/" target="_blank">Decoders</a></span></p>

    </div>
</div>

<div class="footer-bg-wrapper <?php echo $page_type ?>">
<?php if ($page_type=="traineeship") {
    # code...
}else{ ?>
    <div class="footer-bg left <?php echo $page_type ?>"></div>
    <div class="footer-bg right <?php echo $page_type ?>"></div>
<?php } ?>
</div>
