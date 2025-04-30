		<div class="to">
			<div class="ui-tabs">
				<ul>
					<li><a href="#meta-box-general-1"><u><?php esc_html_e('Elements','autoride'); ?></u></a></li>
				</ul>
				<div id="meta-box-general-1">
					<ul class="to-form-field-list">
<?php
		foreach($this->data['dictionary']['post_element'] as $index=>$value)
		{
?>
						<li>
							<h5><?php echo esc_html($value[0]); ?></h5>
							<span class="to-legend"><?php echo sprintf(esc_html('Enable or disable visbility of %s.','autoride'),$value[1]); ?></span>
							<div class="to-radio-button">   
								<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_2'); ?>" value="-1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],-1); ?>/>
								<label for="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_2'); ?>"><?php esc_html_e('[Use global settings]','autoride'); ?></label>
								<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_1'); ?>" value="1" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],1); ?>/>
								<label for="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_1'); ?>"><?php esc_html_e('Enable','autoride'); ?></label>
								<input type="radio" name="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable'); ?>" id="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_0'); ?>" value="0" <?php Autoride_ThemeHelper::checkedIf($this->data['option']['post_'.$index.'_enable'],0); ?>/>
								<label for="<?php Autoride_ThemeHelper::getFormName('post_'.$index.'_enable_0'); ?>"><?php esc_html_e('Disable','autoride'); ?></label>
							</div>
						</li>
<?php
		}
?>
					</ul>
				</div>
			</div>
		</div>