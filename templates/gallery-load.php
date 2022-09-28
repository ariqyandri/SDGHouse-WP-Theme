<?php 
//https://regex101.com/

// Get Gallery
$regex = '/src="([^"]*)"/';
preg_match_all( $regex, get_the_content(), $gallery);
$gallery = array_reverse($gallery);

// Get Caption
$regex2 = '/<figcaption class="blocks-gallery-item__caption">([^"]*)<\/figcaption>/';
preg_match_all( $regex2, get_the_content(), $caption);
$caption = array_reverse($caption);

$image = array();

for($i = 0; $i < count($caption[0]); $i++){
    $val = array($gallery[0][$i],$caption[0][$i]);
    array_push($image, $val);
};
    if($image){        
        foreach ($image as $img) { ?> 

            <li class="splide__slide image" style="background-image: url(<?php echo $img[0]?>)">
                <h2><?php echo $img[1]?></h2>
            </li>

    <?php }
    } else {
        foreach ($gallery[0] as $src) { ?> 

            <li class="splide__slide image" style="background-image: url(<?php echo $src?>)">
            </li>

    <?php }
    }   ?>