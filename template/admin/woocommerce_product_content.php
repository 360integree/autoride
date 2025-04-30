		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Sidebar','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Select sidebar and location.','autoride'); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Sidebar:','autoride'); ?></span>
					<select name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['woocommerce_product_widget_area_sidebar'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
					</select>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Location:','autoride'); ?></span>
					<select name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar_location'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_widget_area_sidebar_location'); ?>">
<?php
		foreach($this->data['dictionary']['widget_area_location'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['woocommerce_product_widget_area_sidebar_location'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Page CSS class','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter name of CSS class.','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_class'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_class'); ?>" value="<?php echo esc_attr($this->data['option']['woocommerce_product_class']); ?>" />
				</div>
			</li>						 
			<li>
				<h5><?php esc_html_e('Page background color','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter color for a page background.','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<input class="to-color-picker" type="text" name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_background_color'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_background_color'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['woocommerce_product_background_color']); ?>" />
				</div>
			</li> 
			<li>
				<h5><?php esc_html_e('Page margin','autoride'); ?></h5>
				<span class="to-legend">
					<?php esc_html_e('Enter value (in pixels) for top and bottom margins of page content.','autoride'); ?><br/>
					<?php esc_html_e('Empty value means that default margin will be used.','autoride'); ?>
				</span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Top margin:','autoride'); ?></span>
					<input type="text" maxlength="5" name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_margin_top'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_margin_top'); ?>" value="<?php echo esc_attr($this->data['option']['woocommerce_product_margin_top']); ?>" />
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Bottom margin:','autoride'); ?></span>
					<input type="text" maxlength="5" name="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_margin_bottom'); ?>" id="<?php Autoride_ThemeHelper::getFormName('woocommerce_product_margin_bottom'); ?>" value="<?php echo esc_attr($this->data['option']['woocommerce_product_margin_bottom']); ?>" />
				</div>
			</li> 
		</ul>