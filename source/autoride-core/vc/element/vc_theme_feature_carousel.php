<?php

/******************************************************************************/
/******************************************************************************/

global $autoride_processListItemCounter;

$autoride_processListItemCounter=0;

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_carousel',
        'name'                                                                  =>  __('Features carousel','autoride-core'),
        'description'                                                           =>  __('Creates carousel of features.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_feature_carousel_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (        
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core')
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_feature_carousel',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Carousel','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Carousel extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-carousel',$attribute['css_class'])).'>
                <ul'.Autoride_ThemeHelper::createClassAttribute(array('theme-reset-list')).'>
                    '.do_shortcode($content).'
                </ul>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/