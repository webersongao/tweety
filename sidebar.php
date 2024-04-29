		<div id="dashboard" class="widget-area" role="complementary">
    <?php if(is_active_sidebar('dashboard-top-area')) { ?>
        <div id="dashboard-top-area"> 
          <ul>
          <?php dynamic_sidebar('dashboard-top-area'); ?>
          </ul>
        </div>
      <?php } else { ?>
      <div id="dashboard-top-area">       
        <img style="float: left" width="32px" src="<?php echo bloginfo('template_url'); ?>/images/thumbnail.png" />
        <h2 style="float: left; clear: none; margin: 0 0 10px 10px;"><a href="<?php echo esc_url( __( 'http://www.hostucan.com/', 'hostucan') ); ?>"><?php echo __('@HostUCan', 'hostucan') ?></a></h2>
        <div style="clear: both">
          <p><?php echo __('A Next Generation Web Hosting Search And Review Platform', 'hostucan') ?><br />
          <em style="font-size: 11px"><?php echo __('(To change this area, put a widget at Dashboard Top Area.)', 'hostucan') ?></em><br />
          <em style="font-size: 11px"><?php echo __('(To change default thumbnail for post, add a featured image for each post.)', 'hostucan') ?></em></p>
        </div>
      </div>
      <?php } ?>
      
      <?php if(is_active_sidebar('dashboard-left-area')) { ?>        
        <div id="dashboard-left-area">
          <ul>
          <?php dynamic_sidebar('dashboard-left-area'); ?>
          </ul>
        </div>
      <?php } else { ?>
      <?php } ?>
      
      <?php if(is_active_sidebar('dashboard-right-area')) { ?>        
        <div id="dashboard-right-area">
          <ul>
          <?php dynamic_sidebar('dashboard-right-area'); ?>
          </ul>
        </div>
        <hr />
      <?php } else { ?>
      <?php } ?>
      
      <?php if(is_active_sidebar('dashboard-footer-area')) { ?>        
        <div id="dashboard-footer-area">
          <ul>
          <?php dynamic_sidebar('dashboard-footer-area'); ?>
          </ul>
        </div>
      <?php } else { ?>
      <?php } ?>
      <hr />
  
	<div id="footer" role="contentinfo">
		<div id="colophon">
			<div id="site-generator">
				<?php echo __('Powered by', 'hostucan') ?> <a href="<?php echo esc_url( __( 'http://www.hostucan.com/', 'hostucan') ); ?>" title="<?php esc_attr_e(__('Find Best Web Hosting With HostUCan', 'hostucan')); ?>" rel="generator"><?php echo __('hostucan', 'hostucan') ?></a>
			</div><!-- #site-generator -->
		</div><!-- #colophon -->
	</div><!-- #footer -->
  </div>
