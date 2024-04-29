<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php hostucan_posted_on(); ?>
					</div><!-- .entry-meta -->
          <div class="entry-utility">
            <?php edit_post_link( __( 'Edit', 'hostucan' ), ' <span class="edit-link">', '</span>' ); ?>
          </div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hostucan' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

			<?php hostucan_posted_in(); ?>
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>