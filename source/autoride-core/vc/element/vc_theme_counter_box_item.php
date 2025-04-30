<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_counter_box_item',
        'name'                                                                  =>  __('Counters box item','autoride-core'),
        'description'                                                           =>  __('Creates single counter box.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'label',
                'heading'                                                       =>  __('Label','autoride-core'),
                'description'                                                   =>  __('Enter label of progress bar.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'value',
                'heading'                                                       =>  __('Value','autoride-core'),
                'description'                                                   =>  __('Enter value of progress bar. An integer value from range 0 to 999999.','autoride-core'),
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autoride_theme_counter_box_item',array('WPBakeryShortCode_VC_Autoride_Theme_Counter_Box_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Counter_Box_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'label'                                                             =>  '',
            'value'                                                             =>  0
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
       
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['label'])) return($html);
        if(!$Validation->isNumber($attribute['value'],0,999999)) return($html);

        $dataAttribute=$attribute;
              
        unset($dataAttribute['label']);
        
        $html=
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item')).Autoride_ThemeHelper::createDataAttribute($dataAttribute).'>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item-circle-1')).'></span>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item-circle-2')).'></span>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item-value')).'>0</span>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item-label')).'>'.esc_html($attribute['label']).'</span>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-counter-box-item-tick','theme-icon-meta-tick-3')).'></span>   
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/