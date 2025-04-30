<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_attribute_table',
        'name'                                                                  =>  __('Attributes table','autoride-core'),
        'description'                                                           =>  __('Creates table of attributes.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_attribute_table_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
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

add_shortcode('vc_autoride_theme_attribute_table',array('WPBakeryShortCode_VC_Autoride_Theme_Attribute_Table','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Attribute_Table extends WPBakeryShortCodesContainer
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-attribute-table',$attribute['css_class'])).'>
                <ul>
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