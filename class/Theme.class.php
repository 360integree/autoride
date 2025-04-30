<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_Theme
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->color = array
		(
			1=>array
			(
				'default'=>'FF700A'
			),
			2=>array
			(
				'default'=>'556677'
			),
			3=>array
			(
				'default'=>'778591'
			),
			4=>array
			(
				'default'=>'FFFFFF'
			),
			5=>array
			(
				'default'=>'transparent'
			),
			6=>array
			(
				'default'=>'9EA8B2'
			),
			7=>array
			(
				'default'=>'F6F6F6'
			),
			8=>array
			(
				'default'=>'2C3E50'
			),
			9=>array
			(
				'default'=>'EAECEE'
			),
			10=>array
			(
				'default'=>'475665'
			),
			11=>array
			(
				'default'=>'CED3D9'
			),
			12=>array
				(
				'default'=>'F6F6F6'
			)
		);

		$this->themeDefaultOption=array
		(
			'blog_category_post_id'=>'0',
			'blog_archive_post_id'=>'0',
			'blog_search_post_id'=>'0',
			'blog_author_post_id'=>'0',
			'blog_sort_field'=>'post_date',
			'blog_sort_direction'=>'desc',
			'blog_automatic_excerpt_length_1'=>'60',
			'blog_automatic_excerpt_length_2'=>'30',
			'page_404_page_id'=>'0',
			'logo_normal_src'=>'',
			'logo_normal_width'=>'235',
			'logo_normal_height'=>'110',
			'logo_retina_src'=>'',
			'logo_retina_width'=>'235',
			'logo_retina_height'=>'110',
			'comment_automatic_excerpt_length'=>'25',
			'custom_js_code'=>'',
			'right_click_enable'=>'1',
			'copy_selection_enable'=>'1',
			'go_to_page_top_enable'=>'1',
			'go_to_page_top_hash'=>'up',
			'go_to_page_top_animation_enable'=>'1',
			'go_to_page_top_animation_duration'=>'500',
			'go_to_page_top_animation_easing'=>'easeInOutCubic',
			'page_header_top_template_id'=>'',
			'page_header_middle_template_id'=>'-1',
			'page_header_bottom_template_id'=>'-1',
			'page_widget_area_sidebar'=>'',
			'page_widget_area_sidebar_location'=>'',
			'page_class'=>'',
			'page_background_color'=>'',
			'page_margin_top'=>'',
			'page_margin_bottom'=>'',
			'page_footer_top_widget_area_template'=>'',
			'page_footer_middle_widget_area_template'=>'',
			'page_footer_bottom_widget_area_template'=>'',
			'post_header_top_template_id'=>'',
			'post_header_middle_template_id'=>'-1',
			'post_header_bottom_template_id'=>'-1',
			'post_widget_area_sidebar'=>'',
			'post_widget_area_sidebar_location'=>'2',
			'post_class'=>'',
			'post_background_color'=>'',
			'post_margin_top'=>'0',
			'post_margin_bottom'=>'',
			'post_footer_top_widget_area_template'=>'',
			'post_footer_middle_widget_area_template'=>'',
			'post_footer_bottom_widget_area_template'=>'',
			'vehicle_post_header_top_template_id'=>'',
			'vehicle_post_header_middle_template_id'=>'-1',
			'vehicle_post_header_bottom_template_id'=>'-1',
			'vehicle_post_widget_area_sidebar'=>'',
			'vehicle_post_widget_area_sidebar_location'=>'2',
			'vehicle_post_widget_area_bottom'=>'',
			'vehicle_post_class'=>'',
			'vehicle_post_background_color'=>'F6F6F6',
			'vehicle_post_margin_top'=>'0',
			'vehicle_post_margin_bottom'=>'',
			'vehicle_post_footer_top_widget_area_template'=>'',
			'vehicle_post_footer_middle_widget_area_template'=>'',
			'vehicle_post_footer_bottom_widget_area_template'=>'',
			'woocommerce_product_header_top_template_id'=>'',
			'woocommerce_product_header_middle_template_id'=>'-1',
			'woocommerce_product_header_bottom_template_id'=>'-1',
			'woocommerce_product_widget_area_sidebar'=>'',
			'woocommerce_product_widget_area_sidebar_location'=>'2',
			'woocommerce_product_class'=>'',
			'woocommerce_product_background_color'=>'',
			'woocommerce_product_margin_top'=>'0',
			'woocommerce_product_margin_bottom'=>'',
			'woocommerce_product_footer_top_widget_area_template'=>'',
			'woocommerce_product_footer_middle_widget_area_template'=>'',
			'woocommerce_product_footer_bottom_widget_area_template'=>'',
			'fancybox_image_padding'=>'10',
			'fancybox_image_margin'=>'20',
			'fancybox_image_min_width'=>'100',
			'fancybox_image_min_height'=>'100',
			'fancybox_image_max_width'=>'9999',
			'fancybox_image_max_height'=>'9999',
			'fancybox_image_helper_button_enable'=>'1',
			'fancybox_image_autoresize'=>'1',
			'fancybox_image_autocenter'=>'1',
			'fancybox_image_fittoview'=>'1',
			'fancybox_image_arrow'=>'1',
			'fancybox_image_close_button'=>'1',
			'fancybox_image_close_click'=>'0',
			'fancybox_image_next_click'=>'0',
			'fancybox_image_mouse_wheel'=>'1',
			'fancybox_image_autoplay'=>'0',
			'fancybox_image_loop'=>'1',
			'fancybox_image_playspeed'=>'3000',
			'fancybox_image_animation_effect_open'=>'fade',
			'fancybox_image_animation_effect_close'=>'fade',
			'fancybox_image_animation_effect_next'=>'elastic',
			'fancybox_image_animation_effect_previous'=>'elastic',
			'fancybox_image_easing_open'=>'easeInQuad',
			'fancybox_image_easing_close'=>'easeInQuad',
			'fancybox_image_easing_next'=>'easeInQuad',
			'fancybox_image_easing_previous'=>'easeInQuad',
			'fancybox_image_speed_open'=>'250',
			'fancybox_image_speed_close'=>'125',
			'fancybox_image_speed_next'=>'250',
			'fancybox_image_speed_previous'=>'250',
			'maintenance_mode_enable'=>'0',
			'maintenance_mode_post_id'=>'0',
			'maintenance_mode_user_id'=>'0',
			'install'=>'1',
		);
		
		foreach($this->color as $index=>$value)
		{
			if(!isset($value['header']))
				$this->color[$index]['header']=sprintf(__('Color %s','autoride'),$index);
			 if(!isset($value['subheader']))
				$this->color[$index]['subheader']=sprintf(__('Enter color in HEX for elements in group %s','autoride'),$index);		   
		}
		
		foreach($this->color as $index=>$value)
			$this->themeDefaultOption['color_'.$index]=$value['default'];
		
		$SocialProfile=new Autoride_ThemeSocialProfile();
		foreach($SocialProfile->socialProfile as $index=>$value)
		{
			$this->themeDefaultOption['social_profile_order_'.$index]=$value[3];
			$this->themeDefaultOption['social_profile_address_'.$index]=$value[2];
		}
		
		$Post=new Autoride_ThemePost();
		foreach($Post->element as $index=>$value)
			$this->themeDefaultOption['post_'.$index.'_enable']=1;
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$Skin=new Autoride_ThemeSkin();

		$this->libraryDefault = array
		(
			'script'=>array
			(
				'use'=>1,
				'inc'=>true,
				'path'=>AUTORIDE_THEME_URL_SCRIPT,
				'file'=>'',
				'in_footer'=>true,
				'dependencies'=>array('jquery')
			),
			'style'=>array
			(
				'use'=>1,
				'inc'=>true,
				'path'=>AUTORIDE_THEME_URL_STYLE,
				'file'=>'',
				'dependencies'=>array()
			)
		);

		$this->library=array
		(
			'script' =>	array
			(
				'jquery-ui-core'=>array
				(
					'use'=>3,
					'path'=>''
				),
				'jquery-ui-button'=>array
				(
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-ui-slider'=>array
				(
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-ui-tabs'=>array
				(
					'use'=>3,
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-ui-accordion'=>array
				(
					'use'=>2,
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-ui-autocomplete'=>array
				(
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-ui-selectmenu'=>array
				(
					'use'=>3,
					'path'=>'',
					'dependencies'=>array('jquery')
				),
				'jquery-bbq'=>array
				(
					'use'=>3,
					'file'=>'jquery.bbq.min.js'
				),
				'jquery-easing'=>array
				(
					'use'=>2,
					'file'=>'jquery.easing.js'
				),
				'jquery-slick'=>array
				(
					'use'=>2,
					'file'=>'slick.js'
				),
				'jquery-scrollTo'=>array
				(
					'use'=>2,
					'file'=>'jquery.scrollTo.min.js'
				),
				'jquery-mousewheel'=>array
				(
					'use'=>2,
					'file'=>'jquery.mousewheel.js'
				),
				'jquery-blockUI'=>array
				(
					'use'=>3,
					'file'=>'jquery.blockUI.js'
				),
				'jquery-qtip'=>array
				(
					'use'=>3,
					'file'=>'jquery.qtip.min.js'
				),
				'jquery-countdown'=>array
				(
					'use'=>3,
					'file'=>'jquery.countdown.min.js'
				),
				'jquery-dropkick'=>array
				(
					'use'=>3,
					'file'=>'jquery.dropkick.min.js'
				),
				'jquery-colorpicker'=>array
				(
					'file'=>'jquery.colorpicker.js'
				),
				'jquery-infieldlabel'=>array
				(
					'use'=>3,
					'file'=>'jquery.infieldlabel.min.js'
				),
				'jquery-caroufredsel'=>array
				(
					'use'=>3,
					'file'=>'jquery.carouFredSel.packed.js'
				),
				'jquery-actual'=>array
				(
					'use'=>2,
					'file'=>'jquery.actual.min.js'
				),
				'jquery-fancybox'=>array
				(
					'use'=>2,
					'file'=>'jquery.fancybox.js'
				),
				'jquery-fancybox-media'=>array
				(
					'use'=>2,
					'file'=>'jquery.fancybox-media.js'
				),
				'jquery-fancybox-buttons'=>array
				(
					'use'=>2,
					'file'=>'jquery.fancybox-buttons.js'
				),
				'jquery-fancybox-launch'=>array
				(
					'use'=>2,
					'file'=>'jquery.fancybox.launch.js'
				),
				'jquery-responsiveTable'=>array
				(
					'use'=>2,
					'file'=>'jquery.responsiveTable.js'
				),
				'jquery-isotope'=>array
				(
					'use'=>2,
					'file'=>'isotope.pkgd.min.js'
				),
				'jquery-gallery'=>array
				(
					'use'=>2,
					'file'=>'jquery.gallery.js'
				),
				'jquery-windowDimensionListener'=>array
				(
					'use'=>2,
					'file'=>'jquery.windowDimensionListener.js'
				),
				'jquery-themeOption'=>array
				(
					'file'=>'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'=>array
				(
					'file'=>'jquery.themeOptionElement.js'
				),
				'superfish'=>array
				(
					'use'=>2,
					'file'=>'superfish.js'
				),
				/*
				'supposition'=>array
				(
					'use'=>2,
					'file'=>'jquery.supposition.js'
				),
				*/
				'jquery-waypoint'=>array
				(
					'use'=>2,
					'file'=>'jquery.waypoints.min.js'
				),
				'jquery-responsiveElement'=>array
				(
					'use'=>2,
					'file'=>'jquery.responsiveElement.js'
				),
				'autoride-comment'=>array
				(
					'use'=>2,
					'file'=>'jquery.comment.js'
				),
				'autoride-header'=>array
				(
					'use'=>2,
					'file'=>'jquery.header.js'
				),
				'autoride-helper'=>array
				(
					'use'=>2,
					'file'=>'Theme.Helper.class.js'
				),
				'autoride-public'=>array
				(
					'use'=>2,
					'file'=>'public.js'
				),
				'autoride-admin'=>array
				(
					'file'=>'admin.js'
				)
			),
			'style'=>array
			(
				'jquery-ui'=>array
				(
					'use'=>3,
					'file'=>'jquery.ui.min.css',
				),
				'google-font-admin'=>array
				(
					'path'=>'',
					'file'=>add_query_arg(array('family'=>urlencode('Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i'), 'subset'=>urlencode('cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese')), '//fonts.googleapis.com/css')
				),
				'google-font-public'=>array
				(
					'use'=>3,
					'path'=>'',
					'file'=>add_query_arg(array('family'=>urlencode('Lato:300,300i,400,700,700i,900'), 'subset'=>urlencode('cyrillic,latin-ext')), '//fonts.googleapis.com/css'),
				),
				'jquery-dropkick'=>array
				(
					'use'=>3,
					'file'=>'jquery.dropkick.css',
				),
				'jquery-colorpicker'=>array
				(
					'file'=>'jquery.colorpicker.css',
				),
				'jquery-qtip'=>array
				(
					'use'=>2,
					'file'=>'jquery.qtip.min.css',
				),
				'jquery-fancybox'=>array
				(
					'use'=>2,
					'file'=>'fancybox/jquery.fancybox.css',
				),
				'jquery-slick'=>array
				(
					'use'=>2,
					'file'=>'slick.css',
				),
				'jquery-themeOption'=>array
				(
					'file'=>'jquery.themeOption.css',
				),
				'jquery-themeOption-overwrite'=>array
				(
					'file'=>'jquery.themeOption.overwrite.css',
				),
				'autoride-admin'=>array
				(
					'file'=>'admin.css',
				),
				'tf-frontend'=>array
				(
					'use'=>2,
					'inc'=>false,
					'file'=>'TF.Frontend.css',
				),
				'autoride-style'=>array
				(
					'use'=>2,
					'path'=>null,
					'file'=>get_stylesheet_uri(),
				),
				'autoride-woocommerce'=>array
				(
					'use'=>2,
					'inc'=>false,
					'file'=>'woocommerce.css',
				),
				'autoride-skin-style'=>array
				(
					'use'=>2,
					'path'=>null,
					'file'=>AUTORIDE_THEME_URL_CONFIG . $Skin->getSkin() . '/style.css',
				),
				'autoride-style-custom'=>array
				(
					'use'=>2,
					'path'=>AUTORIDE_THEME_URL_MULTISITE_SITE_STYLE,
					'file'=>'style.css',
				)
			)
		);
		
		foreach($this->library as $libraryType=>$libraryTypeData)
		{
			$library=array_keys($libraryTypeData);
			
			foreach($library as $libraryName)
				$this->library[$libraryType][$libraryName]=array_merge($this->libraryDefault[$libraryType],$this->library[$libraryType][$libraryName]);
		}
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
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

	function adminInit()
	{
		$this->prepareLibrary();
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function adminPrintScript()
	{

	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_action('admin_print_scripts',array($this,'adminPrintScript'));
		add_theme_page(__('Theme Options','autoride'),__('Theme Options','autoride'),'edit_theme_options','ThemeOptions',array($this,'adminOptionPanelCreate'));
	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{

	}
	
	/**************************************************************************/
	
	function adminSaveMetaBox($postId)
	{		
		if($_POST)
		{		   
			if(Autoride_ThemeHelper::checkSavePost($postId,'autoride_meta_box_noncename','adminSaveMetaBox')===false) return(false);

			$option=Autoride_ThemeHelper::getPostOption();
			
			update_post_meta($postId,AUTORIDE_THEME_OPTION_PREFIX,$option);
		}		
	}

	/**************************************************************************/
	
	function adminOptionPanelCreate()
	{
		wp_enqueue_media();

		$data=array();

		$Page=new Autoride_ThemePage();
		$Post=new Autoride_ThemePost();
		$Blog=new Autoride_ThemeBlog();
		$Easing=new Autoride_ThemeEasing();
		$Fancybox=new Autoride_ThemeFancybox();
		$Templatica=new Autoride_ThemeTemplatica();
		$WidgetArea=new Autoride_ThemeWidgetArea();
		$SocialProfile=new Autoride_ThemeSocialProfile();
		$ResponsiveMode=new Autoride_ThemeResponsiveMode();

		$data['option']=Autoride_ThemeOption::getOptionObject();

		$data['dictionary']['easing_type']=$Easing->easingType;
		$data['dictionary']['fancybox_transition_type']=$Fancybox->transitionType;

		$data['dictionary']['page']=$Page->getPageDictionary(false,false,false);

		$data['dictionary']['sort_direction']=$Blog->sortDirection;
		$data['dictionary']['sort_post_blog_field']=$Blog->sortPostBlogField;

		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary(true,false,false);
		$data['dictionary']['widget_area_location']=$WidgetArea->getWidgetAreaLocationDictionary(true,false,false);

		$data['dictionary']['social_profile']=$SocialProfile->socialProfile;

		$data['dictionary']['user']=get_users();

		$data['dictionary']['post_element']=$Post->element;

		$data['dictionary']['color']=$this->color;

		$data['dictionary']['template']=$Templatica->getDictionary(true,false,false);

		$data['dictionary']['responsive_media']=$ResponsiveMode->getMedia();

		/***/

		$data['dictionary']['widget_area_template']=Autoride_ThemeHelper::createWidgetAreaTeampleDictionary($data['dictionary']['widget_area'],$data['dictionary']['template'],true,false,false);

		/***/
		
		// This output has been safely escaped in 'admin/admin.php' file
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/admin.php'); // Data escaped ok			
	}
	
	/**************************************************************************/

	function setupTheme()
	{	
		global $content_width;
		if(!isset($content_width)) $content_width=1180;

		/***/

		$Blog=new Autoride_ThemeBlog();
		$Post=new Autoride_ThemePost();
		$Page=new Autoride_ThemePage();
		$Image=new Autoride_ThemeImage();
		$Comment=new Autoride_ThemeComment();
		
		$WooCommerce=new Autoride_ThemeWooCommerce();
		$MaintenanceMode=new Autoride_ThemeMaintenanceMode();
		$RevolutionSlider=new Autoride_ThemeRevolutionSlider();		

		/***/

		$Image->register();
	
		$RevolutionSlider->init();

		$WooCommerce->addFilter();
		$WooCommerce->addAction();

		/***/

		add_theme_support('html5',array('style','script'));

		add_theme_support('wp-block-styles');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails'); 
		add_theme_support('automatic-feed-links');

		add_theme_support('custom-header');
		add_theme_support('custom-background');

		add_theme_support('woocommerce');

		/***/

		if(function_exists('register_nav_menu')) register_nav_menu('main_menu','Main menu');

		/***/

		add_filter('the_password_form',array($this,'passwordForm'));
		add_filter('image_size_names_choose',array($Image,'addImageSupport'));

		add_filter('excerpt_more',array($Blog,'filterExcerptMore'));
		add_filter('excerpt_length',array($Blog,'automaticExcerptLength'),999);

		add_filter('wpcf7_form_elements',array($this,'wpcf7FormElements'));

		/***/

		add_editor_style('editor-style.css');

		/***/

		add_action('save_post',array($this,'adminSaveMetaBox'));
		add_action('save_post',array($this,'adminSaveMetaBox'));

		add_action('wp_ajax_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_nopriv_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_comment_get',array($Comment,'getComment'));
		add_action('wp_ajax_nopriv_comment_get',array($Comment,'getComment'));

		add_action('tgmpa_register',array($this,'addPlugin'));

		add_action('admin_notices',array($this,'adminNotice'));

		add_action('init',array($MaintenanceMode,'init'));

		add_action('init',array($this,'addMediaTaxonomy'));

		/***/

		load_theme_textdomain('autoride',AUTORIDE_THEME_PATH.'languages/');

		/***/

		$install=(int)Autoride_ThemeOption::getOption('install');
		if($install==1) return;

		$option=$this->themeDefaultOption;

		$ResponsiveMode=new Autoride_ThemeResponsiveMode();

		$media=$ResponsiveMode->getMedia();
		foreach($media as $index=>$value)
			$option['custom_css_responsive_'.$index]='';

		$optionCurrent=Autoride_ThemeOption::getOptionObject();

		$optionSave=array();
		foreach($option as $index=>$value)
		{
			if(!array_key_exists($index,$optionCurrent))
				$optionSave[$index]=$value;
		}

		$optionSave=array_merge((array)$optionSave,$optionCurrent);
		foreach($optionSave as $index=>$value)
		{
			if(!array_key_exists($index,$option))
				unset($optionSave[$index]);
		}

		$optionSave['install']=1;

		Autoride_ThemeOption::resetOption();
		Autoride_ThemeOption::updateOption($optionSave);

		$this->createCSSFile();

		/***/

		$argument=array
		(
			'post_type'=>array('post', 'page'),
			'post_status'=>'any',
			'posts_per_page'=>-1
		);

		$query=new WP_Query($argument);		
		if($query===false) return;

		foreach($query->posts as $value)
		{
			$meta=Autoride_ThemeOption::getPostMeta($value);
			if(is_array($meta)) continue;		

			update_post_meta($value->ID,AUTORIDE_THEME_OPTION_PREFIX,$meta);
		}

		update_option('wpb_js_content_types',array('page','templatica_template'));
	}

	/**************************************************************************/
	
	function switchTheme()
	{
		Autoride_ThemeOption::updateOption(array('install'=>0));
	}
	
	/**************************************************************************/
	
	function afterSwitchTheme()
	{

	}
	
	/**************************************************************************/
	
	function adminOptionPanelSave()
	{
		$response=array('global'=>array('error'=>1));
		
		if(Autoride_ThemeHelper::checkSavePost(-1,'autoride_option_noncename','adminOptionPanelSave')===false)
		{
			echo json_encode($response);
			exit;			
		}
		
		$option=Autoride_ThemeHelper::getPostOption();
	
		Autoride_ThemeHelper::removeUIndex($option,'maintenance_mode_user_id');
		
		$Blog=new Autoride_ThemeBlog();
		$Notice=new Autoride_ThemeNotice();
		$Easing=new Autoride_ThemeEasing();
		$FancyBox=new Autoride_ThemeFancybox();
		$Validation=new Autoride_ThemeValidation($Notice);
		
		$invalidValue=esc_html__('Invalid value','autoride');
		
		/* General settings / Blog */
		if(!in_array($option['blog_sort_field'],array_keys($Blog->sortPostBlogField)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('blog_sort_field',false),$invalidValue);		
		if(!in_array($option['blog_sort_direction'],array_keys($Blog->sortDirection)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('blog_sort_direction',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['blog_automatic_excerpt_length_1'],0,999),array(Autoride_ThemeHelper::getFormName('blog_automatic_excerpt_length_1',false),$invalidValue));
		$Validation->notice('isNumber',array($option['blog_automatic_excerpt_length_2'],0,999),array(Autoride_ThemeHelper::getFormName('blog_automatic_excerpt_length_2',false),$invalidValue));
		
		/* General settings / Logo */
		$Validation->notice('isNumber',array($option['logo_normal_width'],0,999,false),array(Autoride_ThemeHelper::getFormName('logo_normal_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['logo_normal_height'],0,999,false),array(Autoride_ThemeHelper::getFormName('logo_normal_height',false),$invalidValue));
		
		/* General settings / Color */
		foreach($this->color as $index=>$value)
			$Validation->notice('isColor',array($option['color_'.$index]),array(Autoride_ThemeHelper::getFormName('color_'.$index,false),$invalidValue));
		
		/* General settings / Comment */
		$Validation->notice('isNumber',array($option['comment_automatic_excerpt_length'],0,999),array(Autoride_ThemeHelper::getFormName('comment_automatic_excerpt_length',false),$invalidValue));
		
		/* General settings / Content copying */
		$Validation->notice('isNumber',array($option['right_click_enable'],0,1),array(Autoride_ThemeHelper::getFormName('right_click_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['copy_selection_enable'],0,1),array(Autoride_ThemeHelper::getFormName('copy_selection_enable',false),$invalidValue));
		
		/* General settings / Go to top of page */
		$Validation->notice('isNumber',array($option['go_to_page_top_enable'],0,1),array(Autoride_ThemeHelper::getFormName('go_to_page_top_enable',false),$invalidValue));
		$Validation->notice('isNotEmpty',array($option['go_to_page_top_hash']),array(Autoride_ThemeHelper::getFormName('go_to_page_top_hash',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_enable'],0,1),array(Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_duration'],0,99999),array(Autoride_ThemeHelper::getFormName('go_to_page_top_animation_duration',false),$invalidValue));
		if(!in_array($option['go_to_page_top_animation_easing'],array_keys($Easing->easingType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('go_to_page_top_animation_easing',false),$invalidValue);			

		/* Page */
		$Validation->notice('isNumber',array($option['page_widget_area_sidebar_location'],0,2),array(Autoride_ThemeHelper::getFormName('page_widget_area_sidebar_location',false),$invalidValue));
		$Validation->notice('isColor',array($option['page_background_color'],true),array(Autoride_ThemeHelper::getFormName('page_background_color',false),$invalidValue));
		$Validation->notice('isNumber',array($option['page_margin_top'],0,99999,true),array(Autoride_ThemeHelper::getFormName('page_margin_top',false),$invalidValue));
		$Validation->notice('isNumber',array($option['page_margin_bottom'],0,99999,true),array(Autoride_ThemeHelper::getFormName('page_margin_bottom',false),$invalidValue));
		
		/* Post */
		$Validation->notice('isNumber',array($option['post_widget_area_sidebar_location'],0,2),array(Autoride_ThemeHelper::getFormName('post_widget_area_sidebar_location',false),$invalidValue));
		$Validation->notice('isColor',array($option['post_background_color'],true),array(Autoride_ThemeHelper::getFormName('post_background_color',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_margin_top'],0,99999,true),array(Autoride_ThemeHelper::getFormName('post_margin_top',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_margin_bottom'],0,99999,true),array(Autoride_ThemeHelper::getFormName('post_margin_bottom',false),$invalidValue));

		/* Vehicle */
		$Validation->notice('isNumber',array($option['vehicle_post_widget_area_sidebar_location'],0,2),array(Autoride_ThemeHelper::getFormName('vehicle_post_widget_area_sidebar_location',false),$invalidValue));
		$Validation->notice('isColor',array($option['vehicle_post_background_color'],true),array(Autoride_ThemeHelper::getFormName('vehicle_post_background_color',false),$invalidValue));
		$Validation->notice('isNumber',array($option['vehicle_post_margin_top'],0,99999,true),array(Autoride_ThemeHelper::getFormName('vehicle_post_margin_top',false),$invalidValue));
		$Validation->notice('isNumber',array($option['vehicle_post_margin_bottom'],0,99999,true),array(Autoride_ThemeHelper::getFormName('vehicle_post_margin_bottom',false),$invalidValue));
		
		/* WooCommerce */
		if(Autoride_ThemePlugin::isActive('wooCommerce'))
		{
			$Validation->notice('isNumber',array($option['woocommerce_product_widget_area_sidebar_location'],0,2),array(Autoride_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar_location',false),$invalidValue));
			$Validation->notice('isColor',array($option['woocommerce_product_background_color'],true),array(Autoride_ThemeHelper::getFormName('woocommerce_product_background_color',false),$invalidValue));
			$Validation->notice('isNumber',array($option['woocommerce_product_margin_top'],0,99999,true),array(Autoride_ThemeHelper::getFormName('woocommerce_product_margin_top',false),$invalidValue));
			$Validation->notice('isNumber',array($option['woocommerce_product_margin_bottom'],0,99999,true),array(Autoride_ThemeHelper::getFormName('woocommerce_product_margin_bottom',false),$invalidValue));
		}
		
		/* Plugin / Fancybox for images */
		$Validation->notice('isNumber',array($option['fancybox_image_padding'],0,999),array(Autoride_ThemeHelper::getFormName('fancybox_image_padding',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_margin'],0,999),array(Autoride_ThemeHelper::getFormName('fancybox_image_margin',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_width'],1,9999),array(Autoride_ThemeHelper::getFormName('fancybox_image_min_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_height'],1,9999),array(Autoride_ThemeHelper::getFormName('fancybox_image_min_height',false),$invalidValue));		
		$Validation->notice('isNumber',array($option['fancybox_image_max_width'],1,9999),array(Autoride_ThemeHelper::getFormName('fancybox_image_max_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_max_height'],1,9999),array(Autoride_ThemeHelper::getFormName('fancybox_image_max_height',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_helper_button_enable'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_helper_button_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoresize'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_autoresize',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autocenter'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_autocenter',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_fittoview'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_fittoview',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_arrow'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_arrow',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_button'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_close_button',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_click'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_close_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_next_click'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_next_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_mouse_wheel'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_mouse_wheel',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoplay'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_autoplay',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_loop'],0,1),array(Autoride_ThemeHelper::getFormName('fancybox_image_loop',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_playspeed'],1,99999),array(Autoride_ThemeHelper::getFormName('fancybox_image_playspeed',false),$invalidValue));
		if(!in_array($option['fancybox_image_animation_effect_open'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_animation_effect_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_close'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_animation_effect_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_next'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_animation_effect_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_previous'],array_keys($FancyBox->transitionType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_animation_effect_previous',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_open'],array_keys($Easing->easingType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_easing_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_close'],array_keys($Easing->easingType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_easing_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_next'],array_keys($Easing->easingType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_easing_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_previous'],array_keys($Easing->easingType)))
			$Notice->addError(Autoride_ThemeHelper::getFormName('fancybox_image_easing_previous',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['fancybox_image_speed_open'],1,99999),array(Autoride_ThemeHelper::getFormName('fancybox_image_speed_open',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_close'],1,99999),array(Autoride_ThemeHelper::getFormName('fancybox_image_speed_close',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_next'],1,99999),array(Autoride_ThemeHelper::getFormName('fancybox_image_speed_next',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_previous'],1,99999),array(Autoride_ThemeHelper::getFormName('fancybox_image_speed_previous',false),$invalidValue));

		/* Plugin / Maintenance mode */
		$Validation->notice('isNumber',array($option['maintenance_mode_enable'],0,1),array(Autoride_ThemeHelper::getFormName('maintenance_mode_enable',false),$invalidValue));
		   
		if($Notice->isError())
		{
			$response['local']=$Notice->getError();
		}
		else
		{
			$response['global']['error']=0;
			Autoride_ThemeOption::updateOption($option);
			
			$this->createCSSFile();
		}

		$response['global']['notice']=$Notice->createHTML(AUTORIDE_THEME_PATH_TEMPLATE.'notice.php');

		echo json_encode($response);
		exit;
	}
	
	/**************************************************************************/
	
	function publicInit()
	{		
		global $autoride_ParentPost;
		
		$this->prepareLibrary();
		
		if(is_singular()) wp_enqueue_script('comment-reply');
		
		$this->includeLibrary(!Autoride_ThemePlugin::isActive('TFThemeFont'),null,array('tf-frontend','google-font-public'));
		
		$this->includeLibrary(Autoride_ThemePlugin::isActive('wooCommerce'),null,array('autoride-woocommerce'));
		
		if(Autoride_ThemePlugin::isActive('wooCommerce'))
		{
			if(array_key_exists('ts-frontend',$this->library['style']))
				$this->library['style']['ts-frontend']['dependencies']=array('woocommerce-general-css');
		}
		
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);
		
		$aPattern=array
		(
			'menu'=>'/^menu_/',
			'rightClick'=>'/^right_click_/',
			'selection'=>'/^copy_selection_/',
			'fancyboxImage'=>'/^fancybox_image_/',
			'goToPageTop'=>'/^go_to_page_top_/'
		);
		
		$option=Autoride_ThemeOption::getOptionObject();
		
		foreach($aPattern as $indexPattern=>$valuePattern)
		{
			foreach($option as $index=>$value)
			{
				if(preg_match($valuePattern,$index,$result))
				{
					$nIndex=preg_replace($valuePattern,'',$index);
					$data[$indexPattern][$nIndex]=$value;
				}
			}
		}
		
		$data['config']['theme_url']=AUTORIDE_THEME_URL;
		$data['config']['ajax_url']=admin_url('admin-ajax.php');
		
		$data['header']['sticky_enable']=Autoride_ThemeOption::getGlobalOption($autoride_ParentPost->post,'header_top_sticky_enable',Autoride_ThemeOption::getOptionPrefix($autoride_ParentPost->post));	
		
		$data['config']['woocommerce']['enable']=(int)Autoride_ThemePlugin::isActive('WooCommerce');
		
		$data['config']['text']['all']=__('All','autoride');
		
		$param=array
		(
			'l10n_print_after'=>'themeOption='.json_encode($data).';'
		);
			
		wp_localize_script('autoride-public','themeOption',$param);
	}
		
	/**************************************************************************/

	function addPlugin()
	{
		$plugin = array
		(
			array
			(
				'name'=>'AutoRide Core',
				'slug'=>'autoride-core',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'autoride-core.zip',
				'required'=>true,
				'version'=>'1.0',
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'WPBakery Page Builder for WordPress',
				'slug'=>'js_composer',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'js_composer.zip',
				'required'=>true,
				'version'=>'6.1',
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'Slider Revolution Responsive WordPress Plugin',
				'slug'=>'revslider',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'revslider.zip',
				'required'=>false,
				'version'=>'6.1.8',
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
				(
				'name'=>'Templatica - WPBakery Page Builder Templates Manager',
				'slug'=>'templatica',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'templatica.zip',
				'required'=>true,
				'version'=>'1.1',
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'Widget Area',
				'slug'=>'widget-area',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'widget-area.zip',
				'required'=>false,
				'version'=>'2.2',
				'force_activation'=>false,
				'force_deactivation'=>true
			),
			array
			(
				'name'=>'Theme Fonts',
				'slug'=>'theme-font',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'theme-font.zip',
				'required'=>false,
				'version'=>'2.2',
				'force_activation'=>false,
				'force_deactivation'=>true
			),
			array
			(
				'name'=>'Theme Demo Data Installer',
				'slug'=>'theme-demo-data-installer',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'theme-demo-data-installer.zip',
				'required'=>false,
				'version'=>'4.0',
				'force_activation'=>false,
				'force_deactivation'=>true
			),
			array
			(
				'name'=>'Breadcrumb NavXT',
				'slug'=>'breadcrumb-navxt',
				'required'=>false,
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'Contact Form 7',
				'slug'=>'contact-form-7',
				'required'=>false,
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'Chauffeur Booking System for WordPress',
				'slug'=>'chauffeur-booking-system',
				'source'=>AUTORIDE_THEME_PATH_SOURCE . 'chauffeur-booking-system.zip',
				'required'=>true,
				'version'=>'5.0',
				'force_activation'=>false,
				'force_deactivation'=>false
			),
			array
			(
				'name'=>'Woocommerce',
				'slug'=>'woocommerce',
				'required'=>false,
				'force_activation'=>false,
				'force_deactivation'=>false
			)
		);

		$config = array
		(
			'domain'=>'autoride',
			'default_path'=>'',
			'parent_slug'=>'themes.php',
			'menu'=>'install-required-plugins',
			'has_notices'=>true,
			'is_automatic'=>false,
			'message'=>'',
			'strings'=>array
			(
				'page_title'=>__('Install Required Plugins', 'autoride'),
				'menu_title'=>__('Install Plugins', 'autoride'),
				'installing'=>__('Installing Plugin: %s', 'autoride'),
				'oops'=>__('Something went wrong with the plugin API.', 'autoride'),
				'notice_can_install_required'=>_n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'autoride'),
				'notice_can_install_recommended'=>_n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'autoride'),
				'notice_cannot_install'=>_n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'autoride'),
				'notice_can_activate_required'=>_n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'autoride'),
				'notice_can_activate_recommended'=>_n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'autoride'),
				'notice_cannot_activate'=>_n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'autoride'),
				'notice_ask_to_update'=>_n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'autoride'),
				'notice_cannot_update'=>_n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'autoride'),
				'install_link'=>_n_noop('Begin installing plugin', 'Begin installing plugins', 'autoride'),
				'activate_link'=>_n_noop('Begin activating plugin', 'Begin activating plugins', 'autoride'),
				'return'=>__('Return to Required Plugins Installer', 'autoride'),
				'plugin_activated'=>__('Plugin activated successfully.', 'autoride'),
				'complete'=>__('All plugins installed and activated successfully. %s', 'autoride'),
				'nag_type'=>'updated'
			)
		);

		tgmpa($plugin,$config);
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{
		if($this->createMultisitePath()===false) return;
		
		$Validation=new Autoride_ThemeValidation();
		$ResponsiveMode=new Autoride_ThemeResponsiveMode();
		$ThemeWPFileSystem=new Autoride_ThemeWPFileSystem();
		
		Autoride_ThemeOption::refreshOption();

		$content=$ThemeWPFileSystem->get_contents(AUTORIDE_THEME_PATH_STYLE.'color.css');

		foreach($this->color as $index=>$value)
		{
			$color=Autoride_ThemeOption::getOption('color_'.$index);
			$color=$color=='transparent' ? $color : '#'.$color;
			$content=preg_replace('/\[color\_'.$index.'\]/',$color,$content);
		}
		
		$media=$ResponsiveMode->getMedia();
		
		foreach($media as $index=>$value)
		{
			if($Validation->isNotEmpty(Autoride_ThemeOption::getOption('custom_css_responsive_'.$index)))
			{
				if((array_key_exists('min-width',$value)) && (array_key_exists('max-width',$value)))
				{
					$content.=
					'
					@media only screen  and (min-width:'.$value['min-width'].'px) and (max-width:'.$value['max-width'].'px)
					{
					'.Autoride_ThemeOption::getOption('custom_css_responsive_'.$index).'
					}
					';
				}
				else
				{
					$content.=Autoride_ThemeOption::getOption('custom_css_responsive_'.$index);
				}
			}
		}
		
		$file=AUTORIDE_THEME_PATH_MULTISITE_SITE_STYLE.'style.css';
		
		if($ThemeWPFileSystem->put_contents($file,$content,0755)===false) return(false);

		return(true);		
	}
		
	/**************************************************************************/
	
	function createMultisitePath()
	{
		$data=array
		(
			AUTORIDE_THEME_PATH_MULTISITE_SITE,
			AUTORIDE_THEME_PATH_MULTISITE_SITE_STYLE
		);
		
		foreach($data as $path)
		{
			if(!Autoride_ThemeFile::dirExist($path)) @wp_mkdir_p($path);			
			if(!Autoride_ThemeFile::dirExist($path)) return(false);
		}
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		global $current_user;

		if(array_key_exists('autoride-dismiss-notice-1',$_GET))
			add_user_meta($current_user->ID,'autoride-dismiss-notice-1','true',true);

		if(get_user_meta($current_user->ID,'autoride-dismiss-notice-1')) return; 
		
		$file=AUTORIDE_THEME_PATH_MULTISITE_SITE_STYLE.'style.css';

		if(!is_writable($file))
		{
			echo 
			'
				<div class="notice notice-error is-dismissible"> 
					<p>
						<strong>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writeable.</b>','autoride'),str_replace('\\','/',$file)).'</strong>
						<a href="?autoride-dismiss-notice-1"><b>'.esc_html__('Dismiss','autoride').'</b></a>
					</p>
				</div>					
			';				
		}
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta,$part='all')
	{
		if(in_array($part,array('general','all')))
		{

		}
		
		if(in_array($part,array('header','all')))
		{

		}	
		
		if(in_array($part,array('footer','all')))
		{

		}	
	}
			
	/**************************************************************************/
	
	function passwordForm()
	{
		$html=
		'
			<form method="post" class="theme-post-password-form" action="'.wp_login_url().'?action=postpass">
				<p>'.__('This content is password protected.<br/>To view it please enter your password below:','autoride').'</p>
				<div class="theme-form-field">
					<label for="pwbox-160">'.esc_html__('Password:','autoride').'</label>
					<input type="password" size="20" id="pwbox-160" name="post_password">
				</div>
				<div class="aligncenter">
					<input class="theme-component-button theme-component-button-style-1" type="submit" name="Submit" value="'.esc_attr__('Submit','autoride').'">
				</div>
			</form>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function addMediaTaxonomy()
	{
		register_taxonomy_for_object_type('category','attachment');
	}
	
	/**************************************************************************/
	
	function wpcf7FormElements($form)
	{
		$form=do_shortcode(wpb_js_remove_wpautop($form));
		return($form);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/