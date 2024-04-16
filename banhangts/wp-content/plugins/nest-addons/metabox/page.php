<?php
return array(
	'title'      => 'Nest Setting',
	'id'         => 'nest_page_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page'),
	'sections'   => array(
		require NEST_ADDONS_DIR . '/metabox/options/pageheader.php',
		require NEST_ADDONS_DIR . '/metabox/options/general.php',

		
	),
);