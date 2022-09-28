<?php

//THEME
function theme_support(){
	//dynamic title support
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support('woocommerce');
}
add_action('after_setup_theme','theme_support');
add_post_type_support( 'page', 'excerpt' );
//

//STYLES
function register_style(){
    
    wp_enqueue_style( 'fonts', get_template_directory_uri()."/assets/fonts/fonts.css", array(),'','all');


    wp_enqueue_style( 'hover', get_template_directory_uri()."/assets/css/hover.css", array(),'','all');

    wp_enqueue_style( 'normalize', get_template_directory_uri()."/assets/css/normalize.css", array(),'','all');

    wp_enqueue_style( 'style', get_template_directory_uri()."/style.css", array('normalize'),'','all');

    wp_enqueue_style( 'mobile', get_template_directory_uri()."/assets/css/mobile.css", array('normalize', 'style'),'','all');
}
add_action( 'wp_enqueue_scripts', 'register_style' );
//

//SCRIPTS
function register_scripts() {
	wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(),'3.4.1', true);
	
    wp_enqueue_script('main-js',get_template_directory_uri()."/assets/js/main.js", array(), '', true);

    wp_enqueue_script('navbar-js',get_template_directory_uri()."/assets/js/navbar.js", array(), '', true);
    
    // wp_enqueue_script('load-more-js',get_template_directory_uri()."/assets/js/load-more.js", array(), '', true);

    // Localize the script with new data
    
    // wp_localize_script( 'load-more-js', 'ajax_posts', $script_data_array );
}

add_action( 'wp_enqueue_scripts', 'register_scripts' );
//


// remove bloat
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
//

//Filters
remove_filter( 'the_excerpt', 'wpautop' );
//

//MENUS
function mlh_menus(){
	$locations=array(
		'primary' => "Primary Menu",
		'sub' => "Sub Menu",
		'footer' => "Footer Menu"
	);
	register_nav_menus($locations);
}
add_action('init', 'mlh_menus');
//

// Actions //

//Post
add_action('display_post', 'get_post_init');

function get_post_init($arg){
    $query =  array( 
        'post_type' => $arg[0], 
        'posts_per_page' => $arg[7] == '' ? '-1' : $arg[7], 
        'orderby'=> $arg[5] == '' ? 'date' : $arg[5], 
        'order' => $arg[6] == '' ? 'DES' : $arg[6], 
        'tax_query' => array( 
            $arg[3] == '' ? '' : $arg[3],
                array( 
                    'taxonomy' => 'display_class', 
                    'field' => 'slug', 
                    'terms' => $arg[2] 
                ),
            ),
        'meta_query' => array(
            $arg[4] == '' ? '' : $arg[4],

                //https://wordpress.stackexchange.com/questions/183182/meta-query-compare-in-not-working
                $arg[1] == '' ? '' : 
                array( 
                    'key' => 'page_id', 
                    'compare' => 'LIKE', 
                    'value' => $arg[1] 
                ),
            )
        ) ;
    
    // Extra Conditions 
    if($arg[8] == ''){

    } else {    
        foreach($arg[8] as $key => $val){
            $query[$key] = $val; // copy the key and value from the first array to the second https://stackoverflow.com/questions/21805954/move-element-from-one-array-to-another
        };
    }

    
    $loop = new WP_Query( $query ); 
        
    while ( $loop->have_posts() ) : $loop->the_post();
    
    $index = $loop->current_post + 1;

         get_template_part('templates/post/'.$arg[2],'post', $arg[9] ? array($arg[9], $index) : array($index));
    
    endwhile;
    wp_reset_postdata();
};

/*
<?php
$post_type = '';
$page_id = ''; 
$display_class = '';
$extra_tax_query = '';
$extra_meta_query = '';
$order_by = '';
$order = '';
$per_page = '';
$extra = '';
$import_array = '';

do_action('display_post', array($post_type, $page_id, $display_class, $extra_tax_query, $extra_meta_query, $order_by, $order, $per_page, $extra, $import_array) );
?>
*/
//

//Taxonomy https://wordpress.stackexchange.com/questions/176804/passing-a-variable-to-get-template-part
add_action('display_taxonomy', 'get_taxonomy_init');


