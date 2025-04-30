<?php

/******************************************************************************/
/******************************************************************************/

class TemplaticaVisualComposer
{
	/**************************************************************************/
	
	function __construct()
	{		
        
	}
    
    /**************************************************************************/
    
    function init()
    {        
        add_action('vc_before_init',array($this,'beforeInitAction'));
    }
    
    /**************************************************************************/
    
    function beforeInitAction()
    {
        require_once(PLUGIN_TEMPLATICA_PATH_VC.'vc_'.PLUGIN_TEMPLATICA_CONTEXT.'_template.php');
    }
    
    /**************************************************************************/
    
    function createParamDictionary($dictionary,$labelIndex=0)
    {        
        foreach($dictionary as $index=>$value)
        {
            if(is_array($value))
                $dictionary[$index]=$value[$labelIndex];
        }
        
        return(array_combine(array_values($dictionary),array_keys($dictionary)));
    }
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/