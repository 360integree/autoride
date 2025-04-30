<?php
/* 
Plugin Name: AutoRide
Plugin URI: 
Description: AutoRide Core Plugin 
Author: QuanticaLabs
Version: 1.0
Author URI: http://quanticalabs.com
*/

$theme=wp_get_theme();
$themeName=strtolower($theme->get('Name'));

$parent=is_object($theme->parent()) ? $theme->parent() : null;
$parentName=strtolower(is_null($parent) ? null : $parent->get('Name'));

if(($themeName=='autoride') || ($parentName=='autoride'))
{
    require_once('include.php');

    $Plugin=new ARCAutorideCore();

    register_activation_hook(__FILE__,array($Plugin,'pluginActivation'));

    add_action('init',array($Plugin,'init'));
    add_action('after_setup_theme',array($Plugin,'setupTheme'));

    if(!is_admin())
    {
        add_action('wp_enqueue_scripts',array($Plugin,'publicInit'));
    }
}	