<?php
        global $post;
?>
        <div id="to-template-create-box">
            
            <span>
                <?php esc_html_e('To create a template based on current post/page simply click on button below. New template will be created automatically.','templatica'); ?>
            </span>
            
            <span></span>
            
            <div>
                <input type="button" class="button button-primary button-large" value="Create" />
            </div>
            
        </div>

        <script type="text/javascript">
            
            jQuery(document).ready(function($)
            {
               $('#to-template-create-box input[type="button"]').on('click',function()
               {
                    var data={};
            
                    data.post_id=<?php echo $post->ID ?>;
                    data.action='<?php echo PLUGIN_TEMPLATICA_CONTEXT.'_create_template_based_on'; ?>';
            
                    $.post('<?php echo admin_url('admin-ajax.php'); ?>',data,function(response)
                    {  
                        
                        $('#to-template-create-box span+span').html(response.text);
                        
                    },'json');                   
               });
            });
            
        </script>