<?php

/******************************************************************************/
/******************************************************************************/

$VisualComposer=new ARCVisualComposer();
$FeatureCircle=new Autoride_ThemeFeatureCircle();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_circle_item',
        'name'                                                                  =>  __('Features cicrcle item','autodrive-core'),
        'description'                                                           =>  __('Creates single feature in circle.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),   
        'as_child'                                                              =>  array('only'=>'vc_autoride_theme_feature_circle'),
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'label_text',
                'heading'                                                       =>  __('Label','autodrive-core'),
                'description'                                                   =>  __('Enter text of label.','autodrive-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'label_position',
                'heading'                                                       =>  __('Label position','autodrive-core'),
                'description'                                                   =>  __('Select position of the label.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($FeatureCircle->getLabelPosition()),
                'std'                                                           =>  '_self'
            ),   
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autoride_theme_feature_circle_item',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Circle_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Circle_Item 
{
    /**************************************************************************/
    
    function __construct() 
    {

    }
     
    /**************************************************************************/     
    
    public static function vcHTML($attr) 
    {
        global $autoride_featureCircleList; 
        
        $default=array
        (
            'label_text'                                                        =>  '',
            'label_position'                                                    =>  'left'
        );
        
        $html=null;
        $attribute=shortcode_atts($default,$attr);
        
        $Validation=new Autoride_ThemeValidation();
        $FeatureCircle=new Autoride_ThemeFeatureCircle();
        
        if($Validation->isEmpty($attribute['label_text'])) return($html);
        
        if(!$FeatureCircle->isLabelPosition($attribute['label_position']))
            $attribute['label_position']=$default['label_position'];
            
        $html=
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-circle-item')).' data-label_position="'.esc_attr($attribute['label_position']).'">
                <span class="theme-component-feature-circle-item-circle">
                    <span class="theme-icon-meta-tick-3"></span>
                </span>
                <span class="theme-component-feature-circle-item-label">'.esc_html($attribute['label_text']).'</span>
            </div>
        ';

        if(!is_array($autoride_featureCircleList)) $autoride_featureCircleList=array();
        
        array_push($autoride_featureCircleList,$attribute['label_text']);
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/