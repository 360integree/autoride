/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var responsiveElement=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		
		var $optionDefault=
		{
			width:460
		};
		
		var $option=$.extend($optionDefault,option);
		
		/**********************************************************************/

		this.create=function() 
		{
			this.responsive();
			
			var self=this;
			$().windowDimensionListener({change:function(width,height)
			{
				if(width)
				{
					self.responsive();
				}
			}});
		};
		
		/**********************************************************************/
		
		this.responsive=function()
		{
			$this.each(function() 
			{
				var rowWidth=$(this).actual('innerWidth',{includeMargin:false});
				
				var column=$(this).children('.vc_column_container')
				var columnLength=column.length;
				
				if(rowWidth/columnLength<=$option.width)
					column.addClass($option.className);
				else column.removeClass($option.className);	
			});
		};
		
		/**********************************************************************/
	}
	
	/**************************************************************************/
	
	$.fn.responsiveElement=function(option) 
	{
		var element=new responsiveElement(this,option);
		element.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);