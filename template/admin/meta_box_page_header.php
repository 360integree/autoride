		<div class="to">
			<div class="ui-tabs">
				<ul>
					<li><a href="#meta-box-header-top-1"><u><?php esc_html_e('Header','autoride'); ?></u></a></li>
				</ul>
				<div id="meta-box-header-top-1">
					<ul class="to-form-field-list">
						<li>
							<h5><?php esc_html_e('Top header template','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select template for top part of header.','autoride'); ?><br/></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_header_top_template_id'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_header_top_template_id'); ?>">
<?php
		foreach($this->data['dictionary']['template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_header_top_template_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>
						<li>
							<h5><?php esc_html_e('Middle header template','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select template for middle part of header.','autoride'); ?><br/></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_header_middle_template_id'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_header_middle_template_id'); ?>">
<?php
		foreach($this->data['dictionary']['template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_header_middle_template_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>
						<li>
							<h5><?php esc_html_e('Bottom header template','autoride'); ?></h5>
							<span class="to-legend"><?php esc_html_e('Select template for bottom part of header.','autoride'); ?><br/></span>
							<div class="to-clear-fix">
								<select name="<?php Autoride_ThemeHelper::getFormName('page_header_bottom_template_id'); ?>" id="<?php Autoride_ThemeHelper::getFormName('page_header_bottom_template_id'); ?>">
<?php
		foreach($this->data['dictionary']['template'] as $index=>$value)
		{
			echo '<option value="'.esc_attr($index).'" '.(Autoride_ThemeHelper::selectedIf($this->data['option']['page_header_bottom_template_id'],$index,false)).'>'.esc_html($value[0]).'</option>';
		}
?>
								</select>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>