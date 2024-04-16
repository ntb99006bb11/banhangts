<?php
/*
**   ==============================   
**    Nest Ecommerce Function File
**   ==============================
*/ 
//Mobile Detect
require_once get_template_directory() . '/includes/lib/Mobile_Detect.php';
/*
==========================================
Metabox admin styles
==========================================
*/

function isMobile() {
    if ( ! class_exists( 'Mobile_Detect' ) ) {
        return false;
    }
    $detect = new Mobile_Detect;
    $mobile = false;
    if( $detect->isMobile() || $detect->isTablet() ){
        $mobile = true;
    }
    return $mobile;
}
require get_template_directory() . '/includes/functions/theme.php';

 // ============================== theme update ============================
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
if(class_exists('Nest_update')):
$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://themepanthers.com/updatedplugin/nest/theme.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'nest-theme-update'
);
endif;
// ============================== theme update ============================


