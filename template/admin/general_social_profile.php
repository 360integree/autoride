		<ul class="to-form-field-list">
<?php
		foreach($this->data['dictionary']['social_profile'] as $index=>$value)
		{
?>
			<li>
				<h5><?php echo esc_html($value[0]); ?></h5>
				<span class="to-legend"><?php echo esc_attr($value[0]); ?></span>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php echo sprintf('Adress:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('social_profile_address_'.$index); ?>" id="<?php Autoride_ThemeHelper::getFormName('social_profile_address_'.$index); ?>" value="<?php echo esc_attr($this->data['option']['social_profile_address_'.$index]); ?>"/>
				</div>
				<div class="to-clear-fix">
					<span class="to-legend-field"><?php echo sprintf('Order:','autoride'); ?></span>
					<input type="text" name="<?php Autoride_ThemeHelper::getFormName('social_profile_order_'.$index); ?>" id="<?php Autoride_ThemeHelper::getFormName('social_profile_order_'.$index); ?>" value="<?php echo esc_attr($this->data['option']['social_profile_order_'.$index]); ?>"/>
				</div>
			</li>			
<?php
		}
?>
		</ul>