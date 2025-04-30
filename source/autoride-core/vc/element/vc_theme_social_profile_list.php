<?php

/******************************************************************************/
/******************************************************************************/

$SocialProfile=new Autoride_ThemeSocialProfile();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_social_profile_list',
        'name'                                                                  =>  __('Social profiles list','autoride-core'),
        'description'                                                           =>  __('Creates list of social profiles.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),   
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_social_profile_list_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'content_element'                                                       =>  true,
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'use_data_from_theme_option',
                'heading'                                                       =>  __('Use data from Theme Options','autoride-core'),
                'description'                                                   =>  __('Enable or disable this option allows to use the data of social profiles defined in Theme Options. In this case you don\'t need to enter these details directly in component.' ,'autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enable','autoride-core')                                =>  '1',
                    __('Disable','autoride-core')                               =>  '0'
                ),
                'std'                                                           =>  '0'
            ),  
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Style','autodrive-core'),
                'description'                                                   =>  __('Select style of the button.','autodrive-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($SocialProfile->getStyle()),
                'std'                                                           =>  '1'
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

add_shortcode('vc_autoride_theme_social_profile_list',array('WPBakeryShortCode_VC_Autoride_Theme_Social_Profile_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Social_Profile_List extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'use_data_from_theme_option'                                        =>  '0',
            'style'                                                             =>  '1',
            'css_class'                                                         =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        $SocialProfile=new Autoride_ThemeSocialProfile();
        
        if(!$Validation->isNumber($attribute['use_data_from_theme_option'],0,1))
            $attribute['use_data_from_theme_option']=$default['use_data_from_theme_option'];        
        if(!$SocialProfile->isStyle($attribute['style']))
            $attribute['style']=$default['style'];    
        
        if($attribute['use_data_from_theme_option']==1)
        {
            $content=null;
            $socialProfile=array();
       
            foreach($SocialProfile->getSocialProfile() as $index=>$value)
            {
                $address=Autoride_ThemeOption::getOption('social_profile_address_'.$index);
                $order=(int)Autoride_ThemeOption::getOption('social_profile_order_'.$index);
                
                if($Validation->isEmpty($address)) continue;
                $socialProfile[$order]=array($index,$address);
            }
            
            ksort($socialProfile);
            
            foreach($socialProfile as $value)
                $content.='[vc_autoride_theme_social_profile_list_item name="'.$value[0].'" url="'.$value[1].'"]';
        }
       
        if($Validation->isEmpty($content)) return($html);
        
        $html=
        '
            <ul'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-social-profile','theme-component-social-profile-style-'.$attribute['style'],'theme-clear-fix',$attribute['css_class'])).'>
                '.do_shortcode($content).'
            </ul>
        ';
        
        return($html);
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/