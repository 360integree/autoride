<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeEasing
{
	/**************************************************************************/
	
	function __construct()
	{		
		$this->easingType=array
		(
			'swing'=>__('swing','autoride'),
			'easeInQuad'=>__('easeInQuad','autoride'),
			'easeOutQuad'=>__('easeOutQuad','autoride'),
			'easeInOutQuad'=>__('easeInOutQuad','autoride'),
			'easeInCubic'=>__('easeInCubic','autoride'),
			'easeOutCubic'=>__('easeOutCubic','autoride'),
			'easeInOutCubic'=>__('easeInOutCubic','autoride'),
			'easeInQuart'=>__('easeInQuart','autoride'),
			'easeOutQuart'=>__('easeOutQuart','autoride'),
			'easeInOutQuart'=>__('easeInOutQuart','autoride'),
			'easeInOutQuart'=>__('easeInOutQuart','autoride'),
			'easeInQuint'=>__('easeInQuint','autoride'),
			'easeOutQuint'=>__('easeOutQuint','autoride'),
			'easeInOutQuint'=>__('easeInOutQuint','autoride'),
			'easeInSine'=>__('easeInSine','autoride'),
			'easeOutSine'=>__('easeOutSine','autoride'),
			'easeInOutSine'=>__('easeInOutSine','autoride'),
			'easeInExpo'=>__('easeInExpo','autoride'),
			'easeOutExpo'=>__('easeOutExpo','autoride'),
			'easeInOutExpo'=>__('easeInOutExpo','autoride'),
			'easeInCirc'=>__('easeInCirc','autoride'),
			'easeOutCirc'=>__('easeOutCirc','autoride'),
			'easeInOutCirc'=>__('easeInOutCirc','autoride'),
			'easeInElastic'=>__('easeInElastic','autoride'),
			'easeOutElastic'=>__('easeOutElastic','autoride'),
			'easeInOutElastic'=>__('easeInOutElastic','autoride'),
			'easeInBack'=>__('easeInBack','autoride'),
			'easeOutBack'=>__('easeOutBack','autoride'),
			'easeInOutBack'=>__('easeInOutBack','autoride'),
			'easeInBounce'=>__('easeInBounce','autoride'),
			'easeOutBounce'=>__('easeOutBounce','autoride'),
			'easeInOutBounce'=>__('easeInOutBounce','autoride')
		);	
	}
	
	/**************************************************************************/
	
	function getEasingType()
	{
		return($this->easingType);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/