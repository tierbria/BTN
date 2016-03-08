<?php
/**
*Template Name: Home Page
*
*@package Fluffy
*/

get_header(); ?>

			<div id="promoted">
				<?php
				query_posts(
					array(
						'post_type' => 'promoted',
						'posts_per_page' => 1));
				if(have_posts()) : while(have_posts()) : the_post();
				?>

				<div class="promoted-container">
					<?php the_post_thumbnail(); ?>
					<a href="#" class="promoted-title"><?php the_title(); ?> </a>
					<?php the_excerpt(); ?>
					<a href="#" class="learnmore">Learn More</a>
				</div>

				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</div>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<?php
			//This code sets the category and number of posts to display on the page.
			$args = array (
				'cat' => 4,
				'posts_per_page' => 6, 
			);
			query_posts($args)
		?>

			<?php 
				while ( have_posts() ) : the_post(); 
				// start the Loop
			?>

			<div class="entry-content-featured">
					<?php the_post_thumbnail(); ?>
					<div class="entry-content-wrap">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>			
						<?php the_excerpt();?>
					</div>
			</div>

			<?php
				endwhile; 
				//end the Loop
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>