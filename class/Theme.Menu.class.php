<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeMenu
{
	/**************************************************************************/

	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function getMenuDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$menu=get_terms('nav_menu');
		
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]','autoride'));

		foreach($menu as $singlePost)
			$data[$singlePost->term_id]=array($singlePost->name);
		
		return($data);
	}

	/**************************************************************************/
	
	function create($menuId=0)
	{
		if((int)$menuId===0)
		{
			$locationId='main_menu';

			$menu=wp_get_nav_menus();
			$menuLocation=get_nav_menu_locations();

			if(isset($menuLocation[$locationId])) 
			{
				foreach($menu as $m)
				{
					if($m->term_id==$menuLocation[$locationId])
						$menuId=$m->term_id;
				}
			}
		}
		
		$r=wp_get_nav_menu_object($menuId);
		
		if($r===false) return;
		if($r->count===0) return;
		
		$menuAttribute=array
		(
			'menu'=>$menuId,
			'walker'=>new Autoride_ThemeMenuWalker(),
			'menu_class'=>'theme-clear-fix sf-menu',
			'container'=>'div',
			'container_class'=>'theme-menu theme-menu-default',
			'echo'=>0,
			'items_wrap'=>'<ul class="%2$s">%3$s</ul>'
		);

		$menuResponsiveAttribute=array
		(
			'menu'=>$menuId,
			'walker'=>new Autoride_ThemeMenuWalker(),
			'menu_class'=>'theme-clear-fix',
			'container'=>'div',
			'container_class'=>'theme-menu theme-menu-responsive',
			'echo'=>0,
			'items_wrap'=>'<ul class="theme-menu-responsive-list %2$s">%3$s</ul>'
		);

		return(array(wp_nav_menu($menuAttribute),wp_nav_menu($menuResponsiveAttribute)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/