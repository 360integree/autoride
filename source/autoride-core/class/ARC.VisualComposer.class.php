<?php

/******************************************************************************/
/******************************************************************************/

class ARCVisualComposer
{
	/**************************************************************************/
	
	function __construct()
	{		
        $this->elementToRemove=array('vc_icon','vc_message','vc_facebook','vc_tweetmeme','vc_googleplus','vc_pinterest','vc_toggle','vc_gallery','vc_tta_tabs','vc_images_carousel','vc_tta_tour','vc_tta_accordion','vc_tta_pageable','vc_btn','vc_cta','vc_posts_slider','vc_gmaps','vc_flickr','vc_progress_bar','vc_pie','vc_round_chart','vc_line_chart','vc_basic_grid','vc_media_grid','vc_masonry_grid','vc_masonry_media_grid','vc_text_separator');
	}
    
    /**************************************************************************/
    
    function init()
    {        
        add_action('vc_after_init',array($this,'afterInitAction'));
        add_action('vc_before_init',array($this,'beforeInitAction'));
        
        add_action('wp_enqueue_scripts',array($this,'removeScript'));
    }
    
    /**************************************************************************/
    
    function afterInitAction()
    {
        if(!function_exists('vc_remove_element')) return;
        
        foreach($this->elementToRemove as $value)
            vc_remove_element($value);
    }
    
    /**************************************************************************/
    
    function beforeInitAction()
    {
        echo '8888888';
        
        
        
        vc_set_as_theme();
        
        vc_set_default_editor_post_types(array('post','page'));
        
        $file=Autoride_ThemeFile::scanDir(PLUGIN_ARC_VC_ELEMENT_PATH);
        if($file===false) return(false);
        
        foreach($file as $value)
            require_once(PLUGIN_ARC_VC_ELEMENT_PATH.$value);
    }
    
    /**************************************************************************/
    
    function createParamDictionary($dictionary,$labelIndex=0)
    {        
        foreach($dictionary as $index=>$value)
        {
            if(is_array($value))
                $dictionary[$index]=$value[$labelIndex];
        }
        
        return(array_combine(array_values($dictionary),array_keys($dictionary)));
    }
    
    /**************************************************************************/
    
    function removeScript()
    {
        
    }
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/