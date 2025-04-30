<?php 
		get_header(); 

		global $post,$autoride_ParentPost;
		
		the_post();
		
		$Post=new Autoride_ThemePost();
		
		$postClass=array('theme-post','theme-clear-fix');
?>
		<div class="theme-post-vehicle">

			<div <?php post_class(join(' ',$postClass)); ?> id="post-<?php the_ID(); ?>">
<?php
		if(has_post_thumbnail($post))
		{
?>
				<div class="theme-post-image">
					<?php echo get_the_post_thumbnail($post->ID,PLUGIN_CHBS_CONTEXT.'_vehicle_2'); ?>
				</div>
<?php
			$meta=CHBSPostMeta::getPostMeta($post);
			
			$image=array();
			$imageId=$meta['gallery_image_id'];
			
			foreach($imageId as $index=>$value)
			{
				if(wp_attachment_is_image($value))
					$image[]=array(wp_get_attachment_image_src($value,'thumbnail'),wp_get_attachment_image_src($value,'full'),get_the_title($value));
			}

			if(count($image))
			{
?>
				<div class="theme-post-gallery">
					<div class="theme-post-gallery-carousel">
<?php
				foreach($image as $index=>$value)
				{
?>
						<div><img src="<?php echo esc_url($value[0][0]); ?>" alt="<?php echo esc_attr($value[2]); ?>" data-image-full-src="<?php echo esc_url($value[1][0]); ?>"></div>
<?php
				}
?>
					</div>
				</div>
<?php			  
			}
		}
?>
				<div class="theme-clear-fix">

					<div class="theme-post-layout-left">
						<?php // This output has been safely escaped in the following file: class/Theme.Post.class.php ?>
						<?php echo Autoride_ThemePost::createPostShare($post,false); // Data escaped ok ?>
					</div>

					<div class="theme-post-layout-right">
						<?php // This output has been safely escaped in the following file: class/Theme.Post.class.php ?>
						<?php echo Autoride_ThemePost::createPostContent($post,false); // Data escaped ok ?>
					</div>
				
				</div>
			
			</div>

		</div>
<?php   
		get_footer(); 