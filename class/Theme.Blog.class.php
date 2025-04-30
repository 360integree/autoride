<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeBlog
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->sortPostBlogField=array
		(
			'post_id'=>array(__('Post ID','autoride')),
			'post_date'=>array(__('Post date','autoride')),
			'title'=>array(__('Post title','autoride'))
		);

		$this->sortDirection=array
		(
			'asc'=>array(__('Ascending','autoride')),
			'desc'=>array(__('Descending','autoride'))
		);		
	}
	
	/**************************************************************************/	
	
	function automaticExcerptLength()
	{
		global $post,$autoride_BlogAutomaticExcerptLength;
		
		$length=55;
		
		switch($post->post_type)
		{
			case 'post':
				
				$length=Autoride_ThemeOption::getOption('blog_automatic_excerpt_length_'.$autoride_BlogAutomaticExcerptLength);
				
			break;
		}
		
		return($length);
	}
	
	/**************************************************************************/
	
	function filterExcerptMore()
	{
		return(esc_html__(' [...]','autoride'));
	}
	
	/**************************************************************************/
	
	function getPost()
	{
		$Validation=new Autoride_ThemeValidation();
		
		$argument=array();
		
		$s=get_query_var('s');
		$tag=get_query_var('tag');
		$day=(int)get_query_var('day');
		$year=(int)get_query_var('year');
		$month=(int)get_query_var('monthnum');
		$categoryId=(int)get_query_var('cat');
		$authorId=(int)get_query_var('author');
		
		if($Validation->isNotEmpty($s))
			$argument['s']=$s;
		if($Validation->isNotEmpty($tag))
			$argument['tag']=$tag;
		if($categoryId>0)
			$argument['cat']=(int)$categoryId;
		if($authorId>0)
			$argument['author']=(int)$authorId;
		if($year>0)
			$argument['year']=$year;
		if($month>0)
			$argument['monthnum']=$month;
		if($day>0)
			$argument['day']=$day;
			
		$default=array
		(
			'post_type'=>'post',
			'post_status'=>'publish',
			'posts_per_page'=>(int)get_option('posts_per_page'),
			'paged'=>(int)Autoride_ThemeHelper::getPageNumber(),
			'orderby'=>Autoride_ThemeOption::getOption('blog_sort_field'),
			'order'=>Autoride_ThemeOption::getOption('blog_sort_direction')
		);
		
		$query=new WP_Query(array_merge($argument,$default));
		return($query);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/