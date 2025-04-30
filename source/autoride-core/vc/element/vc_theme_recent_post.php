<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_recent_post',
        'name'                                                                  =>  __('Recent posts','autodrive-core'),
        'description'                                                           =>  __('Creates list of recent posts.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),  
        'params'                                                                =>  array
        (                  
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

add_shortcode('vc_autoride_theme_recent_post',array('WPBakeryShortCode_VC_Autoride_Theme_Recent_Post','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Recent_Post
{
    /**************************************************************************/

    public static function vcHTML($attr) 
    {
        $default=array
        (
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Post=new Autoride_ThemePost();
        
        $result=$Post->getPostRecent(array('post_count'=>2));
        
        if(!count($result->posts)) return($html);
        
        global $post;
        $bPost=$post;
        
        while($result->have_posts())
		{
            $result->the_post();     
            
            $style=array();
            if(($style['background-image']='url(\''.get_the_post_thumbnail_url($post,'post-full').'\')')===false) continue;

            $html.=
            '
                <li'.Autoride_ThemeHelper::createStyleAttribute($style).'>
                    <a href="'.get_the_permalink().'">
                        <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-recent-post-overlay')).'></span>
                        <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-recent-post-header')).'>
                            <span>'.get_the_title().'</span>
                        </span>
                        <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-recent-post-date')).'>
                            <span>
                                <span'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-meta-clock')).'></span>
                                '.get_the_date().'
                            </span>
                        </span>
                    </a>
                </li>
            ';
        }
        
        $post=$bPost;
        
        $html='<ul'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-recent-post',$attribute['css_class'])).'>'.$html.'</ul>';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/