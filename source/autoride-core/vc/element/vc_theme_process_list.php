<?php

/******************************************************************************/
/******************************************************************************/

global $autoride_processListItemCounter;

$autoride_processListItemCounter=0;

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_process_list',
        'name'                                                                  =>  __('Process list','autoride-core'),
        'description'                                                           =>  __('Creates process list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_row'), 
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

add_shortcode('vc_autoride_theme_process_list',array('WPBakeryShortCode_VC_Autoride_Theme_Process_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Process_List extends WPBakeryShortCodesContainer 
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
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-process-list',$attribute['css_class'])).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/