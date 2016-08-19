<?php
/*
*
* Template Name: Gallery Page Template
*
*/
$gallery_tag = "gallery";

get_header(); ?>

<h1>page-gallery.php template</h1>

<div class="container">

	<div id="content">

		<div id="inner-content" class="row">

		    <main id="main" class="large-8 medium-8 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php include( locate_template( 'parts/flickity-gallery.php' ) ); ?>

			    <?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
</div>
<?php get_footer(); ?>
