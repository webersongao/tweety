<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<?php get_template_part( 'page-header' ); ?>

<?php
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'hostucan' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'hostucan' ), get_the_date( 'F Y' ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'hostucan' ), get_the_date( 'Y' ) ); ?>
<?php else : ?>
				<?php __( 'Blog Archives', 'hostucan' ); ?>
<?php endif; ?>
			</h1>

<?php
	 rewind_posts();
	 get_template_part( 'loop', 'archive' );
?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
