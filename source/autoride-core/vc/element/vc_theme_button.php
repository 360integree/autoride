<?php

/******************************************************************************/
/******************************************************************************/

$Align=new Autoride_ThemeAlign();
$Window=new Autoride_ThemeWindow();
$Button=new Autoride_ThemeButton();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_button',
        'name'                                                                  =>  __('Button','autodrive-core'),
        'description'                                                           =>  __('Creates button.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),  
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'label',
                'admin_label'                                                   =>  true,
                'heading'                                                       =>  __('Label','autodrive-core'),
                'description'                                                   =>  __('Enter label of the button.','autodrive-core'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'url',
                'heading'                                                       =>  __('URL address','autodrive-core'),
                'description'                                                   =>  __('Enter URL address of the button.','autodrive-core'),
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'url_target',
                'heading'                                                       =>  __('URL address target','autodrive-core'),
                'description'                                                   =>  __('Select target of the URL address.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Window->getTarget()),
                'std'                                                           =>  '_self'
            ),        
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the button.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Button->getStyle()),
                'std'                                                           =>  '1'
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'align',
                'heading'                                                       =>  __('Align','autodrive-core'),
                'description'                                                   =>  __('Select alignment of the button.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Align->getAlign()),
                'std'                                                           =>  'left'
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

add_shortcode('vc_autoride_theme_button',array('WPBakeryShortCode_VC_Autoride_Theme_Button','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Button 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'label'                                                             =>  __('Button','autodrive-core'),
            'url'                                                               =>  '',
            'url_target'                                                        =>  '_self',
            'style'                                                             =>  '1',
            'align'                                                             =>  'left',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Align=new Autoride_ThemeAlign();
        $Button=new Autoride_ThemeButton();
        $Window=new Autoride_ThemeWindow();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['url'])) 
            return($html);
        
        if($Validation->isEmpty($attribute['label']))
            $attribute['label']=$default['label'];
        if(!$Window->isTarget($attribute['url_target']))
            $attribute['url_target']=$default['url_target']; 
        if(!$Button->isStyle($attribute['style']))
            $attribute['style']=$default['style'];         
        if(!$Align->isAlign($attribute['align']))
            $attribute['align']=$default['align'];         

        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-button','theme-component-button-style-'.$attribute['style'],'align'.$attribute['align'],$attribute['css_class'])).'>
                <a href="'.esc_url($attribute['url']).'" target="'.esc_attr($attribute['url_target']).'">
                    '.$attribute['label'].'
                </a>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/