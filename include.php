<?php

/******************************************************************************/
/******************************************************************************/

require_once(get_template_directory().'/define.php');

/******************************************************************************/

require_once(AUTORIDE_THEME_PATH_CLASS.'Theme.File.class.php');
require_once(AUTORIDE_THEME_PATH_CLASS.'Theme.Include.class.php');

Autoride_ThemeInclude::includeClass(AUTORIDE_THEME_PATH_CLASS.'Walker_Nav_Menu.php',array('Walker_Nav_Menu_Edit_Custom'));

Autoride_ThemeInclude::includeFileFromDir(AUTORIDE_THEME_PATH_CLASS,array('Walker_Nav_Menu.php'));

Autoride_ThemeInclude::includeClass(AUTORIDE_THEME_PATH_LIBRARY.'tgm_plugin_activation/class-tgm-plugin-activation.php',array('TGM_Plugin_Activation'));

/******************************************************************************/
/******************************************************************************/