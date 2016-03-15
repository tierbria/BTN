<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package btn
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		?>

			<div class="post-content">
				<div class="post-thumbnail">
					<?php 
					//Gets the page thumbnail
					the_post_thumbnail(); 
					?>
				</div>
				<?php 
				//Gets the page title
				the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); 
				?>
				<div class="post-txt">
					<?php 
					//Gets the page content
					the_content();
					?>
				</div>

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
