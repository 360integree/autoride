<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeNotice
{
	/**************************************************************************/

	function __construct()
	{
		$this->error=array();
	}

	/**************************************************************************/

	function addError($fieldName,$errorMessage)
	{
		$this->error[]=array($fieldName,$errorMessage);
	}

	/**************************************************************************/

	function getError()
	{
		return($this->error);
	}

	/**************************************************************************/

	function isError()
	{
		return(count($this->error));
	}
	
	/**************************************************************************/
	
	function createHTML($templatePath)
	{
		$data=array();
		
		$data['type']=$this->isError() ? 'error' : 'success';
		
		if($this->isError())
		{
			$data['title']=esc_html__('Error','autoride');
			$data['subtitle']=esc_html__('Changes can not be saved.','autoride');				
		}
		else
		{
			$data['title']=esc_html__('Success','autoride');
			$data['subtitle']=esc_html__('All changes have been saved.','autoride');			
		}
		
		$ThemeTemplate=new Autoride_ThemeTemplate($data,$templatePath);
		return($ThemeTemplate->output());
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/