<?php 
		$id=(int)Autoride_ThemeOption::getOption('page_404_page_id');
		
		if($id<=0)
		{
			get_header();
?>
			<div class="aligncenter">	
				<h3><?php esc_html_e('Error 404. Page Not Found.','autoride') ?></h3>  
				<p><?php esc_html_e('The page are you looking for can not be found.','autoride'); ?></p>
				<div class="theme-component-button theme-component-button-style-1 aligncenter theme-margin-top-40">
					<a href="<?php echo esc_url(get_home_url()); ?>" target="_self"><?php esc_html_e('Back To Home','autoride'); ?></a>
				</div>
			</div>
<?php			
			get_footer();
		}
		else
		{
			$url=get_the_permalink($id);
			
			if($url===false) wp_redirect(get_home_url());
			else wp_redirect($url);
		}