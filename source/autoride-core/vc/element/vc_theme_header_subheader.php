<?php

/******************************************************************************/
/******************************************************************************/

$Align=new Autoride_ThemeAlign();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_header_subheader',
        'name'                                                                  =>  __('Header and subheader','autoride-core'),
        'description'                                                           =>  __('Creates header and subheader.','autoride-core'), 
        'category'                                                              => __('Content','autoride-core'),   
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Enter value for header.','autoride-core'),
                'admin_label'                                                   =>  true
            ), 
             array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'header_importance',
                'heading'                                                       =>  __('Header importance','autoride-core'),
                'description'                                                   =>  __('Select importance of the header.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('H1','autoride-core')                                    =>  '1',
                    __('H2','autoride-core')                                    =>  '2',
                    __('H3','autoride-core')                                    =>  '3',
                    __('H4','autoride-core')                                    =>  '4',
                    __('H5','autoride-core')                                    =>  '5',
                    __('H6','autoride-core')                                    =>  '6'
                ),
                'std'                                                           =>  '2'
            ),        
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'subheader',
                'heading'                                                       =>  __('Subheader','autoride-core'),
                'description'                                                   =>  __('Enter value for subheader.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'align',
                'heading'                                                       =>  __('Align','autoride-core'),
                'description'                                                   =>  __('Select alignment of header and subheader.','autoride-core'),
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

add_shortcode('vc_autoride_theme_header_subheader',array('WPBakeryShortCode_VC_Autoride_Theme_Header_Subheader','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Header_Subheader
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $default=array
        (
            'header'                                                            =>  '',
            'header_importance'                                                 =>  '2',
            'subheader'                                                         =>  '',
            'align'                                                             =>  'center',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Align=new Autoride_ThemeAlign();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['header'])) return($html);
        if(!$Validation->isNumber($attribute['header_importance'],1,6)) 
            $attribute['header_importance']=$default['header_importance'];
        if(!$Align->isAlign($attribute['align'])) 
            $attribute['align']=$default['align'];
     
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-header-subheader','align'.$attribute['align'],$attribute['css_class'])).'>
                '.($Validation->isEmpty($attribute['subheader']) ? null : '<div class="theme-component-header-subheader-subheader">'.$attribute['subheader'].'</div>').'
                <h'.$attribute['header_importance'].Autoride_ThemeHelper::createClassAttribute(array('theme-component-header-subheader-header')).'>'.$attribute['header'].'</h'.$attribute['header_importance'].'>
            </div>
        ';      
     
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/