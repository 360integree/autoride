<?php

/******************************************************************************/
/******************************************************************************/

class ARCWidgetVehicleAttribute extends ARCWidget 
{
	
	/**************************************************************************/
	
	function __construct() 
	{
		parent::__construct('autoride_widget_vehicle_attribute',sprintf(__('(%s theme) Vehicle Attributes','autoride-core'),AUTORIDE_THEME_NAME),array('description'=>__('Displays vehicle attributes. Widget works on vehicle details page only.','autoride-core')),array());
	}
	
	/**************************************************************************/
	
	function widget($argument,$instance) 
	{
		$argument['_data']['file']='widget_vehicle_attribute.php';
		parent::widget($argument,$instance);
	}
	
	/**************************************************************************/
	
	function update($new_instance,$old_instance) 
	{
		$instance=array();
		$instance['title']=$new_instance['title'];
		$instance['booking_form_page_address']=$new_instance['booking_form_page_address'];
		return($instance);
	}
	
	/**************************************************************************/
	
	function form($instance) 
	{	
		$instance['_data']['file']='widget_vehicle_attribute.php';
		$instance['_data']['field']=array('title','booking_form_page_address');
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