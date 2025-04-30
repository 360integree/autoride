<?php

/******************************************************************************/
/******************************************************************************/

$VisualComposer=new ARCVisualComposer();

$menu=get_terms('nav_menu'); 

$dictionary=array(0=>__('[Not selected]','autoride-core'));

foreach($menu as $value)
    $dictionary[$value->term_id]=$value->name;

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_menu',
        'name'                                                                  =>  __('Menu','autoride-core'),
        'description'                                                           =>  __('Creates menu.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'menu_id',
                'heading'                                                       =>  __('Menu','autoride-core'),
                'description'                                                   =>  __('Select menu','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($dictionary),
                'std'                                                           =>  'account'
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

add_shortcode('vc_autoride_theme_menu',array('WPBakeryShortCode_VC_Autoride_Theme_Menu','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Menu
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'menu_id'                                                           =>  0,
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $Menu=new Autoride_ThemeMenu();
        
        $html=$Menu->create($attribute['menu_id']);
        
        return($html[0].$html[1]);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/