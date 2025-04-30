		<p>
			<label for="<?php echo esc_attr($this->data['option']['title']['id']); ?>"><?php esc_html_e('Title','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['title']['id']); ?>" name="<?php echo esc_attr($this->data['option']['title']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['title']['value']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->data['option']['booking_form_page_address']['id']); ?>"><?php esc_html_e('URL address of page with booking form','autoride-core'); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->data['option']['booking_form_page_address']['id']); ?>" name="<?php echo esc_attr($this->data['option']['booking_form_page_address']['name']); ?>" type="text" value="<?php echo esc_attr($this->data['option']['booking_form_page_address']['value']); ?>" />
		</p>