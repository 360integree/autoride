<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_tab_item',
        'name'                                                                  =>  __('Tab item','autoride-core'),
        'description'                                                           =>  __('Creates single tab item','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autoride-core'),
                'description'                                                   =>  __('Select icon.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Feature->getFeature()),
                'std'                                                           =>  'account'
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Header.','autoride-core'),
                'admin_label'                                                   =>  true
            ),    
            array
            (
                'type'                                                          =>  'textarea_html',
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Content','autoride-core'),
                'description'                                                   =>  __('Content.','autoride-core'),
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

add_shortcode('vc_autoride_theme_tab_item',array('WPBakeryShortCode_VC_Autoride_Theme_Tab_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Tab_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'icon'                                                              =>  '',
            'header'                                                            =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        
        if(!$Feature->isFeature($attribute['icon'])) return($html);
        if($Validation->isEmpty($attribute['header'])) return($html);
        
        $id=Autoride_ThemeHelper::createId('theme_component_tab');
        
        $html= 
        '
            <a href="#'.esc_attr($id).'"><span class="theme-icon-feature-'.esc_attr($attribute['icon']).'"></span><span>'.esc_html($attribute['header']).'</span></a>
            <div id="'.esc_attr($id).'">'.do_shortcode($content).'</div>
        ';
        
        return($html);       
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/