<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_testimonial_list_item',
        'name'                                                                  =>  __('Testimonials list item','autoride-core'),
        'description'                                                           =>  __('Creates single item of testimonials list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'testimonial',
                'heading'                                                       =>  __('Testimonial','autoride-core'),
                'description'                                                   =>  __('Enter testimonial of item.','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'author',
                'heading'                                                       =>  __('Author','autoride-core'),
                'description'                                                   =>  __('Enter author of testimonial.','autoride-core'),
                'admin_label'                                                   =>  true
            )                      
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_testimonial_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Testimonial_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Testimonial_List_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'testimonial'                                                       =>  '',
            'author'                                                            =>  '',
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;

        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['testimonial'])) return($html);
    
        if($Validation->isNotEmpty($attribute['author']))
            $html.='<div>'.esc_html($attribute['author']).'</div>';

        $html=
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-testimonial-list-item')).'>
                <span class="theme-icon-feature-testimonials-2"><span></span></span>
                <p>'.esc_html($attribute['testimonial']).'</p>
                '.$html.'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/