		<ul class="to-form-field-list">
			<li>
				<h5><?php esc_html_e('404 error page','autoride'); ?></h5>
				<span class="to-legend"><?php esc_html_e('Get settings for 404 page from selected page.','autoride'); ?></span>
				<div class="to-clear-fix">
					<select name="<?php Autoride_ThemeHelper::getFormName('page_404_page_id'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_404_page_id'); ?>">
<?php
						echo '<option value="-1" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_404_page_id'],-1,false)).'>'.esc_html__('[None]','autoride').'</option>';
						foreach($this->data['dictionary']['page'] as $index=>$value)
							echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_404_page_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
?>
					</select>
				</div>
			</li>
		</ul>