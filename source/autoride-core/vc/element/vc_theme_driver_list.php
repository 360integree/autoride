<?php

/******************************************************************************/
/******************************************************************************/

$Plugin=new Autoride_ThemePlugin();

if($Plugin->isActive('CHBSPlugin'))
{
    $VisualComposer=new ARCVisualComposer();
    $DriverList=new Autoride_ThemeDriverList();

    vc_map
    ( 
        array
        (
            'base'                                                                  =>  'vc_autoride_theme_driver_list',
            'name'                                                                  =>  __('Drivers list','autoride-core'),
            'description'                                                           =>  __('Creates list of drivers.','autoride-core'), 
            'category'                                                              =>  __('Content','autoride-core'),
            'as_parent'                                                             =>  array('only'=>'vc_row'),  
            'is_container'                                                          =>  true,
            'js_view'                                                               =>  'VcColumnView',
            'content_element'                                                       =>  true,
            'params'                                                                =>  array
            (    
                array
                (
                    'type'                                                          =>  'dropdown',
                    'param_name'                                                    =>  'style',
                    'heading'                                                       =>  __('Style','autodrive-core'),
                    'description'                                                   =>  __('Select style of the driver list.','autodrive-core'),
                    'value'                                                         =>  $VisualComposer->createParamDictionary($DriverList->getStyle()),
                    'std'                                                           =>  '1'
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

    /**************************************************************************/

    add_shortcode('vc_autoride_theme_driver_list',array('WPBakeryShortCode_VC_Autoride_Theme_Driver_List','vcHTML'));

    /**************************************************************************/

    class WPBakeryShortCode_VC_Autoride_Theme_Driver_List extends WPBakeryShortCodesContainer
    {
        /**********************************************************************/

        public static function vcHTML($attr,$content) 
        {
            $DriverList=new Autoride_ThemeDriverList();

            $default=array
            (
                'style'                                                             =>  1,
                'css_class'                                                         =>  ''
            );

            $attribute=shortcode_atts($default,$attr);

            $html=null;

            $Validation=new Autoride_ThemeValidation();

            if($Validation->isEmpty($content)) return($html);

            if(!$DriverList->isStyle($attribute['style']))
                $attribute['style']=$default['style'];     

            $html= 
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-driver-list','theme-component-driver-list-style-'.$attribute['style'],$attribute['css_class'])).'>
                    '.do_shortcode($content).'
                </div>
            ';

            return($html);          
        } 

        /**********************************************************************/
    } 
}
 
/******************************************************************************/
/******************************************************************************/