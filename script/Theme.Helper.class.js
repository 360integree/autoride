"use strict";
/******************************************************************************/
/******************************************************************************/

function Autoride_ThemeHelper()
{
	/**************************************************************************/

	this.getValueFromClass=function(object,pattern)
	{
		var reg=new RegExp(pattern);
		var className=jQuery(object).attr('class').split(' ');

		for(var i in className)
		{
			if(reg.test(className[i]))
				return(className[i].substring(pattern.length));
		}

		return(false);		
	};
	
	/**************************************************************************/
	
	this.parseBool=function(value)
	{
		return(parseInt(value,10)===1 ? true : false);
	};

	/**************************************************************************/
};

/******************************************************************************/
/******************************************************************************/