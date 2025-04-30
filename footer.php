<?php
		global $post,$autoride_ParentPost,$autoride_Sidebar;

		$Validation=new Autoride_ThemeValidation();
		$WidgetArea=new Autoride_ThemeWidgetArea();
	
		if($autoride_Sidebar)
		{
			$widgetAreaData=$WidgetArea->getWidgetAreaByPost($autoride_ParentPost->post,'widget_area_sidebar',true);
			if($widgetAreaData['location']==1)
			{
?>	
							</div>
<?php
			}
			elseif($widgetAreaData['location']==2)
			{
?>
							</div>
							<div class="theme-column-right"><?php $WidgetArea->create($widgetAreaData); ?></div>	
<?php
			}
		}
?>
						</div>
						
					 </div>
<?php
		$widgetAreaData=$WidgetArea->getWidgetAreaByPost($post,'widget_area_bottom');
		if($widgetAreaData['id']!='0')
		{
			global $autoride_Sidebar;
			$autoride_Sidebar=false;
?>
					<div class="theme-page-vehicle-bottom">
						<div class="theme-main">
							<?php $WidgetArea->create($widgetAreaData); ?>
						</div>
					</div>
<?php
		}		
				   
		$footer=array();

		$footer[0]=Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_top_widget_area_template');
		$footer[1]=Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_middle_widget_area_template');
		$footer[2]=Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_bottom_widget_area_template');

		if(($footer[0]!==false) || ($footer[1]!==false) || ($footer[2]!==false))
		{
?>
					<div class="theme-page-footer">
<?php
			if($footer[0]!==false) 
			{
?>	
						<div class="theme-page-footer-top">
							<div class="theme-main">
<?php 
				if(is_array($footer[0])) $WidgetArea->create($footer[0]); 
				else
				{
					// This output has been safely escaped in the following file: class/Theme.Helper.class.php
					echo Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_top_widget_area_template');
				}
?>
							</div>
						</div>
<?php
			}
			
			if($footer[1]!==false) 
			{
?>
						<div class="theme-page-footer-middle">
							<div class="theme-main">
<?php 
				if(is_array($footer[1])) $WidgetArea->create($footer[1]); 
				else 
				{
					// This output has been safely escaped in the following file: class/Theme.Helper.class.php
					echo Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_middle_widget_area_template');
				}
?>
							</div>
						</div>	
<?php
			}
			
			if($footer[2]!==false)
			{
?>
						<div class="theme-page-footer-bottom">
							<div class="theme-main">
<?php 
				if(is_array($footer[2])) $WidgetArea->create($footer[2]); 
				else
				{
					// This output has been safely escaped in the following file: class/Theme.Helper.class.php
					echo Autoride_ThemeHelper::getWidgetAreaTemplateContent($autoride_ParentPost->post,'footer_bottom_widget_area_template');
				}
?>
							</div>
						</div>
<?php
			}
?>
					</div>
<?php
		}
?>
				</div>
<?php	
		if($Validation->isNotEmpty(Autoride_ThemeOption::getOption('custom_js_code')))
		{
?>
				<script type="text/javascript">
					<?php echo Autoride_ThemeOption::getOption('custom_js_code'); ?>
				</script>
<?php
		}

		if(Autoride_ThemeOption::getOption('go_to_page_top_enable')==1)
		{
?>
				<a href="<?php echo esc_url('#'.Autoride_ThemeOption::getOption('go_to_page_top_hash')); ?>" id="theme-go-to-top" class="theme-icon-meta-arrow-vertical-2"></a>
<?php
		}
?>
				<div id="theme-full-screen-search-form">
				 
					<a href="#" id="theme-full-screen-search-form-close-button"></a>
					
					<form action="<?php echo esc_url(home_url('/')); ?>">
						
						<div>
							
							<span><?php esc_html_e('hello.','autoride'); ?></span>
							<input type="text" name="s" value="" placeholder="<?php esc_attr_e('what are you looking for?','autoride'); ?>"/>
							
						</div>
						
					</form>
					
				</div>
<?php
		wp_footer();
?>
			</body>
			
		</html>