<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeWidgetArea
{
	/**************************************************************************/

	function __construct()
	{
		$this->widgetAreaData=array
		(
			0=>array(__('[None]','autoride'),'theme-page-sidebar-disable'),
			1=>array(__('Left sidebar','autoride'),'theme-page-sidebar-enable theme-page-sidebar-left'),
			2=>array(__('Right sidebar','autoride'),'theme-page-sidebar-enable theme-page-sidebar-right')
		);		
	}
	
	/**************************************************************************/
	
	function register()
	{
		if(!function_exists('register_sidebar')) return;
		
		register_sidebar(array
		(
			'id'=>'autoride_default',
			'name'=>__('Default','autoride'),
			'description'=>__('Built-in default sidebar.','autoride'),
			'before_widget'=>'<div id="%1$s" class="%2$s theme-clear-fix theme-widget">',
			'after_widget'=>'</div>',
			'before_title'=>'<h5 class="theme-widget-header">',
			'after_title'=>'<span></span></h5>'
		));
		
		if(!class_exists('WAWidgetArea'))
		{	
			$argument=array
			(
				'post_type'=>'wa_widget_area',
				'posts_per_page'=>-1,
				'orderby'=>'title',
				'order'=>'asc'
			);

			$query=new WP_Query($argument);
			if($query===false) return;
			
			foreach($query->posts as $value)
				register_sidebar(array('id'=>'wa_'.$value->ID,'name'=>$value->post_title));
		}
	}
	
	/**************************************************************************/

	function getWidgetAreaByPost($post,$widgetArea,$location=false)
	{
		$data=array('id'=>0,'location'=>0);
		
		if((is_front_page()) && ($location))
		{
			$data=array('id'=>'autoride_default','location'=>2);
			return($data);
		}
		
		if(!is_object($post)) return($data);

		$id=Autoride_ThemeOption::getGlobalOption($post,$widgetArea,Autoride_ThemeOption::getOptionPrefix($post));
		
		if($location) $location=Autoride_ThemeOption::getGlobalOption($post,$widgetArea.'_location',Autoride_ThemeOption::getOptionPrefix($post));	
		else $location=3;
		
		if(strcmp($id,'0')==0) return($data);
		if(strcmp($location,'0')==0) return($data);
		
		if(empty($id)) $location=0;
		
		return(array('id'=>$id,'location'=>$location));
	}
	
	/**************************************************************************/
	
	function getWidgetAreaCSSClass($data)
	{
		if(isset($this->widgetAreaData[$data['location']]))
			return($this->widgetAreaData[$data['location']][1]);
		else return($this->widgetAreaData[0][1]);
	}
	
	/**************************************************************************/
	
	function getWidgetAreaDictionary($useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		global $wp_registered_sidebars;

		$data=array();
		$temp=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autoride'));
		
		foreach($wp_registered_sidebars as $value)
			$temp[$value['id']]=$value['name'];
		
		asort($temp);
		
		foreach($temp as $index=>$value)
			$data[$index]=array($value);
		
		return($data);
	}
	
	/**************************************************************************/
	
	function getWidgetAreaLocationDictionary($useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autoride'));
		
		foreach($this->widgetAreaData as $index=>$value)
		{
			if($index==0) continue;
			$data[$index]=array($value[0]);
		}
		
		return($data);
	}
	
	/**************************************************************************/

	function create($widgetArea,$echo=true)
	{
		if(!function_exists('dynamic_sidebar')) return;
		if(is_active_sidebar($widgetArea['id'])) 
		{
			if($widgetArea['location']==3)
			{
				$this->widgetAreaCounter=0;
				
				$this->setWidgetAreaLayout($widgetArea['id']);
				
				$html=$this->dynamicSidebar($widgetArea['id']);
				
				if($this->widgetAreaCounter!=0) $html.='[/vc_row]';
				
				$this->unsetWidgetAreaLayout($widgetArea['id']);
				
				if($echo) echo do_shortcode($html);
				else return(do_shortcode($html));
			}
			else 
			{
				if($echo) echo do_shortcode($this->dynamicSidebar($widgetArea['id']));
				else return(do_shortcode($this->dynamicSidebar($widgetArea['id'])));
			}
		}
	}
	
	/**************************************************************************/
	
	static function createS($widgetArea)
	{
		$WidgetArea=new Autoride_ThemeWidgetArea();
		return($WidgetArea->create($widgetArea,false));
	}
  
	/**************************************************************************/
	
	function dynamicSidebar($widgetAreaId)
	{
		ob_start();
		dynamic_sidebar($widgetAreaId);
		$content=ob_get_clean();
		return($content);	   
	}
	
	/**************************************************************************/
	
	function setWidgetAreaLayout($widgetAreaId)
	{
		$Plugin=new Autoride_ThemePlugin();		
		
		$this->widgetAreaCounter=0;
		
		if($Plugin->isActive('WAWidgetArea'))
		{
			$postId=0;
			
			$data=explode('_',$widgetAreaId);
			if(isset($data[1])) $postId=(int)$data[1];
	
			$meta=get_post_meta($postId,PLUGIN_WIDGET_AREA_CONTEXT,false);
			if(isset($meta[0])) $meta=$meta[0];		
			
			WAHelper::removeUIndex($meta,'layout');
			$this->widgetAreaLayout=$meta['layout'];
		}
		else $this->widgetAreaLayout='1/1';
		
		add_filter('dynamic_sidebar_params',array($this,'setWidgetLayout'));
	}
	
	/**************************************************************************/
	
	function unsetWidgetAreaLayout()
	{
		remove_filter('dynamic_sidebar_params',array($this,'setWidgetLayout'),10);
	}
	
	/**************************************************************************/
	
	function setWidgetLayout($parameter)
	{
		$Layout=new Autoride_ThemeLayout();
		
		$before=$after=null;
		
		if($this->widgetAreaCounter==0) $before='[vc_row gap="'.$Layout->getLayoutGap($this->widgetAreaLayout).'"]';
		$before.='[vc_column width="'.$Layout->getLayoutColumnWidth($this->widgetAreaLayout,$this->widgetAreaCounter).'"]';
		
		$this->widgetAreaCounter++;
		
		$after='[/vc_column]';
		if($this->widgetAreaCounter==$Layout->getLayoutColumnCount($this->widgetAreaLayout))
		{
			$after.='[/vc_row]';
			$this->widgetAreaCounter=0;
		}
		
		$parameter[0]['before_widget']=$before.$parameter[0]['before_widget'];
		$parameter[0]['after_widget']=$parameter[0]['after_widget'].$after;

		return($parameter);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/