<?php

/******************************************************************************/
/******************************************************************************/

$Gallery=new Autoride_ThemeGallery();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_gallery_item',
        'name'                                                                  =>  __('Gallery item','autoride-core'),
        'description'                                                           =>  __('Creates item (image) of gallery.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (                       
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'image_thumbnail_id',
                'heading'                                                       =>  __('Thumbnail','autoride-core'),
                'description'                                                   =>  __('Select a thumbnail. Recomended sizes are 275x275px and 590x275px.','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'image_enlarge_id',
                'heading'                                                       =>  __('Enlarged image','autoride-core'),
                'description'                                                   =>  __('Select an enlarged image. This image will be shown once user clicks on thumbnail (if such action has been choosen).','autoride-core'),
                'admin_label'                                                   =>  true
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'item_width',
                'heading'                                                       =>  __('Item width','autoride-core'),
                'description'                                                   =>  __('Select width of item in percentage value of parent section. This option is available for "Gallery with images in rows" only.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Gallery->getItemWidth()),
                'std'                                                           =>  '25'
            ),            
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'on_click_action',
                'heading'                                                       =>  __('On click action','autoride-core'),
                'description'                                                   =>  __('Determine what action should be executed when user clicks on image.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Open large image','autoride-core')                      =>  '1',
                    __('Open new page','autoride-core')                         =>  '2'
                ),
                'std'                                                           =>  '1'
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'on_click_action_url_address',
                'heading'                                                       =>  __('URL address','autoride-core'),
                'description'                                                   =>  __('Enter URL address which should be opened for option "Open new page".','autoride-core'),
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'image_caption',
                'heading'                                                       =>  __('Image caption','autoride-core'),
                'description'                                                   =>  __('Caption of the image.','autoride-core'),
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

add_shortcode('vc_autoride_theme_gallery_item',array('WPBakeryShortCode_VC_Autoride_Theme_Gallery_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Gallery_Item
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $Gallery=new Autoride_ThemeGallery();
        
        global $autoride_galleryCounter;
        
        $default=array
        (
            'image_thumbnail_id'                                                =>  '0',
            'image_enlarge_id'                                                  =>  '0',
            'item_width'                                                       =>  '25',
            'on_click_action'                                                   =>  '1',
            'on_click_action_url_address'                                       =>  '',
            'image_caption'                                                     =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
       
        $Validation=new Autoride_ThemeValidation();
        
        if(!in_array($attribute['on_click_action'],array(1,2))) return($html);
        
        if(!wp_attachment_is_image($attribute['image_thumbnail_id'])) return($html);
        
        if(!$Gallery->isItemWidth($attribute['item_width'])) return($html);
        
        if((int)$attribute['on_click_action']===1)
        {
            if(!wp_attachment_is_image($attribute['image_enlarge_id'])) return($html);
        }
        else if((int)$attribute['on_click_action']===2)
        {
            if($Validation->isEmpty($attribute['on_click_action_url_address'])) return($html);
        }
        
        /***/
        
        if($Validation->isNotEmpty($attribute['image_caption']))
            $html='<span><span></span><span>'.esc_html($attribute['image_caption']).'</span></span>';

        $imageThumbnail=wp_get_attachment_image_src($attribute['image_thumbnail_id'],'full');
        
        if((int)$attribute['on_click_action']===1)
        {
            $imageEnlarge=wp_get_attachment_image_src($attribute['image_enlarge_id'],'full');
        }
        
        /***/
        
        $class=array(array(),array());
        $class[0]=array('theme-component-gallery-item-width-'.$attribute['item_width'],$attribute['css_class']);
        
        if((int)$attribute['on_click_action']===1)
            array_push($class[1],'theme-image-fancybox');
        
        /***/
        
        $html=
        '
            <li'.Autoride_ThemeHelper::createClassAttribute($class[0]).'>
                <a'.Autoride_ThemeHelper::createClassAttribute($class[1]).' data-fancybox-group="autoride-gallery-'.(int)$autoride_galleryCounter.'" href="'.($attribute['on_click_action']==2 ? esc_url($attribute['on_click_action_url_address']) : esc_url($imageEnlarge[0])).'">
                    <img src="'.esc_url($imageThumbnail[0]).'" alt=""/>
                    '.$html.'
                    <i></i>
                </a>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/