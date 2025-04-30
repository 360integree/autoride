		<ul class="to-form-field-list">			
			<li>
				<h5><?php esc_html_e('Logo','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter details of logo (image) in order: URL address, maximum width and height (in pixels).','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('URL address:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_normal_src'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_normal_src'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['logo_normal_src']); ?>" />
					<input type="button" name="<?php Autoride_ThemeHelper::getFormName('logo_normal_src_browse'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_normal_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse','autoride'); ?>"/>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Maximum width:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_normal_width'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_normal_width'); ?>" value="<?php echo esc_attr($this->data['option']['logo_normal_width']); ?>"  maxlength="4"/>
				</div>	
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Maximum height:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_normal_height'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_normal_height'); ?>" value="<?php echo esc_attr($this->data['option']['logo_normal_height']); ?>"  maxlength="4"/>
				</div>	
			</li>
			<li>
				<h5><?php esc_html_e('Logo for retina display','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enter details of logo (image) in order: URL address, maximum width and height (in pixels).','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('URL address:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_retina_src'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_retina_src'); ?>" class="to-float-left" value="<?php echo esc_attr($this->data['option']['logo_retina_src']); ?>" />
					<input type="button" name="<?php Autoride_ThemeHelper::getFormName('logo_retina_src_browse'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_retina_src_browse'); ?>" class="to-button-browse to-button" value="<?php esc_attr_e('Browse','autoride'); ?>"/>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Maximum width:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_retina_width'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_retina_width'); ?>" value="<?php echo esc_attr($this->data['option']['logo_retina_width']); ?>"  maxlength="4"/>
				</div>	
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php esc_html_e('Maximum height:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('logo_retina_height'); ?>" id="<?php Autoride_ThemeHelper::getFormName('logo_retina_height'); ?>" value="<?php echo esc_attr($this->data['option']['logo_retina_height']); ?>"  maxlength="4"/>
				</div>	
			</li>
		</ul>