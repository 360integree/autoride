<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeTemplatica
{
	/**************************************************************************/

	function __construct()
	{
		
	}

	/**************************************************************************/

	function getDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$data=array();
		
		$argument=array
		(
			'posts_per_page'=>-1,
			'post_type'=>'templatica_template',
			'orderby'=>'title',
			'order'=>'asc'
		);
		
		$post=get_posts($argument);
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autoride'));

		foreach($post as $value)
			$data[$value->ID]=array($value->post_title);
		
		return($data);
	}	

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/