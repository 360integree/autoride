<?php
		global $post,$autoride_ParentPost,$autoride_Sidebar,$autoride_BlogAutomaticExcerptLength;

		$autoride_BlogAutomaticExcerptLength=2;
		
		$Blog=new Autoride_ThemeBlog();
		$Page=new Autoride_ThemePage();
		$Post=new Autoride_ThemePost();
		$Validation=new Autoride_ThemeValidation();

		$query=$Blog->getPost();
		
		$columnCount=$autoride_Sidebar ? 2 : 3;
		
		if(count($query->posts))
		{
			$html=null;
?>
		<div class="theme-blog theme-blog-column theme-clear-fix">
<?php
			$i=0;

			while($query->have_posts())
			{
				$i++;
				
				$query->the_post();
				
				$class='theme-post theme-clear-fix ';
				
				if(is_sticky()) $class.=' sticky';
				
				$postClass=get_post_class($class);
				
				$html.=
				'
					[vc_column width="1/'.$columnCount.'"]
						<div id="post-'.esc_attr(get_the_ID()).'" class="'.esc_attr(join(' ',$postClass)).'">
							'.Autoride_ThemePost::createPostImage($post).'
							<div class="theme-clear-fix">
								<div class="theme-post-layout-right">
									'.Autoride_ThemePost::createPostDate($post).'
									'.Autoride_ThemePost::createPostTitle($post,true,4).'
									'.Autoride_ThemePost::createPostExcerpt($post).'
									'.Autoride_ThemePost::createPostDivider($post).'
									'.Autoride_ThemePost::createPostMeta($post).'
								</div>
							</div>
						</div>
					[/vc_column]
				';
				
				if($i%($columnCount)===0)
				{
					echo do_shortcode('[vc_row]'.$html.'[/vc_row]');
					$i=0;
					$html=null;
				}
			}
			
			if($i!=0)
				echo do_shortcode('[vc_row]'.$html.'[/vc_row]');
				
			echo Autoride_ThemeHelper::createPagination($query);
?>
		</div>
<?php
		}
		else
		{
			if(is_search())
			{
				$Validation=new Autoride_ThemeValidation();
				
				$shortcode='[vc_autoride_theme_notice icon="error" header_text="'.__('Error','autoride').'" subheader_text="'.__('Sorry, no posts where found. Try searching for something else.','autoride').'"]';
				
				$html=Autoride_ThemePlugin::doShortcode('Vc_Manager',$shortcode);
  
				// This output has been safely escaped in the following file: plugins/autoride-code/vc/element/vc_theme_notice.php
				if($Validation->isNotEmpty($html)) echo Autoride_ThemePlugin::doShortcode('Vc_Manager',$shortcode);
				else esc_html_e('Sorry, no posts where found. Try searching for something else.','autoride');
			}
		}