<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature',
        'name'                                                                  =>  __('Features','autoride-core'),
        'description'                                                           =>  __('Creates list of features.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'as_parent'                                                             =>  array('only'=>'vc_row'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the features.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Feature->getStyle()),
                'std'                                                           =>  '1'
            ),                  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core'),
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autoride_theme_feature',array('WPBakeryShortCode_VC_Autoride_Theme_Feature','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autoride_featureStyleId;
        
        $default=array
        (
            'style'                                                             =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Feature=new Autoride_ThemeFeature();
        
        if(!$Feature->isStyle($attribute['style']))
            $attribute['style']=$default['style'];     

        $autoride_featureStyleId=$attribute['style'];
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature','theme-component-feature-style-'.$attribute['style'],$attribute['css_class'])).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/