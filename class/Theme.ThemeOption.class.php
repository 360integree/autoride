<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeOption
{
	/**************************************************************************/
	
	static function createOption($refresh=false)
	{
		$GlobalData=new Autoride_ThemeGlobalData();
		return($GlobalData->setGlobalData(AUTORIDE_THEME_OPTION_GLOBAL_ARRAY_KEY,array('Autoride_ThemeOption','createOptionObject'),$refresh));				
	}
	
	/**************************************************************************/
	
	static function createOptionObject()
	{	
		return((array)get_option(AUTORIDE_THEME_OPTION_PREFIX));
	}
	
	/**************************************************************************/
	
	static function refreshOption()
	{
		return(self::createOption(true));
	}
	
	/**************************************************************************/
	
	static function getOption($name)
	{
		global $autoride_GlobalData;

		self::createOption();

		if(!array_key_exists($name,$autoride_GlobalData[AUTORIDE_THEME_OPTION_GLOBAL_ARRAY_KEY])) return(null);
		return($autoride_GlobalData[AUTORIDE_THEME_OPTION_GLOBAL_ARRAY_KEY][$name]);		
	}
	
	/**************************************************************************/
	
	static function getGlobalOption($post,$name,$prefix=null,$emptyValue=false)
	{
		self::createOption();

		if(!is_null($prefix)) $name=$prefix.'_'.$name;
		
		$value=0;
		if(in_array(self::getOptionPrefix($post),array('woocommerce_product','vehicle_post')))
		{		   
			$value=self::getOption($name);
		}
		elseif(in_array(self::getOptionPrefix($post),array('attachment')))
		{
			$name=preg_replace('/attachment/','page',$name);
			$value=self::getOption($name);
		}
		else
		{
			if(is_object($post)) 
			{
				$option=self::getPostMeta($post);
				$Validation=new Autoride_ThemeValidation();

				if(array_key_exists($name,(array)$option)) $value=$option[$name];
				if($value==-1) $value=self::getOption($name);
				elseif(($emptyValue) && ($Validation->isEmpty($value)))
				{
					$value=self::getOption($name);
				}
			}
			else $value=self::getOption($name);
		}
		
		return($value);
	}
	
	/**************************************************************************/
	
	static function getOptionObject()
	{
		global $autoride_GlobalData;
		return($autoride_GlobalData[AUTORIDE_THEME_OPTION_GLOBAL_ARRAY_KEY]);
	}
	
	/**************************************************************************/
	
	static function updateOption($option)
	{
		$nOption=array();
		foreach($option as $index=>$value) $nOption[$index]=$value;
		
		$oOption=self::refreshOption();

		update_option(AUTORIDE_THEME_OPTION_PREFIX,array_merge($oOption,$nOption));
		
		self::refreshOption();
	}
	
	/**************************************************************************/
	
	static function resetOption()
	{
		update_option(AUTORIDE_THEME_OPTION_PREFIX,array());
		self::refreshOption();		
	}
	
	/**************************************************************************/
	
	static function getPostMeta($post)
	{
		$id=is_object($post) ? $post->ID : (int)$post;
		
		$meta=get_post_meta($id,AUTORIDE_THEME_OPTION_PREFIX,false);
		
		if(!is_array($meta)) $meta=array();
		if(isset($meta[0])) $meta=$meta[0];
		
		$postType=get_post_type($id);
		
		$Theme=new Autoride_Theme();
		$Post=new Autoride_ThemePost();
		$Page=new Autoride_ThemePage();
		
		$Theme->setPostMetaDefault($meta,'all');

		switch($postType)
		{
			case 'post':
				$Post->setPostMetaDefault($meta);
			break;
			case 'page':
				$Page->setPostMetaDefault($meta);
			break;
		}
		
		return($meta);
	}
	
	/**************************************************************************/
	
	static function getOptionPrefix($post)
	{
		switch(get_post_type($post))
		{
			case 'post':
				
				return('post');
				
			case 'attachment':
				
				return('attachment');
				
			case 'chbs_vehicle':
				
				return('vehicle_post');
				
			case 'product':
				
				return('woocommerce_product');
				
			default:
				
				return('page');
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/