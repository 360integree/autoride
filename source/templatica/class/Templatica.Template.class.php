<?php

/******************************************************************************/
/******************************************************************************/

class TemplaticaTemplate
{
	/**************************************************************************/
	
	function __construct()
	{

	}
	
	/**************************************************************************/
	
	function init()
	{		
        /*
        
        if(function_exists('vc_set_default_editor_post_types'))
            vc_set_default_editor_post_types(array('page',self::getCPTName()));
		
        if(function_exists('vc_editor_set_post_types'))
            vc_editor_set_post_types(vc_editor_post_types()+array(self::getCPTName()));
		
        
        add_filter('vc_role_access_with_post_types_get_state','__return_true');
		add_filter('vc_role_access_with_backend_editor_get_state','__return_true');
		add_filter('vc_role_access_with_frontend_editor_get_state','__return_true');

        */
    
        $this->registerCPT();
        
        add_shortcode(self::createTemplateShortcode(0,true),array($this,'createTemplate'));
        
        add_action('save_post',array($this,'savePost'));
        
        add_action('add_meta_boxes_'.self::getCPTName(),array($this,'addMetaBoxTemplate'));
        add_action('add_meta_boxes_post',array($this,'addMetaBoxAny'));
        add_action('add_meta_boxes_page',array($this,'addMetaBoxAny'));
        
        add_action('wp_ajax_'.PLUGIN_TEMPLATICA_CONTEXT.'_create_template_based_on',array($this,'createTemplateBasedOn'));
		add_action('wp_ajax_nopriv_'.PLUGIN_TEMPLATICA_CONTEXT.'_create_template_based_on',array($this,'createTemplateBasedOn'));
        
		add_filter('manage_edit-'.self::getCPTName().'_columns',array($this,'manageEditColumns')); 
		add_filter('manage_edit-'.self::getCPTName().'_sortable_columns',array($this,'manageEditSortableColumn'));
        add_action('manage_'.self::getCPTName().'_posts_custom_column',array($this,'managePostsCustomColumn'));
        
        add_filter('postbox_classes_'.self::getCPTName().'_'.PLUGIN_TEMPLATICA_CONTEXT.'_meta_box_template_main',array($this,'adminCreateMetaBoxClass'));
	}
    
    /**************************************************************************/
    
    function registerCPT()
    {
 		register_post_type
		(
			self::getCPTName(),
			array
			(
				'labels'=>array
				(
					'name'														=>	__('Template','templatica'),
					'singular_name'												=>	__('Templates','templatica'),
					'add_new'													=>	__('Add New','templatica'),
					'add_new_item'												=>	__('Add New Template','templatica'),
					'edit_item'													=>	__('Edit Template','templatica'),
					'new_item'													=>	__('New Template','templatica'),
					'all_items'													=>	__('All Templates','templatica'),
					'view_item'													=>	__('View Template','templatica'),
					'search_items'												=>	__('Search Templates','templatica'),
					'not_found'													=>	__('No Templates Found','templatica'),
					'not_found_in_trash'										=>	__('No Templates Found in Trash','templatica'), 
					'parent_item_colon'											=>	'',
					'menu_name'													=>	__('Templatica','templatica')
				),	
				'public'														=>	true,  
				'show_ui'														=>	true,  
				'capability_type'												=>	'post',
				'hierarchical'													=>	false,  
				'rewrite'														=>	true,  
                'menu_icon'                                                     => 'dashicons-align-left',
				'supports'														=>	array('title','editor')  
			)
		);	        
    }
    
    /**************************************************************************/
    
    static function getCPTName()
    {
        return(PLUGIN_TEMPLATICA_CONTEXT.'_template');
    }
    
	/**************************************************************************/

    function getDictionary()
	{
		$data[0]=array(__('[Select a template]','templatica'));
        
        $argument=array
        (
            'posts_per_page'                                                    =>  -1,
            'orderby'                                                           =>  'title',
            'order'                                                             =>  'asc',
            'post_type'                                                         =>  self::getCPTName()
        );
        
        $post=get_posts($argument);
  
		foreach($post as $value)
        {
            if($this->hasUserAccess($value->ID))
                $data[$value->ID]=array($value->post_title);
        }
		
		return($data);
	}
    
