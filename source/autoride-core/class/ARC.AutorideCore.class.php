<?php

/******************************************************************************/
/******************************************************************************/

class ARCAutorideCore
{
	/**************************************************************************/	
	
	function __construct()
	{
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_ARC_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_ARC_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$this->library=array
		(
			'script'															=>	array
			(
				'arc-public'                                                    =>	array
				(
					'use'														=>	2,
					'file'														=>	'public.js'
				)					
			),
			'style'																=>	array
			(
				
			)
		);		
	}	
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$value)
			$this->library[$type][$index]=array_merge($this->libraryDefault[$type],$value);
		
		foreach($this->library[$type] as $index=>$data)
		{
			if(!$data['inc']) continue;
			
			if($data['use']!=3)
			{
				if($data['use']!=$use) continue;
			}			
			
			if($type=='script')
			{
				wp_enqueue_script($index,$data['path'].$data['file'],$data['dependencies'],false,$data['in_footer']);
			}
			else 
			{
				wp_enqueue_style($index,$data['path'].$data['file'],$data['dependencies'],false);
			}
		}
	}
	
	/**************************************************************************/
	
	function includeLibrary($test,$script=array(),$style=array())
	{
		if($test!=1) return;

		foreach((array)$script as $value)
		{
			if(array_key_exists($value,$this->library['script']))
				$this->library['script'][$value]['inc']=true;
		}
		foreach((array)$style as $value)
		{
			if(array_key_exists($value,$this->library['style']))
				$this->library['style'][$value]['inc']=true;	
		}
	}
	
	/**************************************************************************/
	
	function pluginActivation()
	{
		
	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
    
    /**************************************************************************/
    
    function setupTheme()
    {
		$MetaBox=new ARCMetaBox();
		
        $VisualComposer=new ARCVisualComposer();
        $VisualComposer->init();
		
		$WidgetCallToAction=new ARCWidgetCallToAction();
		$WidgetVehicleAttribute=new ARCWidgetVehicleAttribute();
		
		$WidgetCallToAction->register();
		$WidgetVehicleAttribute->register();
		
		add_action('add_meta_boxes',array($MetaBox,'init'));
    }
        
	/**************************************************************************/
	
	function init()
	{

	}
	
	/**************************************************************************/
	
	function publicInit()
	{
		$this->prepareLibrary();
		
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);	
		
		/***/
		
		$data=array();
		
		$data['config']['ajaxurl']=admin_url('admin-ajax.php');
		
		$param=array
		(
			'l10n_print_after'=>'pluginOption='.json_encode($data).';'
		);
			
		wp_localize_script('jquery-gdc-plugin','pluginOption',$param);
	}
	
	/**************************************************************************/
	
	function adminInit()
	{
		$this->prepareLibrary();
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
		
		$data=array();
		
		$data['config']['ajaxurl']=admin_url('admin-ajax.php');
		
		$param=array
		(
			'l10n_print_after'=>'pluginOption='.json_encode($data).';'
		);
			
		wp_localize_script('jquery-gdc-plugin-admin','pluginOption',$param);
	}
    
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/