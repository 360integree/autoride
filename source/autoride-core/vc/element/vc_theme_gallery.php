<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_gallery',
        'name'                                                                  =>  __('Gallery','autoride-core'),
        'description'                                                           =>  __('Creates gallery.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_gallery_item'),
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'gallery_type',
                'heading'                                                       =>  __('Gallery type','autoride-core'),
                'description'                                                   =>  __('Select gallery type.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Gallery with images in rows ','autoride-core')          =>  '1',
                    __('Gallery with images in columns','autoride-core')        =>  '2',
                    __('Images with overlay effect','autoride-core')            =>  '2'
                ),
                'std'                                                           =>  '1'
            ),            
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'effect_type',
                'heading'                                                       =>  __('Effect type','autoride-core'),
                'description'                                                   =>  __('Select effect type.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Images without additional effects','autoride-core')     =>  '0',
                    __('Images with hover effect','autoride-core')              =>  '1',
                    __('Images with overlay effect','autoride-core')            =>  '2'
                ),
                'std'                                                           =>  '0'
            ),  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'column_count',
                'heading'                                                       =>  __('Column count','autoride-core'),
                'description'                                                   =>  __('Enter number of columns. This option is available for "Gallery with images in columns" only.','autoride-core'),
            ),  
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core')
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_gallery',array('WPBakeryShortCode_VC_Autoride_Theme_Gallery','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Gallery extends WPBakeryShortCodesContainer
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autoride_galleryCounter;
        
        $default=array
        (
            'gallery_type'                                                      =>  1,
            'effect_type'                                                       =>  0,
            'column_count'                                                      =>  2,
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($content)) return($html);
 
        if(!in_array($attribute['gallery_type'],array(1,2)))
            $attribute['gallery_type']=1;
        if(!in_array($attribute['effect_type'],array(0,1,2)))
            $attribute['gallery_type']=0;
        if(!$Validation->isNumber($attribute['column_count'],1,10,false))
            $attribute['column_count']=$default['column_count'];
        
        $autoride_galleryCounter=(int)$autoride_galleryCounter+1;
        
        $style=array();
        
        $dataAttribute=array('column_count'=>$attribute['column_count']);
        
        $html= 
        '
            <div'.Autoride_ThemeHelper::createDataAttribute($dataAttribute).Autoride_ThemeHelper::createClassAttribute(array('theme-component-gallery','theme-component-gallery-type-'.(int)$attribute['gallery_type'],'theme-component-gallery-effect-type-'.(int)$attribute['effect_type'],$attribute['css_class'])).Autoride_ThemeHelper::createStyleAttribute($style).'>
                <ul>
                    '.do_shortcode($content).'
                </ul>
            </div>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/