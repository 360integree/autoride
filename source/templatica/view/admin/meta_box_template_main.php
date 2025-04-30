<?php 
        global $post;

		echo $this->data['nonce'];
        
        $Validation=new TemplaticaValidation();
        
        $templateUsagePostCount=count($this->data['templateUsagePostList']);
?>	
		<div class="to">
            <div class="ui-tabs">
                <ul>
                    <li><a href="#meta-box-template-1"><?php esc_html_e('Main','templatica'); ?></a></li>
<?php
        if($templateUsagePostCount)
        {
?>
                    <li><a href="#meta-box-template-2"><?php echo sprintf(esc_html__('Template usage (%d)','templatica'),$templateUsagePostCount); ?></a></li>
<?php
        }
?>              
                </ul>
                <div id="meta-box-template-1">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('User roles','templatica'); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Select for which user roles this template will be available.','templatica'); ?><br/>
                                <?php esc_html_e('Please note, that created template is always available for author of it.','templatica'); ?><br/>
                            </span>
                            <div class="to-checkbox-button">
                                <input type="checkbox" value="-1" id="<?php TemplaticaHelper::getFormName('user_role_0'); ?>" name="<?php TemplaticaHelper::getFormName('user_role[]'); ?>" <?php TemplaticaHelper::checkedIf($this->data['meta']['user_role'],-1); ?>/>
                                <label for="<?php TemplaticaHelper::getFormName('user_role_0'); ?>"><?php esc_html_e('[All users]','templatica'); ?></label>
<?php
        $i=0;
		foreach($this->data['dictionary']['userRole'] as $index=>$value)
		{
            $i++;
?>
                                <input type="checkbox" value="<?php echo esc_attr($index); ?>" id="<?php TemplaticaHelper::getFormName('user_role_'.$i); ?>" name="<?php TemplaticaHelper::getFormName('user_role[]'); ?>" <?php TemplaticaHelper::checkedIf($this->data['meta']['user_role'],$index); ?>/>
                                <label for="<?php TemplaticaHelper::getFormName('user_role_'.$i); ?>"><?php echo esc_html($value[0]); ?></label>
<?php		
		}
?>
                            </div>                               
                        </li>
                        <li>
                            <h5><?php esc_html_e('Shortcode','templatica'); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('Shortcode of the template.','templatica'); ?>
                            </span>
                            <div class="to-clear-fix to-field-disabled">
                                <?php echo esc_html(TemplaticaTemplate::createTemplateShortcode($post->ID)); ?>
                            </div>
                        </li>
                    </ul>
                </div>
<?php
        if($templateUsagePostCount)
        {
?>
                <div id="meta-box-template-2">
                    <ul class="to-form-field-list">
                        <li>
                            <h5><?php esc_html_e('Template usage','templatica'); ?></h5>
                            <span class="to-legend">
                                <?php esc_html_e('List of posts in which this template is used.'); ?>
                            </span>
                            <div>
                                <ol>
<?php
            foreach($this->data['templateUsagePostList'] as $index=>$value)
            {
                echo '<li><a href="'.get_edit_post_link($value->ID).'" target="_blank">'.($Validation->isEmpty($value->post_title) ? sprintf(esc_html__('Post #%s','templatica'),$value->ID) : esc_html($value->post_title)).'</a></li>';
            }
?>
                                </ol>
                            </div>
                        </li>
                    </ul>
                </div>
<?php
        }
?>
            </div>
        </div>
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{	
				$('.to').themeOptionElement({init:true});
                
                $('.to input[name="templatica_user_role[]"]').on('change',function()
                {
                    var value=$(this).val();

                    var checkbox=$(this).parents('div:first').find('input');

                    if(value==='-1')
                    {
                        checkbox.removeAttr('checked');
                        checkbox.first().attr('checked','checked');
                    }
                    else checkbox.first().removeAttr('checked');
                    
                    checkbox.button('refresh');
                });
            });
		</script>