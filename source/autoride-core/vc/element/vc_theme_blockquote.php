<?php

/******************************************************************************/
/******************************************************************************/

$Blockquote=new Autoride_ThemeBlockquote();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_blockquote',
        'name'                                                                  =>  __('Blockquote','autodrive-core'),
        'description'                                                           =>  __('Creates blockquote.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),  
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the button.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Blockquote->getStyle()),
                'std'                                                           =>  '1'
            ),     
            array
            (
                'type'                                                          =>  'textarea',
                'param_name'                                                    =>  'content',
                'admin_label'                                                   =>  true,
                'heading'                                                       =>  __('Blockquote','autodrive-core'),
                'description'                                                   =>  __('Enter blockquote.','autodrive-core'),
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'author',
                'admin_label'                                                   =>  true,
                'heading'                                                       =>  __('Author','autodrive-core'),
                'description'                                                   =>  __('Author of the quote.','autodrive-core'),
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

add_shortcode('vc_autoride_theme_blockquote',array('WPBakeryShortCode_VC_Autoride_Theme_Blockquote','vcHTML'));
        
/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Blockquote
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'author'                                                            =>  '',
            'style'                                                             =>  1,
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
     
        $Blockquote=new Autoride_ThemeBlockquote();
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
        
        if(!$Blockquote->isStyle($attribute['style']))
            $attribute['style']=$default['style'];            
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-blockquote','theme-component-blockquote-style-'.(int)$attribute['style'],$attribute['css_class'])).'>
                <span class="theme-icon-meta-quote"></span>
                <blockquote>'.$content.'</blockquote>
                '.($Validation->isEmpty($attribute['author']) ? null : '<div>'.esc_html($attribute['author']).'</div>').'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/