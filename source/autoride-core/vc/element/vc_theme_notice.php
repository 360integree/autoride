<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_notice',
        'name'                                                                  =>  __('Notice','autoride-core'),
        'description'                                                           =>  __('Creates notice.','autoride-core'), 
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
                'group'                                                         =>  __('General','autoride-core'),
            ),                      
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header_text',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Enter text of header.','autoride-core'),
                'admin_label'                                                   =>  true,
                'group'                                                         =>  __('General','autoride-core'),
            ),                     
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'subheader_text',
                'heading'                                                       =>  __('Subheader','autoride-core'),
                'description'                                                   =>  __('Enter text of subheader.','autoride-core'),
                'admin_label'                                                   =>  true,
                'group'                                                         =>  __('General','autoride-core'),
            ),                         
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core'),
            )
        )
    )
);  

/******************************************************************************/

add_shortcode('vc_autoride_theme_notice',array('WPBakeryShortCode_VC_Autoride_Theme_Notice','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Notice
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'icon'                                                              =>  '',
            'header_text'                                                       =>  '',
            'subheader_text'                                                    =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
                
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        
        if(!$Feature->isFeature($attribute['icon'])) return($html);

        if($Validation->isEmpty($attribute['header_text'])) return($html);
        if($Validation->isEmpty($attribute['subheader_text'])) return($html);

        /***/
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-notice',$attribute['css_class'])).'>
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-notice-icon')).'>
                    <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-feature-'.$attribute['icon'])).'>
                        <span></span>
                    </span>
                </div>
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-notice-content')).'>
                    <h4>'.$attribute['header_text'].'</h4>
                    <p>'.$attribute['subheader_text'].'</p>
                </div>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/