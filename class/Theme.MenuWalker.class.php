<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeMenuWalker extends Walker_Nav_Menu 
{
	/**************************************************************************/
	
	function start_lvl(&$output,$depth=0,$args=array()) 
	{
		$output.=
		'
			<ul>
		';
	}

	/**************************************************************************/
	
	function end_lvl(&$output,$depth=0,$args=array()) 
	{
		$output.=
		'
			</ul>
		';			
	}

	/**************************************************************************/
	
	function start_el(&$output,$object,$depth=0,$args=array(),$current_object_id=0) 
	{	
		$Validation=new Autoride_ThemeValidation();
		
		$output.=
		'
			<li class="'.esc_attr(join(' ',(array)$object->classes)).'">
				<a href="'.esc_url($object->url).'"'.($Validation->isNotEmpty($object->target) ? ' target="_blank"' : null).'><span></span><span>'.esc_html($object->title).'</span><span></span></a>
		';
	}

	/**************************************************************************/
	
	function end_el(&$output,$object,$depth=0,$args=array())
	{
		$output.=
		'
			</li>
		';			
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/