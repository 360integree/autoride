<?php ob_start(); ?>
<!DOCTYPE html>
<?php
		global $post,$autoride_ParentPost,$autoride_Sidebar;

		$Theme=new Autoride_Theme();
		
		$Post=new Autoride_ThemePost();
		$Header=new Autoride_ThemeHeader();
		$Validation=new Autoride_ThemeValidation();
		
		if(($autoride_ParentPost=$Post->getPost())===false) 
		{
			$autoride_ParentPost=new stdClass();
			$autoride_ParentPost->post=$post;
		}
?>
		<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

			<head>
				<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
				<meta name="format-detection" content="telephone=no"/>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
				<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php				
		wp_head(); 
?>
			</head>

			<body <?php body_class(); ?>>
				
				<div class="theme-page">
				
					<?php // This output has been safely escaped in the following file: class/Theme.Header.class.php ?>
					<?php echo Autoride_ThemeHeader::create($autoride_ParentPost->post); // Data escaped ok ?>
<?php
		$style=array();
		$class=array('theme-page-content');
		
		$prefix=Autoride_ThemeOption::getOptionPrefix($autoride_ParentPost->post);
		
		$meta=Autoride_ThemeOption::getPostMeta($autoride_ParentPost->post);
		
		$cssClass=Autoride_ThemeOption::getGlobalOption($autoride_ParentPost->post,'class',$prefix,true);
		$backgroundColor=Autoride_ThemeOption::getGlobalOption($autoride_ParentPost->post,'background_color',$prefix,true);
		$marginTop=Autoride_ThemeOption::getGlobalOption($autoride_ParentPost->post,'margin_top',$prefix,true);
		$marginBottom=Autoride_ThemeOption::getGlobalOption($autoride_ParentPost->post,'margin_bottom',$prefix,true);
		
		if($Validation->isNotEmpty($cssClass))
			array_push($class,$cssClass);
		if($Validation->isColor($backgroundColor))
			$style['background-color']='#'.$backgroundColor;
		if($Validation->isNumber($marginTop,0,99999))
			$style['padding-top']=(int)$marginTop.'px';
		if($Validation->isNumber($marginBottom,0,99999))
			$style['padding-bottom']=(int)$marginBottom.'px'; 
?>
					<div<?php echo Autoride_ThemeHelper::createClassAttribute($class).Autoride_ThemeHelper::createStyleAttribute($style); ?>>
<?php
		/***/

		$WidgetArea=new Autoride_ThemeWidgetArea();
						
		$widgetAreaData=$WidgetArea->getWidgetAreaByPost($autoride_ParentPost->post,'widget_area_sidebar',true);
		$class=$WidgetArea->getWidgetAreaCSSClass($widgetAreaData);	
		
		$sidebarContent=Autoride_ThemeWidgetArea::createS($widgetAreaData);
		
		if($Validation->isEmpty($sidebarContent))
		{
			$class='theme-page-sidebar-disable';
			$widgetAreaData=array('id'=>0,'location'=>0);
		}
		
		$autoride_Sidebar=false;
		
		if(in_array($widgetAreaData['location'],array(1,2)))
			$autoride_Sidebar=true;
		
		/***/
		
		if((function_exists('has_blocks')) && (has_blocks()))
			$class.=' theme-gutenberg-block';
?>
						<div class="theme-main theme-clear-fix <?php echo esc_attr($class); ?>">	
<?php
		if($widgetAreaData['location']==1)
		{
?>
							<div class="theme-column-left"><?php $WidgetArea->create($widgetAreaData); ?></div>
							<div class="theme-column-right">
<?php
		}
		elseif($widgetAreaData['location']==2)
		{
?>
							<div class="theme-column-left">
<?php
		}																										