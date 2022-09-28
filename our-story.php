<?php
/**
 * Template Name: Our Story
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
	
<!-- Timeline -->

<div class="content">
	<div class="wrap">
	
	<?php
	get_template_part('templates/ost-timeline','ost-timeline');
	?>

	</div>
</div>
<!--  -->

<!-- Video -->
<div class="content">
	<div class="wrap">
		<?php
			get_template_part('templates/video','video', array(2));
		?>
	</div>
</div>
<!--  -->

<!-- Our Team -->
<div class="content alt last" data-aos="fade-up">
	<div class="wrap">

		<div class="col-center no-padding">
			<h1><?php the_field("header_3"); ?></h1>
		</div>

		<div class="row">
		<?php
			$loop = new WP_Query( array( 
				'post_type' => 'team_member',
				'posts_per_page' => -1,
				'order' => 'ASC', 
				)); 
				while ( $loop->have_posts() ) : $loop->the_post();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), 'full' ); ?>
			
			<div class="employee-wrapper" data-aos="fade-up">
				<div class="employee-img">
					<img src="<?php echo $image[0];?>">
				</div>
				<div class="employee-name">
					<h4><?php the_field("name");?></h4>
				</div>
			</div>

			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
			
	</div>
</div>
<!--  -->

<?php get_footer(); ?>