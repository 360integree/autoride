<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_logo',
        'name'                                                                  =>  __('Logo','autodrive-core'),
        'description'                                                           =>  __('Displays logo defined in Theme Options.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),  
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autodrive-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autodrive-core'),
            )   
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autoride_theme_logo',array('WPBakeryShortCode_VC_Autoride_Theme_Logo','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Logo
{
    /**************************************************************************/
    
    private static function createLogo($src,$width,$height)
    {
        $Validation=new Autoride_ThemeValidation();
        
        $html=null;
        $style=array();
        
        if($Validation->isEmpty($src)) return($html);
        
        if((int)$width>0) $style['max-width']=$width.'px';
        if((int)$height>0) $style['max-height']=$height.'px';

        $html=
        '
            <a href="'.esc_url(get_home_url()).'" title="'.get_bloginfo('name').'">
                <img src="'.esc_attr($src).'" alt="'.esc_attr(get_bloginfo('name')).'"'.Autoride_ThemeHelper::createStyleAttribute($style).'/>
            </a>            
        ';  
        
        return($html);
    }
    
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        $htmlLogoNormal=self::createLogo(Autoride_ThemeOption::getOption('logo_normal_src'),Autoride_ThemeOption::getOption('logo_normal_width'),Autoride_ThemeOption::getOption('logo_normal_height'));
        $htmlLogoRetina=self::createLogo(Autoride_ThemeOption::getOption('logo_retina_src'),Autoride_ThemeOption::getOption('logo_retina_width'),Autoride_ThemeOption::getOption('logo_retina_height'));

        if($Validation->isNotEmpty($htmlLogoNormal)) 
        {
            $html.=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo-normal')).'>
                    '.$htmlLogoNormal.'
                </div>
            ';            
        }
        if($Validation->isNotEmpty($htmlLogoRetina)) 
        {
            $html.=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo-retina')).'>
                    '.$htmlLogoRetina.'
                </div>
            ';            
        }        
        
        if($Validation->isNotEmpty($html))
        {
            $html=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-logo',$attribute['css_class'])).'> 
                    '.$html.'
                </div>
            ';
        }

        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/