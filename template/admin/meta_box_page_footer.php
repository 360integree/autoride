<?php 
		echo wp_nonce_field('adminSaveMetaBox','autoride_meta_box_noncename',false,false);
?>  
		<div class="to">
			<div class="ui-tabs">
				<ul>
					<li><a href="#meta-box-footer-1"><u><?php esc_html_e('Footer','autoride'); ?></u></a></li>
				</ul>
				<div id="meta-box-footer-1">
					<ul class="to-form-field-list">
						<li>
							<h5><?php esc_html_e('Widget area or template in top footer','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select widget area or template.','autoride'); ?></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_footer_top_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_footer_top_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_footer_top_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>			
						<li>
							<h5><?php esc_html_e('Widget area or template in middle footer','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select widget area or template.','autoride'); ?></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_footer_middle_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_footer_middle_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_footer_middle_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>				
						<li>
							<h5><?php esc_html_e('Widget area or template in bottom footer','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select widget area or template.','autoride'); ?></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_footer_bottom_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_footer_bottom_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_footer_bottom_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				$('.to').themeOption();
				var element=$('.to').themeOptionElement({init:true});
				element.bindBrowseMedia('.to-button-browse');
			});
		</script>