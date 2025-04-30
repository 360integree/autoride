		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('Automatic excerpt length','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Number of words in automatic excerpt.','autoride'); ?></span>
				<div>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" id="<?php Autoride_ThemeHelper::getFormName('comment_automatic_excerpt_length'); ?>" value="<?php echo esc_attr($this->data['option']['comment_automatic_excerpt_length']); ?>" maxlength="3"/>
				</div>
			</li>
		</ul>