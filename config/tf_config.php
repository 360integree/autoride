<?php

/******************************************************************************/
/******************************************************************************/

define('PLUGIN_THEME_FONT_SKIN_OPTION_NAME','as_skin');

$path='/multisite/'.get_current_blog_id().'/style/';

TFData::set('theme_path_multisite_style',get_template_directory().$path);
TFData::set('theme_url_multisite_style',get_template_directory_uri().$path);

TFData::set('responsive_mode',array(1240,960,768,480));
TFData::set('responsive_mode_enable',1);

/******************************************************************************/
/******************************************************************************/