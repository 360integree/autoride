		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Right click','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable right click.','autoride'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('right_click_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('right_click_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['right_click_enable'],1); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('right_click_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('right_click_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('right_click_enable_0'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['right_click_enable'],0); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('right_click_enable_0'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
				</div>
			</li>
			<li>
				<h5><?php esc_html_e('Text selection','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Enable or disable text selection.','autoride'); ?></span>
				<div class="to-radio-button">
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['copy_selection_enable'],1); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
					<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable_0'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['copy_selection_enable'],0); ?>/>
					<label for="<?php Autoride_ThemeHelper::getFormName('copy_selection_enable_0'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
				</div>
			</li>
		</ul>