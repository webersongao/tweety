<?php

add_action( 'admin_init', 'color_scheme_init' );
add_action( 'admin_menu', 'color_scheme_add_page' );

function color_scheme_init(){
	register_setting( 'theme_options', 'hostucan_background_color');
  register_setting( 'theme_options', 'hostucan_text_color');
  register_setting( 'theme_options', 'hostucan_links_color');
  register_setting( 'theme_options' , 'hostucan_sidebar_color');
  register_setting( 'theme_options' , 'hostucan_sidebar_border_color');
  
  register_setting( 'theme_options' , 'hostucan_pane_type');
}

function color_scheme_add_page() {
	add_theme_page( __( 'Hostucan Tweety Config', 'hostucan' ), __( 'Theme Config', 'hostucan' ), 'edit_theme_options', 'hostucan_config', 'hostucan_config_page' );
}

function hostucan_config_page() {
  $options = hostucan_get_options();
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Color Scheme' ) . "</h2>"; ?>
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/admin.css" /> 
    <script src="<?php echo bloginfo('template_url') . '/jscolor/jscolor.js' ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/admin.js"></script>
		<form method="post" action="options.php">
      <h3><?php echo __('Built-In Themes', 'hostucan') ?></h3>
      <div id="built-in-themes"></div>
      <h3><?php echo __('Customize Colors', 'hostucan') ?></h3>
			<?php settings_fields( 'theme_options' ); ?>
      <table class="form-table">
        <tr>
          <th><?php echo __('Background Color:', 'hostucan') ?></th>
          <td><input type="text" id="hostucan_background_color" name="hostucan_background_color" class="color" 
            value="<?php echo $options->hostucan_background_color ?>" /></td>
        </tr>
        <tr>
          <th><?php echo __('Text Color:', 'hostucan') ?> </th>
          <td><input type="text" id="hostucan_text_color" name="hostucan_text_color" class="color" 
            value="<?php echo $options->hostucan_text_color ?>" /></td>
        <tr>
          <th><?php echo __('Links Color:', 'hostucan') ?> </th>
          <td><input type="text" id="hostucan_links_color" name="hostucan_links_color" class="color" 
            value="<?php echo $options->hostucan_links_color ?>" /></td>
        </tr>
        <tr>
          <th><?php echo __('Sidebar Color:', 'hostucan') ?> </th>
          <td><input type="text" id="hostucan_sidebar_color" name="hostucan_sidebar_color" class="color" 
            value="<?php echo $options->hostucan_sidebar_color ?>" /></td>
        </tr>
        <tr>
          <th><?php echo __('Sidebar Border Color:', 'hostucan') ?> </th>
          <td><input type="text" id="hostucan_sidebar_border_color" name="hostucan_sidebar_border_color" class="color"
            value="<?php echo $options->hostucan_sidebar_border_color ?>" /></td>
        </tr>
      </table>
      <h3><?php echo __('Right Pane Display Animation', 'hostucan') ?></h3>
      <div id="hostucan-pane-type-area">
      <?php $pane_types = array(
        'none' => __("No Animation", 'hostucan'), 
        'slide-right' => __("Slide Right (Twitter Style)", 'hostucan'),
        'fade' => __('Fade', 'hostucan')
        );
        
        foreach($pane_types as $key => $text) { ?>
          <p><input type="radio" name="hostucan_pane_type" id="hostucan_pane_type_<?php echo $key ?>" value="<?php echo $key ?>"
            <?php echo $options->hostucan_pane_type == $key ? 'checked="checked"' : '' ?>>
            <label for="hostucan_pane_type_<?php echo $key ?>" value="<?php echo $key ?>">
              <?php echo $text ?>
            </label>
          </p>
        <?php } ?>
      </div>
      <p><input type="submit" id="hostucan-save-config" class="button-primary" value="<?php echo __( 'Save Options', 'hostucan'); ?>" /></p>
    </form>
    </div>
	<?php
}
