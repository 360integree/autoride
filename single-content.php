<?php
		global $post,$autoride_ParentPost;
		
		$Validation=new Autoride_ThemeValidation();
		
		the_post();
		
		$Post=new Autoride_ThemePost();
		
		$postClass=array('theme-post','theme-clear-fix');
?>
		<div class="theme-post-single">

			<div <?php post_class(join(' ',$postClass)); ?> id="post-<?php the_ID(); ?>">
<?php
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostImage($post,false); // Data escaped ok
?>
				<div class="theme-clear-fix">
<?php
		echo Autoride_ThemePost::createPostShare($post,true,array('<div class="theme-post-layout-left">','</div>'));
?>
					<div class="theme-post-layout-right">
<?php
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostDate($post,true); // Data escaped ok
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostContent($post); // Data escaped ok
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostDivider($post); // Data escaped ok
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostMeta($post,true); // Data escaped ok
?>
					</div>
				
				</div>
			
			</div>
<?php
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostNavigation($post); // Data escaped ok
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostRelated($post); // Data escaped ok
		// This output has been safely escaped in the following file: class/Theme.Post.class.php
		echo Autoride_ThemePost::createPostComment($post); // Data escaped ok
?>
		</div>