<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_work_experience_list_item',
        'name'                                                                  =>  __('Work experience list item','autoride-core'),
        'description'                                                           =>  __('Creates single item of work experience list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'duration',
                'heading'                                                       =>  __('Duration','autoride-core'),
                'description'                                                   =>  __('Enter duration in months/years etc, e.g: 2.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'duration_unit',
                'heading'                                                       =>  __('Duration unit','autoride-core'),
                'description'                                                   =>  __('Enter name of duartion unit e.g: months, years.','autoride-core'),
                'admin_label'                                                   =>  true
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'period',
                'heading'                                                       =>  __('Period','autoride-core'),
                'description'                                                   =>  __('Enter period, e.g: From 2015 to 2017.','autoride-core'),
                'admin_label'                                                   =>  true
            ),                     

            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'position',
                'heading'                                                       =>  __('Position','autoride-core'),
                'description'                                                   =>  __('Enter position, e.g: Driver.','autoride-core'),
            ),
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

add_shortcode('vc_autoride_theme_work_experience_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Work_Experience_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Work_Experience_List_Item
{
    /**************************************************************************/

    public static function vcHTML($attr) 
    {
        $default=array
        (
            'duration'                                                          =>  '',
            'duration_unit'                                                     =>  '',
            'period'                                                            =>  '',
            'position'                                                          =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
       
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['duration'])) return($html);
        if($Validation->isEmpty($attribute['duration_unit'])) return($html);
        
        if($Validation->isEmpty($attribute['period'])) return($html);
        if($Validation->isEmpty($attribute['position'])) return($html);
        
        $html=
        '
            <li'.Autoride_ThemeHelper::createClassAttribute(array($attribute['css_class'])).'>
                <div>
                    <span>'.esc_html($attribute['duration']).'</span>
                    <span>'.esc_html($attribute['duration_unit']).'</span>
                </div>
                <div>
                    <span>'.esc_html($attribute['period']).'</span>
                    <span>'.esc_html($attribute['position']).'</span>
                </div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/