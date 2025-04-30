		<ul class="to-form-field-list">
<?php
		foreach($this->data['dictionary']['color'] as $index=>$value)
		{
?>
			<li>
				<h5><?php echo esc_html($value['header']); ?></h5>
				<span class="to-legend"><?php echo esc_html($value['subheader']); ?></span>
				<div class="to-clear-fix">
					<input class="to-color-picker" type="text" name="<?php Autoride_ThemeHelper::getFormName('color_'.$index); ?>" id="<?php Autoride_ThemeHelper::getFormName('color_'.$index); ?>" value="<?php echo esc_attr($this->data['option']['color_'.$index]); ?>" />
				</div>					
			</li>
<?php
		}
?>
		</ul>