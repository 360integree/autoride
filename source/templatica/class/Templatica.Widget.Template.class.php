<?php

/******************************************************************************/
/******************************************************************************/

class Templatica_Widget_Template extends WP_Widget 
{
	/**************************************************************************/
	
    function __construct() 
	{
		parent::__construct(PLUGIN_TEMPLATICA_CONTEXT.'_widget_template',__('Template','templatica'),array('description'=>__('Displays template.','templatica')));
    }
    
    /**************************************************************************/
	
	function widget($argument,$instance)
	{
        $Validation=new TemplaticaValidation();
        
        $title=null;
        if($instance['template_widget']==1)
        {
            $title=apply_filters('widget_title',isset($instance['title']) ? $instance['title'] : '');
            if($Validation->isNotEmpty($title))
                $title=$argument['before_title'].$title.$argument['after_title'];
        }
     
        $html=$title.do_shortcode(TemplaticaTemplate::createTemplateShortcode($instance['template_id']));
     
        if($instance['template_widget']==1)
            $html=$argument['before_widget'].$html.$argument['after_widget'];
        
        echo $html;
	}
    
    /**************************************************************************/
    
    function form($instance)
    {
        $html=null;
        
        $Template=new TemplaticaTemplate();
        
        $dictionary=$Template->getDictionary();
        
        if(!isset($instance['title'])) $instance['title']='';
        if(!isset($instance['template_id'])) $instance['template_id']=0;
        if(!isset($instance['template_widget'])) $instance['template_widget']=0;
        
        foreach($dictionary as $index=>$value)
            $html.='<option value="'.esc_attr($index).'" '.($index==$instance['template_id'] ? 'selected' : '').'>'.esc_html($value[0]).'</option>';
        
        $html=
        '
            <p>
                <label for="'.$this->get_field_id('title').'">'.esc_html__('Title','templatica').'</label>
                <input class="widefat" type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" value="'.esc_attr($instance['title']).'"/>            
            </p>  
             <p>
                <label for="'.$this->get_field_id('template_id').'">'.esc_html__('Template:','templatica').'</label>
                <select class="widefat" id="'.$this->get_field_id('template_id').'" name="'.$this->get_field_name('template_id').'">
                    '.$html.'
                </select>
            </p>              
            <p>
                <input class="checkbox" type="checkbox" id="'.$this->get_field_id('template_widget').'" name="'.$this->get_field_name('template_widget').'" value="1" '.($instance['template_widget']==1 ? 'checked' : '').'/> 
                <label for="'.$this->get_field_id('template_widget').'">'.esc_html__('This template includes widgets','templatica').'</label>
            </p>      
        ';
       
        echo $html;
    }
    
	/**************************************************************************/
	
    function update($new_instance,$old_instance)
	{
		$instance=array();
        $instance['title']=$new_instance['title'];
		$instance['template_id']=(int)$new_instance['template_id'];
		$instance['template_widget']=(int)$new_instance['template_widget'];
        return($instance);
    }

    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/