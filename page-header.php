<div class="page-header home-header">
    <?php if(is_front_page()) { ?>
      <h1 class="site-name"><?php bloginfo( 'name' ); ?></h1>
    <?php } else { ?>
      <h2 class="site-name"><?php bloginfo( 'name' ); ?></h2>
    <?php } ?>
		<?php wp_nav_menu( array( 'container_class' => 'menu-header') ); ?>
</div>