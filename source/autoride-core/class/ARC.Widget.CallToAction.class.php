<?php

/******************************************************************************/
/******************************************************************************/

class ARCWidgetCallToAction extends ARCWidget 
{
	
	/**************************************************************************/
	
	function __construct() 
	{
		parent::__construct('autoride_widget_call_to_action',sprintf(__('(%s theme) Call To Action','autoride-core'),AUTORIDE_THEME_NAME),array('description'=>__('Displays call to action box.','autoride-core')),array());
	}
	
	/**************************************************************************/
	
	function widget($argument,$instance) 
	{		
		$argument['_data']['file']='widget_call_to_action.php';
		parent::widget($argument,$instance);
	}
	
	/**************************************************************************/
	
	function update($new_instance,$old_instance) 
	{
		$instance=array();
		$instance['style']=$new_instance['style'];
		$instance['icon']=$new_instance['icon'];
		$instance['header']=$new_instance['header'];
		$instance['subheader']=$new_instance['subheader'];
		$instance['button_style']=$new_instance['button_style'];
		$instance['button_label']=$new_instance['button_label'];
		$instance['button_url']=$new_instance['button_url'];
		$instance['button_url_target']=$new_instance['button_url_target'];
		$instance['align']=$new_instance['align'];
		$instance['css_class']=$new_instance['css_class'];
		return($instance);
	}
	
	/**************************************************************************/
	
	function form($instance) 
	{	
		$instance['_data']['file']='widget_call_to_action.php';
		$instance['_data']['field']=array('style','icon','header','subheader','button_style','button_label','button_url','button_url_target','align','css_class');
		parent::form($instance);
	}
	
	/**************************************************************************/
	
	function register($class=null)
	{
		parent::register(is_null($class) ? get_class() : $class);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/