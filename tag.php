<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<?php get_template_part( 'page-header' ); ?>

				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'hostucan' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
