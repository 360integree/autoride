<?php

/******************************************************************************/
/******************************************************************************/

vc_map
( 
    array
    (
        'base'                                                                  =>  'vc_autoride_theme_vehicle_list',
        'name'                                                                  =>  __('Vehicles list','autoride-core'),
        'description'                                                           =>  __('Creates list of vehicles.','autoride-core'), 
        'category'                                                              =>  __('Content','autoride-core'),
        'params'                                                                =>  array
        (        
            array
            (
                'type'                                                          =>  'textfield',
                'param_name'                                                    =>  'vehicle_id',
                'heading'                                                       =>  __('Vehicle IDs','autoride-core'),
                'description'                                                   =>  __('ID of vehicles separated by comma.','autoride-core')
            )
        )
    )
);

/******************************************************************************/

add_shortcode('vc_autoride_theme_vehicle_list',array('WPBakeryShortCode_VC_Autoride_Theme_Vehicle_List','vcHTML'));

/******************************************************************************/

class WPBakeryShortCode_VC_Autoride_Theme_Vehicle_List
{
    /**************************************************************************/
     
    public static function vcHTML($attr,$content) 
    {
        $default=array
        (
            'vehicle_id'                                                        =>  ''
        );
        
        $attribute=shortcode_atts($default,$attr);
        
        $html=null;
        
        $Validation=new Autoride_ThemeValidation();
        
        if($Validation->isEmpty($attribute['vehicle_id'])) return($html);
        
        $data=array();
        
        $data['paged']=0;
        $data['template_id']=2;
        $data['vehicle_id']=array_map('intval',preg_split('/\,/',$attribute['vehicle_id']));
        $data['posts_per_page']=-1;
        
		global $post;  
		$aPost=$post;
        
        $Template=new Autoride_ThemeTemplate($data,AUTORIDE_THEME_PATH.'vehicle-list-content.php');
        $content=$Template->output();   
        
        $post=$aPost;
        
        return($content);
    } 
    
    /**************************************************************************/
} 
 
/******************************************************************************/
/******************************************************************************/