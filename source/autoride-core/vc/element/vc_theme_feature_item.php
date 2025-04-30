<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_item',
        'name'                                                                  =>  __('Features item','autoride-core'),
        'description'                                                           =>  __('Creates single feature.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),  
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autoride-core'),
                'description'                                                   =>  __('Select icon of feature.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Feature->getFeature()),
                'std'                                                           =>  'account'
            ),  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Enter header of feature.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header_url',
                'heading'                                                       =>  __('Header URL address','autoride-core'),
                'description'                                                   =>  __('Enter header URL address.','autoride-core'),
            ),                    
            array
            (
                'type'                                                          =>  'textarea_html',
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Description','autoride-core'),
                'description'                                                   =>  __('Enter description of feature.','autoride-core'),
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

add_shortcode('vc_autoride_theme_feature_item',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autoride_featureStyleId;
        
        $default=array
        (
            'icon'                                                              =>  'account',
            'header'                                                            =>  '',
            'header_url'                                                        =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        
        if(!$Feature->isFeature($attribute['icon']))
            $attribute['icon']=$default['icon']; 
          
        if($Validation->isNotEmpty($attribute['header']))
        {
            if($Validation->isNotEmpty($attribute['header_url']))
                $html='<a href="'.esc_url($attribute['header_url']).'">'.esc_html($attribute['header']).'</a>';  
            else $html=esc_html($attribute['header']); 
            
            if(in_array($autoride_featureStyleId,array(1,3))) $html='<h4'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-item-header')).'>'.$html.'</h4>';
            else $html='<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-item-header')).'>'.$html.'</div>';
        }
        
        if($Validation->isNotEmpty($content))
            $html.=do_shortcode(wpb_js_remove_wpautop($content,true));
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-item',$attribute['css_class'])).'>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'],'theme-component-feature-item-icon')).'><span></span></span>
                '.$html.'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/

