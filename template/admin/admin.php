
		<div class="to to-to">

			<div id="to_notice"></div> 
			
			<form name="to_form" id="to_form" method="POST" action="#">
<?php
		wp_nonce_field('adminOptionPanelSave','autoride_option_noncename');
?>
				<div class="to-header to-clear-fix">

					<div class="to-header-left">

						<div>
							<h3>QuanticaLabs</h3>
							<h6><?php esc_html_e('Theme Options','autoride'); ?></h6>
						</div>

					</div>

					<div class="to-header-right">

						<div>
							<h3>AutoRide - Chauffeur Booking</h3>
							<h6>Wordpress Theme ver. <?php echo AUTORIDE_THEME_VERSION; ?></h6>&nbsp;&nbsp;
							<a href="http://support.quanticalabs.com" target="_blank">Support Forum</a>
							<a href="#" target="_blank"><?php esc_html_e('Theme site','autoride'); ?></a>
						</div>

						<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

					</div>

				</div>

				<div class="to-content to-clear-fix">

					<div class="to-content-left">

						<ul class="to-menu" id="to_menu">

							<li>
								<a href="#general_setting"><?php esc_html_e('General settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#general_blog"><?php esc_html_e('Blog','autoride'); ?></a></li>
									<li><a href="#general_page"><?php esc_html_e('Page','autoride'); ?></a></li>
									<li><a href="#general_logo"><?php esc_html_e('Logo','autoride'); ?></a></li>
									<li><a href="#general_color"><?php esc_html_e('Colors','autoride'); ?></a></li>
									<li><a href="#general_comment"><?php esc_html_e('Comments','autoride'); ?></a></li>
									<li><a href="#general_social_profile"><?php esc_html_e('Social profiles','autoride'); ?></a></li>
									<li><a href="#general_custom_js_code"><?php esc_html_e('Custom JS code','autoride'); ?></a></li>
									<li><a href="#general_content_copying"><?php esc_html_e('Content copying','autoride'); ?></a></li>
									<li><a href="#general_go_top_top"><?php esc_html_e('Go to top of page','autoride'); ?></a></li>
								</ul>				
							</li>
							<li>
								<a href="#post_setting"><?php esc_html_e('Post settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#post_header"><?php esc_html_e('Header','autoride'); ?></a></li>
									<li><a href="#post_content"><?php esc_html_e('Content','autoride'); ?></a></li>
									<li><a href="#post_footer"><?php esc_html_e('Footer','autoride'); ?></a></li>
									<li><a href="#post_element"><?php esc_html_e('Elements','autoride'); ?></a></li>
								</ul>
							</li>	
							<li>
								<a href="#page_setting"><?php esc_html_e('Page settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#page_header"><?php esc_html_e('Header','autoride'); ?></a></li>
									<li><a href="#page_content"><?php esc_html_e('Content','autoride'); ?></a></li>
									<li><a href="#page_footer"><?php esc_html_e('Footer','autoride'); ?></a></li>
								</ul>
							</li>
<?php
		if(Autoride_ThemePlugin::isActive('wooCommerce'))
		{
?>
							<li>
								<a href="#woocommerce_product_setting"><?php esc_html_e('Product settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#woocommerce_product_header"><?php esc_html_e('Header','autoride'); ?></a></li>
									<li><a href="#woocommerce_product_content"><?php esc_html_e('Content','autoride'); ?></a></li>
									<li><a href="#woocommerce_product_footer"><?php esc_html_e('Footer','autoride'); ?></a></li>
								</ul>
							</li>				
<?php		  
		}
?>  
							<li>
								<a href="#vehicle_post_setting"><?php esc_html_e('Vehicle post settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#vehicle_post_header"><?php esc_html_e('Header','autoride'); ?></a></li>
									<li><a href="#vehicle_post_content"><?php esc_html_e('Content','autoride'); ?></a></li>
									<li><a href="#vehicle_post_footer"><?php esc_html_e('Footer','autoride'); ?></a></li>
								</ul>
							</li>
							<li>
								<a href="#plugin_setting" class="to-menu-plugin"><?php esc_html_e('Plugins settings','autoride'); ?><span></span></a>
								<ul>
									<li><a href="#plugin_maintenance_mode"><?php esc_html_e('Maintenance mode','autoride'); ?></a></li>
									<li><a href="#plugin_fancybox_image"><?php esc_html_e('Fancybox for images','autoride'); ?></a></li>
								</ul>
							</li>	
							<li>
								<a href="#custom_css" class="to-menu-css"><?php esc_html_e('Custom CSS','autoride'); ?><span></span></a>
							</li>
						</ul>

					</div>

					<div class="to-content-right" id="to_panel">
<?php
		$content=array
		(
			array('general_blog'),
			array('general_page'),
			array('general_logo'),
			array('general_color'),
			array('general_comment'),
			array('general_social_profile'),
			array('general_custom_js_code'),
			array('general_content_copying'),
			array('general_go_top_top'),
			array('post_header'),
			array('post_content'),
			array('post_footer'),
			array('post_element'),
			array('page_header'),
			array('page_content'),
			array('page_footer'),
			array('vehicle_post_header'),
			array('vehicle_post_content'),
			array('vehicle_post_footer'),
			array('plugin_maintenance_mode'),
			array('plugin_fancybox_image'),
			array('custom_css')
		);
		
		if(Autoride_ThemePlugin::isActive('wooCommerce'))
			array_push($content,array('woocommerce_product_header'),array('woocommerce_product_content'),array('woocommerce_product_footer'));

		foreach($content as $value)
		{
?>
						<div id="<?php echo esc_attr($value[0]); ?>">
<?php
			echo Autoride_ThemeTemplate::outputS($this->data,AUTORIDE_THEME_PATH_TEMPLATE.'admin/'.$value[0].'.php',false); // Data escaped ok
?>
						</div>
<?php
		}
?>
					</div>

				</div>

				<div class="to-footer to-clear-fix">

					<div class="to-footer-left">

						<ul class="to-social-list">
							<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="to-social-list-envato" title="Envato"></a></li>
							<li><a href="http://www.facebook.com/QuanticaLabs" class="to-social-list-facebook" title="Facebook"></a></li>
							<li><a href="https://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
							<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
						</ul>

					</div>

					<div class="to-footer-right">
						<input type="submit" value="<?php esc_attr_e('Save changes','autoride'); ?>" name="Submit" id="Submit" class="to-button"/>
					</div>			

				</div>

				<input type="hidden" name="action" id="action" value="theme_admin_option_page_save" />

			</form>
			
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				$('.to').themeOption();
				var element=$('.to').themeOptionElement({init:true});
				element.bindBrowseMedia('.to-button-browse');
			});
		</script>