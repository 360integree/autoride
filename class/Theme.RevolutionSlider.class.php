<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeRevolutionSlider
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function getAllSlider()
	{
		$Plugin=new Autoride_ThemePlugin();
		if(!$Plugin->isActive('RevSliderSlider')) return(array());
		
		$Slider=new RevSlider();
		return($Slider->getAllSliderForAdminMenu());		
	}
	
	/**************************************************************************/
	
	function getSliderDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$slider=$this->getAllSlider();
		
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autoride'));

		if(count($slider))
		{
			foreach($slider as $sliderData)
				$data[$sliderData['alias']]=array($sliderData['title']);
		}
		
		return($data);
	}
	
	/**************************************************************************/
	
	function init()
	{
		if(function_exists('set_revslider_as_theme'))
			set_revslider_as_theme();
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/