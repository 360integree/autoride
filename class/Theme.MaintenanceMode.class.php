<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeMaintenanceMode
{
	/**************************************************************************/

	function __construct()
	{
	
	}
	
	/**************************************************************************/
	
	function init()
	{
		if(is_admin()) return;
		
		if(Autoride_ThemeOption::getOption('maintenance_mode_enable')!=1) return;
		
		$user=wp_get_current_user();
		if(in_array($user->data->ID,(array)Autoride_ThemeOption::getOption('maintenance_mode_user_id'))) return;
	
		$page=get_post((int)Autoride_ThemeOption::getOption('maintenance_mode_post_id'));
		if(is_null($page)) return;
		
		add_action('wp_head',array($this,'filterWPHead'));
	}
	
	/**************************************************************************/
	
	function filterWPHead()
	{
		$page=get_post((int)Autoride_ThemeOption::getOption('maintenance_mode_post_id'));
		if(is_null($page)) return;	
		
		if($page->ID==get_the_ID())
		{
			add_filter('wp_headers',array($this,'filterWPHeader'));
			add_filter('status_header',array($this,'filterStatusHeader'),10,4);			
		}
		else
		{
			ob_start();
			wp_redirect(get_permalink($page->ID));
			ob_end_flush();
			exit;			
		}
	}

	/**************************************************************************/
	
	function filterStatusHeader($header,$status_code,$text,$proto)
	{
		$text=get_status_header_desc(503);
		return($proto.' 503 '.$text);		
	}
	
	/**************************************************************************/
	
	function filterWPHeader($headers)
	{
		$headers['Retry-After']=3600;
		return($headers);		
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/