<?php

/******************************************************************************/
/******************************************************************************/

$MetaIcon=new Autoride_ThemeMetaIcon();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_meta_icon_list',
        'name'                                                                  =>  __('Meta icons list','autoride-core'),
        'description'                                                           =>  __('Creates list of meta icon with text.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_meta_icon_list_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (        
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the list.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($MetaIcon->getStyle()),
                'std'                                                           =>  '1'
            ), 
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

add_shortcode('vc_autoride_theme_meta_icon_list',array('WPBakeryShortCode_VC_Autoride_Theme_Meta_Icon_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Meta_Icon_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autoride_metaIconListStyle;
        
        $default=array
        (
            'style'                                                             =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $MetaIcon=new Autoride_ThemeMetaIcon();
        $Validation=new Autoride_ThemeValidation();
          
        if($Validation->isEmpty($content)) return($html);
        
        if(!$MetaIcon->isStyle($attribute['style']))
            $attribute['style']=$default['style'];    
        
        $autoride_metaIconListStyle=$attribute['style'];
        
        $html=
        '
            <ul'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-meta-icon-list','theme-component-meta-icon-list-style-'.$attribute['style'],'theme-clear-fix',$attribute['css_class'])).'>
                '.do_shortcode($content).'
            </ul>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/