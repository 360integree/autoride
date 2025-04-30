<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();
        
vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_carousel_item',
        'name'                                                                  =>  __('Features carousel item','autoride-core'),
        'description'                                                           =>  __('Creates single feature of carousel.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
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
                'param_name'                                                    =>  'header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Header.','autoride-core'),
            ),                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'url_address',
                'heading'                                                       =>  __('URL address','autodrive-core'),
                'description'                                                   =>  __('URL address.','autodrive-core'),
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

add_shortcode('vc_autoride_theme_feature_carousel_item',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Carousel_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Carousel_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'icon'                                                              =>  '',
            'header'                                                            =>  '',
            'url_address'                                                       =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Feature=new Autoride_ThemeFeature();
        $Validation=new Autoride_ThemeValidation();
        
        if(!$Feature->isFeature($attribute['icon'])) return($html);
        
        /***/
        
        if($Validation->isNotEmpty($attribute['header']))
        {
            $header=esc_html($attribute['header']);
            
            if($Validation->isNotEmpty($attribute['url_address']))
                $header='<a href="'.esc_url($attribute['url_address']).'">'.$header.'</a>';
            
            $html.='<h5>'.$header.'</h5>';
        }
        
        /***/
        
        $html= 
        '
            <li'.Autoride_ThemeHelper::createClassAttribute(array($attribute['css_class'])).'>
                <div>
                    <span><span class="theme-icon-feature-'.esc_html($attribute['icon']).'"></span></span>
                    '.$html.'
                </div>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/