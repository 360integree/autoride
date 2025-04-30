<?php
		global $post;

		$Plugin=new Autoride_ThemePlugin();
		
		if(($Plugin->isActive('CHBSPlugin')) && (get_post_type($post)=='chbs_vehicle'))
		{
			$Validation=new Autoride_ThemeValidation();
			
			$Vehicle=new CHBSVehicle();
			$dictionary=$Vehicle->getDictionary(array('vehicle_id'=>$post->ID));	
			
			if(count($dictionary)===1)
			{
				$Vehicle->getVehicleAttribute($dictionary);

				$id='widget_theme_widget_vehicle_attribute_'.Autoride_ThemeHelper::createId();
			
				echo $this->data['html']['start']; 
?>
				<div class="widget_theme_widget_vehicle_attribute" id="<?php echo esc_attr($id); ?>">
<?php
				if(((int)$dictionary[$post->ID]['meta']['passenger_count']>0) || ((int)$dictionary[$post->ID]['meta']['bag_count']>0))
				{
?>
					<div class="theme-widget-vehicle-attribute-icon">
<?php
					if((int)$dictionary[$post->ID]['meta']['passenger_count']>0)
					{
?>
						<div class="theme-widget-vehicle-attribute-icon-passenger">
							<span class="theme-icon-meta-user"></span>
							<span><?php echo sprintf(esc_html__('%s Passengers','autoride-core'),$dictionary[$post->ID]['meta']['passenger_count']); ?></span>
						</div>
<?php
					}
					if((int)$dictionary[$post->ID]['meta']['bag_count']>0)
					{
?>
						<div class="theme-widget-vehicle-attribute-icon-bag">
							<span class="theme-icon-meta-suitcase"></span>
							<span><?php echo sprintf(esc_html__('%s Suitcases','autoride-core'),$dictionary[$post->ID]['meta']['bag_count']); ?></span>
						</div>
<?php					  
					}
?>
					</div>
<?php
				}

				if(count($dictionary[$post->ID]['attribute']))
				{
?>
					<div class="theme-component-attribute-table">
				
						<ul>
<?php
					foreach($dictionary[$post->ID]['attribute'] as $index=>$value)
					{
?>
							<li>
								<div><?php echo esc_html($value['name']); ?></div>
								<div><?php echo esc_html($value['value']); ?></div>
							</li>
<?php					  
					}
?>
						</ul>
					
					</div>
<?php
				}
				
				if($Validation->isNotEmpty($this->data['instance']['booking_form_page_address']))
				{
					echo do_shortcode('[vc_autoride_theme_button label="'.esc_html__('Book Now','autoride-core').'" url="'.$this->data['instance']['booking_form_page_address'].'" style="1" align="center"][/vc_autoride_theme_button]');
				}
?>
				</div>
<?php
				echo $this->data['html']['stop']; 
			
			}
		}