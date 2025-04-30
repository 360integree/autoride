<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemePost
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->element=array
		(
			'image'=>array(__('Image','autoride'),__('image','autoride')),
			'share'=>array(__('Share section','autoride'),__('share section','autoride')),
			'date'=>array(__('Date','autoride'),__('date','autoride')),
			'title'=>array(__('Title','autoride'),__('title','autoride')),
			'excerpt'=>array(__('Excerpt','autoride'),__('excerpt','autoride')),
			'content'=>array(__('Content','autoride'),__('content','autoride')),
			'divider'=>array(__('Divider','autoride'),__('divider','autoride')),
			'meta'=>array(__('Meta','autoride'),__('meta','autoride')),
			'post_navigation'=>array(__('Post navigation','autoride'),__('post navigation','autoride')),
			'post_related'=>array(__('Posts related','autoride'),__('posts related','autoride'))
		);
	}
	 
	/**************************************************************************/
	
	function adminInitMetaBox()
	{

	}
	
	/**************************************************************************/

	function adminCreateMetaBoxPostHeader()
	{
 		global $post;

		$Templatica=new Autoride_ThemeTemplatica();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['template']=$Templatica->getDictionary(true,true,false);
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_post_header.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_post_header.php'); // Data escaped ok	   
	}
	
	/**************************************************************************/
	
 	function adminCreateMetaBoxPostContent()
	{
 		global $post;

		$WidgetArea=new Autoride_ThemeWidgetArea();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['post_element']=$this->element;
		
		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widget_area_location']=$WidgetArea->getWidgetAreaLocationDictionary();
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_post_content.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_post_content.php'); // Data escaped ok	 
	}

	/**************************************************************************/
	
 	function adminCreateMetaBoxPostFooter()
	{
		global $post;

		$WidgetArea=new Autoride_ThemeWidgetArea();
		$Templatica=new Autoride_ThemeTemplatica();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
				
		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['template']=$Templatica->getDictionary();
		
		$data['dictionary']['widget_area_template']=Autoride_ThemeHelper::createWidgetAreaTeampleDictionary($data['dictionary']['widget_area'],$data['dictionary']['template']);
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_post_footer.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_post_footer.php'); // Data escaped ok	 	
	}
	
	/**************************************************************************/
	
 	function adminCreateMetaBoxPostElement()
	{
 		global $post;

		$WidgetArea=new Autoride_ThemeWidgetArea();
		
		$data=array();
		
		$data['option']=Autoride_ThemeOption::getPostMeta($post);
		
		$data['dictionary']['post_element']=$this->element;
		
		$data['dictionary']['widget_area']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widget_area_location']=$WidgetArea->getWidgetAreaLocationDictionary();
		
		$this->setPostMetaDefault($data['option']);
		
		// This output has been safely escaped in the following file: admin/meta_box_post_element.php
		echo Autoride_ThemeTemplate::outputS($data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/meta_box_post_element.php'); // Data escaped ok		
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxClass($class) 
	{
		array_push($class,'to-postbox-1');
		return($class);
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta)
	{
		Autoride_ThemeHelper::setDefaultOption($meta,'post_header_top_template_id','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_header_middle_template_id','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_header_bottom_template_id','-1');
		
		/***/
		
		Autoride_ThemeHelper::setDefaultOption($meta,'post_widget_area_sidebar','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_widget_area_sidebar_location','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_class','');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_background_color','');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_margin_top','');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_margin_bottom','');
		
		/***/
		
		Autoride_ThemeHelper::setDefaultOption($meta,'post_footer_top_widget_area_template','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_footer_middle_widget_area_template','-1');
		Autoride_ThemeHelper::setDefaultOption($meta,'post_footer_bottom_widget_area_template','-1');
		
		/***/
		
		foreach($this->element as $index=>$value)
			Autoride_ThemeHelper::setDefaultOption($meta,'post_'.$index.'_enable','-1');
	}

	/**************************************************************************/

	function getPostMostComment($argument)
	{
		$parameter=array
		(
			'post_type'														 =>	'post',
			'posts_per_page'													=>	(int)$argument['post_count'],
			'meta_query'														=>	array(array('key'=>'_thumbnail_id')),
			'orderby'														   =>	'comment_count',
			'order'															 =>	'desc'
		);
		
		$query=new WP_Query($parameter);
		return($query);
	}
	
	/**************************************************************************/
	
	function getPostRecent($argument)
	{
		$parameter=array
		(
			'post_type'														 =>	'post',
			'posts_per_page'													=>	(int)$argument['post_count'],
			'meta_query'														=>	array(array('key'=>'_thumbnail_id')),
			'orderby'														   =>	'date',
			'order'															 =>	'desc'
		);

		$query=new WP_Query($parameter);
		return($query);
	}	

	/**************************************************************************/
	
	static function hasPostImage($post)
	{
		if(Autoride_ThemeOption::getGlobalOption($post,'image_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return(false);
		if(!has_post_thumbnail($post)) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	static function createPostImage($post,$linkToSinglePost=true)
	{
		$html=null;
		
		if(post_password_required($post)) return($html);
		if(!self::hasPostImage($post)) return($html);
		
		$html=get_the_post_thumbnail($post->ID);
		
		if($linkToSinglePost)
		{
			$html=
			'
				<a href="'.esc_url(get_the_permalink($post)).'" title="'.esc_attr(sprintf(__('View post "%s".','autoride'),strip_tags(get_the_title($post)))).'">
					'.$html.'
				</a>
			';
		}
		else 
		{
			$html=
			'
				<a href="'.esc_url(get_the_post_thumbnail_url($post->ID,'full')).'" class="theme-image-fancybox">
					'.$html.'
				</a>
			';			
		}
		
		$html=
		'
			<div class="theme-post-image">
				'.$html.'
			</div>
		';
		
		return($html);
	}

	/**************************************************************************/
	
	static function createPostShare($post,$checkEnable=true,$wrapper=array())
	{
		$html=null;
		
		if(!Autoride_ThemePlugin::isActive('ARCAutorideCore')) return($html);
		
		if(($checkEnable) && (Autoride_ThemeOption::getGlobalOption($post,'share_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1)) return($html);
		
		$shortcode=null;
		
		$shortcode.='[vc_autoride_theme_social_profile_list_item name="facebook" url="'.self::createFacebookShareURL($post).'"]';
		$shortcode.='[vc_autoride_theme_social_profile_list_item name="twitter" url="'.self::createTwitterShareURL($post).'"]';
		$shortcode.='[vc_autoride_theme_social_profile_list_item name="pinterest" url="'.self::createPinterestShareURL($post).'"]';
		
		$shortcode='[vc_autoride_theme_social_profile_list style="2"]'.$shortcode.'[/vc_autoride_theme_social_profile_list]';
		
		$html=
		'
			<div class="theme-post-share">
				<span>'.esc_html__('Share','autoride').'</span>
				'.do_shortcode($shortcode).'
			</div>
		';
		
		if(count($wrapper))
			$html=$wrapper[0].$html.$wrapper[1];
		
		return($html);
	}
	
	/**************************************************************************/
	
	static function createPostDate($post,$singlePost=false)
	{
		$html=null;
		
		if(Autoride_ThemeOption::getGlobalOption($post,'date_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return($html);
		
		$html=get_the_date(get_option('date_format'),$post->ID);
		
		if(!$singlePost)
			$html='<a href="'.esc_url(get_the_permalink($post)).'">'.$html.'</a>';
		
		$html=
		'
			<div class="theme-post-date">
				'.$html.'
			</div>
		';
		
		return($html);		
	}
	
	/**************************************************************************/
	
	static function createPostTitle($post,$linkToSinglePost=true,$headerImportance=3)
	{
		$html=null;
		
		if(Autoride_ThemeOption::getGlobalOption($post,'title_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return($html);
		
		$html=get_the_title($post->ID);
		
		if($linkToSinglePost) $html='<a href="'.esc_url(get_permalink($post->ID)).'">'.$html.'</a>';
		
		$html=
		'
			<div class="theme-post-title">
				<h'.$headerImportance.'>'.$html.'</h'.$headerImportance.'>
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	static function createPostExcerpt($post)
	{
 		$html=null;
		
		if(post_password_required($post)) return($html);
		if(Autoride_ThemeOption::getGlobalOption($post,'excerpt_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return(null);
		
		$html=
		'
			<div class="theme-post-excerpt">
				'.self::getExcerpt().'
			</div>
		';
		
		return($html);	   
	}
	
	/**************************************************************************/
	
	static function createPostContent($post,$checkEnable=true)
	{
		$html=null;
		
		if(($checkEnable) && (Autoride_ThemeOption::getGlobalOption($post,'content_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1)) return(null);
		
		$content=apply_filters('the_content',do_shortcode(get_the_content($post)));
		
		$attribute=array
		(
			'before'=>'',
			'after'=>'',
			'next_or_number'=>'number',
			'previouspagelink'=>__('Previous','autoride'),
			'nextpagelink'=>__('Next','autoride'),
			'link_before'=>'<span>',
			'link_after'=>'</span>',
			'echo'=>0
		);
		
		$html=
		'
			<div class="theme-post-content theme-clear-fix">'.$content.'</div>
			<div class="theme-pagination theme-clear-fix">
				'.wp_link_pages($attribute).'
			</div>
		';

		return($html);		
	}

	/**************************************************************************/
	
	static function createPostDivider($post)
	{
		$html=null;
		
		if(Autoride_ThemeOption::getGlobalOption($post,'divider_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return(null);
		
		$html='<div class="theme-post-divider theme-clear-fix"></div>';
		
		return($html);
	}   
	
	/**************************************************************************/
	
	static function createPostMeta($post,$singlePost=false)
	{
		$html=null;
			
		$Validation=new Autoride_ThemeValidation();
		
		if(post_password_required($post)) return(null);
		if(Autoride_ThemeOption::getGlobalOption($post,'meta_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return($html);
		
		/***/
		
		$tagHtml=null;
		$authorHtml=null;
		$categoryHtml=null;
		$commentCountHtml=null;
		
		/***/
		
		$authorHtml='<span class="theme-post-meta-author"><span class="theme-icon-meta-user"></span>&nbsp;<a href="'.esc_url(get_author_posts_url($post->post_author)).'" title="'.esc_attr(sprintf(__('View all posts from author "%s".','autoride'),get_the_author_meta('display_name',$post->user_id))).'">'.get_the_author_meta('display_name',$post->user_id).'</a></span>';
		$html.=$authorHtml;
		
		/***/
		
		$category=get_the_category($post->ID);
		foreach($category as $categoryValue)
		{
			if($categoryValue->term_id==1) continue;

			$title=$Validation->isEmpty($categoryValue->description) ? sprintf(__('View all posts from category "%s".','autoride'),$categoryValue->name) : strip_tags(apply_filters('category_description',$categoryValue->description,$categoryValue));

			if($Validation->isNotEmpty($categoryHtml)) $categoryHtml.=', ';
			
			$categoryHtml.='<a href="'.esc_url(get_category_link($categoryValue->term_id)).'" title="'.esc_attr($title).'">'.esc_html($categoryValue->name).'</a>';
		}   
		
		if($Validation->isNotEmpty($categoryHtml)) 
		{
			if($Validation->isNotEmpty($html)) $html.='&nbsp;&nbsp;/&nbsp;&nbsp;';
			$html.=$categoryHtml;
		}
		
		/***/
		
		$commentCount=self::getCommentCount($post);
		
		if($commentCount>0)
		{
			$commentCountHtml=esc_html__('Comments: ','autoride').'<a href="'.esc_url(get_the_permalink($post->ID)).'#comments">'.$commentCount.'</a>';
			if($Validation->isNotEmpty($html)) $html.='&nbsp;&nbsp;/&nbsp;&nbsp;';
			$html.=$commentCountHtml;
		}
			
		/***/
		
		if($singlePost)
		{
			$tag=get_the_tags($post->ID);
			if($tag)
			{	 
				$i=0;
				foreach($tag as $value)
				{
					$i++;

					$tagHtml.=
					'
						<li><a href="'.esc_url(get_tag_link($value->term_id)).'" title="'.esc_attr(sprintf(__('View all posts marked as "%s".','autoride'),$value->name)).'">'.esc_html($value->name).'</a>'.($i==count($tag) ? '' : ', ').'</li>
					';
				}

				$tagHtml=
				'	
					<div class="theme-post-meta-tag">
						<span class="theme-icon-meta-tag"></span>
						<ul class="theme-reset-list">
							'.$tagHtml.'
						</ul>
					</div>
				';		

				if($Validation->isNotEmpty($html)) $html.='&nbsp;&nbsp;/&nbsp;&nbsp;';
				$html.=$tagHtml;
			}
		}
		
		/***/
		
		$html=
		'
			<div class="theme-post-meta">
				'.$html.'
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	static function createPostRelated()
	{
		global $post;
		
		$html=null;
			
		if(post_password_required($post)) return(null);
		if(Autoride_ThemeOption::getGlobalOption($post,'post_related_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return($html);

		if(!Autoride_ThemePlugin::isActive('Vc_Manager')) return($html);
		
		$argument=array
		(
			'post_type'=>'post',
			'posts_per_page'=>3,
			'post__not_in'=>array($post->ID),
			'orderby'=>'date',
			'order'=>'desc',
			'meta_query'=>array(array('key'=>'_thumbnail_id')),
			'tag__in'=>wp_get_post_tags($post->ID,array('fields'=>'ids'))
		);

		$query=new WP_Query($argument);

		if(!$query) return($html);
		if(!count($query->posts)) return($html);
		
		$i=0;
		$bPost=$post;

		while($query->have_posts())
		{
			$query->the_post();

			if(!has_post_thumbnail()) continue;
			
			$url=esc_url(get_the_permalink());
			
			$title=get_the_title($post->ID);
			$titleAttr=sprintf(__('View post "%s".','autoride'),get_the_title($post->ID));
	
			$html.=
			'
				[vc_column width="1/3"]
					<div class="theme-post">
						<div class="theme-post-image">
							<a href="'.esc_url($url).'" title="'.$titleAttr.'">
								'.get_the_post_thumbnail(get_the_ID()).'
							</a>
						</div>
						<div class="theme-post-layout-right">
							<div class="theme-post-date">
								'.get_the_date('',$post->ID).'
							</div>
							<div class="theme-post-title">
								<h4>
									<a href="'.esc_url($url).'" title="'.esc_attr($titleAttr).'" class="theme-post-title">
										'.$title.'
									</a>
								</h4>
							</div>
						</div>
					</div>
				[/vc_column]
			';

			$i++;
		}
			 
		$post=$bPost;

		$html=
		'
			<div class="theme-post-related theme-clear-fix">
				<h4>'.esc_html__('Related posts','autoride').'</h4>
				'.do_shortcode('[vc_row]'.$html.'[/vc_row]').'
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	static function createPostNavigation($post)
	{
 		$html=null;
		
		if(post_password_required($post)) return($html);
		
		if(Autoride_ThemeOption::getGlobalOption($post,'post_navigation_enable',Autoride_ThemeOption::getOptionPrefix($post))!=1) return($html);	
		
		$Validation=new Autoride_ThemeValidation();
		
		$prevPost=get_previous_post();
		if(!empty($prevPost)) 
			$html.='<a class="theme-post-navigation-prev" href="'.esc_url(get_permalink($prevPost->ID)).'" title="'.the_title_attribute(array('post'=>$prevPost->ID,'echo'=>false)).'"><span class="theme-icon-meta-arrow-horizontal-3"></span><span>'.esc_html(get_the_title($prevPost->ID)).'</span></a>';
		
		$nextPost=get_next_post();
		if(!empty($nextPost)) 
			$html.='<a class="theme-post-navigation-next" href="'.esc_url(get_permalink($nextPost->ID)).'" title="'.the_title_attribute(array('post'=>$nextPost->ID,'echo'=>false)).'"><span>'.esc_html(get_the_title($nextPost->ID)).'</span><span class="theme-icon-meta-arrow-horizontal-3"></span></a>';		
			
		if($Validation->isNotEmpty($html))
		{
			$html=
			'
				<div class="theme-post-navigation theme-clear-fix">
					'.$html.'
				</div>				
			';
		}	
		
		return($html);		   
	}
	
	/**************************************************************************/
	
	static function createPostComment()
	{		
		if(post_password_required()) return(null);
		get_template_part('comment');
	}
	
	/**************************************************************************/

	function getPost()
	{
		$data=new stdClass();

		global $post,$wp_query;
		
		$categoryId=(int)get_query_var('cat');

		if((function_exists('is_woocommerce')) && (is_woocommerce()))
		{
			if(is_shop())
			{
				$data->post=get_post(get_option('woocommerce_shop_page_id'));
			}
			elseif(is_product())
			{
				$data->post=$post;
			}
			elseif((is_product_category()) || (is_product_tag()))
			{
				$data->post->post_title=esc_html($wp_query->queried_object->name);	
			}
			elseif(is_search())
			{
				$data->post->post_title=sprintf(__('Search products for phrase <i>%s</i>','autoride'),esc_html(get_query_var('s')));
			}
			
			setup_postdata($data->post);
		}
		else
		{
			if(is_home())
			{
				$data=new stdClass();
				$data->post=new stdClass();
				$data->post->post_title=__('Latest posts','autoride');
			}
			elseif(is_tag()) 
			{
				$post=get_post(Autoride_ThemeOption::getOption('blog_category_post_id'));
				if(is_null($post)) return(false);

				$tagQuery=get_query_var('tag');
				$tagData=get_tags(array('slug'=>$tagQuery));

				$data->post=$post;
				$data->post->post_title=$tagData[0]->name;
			}
			elseif(is_author())
			{
				$author=get_userdata(get_query_var('author'));
				$post=get_post(Autoride_ThemeOption::getOption('blog_author_post_id'));
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=get_the_author_meta('display_name',$author->data->ID);			
			}
			elseif(is_category($categoryId)) 
			{			
				$category=get_category($categoryId);
				$post=get_post(Autoride_ThemeOption::getOption('blog_category_post_id'));	
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=esc_html($category->name);	
			}
			elseif(is_day()) 
			{
				$post=get_post(Autoride_ThemeOption::getOption('blog_archive_post_id'));
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=get_the_date();
			}
			elseif(is_archive()) 
			{
				$post=get_post(Autoride_ThemeOption::getOption('blog_archive_post_id'));
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=single_month_title(' ',false);
			}
			elseif(is_search())
			{
				$post=get_post(Autoride_ThemeOption::getOption('blog_search_post_id'));
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=sprintf(__('Search Result for "%s"','autoride'),get_query_var('s'));
			}
			elseif(is_404())
			{
				$post=get_post(Autoride_ThemeOption::getOption('post_404_post_id'));
				if(is_null($post)) return(false);

				$data->post=$post;
				$data->post->post_title=$data->post->post_title;
			}
			else return(false);
		}

		return($data);
	}
	
	/**************************************************************************/
	
	static function getCommentCount($post)
	{
		if(!comments_open($post->ID)) return(false);
		return((int)get_comments_number($post->ID));
	}
	
	/**************************************************************************/

	static function createTwitterShareURL($post)
	{
		$postTile=get_the_title($post->ID);
		$postURL=get_the_permalink($post->ID);
		
		$twitterStatus=mb_substr($postTile,0,139-mb_strlen($postURL)).' '.$postURL;		
	
		return('https://twitter.com/home?status='.urlencode($twitterStatus));
	}
	
	/**************************************************************************/
	
	static function createFacebookShareURL($post)
	{
		return('https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink($post->ID)));
	}
	
	/**************************************************************************/
	
	static function createPinterestShareURL($post)
	{
		if(!has_post_thumbnail($post->ID)) return(null);
		
		return('https://pinterest.com/pin/create/button/?url='.esc_url(get_the_permalink($post->ID)).'&amp;media='.esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID))).'&amp;description='.urlencode(strip_tags(Autoride_ThemeHelper::getTheExcerpt($post->ID))));
	}
	
	/**************************************************************************/
	
	static function getExcerpt()
	{
		ob_start();
		the_excerpt();
		$content=ob_get_clean();
		return($content);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/