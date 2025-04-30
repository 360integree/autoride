<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_work_experience_list',
        'name'                                                                  =>  __('Work experience list','autoride-core'),
        'description'                                                           =>  __('Creates list of experiences.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_work_experience_list_item'), 
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

add_shortcode('vc_autoride_theme_work_experience_list',array('WPBakeryShortCode_VC_Autoride_Theme_Work_Experience_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Work_Experience_List extends WPBakeryShortCodesContainer
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
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-work-experience-list',$attribute['css_class'])).'>
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