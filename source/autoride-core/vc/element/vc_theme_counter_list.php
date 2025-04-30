<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_counter_list',
        'name'                                                                  =>  __('Counters list','autoride-core'),
        'description'                                                           =>  __('Creates counters list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_counter_list_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (     
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'animation_duration',
                'heading'                                                       =>  __('Duration','autoride-core'),
                'description'                                                   =>  __('Duration of animation in milisecond. Allowed are integres numbers from 0 to 999999.','autoride-core')
            ),
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

add_shortcode('vc_autoride_theme_counter_list',array('WPBakeryShortCode_VC_Autoride_Theme_Counter_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Counter_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'animation_duration'                                                =>  0,
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        if(!$Validation->isNumber($attribute['animation_duration'],0,999999)) return($html);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-list',$attribute['css_class'])).' data-animation_duration="'.(int)$attribute['animation_duration'].'">
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/