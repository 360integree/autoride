<?php

/******************************************************************************/
/******************************************************************************/

$Feature=new Autoride_ThemeFeature();
$VisualComposer=new ARCVisualComposer();
        
vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_image_list_item',
        'name'                                                                  =>  __('Features image list item','autoride-core'),
        'description'                                                           =>  __('Creates single feature item with image.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'image_id',
                'heading'                                                       =>  __('Image','autoride-core'),
                'description'                                                   =>  __('Select an image.','autoride-core'),
                'admin_label'                                                   =>  true
            ),  
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
                'param_name'                                                    =>  'content',
                'heading'                                                       =>  __('Content','autoride-core'),
                'description'                                                   =>  __('Content.','autoride-core'),
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

add_shortcode('vc_autoride_theme_feature_image_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Image_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Image_List_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'image_id'                                                          =>  '',
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
        
        if(!wp_attachment_is_image($attribute['image_id'])) return($html);
            
        /***/
        
        if($Validation->isNotEmpty($attribute['header']))
        {
            $header=esc_html($attribute['header']);
            
            if($Validation->isNotEmpty($attribute['url_address']))
                $header='<a href="'.esc_url($attribute['url_address']).'">'.$header.'</a>';
            
            $html.='<h4>'.$header.'</h4>';
        }
        
        if($Validation->isNotEmpty($content))
            $html.='<p>'.esc_html($content).'</p>';        
        
        if($Validation->isNotEmpty($html))
            $html='<div class="theme-component-feature-image-list-item-content">'.$html.'</div>';
        
        /***/
        
        $data=wp_get_attachment_image_src($attribute['image_id'],'full');
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-image-list-item',$attribute['css_class'])).'>
                <div class="theme-component-feature-image-list-item-image">
                    <img src="'.esc_url($data[0]).'" alt="">
                    <span><span class="theme-icon-feature-'.esc_html($attribute['icon']).'"></span></span>
                    <div></div>
                </div>
                '.$html.'
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/