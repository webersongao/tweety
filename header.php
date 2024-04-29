<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'hostucan' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/index.js"></script>
<style type="text/css">
<?php $color_options = hostucan_get_options(); 
$b_c = $color_options->hostucan_background_color;
$t_c = $color_options->hostucan_text_color;
$l_c = $color_options->hostucan_links_color;
$s_c = $color_options->hostucan_sidebar_color;
$sb_c = $color_options->hostucan_sidebar_border_color;
?>

body {
  background-color: <?php echo html2rgb($b_c, 1); ?>;
  color: <?php echo html2rgb($t_c); ?>;
}

#main {
  background-color: <?php echo html2rgb($s_c, 0.9); ?>;
}

.commentlist li.comment:hover,
.commentlist .pingback:hover,
#container .teaser .hentry:hover,
html #container .teaser .focused:hover
{
	background-color: <?php echo html2rgb($l_c, 0.1); ?>;
  border-color: <?php echo html2rgb($l_c, 0.15); ?>;
}

a,
.menu ul  li:hover  .children li a,
.menu ul li:hover  .children li:hover .children a,
#container .teaser .hentry:hover .entry-meta a,
#container .teaser .hentry:hover .entry-date,
.teaser .hentry:active .entry-title a,
.teaser .hentry:hover .entry-title a{
	color: <?php echo html2rgb($l_c); ?>;
}

#content .page-title {
	background-color: <?php echo html2rgb($l_c, 0.2); ?>;
  border-color: <?php echo html2rgb($l_c, 0.25); ?>;
}

</style>
<!--[if lte IE 8]>
<style type="text/css">

body {
  background-color: <?php echo html2rgb($b_c, 1, false); ?>;
  color: <?php echo html2rgb($t_c1, 1, false); ?>;
}

#main {
  background-color: <?php echo html2rgb($s_c, 0.9, false); ?>;
}

.commentlist li.comment:hover,
.commentlist .pingback:hover,
#container .teaser .hentry:hover,
html #container .teaser .focused:hover
{
	background-color: <?php echo html2rgb($l_c, 0.1, false); ?>;
  border-color: <?php echo html2rgb($l_c, 0.15, false); ?>;
}

a,
.menu ul  li:hover  .children li a,
.menu ul li:hover  .children li:hover .children a,
#container .teaser .hentry:hover .entry-meta a,
#container .teaser .hentry:hover .entry-date,
.teaser .hentry:active .entry-title a,
.teaser .hentry:hover .entry-title a{
	color: <?php echo html2rgb($l_c, 1, false); ?>;
}

#content .page-title {
	background-color: <?php echo html2rgb($l_c, 0.2, false); ?>;
  border-color: <?php echo html2rgb($l_c, 0.25, false); ?>;
}

</style>
<![endif]-->
<script type="text/javascript">
var hostucan_pane_type = "<?php echo $color_options->hostucan_pane_type ?>";
</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="main">
    <div id="pane-outer">
      <div id="pane-wrap">
        <div id="pane-shell">
          <div id="pane-base"></div>
          <div id="pane">
          
            <div class="pane-toolbar">
              <a class="pane-close toolbar-control" href="javascript:void(0)">close <span>&times;</span></a>
              <br style="clear: both">
            </div>
            <div class="pane-components">
            </div>
          </div>
        </div>
      </div>
    </div>
