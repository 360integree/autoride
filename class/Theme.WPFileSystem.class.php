<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeWPFileSystem
{
	/**************************************************************************/
	
	function __construct() 
	{
		global $wp_filesystem;
		
		if(empty($wp_filesystem))
		{
			require_once(ABSPATH.'/wp-admin/includes/file.php');
			WP_Filesystem();
		}
	}
	
	/**************************************************************************/
	
	function put_contents($path,$content,$mode)
	{
		global $wp_filesystem;
		return($wp_filesystem->put_contents($path,$content,$mode));
	}
	
	/**************************************************************************/
	
	function get_contents($path)
	{
		ob_start();
		include($path);
		$content=ob_get_contents();
		ob_end_clean();
		return($content);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/