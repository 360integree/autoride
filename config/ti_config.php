<?php

/******************************************************************************/
/******************************************************************************/

define('PLUGIN_THEME_INSTALLER_THEME_CONTEXT','autoride');
define('PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX','Autoride_');
define('PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX','ar_option');

define('PLUGIN_THEME_INSTALLER_SKIN_OPTION_NAME','ar_skin');

/****/

TIData::set('import','option',array('widget_data','content_data','theme_option'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_category_post_id',array('title'=>'Blog Classic With Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_archive_post_id',array('title'=>'Blog Classic With Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_search_post_id',array('title'=>'Blog Classic With Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_author_post_id',array('title'=>'Blog Classic With Right Sidebar','postType'=>'page'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_404_page_id',array('title'=>'Page Not Found','postType'=>'page'));

/***/

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_logo_normal_src',array('title'=>'logo','postType'=>'attachment'));
TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_logo_retina_src',array('title'=>'logo_retina','postType'=>'attachment'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_top_template_id',array('title'=>'Header top 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_middle_template_id',array('title'=>'Header middle 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_header_bottom_template_id',array('title'=>'Header bottom 5','postType'=>'templatica_template'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_widget_area_sidebar',array('title'=>'Single post 1'));

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_top_widget_area_template',array('title'=>'Footer top 1','postType'=>'templatica_template','prefix'=>'t'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_middle_widget_area_template',array('title'=>'Footer middle 1','prefix'=>'w'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_post_footer_bottom_widget_area_template',array('title'=>'Footer bottom 1','postType'=>'templatica_template','prefix'=>'t'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_top_template_id',array('title'=>'Header top 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_middle_template_id',array('title'=>'Header middle 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_header_bottom_template_id',array('title'=>'Header bottom 1','postType'=>'templatica_template'));

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_top_widget_area_template',array('title'=>'Footer top 1','postType'=>'templatica_template','prefix'=>'t'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_middle_widget_area_template',array('title'=>'Footer middle 1','prefix'=>'w'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_footer_bottom_widget_area_template',array('title'=>'Footer bottom 1','postType'=>'templatica_template','prefix'=>'t'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_top_template_id',array('title'=>'Header top 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_middle_template_id',array('title'=>'Header middle 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_header_bottom_template_id',array('title'=>'Header bottom 5','postType'=>'templatica_template'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_widget_area_sidebar',array('title'=>'Shop 1'));

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_footer_top_widget_area_template',array('title'=>'Footer top 1','postType'=>'templatica_template','prefix'=>'t'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_footer_middle_widget_area_template',array('title'=>'Footer middle 1','prefix'=>'w'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_woocommerce_product_footer_bottom_widget_area_template',array('title'=>'Footer bottom 1','postType'=>'templatica_template','prefix'=>'t'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_header_top_template_id',array('title'=>'Header top 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_header_middle_template_id',array('title'=>'Header middle 1','postType'=>'templatica_template'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_header_bottom_template_id',array('title'=>'Header bottom 6','postType'=>'templatica_template'));

TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_widget_area_sidebar',array('title'=>'Single vehicle 1'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_widget_area_bottom',array('title'=>'Single vehicle 2'));

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_footer_top_widget_area_template',array('title'=>'Footer top 1','postType'=>'templatica_template','prefix'=>'t'));
TIData::set('widget_area',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_footer_middle_widget_area_template',array('title'=>'Footer middle 1','prefix'=>'w'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_vehicle_post_footer_bottom_widget_area_template',array('title'=>'Footer bottom 1','postType'=>'templatica_template','prefix'=>'t'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_maintenance_mode_post_id',array('title'=>'Maintenance Mode','postType'=>'page'));

/***/

TIData::set('post_id','page_on_front',array('title'=>'Home','postType'=>'page'));
TIData::set('option','show_on_front','page');

/***/

TIData::set('option','posts_per_page',6);
TIData::set('option','permalink_structure','/%postname%/');

TIData::set('option','thread_comments',1);
TIData::set('option','thread_comments_depth',2);
TIData::set('option','page_comments',1);
TIData::set('option','comments_per_page',5);
TIData::set('option','comment_order','desc');

TIData::set('option','show_avatars',1);
TIData::set('option','avatar_default','mystery');

TIData::set('option','blogname','AutoRide');
TIData::set('option','blogdescription','Chauffeur Booking WordPress Theme');

function ti_complete()
{
	if(class_exists('CHBSBookingFormStyle'))
	{
		$BookingFormStyle=new CHBSBookingFormStyle();
		$BookingFormStyle->createCSSFile();
	}
}

/******************************************************************************/
/******************************************************************************/