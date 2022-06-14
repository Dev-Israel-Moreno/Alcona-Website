<?php defined('ABSPATH') or die('No script kiddies please!!');
global $post;
$postid = $post->ID;
$et_tab_animation_data = get_option('et_tab_animation_options');
//$this->displayArr($et_tab_animation_data);
$et_main_settings = get_post_meta($postid, 'et_main_settings', true);
$orientation    = (isset($et_main_settings['general_settings']['orientation_type']) && $et_main_settings['general_settings']['orientation_type'] != '')?esc_attr($et_main_settings['general_settings']['orientation_type']):'horizontal';
$tab_position   = (isset($et_main_settings['general_settings']['tab_position']) && $et_main_settings['general_settings']['tab_position'] != '')?esc_attr($et_main_settings['general_settings']['tab_position']):'';
//Display Settings
$template       = (isset($et_main_settings['display_settings']['template']) && $et_main_settings['display_settings']['template'] != '')?esc_attr($et_main_settings['display_settings']['template']):'template1';
$enable_custom_option = (isset($et_main_settings['custom_settings']['enable_custom_option']) && $et_main_settings['custom_settings']['enable_custom_option'] == true)?true:false;
$bg_color        = (isset($et_main_settings['custom_settings']['bg_color']) && $et_main_settings['custom_settings']['bg_color'] != '')?esc_attr($et_main_settings['custom_settings']['bg_color']):'';
$bg_hover_color  = (isset($et_main_settings['custom_settings']['bg_hover_color']) && $et_main_settings['custom_settings']['bg_hover_color'] != '')?esc_attr($et_main_settings['custom_settings']['bg_hover_color']):'';
$bg_active_color = (isset($et_main_settings['custom_settings']['bg_active_color']) && $et_main_settings['custom_settings']['bg_active_color'] != '')?esc_attr($et_main_settings['custom_settings']['bg_active_color']):'';
$bg_tab_content_color  = (isset($et_main_settings['custom_settings']['bg_tab_content_color']) && $et_main_settings['custom_settings']['bg_tab_content_color'] != '')?esc_attr($et_main_settings['custom_settings']['bg_tab_content_color']):'';
$font_color       = (isset($et_main_settings['custom_settings']['font_color']) && $et_main_settings['custom_settings']['font_color'] != '')?esc_attr($et_main_settings['custom_settings']['font_color']):'';
$desc_color       = (isset($et_main_settings['custom_settings']['desc_color']) && $et_main_settings['custom_settings']['desc_color'] != '')?esc_attr($et_main_settings['custom_settings']['desc_color']):'';
$font_hover_color = (isset($et_main_settings['custom_settings']['font_hover_color']) && $et_main_settings['custom_settings']['font_hover_color'] != '')?esc_attr($et_main_settings['custom_settings']['font_hover_color']):'';
$subtitle_fhcolor = (isset($et_main_settings['custom_settings']['subtitle_fhcolor']) && $et_main_settings['custom_settings']['subtitle_fhcolor'] != '')?esc_attr($et_main_settings['custom_settings']['subtitle_fhcolor']):'';
$subtitle_fcolor  = (isset($et_main_settings['custom_settings']['subtitle_fcolor']) && $et_main_settings['custom_settings']['subtitle_fcolor'] != '')?esc_attr($et_main_settings['custom_settings']['subtitle_fcolor']):'';
?>
<div class="et-setup-wrapper et-main-settings-wrapper">
    <div class="et-tab-header">
        <ul class="et-nav-tabs">
            <li class="et-tab et-active" data-id="et-general-selection"><?php _e('General Settings','everest-tab-lite');?></li>
            <li class="et-tab" data-id="et-display-selection"><?php _e('Display Settings','everest-tab-lite');?></li>
            <li class="et-tab" data-id="et-custom-styling"><?php _e('Custom Styling','everest-tab-lite');?></li>
            
        </ul>
    </div>
    <div class="et-tabs-content-wrap">
        <div class="et-tab-content et-tab-content-active" id="et-general-selection">
            <div class="et-tab-cbody">
                <div class="et-field-wrap">
                    <label><?php _e('Orientation Type','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][orientation_type]" id="et_orientation_type">
                        <option value="horizontal" <?php selected($orientation, 'horizontal'); ?>><?php _e('Horizontal','everest-tab-lite');?></option>
                    </select>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Tabs Position','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][tab_position]" id="et_tab_position">
                        <option value="top-left" <?php selected($tab_position, 'top-left'); ?> data-type="horizontal"><?php _e('Top Left','everest-tab-lite');?></option>
                        <option value="top-right" <?php selected($tab_position, 'top-right'); ?> data-type="horizontal"><?php _e('Top Right','everest-tab-lite');?></option>
                    </select>
                    </div>
                </div>
          </div>
       </div>
        <div class="et-tab-content" id="et-display-selection" style="display:none;">
            <div class="et-tab-cbody">
               <div class="et-field-wrap">
                    <label><?php _e('Choose Template','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[display_settings][template]" id="et_template_type">
                        <?php for($i = 1; $i <= 3; $i++){?>
                            <option value="template<?php echo $i;?>" <?php selected($template, 'template'.$i); ?>><?php _e('Template '.$i,'everest-tab-lite');?></option>
                        <?php }?>
                    </select>    
                    </div>
                </div>
                <div class="et_template_preview">
                    <?php for($i = 1; $i <= 3; $i++){
                        if($template != 'template'.$i){
                             $style = 'style="display:none;"';
                        }else{
                            $style = '';
                        }?>
                    <div class="et_listtemplate" id="<?php echo 'template'.$i;?>" <?php echo $style;?>>
                        <img src="<?php echo ETABLite_IMAGE_DIR;?>tab_templates/template<?php echo $i;?>.png"/>
                    </div>
                    <?php }?>
                </div>
             </div>
        </div>
        <div class="et-tab-content" id="et-custom-styling" style="display:none;">
             <div class="et-tab-cbody">
               <div class="et-field-wrap">
                 <label for="enable_custom_option"><?php _e('Enable Custom Styling','everest-tab-lite');?></label>
                  <div class="etab-right-options"> 
                     <label class="etab-switch">
                     <input type="checkbox" value="true" id="enable_custom_option" name="et_main_settings[custom_settings][enable_custom_option]" <?php if( $enable_custom_option ){echo 'checked';}?>>
                       <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable below custom styling for this tab.','everest-tab-lite');?>               
                      </div>
                    </div>
                 </div>
               </div>
               <div class="etab-custom-style" id="etab-template14-disable">
                  <div class="et-field-wrap">
                      <label><?php _e('Tab Background color','everest-tab-lite');?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_color);?>"/>
                      </div>
                  </div>                
                  <div class="et-field-wrap">
                      <label><?php _e('Tab Hover Background color','everest-tab-lite');?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_hover_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_hover_color);?>"/>
                       </div>
                  </div>
                  <div class="et-field-wrap">
                      <label><?php _e('Active Tab Background color','everest-tab-lite');?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_active_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_active_color);?>"/>
                       </div>
                  </div>
              </div>

                <div class="et-field-wrap">
                    <label><?php _e('Tab Title Font color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][font_color]" class="et-color-picker" value="<?php echo esc_attr($font_color);?>"/>
                    </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Tab Title Font Hover Color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][font_hover_color]" class="et-color-picker" value="<?php echo esc_attr($font_hover_color);?>"/>
                   </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Sub Title Font Color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][subtitle_fcolor]" class="et-color-picker" value="<?php echo esc_attr($subtitle_fcolor);?>"/>
                   </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Sub Title Font Hover Color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][subtitle_fhcolor]" class="et-color-picker" value="<?php echo esc_attr($subtitle_fhcolor);?>"/>
                   </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Tab Description color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][desc_color]" class="et-color-picker" value="<?php echo esc_attr($desc_color);?>"/>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Tab Content Background color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][bg_tab_content_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_tab_content_color);?>"/>
                     </div>
                </div>
                <?php 
                $header_bgcolor  = (isset($et_main_settings['custom_settings']['header_bgcolor']) && $et_main_settings['custom_settings']['header_bgcolor'] != '')?$et_main_settings['custom_settings']['header_bgcolor']:'';
                $top_border_color  = (isset($et_main_settings['custom_settings']['top_border_color']) && $et_main_settings['custom_settings']['top_border_color'] != '')?$et_main_settings['custom_settings']['top_border_color']:'';
                ?>
                <div class="et-field-wrap etab-template-wise" id="etab-template2-option">
                    <label><?php _e('Tab Header Background Color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][header_bgcolor]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($header_bgcolor);?>"/>
                     <p class="description"><?php _e('Only for Template 2','everest-tab-lite');?></p>
                     </div>
                </div>
                <div class="et-field-wrap etab-template-wise" id="etab-template3-option">
                    <label><?php _e('Top Border Color','everest-tab-lite');?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][top_border_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($top_border_color);?>"/>
                     <p class="description"><?php _e('Only for Template 3','everest-tab-lite');?></p>
                     </div>
                </div>

             </div>
        </div>
    </div>
</div>
