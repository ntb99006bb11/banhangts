<?php
return array(
	'title'      => 'Nest  Setting',
	'id'         => 'nest_post_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array('product'),
	'sections'   => array(

		
        require NEST_ADDONS_DIR . '/metabox/options/general.php',
		require NEST_ADDONS_DIR . '/metabox/options/pageheader.php',
		require NEST_ADDONS_DIR . '/metabox/options/product-single-style.php',
		
        require NEST_ADDONS_DIR . '/metabox/options/product.php',
        require NEST_ADDONS_DIR . '/metabox/options/product-hover.php',
        require NEST_ADDONS_DIR . '/metabox/options/product-deals.php',
        require NEST_ADDONS_DIR . '/metabox/options/product-data.php',
		require NEST_ADDONS_DIR . '/metabox/options/product-message.php',
		require NEST_ADDONS_DIR . '/metabox/options/product-video.php',
	),
);