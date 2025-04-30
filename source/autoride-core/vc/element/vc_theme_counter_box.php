<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_counter_box',
        'name'                                                                  =>  __('Counters box','autoride-core'),
        'description'                                                           =>  __('Creates list of counter boxes.','autoride-core'), 
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
                'param_name'                                                    =>  'animation_duration',
                'heading'                                                       =>  __('Animation duration','autoride-core'),
                'description'                                                   =>  __('Enter duration (in miliseconds) of animation. Allowed are integer numbers from range 0 to 999999.','autoride-core'),
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

add_shortcode('vc_autoride_theme_counter_box',array('WPBakeryShortCode_VC_Autoride_Theme_Counter_Box','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Counter_Box extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'animation_duration'                                                =>  '2000',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();

        if(!$Validation->isNumber($attribute['animation_duration'],0,999999)) 
            $attribute['animation_duration']=$default['animation_duration'];        
        
        $dataAttribute=$attribute;
        
        unset($dataAttribute['css_class']);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box',$attribute['css_class'])).Autoride_ThemeHelper::createDataAttribute($dataAttribute).'>
                '.do_shortcode($content).'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/