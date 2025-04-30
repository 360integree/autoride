<?php

/******************************************************************************/
/******************************************************************************/

$VisualComposer=new ARCVisualComposer();
$SocialProfile=new Autoride_ThemeSocialProfile();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_social_profile_list_item',
        'name'                                                                  =>  __('Social profiles list item','autoride-core'),
        'description'                                                           =>  __('Creates single social profile.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'params'                                                                =>  array
        (  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'name',
                'heading'                                                       =>  __('Social profile','autoride-core'),
                'description'                                                   =>  __('Select social profile.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($SocialProfile->getSocialProfile()),
                'admin_label'                                                   =>  true
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'url',
                'heading'                                                       =>  __('URL address','autoride-core'),
                'description'                                                   =>  __('URL address of the social profile.','autoride-core'),
                'admin_label'                                                   =>  true
            )
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_social_profile_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Social_Profile_List_Item','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Social_Profile_List_Item
{
    /**************************************************************************/

    public static function vcHTML($attr) 
    {
        $default=array
        (
            'name'                                                              =>  '',
            'url'                                                               =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;

        $Validation=new Autoride_ThemeValidation();
        $SocialProfile=new Autoride_ThemeSocialProfile();
        
        if(($Validation->isEmpty($attribute['name'])) || ($Validation->isEmpty($attribute['url']))) return($html);
        
        if(!array_key_exists($attribute['name'],$SocialProfile->getSocialProfile())) return($html);
        
        $html=
        '
            <li>
                <a href="'.esc_url($attribute['url']).'"'.Autoride_ThemeHelper::createClassAttribute(array('theme-icon-social-'.$attribute['name'])).' title="'.esc_attr($SocialProfile->getSocialProfileName($attribute['name'])).'" target="_blank"></a>
            </li>
        ';
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/; 