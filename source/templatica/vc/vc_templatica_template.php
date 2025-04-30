<?php

/******************************************************************************/
/******************************************************************************/

$Template=new TemplaticaTemplate();
$VisualComposer=new TemplaticaVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  TemplaticaTemplate::createTemplateShortcode(0,true),
        'name'                                                                  =>  __('Template','templatica'),
        'description'                                                           =>  __('Display template from Templatica.','templatica'), 
        'category'                                                              =>  __('Content','templatica'),  
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'template_id',
                'heading'                                                       =>  __('Template','templatica'),
                'description'                                                   =>  __('Select template which has to be displayed.','templatica'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($Template->getDictionary()),
                'admin_label'                                                   =>  true
            )  
        )
    )
);         
  
/******************************************************************************/

add_shortcode(TemplaticaTemplate::createTemplateShortcode(0,true),array('WPBakeryShortCode_VC_Templatica_Template','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Templatica_Template
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        global $post;
        
        $default=array
        (
            'template_id'                                                       =>  '0'
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $attribute['template_id']=(int)$attribute['template_id'];
        
        if($attribute['template_id']<=0) return;
        
        if($post->ID===$attribute['template_id']) return;
        
        $template=get_post($attribute['template_id']);
        if(is_null($template)) return;
        
        $customCSS=get_metadata('post',$attribute['template_id'],'_wpb_shortcodes_custom_css',true);
        
        if(!empty($customCSS))
            $customCSS='<style type="text/css">'.wp_strip_all_tags($customCSS).'</style>';
        
        $html=$template->post_content.$customCSS;
        
        return(do_shortcode($html));        
    } 
    
    /**************************************************************************/
} 

/******************************************************************************/
/******************************************************************************/