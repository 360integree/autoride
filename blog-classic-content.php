<?php
		global $post,$autoride_ParentPost,$autoride_BlogAutomaticExcerptLength;

		$autoride_BlogAutomaticExcerptLength=1;
		
		$Blog=new Autoride_ThemeBlog();
		$Page=new Autoride_ThemePage();
		$Post=new Autoride_ThemePost();
		$Validation=new Autoride_ThemeValidation();

		$query=$Blog->getPost();
		
		if(count($query->posts))
		{
?>
		<div class="theme-blog theme-blog-classic theme-clear-fix">
			
			<ul class="theme-reset-list theme-clear-fix">
<?php
			while($query->have_posts())
			{
				$query->the_post();
				
				$class='theme-post theme-clear-fix ';
				
				if(is_sticky()) $class.=' sticky';
?>
				<li id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
<?php
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostImage($post); // Data escaped ok
?>
					<div class="theme-clear-fix">
<?php
				echo Autoride_ThemePost::createPostShare($post,true,array('<div class="theme-post-layout-left">','</div>'));
?>
						<div class="theme-post-layout-right">
<?php
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostDate($post); // Data escaped ok
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostTitle($post); // Data escaped ok
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostExcerpt($post); // Data escaped ok
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostDivider($post); // Data escaped ok
				// This output has been safely escaped in the following file: class/Theme.Post.class.php
				echo Autoride_ThemePost::createPostMeta($post); // Data escaped ok
?>
						</div>
					</div>
				</li>
<?php
			}
?>
			</ul>
<?php 
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
				if($Validation->isNotEmpty($html)) echo Autoride_ThemePlugin::doShortcode('Vc_Manager',$shortcode); // Data escaped ok
				else 
				{
?>
		<div class="theme-component-notice">
			<div class="theme-component-notice-icon">
				<span class="theme-icon-feature-error">
					<span></span>
				</span>
			</div>
			<div class="theme-component-notice-content">
				<h4><?php esc_html_e('Error','autoride'); ?></h4>
				<p><?php esc_html_e('Sorry, no posts where found. Try searching for something else.','autoride'); ?></p>
			</div>
		</div>				
<?php					
				}
			}
		}