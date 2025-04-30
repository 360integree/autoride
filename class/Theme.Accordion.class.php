<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeAccordion
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->heightStyle=array
		(
			'auto'=>__('[Auto] All panels will be set to the height of the tallest panel','autoride'),
			'fill'=>__('[Fill] Expand to the available height based on the accordion\'s parent height','autoride'),
			'content'=>__('[Content] Each panel will be only as tall as its content','autoride'),
		);
	}
	
	/**************************************************************************/
	
	function getHeightStyle()
	{
		return($this->heightStyle);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/