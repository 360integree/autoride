<?php

/******************************************************************************/
/******************************************************************************/

$MetaIcon=new Autoride_ThemeMetaIcon();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_meta_icon_list_item',
        'name'                                                                  =>  __('Meta icons list item','autoride-core'),
        'description'                                                           =>  __('Creates single meta icon.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'as_child'                                                              =>  array('only'=>'vc_autoride_theme_meta_icon_list'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autoride-core'),
                'description'                                                   =>  __('Select meta icon.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($MetaIcon->getMeta()),
                'std'                                                           =>  'arrow-horizontal',
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'label_1',
                'heading'                                                       =>  __('Label','autodrive-core'),
                'description'                                                   =>  __('Label.','autodrive-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'url_address',
                'heading'                                                       =>  __('URL address','autodrive-core'),
                'description'                                                   =>  __('URL address.','autodrive-core'),
                'admin_label'                                                   =>  true
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_meta_icon_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Meta_Icon_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Meta_Icon_List_Item 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        global $autoride_metaIconListStyle;
        
        $default=array
        (
            'icon'                                                              =>  '',
            'label_1'                                                           =>  '',
            'url_address'                                                       =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;

        $Validation=new Autoride_ThemeValidation();
        $MetaIcon=new Autoride_ThemeMetaIcon();
        
        if(!$MetaIcon->isMeta($attribute['icon'])) return($html);

        $html='<span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-meta-'.$attribute['icon'])).'></span>';
        
        if($autoride_metaIconListStyle!=3)
            $html.='<span><span>'.$attribute['label_1'].'</span></span>';
        
        if($Validation->isNotEmpty($attribute['url_address']))
            $html='<a href="'.esc_url($attribute['url_address']).'">'.$html.'</a>';
        
        $html='<li>'.$html.'</li>';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/