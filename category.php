<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">
      
			<?php get_template_part( 'page-header' ); ?>

				<h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'hostucan' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
