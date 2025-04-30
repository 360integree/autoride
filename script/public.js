"use strict";
/******************************************************************************/
/******************************************************************************/

jQuery(document).ready(function($) 
{	
	$('#comment-form').each(function()
	{
		var sum=0;
		
		$(this).find('.theme-form-column-1_2-left').each(function()
		{
			sum+=$(this).actual('height');
		});
		
		if(sum!==0)
			$(this).find('.theme-form-column-1_2-right').css('height',sum);
	});
	
	if(parseInt($('.theme-page-header>.theme-page-header-bottom-default').length,10)===1)
	{
		$('.theme-page>.theme-page-content').css('padding-top','0px');
	}
	
	/**************************************************************************/
	
	$('.theme-page-header .theme-page-header-top .theme-component-meta-icon-list a:has(".theme-icon-meta-search")').on('click',function(e)
	{
		e.preventDefault();
		
		$('#theme-full-screen-search-form').css('display','table').animate({opacity:1},200);
		$('#theme-full-screen-search-form input[type="text"]').focus();
	});
	
	$('#theme-full-screen-search-form #theme-full-screen-search-form-close-button').on('click',function(e)
	{
		e.preventDefault();
		
		$('#theme-full-screen-search-form').animate({opacity:0},200,function()
		{
			$(this).css('display','none');
		});
	});
	
	/**************************************************************************/
	
	$('.vc_row[data-vc-full-width="true"]').each(function()
	{
		var $this=$(this);
		
		var clock=setInterval(function()
		{
			if($this.attr('data-vc-full-width-init')=='true')
			{
				clearInterval(clock);
				$this.animate({opacity:1},200);
			}
		});
	});
	
	/**************************************************************************/
	
	if(parseInt(themeOption.config.woocommerce.enable,10)===1)
	{
		$('.quantity>input[type="button"]').on('click',function()
		{
			var field=$(this).siblings('input[type="text"]');
			var value=parseInt(field.val(),10);
			
			if($(this).hasClass('plus')) value+=1;
			else
			{
				value-=1;
				if(value<=0) value=1;
			}
				
			field.val(value);
		});
	}
	
	/**************************************************************************/
	
	var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
	
	/**************************************************************************/
	
	$().header(themeOption);
	
	/**************************************************************************/
	
	$('.theme-comment-content-read-more-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','none');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','inline');
	});
	
	$('.theme-comment-content-read-less-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','inline');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','none');
	});
	
	/**************************************************************************/
	
 	if($('#comment-form').length===1)
	{
		$('#reply-title').replaceWith('<h4 id="reply-title">'+$('#reply-title').html()+'</h4>');
		
		$().ThemeComment({'requestURL':themeOption.config.ajax_url,'page':$('#comments').data('cpage')});
		
		$('#comment-form').css('display','block');
	}
	
	/**************************************************************************/
	
	$('.widget_recent_comments>ul>li').each(function() 
	{
		var link=$(this).children('a')[0];
		var author=$(this).children('span')[0];
				 
		$(this).html('').append(author).append(link);
	});
	
	/**************************************************************************/
	
	$('ol.wp-block-latest-comments>li').each(function() 
	{
		var link=$(this).find('.wp-block-latest-comments__comment-link')[0];
		var author=$(this).find('.wp-block-latest-comments__comment-author')[0];
				 
		$(this).html('').append(author).append(link);
	});
	
	/**************************************************************************/
	
	$('.widget_recent_entries>ul>li,ul.wp-block-latest-posts.wp-block-latest-posts__list>li').each(function() 
	{
		var link=$(this).children('a')[0];
		
		if($(this).children('span').length)
			var date=$(this).children('span')[0];
		else var date=$(this).children('time')[0];
	
		$(this).html('').append(date).append(link);
	});
	
	/**************************************************************************/
	
	$('.widget_archive ul>li').each(function() 
	{
		var link=$(this).children('a').remove();
		var span='<span>'+$(this).text()+'</span>';
		
		link.html(link.text()+span);
		$(this).html(link);
	});
	
	/**************************************************************************/
	
	$('.widget_categories ul>li,.widget_product_categories ul>li,.woocommerce-widget-layered-nav ul>li,ul.wp-block-archives.wp-block-archives-list li').each(function() 
	{
		var link=$(this).children('a').remove();
		
		var list='';
		if($(this).children('ul').length)
			list=$(this).children('ul').remove();
		
		var span='<span>'+$(this).text()+'</span>';
		
		link.html(link.text()+span);
		$(this).html('').append(link).append(list);
	});
	
	/**************************************************************************/
	
	$('.widget_rating_filter ul>li').each(function() 
	{
		var link=$(this).children('a').remove();
		var starRating=link.children('.star-rating').remove();
		
		var list='';
		if($(this).children('ul').length)
			list=$(this).children('ul').remove();
		
		var count='<span>'+link.text()+'</span>';
		
		link.html('').append(starRating).append(count);
		
		$(this).html('').append(link).append(list);
	});
	
	/**************************************************************************/
	
	$('.widget_search input[type="text"],.widget_product_search input[type="search"],.wp-block-search input[type="search"]').after('<span class="theme-icon-meta-search"></span>');
	
	$('.widget_product_search input[type="search"]').attr('placeholder','');
	
	/**************************************************************************/
	
	$('.widget_products>ul>li,.widget_top_rated_products>ul>li,.widget_recent_reviews>ul>li,.widget_recently_viewed_products>ul>li').each(function() 
	{
		var link=$(this).children('a')[0];
		var del=$(this).children('del')[0];
		var ins=$(this).children('ins')[0];
		var rating=$(this).children('div.star-rating')[0];
				 
		$(this).html('').append(del).append(ins).append(rating).append(link);
	});
	
	/**************************************************************************/
	
	$('.widget_rss>ul>li').each(function() 
	{
		var link=$(this).children('a')[0];
		var date=$(this).children('.rss-date')[0];
		var content=$(this).children('.rssSummary')[0];
				 
		$(this).html('').append(date).append(link).append(content);
	});
	
	/**************************************************************************/
	
	$('.widget_calendar,.wp-block-calendar').each(function()
	{
		$(this).find('#prev>a').html('<span class="theme-icon-meta-arrow-horizontal-3"></span>');
		$(this).find('#next>a').html('<span class="theme-icon-meta-arrow-horizontal-3"></span>');
		$(this).css('display','block');
	});
	
	/**************************************************************************/
	
	if(parseInt(themeOption.goToPageTop.enable,10)===1)
	{
		if($('.theme-page-footer').length)
		{
			new Waypoint(
			{
				offset															  :	'100%',
				element															 :	$('.theme-page-footer'),
				handler															 :	function(direction) 
				{
				if(direction==='down')
					$('#theme-go-to-top').css({opacity:1});
				else $('#theme-go-to-top').css({opacity:0});
				}
			});

			$(window).bind('hashchange',function(e) 
			{
				e.preventDefault();

				var hash=window.location.hash.substring(1);
				if($.trim(hash)===$.trim(themeOption.goToPageTop.hash))
				{
					var options={};

					if(parseInt(themeOption.goToPageTop.animation_enable,10)===1)
						options={duration:parseInt(themeOption.goToPageTop.animation_duration,10),easing:themeOption.goToPageTop.animation_easing};

					options.onAfter=function() { window.location.hash='#'; };

					$.scrollTo(0,options);
				}
			});
		}
	};
	
	/**************************************************************************/
	
	$('.theme-vehicle-list-search select').selectmenu(
	{
		change:function(event,ui)
		{
			$(this).parents('form').submit();
		}
	});
	
	$('.ui-selectmenu-button .ui-icon.ui-icon-triangle-1-s').attr('class','chbs-meta-icon-arrow-vertical-large'); 
	
	/**************************************************************************/
	
	$('.theme-post-gallery-carousel').slick(
	{
		variableWidth:true,
		prevArrow:'<a href="#" class="slick-prev"></a>',
		nextArrow:'<a href="#" class="slick-next"></a>',
		slidesToShow:1,
		slidesToScroll:1,
		centerMode:false  
	});
	
	$('.theme-post-gallery img').on('click',function()
	{
		var image=$(this).parents('.theme-post-gallery').prevAll('.theme-post-image');
		image.html('<img src="'+$(this).attr('data-image-full-src')+'"/>');
	});
	
	/**************************************************************************/

	$('a.theme-image-fancybox').fancyBoxLaunch();
	
	/**************************************************************************/
	
	$('.wpcf7 .wpcf7-submit').addClass('theme-component-button theme-component-button-style-1');
	
	$('.wpcf7 .theme-form-field').on('click',function()
	{
		$(this).find(':input').focus();
	});
	
	$('.wpcf7').on('wpcf7:submit',function()
	{
		var $this=$(this);
		
		$this.find('*').qtip('destroy');
	 
		$this.find('.theme-form-field').each(function() 
		{
			var alert=$(this).find('*[role="alert"]');
			
			if(!alert.length) return(true);
			
			$(this).find('label:first').qtip(
			{
				show:	
				{ 
					target:$(this) 
				},
				style:	
				{ 
					classes:(alert.hasClass('wpcf7-not-valid-tip') ? 'theme-qtip theme-qtip-error' : 'theme-qtip theme-qtip-success')
				},
				content: 	
				{ 
					text:alert.text()
				},
				position: 	
				{ 
					my:'left center',
					at:'right center' 
				}
			}).qtip('show');				
		});
		
		var formResponseInterval=setInterval(function() 
		{
			var response=$this.find('.wpcf7-response-output');
			if(parseInt(response.length,10)===1)
			{
				var responseText=response.text();
				if($.trim(responseText).length===0) return;
				
				clearInterval(formResponseInterval);
				
				$this.find('input[type="submit"]').qtip(
				{
					show:	
					{ 
						target:$(this) 
					},
					style:	
					{ 
						classes:(response.hasClass('wpcf7-validation-errors') ? 'theme-qtip theme-qtip-error' : 'theme-qtip theme-qtip-success')
					},
					content: 	
					{ 
						text:responseText
					},
					position: 	
					{ 
						my:'right center',
						at:'left center' 
					}
				}).qtip('show');   
			}
			else clearInterval(formResponseInterval);
		},500);
	});
	
	$('.wpcf7').css('display','block');
	
	/**************************************************************************/
	
	$('.theme-table-responsive-on').responsiveTable();
});

/******************************************************************************/
/******************************************************************************/