    /**************************************************************************/
    
    function createTemplate($attr)
    {
        global $post;
        
		$default=array
		(
			'template_id'														=>  0
		);
        
		$attribute=shortcode_atts($default,$attr);
        
        $attribute['template_id']=(int)$attribute['template_id'];
        if($attribute['template_id']===0) return;
        
        $template=get_post($attribute['template_id']);
        if(is_null($template)) return;
        
        $template->post_content=str_replace(TemplaticaTemplate::createTemplateShortcode($attribute['template_id']),'',$template->post_content);

        $customCSS=get_metadata('post',$attribute['template_id'],'_wpb_shortcodes_custom_css',true);
        
        if(!empty($customCSS))
            $customCSS='<style type="text/css">'.wp_strip_all_tags($customCSS).'</style>';
        
        return(do_shortcode($template->post_content).$customCSS);
    }
    
    /**************************************************************************/
   
    function adminCreateMetaBoxClass($class) 
    {
        array_push($class,'to-postbox-1');
        return($class);
    }
    
    /**************************************************************************/
    
    function addMetaBoxTemplate()
    {
        global $post;
        if(!$this->hasUserAccess($post->ID))
            wp_redirect(admin_url('edit.php?post_type='.self::getCPTName()));
        
        add_meta_box(PLUGIN_TEMPLATICA_CONTEXT.'_meta_box_template_main',__('Main','templatica'),array($this,'addMetaBoxTemplateMain'),self::getCPTName(),'normal','low');		
    }
    
    /**************************************************************************/
     
    function addMetaBoxTemplateMain()
    {
        global $post;
        
        $User=new TemplaticaUser();
        
		$data=array();
        
        $data['meta']=TemplaticaPostMeta::getPostMeta($post);
        
		$data['nonce']=TemplaticaHelper::createNonceField(PLUGIN_TEMPLATICA_CONTEXT.'_meta_box_template_main');
        
        $data['dictionary']['userRole']=$User->getUserRoleDictionary();
        
        $data['templateUsagePostList']=$this->getTemplateUsagePostList();

		$Template=new TemplaticaView($data,PLUGIN_TEMPLATICA_PATH_VIEW.'admin/meta_box_template_main.php');
		echo $Template->output();        
    }
    
    /**************************************************************************/
    
    function addMetaBoxAny()
    {
        add_meta_box(PLUGIN_TEMPLATICA_CONTEXT.'_meta_box_any_template_create',__('Create template','templatica'),array($this,'addMetaBoxAnyTemplateCreate'),null,'side','low');		
    }
    
    /**************************************************************************/
    
    function addMetaBoxAnyTemplateCreate()
    {
		$data=array();

		$Template=new TemplaticaView($data,PLUGIN_TEMPLATICA_PATH_VIEW.'admin/meta_box_any_template_create.php');
		echo $Template->output();                
    }
    
    /**************************************************************************/
    
    function setPostMetaDefault(&$meta)
    {
        TemplaticaHelper::setDefault($meta,'user_role',array(-1));
    }
    
    /**************************************************************************/
    
    function savePost($postId)
    {      
        if(!$_POST) return(false);
        
        if(TemplaticaHelper::checkSavePost($postId,PLUGIN_TEMPLATICA_CONTEXT.'_meta_box_template_main_noncename','savePost')===false) return(false);
        
		$meta=array();

        $User=new TemplaticaUser();
        
		$this->setPostMetaDefault($meta);
      
        /***/
        
        $dictionary=$User->getUserRoleDictionary();
        
        $role=TemplaticaHelper::getPostValue('user_role');
        
        foreach($role as $index=>$value)
        {
            if($value==='-1')
            {
                $role=array(-1);
                break;
            }
            if(!isset($dictionary[$value]))
                unset($role[$index]);            
        }
   
        if(!count($role)) $role=array(-1);
   
        TemplaticaPostMeta::updatePostMeta($postId,'user_role',$role);
    }
    
    /**************************************************************************/
    
