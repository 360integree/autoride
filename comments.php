<?php
		if(!post_password_required())
		{	
			$count=get_comments_number($post->ID);
			
			if($count>0)
			{
?>
		<h4><?php esc_html_e('Comments','autoride'); ?></h4>

		<div id="comments_list" class="theme-clear-fix">

			<ul class="theme-reset-list theme-clear-fix">
<?php
				$Comment=new Autoride_ThemeComment();
				$Validation=new Autoride_ThemeValidation();

				wp_list_comments(array('avatar_size'=>70,'page'=>$Comment->page,'type'=>'all','callback'=>array($Comment,'createComment')));

				$paginationArguments=array
				(
					'base' => '#cpage-%#%',  
					'format' => '',
					'add_fragment' => '',
					'current' => $Comment->page,
					'next_text' => '',
					'prev_text' => '',
					'echo' => false					
				);
				
				$pagination=paginate_comments_links($paginationArguments);
?>
			</ul>
<?php
				if($Validation->isNotEmpty($pagination))
				{
?>
			<div class="theme-pagination theme-clear-fix">
<?php  
					echo paginate_comments_links($paginationArguments); 
?>
			</div>
<?php
				}
?>
		</div>
<?php
			}
		}