"use strict";
/******************************************************************************/
/******************************************************************************/

jQuery(document).ready(function($) 
{	
    /**************************************************************************/
    
    $('.theme-component-gallery>ul').gallery();
    
    /**************************************************************************/
    
    $('.theme-component-testimonial-list.theme-component-testimonial-list-style-2>div').slick(
    {
        dots                                                                    :   true,
        arrows                                                                  :   false
    });
    
    /**************************************************************************/
    
    $('.theme-component-counter-box').each(function() 
    {
        var counterBox=$(this);
        
        var maxValue=0;
        counterBox.find('.theme-component-counter-box-item').each(function() 
		{
			var value=parseInt($(this).data('value'),10);
			if(maxValue<value) maxValue=value;
		});      
        
        counterBox.find('.theme-component-counter-box-item').each(function() 
        {
			new Waypoint(
			{
				offset                                                          :	'90%',
				element                                                         :	this,
				handler                                                         :	function() 
				{
                    var counterBoxItem=$(this.element);
                                      
                    if(counterBoxItem.hasClass('theme-state-complete')) return;
					counterBoxItem.addClass('theme-state-complete');

                    var value=counterBoxItem.children('span.theme-component-counter-box-item-value');
                    var interval=counterBox.data('animation_duration')/counterBoxItem.data('value');

					for(var i=0;i<counterBoxItem.data('value');i++)
					{
						window.setTimeout(function() 
						{
							value.html(parseInt(value.text(),10)+1);
						},interval*i,i);
					}
				}
			});            
        });        
    });
    
    /**************************************************************************/
   
    $('.theme-component-list').each(function()
    {
        $(this).find('li').each(function()
        {
            $(this).prepend('<span class="theme-icon-meta-tick-3"></span>');
        });
    });
   
    /**************************************************************************/
   
    $('.theme-component-testimonial-list.theme-component-testimonial-list-style-2').each(function() 
    {    
        var $self=$(this);
        
        $self.children('ul:first').carouFredSel(
        {
            circular                                                            :	$self.data('carousel_circular_enable'),
            inifinite                                                           :	$self.data('carousel_inifite_enable'),
            direction                                                           :	$self.data('carousel_direction'),
            responsive                                                          :	true,
            items                                                               :
            {
                start                                                           :	0,
                height                                                          :	'variable',
                visible                                                         :	1,
                minimum                                                         :	1
            },
            scroll                                                              :
            {
                fx                                                              :	$self.data('carousel_scroll_fx'),
                items                                                           :	1,
                easing                                                          :	$self.data('carousel_scroll_easing'),
                duration                                                        :	$self.data('carousel_scroll_duration'),
                pauseOnHover                                                    :	$self.data('carousel_scroll_pause_hover_enable')
            },
            auto                                                                :
            {
                play                                                            :	$self.data('carousel_auto_play_enable'),
                timeoutDuration                                                 :	$self.data('carousel_auto_play_timeout'),
            },
            swipe                                                               :
            {
                onTouch                                                         :	true,
                onMouse                                                         :	true
            },
            prev                                                                :
            {
                button                                                          :	$self.find('.theme-component-testimonial-list-navigation-left')
            },
            next                                                                :
            {
                button                                                          :	$self.find('.theme-component-testimonial-list-navigation-right')
            },
            onCreate                                                            :   function()
            {
                $().windowDimensionListener({change:function(width,height)
                {
                    if(width || height)
                    {
                        var maxHeight=0;
                        $self.find('ul>li').each(function()
                        {
                            $(this).css('height','auto');
                            var height=$(this).actual('height');
                            if(height>maxHeight) maxHeight=height;
                        });
                    
                        $.each([$self.find('ul>li'),$self.find('ul'),$self.find('>div.caroufredsel_wrapper')],function()
                        {
                            $(this).height(maxHeight);
                        });
                    }
                }});
            }
        });
	});
    
    /**************************************************************************/
    
    $('.theme-component-google-map').each(function() 
    {
        var helper=new Helper();
        
        var $this=$(this);
    
        var map=$this.children('.theme-component-google-map-map');
        var mapInner=map.children('div');

        mapInner.css({width:$this.data('width'),height:$this.data('height')});

        $this.parent('.wpb_wrapper').css('height','100%');
        $this.css({height:$this.data('height'),width:$this.data('width')});
        map.css({height:$this.data('height'),width:$this.data('width')});

        var $option=
        {
            map                                                                 :
            {	
                draggable                                                       :	$this.data('draggable_enable'),
                scrollwheel                                                     :	$this.data('scrollwheel_enable'),
                mapTypeId                                                       :	google.maps.MapTypeId[$this.data('map_type_id')],
                mapTypeControl                                                  :	$this.data('map_type_control_enable'),
                mapTypeControlOptions                                           :	
                {
                    style                                                       :	google.maps.MapTypeControlStyle[$this.data('map_type_control_style')],
                    position                                                    :	google.maps.ControlPosition[$this.data('map_type_control_position')],
                },
                zoom                                                            :	$this.data('zoom_level'),
                zoomControl                                                     :	$this.data('zoom_control_enable'),
                zoomControlOptions                                              :	
                {
                    style                                                       :	google.maps.ZoomControlStyle[$this.data('zoom_control_style')],
                    position                                                    :	google.maps.ControlPosition[$this.data('zoom_position')]
                },
                panControl                                                      :    $this.data('pan_control_enable'),
                panControlOptions                                               :
                {
                    position                                                    :    google.maps.ControlPosition[$this.data('pan_control_position')]            
                },
                scaleControl                                                    :    $this.data('scale_control_enable'),
                scaleControlOptions                                             :
                {
                    position                                                    :    google.maps.ControlPosition[$this.data('scale_control_position')]
                },
                streetViewControl                                               :    $this.data('street_view_enable'),
                streetViewControlOptions                                        :
                {
                    position                                                    :    google.maps.ControlPosition[$this.data('street_view_position')]
                }
            }
        };

        var coordinate=new google.maps.LatLng($this.data('coordinate_lat'),$this.data('coordinate_lng'));
        
        if((!helper.isEmpty($this.data('center_coordinate_lat'))) && (!helper.isEmpty($this.data('center_coordinate_lng'))))
        {
            var coordinateCenter=new google.maps.LatLng($this.data('center_coordinate_lat'),$this.data('center_coordinate_lng'));
            $option.map.center=coordinateCenter;
        }
        else $option.map.center=coordinate;

        var googleMap=new google.maps.Map(document.getElementById(mapInner.attr('id')),$option.map);

        if(new String(typeof(googleMapStyle))!=='undefined')
            googleMap.setOptions({styles:googleMapStyle[mapInner.attr('id')]});

        new google.maps.Marker({map:googleMap,position:coordinate,icon:$this.data('marker_url')});

        $(window).resize(function() 
        {
            var currCenter=googleMap.getCenter();
            google.maps.event.trigger(googleMap,'resize');
            googleMap.setCenter(currCenter);
        });
    });
    
    /**************************************************************************/

    $('.theme-component-feature-circle').each(function()
    {
        var $this=$(this);
        var circle=$(this).children('.theme-component-feature-circle-circle:eq(1)');
        
        var i=0;
        var count=circle.children('.theme-component-feature-circle-item').length;
        
        circle.children('.theme-component-feature-circle-item').each(function()
        {
            var degree=parseInt($this.data('item-first-radius'))+(360/count)*i;
            
            var itemWidth=$(this).actual('width');
            var itemHeight=$(this).actual('height');
            
            var label=$(this).children('.theme-component-feature-circle-item-label');
            var circle=$(this).children('.theme-component-feature-circle-item-circle');
            
            var circleRadius=circle.actual('width');
            
            $(this).attr('style','transform:rotate('+degree+'deg) translate(0,-255px) rotate('+(-1*degree)+'deg)');
            
            if(degree===0)
            {
                circle.before(label);
                $(this).css('margin-top',-1*itemHeight);
                $(this).css('margin-left',-1*itemWidth/2);
            }
            
            if((degree>0) && (degree<180))
            {
            }
            
            if(degree===180)
            {
                $(this).css('margin-left',-1*itemWidth/2);
            }
            
            if((degree>180) && (degree<360))
            {
                circle.before(label);
                $(this).css('margin-left',-1*itemWidth+(circleRadius/2));
            }

            $(this).addClass('theme-component-feature-circle-item-position-'+$(this).attr('data-label_position'));
            
            i++;
        });
    });
    
    /**************************************************************************/
    
    $('.theme-component-tab').each(function() 
    {
        var Helper=new Autoride_ThemeHelper();
        
        if(parseInt($(this).children('ul').length,10)===0)
        {
            var navigation=$('<ul></ul>').append($(this).find('>a'));
            var content=$(this).find('>div');

            $(this).html('').append(navigation).append(content);

            $(this).find('ul>a').wrap('<li></li>');
        }
        
        $(this).css('display','block');
        
        var option=
        {
            'active'                                                            :   (parseInt($(this).data('close_start'),10)===1 ? false : parseInt($(this).data('active'),10)),
            'collapsible'                                                       :   Helper.parseBool($(this).data('collapsible')),
            'heightStyle'                                                       :   $(this).data('height_style')                  
        };
        
        if(parseInt($(this).data('animation_open_enable'),10)===1)
        {
            option.show=
            {
                delay                                                           :   parseInt($(this).data('animation_open_delay'),10),
                easing                                                          :   $(this).data('animation_open_easing'),
                duration                                                        :   parseInt($(this).data('animation_open_duration'),10)
            };
        };
        
        if(parseInt($(this).data('animation_close_enable'),10)===1)
        {
            option.hide=
            {
                delay                                                           :   parseInt($(this).data('animation_close_delay'),10),
                easing                                                          :   $(this).data('animation_close_easing'),
                duration                                                        :   parseInt($(this).data('animation_close_duration'),10)
            };
        };
        
        $(this).tabs(option);
    });
    
    /**************************************************************************/
    
    $('.theme-component-counter-list').each(function()
    {
        var maxValue=0;
        var counterList=$(this);
        
        counterList.children('.theme-component-counter-list-item').each(function() 
		{
			var value=parseInt($(this).attr('data-value'),10);
			if(maxValue<value) maxValue=value;
		});   
     
        counterList.children('.theme-component-counter-list-item').each(function() 
        {
			new Waypoint(
			{
				offset                                                          :	'90%',
				element                                                         :	this,
				handler                                                         :	function() 
				{
                    var counterListItem=$(this.element);
                    
                    var value=parseInt(counterListItem.attr('data-value'),10);

                    var progressBar=counterListItem.find('div>div');

					var interval=(value/maxValue);
                    
					progressBar.animate({width:(interval*100)+'%'},{duration:parseInt(counterList.attr('data-animation_duration'),10),step:function(now,fx) 
					{
		
					}});
                }
            });
        });
    });
    
    /**************************************************************************/
    
    $().windowDimensionListener({change:function(width,height)
    {
        if(width || height)
        {
            var size=[[1220,1220],[960,940],[768,750],[480,460],[300,300]];
            
            $('.theme-component-gallery,.theme-component-tab,.theme-component-contact-form,.theme-component-counter-box,.theme-component-feature,.theme-component-call-to-action,.theme-component-process-list,.theme-component-feature-carousel,.theme-component-work-experience-list,.comment-form').each(function()
            {
                var width=$(this).parent().actual('width');
                
                for(var i in size)
                    $(this).removeClass('theme-width-'+size[i][0]);
                
                for(var i in size)
                {
                    if(width>=size[i][1] || i==4)
                    {
                        $(this).addClass('theme-width-'+size[i][0]);
                        break;
                    }
                }
                
                /***/
                
                var columnCount=parseInt($(this).find('>.vc_row>.vc_column_container').length,10);
                
                var process=
                [
                    ['theme-component-counter-box',235],
                    ['theme-component-feature',160],
                    ['theme-component-process-list',250]
                ];
                
                if(columnCount>0)
                {
                    var columnWidth=width/columnCount;
                    
                    for(var i in process)
                    {
                        if($(this).hasClass(process[i][0]))
                        {
                            if(columnWidth<process[i][1]) $(this).addClass('theme-mode-responsive');   
                            else $(this).removeClass('theme-mode-responsive');
                        }
                    }
                }
            });
        }
    }});

    /**************************************************************************/
});

/******************************************************************************/
/******************************************************************************/