    function hasUserAccess($postId)
    {
        if(!is_admin()) return(true);
        
        $post=get_post($postId);
        if(is_null($post)) return(false);
        
        if((int)$post->post_author===(int)wp_get_current_user()->ID) return(true);
        
        $postMeta=TemplaticaPostMeta::getPostMeta($post);
        if(in_array(-1,$postMeta['user_role'])) return(true);
        
        $role=wp_get_current_user()->roles;
        foreach($role as $value)
        {
            if(in_array($value,$postMeta['user_role']))
               return(true);
        }

        return(false);
    }
    
    /**************************************************************************/
    
    function manageEditColumns()
    {        
		$column=array
		(  
			'cb'																=>	'<input type="checkbox"/>',
			'title'																=>	__('Title','templatica'),
			'author'                                                            =>	__('Author','templatica'),
            'user_role'                                                         =>	__('Restricted to roles','templatica'),
			'date'  															=>	__('Date','templatica')
		);   
		
		return($column);         
    }

    /**************************************************************************/
    
    function manageEditSortableColumn($column)
    {
		$column['title']='title';
		$column['date']='date';
		return($column);            
    }
    
    /**************************************************************************/

    function managePostsCustomColumn($column)
    {
		global $post;
        
        $User=new TemplaticaUser();
        $Validation=new TemplaticaValidation();
        
        $role=$User->getUserRoleDictionary();
       
        $meta=TemplaticaPostMeta::getPostMeta($post);
		
		switch($column) 
		{
			case 'user_role':
				
                $html=null;
                
                if(in_array(-1,$meta['user_role']))
                {
                    $html=__('-','templatica');
                }
                else
                {
                    foreach($role as $index=>$value)
                    {
                        if(in_array($index,$meta['user_role']))
                        {
                            if($Validation->isNotEmpty($html)) $html.=', ';
                            $html.=$value[0];
                        }
                    }
                }
                
                echo $html;
                
			break;
        }
    }
    
    /**************************************************************************/
    
    function getTemplateUsagePostList()
    {
        add_filter('posts_where',array($this,'getTemplateUsagePostListPostsWhere'));
        
        $argument=array
        (
            'post_type'                                                         =>  'any',
            'posts_per_page'                                                    =>  -1,
            'suppress_filters'                                                  =>  false
        );
        
        $post=get_posts($argument);
        
        if(is_null($post)) $post=array();
        
        remove_filter('posts_where',array($this,'getTemplateUsagePostListPostsWhere'));
        
        return($post);
    }
    
    /**************************************************************************/
    
    function getTemplateUsagePostListPostsWhere($where)
    {
        global $post,$table_prefix;
        return($where.' and '.$table_prefix.'posts.post_content like \'%'.TemplaticaTemplate::createTemplateShortcode($post->ID,false).'%\'');
    }
    
    /**************************************************************************/
    
    static function createTemplateShortcode($postId=0,$core=false)
    {
        $shortcode='vc_'.PLUGIN_TEMPLATICA_CONTEXT.'_template';
        
        if($core) return($shortcode);
        if($postId) $shortcode.=' template_id="'.$postId.'"';
        
        return('['.$shortcode.']');
    }
    
    /**************************************************************************/

    
    function createTemplateBasedOn()
    {
        $response=array('text'=>null);
        
        $postId=TemplaticaHelper::getPostValue('post_id',false);
        
        $post=get_post($postId);
        if(is_null($post))
        {
            $response['text']=__('Post is not found.','templatica');
            TemplaticaHelper::createJSONResponse($response);
        }
        
        $argument=array
        (
            'post_type'                                                         =>  self::getCPTName(),
            'post_title'                                                        =>  $post->post_title,
            'post_content'                                                      =>  $post->post_content
        );
        
        $templateId=wp_insert_post($argument);
        if($templateId===0)
        {
            $response['text']=__('Template cannot be created.','templatica');
            TemplaticaHelper::createJSONResponse($response);
        }
        
        $meta=TemplaticaPostMeta::getPostMeta($templateId);
        foreach($meta as $index=>$value)
            TemplaticaPostMeta::updatePostMeta($templateId,$index,$value);
        
        $response['text']='<a href="'.get_edit_post_link($templateId).'" target="_blank">'.__('New template has been created.','templatica').'</a>';
        
        TemplaticaHelper::createJSONResponse($response);
    }
    
    /**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/