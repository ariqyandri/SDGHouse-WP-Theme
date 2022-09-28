<?php 
  get_header();
?>

<!-- Page Header -->
<div class="header bg_texture full-overlay"
data-aos="fade-down"     
data-aos-once="true"
>
    <div class="header-title" data-aos="fade-up">
        <h1>Error 404</h1>
    </div>
</div>
<!--  -->

<div class="content">
  <div class="wrap">

    <div class="col-center error" data-aos="fade-up">

    <h2>Page not found</h2>
    <a href="<?php echo get_home_url() ?>" class="btn-default">Return to home</a>

    </div>  

  </div>
</div>

<?php get_footer(); ?>