<?php
/**
 * Template Name: Contact
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
  get_header();
  global $post;
  $post_type = get_field("page_type") == "default" ? 'section' : get_field("page_type").'_section';
  $page_id = $post->ID; 
 
  ?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
?>
<!--  -->

<div class="content" data-aos="fade-up">
    <div class="row wrap">

        <div class="col-50">
        
            <h1><?php the_field('header_1')?></h1>  
            <?php the_field('text_1')?>
        <?php
        $contacts = get_field("list_1");
        foreach ($contacts as $contact) {
        $contact_id = $contact->ID;
        ?>
        <a id="adress" href="<?php echo get_post_meta($contact_id, "link")[0]?>">
            <span><?php echo get_post_meta($contact_id, "icon")[0]?></span>
            <p>
                <?php echo get_post_meta($contact_id, "value")[0]?>
            </p>
        </a>
        <?php } ?>
        </div>

        <!-- contact form -->
        <div class="col-50 ">
            <div class="application-form">
            <?php the_field("form_1") ?>
            </div>
        </div>
        <!--  -->
    </div>
</div>

<div class="map" data-aos="fade-up">
    <?php the_field("map_1") ?>
</div> 



<?php get_footer(); ?>