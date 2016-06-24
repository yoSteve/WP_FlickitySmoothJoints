<?php get_header(); ?>

<h1>single.php template</h1>

<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="large-8 medium-8 columns smoothBaby smooth-fadeInUp" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>

		    <?php endwhile; else : ?>

				<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
