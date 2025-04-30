<?php

/******************************************************************************/
/******************************************************************************/

$Plugin=new Autoride_ThemePlugin();

if($Plugin->isActive('CHBSPlugin'))
{
    $Driver=new CHBSDriver();
    $VisualComposer=new ARCVisualComposer();

    $dictionaryDriver=array();
    $dictionary=$Driver->getDictionary();

    foreach($dictionary as $value)
        $dictionaryDriver[$value['post']->ID]=array($value['meta']['first_name'].' '.$value['meta']['second_name']);

    vc_map
    ( 
        array
        (
            'base'                                                                  =>  'vc_autoride_theme_driver_list_item',
            'name'                                                                  =>  __('Drivers list item','autoride-core'),
            'description'                                                           =>  __('Creates single item of drivers list.','autoride-core'), 
            'category'                                                              =>  __('Content','autoride-core'),   
            'params'                                                                =>  array
            (  
                array
                (
                    'type'                                                          =>  'dropdown',
                    'param_name'                                                    =>  'driver_id',
                    'heading'                                                       =>  __('Driver','autodrive-core'),
                    'description'                                                   =>  __('Select driver.','autodrive-core'),
                    'value'                                                         =>  $VisualComposer->createParamDictionary($dictionaryDriver),
                    'group'                                                         =>  __('General','autoride-core')
                ), 
                array
                (
                    'type'                                                          =>  'textfield',
                    'param_name'                                                    =>  'url_address_on_click',
                    'heading'                                                       =>  __('URL address','autodrive-core'),
                    'description'                                                   =>  __('URL address available for on click action.','autodrive-core'),
                    'group'                                                         =>  __('General','autoride-core')
                ),   
                array
                (
                    'type'                                                          =>  'textfield',
                    'param_name'                                                    =>  'css_class',
                    'heading'                                                       =>  __('CSS class','autoride-core'),
                    'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autoride-core'),
                    'group'                                                         =>  __('General','autoride-core')
                ), 
            )
        )
    );

    /**************************************************************************/

    add_shortcode('vc_autoride_theme_driver_list_item',array('WPBakeryShortCode_VC_Autoride_Theme_Driver_List_Item','vcHTML'));

    /**************************************************************************/

    class WPBakeryShortCode_VC_Autoride_Theme_Driver_List_Item 
    {
        /**********************************************************************/

        public static function vcHTML($attr) 
        {
            $default=array
            (
                'driver_id'                                                         =>  '0',
                'url_address_on_click'                                              =>  '',
                'css_class'                                                         =>  '',
            );

            $attribute=shortcode_atts($default,$attr);

            $html=null;

            $Driver=new CHBSDriver();
            $Validation=new Autoride_ThemeValidation();

            $dictionary=$Driver->getDictionary(array('driver_id'=>$attribute['driver_id']));
            if(!count($dictionary)) return($html);

            $driverMeta=$dictionary[$attribute['driver_id']]['meta'];

            /***/

            if(!has_post_thumbnail($attribute['driver_id'])) return($html);

            $imageHtml='<img src="'.get_the_post_thumbnail_url($attribute['driver_id']).'" alt="" />';

            if($Validation->isNotEmpty($attribute['url_address_on_click']))
                $imageHtml='<a href="'.esc_url($attribute['url_address_on_click']).'">'.$imageHtml.'</a>';

            /***/

            $driverNameHtml=esc_html($driverMeta['first_name'].' '.$driverMeta['second_name']);
            if($Validation->isNotEmpty($attribute['url_address_on_click']))
                $driverNameHtml='<a href="'.esc_url($attribute['url_address_on_click']).'">'.$driverNameHtml.'</a>';

            $driverNameHtml='<h4>'.$driverNameHtml.'</h4>';

            /***/

            $driverPositionHtml=esc_html($driverMeta['position']);
            if($Validation->isNotEmpty($driverPositionHtml))
                $driverPositionHtml='<div class="theme-component-driver-list-item-position">'.$driverPositionHtml.'</div>';        

            /***/

            $excerptHtml=CHBSHelper::getTheExcerpt($attribute['driver_id']);
            if($Validation->isNotEmpty($excerptHtml))
                $excerptHtml='<div class="theme-component-driver-list-item-excerpt">'.$excerptHtml.'</div>';

            /***/

            $socialProfileHtml=null;
            if(is_array($driverMeta['social_profile']))
            {
                if(count($driverMeta['social_profile']))
                {
                    foreach($driverMeta['social_profile'] as $index=>$value)
                        $socialProfileHtml.='[vc_autoride_theme_social_profile_list_item name="'.$value['profile'].'" url="'.$value['url_address'].'"]';
                    $socialProfileHtml='<div class="theme-component-driver-list-item-social-profile">'.do_shortcode('[vc_autoride_theme_social_profile_list style="2"]'.$socialProfileHtml.'[/vc_autoride_theme_social_profile_list]').'</div>';
                }
            }

            /***/

            $html=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-driver-list-item',$attribute['css_class'])).'>
                    <div class="theme-component-driver-list-item-image">'.$imageHtml.'</div>
                    '.$driverNameHtml.'
                    '.$driverPositionHtml.'
                    '.$excerptHtml.'
                    '.$socialProfileHtml.'
                </div>
            ';

            /***/

            return($html);        
        } 

        /**********************************************************************/
    } 

}
 
/******************************************************************************/
/******************************************************************************/