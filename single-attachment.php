<?php 
		get_header(); 
		
		global $post,$autoride_ParentPost;
		
		$Validation=new Autoride_ThemeValidation();
		
		the_post();
		
		$image=wp_get_attachment_image(get_the_ID(),'full');
?>
		<div class="theme-post-attachment">
<?php
		if($Validation->isNotEmpty($image))
		{
?>
			<div class="theme-post-attachment-image">
				<?php echo wp_get_attachment_image(get_the_ID(),'full'); ?>
			</div>
<?php			
		}
		else
		{
?>
			<div class="theme-post-attachment-none">
<?php
				$shortcode='[vc_autoride_theme_notice icon="check" header_text="'.__('Download','autoride').'" subheader_text="'.sprintf(__('<a href=\'%s\'>Click</a> to download a file.','autoride'),wp_get_attachment_url(get_the_ID())).'"]';
				
				$html=Autoride_ThemePlugin::doShortcode('ARCAutorideCore',$shortcode);
				
				if($Validation->isNotEmpty($html)) echo Autoride_ThemePlugin::doShortcode('ARCAutorideCore',$shortcode);
?>
			</div>
<?php
		}
?>
		</div>
<?php
		get_footer(); 