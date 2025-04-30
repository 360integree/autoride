<?php

/******************************************************************************/
/******************************************************************************/

class Templatica
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
				'path'															=>	PLUGIN_TEMPLATICA_URL_SCRIPT,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_TEMPLATICA_URL_STYLE,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
	}
    
    /**************************************************************************/
	
	private function prepareLibrary()
	{
		$this->library=array
		(
			'script'															=>	array
			(
				'jquery-ui-core'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-tabs'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-button'												=>	array
				(
					'path'														=>	''
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'										=>	array
				(
					'file'														=>	'jquery.themeOptionElement.js'
				)	
			),
			'style'																=>	array
			(
				'google-font-open-sans'											=>	array
				(
					'path'														=>	'', 
					'file'														=>	add_query_arg(array('family'=>urlencode('Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i'),'subset'=>'cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese'),'//fonts.googleapis.com/css')
				),
				'jquery-ui'														=>	array
				(
					'file'														=>	'jquery.ui.min.css',
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css'
				),
				'mfds-jquery-themeOption-overwrite'								=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				)
			)
		);
    }
    
    /**************************************************************************/
    
	private function addLibrary($type,$use)
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
	
	function pluginActivation()
	{		

	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
        
    /**************************************************************************/
    
	function adminMenu()
	{

	}
    
 	/**************************************************************************/
	
	public function adminInit()
	{
		$this->prepareLibrary();
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
    
	/**************************************************************************/
    
    function init()
    {        
        $Template=new TemplaticaTemplate();
        $Template->init();
    }
    
    /**************************************************************************/
    
    function afterSetupTheme()
    {
        $VisualComposer=new TemplaticaVisualComposer();
        $VisualComposer->init();
    }
    
    /**************************************************************************/
    
    function widgetsInit()
    {
        register_widget(PLUGIN_TEMPLATICA_CONTEXT.'_widget_template');
    }
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/