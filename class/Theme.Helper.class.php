<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeHelper
{
	/**************************************************************************/
	
	static function checkSavePost($post_id,$name,$action=null)
	{
		if((defined('DOING_AUTOSAVE')) && (DOING_AUTOSAVE)) return(false);

		if(!array_key_exists($name,$_POST)) return(false);
		
		if(!wp_verify_nonce($_POST[$name],$action)) return(false);

		unset($_POST[$name]);
		
		if($post_id!=-1)
		{
			if(!current_user_can('edit_post',$post_id)) return(false);
		}
		
		return(true);
	}
	
	/**************************************************************************/

	static function createId($prefix=null)
	{
		return((is_null($prefix) ? null : $prefix.'_').strtoupper(md5(microtime().rand())));
	}
	
	/**************************************************************************/
	
	static function createHash($value)
	{
		return(strtoupper(md5($value)));
	}
	
	/**************************************************************************/
	
	static function getPostOption($prefix=null)
	{
		if(!is_null($prefix)) $prefix='_'.$prefix.'_';
		
		$option=array();
		foreach($_POST as $key=>$value)
		{
			if(preg_match('/^'.AUTORIDE_THEME_OPTION_PREFIX.$prefix.'/',$key,$result)) 
			{
				$index=preg_replace('/^'.AUTORIDE_THEME_OPTION_PREFIX.'_/','',$key);
				$option[$index]=$value;
			}
		}	
		
		$option=Autoride_ThemeHelper::stripslashesPOST($option);
		
		return($option);
	}

	/**************************************************************************/
	
	static function setDefaultOption(&$option,$index,$value)
	{
		if(array_key_exists($index,(array)$option)) return;
		$option[$index]=$value;
	}
	
	/**************************************************************************/
	
	static function stripslashesPOST($value)
	{
		return(stripslashes_deep($value));
	}

	/**************************************************************************/
	
	static function formatCode($value)
	{
		return($value);
	}
	
	/**************************************************************************/
	
	static function getFormName($name,$display=true)
	{
		if(!$display) return(AUTORIDE_THEME_OPTION_PREFIX.'_'.$name);
		echo AUTORIDE_THEME_OPTION_PREFIX.'_'.$name;
	}
	
	/**************************************************************************/
	
	static function displayIf($value,$testValue,$text,$display=true)
	{
		if(is_array($value))
		{
			foreach($value as $v)
			{
				if(strcmp($v,$testValue)==0) 
				{
					if($display) echo esc_attr($text);
					else return($text);
					return;
				}	
			}
		}
		else 
		{
			if(strcmp($value,$testValue)==0) 
			{
				if($display) echo esc_attr($text);
				else return($text);
			}
		}
	}
	
	/**************************************************************************/
	
	static function disabledIf($value,$testValue,$display=true)
	{
		return(Autoride_ThemeHelper::displayIf($value,$testValue,' disabled ',$display));
	}
	
	/**************************************************************************/

	static function checkedIf($value,$testValue=1,$display=true)
	{
		return(Autoride_ThemeHelper::displayIf($value,$testValue,' checked ',$display));
	}
	
	/**************************************************************************/
	
	static function selectedIf($value,$testValue=1,$display=true)
	{
		return(Autoride_ThemeHelper::displayIf($value,$testValue,' selected ',$display));
	}
		
	/**************************************************************************/
	
	static function removeUIndex(&$data)
	{
		$argument=array_slice(func_get_args(),1);
		
		$data=(array)$data;
		
		foreach($argument as $index)
		{
			if(!is_array($index))
			{
				if(!array_key_exists($index,$data))
					$data[$index]='';
			}
			else
			{
				if(!array_key_exists($index[0],$data))
					$data[$index[0]]=$index[1];				
			}
		}
	}
	
	/**************************************************************************/
	
	static function addProtocolName($value,$protocol='http://')
	{
		if(!preg_match('/^'.preg_quote($protocol,'/').'/',$value)) return($protocol.$value);
		return($value);
	}
	
	/**************************************************************************/
	
	static function getPageNumber()
	{
		$page=1;
		
		if(get_query_var('paged')) $page=get_query_var('paged');
		elseif (get_query_var('page')) $page=get_query_var('page');

		return($page);
	}
	
	/**************************************************************************/

	static function limitChar($text,$limit)
	{
		return(substr($text,0,$limit));
	}
	
	/**************************************************************************/
	
	static function limitWord($text,$limit)
	{
		$words=explode(' ',$text,($limit+1));
		if(count($words)>$limit) array_pop($words);
		return implode(' ',$words);
	}
	
	/**************************************************************************/
	
	static function escapeShortcodeAttr($value)
	{
		return(esc_attr($value));
	}
	
	/**************************************************************************/
	
	static function createTermDictionary($term,$arg=array(),$data=array(),$element=array(),$key='slug')
	{
		$dictionary=array();

		$default=array
		(
			'hide_empty'	=>	false
		);
		
		$argument=array_merge($default,$arg);
		$result=get_terms(array($term),$argument);	
		
		if(in_array('useNone',$element)) $dictionary[-1]=__('[None]','autoride');
		if(in_array('useSelect',$element)) $dictionary[-1]=__('[Select]','autoride');
		if(in_array('useDefault',$element)) $dictionary[-1]=__('[Use default settings]','autoride');
		
		if($result)
		{		
			if(is_array($result))
			{
				foreach($result as $post)
				{
					if($key=='id') $dictionary[$post->term_id]=$post->name;
					if($key=='slug') $dictionary[$post->slug]=$post->name;
				}
			}
		}
			
		return($dictionary);		
	}
	
	/**************************************************************************/
	
	static function createDictionary($arg,$data=array(),$element=array())
	{
		$data=(array)$data;
		
		$default=array
		(
			'posts_per_page'	=>	-1,
			'orderby'			=>	'title',
			'order'				=>	'asc'
		);
		
		$argument=array_merge($default,$arg);
		
		$dictionary=array();
		
		$result=new WP_Query($argument);	
		
		if(in_array('useNone',$element)) $dictionary[-1]=__('[None]','autoride');
		if(in_array('useSelect',$element)) $dictionary[-1]=__('[Select]','autoride');
		if(in_array('useDefault',$element)) $dictionary[-1]=__('[Use default settings]','autoride');
		
		if(count($result->posts))
		{			
			foreach($result->posts as $post)
				$dictionary[$post->ID]=$post->post_title;
		}
			
		return($dictionary);		
	}
	
	/**************************************************************************/
	
	static function createClassAttribute($class)
	{
		$Validation=new Autoride_ThemeValidation();
		
		$class=trim(implode(' ',$class));
		
		return($Validation->isEmpty($class) ? null : ' class="'.esc_attr($class).'"');
	}
	
	/**************************************************************************/
	
	static function createDataAttribute($attribute)
	{
		$html=null;
		
		foreach($attribute as $index=>$value)
			$html.=' data-'.$index.'="'.esc_attr($value).'"';
		
		return($html);
	}
 
	/**************************************************************************/
	
	static function createStyleAttribute($style)
	{
		$ret=null;
		$Validation=new Autoride_ThemeValidation();
		
		foreach($style as $index=>$value)
		{
			if($Validation->isEmpty($value)) continue;
			$ret.=$index.':'.$value.';';
		}
		
		return($Validation->isEmpty($ret) ? null : ' style="'.esc_attr($ret).'"');
	}
	
	/**************************************************************************/
	
	static function closeMetaBox($classes)
	{
		array_push($classes,'closed');
		return($classes);
	}
	
	/**************************************************************************/
	
	static function getTheExcerpt($postId) 
	{
		global $post;  
		$aPost=$post;
		$post=get_post($postId);
		$output=get_the_excerpt();
		$post=$aPost;
		return($output);
	}
	
	/**************************************************************************/
	
	static function createPagination($query)
	{
		global $wp_rewrite;  
		
		$Validation=new Autoride_ThemeValidation();
		
		$total=$query->max_num_pages;

		$current=max(1,Autoride_ThemeHelper::getPageNumber()); 
		
		$pagination=array
		(
			'base'			=>	add_query_arg('paged','%#%'),
			'format'		=>	'',
			'current'		=>	$current,  
			'total'			=>	$total,  
			'next_text'		=>	'',
			'prev_text'		=>	''
		);

		if(is_search()) $pagination['add_args']=array('s'=>urlencode(get_query_var('s')));

		$html=paginate_links($pagination);
		
		if($Validation->isNotEmpty($html))
		{
			$html=
			'
				<div class="theme-pagination theme-clear-fix">
					'.$html.'
				</div>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	static function createWidgetAreaTeampleDictionary($widgetArea,$template,$useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autoride'));
		
		foreach($widgetArea as $index=>$value)
			$data['w'.$index]=array(sprintf(__('[Widget area] %s','autoride'),$value[0]));
		foreach($template as $index=>$value)
			$data['t'.$index]=array(sprintf(__('[Template] %s','autoride'),$value[0]));			 
		
		$toUnset=array('t0','t-1','t-10','w0','w-1','w-10');
		
		foreach($toUnset as $value)
		{
			if(array_key_exists($value,$data)) unset($data[$value]);
		}
		
		return($data);
	}
	
	/**************************************************************************/
	
	static function getWidgetAreaTemplateContent($post,$name)
	{
		$id=Autoride_ThemeOption::getGlobalOption($post,$name,Autoride_ThemeOption::getOptionPrefix($post));		
		
		if($id=='-1') reurn(false);
	 
		$WidgetArea=new Autoride_ThemeWidgetArea();
		
		if(substr($id,0,1)=='w')
		{
			$widgetAreaData=$WidgetArea->getWidgetAreaByPost($post,$name);
			if($widgetAreaData['id']!='0')
			{
				$widgetAreaData['id']=substr($widgetAreaData['id'],1);
				return($widgetAreaData);
			}
		}
		elseif(substr($id,0,1)=='t')
		{
			$content=do_shortcode('[vc_templatica_template template_id="'.substr($id,1).'"]');
			return($content);
		}
		
		return(false);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/