<?php

if ( ! isset( $content_width ) )
	$content_width = 540;

add_action( 'after_setup_theme', 'hostucan_setup' );

if ( ! function_exists( 'hostucan_setup' ) ):
function hostucan_setup() {
  // Multiple Language Support 
  load_theme_textdomain( 'hostucan', TEMPLATEPATH . '/languages' );
  
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 48, 48, true );
  add_theme_support( 'automatic-feed-links' );
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'hostucan' ),
	) );

	add_custom_background();
}
endif;

require_once ( get_template_directory() . '/color-scheme.php' );

function hostucan_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'hostucan_excerpt_length' );

function hostucan_auto_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'hostucan_auto_excerpt_more' );

function hostucan_get_options() {
  return (object)(array(
    'hostucan_background_color' => get_option( 'hostucan_background_color', 'C0DEED' ),
    'hostucan_text_color' => get_option( 'hostucan_text_color', '333333' ),
    'hostucan_links_color' => get_option( 'hostucan_links_color', '0084B4' ),
    'hostucan_sidebar_color' => get_option( 'hostucan_sidebar_color', 'DDEEF6' ),
    'hostucan_sidebar_border_color' => get_option( 'hostucan_sidebar_border_color', 'C0DEED' ),
    'hostucan_pane_type' => get_option('hostucan_pane_type', 'slide-right'),
    ));
};

function html2rgb($color, $opacity = 1, $rgba = true){
    if ($color[0] == '#') 
       $color = substr($color, 1);
    if (strlen($color) == 6)
       list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    else
        return false;
    //$key = 1/255; // use this to get a range from 0 to 1 eg: (0.5, 1, 0.1)
    $key = 1; // use this for normal range 0 to 255 eg: (0, 255, 50)
    $r = hexdec($r)*$key;
    $g = hexdec($g)*$key;
    $b = hexdec($b)*$key;
    if($rgba){
        return "rgba($r, $g, $b, $opacity)";
    }else{
        $r = (int)($opacity * $r + 255 * (1 - $opacity));
        $g = (int)($opacity * $g + 255 * (1 - $opacity));
        $b = (int)($opacity * $b + 255 * (1 - $opacity));
        return "rgb($r, $g, $b)";
    }
}
    
if ( ! function_exists( 'hostucan_comment' ) ) :
function hostucan_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 48 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'hostucan' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'hostucan' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'hostucan' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'hostucan' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'hostucan' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'hostucan' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

function hostucan_widgets_init() {
  // Dashboard Top
  register_sidebar( array(
    'name' => 'Dashboard Top Area',
    'id' => 'dashboard-top-area',
    'description' => 'Top of right panel, In twitter, this is where shows Your twitter count & lastest one twitter.', 
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ) );
  
  // Dashboard Left
  register_sidebar( array(
    'name' => 'Dashboard Left Area',
    'id' => 'dashboard-left-area',
    'description' => 'Top of right panel, In twitter, this is where shows Your following.', 
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ) );
  
  // Dashboard Right
  register_sidebar( array(
    'name' => 'Dashboard Right Area',
    'id' => 'dashboard-right-area',
    'description' => 'Top of right panel, In twitter, this is where shows Your followers.', 
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ) );
  
  // Dashboard Footer
  register_sidebar( array(
    'name' => 'Dashboard Footer Area',
    'id' => 'dashboard-footer-area',
    'description' => 'Top of right panel, In twitter, this is where copyrights.', 
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ) );

}
add_action( 'widgets_init', 'hostucan_widgets_init' );

function hostucan_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'hostucan_remove_recent_comments_style' );

if ( ! function_exists( 'hostucan_posted_on' ) ) :
function hostucan_posted_on() {
	printf( __( '%1$s <span class="meta-sep">by</span> %2$s', 'hostucan' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'hostucan' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'hostucan_posted_in' ) ) :
function hostucan_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
  if($tag_list) { ?>
    <div class="meta-data">
      <strong><?php print(__('Tags:', 'hostucan')) ?> </strong>
      <?php echo $tag_list ?>
    </div>
  <?php } 
  if(is_object_in_taxonomy( get_post_type(), 'category' )) { ?>
    <div class="meta-data">
      <strong><?php print(__('Categories:', 'hostucan')) ?></strong>
      <?php echo get_the_category_list( ', ' ) ?>
    </div>
  <?php } 
}

endif;

function hostucan_admin_bar() {
	global $wp_admin_bar;
  if(!is_user_logged_in()) {
    $wp_admin_bar->add_menu( array(
    'id' => 'main_menu',
    'title' => __( 'Start Menu', 'hostucan'),
    'href' => FALSE ) );
    $wp_admin_bar->add_menu( array(
    'parent' => 'main_menu',
    'title' => __( 'Login', 'hostucan'),
    'href' => wp_login_url() ) );
    $wp_admin_bar->add_menu( array(
    'parent' => 'main_menu',
    'title' => __( 'Visit HostUCan', 'hostucan'),
    'href' => 'http://hostucan.com/' ) );
  }
}


show_admin_bar(true);

add_action( 'wp_head', 'hostucan_admin_bar' );


function hostucan_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'hostucan_page_menu_args' );