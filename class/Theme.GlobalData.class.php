<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeGlobalData
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function setGlobalData($name,$functionCallback,$refresh=false)
	{
		global $autoride_GlobalData;
		
		if(isset($autoride_GlobalData[$name]) && (!$refresh)) return($autoride_GlobalData[$name]);
		
		$autoride_GlobalData[$name]=call_user_func($functionCallback);
		
		return($autoride_GlobalData[$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/