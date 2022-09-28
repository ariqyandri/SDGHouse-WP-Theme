<?php
    $page_type=get_field("page_type")?get_field("page_type"):'default';
    $logo = get_template_directory_uri()."/assets/images/logo-".$page_type.".png";
    ?>

<div class="navigation">

    <div class="logo-wrapper">
        <a href="<?php echo get_home_url() ?>">
            <img src='<?php echo $logo ?>' alt="logo for <?php the_field("page_type") ?>"/>
        </a>
    </div>

    <div class="menu-container">
        <div class="menu-wrapper">
            <ul id="main-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </ul>
        </div>

        <div class="nav-buttons parent">
            <!-- lang selector -->
            <button id="toggle-lang" class="uppercase "> 
                <?php echo pll_current_language(); ?>
            </button>
            <!--  -->

            <!-- Mobile menu -->
            <div class="mobile-trigger">
            <div class="btn-mobile not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
            </div>
            <!--  -->
        </div>
    </div>

    <div class="lang-menu-container parent">
        <ul><?php pll_the_languages();?></ul>
    </div>

</div>	

<div class="mobile-navigation">
    <ul>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </ul>
</div>