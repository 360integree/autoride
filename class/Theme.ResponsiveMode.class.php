<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeResponsiveMode
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->responsiveMode=array(1170,960,768,480);
	}
	
	/**************************************************************************/
	
	function getMedia()
	{
		$i=1;
		$media=array($i=>array());
		
		foreach($this->responsiveMode as $value)
		{
			$i++;
			
			$maxWidth=$value-1;
			$minWidth=isset($this->responsiveMode[$i-1]) ? $this->responsiveMode[$i-1] : 0;
			
			$media[$i]=array('min-width'=>$minWidth,'max-width'=>$maxWidth);
		}
		
		return($media);
	}
	
	/**************************************************************************/
	
	function getDictionary($useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autoride'));
		
		foreach($this->responsiveMode as $index=>$value)
			$data[$value]=array($value);
		
		return($data);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/