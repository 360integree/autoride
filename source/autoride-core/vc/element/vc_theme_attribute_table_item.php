<?php

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_attribute_table_item',
        'name'                                                                  =>  __('Attributes table item','autoride-core'),
        'description'                                                           =>  __('Creates single row.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'name',
                'heading'                                                       =>  __('Name','autoride-core'),
                'description'                                                   =>  __('Enter name of attribute.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value',
                'heading'                                                       =>  __('Value','autoride-core'),
                'description'                                                   =>  __('Enter value of attribute.','autoride-core'),
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

add_shortcode('vc_autoride_theme_attribute_table_item',array('WPBakeryShortCode_VC_Autoride_Theme_Attribute_Table_Item','vcHTML'));

/******************************************************************************/
/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Attribute_Table_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
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
        if($Validation->isEmpty($attribute['value'])) return($html);
        
        $html=
        '
            <li'.Autoride_ThemeHelper::createClassAttribute(array($attribute['css_class'])).'>
                <div>'.esc_html($attribute['name']).'</div>
                <div>'.esc_html($attribute['value']).'</div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/