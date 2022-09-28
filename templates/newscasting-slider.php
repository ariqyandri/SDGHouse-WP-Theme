<?php
/** @var array $args */
$total = $args[0];
$type = $args[1];
$pp = $args[2];
?>       
<div class="splide <?php echo $type."-slider" ?>">
    <div class="splide__track">
        <ul class="splide__list">
        <?php
        for ($i=0; $i < $total; $i++) { 
            ?>

            <li class="splide__slide <?php echo $type."-".$i ?>" data-splide-interval="<?php echo "4000" ?>">
                <!--  -->
            </li>

        <?php }
        ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    new Splide( '.<?php echo $type."-slider" ?>', {
    type    : 'loop',
    rewind: true,
    arrows:false,
    pagination:false,
    height: "100%",
    pauseOnHover: false,
    perMove: 1,
    autoplay    : true,
    perPage: <?php echo $pp ?>,
    gap: "1rem",
    } ).mount();
</script>
<script src="path-to-the-script/splide-extension-grid.min.js"></script>

<!--  -->