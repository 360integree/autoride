<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeCarouFredSel
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->scrollFX=array
		(
			'none'=>__('None','autoride'),
			'scroll'=>__('Scroll','autoride'),
			'directscroll'=>__('Directscroll','autoride'),
			'fade'=>__('Fade','autoride'),
			'crossfade'=>__('Crossfade','autoride'),
			'cover'=>__('Cover','autoride'),
			'cover-fade'=>__('Cover-fade','autoride'),
			'uncover'=>__('Uncover','autoride'),
			'uncover-fade'=>__('Uncover-fade','autoride')
		);
		
		$this->pauseOnHover=array
		(
			'resume'=>__('Resume','autoride'),
			'immediate'=>__('Immediate','autoride'),
			'immediate-resume'=>__('Immediate and resume','autoride')
		);
		
		$this->direction=array
		(
			'left'=>__('Left','autoride'),
			'right'=>__('Right','autoride')
		);		
	}
	
	/**************************************************************************/
	
	function getPauseOnHover()
	{
		return($this->pauseOnHover);
	}
	
	 /**************************************************************************/
	
	function getScrollFX()
	{
		return($this->scrollFX);
	}
	
	/**************************************************************************/
	
	function getDirection()
	{
		return($this->direction);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/