<?php
/**
*Template Name: Home Page
*
* @package btn
*/

get_header(); ?>

		<div class="flexslider">

			<?php
			//Alter the original query
			query_posts(
				array(
					//An array that keys the query to the below tags.
					'post_type' => 'slides',
					//Allows only 4 'slide' custom posts to display.
					'posts_per_page' => '4',
					//Displays the 'slides' custom posts in a random order.
					'byorder' => 'rand'));

			?>

			<?php

			if(have_posts()) : while(have_posts()) : the_post();

			?>

					<ul class="slides">
					    <li>
					    	<div class="slide-thumbnail">
					      		<?php 
					      		//Displays the post thumbnail.
					      		the_post_thumbnail(); 
					      		?>
					      	</div>
					      	<div class="slide-txt">
					      		<!-- Displays the title of the custom 'slides' post and links the title to the rest of the content.-->
					      		<a href="<?php the_permalink(); ?>" class="promoted-title"><?php the_title(); ?> </a>
					      		<!-- Creates the slide's 'Find Out More' text and links the text to the rest of the content.-->
								<a href="<?php the_permalink(); ?>" class="learnmore">Find Out More</a>
					      	</div>
					    </li>
					</ul>

			<?php
				endwhile;
				endif;
			?>
		</div>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<?php
			//Set the category and number of posts to display on the page.
			$args = array (
				'cat' => '8',
				//Display only 6 posts per page.
				'posts_per_page' => 6, 
				//Display posts in the 'Promoted' Category in ascending order.
				'byorder' => 'ASC'
			);
			query_posts($args)
		?>

			<?php 
				while ( have_posts() ) : the_post(); 
				// start the Loop
			?>

			<div class="entry-content-featured">
					<?php 
					//Displays the post thumbnail.
					the_post_thumbnail(); 
					?>
					<div class="entry-content-wrap">
			      		<!-- Displays the title of the post and links to the rest of the content.-->
					    <a href="<?php the_permalink(); ?>" class="promoted-title"><?php the_title(); ?> </a>
						<?php 
						//Gets an excerpt of the post.
						the_excerpt();
						?>
						<!-- Creates the 'Find Out More' text and links to the rest of the content.-->
						<a href="<?php the_permalink(); ?>" class="learnmore">Find Out More</a>	
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