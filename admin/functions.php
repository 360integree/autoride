<?php

/******************************************************************************/
/******************************************************************************/

$Theme=new Autoride_Theme();

add_action('admin_init',array($Theme,'adminInit'));
add_action('admin_menu',array($Theme,'adminMenuInit'));

add_action('wp_ajax_theme_admin_option_page_save',array($Theme,'adminOptionPanelSave'));

/******************************************************************************/
/******************************************************************************/