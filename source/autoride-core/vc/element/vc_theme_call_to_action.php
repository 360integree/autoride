<?php

/******************************************************************************/
/******************************************************************************/

$Align=new Autoride_ThemeAlign();
$Button=new Autoride_ThemeButton();
$Window=new Autoride_ThemeWindow();
$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();
$CallToAction=new Autoride_ThemeCallToAction();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_call_to_action',
        'name'                                                                  =>  __('Call to action','autoride-core'),
        'description'                                                           =>  __('Creates call to action section.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the call to action.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($CallToAction->getStyle()),
                'std'                                                           =>  '1'
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'icon',
                'heading'                                                       =>  __('Icon','autoride-core'),
                'description'                                                   =>  __('Select icon.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Feature->getFeature()),
                'std'                                                           =>  'account',
                'admin_label'                                                   =>  true
            ),                     
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Enter header of the call to action section.','autoride-core'),
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textarea',
                'param_name'                                                    =>  'subheader',
                'heading'                                                       =>  __('Subheader','autoride-core'),
                'description'                                                   =>  __('Enter subheader of the call to action section.','autoride-core'),
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'button_label',
                'heading'                                                       =>  __('Button label','autoride-core'),
                'description'                                                   =>  __('Enter label of the button.','autoride-core'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'button_url',
                'heading'                                                       =>  __('Button URL address','autoride-core'),
                'description'                                                   =>  __('Enter URL address of the button.','autoride-core'),
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'button_url_target',
                'heading'                                                       =>  __('Button URL addres target','autoride-core'),
                'description'                                                   =>  __('Select target of the URL address.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Window->getTarget()),
                'std'                                                           =>  '_self'
            ),        
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'button_style',
                'heading'                                                       =>  __('Button style','autoride-core'),
                'description'                                                   =>  __('Select style of the button.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Button->getStyle()),
                'std'                                                           =>  '2'
            ),    
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'align',
                'heading'                                                       =>  __('Align','autodrive-core'),
                'description'                                                   =>  __('Select alignment of the call to action.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Align->getAlign()),
                'std'                                                           =>  'center'
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

/******************************************************************************/

add_shortcode('vc_autoride_theme_call_to_action',array('WPBakeryShortCode_VC_Autoride_Theme_Call_To_Action','vcHTML'));

/******************************************************************************/
        
class WPBakeryShortCode_VC_Autoride_Theme_Call_To_Action
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'style'                                                             =>  '1',
            'icon'                                                              =>  'account',
            'header'                                                            =>  '',
            'subheader'                                                         =>  '',
            'button_label'                                                      =>  __('Button','autoride-core'),
            'button_url'                                                        =>  '',
            'button_url_target'                                                 =>  '_self',
            'button_style'                                                      =>  '2',
            'align'                                                             =>  'center',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Align=new Autoride_ThemeAlign();
        $Button=new Autoride_ThemeButton();
        $Window=new Autoride_ThemeWindow();
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        $CallToAction=new Autoride_ThemeCallToAction();
        
        if($Validation->isEmpty($attribute['header'])) return($html);
        if($Validation->isEmpty($attribute['subheader'])) return($html);
        if($Validation->isEmpty($attribute['button_url'])) return($html);
        
        if(!$CallToAction->isStyle($attribute['style']))
            $attribute['style']=$default['style']; 
        if(!$Feature->isFeature($attribute['icon']))
            $attribute['icon']=$default['icon']; 
        if($Validation->isEmpty($attribute['button_label']))
            $attribute['button_label']=$default['button_label']; 
        if(!$Window->isTarget($attribute['button_url_target']))
            $attribute['button_url_target']=$default['button_url_target'];
        if(!$Button->isStyle($attribute['button_style']))
            $attribute['button_style']=$default['button_style'];
        if(!$Align->isAlign($attribute['align']))
            $attribute['align']=$default['align'];           
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-call-to-action','theme-component-call-to-action-style-'.$attribute['style'],'align'.$attribute['align'],$attribute['css_class'])).'>
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-call-to-action-box')).'>
                    <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'],'theme-component-call-to-action-icon')).'><span></span></span>
                    <h4'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-call-to-action-header')).'>'.$attribute['header'].'</h4>
                    <p'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-call-to-action-subheader')).'>'.$attribute['subheader'].'</p>
                    '.do_shortcode('[vc_autoride_theme_button url_target="'.$attribute['button_url_target'].'" style="'.$attribute['button_style'].'" label="'.$attribute['button_label'].'" url="'.$attribute['button_url'].'" css_class="theme-component-call-to-action-button"]').'
                </div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/