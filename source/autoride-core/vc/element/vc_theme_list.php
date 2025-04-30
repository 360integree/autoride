<?php

/******************************************************************************/
/******************************************************************************/

$List=new Autoride_ThemeList();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_list',
        'name'                                                                  =>  __('List','autoride-core'),
        'description'                                                           =>  __('Creates unordered list.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the list.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($List->getStyle()),
                'std'                                                           =>  '1'
            ),                    
            array
            (
                'type'                                                          =>  'textarea_html',
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Content','autoride-core'),
                'description'                                                   =>  __('Enter list.','autoride-core')
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
        
/**************************************************************************/
 
add_shortcode('vc_autoride_theme_list',array('WPBakeryShortCode_VC_Autoride_Theme_List','vcHTML'));
        
/**************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_List
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
        
        $List=new Autoride_ThemeList();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        if(!$List->isStyle($attribute['style']))
            $attribute['style']=$default['style']; 
        
        $html='<div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-list','theme-component-list-style-'.(int)$attribute['style'],$attribute['css_class'])).'>'.strip_tags($content,'<ul><li>').'</div>';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/