function get_taxonomy_init($arg){
    
    if( $arg[0] == ""){
        $tax_terms = get_terms( 
            $arg[1]  //Taxonomy Name (slug)
        );
    }else{
        $tax_terms = get_the_terms( 
            $arg[0], //Post ID
            $arg[1]  //Taxonomy Name (slug)
        );
    }

    if( $tax_terms ) :
        foreach( $tax_terms as $term ) :
            
            get_template_part('templates/taxonomy/'.get_field('display_class', $arg[1].'_'.$term->term_id ),'taxonomy', $term);

        endforeach;
    endif;

};
//

//Taxonomy Term
add_action('display_tax_term', 'get_taxonomy_term_init');

function get_taxonomy_term_init($arg){
    
    if( $arg[1] == ""){
        $tax_terms = get_terms( 
            $arg[0]  //Taxonomy Name (slug)
        );
    }else{
        $tax_terms = get_the_terms( 
            $arg[1], //Post ID
            $arg[0]  //Taxonomy Name (slug)
        );
    }

    if( $tax_terms ) :
        foreach( $tax_terms as $term ) :
            
            echo get_field('display_class', $arg[0].'_'.$term->term_id );


        endforeach;
    endif;
    wp_reset_postdata(); 

};
//

//Page Link
add_action('display_page_link_button', 'get_page_link_button');


function get_page_link_button($arg){
    
    $page = get_page_by_path($arg[0]);
    $id = $page->ID;
    if(pll_current_language() == 'en') {
        $link=get_permalink( $page );
    } else if(pll_current_language() != 'en') {
        $link=get_permalink( get_page_by_path( apply_filters('the_slug', array($id, 'page', pll_current_language() ) ) ) );
    };
?>
    <a class="btn_default" href="<?php echo $link;?>">
        <?php pll_e($arg[1]);?>
    </a>
<?php
    
};
//


//Get Slug in specific language https://wordpress.stackexchange.com/questions/224416/how-to-do-action-and-get-a-return-value
add_filter('the_slug', 'get_the_slug');


function get_the_slug($arg){
    
  // get the post ID in en https://wpml.org/forums/topic/get-the-slug-of-the-current-page-in-a-specific-language/
  $en_post_id = icl_object_id(
                        $arg[0],    //Post ID 
                        $arg[1],    //Post Type
                        FALSE, 
                        $arg[2]     //Language Code
                    );

  // get the post object
  $en_post_obj = get_post( $en_post_id);

  // get the name
  $en_post_name = $en_post_obj->post_name;

  return $en_post_name ;
};
//

//Get Slug automatic
add_filter('the_slug_automatic', 'get_the_slug_automatic');

function get_the_slug_automatic($arg){
    
    // get the post ID in en https://wpml.org/forums/topic/get-the-slug-of-the-current-page-in-a-specific-language/
    $page = get_page_by_path(
                $arg[0],
                '',
                $arg[1]==''?'page':$arg[1]);
    $id = $page->ID;
    $name = $page->post_name;
    if(pll_current_language() == 'en') {
        return $name;
    } else if(pll_current_language() == 'nl') {
        $pageNL= get_page_by_path( apply_filters('the_slug', array($id, 'page', 'nl') ) );
        $name = $pageNL->post_name;
        return $name;
    };
  };
  //
//

//Gallery
add_action('display_gallery', 'get_gallery_init');

function get_gallery_init($post_slug){
    $loop = new WP_Query( array( 
        'post_type' =>'post', 
        'tax_query' => array(
            'relation' => 'AND',
            array( 
                'taxonomy' => 'category', 
                'field' => 'slug',
                'terms' => $post_slug
                ), 
            array( 
                'taxonomy' => 'category', 
                'field' => 'slug', 
                'terms' => "gallery"
                ) 
            ) 
        ) 
    ); 
    while ( $loop->have_posts() ) : $loop->the_post();

        get_template_part('templates/gallery','gallery');
           
    endwhile;
    wp_reset_postdata();
};
//

//Array from Text Area https://stackoverflow.com/questions/16518434/textarea-to-array-with-php/16518665
add_filter('get_array', 'get_array_init');

function get_array_init($arg){
    $text = $arg;
    $input = isset($text)?$text:"";
    if (strlen($input)==0) {
    echo 'no input';
    exit;
    }
    $list = explode("\n", str_replace("\r", "", $input));
    return $list;
};

