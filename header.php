<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Blog Site Template" />

  <title><?php wp_title(' | ', true, 'right'); ?></title>

  <!-- Google Tag Manager -->

  <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

  })(window,document,'script','dataLayer','GTM-P4FT3RG');</script> -->

  <!-- End Google Tag Manager -->



  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138561510-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-138561510-1', { 'anonymize_ip': true });
  </script> -->

  <!-- Splide JS -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> -->
  <script src="https://kit.fontawesome.com/0357c91965.js" crossorigin="anonymous"></script>


  <!-- Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <?php wp_head(); ?>
  
</head>

<body
<?php 
  $page_type=get_field("page_type")?get_field("page_type"):'default';
  body_class($page_type); ?>
>

<div class="wrapper">
  <!-- Navbar -->
    <?php
      get_template_part('templates/navbar','navbar'); ?>
  <!---->