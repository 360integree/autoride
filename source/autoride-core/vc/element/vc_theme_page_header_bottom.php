<?php

/******************************************************************************/
/******************************************************************************/

$Align=new Autoride_ThemeAlign();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_page_header_bottom',
        'name'                                                                  =>  __('Page bottom header','autoride-core'),
        'description'                                                           =>  __('Creates page bottom header.','autoride-core'), 
        'category'                                                              => __('Content','autoride-core'),   
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'type',
                'heading'                                                       =>  __('type','autoride-core'),
                'description'                                                   =>  __('Select type of the header.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Text','autoride-core')                                  =>  '1',
                    __('Image','autoride-core')                                 =>  '2'
                ),
                'std'                                                           =>  '2'
            ),   
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'text_color',
                'heading'                                                       =>  __('Text color','autoride-core'),
                'description'                                                   =>  __('Color of text header and subheader.','autoride-core'),
                'admin_label'                                                   =>  true
            ),                     
            array
            (
                'type'                                                          =>  'colorpicker',
                'param_name'                                                    =>  'background_color',
                'heading'                                                       =>  __('Background color','autoride-core'),
                'description'                                                   =>  __('Background color of the entire header area.','autoride-core'),
                'admin_label'                                                   =>  true
            ),                         
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'background_image',
                'heading'                                                       =>  __('Background image','autoride-core'),
                'description'                                                   =>  __('Background image of the entire header area.','autoride-core'),
                'admin_label'                                                   =>  true
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

add_shortcode('vc_autoride_theme_page_header_bottom',array('WPBakeryShortCode_VC_Autoride_Theme_Page_Header_Bottom','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Page_Header_Bottom
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        global $post;
        
        $default=array
        (
            'type'                                                              =>  '2',
            'text_color'                                                        =>  '',
            'background_color'                                                  =>  '',
            'background_image'                                                  =>  '',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        $class=array();
        $style=array(array(),array());
        
        $Validation=new Autoride_ThemeValidation();
        
        array_push($class,'theme-page-header-title','theme-page-header-title-type-'.($attribute['type']==1 ? 'text' : 'image'),$attribute['css_class']);
        
        if($Validation->isColor($attribute['text_color']))
            $style[1]['color']=$attribute['text_color'];        
        
		global $autoride_ParentPost;
		
        $title=is_object($autoride_ParentPost) ? $autoride_ParentPost->post->post_title : '';
		
		if(is_home()) $title=__('Latest posts','autoride-core');
		
        if((int)$attribute['type']===2)
        {
            if(function_exists('bcn_display'))
                $html='<div'.Autoride_ThemeHelper::createStyleAttribute($style[1]).'>'.bcn_display(true).'</div>';
            
            $html='<div><h1'.Autoride_ThemeHelper::createStyleAttribute($style[1]).'>'.$title.'</h1>'.$html.'</div><div></div>';
            
            $backgroundImage=wp_get_attachment_url($attribute['background_image']);
            if($Validation->isNotEmpty($backgroundImage))
                $style[0]['background-image']='url(\''.$backgroundImage.'\')';
        }
        else
        {
            $html.='<h1'.Autoride_ThemeHelper::createStyleAttribute($style[1]).'>'.$title.'</h1>';
            
            if(function_exists('bcn_display'))
                $html.='<div'.Autoride_ThemeHelper::createStyleAttribute($style[1]).'>'.bcn_display(true).'</div>';
            
            if($Validation->isColor($attribute['background_color']))
                $style[0]['background-color']=$attribute['background_color'];            
        }
                
        $html='<div'.Autoride_ThemeHelper::createClassAttribute($class).Autoride_ThemeHelper::createStyleAttribute($style[0]).'>'.$html.'</div>';      
     
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/