<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeMetaIcon
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->style=array
		(
			'1'=>array(__('Style 1','autoride')),
			'2'=>array(__('Style 2','autoride')),
			'3'=>array(__('Style 3','autoride'))
		);	
		
		$this->meta=array
		(
			'arrow-horizontal'=>array(__('Arrow horizontal','autoride')),
			'arrow-horizontal-2'=>array(__('Arrow horizontal 2','autoride')),
			'arrow-horizontal-3'=>array(__('Arrow horizontal 3','autoride')),
			'arrow-vertical'=>array(__('Arrow vertical','autoride')),
			'arrow-vertical-2'=>array(__('Arrow vertical 2','autoride')),
			'arrow-vertical-3'=>array(__('Arrow vertical 3','autoride')),
			'cart'=>array(__('Cart','autoride')),
			'clock'=>array(__('Clock','autoride')),
			'close'=>array(__('Close','autoride')),
			'close-large'=>array(__('Close large','autoride')),
			'comment'=>array(__('Comment','autoride')),
			'display'=>array(__('Display','autoride')),
			'email'=>array(__('Email','autoride')),
			'folder'=>array(__('Folder','autoride')),
			'location'=>array(__('Location','autoride')),
			'menu'=>array(__('Menu','autoride')),
			'minus'=>array(__('Minus','autoride')),
			'minus-large'=>array(__('Minus large','autoride')),
			'mobile'=>array(__('Mobile','autoride')),
			'phone'=>array(__('Phone','autoride')),
			'plus'=>array(__('Plus','autoride')),
			'plus-large'=>array(__('Plus large','autoride')),
			'quote'=>array(__('Quote','autoride')),
			'search'=>array(__('Search','autoride')),
			'tag'=>array(__('Tag','autoride')),
			'thin-clock'=>array(__('Thin clock','autoride')),
			'thin-email-1'=>array(__('Thin email 1','autoride')),
			'thin-email-2'=>array(__('Thin email 2','autoride')),
			'thin-email-3'=>array(__('Thin email 3','autoride')),
			'thin-fax'=>array(__('Thin fax','autoride')),
			'thin-location-1'=>array(__('Thin location 1','autoride')),
			'thin-location-2'=>array(__('Thin location 2','autoride')),
			'thin-location-3'=>array(__('Thin location 3','autoride')),
			'thin-phone-1'=>array(__('Thin phone 1','autoride')),
			'thin-phone-2'=>array(__('Thin phone 2','autoride')),
			'thin-phone-3'=>array(__('Thin phone 3','autoride')),
			'thin-phone-4'=>array(__('Thin phone 4','autoride')),
			'tick-1'=>array(__('Tick 1','autoride')),
			'tick-2'=>array(__('Tick 2','autoride')),
			'tick-3'=>array(__('Tick 3','autoride'))
		);
	}
	
	/**************************************************************************/
	
	function getMeta()
	{
		return($this->meta);
	}

	/**************************************************************************/
	
	function isMeta($name)
	{
		return(array_key_exists($name,$this->meta));
	}
	
	/**************************************************************************/
	
	function getStyle()
	{
		return($this->style);
	}
	
	/**************************************************************************/
	
	function isStyle($name)
	{
		return(array_key_exists($name,$this->style));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/