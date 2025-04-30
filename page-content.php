<?php
		global $more;

		if(have_posts())
		{
			while(have_posts())
			{
				the_post();
				the_content();
?>
				<div class="theme-pagination theme-clear-fix">
<?php 
				wp_link_pages(array
				(
					'before' => '',
					'after' => '',
					'next_or_number' => 'number',		
					'previouspagelink' => __('Previous','autoride'),
					'nextpagelink' => __('Next','autoride'),
					'link_before' => '<span>',
					'link_after' => '</span>'
				)); 
?>
				</div>
<?php
				get_template_part('comment');
			}
		}