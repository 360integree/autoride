<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeHeader
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->template=array
		(
			
		);
	}
	
	/**************************************************************************/
	
	static function create($post)
	{
		$html=null;
		
		$prefix=Autoride_ThemeOption::getOptionPrefix($post);
		
		$Validation=new Autoride_ThemeValidation();
		
		/***/
		
		$id=(int)Autoride_ThemeOption::getGlobalOption($post,'header_top_template_id',$prefix);
		$content=do_shortcode('[vc_templatica_template template_id="'.$id.'"]');
		
		if(($Validation->isNotEmpty($content)) && ($id>0))
		{
			$html.=
			'
				<div class="theme-page-header-top">
					<div class="theme-main">'.$content.'</div>
				</div>
			';
		}
		
		/***/
		
		$id=(int)Autoride_ThemeOption::getGlobalOption($post,'header_middle_template_id',$prefix);
		$content=do_shortcode('[vc_templatica_template template_id="'.$id.'"]');

		if($id===-1)
		{
			$Menu=new Autoride_ThemeMenu();
			$Plugin=new Autoride_ThemePlugin();
			
			$contentLogo=null;
			$contentMenu=$Menu->create();
			
			if($Plugin->isActive('ARCAutorideCore'))
			{
				$contentLogo=do_shortcode('[vc_autoride_theme_logo]');
			}
			else
			{
				$src=Autoride_ThemeOption::getOption('logo_normal_src');
				
				if($Validation->isNotEmpty($src))
				{
					$style=array();
					
					$width=Autoride_ThemeOption::getOption('logo_normal_width');
					$height=Autoride_ThemeOption::getOption('logo_normal_height');
					
					if((int)$width>0) $style['max-width']=$width.'px';
					if((int)$height>0) $style['max-height']=$height.'px';

					$contentLogo=
					'
						<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo')).'>
							<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo-normal')).'>
								<a href="'.esc_url(get_home_url()).'" title="'.esc_attr(get_bloginfo('name')).'">
									<img src="'.esc_attr($src).'" alt="'.esc_attr(get_bloginfo('name')).'"'.Autoride_ThemeHelper::createStyleAttribute($style).'/>
								</a>  
							</div>
						 </div>
					';  
				}
			}

			$text=get_bloginfo('title');
			if($Validation->isEmpty($text)) $text=__('AutoRide','autoride');

			$contentLogo=
			'
				<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo')).'>
					<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo-normal')).'>
						<h3>
							<a href="'.esc_url(get_home_url()).'" title="'.esc_attr(get_bloginfo('name')).'">
								'.esc_html($text).'
							</a>
						</h3>
					</div>
					<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo-retina')).'>
						<h3>
							<a href="'.esc_url(get_home_url()).'" title="'.esc_attr(get_bloginfo('name')).'">
								'.esc_html($text).'
							</a>
						</h3>
					</div>
				</div>
			';
		
			$html.=
			'
				<div class="theme-page-header-middle theme-page-header-middle-default">
					<div class="theme-main">
						'.$contentLogo.'
						'.$contentMenu[0].$contentMenu[1].'
					</div>
				</div>
			';
		}		
		elseif($Validation->isNotEmpty($content))
		{
			$html.=
			'
				<div class="theme-page-header-middle">
					<div class="theme-main">'.$content.'</div>
				</div>
			';
		}
		
		/***/
		
		$id=(int)Autoride_ThemeOption::getGlobalOption($post,'header_bottom_template_id',$prefix);
		$content=do_shortcode('[vc_templatica_template template_id="'.$id.'"]');
		
		if($id===-1)
		{
			if((is_object($post)) && (property_exists($post,'post_title')))
			{
				$html.=
				'
					<div class="theme-page-header-bottom theme-page-header-bottom-default">
						<div class="theme-main">
							<div class="theme-page-header-title theme-page-header-title-type-text">
								<h1>'.$post->post_title.'</h1>
							</div>
						</div>
					</div>				
				';
			}
		}
		elseif($Validation->isNotEmpty($content))
		{
			$html.=
			'
				<div class="theme-page-header-bottom">
					<div class="theme-main">'.$content.'</div>
				</div>
			';
		}
		
		/***/
		
		$html=
		'
			<div class="theme-page-header">
				'.$html.'
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/