add_filter('get_array_split','get_array_split_init');
function get_array_split_init($arg){
    $text = $arg;
    $input = isset($text)?$text:"";
    if (strlen($input)==0) {
    echo 'no input';
    exit;
    }
    $a = explode("\n", str_replace("\r", "", $input));
    $list = array_combine(
        array_intersect_key($a, array_flip(range(0, count($a) - 1, 2))),
        array_intersect_key($a, array_flip(range(1, count($a) - 1, 2)))
    );
    return $list;
};

add_filter('get_tax_term','get_tax_term_init');
function get_tax_term_init($arg){
    if( $arg[1] == ""){
        $tax_terms = get_terms( 
            $arg[0]  //Taxonomy Name (slug)
        );
    }else{
        $tax_terms = get_the_terms( 
            $arg[1], //Post ID
            $arg[0]  //Taxonomy Name (slug)
        );
    };

    return  $tax_terms[0]->name;
};

add_action('display_button', 'get_button');

function get_button($arg){
?>
    <a class="btn-default <?php echo $arg[1];?>" href="<?php the_field("link_".$arg[0]);?>">
        <?php the_field("button_".$arg[0]); ?>
    </a>
<?php
    
};
////



// Ajax //

// more
function more_post_ajax(){
    $ppp = ($_POST["ppp"]) ? $_POST["ppp"] : 3;
    $page = ($_POST['pageNumber']) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => $_POST["postType"],
        'posts_per_page' => $ppp,
        'paged'    => $page,
        'post__not_in' => array($_POST["latestId"]),
        'tax_query' => array( 
            array( 
                'taxonomy' => 'edition', 
                'field' => 'term_id', 
                'terms' => $_POST["categoryId"]
            ),
        ),
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();

        $out .= get_template_part('templates/post/blog','blog');

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
//

// fetch
function fetch_post_ajax(){
    $ppp = ($_POST["ppp"]) ? $_POST["ppp"] : 3;
    $page = ($_POST['pageNumber']) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => $_POST["postType"],
        'posts_per_page' => $ppp,
        'paged'    => $page,
        'tax_query' => array( 
                array( 
                    'taxonomy' => 'edition', 
                    'field' => 'term_id', 
                    'terms' => $_POST["categoryId"]
                ),
            ),
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        // echo "blablabla";
        $out .= get_template_part('templates/post/blog','blog');

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_fetch_post_ajax', 'fetch_post_ajax');
add_action('wp_ajax_fetch_post_ajax', 'fetch_post_ajax');
//

// fetch
function fetch_newscasting_ajax(){
    
    $out .= get_template_part('templates/newscasting-slider','newscasting', array($_POST["length"], $_POST["type"], $_POST["pp"]));
    
    die($out);

}

add_action('wp_ajax_nopriv_fetch_newscasting_ajax', 'fetch_newscasting_ajax');
add_action('wp_ajax_fetch_newscasting_ajax', 'fetch_newscasting_ajax');
//
////

remove_filter('the_content', 'wpautop');

add_action('init', function() {
    pll_register_string('phone', 'Phone');
    pll_register_string('members', 'Members');
    pll_register_string('view', 'View');
    pll_register_string('site', 'Site');
    pll_register_string('read', 'Read');
    pll_register_string('read-more', 'Read More');
    pll_register_string('view-project', 'View Project');
    pll_register_string('view-client-projects', 'View Client Projects');
    pll_register_string('view-more-project', 'View More Projects');
    pll_register_string('view-more-clients', 'View More Clients');
    pll_register_string('view-more-blogs', 'View More Blogs');
    pll_register_string('more-blogs', 'More Blogs');
    pll_register_string('more-reviews', 'More Reviews');
    pll_register_string('more-interviews', 'More Interviews');
    pll_register_string('faqs', 'Frequently Asked Questions');
    pll_register_string('all', 'All');
    pll_register_string('today', 'Today');
    pll_register_string('this-week', 'This Week');
    pll_register_string('this-month', 'This Month');
});

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_filter('wp_title', 'my_custom_title');

function my_custom_title( $title )
{
    $name= get_field('header')?get_field('header'):get_field('name');
    $title= get_field('headline');
    // Return my custom title
    return sprintf("%s | %s", $title!=""?$title:$name, get_bloginfo('name'));
}