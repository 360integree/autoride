		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Maintenance mode','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable maintenance mode.','autoride'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['maintenance_mode_enable'],1); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable_0'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['maintenance_mode_enable'],0); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_enable_0'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Splash page','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for splash page from selected page.','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_post_id'); ?>" id="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_post_id'); ?>">
<?php
		foreach($this->data['dictionary']['page'] as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['maintenance_mode_post_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Disable maintenance mode for users','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Allow to visit page (in normal mode) selected users:','autoride'); ?></span>
				<div class="to-checkbox-button">
<?php
		$i=0;
		foreach($this->data['dictionary']['user'] as $value)
		{
			$i++;
?>
					<input type="checkbox" name="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_user_id[]'); ?>" id="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_user_id_'.$i); ?>" value="<?php echo esc_attr($value->data->ID); ?>" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['maintenance_mode_user_id'],$value->data->ID); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('maintenance_mode_user_id_'.$i); ?>"><?php echo esc_html($value->data->display_name ); ?></label>
<?php
		}
?>
				</div>
			</li>			
		</ul>