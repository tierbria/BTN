<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package btn
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			?>

			<div class="entry-content-featured">
					<?php 
					//Displays the post thumbnail.
					the_post_thumbnail(); 
					?>
					<div class="entry-content-wrap">
					    <a href="<?php the_permalink(); ?>" class="promoted-title"><?php the_title(); ?> </a>
					      		<!-- Creates the slide's 'Find Out More' text and links the text to the rest of the content.-->
						<?php 
						//Gets an excerpt of the post.
						the_excerpt();
						?>
						<a href="<?php the_permalink(); ?>" class="learnmore">Find Out More</a>	

					</div>
			</div>

			<?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
