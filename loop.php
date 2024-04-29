<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'hostucan' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'hostucan' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<div class="teaser">
<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display all other posts. */ ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>      
    <div class="post-thumbnail">
      <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail();
        } else { ?>
        <img width="48" height="48"
        title="To change this icon, please add featured image for post ."
        src="<?php echo bloginfo('template_url'); ?>/images/thumbnail.png" />
      <?php } ?>
      </div>
      <div class="post-item">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hostucan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="show-full-entity">&raquo;</div>
        <div class="excerpt"><?php the_excerpt(); ?></div>        
        <div class="entry-meta">
          <?php hostucan_posted_on(); ?>
        </div><!-- .entry-meta -->
        
        <div class="entry-utility">
          <?php if ( count( get_the_category() ) ) : ?>
            <span class="cat-links">
              <i></i><?php printf( __( '%1$s', 'hostucan' ), get_the_category_list( ', ' ) ); ?>
            </span>
          <?php endif; ?>
          <span class="comments-link"><i></i><?php comments_popup_link( __( 'Leave a comment', 'hostucan' ), __( '1 Comment', 'hostucan' ), __( '% Comments', 'hostucan' ) ); ?></span>
          <?php edit_post_link( __( 'Edit', 'hostucan' ), ' <span class="edit-link"><i></i>', '</span>' ); ?>
        </div><!-- .entry-utility -->
        
      </div>

		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>
<?php endwhile; // End the loop. Whew. ?>

</div><!-- end of teaser -->

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&#x00ab;</span> Older posts', 'hostucan' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&#x00bb;</span>', 'hostucan' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
