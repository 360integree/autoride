<?php
		if(Autoride_ThemeConstant::get('PLUGIN_CHBS_VEHICLE_TEMPLATE')===false) die();

		global $post,$autoride_ParentPost,$autoride_Sidebar;

		$aPost=$post;
		
		$columnCount=$autoride_Sidebar ? 2 : 3;
		
		if(isset($this))
		{
			$paged=$this->data['paged'];
			$vehicleId=$this->data['vehicle_id'];
			$templateId=$this->data['template_id'];
			$postsPerPage=$this->data['posts_per_page'];
		}
		else
		{
			$paged=1;
			$templateId=1;
			$vehicleId=array();
			$postsPerPage=(int)get_option('posts_per_page');
		}
		
		$Vehicle=new CHBSVehicle();
		$Validation=new Autoride_ThemeValidation();
		
		$make=$Vehicle->getMake();
		$category=$Vehicle->getCategory();

		$query=$Vehicle->getVehicleList(array('vehicle_id'=>$vehicleId,'paged'=>$paged,'posts_per_page'=>$postsPerPage));
?>
		<div class="theme-vehicle-list theme-clear-fix">
			
			<div class="chbs-main">
<?php
		if($templateId===1)
		{
?>
				<div class="theme-vehicle-list-search theme-clear-fix chbs-vehicle-filter chbs-box-shadow ">
					<form class="theme-clear-fix">
						<div class="chbs-form-field chbs-form-field-width-50">
							<label><?php esc_html_e('Vehicle Type','autoride'); ?></label>
							<select name="category">
								<option selected value="-1"><?php esc_html_e('Any Type','autoride'); ?></option>
<?php					
			foreach($category as $categoryIndex=>$categoryValue)
			{
?>
								<option<?php Autoride_ThemeHelper::selectedIf(CHBSHelper::getGetValue('category',false),$categoryIndex); ?> value="<?php echo esc_attr($categoryIndex); ?>"><?php echo esc_html($categoryValue['name']); ?></option>
<?php
			}
?>
							</select>
						</div>
						<div class="chbs-form-field chbs-form-field-width-50">
							<label><?php esc_html_e('Vehicle Make','autoride'); ?></label>
							<select name="make">
								<option selected value=""><?php esc_html_e('Any Make','autoride'); ?></option>
<?php			 
			foreach($make as $makeValue)
			{
?>
								<option<?php Autoride_ThemeHelper::selectedIf(CHBSHelper::getGetValue('make',false),$makeValue); ?> value="<?php echo esc_attr($makeValue); ?>"><?php echo esc_html($makeValue); ?></option>
<?php
			}
?>
							</select>
						</div>
						<input type="hidden" name="paged" value="1"/>
					</form>
				</div>
<?php
		}

		if(count($query->posts))
		{
?>
				<div class="theme-vehicle-list-result theme-clear-fix">
<?php
			$i=0;
			$html=null;

			while($query->have_posts())
			{
				$i++;
				
				$query->the_post();
				
				$html.=
				'
					[vc_column width="1/'.$columnCount.'"]
						<div class="theme-vehicle-list-item">
				';
				
				$htmlImage=get_the_post_thumbnail($post->ID);
				if($Validation->isNotEmpty($htmlImage))
				{
					/***/
					
					$htmlCategory=null;
					
					$category=wp_get_post_terms(get_the_ID(),CHBSVehicle::getCPTCategoryName()); 
					
					if(($category) && (!is_wp_error($category)))
					{
						foreach($category as $categoryValue)
							$htmlCategory.='<span class="theme-vehicle-list-item-category">'.esc_html($categoryValue->name).'</span>';
					}
					
					/***/

					$html.=
					'
						<div class="theme-vehicle-list-item-image">
							<a href="'.esc_url(get_the_permalink($post)).'" title="'.esc_attr(sprintf(__('View vehicle "%s".','autoride'),strip_tags(get_the_title($post)))).'">
								<span>
									'.$htmlCategory.'
									<span class="theme-vehicle-list-item-title">'.get_the_title($post).'</span>
								</span>
								'.$htmlImage.'
								<span></span>
							</a>
						</div>
					';
					
					/***/
					
					$meta=CHBSPostMeta::getPostMeta($post);
					
					$html.=
					'
						<div class="theme-vehicle-list-item-meta">
							<span class="theme-icon-meta-user"></span>
							<span class="theme-circle">'.(int)$meta['passenger_count'].'</span>
							<span class="theme-icon-meta-suitcase"></span>
							<span class="theme-circle">'.(int)$meta['bag_count'].'</span>
						</div>
					';
				}
						
				$html.=
				'
						</div>
					[/vc_column]
				';
				
				if($i%($columnCount)===0)
				{
					echo do_shortcode('[vc_row]'.$html.'[/vc_row]');
					$i=0;
					$html=null;
				}
			}
			
			if($i!=0) echo do_shortcode('[vc_row]'.$html.'[/vc_row]');
?>
				</div>
<?php
			if($templateId===1)
				echo Autoride_ThemeHelper::createPagination($query);
		}
		
		$post=$aPost;
?>
			</div>
		</div>