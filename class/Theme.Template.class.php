<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeTemplate
{
	/**************************************************************************/

	function __construct($data,$path)
	{
		$this->data=$data;
		$this->path=$path;
	}

	/**************************************************************************/

	function output($format=false)
	{
		ob_start();
 		include($this->path);
		$value=ob_get_clean();
		if($format) $value=Autoride_ThemeHelper::formatCode($value);
		return($value);
	}

	/**************************************************************************/
	
	function outputWP($format=false)
	{
		ob_start();
		include(locate_template($this->path));
		$value=ob_get_clean();
		if($format) $value=Autoride_ThemeHelper::formatCode($value);
		return($value);		
	}
	
	/**************************************************************************/
	
	static function outputS($data,$path,$format=false)
	{
		$Template=new Autoride_ThemeTemplate($data,$path);
		return($Template->output($format));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/