<?php
/**
 * Template Name: Blogs
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
    get_header();
    global $post;
?>

<!-- Page Header -->
<?php
  get_template_part('templates/page-header','page-header');
  ?>
<!--  -->

<div class="content">

  <!-- Filter Buttons -->
  <div class="filter_btns" id="filterBtnContainer">
      
      <?php $cat_terms = get_terms('edition',
                              array(
                                  'hide_empty' => false,
                                  'orderby' => 'ID',
                                  'order' => 'ASC'
                              ) 
                          );
      if( $cat_terms ) :
          foreach( $cat_terms as $i => $term ) :
            if ($i==0){
              $initial=$term->term_id;
              global $initial;
            };
            $term_id = $term->term_id
          ?>
      
      <button class="filter_btn btn-<?php echo $term_id ?>" onclick="filterSelection('<?php echo $term_id  ?>')" data-id="<?php echo $term_id ?>" pn="1" >
        <?php echo $term->name?>
      
      </button>

      <?php endforeach;
      endif;
      wp_reset_postdata(); ?>

  </div> 

  <div class="wrap filtered">  

    <?php
    $post_type = 'post';
    $per_page = 7 ?>

    <div  id="blogs" class="row blogs" data-type=<?php echo $post_type; ?> data-ppp=<?php echo $per_page;
    ?>>

    </div>

    <div class="col-center">
      <div id="more_posts" class="btn-default"><?php pll_e("View More Blogs")?></div>
    </div>
      
    <script src="<?php echo get_template_directory_uri()."/assets/js/load-more.js"?>"></script>

    <div class="unavailable">         
        <?php
        $post_type = "section";
        $display_class = "form-for-unavailable";

        do_action('display_post', array($post_type, '', $display_class) );?>
    </div>

  </div>
</div>

<!-- Filter Script -->
<script type="text/javascript"> 
      // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("filterBtnContainer");
    var btns = btnContainer.getElementsByClassName("filter_btn");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        if(current[0]){
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
        }
    });
    }


    document.addEventListener("DOMContentLoaded", function(event) { 
      filterSelection(<?php echo $initial ?>);
      var initialButton = document.getElementsByClassName(`btn-${<?php echo $initial ?>}`)[0];
          initialButton.click();
          initialButton.className += " active";
    });
    
    function filterSelection(c) {

        var x, i;
        x = document.getElementsByClassName("column");

        if (c == "all") {
            c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            console.log(x[i].className.indexOf("unavailable"));
            if (
                x[i].className.indexOf(c) > -1 &&
                x[i].className.indexOf("unavailable") == -1
            )
                w3AddClass(x[i], "show");
            }
        } else {
            for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1 ){
             
              w3AddClass(x[i], "show");
            } 
            }
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

  
</script>
<!--  -->

<?php
    get_footer();
?>
