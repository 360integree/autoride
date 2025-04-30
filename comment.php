<?php
		$Comment=new Autoride_ThemeComment();

		if((comments_open()) && (!post_password_required()))
		{
			$commenter=wp_get_current_commenter();
			$req=get_option('require_name_email');
			$aria_req=($req ? ' aria-required=\'true\'' : '');

			$field=array();

			$field['author']=
			'
				<div class="theme-form-column-1_2-left">
					<div class="theme-form-field">
						<label for="author">'.esc_html__('Name','autoride').($req ? ' <span class="required">*</span>' : '').'</label>
						<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.'/>
					</div>
				</div>

			';

			$field['email']=
			'
				<div class="theme-form-column-1_2-left">
					<div class="theme-form-field">
						<label for="email">'.esc_html__('Email','autoride').($req ? ' <span class="required">*</span>' : '').'</label>
						<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.'/>
					</div>
				</div>
			';

			$field['url']=
			'
				<div class="theme-form-column-1_2-left">
					<div class="theme-form-field">
						<label for="url">'.esc_html__('Website','autoride').'</label>
						<input id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"/>
					</div>
				</div>
			';

			$commentField=
			'
				<div'.Autoride_ThemeHelper::createClassAttribute(is_user_logged_in() ? array('theme-form-column-1_1') : array('theme-form-column-1_2-right')).'>
					<div class="theme-form-field">
						<label for="comment">'.esc_html__('Comment','autoride').' <span class="required">*</span></label>
						<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
					</div>	
				</div>
			';
			
			$commentField.=wp_nonce_field('comment_add','_wpnonce',true,false);

			$argument=array
			(
				'id_form'														=>	'comment-form',
				'title_reply'													=>	__('Leave a Comment','autoride'),
				'cancel_reply_link'												=>	__('Cancel Reply','autoride'),
				'comment_field'													=>	$commentField,
				'fields'														=>	apply_filters('comment_form_default_fields',$field),
				'label_submit'													=>  __('Leave a Reply','autoride')
			);

			comment_form($argument); 
		}
?>
			<div id="comments" class="theme-clear-fix" data-cpage="<?php echo (int)$Comment->page; ?>">
				<?php comments_template(); ?>
			</div>