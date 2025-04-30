<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_process_list_item',
        'name'                                                                  =>  __('Process list item','autoride-core'),
        'description'                                                           =>  __('Creates single process list item.','autoride-core'), 
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

add_shortcode('vc_autoride_theme_process_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Process_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Process_List_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'icon'                                                              =>  'account',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        if(!$Feature->isFeature($attribute['icon']))
            $attribute['icon']=$default['icon']; 
        
        global $autoride_processListItemCounter;
        
        $autoride_processListItemCounter++;
        
        $class='theme-component-process-list-item-odd';
        
        if(($autoride_processListItemCounter-1)%2==0)
            $class='theme-component-process-list-item-even';
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-process-list-item',$class,$attribute['css_class'])).'>
                <div>'.($autoride_processListItemCounter<=9 ? '0'.$autoride_processListItemCounter : $autoride_processListItemCounter).'</div>
                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).'></span>
                <p>'.do_shortcode($content).'</p>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/