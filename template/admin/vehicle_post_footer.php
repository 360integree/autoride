		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Top footer widget area or template','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area or template for top part of footer.','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_top_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_top_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['vehicle_post_footer_top_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
					</select>
				</div>
			</li>			
			<li>
				<h5><?php esc_html_e('Middle footer widget area or template','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area or template for middle part of footer.','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_middle_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_middle_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['vehicle_post_footer_middle_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
					</select>
				</div>
			</li>				
			<li>
				<h5><?php esc_html_e('Bottom footer widget area or template','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select widget area or template for bottom part of footer','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_bottom_widget_area_template'); ?>" id="<?php Autoride_ThemeHelper::getFormName('vehicle_post_footer_bottom_widget_area_template'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['vehicle_post_footer_bottom_widget_area_template'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
					</select>
				</div>
			</li>
		</ul>