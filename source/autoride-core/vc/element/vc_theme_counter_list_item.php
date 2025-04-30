<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_counter_list_item',
        'name'                                                                  =>  __('Counters list item','autoride-core'),
        'description'                                                           =>  __('Creates single counters list item.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'name',
                'heading'                                                       =>  __('Name','autoride-core'),
                'description'                                                   =>  __('Enter name.','autoride-core'),
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value',
                'heading'                                                       =>  __('Value','autoride-core'),
                'description'                                                   =>  __('Enter value. Allowed are integres numbers from 0 to 999999999.','autoride-core'),
                'admin_label'                                                   =>  true
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

add_shortcode('vc_autoride_theme_counter_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Counter_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Counter_List_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'name'                                                              =>  '',
            'value'                                                             =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['name'])) return($html);
        if(!$Validation->isNumber($attribute['value'],0,999999999)) return($html);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-list-item','theme-clear-fix',$attribute['css_class'])).' data-value="'.(int)$attribute['value'].'">
                <span>'.esc_html($attribute['name']).'</span>
                <div><div></div></div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/