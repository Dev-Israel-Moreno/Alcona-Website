<?php defined('ABSPATH') or die("No script kiddies please!");
if(isset($key)){ $key = $key; }else{ $key = $this->generateRandomIndex();}
$et_active_tab = get_post_meta($postid, 'et_active_tab', true);
$tab_active = (isset($et_active_tab['active']) && $et_active_tab['active'] != '')?esc_attr($et_active_tab['active']):'';
if($tab_active == '' && $count == '1'){
  $tab_active = $key;
}
$tab_label = (isset($item['tab_label']) && $item['tab_label'] != '')?esc_attr($item['tab_label']):'';
$enable_desc = (isset($item['enable_desc']) && $item['enable_desc'] == true)?true:false;
$tab_desc = (isset($item['description']) && $item['description'] != '')?$item['description']:'';
$tab_icon_type = (isset($item['icon_type']) && $item['icon_type'] != '')?$item['icon_type']:'';
$icon_code = (isset($item['icon']['code']) && $item['icon']['code'] != '')?$item['icon']['code']:'';
$tab_components_type = (isset($item['components']) && $item['components'] != '')?esc_attr($item['components']):'editor';
?>

<div class="et-each-tab-column">
  <div class="et-tab-item-inner">
    <div class="et-item-header clearfix">
      <div class='et-item-header-title' data-count="<?php echo $count;?>">
        <span class="etab_title_text_disp"><?php 
        if (isset($tab_label) && $tab_label != '') {
          echo esc_attr($tab_label);
        } else {
          _e('Tab '.$count, 'everest-tab-lite'); 
        }
        $count++;
        ?></span>
      </div>
      <div class='et-item-functions'>
        <span class='et-tab-active' title="Active this tab first.">
          <label><input type="radio" name="et_active_tab[active]" value="<?php echo $key;?>" <?php if(isset($tab_active) && $tab_active == $key) { echo ' checked="checked"'; } ?>><?php _e('Active','everest-tab-lite');?></label></span>
          <span class='et-tab-sort' title="Sort" ><i class="fa fa-arrows-alt"></i></span>
          <span class='et-tab-delete' title="Delete" data-confirm="<?php _e('Are you sure you want to delete this item?', 'everest-tab-lite' ); ?>"><i class="fa fa-trash"></i></span>
          <span class='et-tab-hide-show'><i class="fa fa-caret-down"></i></span>
        </div>
      </div>
      <div class='et-tab-item-options clearfix' style='display:none;'>
        <div class="et-tab-cbody">
          <div class="et-field-wrap">
            <label><?php _e('Tab Label','everest-tab-lite');?></label>
            <input type="text" name="tab_items[<?php echo $key;?>][tab_label]" class="et-tab-text et-tab-title" value="<?php echo esc_attr($tab_label);?>"/>
          </div> 
          <div class="et-field-wrap">
            <label for="enable_desc_<?php echo $key;?>"><?php _e('Enable Description','everest-tab-lite');?></label>
            <div class="etab-right-options"> 
             <label class="etab-switch">
              <input type="checkbox" class="etab-show-description" value="true" id="enable_desc_<?php echo $key;?>" name="tab_items[<?php echo $key; ?>][enable_desc]" <?php if( $enable_desc ){echo 'checked';}?>>
              <div class="etab-check round"></div>
            </label>
            <div class="etab-tooltip-description">
              <div class="etab-description">
               <?php _e('Please check to enable description.','everest-tab-lite');?>               
             </div>
           </div>
         </div>
       </div>
       <div class="et-field-wrap etab-enable-description-options" <?php if( !$enable_desc ) echo 'style="display: none;"';?>>
        <label><?php _e('Short Description','everest-tab-lite');?></label>
        <div class="etab-right-options"> 
          <textarea name="tab_items[<?php echo $key;?>][description]" rows="2" cols="50"><?php echo esc_attr($tab_desc);?></textarea>
        </div>
      </div>

<!-- Icons -->
      <div class="et-field-wrap">
        <label><?php _e('Choose Icon Type',ETABLite_TD);?></label>
        <div class="etab-right-options"> 
          <select name="tab_items[<?php echo $key;?>][icon_type]" class="et-tab_icon-type">
            <option ><?php _e('None',ETABLite_TD);?></option>
            <option value="available_icon" <?php selected($tab_icon_type, 'available_icon'); ?>><?php _e('Available Icon',ETABLite_TD);?></option>
          </select>
        </div>
      </div>

<!-- icon type -->
      <div class="et_selection_icontype_wrapper">
        <div class="et_available_icon" <?php if($tab_icon_type == 'available_icon' ){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
          <div class="et-field-wrap">
            <label for="et-icon_<?php echo $key; ?>"><?php _e('Available Icon',ETABLite_TD);?></label>
            <div class="etab-right-options"> 
              <input class="et-icon-picker" type="hidden" id="et-icon_<?php echo $key; ?>"
              name='tab_items[<?php echo $key; ?>][icon][code]' 
              value='<?php if($icon_code != '' ){ echo esc_attr($icon_code); } ?>' />
              <div data-target="#et-icon_<?php echo $key; ?>" class="et-button icon-picker <?php if ($icon_code !='') { $v = explode('|', $icon_code); echo $v[0] . ' ' . $v[1]; } ?> "><?php _e( 'Select Icon', ETABLite_TD); ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="et-field-wrap">
       <label><?php _e('Choose Components','everest-tab-lite');?></label>
       <div class="etab-right-options"> 
         <select name="tab_items[<?php echo $key;?>][components]" class="et-tab_components-type" id="etcomp_<?php echo $key;?>">
          <option value="editor" <?php selected($tab_components_type, 'editor'); ?>><?php _e('WYSIWYG Editor','everest-tab-lite');?></option>
          <option value="custom_link" <?php selected($tab_components_type, 'custom_link'); ?>><?php _e('Custom Link Tab','everest-tab-lite');?></option>
        </select>
      </div>
    </div>

    <div class="et_compontents_wrapper">
      <div class="et_tab_comp et_editor" id="wpeditor_<?php echo $key;?>" <?php if($tab_components_type == "editor") echo ''; else echo 'style="display:none;"';?>>
        <?php include(ETABLite_PATH.'/includes/admin/metabox/components/et-tab-editor.php'); ?>
      </div>
      <div class="et_tab_comp" id="clink_<?php echo $key;?>" <?php if($tab_components_type == "custom_link") echo ''; else echo 'style="display:none;"';?>>
        <?php include(ETABLite_PATH.'/includes/admin/metabox/components/et-clink.php'); ?>
      </div>
    </div>

  </div>
</div>

</div>
</div>