<?php

/******************************************************************************/
/******************************************************************************/

$GoogleMap=new Autoride_ThemeGoogleMap();
$VisualComposer=new ARCVisualComposer();

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_google_map',
        'name'                                                                  =>  __('Google Maps','autoride-core'),
        'description'                                                           =>  __('Creates Google Map','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'params'                                                                =>  array
        (       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'static_url_address',
                'heading'                                                       =>  __('Static URL address of the map','autoride-core'),
                'description'                                                   =>  __('Enter static URL address. If provided, all other parameters are ignored.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'type',
                'heading'                                                       =>  __('Map type','autoride-core'),
                'description'                                                   =>  __('Select type of the map.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Type 1 (large map with box)','autoride-core')           =>  1,
                    __('Type 2 (small map)','autoride-core')                    =>  2,

                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('General','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'coordinate_lat',
                'heading'                                                       =>  __('Latitude','autoride-core'),
                'description'                                                   =>  sprintf(__('You can generate your own coordinates (latitude) <a href="%s" target="_blank">here</a>.','autoride-core'),'https://www.gps-coordinates.net/'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'coordinate_lng',
                'heading'                                                       =>  __('Longtitude','autoride-core'),
                'description'                                                   =>  sprintf(__('You can generate your own coordinates (longtitude) <a href="%s" target="_blank">here</a>.','autoride-core'),'https://www.gps-coordinates.net/'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'center_coordinate_lat',
                'heading'                                                       =>  __('Center point of the map (latitude)','autoride-core'),
                'description'                                                   =>  __('Enter latitude of center map point.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'center_coordinate_lng',
                'heading'                                                       =>  __('Center point of the map (longtitude)','autoride-core'),
                'description'                                                   =>  __('Enter longtitude of center map point.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'attach_image',
                'param_name'                                                    =>  'marker_url',
                'heading'                                                       =>  __('Marker','autoride-core'),
                'description'                                                   =>  __('Select marker icon.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'width',
                'heading'                                                       =>  __('Width','autoride-core'),
                'description'                                                   =>  __('Width of the map (in % of the parent selector).','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'height',
                'heading'                                                       =>  __('Height','autoride-core'),
                'description'                                                   =>  __('Map height.','autoride-core'),
                'group'                                                         =>  __('General','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'draggable_enable',
                'heading'                                                       =>  __('Draggable','autoride-core'),
                'description'                                                   =>  __('Enable or disable draggable on the map.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'

                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('General','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'scrollwheel_enable',
                'heading'                                                       =>  __('Scrollwheel','autoride-core'),
                'description'                                                   =>  __('Enable or disable wheel scrolling on the map.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
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
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'map_type_id',
                'heading'                                                       =>  __('Map type','autoride-core'),
                'description'                                                   =>  __('Select map type. Must be selected also in "Allowed map type" section.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeId()),
                'std'                                                           =>  'ROADMAP',
                'group'                                                         =>  __('Map type','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'checkbox',
                'param_name'                                                    =>  'map_type_id_allow',
                'heading'                                                       =>  __('Allowed map types','autoride-core'),
                'description'                                                   =>  __('Select allowed map types.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeId()),
                'group'                                                         =>  __('Map type','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'map_type_control_enable',
                'heading'                                                       =>  __('Map type control','autoride-core'),
                'description'                                                   =>  __('Enable or disable map type control.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('Map type','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'map_type_control_style',
                'heading'                                                       =>  __('Map type control style','autoride-core'),
                'description'                                                   =>  __('Select map type control style.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getMapTypeControlStyle()),
                'std'                                                           =>  'DEFAULT',
                'group'                                                         =>  __('Map type','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'map_type_control_position',
                'heading'                                                       =>  __('Map type control position','autoride-core'),
                'description'                                                   =>  __('Select map type control position.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                'std'                                                           =>  'TOP_CENTER',
                'group'                                                         =>  __('Map type','autoride-core')
            ),        
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'zoom_control_enable',
                'heading'                                                       =>  __('Zoom control','autoride-core'),
                'description'                                                   =>  __('Enable or disable zoom control.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0',
                ),
                'std'                                                           =>  '1',
                'group'                                                         =>  __('Zoom','autoride-core')
            ),                    
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'zoom_level',
                'heading'                                                       =>  __('Zoom level','autoride-core'),
                'description'                                                   =>  __('Enter level of zoom. Allowed is integer value from range 1 to 21.','autoride-core'),
                'group'                                                         =>  __('Zoom','autoride-core')
            ),                    
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'zoom_control_style',
                'heading'                                                       =>  __('Zoom control style','autoride-core'),
                'description'                                                   =>  __('Select zoom control style.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getZoomControlStyle()),
                'std'                                                           =>  'SMALL',
                'group'                                                         =>  __('Zoom','autoride-core')
            ),                   
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'zoom_position',
                'heading'                                                       =>  __('Zoom position','autoride-core'),
                'description'                                                   =>  __('Select zoom position.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                'std'                                                           =>  'RIGHT_TOP',
                'group'                                                         =>  __('Zoom','autoride-core')
            ),                      
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'pan_control_enable',
                'heading'                                                       =>  __('Pan control','autoride-core'),
                'description'                                                   =>  __('Enable or disable pan control.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('Pan','autoride-core')
            ),                         
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'pan_control_position',
                'heading'                                                       =>  __('Pan control position','autoride-core'),
                'description'                                                   =>  __('Select pan control position.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition()),
                'std'                                                           =>  'TOP_CENTER',
                'group'                                                         =>  __('Pan','autoride-core')
            ),                      
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'scale_control_enable',
                'heading'                                                       =>  __('Scale control','autoride-core'),
                'description'                                                   =>  __('Enable or disable scale control.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('Scale','autoride-core')
            ),                         
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'scale_control_position',
                'heading'                                                       =>  __('Scale control position','autoride-core'),
                'description'                                                   =>  __('Select scale control position.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition(),'TOP_CENTER'),
                'std'                                                           =>  'TOP_CENTER',
                'group'                                                         =>  __('Scale','autoride-core')
            ),                     
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'street_view_enable',
                'heading'                                                       =>  __('Street view','autoride-core'),
                'description'                                                   =>  __('Enable or disable street view.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('Street view','autoride-core')
            ),                         
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'street_view_position',
                'heading'                                                       =>  __('Street view position','autoride-core'),
                'description'                                                   =>  __('Select street view position.','autoride-core'),
                'value'                                                         =>  $VisualComposer->createParamDictionary($GoogleMap->getPosition(),'TOP_CENTER'),
                'std'                                                           =>  'TOP_CENTER',
                'group'                                                         =>  __('Street view','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textarea_raw_html',
                'param_name'                                                    =>  'style',
                'heading'                                                       =>  __('Styles','autoride-core'),
                'description'                                                   =>  sprintf(__('JSON value contains Google Maps styles. You can generate it <a href="%s" target="_blank">here</a>.','autoride-core'),'https://mapstyle.withgoogle.com/'),
                'group'                                                         =>  __('Styles','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'dropdown',
                'param_name'                                                    =>  'box_enable',
                'heading'                                                       =>  __('Box','autoride-core'),
                'description'                                                   =>  __('Enable or disable box.','autoride-core'),
                'value'                                                         =>  array
                (
                    __('Enabled','autoride-core')                               =>  '1',
                    __('Disabled','autoride-core')                              =>  '0'
                ),
                'std'                                                           =>  '0',
                'group'                                                         =>  __('Box','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'textarea',
                'param_name'                                                    =>  'box_header',
                'heading'                                                       =>  __('Header','autoride-core'),
                'description'                                                   =>  __('Enter header','autoride-core'),
                'group'                                                         =>  __('Box','autoride-core')
            ),
            array
            (
                'type'                                                          =>  'textarea',
                'param_name'                                                    =>  'box_subheader',
                'heading'                                                       =>  __('Subheader','autoride-core'),
                'description'                                                   =>  __('Enter subheader','autoride-core'),
                'group'                                                         =>  __('Box','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'box_button_label',
                'heading'                                                       =>  __('Button label','autoride-core'),
                'description'                                                   =>  __('Enter label','autoride-core'),
                'group'                                                         =>  __('Box','autoride-core')
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'box_button_url_address',
                'heading'                                                       =>  __('Button URL address','autoride-core'),
                'description'                                                   =>  __('Enter URL address','autoride-core'),
                'group'                                                         =>  __('Box','autoride-core')
            ), 
        )
    )
);         

/******************************************************************************/

add_shortcode('vc_autoride_theme_google_map',array('WPBakeryShortCode_VC_Autoride_Theme_Google_Map','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Google_Map 
{
    /**************************************************************************/
     
    public static function vcHTML($attr) 
    {
        $GoogleMap=new Autoride_ThemeGoogleMap();
        
        $default=array
        (
            'type'                                                              =>  '1',
            'static_url_address'                                                =>  '',
            'coordinate_lat'                                                    =>  '',
            'coordinate_lng'                                                    =>  '',
            'center_coordinate_lat'                                             =>  '',
            'center_coordinate_lng'                                             =>  '',
            'marker_url'                                                        =>  '',
            'width'                                                             =>  '100%',
            'height'                                                            =>  '100%',
            'draggable_enable'                                                  =>  '0',
            'scrollwheel_enable'                                                =>  '0',
            'css_class'                                                         =>  '',
            'map_type_id'                                                       =>  'ROADMAP',
            'map_type_id_allow'                                                 =>  'ROADMAP,SATELLITE,HYBRID,TERRAIN',
            'map_type_control_enable'                                           =>  '0',
            'map_type_control_style'                                            =>  'DEFAULT',
            'map_type_control_position'                                         =>  'TOP_CENTER',
            'zoom_control_enable'                                               =>  '1',
            'zoom_level'                                                        =>  '15',
            'zoom_control_style'                                                =>  'SMALL',
            'zoom_position'                                                     =>  'RIGHT_TOP',
            'pan_control_enable'                                                =>  '0',
            'pan_control_position'                                              =>  'TOP_CENTER',
            'scale_control_enable'                                              =>  '0',
            'scale_control_position'                                            =>  'TOP_CENTER',
            'street_view_enable'                                                =>  '0',
            'street_view_position'                                              =>  'TOP_CENTER',
            'style'                                                             =>  '',
            'box_enable'                                                        =>  '0',
            'box_header'                                                        =>  '',
            'box_subheader'                                                     =>  '',
            'box_button_label'                                                  =>  '',
            'box_button_url_address'                                            =>  '',
        );
        
        $attribute=shortcode_atts($default,$attr);
              
        $Validation=new Autoride_ThemeValidation();
        
        $html=null;
        $staticMap=false;
        $dataAttribute=array();
        
        if($Validation->isNotEmpty($attribute['static_url_address']))
        {
            $staticMap=true;
        }
        else
        {            
            if($Validation->isEmpty($attribute['coordinate_lat'])) return($html);
            if($Validation->isEmpty($attribute['coordinate_lng'])) return($html);
            
            if(!in_array($attribute['type'],array(1,2)))
                $attribute['type']=$default['type']; 
            if(!$Validation->isNumber($attribute['draggable_enable'],0,1)) 
                $attribute['draggable_enable']=$default['draggable_enable'];     
            if(!$Validation->isNumber($attribute['scrollwheel_enable'],0,1)) 
                $attribute['scrollwheel_enable']=$default['scrollwheel_enable']; 

            if(!array_key_exists($attribute['map_type_id'],$GoogleMap->getMapTypeId()))
                $attribute['map_type_id']=$default['map_type_id'];
            $temp=explode(',',$attribute['map_type_id_allow']);
            foreach($temp as$value)
            {
                if($Validation->isNotEmpty($value))
                {
                    if(!array_key_exists($value,$GoogleMap->getMapTypeId()))
                    {
                        $attribute['map_type_id_allow']=$default['map_type_id_allow'];
                        break;
                    }
                }
            }
            if(!array_key_exists($attribute['map_type_control_style'],$GoogleMap->getMapTypeControlStyle()))
                $attribute['map_type_control_style']=$default['map_type_control_style'];
            if(!array_key_exists($attribute['map_type_control_position'],$GoogleMap->getPosition()))
                $attribute['map_type_control_position']=$default['map_type_control_position'];

            if(!$Validation->isNumber($attribute['zoom_control_enable'],0,1)) 
                $attribute['zoom_control_enable']=$default['zoom_control_enable']; 
            if(!$Validation->isNumber($attribute['zoom_level'],1,21)) 
                $attribute['zoom_level']=$default['zoom_level'];        
            if(!array_key_exists($attribute['zoom_control_style'],$GoogleMap->getZoomControlStyle()))
                $attribute['zoom_control_style']=$default['zoom_control_style'];       
            if(!array_key_exists($attribute['zoom_position'],$GoogleMap->getPosition()))
                $attribute['zoom_position']=$default['zoom_position'];        

            if(!$Validation->isNumber($attribute['pan_control_enable'],0,1)) 
                $attribute['pan_control_enable']=$default['pan_control_enable'];         
            if(!array_key_exists($attribute['pan_control_position'],$GoogleMap->getPosition()))
                $attribute['pan_control_position']=$default['pan_control_position'];     

            if(!$Validation->isNumber($attribute['scale_control_enable'],0,1)) 
                $attribute['scale_control_enable']=$default['scale_control_enable'];         
            if(!array_key_exists($attribute['scale_control_position'],$GoogleMap->getPosition()))
                $attribute['scale_control_position']=$default['scale_control_position'];

            if(!$Validation->isNumber($attribute['street_view_enable'],0,1)) 
                $attribute['street_view_enable']=$default['street_view_enable'];         
            if(!array_key_exists($attribute['street_view_position'],$GoogleMap->getPosition()))
                $attribute['street_view_position']=$default['street_view_position'];

            if((int)$attribute['marker_url'])
            {
                $image=wp_get_attachment_image_src($attribute['marker_url'],'large');
                $attribute['marker_url']=$image===false ? null : $image[0];
            }

            $dataAttribute=$attribute;

            unset($dataAttribute['css_class']);
            
            $dataAttribute['style']=rawurldecode(base64_decode($dataAttribute['style']));
        }
        
        $id=Autoride_ThemeHelper::createId('theme_google_map');

        if($staticMap)
        {
            $html=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-google-map',$attribute['css_class'])).Autoride_ThemeHelper::createDataAttribute($dataAttribute).'>
                    <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-google-map-map')).'>
                        <img src="'.esc_url($attribute['static_url_address']).'" alt=""/>
                    </div>
                </div>
            ';            
        }
        else
        {
            $htmlBox=null;
            
            if((int)$attribute['type']===1)
            {
                if((int)$attribute['box_enable']===1)
                {
                    if($Validation->isNotEmpty($attribute['box_header']))
                        $htmlBox.='<h3>'.nl2br($attribute['box_header']).'</h3>';

                    if($Validation->isNotEmpty($attribute['box_subheader']))
                        $htmlBox.='<p>'.nl2br($attribute['box_subheader']).'</p>';                

                    if(($Validation->isNotEmpty($attribute['box_button_label'])) && ($Validation->isNotEmpty($attribute['box_button_url_address'])))
                        $htmlBox.=do_shortcode('[vc_autoride_theme_button label="'.esc_html($attribute['box_button_label']).'" url="'.esc_url($attribute['box_button_url_address']).'" url_target="_blank" style="4" align="right"]');

                    if($Validation->isNotEmpty($htmlBox))
                        $htmlBox='<div class="theme-component-google-map-map-box">'.$htmlBox.'</div>';
                }
            }
            else 
            {
                $htmlBox=
                '
                    <div class="theme-component-google-map-map-box">
                        <a href="'.esc_html($attribute['box_button_url_address']).'" target="blank"><span class="theme-icon-meta-search"></span>&nbsp;'.esc_html($attribute['box_button_label']).'</a>
                    </div>
                ';
            }
            
            $html=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-google-map','theme-component-google-map-type-'.(int)$attribute['type'],$attribute['css_class'])).Autoride_ThemeHelper::createDataAttribute($dataAttribute).'>
                    <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-google-map-map')).'>
                        <div id="'.esc_attr($id).'"></div>
                        '.$htmlBox.'
                    </div>
                    '.$html.'
                    <script type="text/javascript">
                        if(typeof(googleMapStyle)==\'undefined\') var googleMapStyle=[];
                        googleMapStyle[\''.esc_attr($id).'\']='.($Validation->isEmpty($attribute['style']) ? '"";' : rawurldecode(base64_decode($attribute['style']))).';
                    </script>
                </div>
            ';
        }
        
        return($html);        
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/