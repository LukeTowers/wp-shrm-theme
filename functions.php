<?php
/*
Theme Name: SHRM 2016
Theme URI: http://dev.shrsmk.com
Author: Fusion Online
Author URI: http://fusiononline.ca
Description: This is a responsive theme designed for Souls Harbour Rescue Mission. Non-authorized use prohibited.
Template Prefix: SHRM_2016 (Souls Harbour Rescue Mission 2016)
Version: 0.1
*/

//************************************************************************************************
// Section: 		Template Setup
// Description:		
//************************************************************************************************

// Setup template path
define('SHRM_2016_TEMPLATE_PATH', get_template_directory() . '/');

// Setup template url
define('SHRM_2016_TEMPLATE_URL', get_template_directory_uri());



//************************************************************************************************
// Section: 		Theme Support Module
// Description:		Module that manages options that the theme supports
//************************************************************************************************

require_once(SHRM_2016_TEMPLATE_PATH . 'includes/modules/theme-support.php');



//************************************************************************************************
// Section: 		Theme Resources
// Description:		Loads the required scripts and styles for the theme
//************************************************************************************************

require_once(SHRM_2016_TEMPLATE_PATH . 'includes/modules/resource-loader.php');



//************************************************************************************************
// Section: 		Template Part Manager
// Description:		Module that manages the template components used by this theme
//************************************************************************************************

require_once(SHRM_2016_TEMPLATE_PATH . 'includes/modules/template-parts/template-part-manager.php');



//************************************************************************************************
// Section: 		Widget Areas Module
// Description:		Module that manages template's widget areas (sidebars)
//************************************************************************************************

require_once(SHRM_2016_TEMPLATE_PATH . 'includes/modules/widget-areas.php');



//************************************************************************************************
// Section: 		Metaboxes
// Description:		Module that handles the theme's metaboxes
//************************************************************************************************

require_once(SHRM_2016_TEMPLATE_PATH . 'includes/modules/metaboxes.php');