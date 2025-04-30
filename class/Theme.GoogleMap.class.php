<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeGoogleMap
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->zoomControlStyle=array
		(
			'DEFAULT'=>__('Default','autoride'),
			'SMALL'=>__('Small','autoride'),
			'LARGE'=>__('Large','autoride')
		);

		$this->mapTypeControlStyle=array
		(
			'DEFAULT'=>__('Default','autoride'),
			'HORIZONTAL_BAR'=>__('Horizontal Bar','autoride'),
			'DROPDOWN_MENU'=>__('Dropdown Menu','autoride')
		);

		$this->position=array
		(
			'TOP_CENTER'=>__('Top center','autoride'),
			'TOP_LEFT'=>__('Top left','autoride'),
			'TOP_RIGHT'=>__('Top right','autoride'),
			'LEFT_TOP'=>__('Left top','autoride'),
			'RIGHT_TOP'=>__('Right top','autoride'),
			'LEFT_CENTER'=>__('Left center','autoride'),
			'RIGHT_CENTER'=>__('Right center','autoride'),
			'LEFT_BOTTOM'=>__('Left bottom','autoride'),
			'RIGHT_BOTTOM'=>__('Right bottom','autoride'),
			'BOTTOM_CENTER'=>__('Bottom center','autoride'),
			'BOTTOM_LEFT'=>__('Bottom left','autoride'),
			'BOTTOM_RIGHT'=>__('Bottom right','autoride')
		);

		$this->mapTypeId=array
		(
			'ROADMAP'=>__('Roadmap','autoride'),
			'SATELLITE'=>__('Satellite','autoride'),
			'HYBRID'=>__('Hybrid','autoride'),
			'TERRAIN'=>__('Terrain','autoride'),
			'CUSTOM_MAP'=>__('Custom styled map','autoride')
		);	
	}
	
	/**************************************************************************/
	
	function getZoomControlStyle()
	{
		return($this->zoomControlStyle);
	}
	
	/**************************************************************************/
	
	function getMapTypeControlStyle()
	{
		return($this->mapTypeControlStyle);
	}
   
	 /**************************************************************************/
	
	function getPosition()
	{
		return($this->position);
	}
	
	/**************************************************************************/
	
	function getMapTypeId()
	{
		return($this->mapTypeId);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/