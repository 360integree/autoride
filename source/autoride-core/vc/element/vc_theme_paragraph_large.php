<?php

/******************************************************************************/
/******************************************************************************/

$Align=new Autoride_ThemeAlign();
$VisualComposer=new ARCVisualComposer();
$Paragraph=new Autoride_ThemeParagraph();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_paragraph_large',
        'name'                                                                  =>  __('Paragraph large','autoride-core'),
        'description'                                                           =>  __('Creates paragraph with large text.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'textarea',
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Content','autoride-core'),
                'description'                                                   =>  __('Content of the paragraph.','autoride-core'),
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the paragraph.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Paragraph->getStyle()),
                'std'                                                           =>  '1'
            ),  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'align',
                'heading'                                                       =>  __('Align','autodrive-core'),
                'description'                                                   =>  __('Select alignment of the call to action.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Align->getAlign()),
                'std'                                                           =>  'left'
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

add_shortcode('vc_autoride_theme_paragraph_large',array('WPBakeryShortCode_VC_Autoride_Theme_Paragraph_Large','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Paragraph_Large
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $Paragraph=new Autoride_ThemeParagraph();
        
        $default=array
        (
            'style'                                                             =>  '1',
            'align'                                                             =>  'left',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Align=new Autoride_ThemeAlign();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        if(!$Paragraph->isStyle($attribute['style']))
            $attribute['style']=$default['style'];  
        if(!$Align->isAlign($attribute['align']))
            $attribute['align']=$default['align'];           
        
        $html= 
        '
            <p'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-paragraph-large','theme-component-paragraph-large-style-'.$attribute['style'],'align'.$attribute['align'],$attribute['css_class'])).'>
                '.$content.'
            </p>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/