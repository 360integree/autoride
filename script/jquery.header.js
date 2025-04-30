/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var Header=function(object,themeOption)
	{
		/**********************************************************************/
		
		var $self=this;
		var $themeOption=themeOption;

		var $header;
		
		var $headerTop;
		var $headerMiddle;
		var $headerBottom;
		
		var $menuDefault;
		var $menuResponsive;
		var $menuResponsiveList;
		
		/**********************************************************************/

		this.create=function() 
		{		
			$header=$('.theme-page-header');
			
			$headerTop=$header.find('.theme-page-header-top');
			$headerMiddle=$header.find('.theme-page-header-middle');
			$headerBottom=$header.find('.theme-page-header-bottom');
			
			$menuDefault=$header.find('.theme-menu.theme-menu-default');
			$menuResponsive=$header.find('.theme-menu.theme-menu-responsive');
			
			$menuResponsiveList=$menuResponsive.children('ul.theme-menu-responsive-list');
			
			$self.build();
		};
		
		/**********************************************************************/
		
		this.build=function()
		{
			$self.createMenuDefault();
			
			/***/
			
			$self.createMenuResponsive();
			
			/***/
			
			$(window).windowDimensionListener({change:function(width,height)  
			{
				if(width || height)
				{
					$self.createHeaderResponsive();
				}
			}});

			/***/

			$header.css({display:'block'});  
		};
		
		/**********************************************************************/
		
		this.createMenuDefault=function()
		{
			if($menuDefault.children('ul').length===1)
			{
				$menuDefault.children('ul').superfish(
				{ 
					delay:0,
					cssArrows:false,
					speedOut:0,
					animation:{opacity:'show'},
					onInit:function ()
					{

					}
				});
				//.supposition();			
			};
			
			/***/
			
			$menuDefault.find('li.menu-item-has-children>a>span:first-child+span+span').addClass('theme-icon-meta-arrow-vertical-2');
		};
		
		/**********************************************************************/
		
		this.createHeaderResponsive=function()
		{
			var width=$header.parent().actual('width');

			if(width<1224)
			{
				$('body').addClass('theme-menu-mode-responsive');
			}
			else 
			{	
				$('body').removeClass('theme-menu-mode-responsive');
				$menuResponsiveList.css('top','-999em');
			}
		};
		
		/**********************************************************************/
		
		this.createMenuResponsive=function()
		{
			if($header.length===1)
			{
				/****/
				
				$menuResponsiveList.appendTo($('body'));
				
				/***/
				
				var button=$(document.createElement('a'));
				
				button.addClass('theme-menu-responsive-button');
				
				button.on('click',function(e) 
				{
					e.preventDefault();
					$self.openMenuResponsive(); 
				});
			
				$menuResponsive.append(button);
			
				/***/
			
				$menuResponsiveList.find('li.menu-item-has-children>a>span:first-child+span+span').addClass('theme-icon-meta-arrow-vertical-3');
								
				$menuResponsiveList.find('.theme-icon-meta-arrow-vertical-3').on('click',function(e)
				{
					e.preventDefault();
					$(this).parent('a').next('ul').slideToggle(200);
				});
				
				/****/
				
				var html='<li><a href="#" class="theme-icon-meta-arrow-vertical-3"></a></li>';
				
				$menuResponsiveList.prepend(html);
				
				$menuResponsiveList.find('>li:first-child>a').on('click',function(e)
				{
					e.preventDefault();
					$self.closeMenuResponsive();
				});  
				
				/****/
			}
		};
		
		/**********************************************************************/
		
		this.openMenuResponsive=function()
		{
			$menuResponsiveList.css({'top':-1*$menuResponsiveList.actual('outerHeight')});
			 
			var top=0;
			
			if($('#wpadminbar').length===1)
				top+=parseInt($('#wpadminbar').actual('height'),10);
			 
			$menuResponsiveList.animate({top:top},{duration:300,easing:'swing'},function() 
			{
				
			});
		};
		
		/**********************************************************************/
		
		this.closeMenuResponsive=function()
		{
			var height=-1*$menuResponsiveList.actual('outerHeight');
			
			$menuResponsiveList.animate({top:height},{duration:300,easing:'swing'},function() 
			{
			
			});	  
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.header=function(themeOption) 
	{
		var header=new Header(this,themeOption);
		header.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/