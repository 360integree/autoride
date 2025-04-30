<?php

/******************************************************************************/
/******************************************************************************/

$VisualComposer=new ARCVisualComposer();
$Testimonial=new Autoride_ThemeTestimonial();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_testimonial_list',
        'name'                                                                  =>  __('Testimonials list','autoride-core'),
        'description'                                                           =>  __('Creates testimonials list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'show_settings_on_create'                                               =>  true,
        'params'                                                                =>  array
        (     
           array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the testimonials.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Testimonial->getStyle()),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('General','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_testimonial_list',array('WPBakeryShortCode_VC_Autoride_Theme_Testimonial_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Testimonial_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'style'                                                             =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        $Testimonial=new Autoride_ThemeTestimonial();
        
        if($Validation->isEmpty($content)) return($html);
        
        if(!$Testimonial->isStyle($attribute['style']))
            $attribute['style']=$default['style'];

        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-testimonial-list','theme-component-testimonial-list-style-'.(int)$attribute['style'],$attribute['css_class'])).'>
                <div>
                    '.do_shortcode($content).'
                </div>
            </div>
        ';             

        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/