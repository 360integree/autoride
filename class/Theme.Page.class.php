<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemePage
{
	/**************************************************************************/

	function __construct()
	{

	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{

	}
	
	/**************************************************************************/

	function adminCreateMetaBoxPageHeader()
	{
 		global $post;

		$Templatica=new Autoride_ThemeTemplatica();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['template']=$Templatica->getDictionary(true,true,false);
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_page_header.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_page_header.php'); // Data escaped ok		   
	}
	
	/**************************************************************************/
	
 	function adminCreateMetaBoxPageContent()
	{
 		global $post;

		$WidgetArea=new Autoride_ThemeWidgetArea();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widget_area_location']=$WidgetArea->getWidgetAreaLocationDictionary();
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_page_content.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_page_content.php'); // Data escaped ok	
	}

	/**************************************************************************/
	
 	function adminCreateMetaBoxPageFooter()
	{
		global $post;

		$WidgetArea=new Autoride_ThemeWidgetArea();
		$Templatica=new Autoride_ThemeTemplatica();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['template']=$Templatica->getDictionary();
		
		$data['dictionary']['widget_area_template']=Autoride_ThemeHelper::createWidgetAreaTeampleDictionary($data['dictionary']['widget_area'],$data['dictionary']['template']);
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_page_footer.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_page_footer.php'); // Data escaped ok		
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxClass($class) 
	{
		array_push($class,'to-postbox-1');
		return($class);
	}
		
	/**************************************************************************/

	function setPostMetaDefault(&$meta)
	{
		Autoride_ThemeHelper::setDefaultOption($meta,'page_header_top_template_id','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_header_middle_template_id','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_header_bottom_template_id','-1');
		
		/***/
		
		Autoride_ThemeHelper::setDefaultOption($meta,'page_widget_area_sidebar','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_widget_area_sidebar_location','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_class','');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_background_color','');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_margin_top','');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_margin_bottom','');
		
		/***/
		
		Autoride_ThemeHelper::setDefaultOption($meta,'page_footer_top_widget_area_template','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_footer_middle_widget_area_template','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'page_footer_bottom_widget_area_template','-1');
	}
	
	/**************************************************************************/
	
	function getPageDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$data=array();
		
		$page=get_pages(array('hierarchical'=>0));
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autoride'));

		foreach($page as $pageData)
			$data[$pageData->ID]=array($pageData->post_title);
		
		return($data);
	}
			
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/