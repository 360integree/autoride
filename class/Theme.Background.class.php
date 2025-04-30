<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeBackground
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->backgroundType=array
		(
			'none'=>array(__('None','autoride')),
			'image'=>array(__('Image','autoride')),
			'revslider'=>array(__('Revolution slider','autoride'))
		);

		$this->backgroundRepeat=array
		(
			'no-repeat'=>array(__('no-repeat','autoride')),
			'repeat-y'=>array(__('repeat-y','autoride')),
			'repeat-x'=>array(__('repeat-x','autoride')),
			'repeat'=>array(__('repeat','autoride')),
			'inherit'=>array(__('inherit','autoride'))
		);

		$this->backgroundSize=array
		(
			'auto'=>array(__('auto','autoride')),
			'length'=>array(__('length','autoride')),
			'percentage'=>array(__('percentage','autoride')),
			'cover'=>array(__('cover','autoride')),
			'contain'=>array(__('contain','autoride')),
			'initial'=>array(__('initial','autoride')),
			'inherit'=>array(__('inherit','autoride'))
		);

		$this->backgroundOrigin=array
		(
			'padding-box'=>array(__('padding-box','autoride')),
			'border-box'=>array(__('border-box','autoride')),
			'content-box'=>array(__('content-box','autoride')),
			'initial'=>array(__('initial','autoride')),
			'inherit'=>array(__('inherit','autoride'))
		);

		$this->backgroundClip=array
		(
			'border-box'=>array(__('border-box','autoride')),
			'padding-box'=>array(__('padding-box','autoride')),
			'content-box'=>array(__('content-box','autoride')),
			'initial'=>array(__('initial','autoride')),
			'inherit'=>array(__('inherit','autoride')),
		);

		$this->backgroundAttachment=array
		(
			'scroll'=>array(__('scroll','autoride')),
			'fixed'=>array(__('fixed','autoride')),
			'local'=>array(__('local','autoride')),
			'initial'=>array(__('initial','autoride')),
			'inherit'=>array(__('inherit','autoride'))
		);
	}
	
	/**************************************************************************/
	
	function getDictionary($type,$useNone=true,$useGlobal=true,$useLeftUnchanged=false)
	{
		$temp=array();
		
		if($useNone) $data[0]=array(__('[None]','autoride'));
		if($useGlobal) $data[-1]=array(__('[Use global settings]','autoride'));
		if($useLeftUnchanged) $data[-10]=array(__('[Left unchanged]','autoride')); 
		
		foreach($this->{$type} as $index=>$value)
			$temp[$index]=$value[0];
			
		asort($temp);
		
		foreach($temp as $index=>$value)
			$data[$index]=array($value);
		
		return($data);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/