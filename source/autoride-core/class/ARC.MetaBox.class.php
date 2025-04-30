<?php

/******************************************************************************/
/******************************************************************************/

class ARCMetaBox
{
	/**************************************************************************/
	
	function __construct()
	{		
		
	}
    
    /**************************************************************************/
    
    function init()
    {   
		$Post=new Autoride_ThemePost();
		$Page=new Autoride_ThemePage();
		
		/***/
		
		add_meta_box('meta_box_page_header',__('Header','autoride'),array($Page,'adminCreateMetaBoxPageHeader'),'page','normal','default');
		add_meta_box('meta_box_page_content',__('Content','autoride'),array($Page,'adminCreateMetaBoxPageContent'),'page','normal','default');
		add_meta_box('meta_box_page_footer',__('Footer','autoride'),array($Page,'adminCreateMetaBoxPageFooter'),'page','normal','default');
		
		add_filter('postbox_classes_page_meta_box_page_header',array($Page,'adminCreateMetaBoxClass'));
		add_filter('postbox_classes_page_meta_box_page_content',array($Page,'adminCreateMetaBoxClass'));
		add_filter('postbox_classes_page_meta_box_page_footer',array($Page,'adminCreateMetaBoxClass'));
		
		/***/
		
		add_meta_box('meta_box_post_header',__('Header','autoride'),array($Post,'adminCreateMetaBoxPostHeader'),'post','normal','default');
		add_meta_box('meta_box_post_content',__('Content','autoride'),array($Post,'adminCreateMetaBoxPostContent'),'post','normal','default');
		add_meta_box('meta_box_post_footer',__('Footer','autoride'),array($Post,'adminCreateMetaBoxPostFooter'),'post','normal','default');
		add_meta_box('meta_box_post_element',__('Elements','autoride'),array($Post,'adminCreateMetaBoxPostElement'),'post','normal','default');
		
		add_filter('postbox_classes_post_meta_box_post_header',array($Post,'adminCreateMetaBoxClass'));
		add_filter('postbox_classes_post_meta_box_post_content',array($Post,'adminCreateMetaBoxClass'));
		add_filter('postbox_classes_post_meta_box_post_footer',array($Post,'adminCreateMetaBoxClass'));
		add_filter('postbox_classes_post_meta_box_post_element',array($Post,'adminCreateMetaBoxClass'));		
		
		/***/
    }
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/