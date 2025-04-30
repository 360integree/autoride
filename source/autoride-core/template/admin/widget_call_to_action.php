<?php
		$Align=new Autoride_ThemeAlign();
		$Button=new Autoride_ThemeButton();
		$Window=new Autoride_ThemeWindow();
		$Feature=new Autoride_ThemeFeature();
		$CallToAction=new Autoride_ThemeCallToAction();
?>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['style']['id']); ?>"><?php esc_html_e('Style','autoride-core'); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr($this->data['option']['style']['id']); ?>" name="<?php echo esc_attr($this->data['option']['style']['name']); ?>">
<?php
		foreach($CallToAction->getStyle() as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.($index==$this->data['option']['style']['value'] ? 'selected=""' : null).'>'.esc_html($value[0]).'</option>';
?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['icon']['id']); ?>"><?php esc_html_e('Icon','autoride-core'); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr($this->data['option']['icon']['id']); ?>" name="<?php echo esc_attr($this->data['option']['icon']['name']); ?>">
<?php
		foreach($Feature->getFeature() as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.($index==$this->data['option']['icon']['value'] ? 'selected=""' : null).'>'.esc_html($value[0]).'</option>';
?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['header']['id']); ?>"><?php esc_html_e('Header','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['header']['id']); ?>" name="<?php echo esc_attr($this->data['option']['header']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['header']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['subheader']['id']); ?>"><?php esc_html_e('Subheader','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['subheader']['id']); ?>" name="<?php echo esc_attr($this->data['option']['subheader']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['subheader']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_style']['id']); ?>"><?php esc_html_e('Button style','autoride-core'); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr($this->data['option']['button_style']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_style']['name']); ?>">
<?php
		foreach($Button->getStyle() as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.($index==$this->data['option']['button_style']['value'] ? 'selected=""' : null).'>'.esc_html($value[0]).'</option>';
?>
			</select>
		</p>		
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_label']['id']); ?>"><?php esc_html_e('Button label','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['button_label']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_label']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['button_label']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_url']['id']); ?>"><?php esc_html_e('Button URL address','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['button_url']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_url']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['button_url']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['button_url_target']['id']); ?>"><?php esc_html_e('Button URL address target','autoride-core'); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr($this->data['option']['button_url_target']['id']); ?>" name="<?php echo esc_attr($this->data['option']['button_url_target']['name']); ?>">
<?php
		foreach($Window->getTarget() as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.($index==$this->data['option']['button_url_target']['value'] ? 'selected=""' : null).'>'.esc_html($value[0]).'</option>';
?>
			</select>
		</p>		  
		<p>
			<label for="<?php echo esc_attr($this->data['option']['align']['id']); ?>"><?php esc_html_e('Align','autoride-core'); ?>:</label>
			<select class="widefat" id="<?php echo esc_attr($this->data['option']['align']['id']); ?>" name="<?php echo esc_attr($this->data['option']['align']['name']); ?>">
<?php
		foreach($Align->getAlign() as $index=>$value)
			echo '<option value="'.esc_attr($index).'" '.($index==$this->data['option']['align']['value'] ? 'selected=""' : null).'>'.esc_html($value).'</option>';
?>
			</select>
		</p>		  
 		<p>
			<label for="<?php echo esc_attr($this->data['option']['css_class']['id']); ?>"><?php esc_html_e('CSS class','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['css_class']['id']); ?>" name="<?php echo esc_attr($this->data['option']['css_class']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['css_class']['value']); ?>" />
		</p>