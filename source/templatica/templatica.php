<?php
/* 
Plugin Name: Templatica - WPBakery Page Builder Templates Manager
Plugin URI: https://codecanyon.net/user/quanticalabs/portfolio?ref=QuanticaLabs
Description: Templatica is lightweight WordPress plugin crafted for creating and managing templates of WPBakery Page Builder.
Author: QuanticaLabs
Version: 1.1
Author URI: https://codecanyon.net/user/quanticalabs/portfolio?ref=QuanticaLabs
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain('templatica',false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$Templatica=new Templatica();

register_activation_hook(__FILE__,array($Templatica,'pluginActivation'));

add_action('init',array($Templatica,'init'));
add_action('admin_init',array($Templatica,'adminInit'));
add_action('admin_menu',array($Templatica,'adminMenu'));
add_action('widgets_init',array($Templatica,'widgetsInit'));
add_action('after_setup_theme',array($Templatica,'afterSetupTheme'));