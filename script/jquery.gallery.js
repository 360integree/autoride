/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var Gallery=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
		var $option=option;
		
		/**********************************************************************/

		this.build=function() 
		{
			var i=0;
			var imageList=$this.find('img');
			var imageListCount=imageList.length;
			
			imageList.each(function() 
			{
				$(this).one('load',function()
				{
					if((++i)===imageListCount)
					{
						$self.createIsotope(true);
						$this.css('opacity','1');
					}
				}).each(function() 
				{
					if(this.complete) $(this).load();
				});
			});
		};
		
		/**********************************************************************/
		
		this.createIsotope=function(bind)
		{
			var imageList=$this;
			var imageListWidth=imageList.parent().actual('width');
			var columnCount=parseInt(imageList.parent().attr('data-column_count'),10);

			var margin=40;

			if(typeof(bind)==='undefined') bind=true;

			if(imageList.parent().hasClass('theme-component-gallery-type-1'))
			{
				imageList.children('li').each(function() 
				{
					var itemWidth=300;

					if($(this).hasClass('theme-component-gallery-item-width-25'))
					{
						if(imageListWidth<460) itemWidth=130;
						else if(imageListWidth<750) itemWidth=210;
						else if(imageListWidth<940) itemWidth=157.5;
						else if(imageListWidth<1220) itemWidth=205;
						else itemWidth=275;
					}
					else
					{
						if(imageListWidth<460) itemWidth=300;
						else if(imageListWidth<750) itemWidth=460;
						else if(imageListWidth<940) itemWidth=355;	
						else if(imageListWidth<1220) itemWidth=450; 
						else itemWidth=590;
					}

					$(this).css('width',itemWidth);
				});
				
				imageList.isotope(
				{
					layoutMode:'fitRows',
					fitRows:
					{
						gutter:margin
					}
				});	
			}
			else if(imageList.parent().hasClass('theme-component-gallery-type-2'))
			{
				var itemWidth=(imageListWidth-(margin*(columnCount-1)))/columnCount;
				
				if(itemWidth<=130) itemWidth='100%';
				
				imageList.children('li').css('width',itemWidth);

				imageList.isotope(
				{
					layoutMode:'masonry',
					masonry:
					{
						gutter:margin
					}
				});				   
			}
			
			if(bind)
			{
				$(window).resize(function()
				{
					$self.createIsotope(false);
				});
			}
		};
 
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.gallery=function(option) 
	{
		return this.each(function() 
		{
			var object=new Gallery(this,option);
			object.build();
			return(object);
		});
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/