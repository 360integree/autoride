<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_feature_circle',
        'name'                                                                  =>  __('Features circle','autodrive-core'),
        'description'                                                           =>  __('Creates circle with features.','autodrive-core'), 
        'category'                                                              =>  __('Content','autodrive-core'),   
        'as_parent'                                                             =>  array('only'=>'vc_autoride_theme_feature_circle_item'), 
        'is_container'                                                          =>  true,
        'js_view'                                                               =>  'VcColumnView',
        'params'                                                                =>  array
        (   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'height',
                'heading'                                                       =>  __('Height','autodrive-core'),
                'description'                                                   =>  __('Enter height value (in pixels) of each element.','autodrive-core')
            ),            
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_inner_header',
                'heading'                                                       =>  __('Inner circle header','autodrive-core'),
                'description'                                                   =>  __('Enter header of inner circle.','autodrive-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_inner_subheader',
                'heading'                                                       =>  __('Inner circle subheader','autodrive-core'),
                'description'                                                   =>  __('Enter subheader of inner circle.','autodrive-core')
            ),            
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_radius',
                'heading'                                                       =>  __('Circle radius','autodrive-core'),
                'description'                                                   =>  __('Enter value (in pixels) of circle radius. An integer value from range 0 to 999.','autodrive-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_count',
                'heading'                                                       =>  __('Circle count','autodrive-core'),
                'description'                                                   =>  __('Number of circles. An integer value from range 2 to 99.','autodrive-core')
            ),
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_space_1',
                'heading'                                                       =>  __('Circle space I','autodrive-core'),
                'description'                                                   =>  __('Space (in pixels) between first and second circle. An integer value from range 0 to 999.','autodrive-core')
            ), 
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'circle_space_2',
                'heading'                                                       =>  __('Circle space II','autodrive-core'),
                'description'                                                   =>  __('Space (in pixels) between others circles. An integer value from range 0 to 999.','autodrive-core')
            ),   
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'item_first_radius',
                'heading'                                                       =>  __('Start radius','autodrive-core'),
                'description'                                                   =>  __('Radius of first item on circle. An integer value from range 0 to 360.','autodrive-core')
            ),                       
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'css_class',
                'heading'                                                       =>  __('CSS class','autoride-core'),
                'description'                                                   =>  __('Additional CSS classes which are applied to top level markup of this shortcode.','autodrive-core'),
            ),                    
        )
    )
); 

/******************************************************************************/

add_shortcode('vc_autoride_theme_feature_circle',array('WPBakeryShortCode_VC_Autoride_Theme_Feature_Circle','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Feature_Circle extends WPBakeryShortCodesContainer 
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        global $autoride_featureCircleList; 
        
        $default=array
        (
            'height'                                                            =>  500,
            'circle_inner_header'                                               =>  '',
            'circle_inner_subheader'                                            =>  '',
            'circle_radius'                                                     =>  170,
            'circle_count'                                                      =>  3,
            'circle_space_1'                                                    =>  80,
            'circle_space_2'                                                    =>  90,
            'item_first_radius'                                                 =>  26,
            'css_class'                                                         =>  ''
        );
        
        $html=null;
        $attribute=shortcode_atts($default,$attr);
        
        $Validation=new Autoride_ThemeValidation();
       
        if(!$Validation->isNumber($attribute['height'],0,9999))
            $attribute['height']=$default['height'];
        if(!$Validation->isNumber($attribute['circle_radius'],0,999))
            $attribute['circle_radius']=$default['circle_radius'];
        if(!$Validation->isNumber($attribute['circle_count'],2,99))
            $attribute['circle_count']=$default['circle_count'];
        if(!$Validation->isNumber($attribute['circle_space_1'],0,999))
            $attribute['circle_space_1']=$default['circle_space_1'];        
        if(!$Validation->isNumber($attribute['circle_space_2'],0,999))
            $attribute['circle_space_2']=$default['circle_space_2'];         
        if(!$Validation->isNumber($attribute['item_first_radius'],0,360))
            $attribute['item_first_radius']=$default['item_first_radius'];   
        
        for($i=0;$i<$attribute['circle_count'];$i++)
        {
            $dimension=($attribute['circle_radius']*2)+($i*$attribute['circle_space_2'])+($i==0 ? 0 : $attribute['circle_space_1']);
            
            $style=array
            (
                'width'                                                         =>  $dimension.'px',
                'height'                                                        =>  $dimension.'px',
                'margin-left'                                                   =>  -1*($dimension/2).'px',
                'margin-top'                                                    =>  -1*($dimension/2).'px'
            );
                         
            $html.=
            '
                <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-circle-circle')).Autoride_ThemeHelper::createStyleAttribute($style).'>
                    '.($i==0 ? '<span>'.$attribute['circle_inner_header'].'</span><span>'.$attribute['circle_inner_subheader'].'</span>' : ($i==1 ? do_shortcode($content) : null)).'
                </div>
            ';
        }

        $style=array();
        $style['height']=(int)$attribute['height'].'px';
        
        $dataAttribute=array();
        $dataAttribute['item-first-radius']=$attribute['item_first_radius'];

        $html=
        '
            <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-circle')).Autoride_ThemeHelper::createDataAttribute($dataAttribute).Autoride_ThemeHelper::createStyleAttribute($style).'>
                '.$html.'
            </div>
        ';
        
        if(is_array($autoride_featureCircleList))
        {
            if(count($autoride_featureCircleList))
            {
                $htmlElement=null;
                foreach($autoride_featureCircleList as $value)
                    $htmlElement.='<li>'.esc_html($value).'</li>';
                
                $html.=
                '
                    <div'.Autoride_ThemeHelper::createClassAttribute(array('theme-component-feature-circle-responsive')).'>
                        <span>'.$attribute['circle_inner_header'].' '.lcfirst($attribute['circle_inner_subheader']).'</span>
                        '.do_shortcode('[vc_autoride_theme_list style="2"]<ul>'.$htmlElement.'</ul>[/vc_autoride_theme_list]').'
                    </div>
                ';
            }
        }
        
        $autoride_featureCircleList=array();
        
        return($html);
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/