		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Enable "Go to page top"','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable hash "Go to page top".','autoride'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],1); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_enable'],0); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_enable_2'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
				</div>			
			</li>
			<li>
				<h5><?php esc_html_e('Hash','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Hash','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_hash'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_hash'); ?>" value="<?php echo esc_attr($this->data['option']['go_to_page_top_hash']); ?>" />
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Animation','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable animation during scrolling.','autoride'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],1); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['go_to_page_top_animation_enable'],0); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_enable_2'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
				</div>			
			</li>			
			<li>
				<h5><?php esc_html_e('Duration','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Duration of animation in miliseconds','autoride'); ?><br/></span>
				<div class="to-clear-fix">
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_duration'); ?>" value="<?php echo esc_attr($this->data['option']['go_to_page_top_animation_duration']); ?>" maxlength="5"/>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Easing','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Easing method of animation.','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>" id="<?php Autoride_ThemeHelper::getFormName('go_to_page_top_animation_easing'); ?>">
<?php
		foreach($this->data['dictionary']['easing_type'] as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['go_to_page_top_animation_easing'],$index,false)).'>'.esc_html($value).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>