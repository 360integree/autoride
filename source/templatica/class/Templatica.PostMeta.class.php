<?php

/******************************************************************************/
/******************************************************************************/

class TemplaticaPostMeta
{
	/**************************************************************************/
	
	static function getPostMeta($post)
	{
		$data=array();

        $post=is_object($post) ? $post : get_post($post);
        
		$meta=get_post_meta($post->ID);
		
		if(!is_array($meta)) $meta=array();
		
		foreach($meta as $metaIndex=>$metaData)
		{
			if(preg_match('/^'.PLUGIN_TEMPLATICA_CONTEXT.'_/',$metaIndex))
				$data[preg_replace('/'.PLUGIN_TEMPLATICA_CONTEXT.'_/',null,$metaIndex)]=$metaData[0];
		}
		
		switch($post->post_type)
		{
			case PLUGIN_TEMPLATICA_CONTEXT.'_template':
                
                self::unserialize($data,array('user_role'));

				$Template=new TemplaticaTemplate();
				$Template->setPostMetaDefault($data);
                
			break;
		}
		
		return($data);
	}
    
    /**************************************************************************/
    
    static function unserialize(&$data,$unserializeIndex)
    {
        foreach($unserializeIndex as $index)
        {
            if(isset($data[$index]))
                $data[$index]=maybe_unserialize($data[$index]);
        }
    }
	
	/**************************************************************************/
	
	static function updatePostMeta($post,$name,$value)
	{
		$name=PLUGIN_TEMPLATICA_CONTEXT.'_'.$name;
		$postId=(int)(is_object($post) ? $post->ID : $post);
		
		update_post_meta($postId,$name,$value);
	}
    
	/**************************************************************************/
	
	static function createArray(&$array,$index)
	{
		$array=array($index=>array());
		return($array);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/