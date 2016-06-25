<?php get_header(); ?>

<h1>page.php template</h1>

<div class="container">

	<div id="content">

		<div class="smoothBaby smooth-fadeInDown">

			<?php // Uncomment to use Featured Image.
			   // get_template_part( 'template-parts/featured-image' );
			   // echo "Doing featured image";
			?>

			<?php // Uncomment to use Banner Slider
				$banner_slide_tag = 'homepage';
				include( locate_template( 'parts/flickity-banner.php' ) );
			?>
		</div>

		<div id="inner-content" class="row">

		    <main id="main" class="large-8 medium-8 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>

			    <?php endwhile; endif; ?>

			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
</div>
<?php get_footer(); ?>
